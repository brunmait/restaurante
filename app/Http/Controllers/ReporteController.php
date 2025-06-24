<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Reporte;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReporteController extends Controller
{
    public function panel()
    {
        return view('admin.panel');
    }

    public function productos()
    {
        $productos = Producto::all();
        return view('admin.reporte', compact('productos'));
    }

    public function exportPdf()
    {
        $productos = Producto::all();
        $pdf = Pdf::loadView('admin.reporte_pdf', compact('productos'));
        return $pdf->download('productos.pdf');
    }

    public function exportExcel()
    {
        $productos = Producto::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Precio');
        $sheet->setCellValue('D1', 'Stock');

        $row = 2;
        foreach ($productos as $producto) {
            $sheet->setCellValue("A{$row}", $producto->id);
            $sheet->setCellValue("B{$row}", $producto->nombre);
            $sheet->setCellValue("C{$row}", $producto->precio);
            $sheet->setCellValue("D{$row}", $producto->stock);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/productos.xlsx');
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    // ✅ Aquí va el método para ver reportes subidos por los cajeros
    public function index()
    {
        $reportes = Reporte::with('usuario')->latest()->get();
        return view('admin.reportes.index', compact('reportes'));
    }
    // Mostrar el formulario de subida
// Muestra el formulario
public function subirVista()
{
    return view('cajero.reportes.subir');
}

// Procesa el archivo subido
public function subir(Request $request)
{
    $request->validate([
        'archivo' => 'required|file|mimes:pdf,xlsx|max:10240',
    ]);

    $archivo = $request->file('archivo');
    $nombre = uniqid() . '.' . $archivo->getClientOriginalExtension();
    $archivo->storeAs('public/reportes', $nombre);

    Reporte::create([
        'user_id' => auth()->id(),
        'archivo' => $nombre,
    ]);

    return back()->with('success', 'Reporte subido correctamente.');
}

public function subirReporte(Request $request)
{
    $request->validate([
        'archivo' => 'required|file|mimes:pdf,xlsx,xls',
    ]);

    $archivo = $request->file('archivo');
    $nombreArchivo = Str::random(40) . '.' . $archivo->getClientOriginalExtension();

    $archivo->storeAs('public/reportes', $nombreArchivo);

    Reporte::create([
        'usuario_id' => Auth::id(), // Asegúrate que esté logueado como cajero
        'archivo' => $nombreArchivo,
    ]);

    return redirect()->back()->with('success', 'Reporte subido correctamente.');
}
public function store(Request $request)
{
    $request->validate([
        'archivo' => 'required|mimes:pdf,xlsx|max:2048',
    ]);

    $archivo = $request->file('archivo');
    $nombre = time() . '_' . $archivo->getClientOriginalName();
    $archivo->storeAs('public/reportes', $nombre);

    Reporte::create([
        'user_id' => Auth::id(), // 👈 importante guardar el ID del usuario autenticado
        'archivo' => $nombre,
    ]);

    return back()->with('success', 'Reporte subido correctamente.');
}
//reporte del admi
public function ver($id)
{
    $reporte = \App\Models\Reporte::findOrFail($id);
    $ruta = storage_path('app/public/reportes/' . $reporte->archivo);

    if (!file_exists($ruta)) {
        abort(404, 'Archivo no encontrado');
    }

    return response()->file($ruta);
}


}
