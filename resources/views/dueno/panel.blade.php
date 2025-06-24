<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Dueño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>📊 Panel del Dueño</h2>
            <!-- Botón de cerrar sesión -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-dark">🔒 Cerrar Sesión</button>
            </form>
        </div>

        <a href="{{ route('dueno.ventas') }}" class="btn btn-outline-primary me-2">📋 Ver ventas</a>
        <a href="{{ route('dueno.exportPdf') }}" class="btn btn-outline-danger me-2">📄 Exportar PDF</a>
        <a href="{{ route('dueno.exportExcel') }}" class="btn btn-outline-success">📊 Exportar Excel</a>
    </div>
</body>
</html>
