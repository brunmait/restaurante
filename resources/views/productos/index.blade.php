@extends('layouts.admin')

@section('title', 'Gestionar Productos')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4><i class="bi bi-box-seam"></i> Gestión de Productos</h4>
                    <a href="{{ route('crud.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Agregar Producto
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productos as $producto)
                                <tr>
                                    <td>{{ $producto->id }}</td>
                                    <td><strong>{{ $producto->nombre }}</strong></td>
                                    <td>{{ Str::limit($producto->descripcion, 50) }}</td>
                                    <td><span class="badge bg-success">${{ number_format($producto->precio, 2) }}</span></td>
                                    <td>
                                        @if($producto->stock < 10)
                                            <span class="badge bg-danger">{{ $producto->stock }} (Bajo)</span>
                                        @elseif($producto->stock < 20)
                                            <span class="badge bg-warning">{{ $producto->stock }} (Medio)</span>
                                        @else
                                            <span class="badge bg-success">{{ $producto->stock }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($producto->stock > 0)
                                            <span class="badge bg-success">Disponible</span>
                                        @else
                                            <span class="badge bg-danger">Agotado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('crud.edit', $producto->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('crud.destroy', $producto->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="bi bi-inbox display-4 text-muted"></i>
                                        <p class="text-muted mt-2">No hay productos registrados</p>
                                        <a href="{{ route('crud.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-circle"></i> Agregar Primer Producto
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection