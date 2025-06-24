<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Reporte;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DuenoController extends Controller
{
    public function index() {
        return view('dueno.panel');
    }

    public function ventas(Request $request) {
        $ventas = Venta::with('user')->when($request->filled('fecha_inicio') && $request->filled('fecha_fin'), function ($query) use ($request) {
            $query->whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin]);
        })->get();

        $total = $ventas->sum('total');
        return view('dueno.ventas', compact('ventas', 'total'));
    }

    public function exportPdf() {
        $ventas = Venta::with('user')->get();
        $total = $ventas->sum('total');
        $pdf = Pdf::loadView('dueno.reporte_pdf', compact('ventas', 'total'));
        return $pdf->download('ventas_dueno.pdf');
    }

    public function exportExcel() {
        $ventas = Venta::with('user')->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(['Cajero', 'Producto', 'Cantidad', 'Precio', 'Total', 'Fecha'], NULL, 'A1');

        $row = 2;
        foreach ($ventas as $v) {
            $sheet->fromArray([
                $v->user->name,
                $v->producto,
                $v->cantidad,
                $v->precio,
                $v->total,
                $v->created_at->format('d/m/Y H:i')
            ], NULL, "A{$row}");
            $row++;
        }

        $filePath = storage_path('app/public/ventas_dueno.xlsx');
        (new Xlsx($spreadsheet))->save($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
