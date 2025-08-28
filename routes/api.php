<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Inventario y Ventas API
Route::post('/compras', [InventarioController::class, 'compras']);
Route::post('/ventas', [InventarioController::class, 'vender']);
Route::get('/inventario/movimientos', [InventarioController::class, 'movimientos']);
Route::get('/inventario/low-stock', [InventarioController::class, 'bajoStock']);
