<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function invitado() {
        $productos = Producto::all();
        return view('productos.invitado', compact('productos'));
    }

    public function panel() {
        $productos = Producto::all();
        return view('productos.panel', compact('productos'));
    }

    public function index() {
        return $this->panel();
    }

    public function create() {
        return view('productos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        Producto::create($request->all());
        return redirect()->route('crud.index')->with('success', 'Producto agregado exitosamente');
    }

    public function edit($id) {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('crud.index')->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy($id) {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('crud.index')->with('success', 'Producto eliminado exitosamente');
    }
}
