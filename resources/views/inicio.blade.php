<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Rincón Chaqueño</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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

<!-- SECCIÓN DEL MENÚ -->
<section id="menu" class="py-5" style="background: rgba(105, 0, 0, 0.05);">
    <div class="container">
        <h2 class="text-center mb-5" style="color: rgb(105, 0, 0); font-weight: bold;">Nuestro Menú</h2>
        <div class="row g-4">
            <!-- Especialidades -->
            <div class="col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-header text-center" style="background: rgb(105, 0, 0); color: white;">
                        <h4 class="mb-0">Especialidades</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <strong>Pollo a la Leña</strong><br>
                                <small class="text-muted">Pollo entero cocinado lentamente al fuego de leña</small><br>
                                <span class="text-danger fw-bold">$8,500</span>
                            </li>
                            <li class="mb-3">
                                <strong>Chancho a la Cruz</strong><br>
                                <small class="text-muted">Cerdo asado a la cruz, tradición chaqueña</small><br>
                                <span class="text-danger fw-bold">$9,200</span>
                            </li>
                            <li class="mb-3">
                                <strong>Cordero Patagónico</strong><br>
                                <small class="text-muted">Cordero tierno asado con hierbas regionales</small><br>
                                <span class="text-danger fw-bold">$10,800</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Parrilla -->
            <div class="col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-header text-center" style="background: rgb(105, 0, 0); color: white;">
                        <h4 class="mb-0">Parrilla</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <strong>Bife de Chorizo</strong><br>
                                <small class="text-muted">Corte premium a la parrilla</small><br>
                                <span class="text-danger fw-bold">$6,800</span>
                            </li>
                            <li class="mb-3">
                                <strong>Asado de Tira</strong><br>
                                <small class="text-muted">Tradicional asado con guarnición</small><br>
                                <span class="text-danger fw-bold">$5,900</span>
                            </li>
                            <li class="mb-3">
                                <strong>Choripán</strong><br>
                                <small class="text-muted">Chorizo casero con pan artesanal</small><br>
                                <span class="text-danger fw-bold">$2,300</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Acompañamientos y Bebidas -->
            <div class="col-lg-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-header text-center" style="background: rgb(105, 0, 0); color: white;">
                        <h4 class="mb-0">Acompañamientos</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <strong>Ensalada Mixta</strong><br>
                                <small class="text-muted">Lechuga, tomate, cebolla</small><br>
                                <span class="text-danger fw-bold">$1,800</span>
                            </li>
                            <li class="mb-3">
                                <strong>Papas Fritas</strong><br>
                                <small class="text-muted">Papas caseras crujientes</small><br>
                                <span class="text-danger fw-bold">$1,500</span>
                            </li>
                            <li class="mb-3">
                                <strong>Vino de la Casa</strong><br>
                                <small class="text-muted">Tinto/Blanco (750ml)</small><br>
                                <span class="text-danger fw-bold">$3,200</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <p class="text-muted mb-3">¿Querés hacer un pedido o reservar tu mesa?</p>
            <a href="#contacto" class="btn btn-danger btn-lg">Contactanos</a>
        </div>
    </div>
</section>

<!-- SECCIÓN SOBRE NOSOTROS -->
<section id="nosotros" class="py-5" style="background: rgba(255, 255, 255, 0.95);">
    <div class="container">
        <div class="row align-items-center">
            <!-- Columna de texto -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="text-center mb-4" style="color: rgb(105, 0, 0); font-weight: bold;">Sobre Nosotros</h2>
                <p class="lead text-dark">
                    En <strong>Rincón Chaqueño</strong>, somos más que un restaurante: somos guardianes de la tradición culinaria del Chaco. Desde hace más de 20 años, nos dedicamos a ofrecer los auténticos sabores de nuestra región.
                </p>
                <p class="text-dark">
                    Nuestros platos están preparados con ingredientes frescos de la zona y técnicas ancestrales que han pasado de generación en generación. El pollo a la leña y el chancho a la cruz son nuestras especialidades, cocinados con la paciencia y el amor que caracteriza nuestra cocina tradicional.
                </p>
                <p class="text-dark">
                    Ubicados en el corazón de la ciudad, ofrecemos un ambiente familiar y acogedor donde cada visitante se siente como en casa. Ven y descubre por qué somos el lugar preferido para disfrutar de los auténticos sabores chaqueños.
                </p>
                <div class="text-center mt-4">
                    <a href="#contacto" class="btn btn-danger btn-lg">Contáctanos</a>
                </div>
            </div>
            
            <!-- Columna de ubicación -->
            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center" style="background: rgb(105, 0, 0); color: white;">
                        <h4 class="mb-0"><i class="bi bi-geo-alt-fill"></i> Nuestra Ubicación</h4>
                    </div>
                    <div class="card-body p-0">
                        <!-- Mapa embebido de Google Maps -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.2370949842547!2d-58.98390708549426!3d-27.451851782893507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca5c5e43ad1%3A0x5ac83c6c96d39d4b!2sResistencia%2C%20Chaco%2C%20Argentina!5e0!3m2!1ses!2sar!4v1642345678901!5m2!1ses!2sar" 
                                width="100%" 
                                height="300" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                        <div class="p-3">
                            <h5 style="color: rgb(105, 0, 0);">Información de Contacto</h5>
                            <p class="mb-2"><i class="bi bi-geo-alt text-danger"></i> <strong>Dirección:</strong> Av. 25 de Mayo 1245, Resistencia, Chaco</p>
                            <p class="mb-2"><i class="bi bi-telephone text-danger"></i> <strong>Teléfono:</strong> +54 362 445-6789</p>
                            <p class="mb-2"><i class="bi bi-clock text-danger"></i> <strong>Horarios:</strong></p>
                            <ul class="list-unstyled ms-3">
                                <li>Lunes a Jueves: 11:30 - 15:00 | 19:00 - 23:30</li>
                                <li>Viernes y Sábado: 11:30 - 15:30 | 19:00 - 01:00</li>
                                <li>Domingo: 11:30 - 16:00 | 19:00 - 23:00</li>
                            </ul>
                            <p class="mb-0"><i class="bi bi-envelope text-danger"></i> <strong>Email:</strong> info@rinconchaqueno.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN DE CONTACTO -->
<section id="contacto" class="py-5" style="background: rgb(105, 0, 0);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-white mb-4">¿Listo para una experiencia única?</h2>
                <p class="text-white lead mb-4">Reserva tu mesa o haz tu pedido</p>
                <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                    <a href="tel:+543624456789" class="btn btn-light btn-lg">
                        <i class="bi bi-telephone"></i> Llamar ahora
                    </a>
                    <a href="https://wa.me/543624456789" class="btn btn-success btn-lg" target="_blank">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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
