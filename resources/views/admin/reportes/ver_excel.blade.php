<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Reporte Excel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-4">
<div class="container">
    <h3 class="mb-4">📊 Reporte Subido: {{ $reporte->archivo }}</h3>

    <p>Este archivo es un Excel y no puede visualizarse directamente en el navegador.</p>

    <a href="{{ asset('storage/reportes/' . $reporte->archivo) }}" class="btn btn-success" download>📥 Descargar Excel</a>
    <a href="{{ route('reportes.index') }}" class="btn btn-secondary">⬅️ Volver</a>
</div>
</body>
</html>
