<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
    <h3 class="mb-4">📊 Reportes de Ventas Subidos por Cajeros</h3>

    {{-- Botón de volver al panel --}}
    <div class="mb-3">
        <a href="{{ route('admin') }}" class="btn btn-secondary">⬅️ Volver al Panel del Administrador</a>
    </div>

    @if($reportes->isEmpty())
        <div class="alert alert-info">No hay reportes disponibles.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>Cajero</th>
                    <th>Archivo</th>
                    <th>Fecha de subida</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($reportes as $reporte)
                    <tr>
                        <td>{{ $reporte->usuario->name }}</td>
                        <td>{{ $reporte->archivo }}</td>
                        <td>{{ $reporte->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('reportes.ver', $reporte->id) }}" class="btn btn-sm btn-primary" target="_blank">👁️ Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
