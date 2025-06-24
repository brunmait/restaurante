<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Cajero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            background: #1b3b2f;
            position: fixed;
            height: 100vh;
            padding-top: 20px;
            color: #fff;
        }
        .sidebar h4 {
            text-align: center;
            color: #f8d210;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ddd;
            text-decoration: none;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background: #17a589;
            color: #fff;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .content {
            margin-left: 250px;
            padding: 40px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>💰 Cajero Panel</h4>
    <a href="#" class="active"><i class="bi bi-house-door-fill"></i>Inicio</a>

    <a href="{{ route('ventas.create') }}"><i class="bi bi-cart-plus-fill"></i>Registrar Venta</a>
    <a href="{{ route('ventas.index') }}"><i class="bi bi-list-ul"></i>Lista de Ventas</a>
<a href="{{ route('reportes.subirVista') }}">
    <i class="bi bi-upload"></i> Subir Reporte
</a>


    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="text-danger"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="content">
    <h2>Bienvenido, Cajero 🧾</h2>
    <p>Aquí puedes registrar ventas de productos y consultar el historial.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
