<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Historial de Ventas del Cajero</h2>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $v)
                <tr>
                    <td>{{ $v->producto }}</td>
                    <td>{{ $v->cantidad }}</td>
                    <td>Bs {{ number_format($v->precio, 2) }}</td>
                    <td>Bs {{ number_format($v->total, 2) }}</td>
                    <td>{{ $v->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 style="text-align:right; margin-top:20px;">Total General: Bs {{ number_format($totalGeneral, 2) }}</h4>
</body>
</html>
