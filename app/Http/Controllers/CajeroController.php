<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class CajeroController extends Controller
{
    public function index()
    {
        $cajeros = User::where('rol', 'cajero')->get();
        return view('admin.cajeros.index', compact('cajeros'));
    }

    public function create()
    {
        return view('admin.cajeros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'cajero',
        ]);

        return redirect()->route('cajeros.index')->with('success', 'Cajero registrado correctamente');
    }

    public function destroy($id)
    {
        $cajero = User::where('rol', 'cajero')->findOrFail($id);
        $cajero->delete();

        return back()->with('success', 'Cajero eliminado');
    }

    public function exportPdf()
    {
        $cajeros = User::where('rol', 'cajero')->get();
        $pdf = Pdf::loadView('admin.cajeros.reporte_pdf', compact('cajeros'));
        return $pdf->download('reporte_cajeros.pdf');
    }

    public function exportExcel()
    {
        $cajeros = User::where('rol', 'cajero')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Correo');
        $sheet->setCellValue('C1', 'Fecha de Registro');

        $row = 2;
        foreach ($cajeros as $c) {
            $sheet->setCellValue('A' . $row, $c->name);
            $sheet->setCellValue('B' . $row, $c->email);
            $sheet->setCellValue('C' . $row, $c->created_at->format('d/m/Y'));
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'reporte_cajeros.xlsx';
        $tempFile = storage_path('app/public/' . $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile)->deleteFileAfterSend(true);
    }
    public function edit($id)
{
    $cajero = User::findOrFail($id);
    return view('admin.cajeros.edit', compact('cajero'));
}

public function update(Request $request, $id)
{
    $cajero = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $cajero->id,
    ]);

    $cajero->name = $request->name;
    $cajero->email = $request->email;

    if ($request->filled('password')) {
        $cajero->password = Hash::make($request->password);
    }

    $cajero->save();

    return redirect()->route('cajeros.index')->with('success', 'Cajero actualizado correctamente.');
}

}
