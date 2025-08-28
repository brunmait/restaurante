<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\InventarioMovimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function compras(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'costo_unitario' => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($validated) {
            $producto = Producto::findOrFail($validated['producto_id']);

            $compra = Compra::create($validated);

            $producto->increment('stock', $validated['cantidad']);

            InventarioMovimiento::create([
                'producto_id' => $producto->id,
                'cambio_cantidad' => $validated['cantidad'],
                'motivo' => 'compra',
                'referencia_tipo' => 'compra',
                'referencia_id' => $compra->id,
            ]);

            return response()->json($compra, 201);
        });
    }

    public function vender(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($validated) {
            $producto = Producto::lockForUpdate()->findOrFail($validated['producto_id']);

            if ($producto->stock < $validated['cantidad']) {
                return response()->json(['message' => 'Stock insuficiente'], 422);
            }

            $producto->decrement('stock', $validated['cantidad']);

            InventarioMovimiento::create([
                'producto_id' => $producto->id,
                'cambio_cantidad' => -$validated['cantidad'],
                'motivo' => 'venta',
                'referencia_tipo' => 'venta',
                'referencia_id' => null,
            ]);

            return response()->json([
                'producto_id' => $producto->id,
                'stock' => $producto->stock,
                'subtotal' => $validated['cantidad'] * $validated['precio_unitario'],
            ], 201);
        });
    }

    public function movimientos(Request $request)
    {
        $query = InventarioMovimiento::with('producto')->latest();
        if ($request->filled('producto_id')) {
            $query->where('producto_id', $request->producto_id);
        }
        return $query->paginate(25);
    }

    public function bajoStock()
    {
        $productos = Producto::whereColumn('stock', '<=', 'min_stock')->get();
        return response()->json($productos);
    }
}

