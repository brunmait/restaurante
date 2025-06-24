<?php

namespace App\Exports;

use App\Models\Producto;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;

class ProductosExport
{
    public function export()
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
}
