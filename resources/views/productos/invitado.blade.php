<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Platos Típicos - Rincón Chaqueño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }
        .navbar {
            background-color: #198754;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('inicio') }}">🏠 Rincón Chaqueño</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4 text-center">🍽️ Platos Típicos - Chancho a la Cruz</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($productos as $producto)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <p class="card-text">{{ $producto->descripcion }}</p>
                </div>
                <div class="card-footer bg-success text-white text-end">
                    <strong>{{ $producto->precio }} Bs</strong>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('inicio') }}" class="btn btn-primary">
            ⬅️ Volver al Inicio
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
