<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class VentaController extends Controller
{
    public function create()
    {
        // Lista de productos y precios disponibles
        $productos = ['Chacho', 'Pollo'];
        $preciosDisponibles = [50, 60, 80];

        return view('cajero.ventas.create', compact('productos', 'preciosDisponibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        $total = $request->cantidad * $request->precio;

        Venta::create([
            'user_id' => Auth::id(),
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
            'total' => $total,
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente');
    }

    public function index(Request $request)
{
    $query = Venta::where('user_id', Auth::id());

    if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
        $query->whereBetween('created_at', [$request->fecha_inicio . ' 00:00:00', $request->fecha_fin . ' 23:59:59']);
    }

    $ventas = $query->latest()->get();
    $totalGeneral = $ventas->sum('total');

    return view('cajero.ventas.index', compact('ventas', 'totalGeneral'));
}
public function exportPdf()
{
    $ventas = Venta::where('user_id', Auth::id())->latest()->get();
    $totalGeneral = $ventas->sum('total');

    $pdf = Pdf::loadView('cajero.ventas_pdf', compact('ventas', 'totalGeneral'));
    return $pdf->download('ventas_realizadas.pdf');
}

public function exportExcel()
{
    $ventas = Venta::where('user_id', Auth::id())->latest()->get();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Producto');
    $sheet->setCellValue('B1', 'Cantidad');
    $sheet->setCellValue('C1', 'Precio Unitario');
    $sheet->setCellValue('D1', 'Total');
    $sheet->setCellValue('E1', 'Fecha');

    $row = 2;
    foreach ($ventas as $venta) {
        $sheet->setCellValue("A{$row}", $venta->producto);
        $sheet->setCellValue("B{$row}", $venta->cantidad);
        $sheet->setCellValue("C{$row}", $venta->precio);
        $sheet->setCellValue("D{$row}", $venta->total);
        $sheet->setCellValue("E{$row}", $venta->created_at->format('d/m/Y H:i'));
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $filePath = storage_path('app/public/ventas.xlsx');
    $writer->save($filePath);

    return response()->download($filePath)->deleteFileAfterSend(true);
}

}
