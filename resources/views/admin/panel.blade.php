<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
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
            background: #2c2f48;
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
            background: #f36b3b;
            color: #fff;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .submenu {
            display: none;
            background-color: #1e1f2f;
            margin-left: 20px;
        }
        .submenu a {
            padding: 8px 20px;
        }
        .content {
            margin-left: 250px;
            padding: 40px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>🍽️ Admin Panel</h4>
    <a href="#" class="active"><i class="bi bi-house-door-fill"></i>Inicio</a>

    <a href="#" onclick="toggleMenu('productos')"><i class="bi bi-box-seam"></i>Productos</a>
    <div id="productos" class="submenu">
        <a href="#"><i class="bi bi-plus-circle"></i>Agregar Producto</a>
        <a href="#"><i class="bi bi-pencil-square"></i>Gestionar Productos</a>
    </div>

        <a href="#" onclick="toggleMenu('usuarios')"><i class="bi bi-people-fill"></i>Usuarios</a>
    <div id="usuarios" class="submenu">
        <a href="{{ route('cajeros.create') }}"><i class="bi bi-person-plus-fill"></i>Registrar Cajero</a>
        <a href="{{ route('cajeros.index') }}"><i class="bi bi-person-lines-fill"></i>Lista de Cajeros</a>
    </div>


 <a href="{{ route('admin.reportes.index') }}"><i class="bi bi-bar-chart-line-fill"></i>Reportes</a>


    <a href="#"><i class="bi bi-gear-fill"></i>Configuración</a>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="text-danger"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<div class="content">
    <h2>Bienvenido, Administrador 👑</h2>
    <p>Selecciona una opción del menú para comenzar.</p>
</div>

<script>
    function toggleMenu(id) {
        var submenu = document.getElementById(id);
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
