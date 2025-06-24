<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\CajeroController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CajeroPanelController;



Route::get('/', [AuthController::class, 'inicio'])->name('inicio');

// Rutas públicas
// Registro
Route::get('/registro', [AuthController::class, 'showRegistro'])->name('registro');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro.guardar');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/productos', [ProductoController::class, 'invitado'])->name('productos.invitado');



Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin', [ReporteController::class, 'panel'])->middleware('can:admin')->name('admin');
    Route::get('/reporte/productos', [ReporteController::class, 'productos'])->middleware('can:admin');
    Route::get('/reporte/pdf', [ReporteController::class, 'exportPdf'])->middleware('can:admin');
    Route::get('/reporte/excel', [ReporteController::class, 'exportExcel'])->middleware('can:admin');

    Route::get('/tecnico', [ProductoController::class, 'panel'])->middleware('can:tecnico')->name('tecnico');
    Route::resource('/crud', ProductoController::class)->middleware('can:tecnico');
    
   // 👉 Ruta del Cajero
    Route::get('/panel-cajero', function () {
        return view('cajero.panel');
    })->middleware('can:cajero')->name('cajero');

});
    Route::get('/cajero/panel', [CajeroPanelController::class, 'index'])->name('cajero.panel');


Route::middleware(['auth', 'can:admin'])->group(function () {
    Route::resource('cajeros', CajeroController::class);
    
    // Exportar PDF y Excel
    Route::get('cajeros-export/pdf', [CajeroController::class, 'exportPdf'])->name('cajeros.exportPdf');
    Route::get('cajeros-export/excel', [CajeroController::class, 'exportExcel'])->name('cajeros.exportExcel');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/crear', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
});



// Cajero sube reporte
Route::post('/reportes/subir', [ReporteController::class, 'store'])->name('reportes.store')->middleware('auth');

// Admin ve los reportes
Route::get('/admin/reportes', [ReporteController::class, 'index'])->name('admin.reportes.index')->middleware('auth');

Route::get('/admin/reportes', [\App\Http\Controllers\ReporteController::class, 'index'])->name('admin.reportes.index');


// Vista del formulario para subir reporte
Route::get('/cajero/reportes/subir', [App\Http\Controllers\ReporteController::class, 'subirVista'])->name('reportes.subirVista');

// Acción para procesar el archivo
Route::post('/cajero/reportes/subir', [App\Http\Controllers\ReporteController::class, 'subir'])->name('reportes.subir');

// Mostrar formulario de subida
Route::get('/cajero/reportes/subir', [ReporteController::class, 'subirVista'])->name('reportes.subirVista');

// Subir el archivo
Route::post('/reportes/subir', [ReporteController::class, 'subir'])->name('reportes.subir');
Route::get('/cajero/reportes/subir', [ReporteController::class, 'subirVista'])->name('reportes.subirVista');

Route::get('/ventas/export/pdf', [VentaController::class, 'exportPdf'])->name('ventas.exportPdf');
Route::get('/ventas/export/excel', [VentaController::class, 'exportExcel'])->name('ventas.exportExcel');
Route::post('/reportes/subir', [ReporteController::class, 'subirReporte'])->name('reportes.subir');
Route::get('/admin/reportes/ver/{id}', [ReporteController::class, 'ver'])->name('reportes.ver');
Route::get('/admin', [ReporteController::class, 'panel'])->name('admin');




