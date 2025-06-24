<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Cajeros</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #555; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Reporte de Cajeros</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cajeros as $c)
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
