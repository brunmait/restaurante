<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas Realizadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
    <h3 class="mb-4">Historial de Ventas</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- 🔽 Botones PDF y Excel -->
    <div class="mb-3 d-flex justify-content-start gap-2">
        <a href="{{ route('ventas.exportPdf') }}" class="btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"></i> Exportar PDF</a>
        <a href="{{ route('ventas.exportExcel') }}" class="btn btn-success"><i class="bi bi-file-earmark-excel-fill"></i> Exportar Excel</a>
    </div>

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
            <label>Desde</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
        </div>
        <div class="col-md-4">
            <label>Hasta</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
        </div>
        <div class="col-md-4 align-self-end">
            <button class="btn btn-primary">🔍 Filtrar</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary">⟳ Limpiar</a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-primary text-center">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse($ventas as $v)
                <tr>
                    <td>{{ $v->producto }}</td>
                    <td>{{ $v->cantidad }}</td>
                    <td>Bs {{ number_format($v->precio, 2) }}</td>
                    <td><strong>Bs {{ number_format($v->total, 2) }}</strong></td>
                    <td>{{ $v->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="5">No hay ventas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="alert alert-info text-end">
        <strong>Total General:</strong> Bs {{ number_format($totalGeneral, 2) }}
    </div>

    <div class="d-flex justify-content-start gap-2">
        <a href="{{ route('ventas.create') }}" class="btn btn-primary">Registrar otra venta</a>
        <a href="{{ route('cajero.panel') }}" class="btn btn-secondary">Volver al Panel del Cajero</a>
    </div>
</div>

<!-- Bootstrap Icons (opcional) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
