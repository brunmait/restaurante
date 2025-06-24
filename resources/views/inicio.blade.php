<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Rincón Chaqueño</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/fondo.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            position: relative;
            color: black;
        }

        .fondo-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            z-index: 0;
        }

        body > *:not(.fondo-overlay) {
            position: relative;
            z-index: 2;
        }

        .header {
            background: rgb(105, 0, 0);
            padding: 15px 0;
        }

        .nav-link {
            color: #ffffff !important;
            font-weight: bold;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #900;
            color: #fff !important;
        }

        .hero-section {
            padding: 60px 0;
            text-align: center;
            color: #f1f1f1;
            text-shadow: 1px 1px 4px #000;
        }

        .offer-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, opacity 0.3s;
            opacity: 0.92;
        }

        .offer-card:hover {
            transform: scale(1.03);
            opacity: 1;
        }

        .offer-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            opacity: 0.9;
            transition: opacity 0.3s;
        }

        .offer-card:hover img {
            opacity: 1;
        }

        .ingresar-btn {
            min-width: 120px;
            min-height: 48px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <!-- Fondo oscuro -->
    <div class="fondo-overlay"></div>

    <!-- NAVBAR RESPONSIVE -->
    <nav class="navbar navbar-expand-lg navbar-dark header">
        <div class="container-fluid">
    <a class="navbar-brand fw-bold fs-2" style="font-family: 'Georgia', serif;" href="#">🍽️ Rincón Chaqueño</a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item fs-3"><a class="nav-link mx-2" href="#menu">Menú</a></li>
                    <li class="nav-item fs-3"><a class="nav-link mx-2" href="#nosotros">Sobre Nosotros</a></li>
                    <li class="nav-item fs-3"><a class="nav-link mx-2" href="#contacto">Contacto</a></li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-danger dropdown-toggle ingresar-btn" type="button" data-bs-toggle="dropdown">
                            Ingresar
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a class="dropdown-item" href="{{ route('registro') }}">Registrarse</a></li>
                            <li><a class="dropdown-item" href="{{ route('productos.invitado') }}"></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
<div class="container text-center hero-section">
    <h2>PLATOS TÍPICOS</h2>
    <p class="lead">DEGUSTE DE LOS DELICIOSOS PLATOS DE LA CASA</p>
</div>

<!-- SECCIÓN DE TARJETAS -->
<div class="container mb-5">
    <div class="row g-4">
        <!-- Columna Izquierda -->
        <div class="col-md-6">
            <!-- Pollo a la Leña -->
            <div class="offer-card bg-white bg-opacity-75 rounded shadow h-80">
                <img src="{{ asset('images/pollo.jpg') }}" alt="Pollo a la Leña" class="img-fluid rounded-top">
                <div class="card-body text-center">
                    <h4 class="text-black fw-bold">POLLO A LA LEÑA</h4>
                    <p>Disfruta del mejor pollo al fuego lento con sabor tradicional.</p>
                    <a href="#" class="btn btn-outline-danger">Comienza a disfrutar</a>
                </div>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <!-- Reservaciones -->
            <div class="offer-card text-white rounded shadow mb-4" style="background: rgb(105, 0, 0);">
                <div class="card-body text-center">
                    <h3 class="fw-bold">RESERVACIONES</h3>
                    <p>Reserva tu mesa para una experiencia única.</p>
                    <a href="#" class="btn btn-light">Reserva ya</a>
                </div>
            </div>

            <!-- Chancho a la Cruz debajo -->
            <div class="offer-card bg-white bg-opacity-75 rounded shadow">
                <img src="{{ asset('images/chancho-0000.jpg') }}" alt="Chancho a la Cruz" class="img-fluid rounded-top">
                <div class="card-body text-center">
                    <h4 class="text-black fw-bold">CHANCHO A LA CRUZ</h4>
                    <a href="#" class="btn btn-dark">Hacer Pedido</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PIE DE PÁGINA / FOOTER -->
<footer class="mt-5 text-white py-4" style="background: rgb(105, 0, 0);">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
        
        <!-- LOGO -->
        <div class="mb-3 mb-md-0">
            <h4 class="fw-bold" style="font-family: 'Georgia', serif;"></h4>
        </div>

        <!-- ENLACES -->
        <div class="mb-3 mb-md-0">
            <a href="#" class="text-white text-decoration-none mx-2">Política de Privacidad</a>
            <a href="#" class="text-white text-decoration-none mx-2">Términos de Uso</a>
            <span class="mx-2">© 2025 Rincón Chaqueño</span>
        </div>

        <!-- REDES SOCIALES -->
        <div>
            <a href="#" class="text-white text-decoration-none mx-2"><i class="bi bi-linkedin fs-5"></i></a>
            <a href="#" class="text-white text-decoration-none mx-2"><i class="bi bi-instagram fs-5"></i></a>
            <a href="#" class="text-white text-decoration-none mx-2"><i class="bi bi-facebook fs-5"></i></a>
        </div>
    </div>
</footer>


    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
