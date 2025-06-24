<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas por Cajero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
<div class="container">
    <h2 class="mb-4">📋 Ventas realizadas por cajeros</h2>

    <div class="mb-3">
        <strong>Total General: </strong> Bs. {{ number_format($total, 2) }}
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th>Cajero</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->user->name ?? 'Sin nombre' }}</td>
                    <td>{{ $venta->producto }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>Bs. {{ number_format($venta->precio, 2) }}</td>
                    <td>Bs. {{ number_format($venta->total, 2) }}</td>
                    <td>{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

   <a href="{{ route('dueno.panel') }}" class="btn btn-secondary mt-3">⬅ Volver al Panel del Dueño</a>

</div>
</body>
</html>
