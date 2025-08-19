<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Restaurante Rincón Chaqueño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --accent-color: #f59e0b;
            --danger-color: #ef4444;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --dark-bg: #1e293b;
            --sidebar-bg: #0f172a;
            --light-bg: #f8fafc;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-primary);
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, var(--dark-bg) 100%);
            position: fixed;
            height: 100vh;
            padding: 0;
            color: #fff;
            box-shadow: var(--shadow-lg);
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 2rem 1.5rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05);
        }

        .sidebar-header h4 {
            color: var(--accent-color);
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .sidebar-header p {
            color: #cbd5e1;
            font-size: 0.875rem;
            margin: 0;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.25rem;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            position: relative;
            font-weight: 500;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: #fff;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: rgba(0,0,0,0.2);
            margin: 0.25rem 1rem;
            border-radius: 0.5rem;
        }

        .submenu.show {
            max-height: 200px;
        }

        .submenu a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .submenu a:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }

        .submenu a i {
            margin-right: 0.75rem;
            font-size: 1rem;
        }

        .logout-link {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1rem;
        }

        .logout-link .nav-link {
            color: var(--danger-color);
        }

        .logout-link .nav-link:hover {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            background: var(--light-bg);
        }

        .top-navbar {
            background: #fff;
            padding: 1rem 2rem;
            box-shadow: var(--shadow);
            border-bottom: 1px solid var(--border-color);
        }

        .content-area {
            padding: 2rem;
        }

        .welcome-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .welcome-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .welcome-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .stat-icon.primary { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); }
        .stat-icon.success { background: linear-gradient(135deg, var(--success-color), #059669); }
        .stat-icon.warning { background: linear-gradient(135deg, var(--warning-color), #d97706); }
        .stat-icon.danger { background: linear-gradient(135deg, var(--danger-color), #dc2626); }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .stat-label {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .quick-actions {
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
        }

        .recent-activity {
            background: #fff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            height: fit-content;
        }

        .recent-activity h3 {
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 1.125rem;
        }

        .activity-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            margin-right: 1rem;
            font-size: 1.25rem;
            margin-top: 0.25rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .activity-subtitle {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .activity-time {
            color: var(--text-secondary);
            font-size: 0.75rem;
        }

        .no-activity {
            text-align: center;
            padding: 2rem;
            color: var(--text-secondary);
        }

        .no-activity i {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .quick-actions h3 {
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            font-weight: 600;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-btn {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-decoration: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
            color: white;
        }

        .action-btn i {
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        .action-btn.secondary {
            background: linear-gradient(135deg, var(--success-color), #059669);
        }

        .action-btn.warning {
            background: linear-gradient(135deg, var(--warning-color), #d97706);
        }

        .action-btn.danger {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .breadcrumb-nav {
            background: transparent;
            padding: 0 0 1rem 0;
        }

        .breadcrumb {
            background: transparent;
            margin: 0;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        <h4>🍽️ Rincón Chaqueño</h4>
        <p>Panel de Administración</p>
    </div>
    
    <nav class="sidebar-nav">
        <div class="nav-item">
            <a href="{{ route('admin') }}" class="nav-link active">
                <i class="bi bi-house-door-fill"></i>Dashboard
            </a>
        </div>

        <div class="nav-item">
            <a href="#" onclick="toggleMenu('productos')" class="nav-link">
                <i class="bi bi-box-seam"></i>Productos
            </a>
            <div id="productos" class="submenu">
                <a href="{{ route('crud.create') }}"><i class="bi bi-plus-circle"></i>Agregar Producto</a>
                <a href="{{ route('crud.index') }}"><i class="bi bi-pencil-square"></i>Gestionar Productos</a>
                <a href="{{ route('tecnico') }}"><i class="bi bi-eye"></i>Ver Panel Productos</a>
            </div>
        </div>

        <div class="nav-item">
            <a href="#" onclick="toggleMenu('usuarios')" class="nav-link">
                <i class="bi bi-people-fill"></i>Usuarios
            </a>
            <div id="usuarios" class="submenu">
                <a href="{{ route('cajeros.create') }}"><i class="bi bi-person-plus-fill"></i>Registrar Cajero</a>
                <a href="{{ route('cajeros.index') }}"><i class="bi bi-person-lines-fill"></i>Lista de Cajeros</a>
                <a href="{{ route('cajeros.exportPdf') }}"><i class="bi bi-file-pdf"></i>Exportar PDF</a>
                <a href="{{ route('cajeros.exportExcel') }}"><i class="bi bi-file-excel"></i>Exportar Excel</a>
            </div>
        </div>

        <div class="nav-item">
            <a href="#" onclick="toggleMenu('ventas')" class="nav-link">
                <i class="bi bi-cash-coin"></i>Ventas
            </a>
            <div id="ventas" class="submenu">
                <a href="{{ route('ventas.index') }}"><i class="bi bi-list-ul"></i>Ver Ventas</a>
                <a href="{{ route('ventas.create') }}"><i class="bi bi-plus-circle"></i>Nueva Venta</a>
            </div>
        </div>

        <div class="nav-item">
            <a href="{{ route('admin.reportes.index') }}" class="nav-link">
                <i class="bi bi-bar-chart-line-fill"></i>Reportes
            </a>
        </div>

        <div class="nav-item">
            <a href="#" onclick="toggleMenu('exportar')" class="nav-link">
                <i class="bi bi-download"></i>Exportar Datos
            </a>
            <div id="exportar" class="submenu">
                <a href="/reporte/pdf"><i class="bi bi-file-pdf"></i>Productos PDF</a>
                <a href="/reporte/excel"><i class="bi bi-file-excel"></i>Productos Excel</a>
            </div>
        </div>

        <div class="nav-item logout-link">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="nav-link">
                <i class="bi bi-box-arrow-right"></i>Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>
</div>

<div class="main-content">
    <div class="top-navbar">
        <nav class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <div class="content-area fade-in">
        <div class="welcome-header">
            <h1>¡Bienvenido, Administrador! 👑</h1>
            <p>Gestiona tu restaurante desde este panel de control</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="total-productos">{{ $stats['productos'] ?? 0 }}</div>
                        <div class="stat-label">Total Productos</div>
                    </div>
                    <div class="stat-icon primary">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="total-cajeros">{{ $stats['cajeros'] ?? 0 }}</div>
                        <div class="stat-label">Cajeros Activos</div>
                    </div>
                    <div class="stat-icon success">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="total-ventas">{{ $stats['ventas'] ?? 0 }}</div>
                        <div class="stat-label">Total Ventas</div>
                    </div>
                    <div class="stat-icon warning">
                        <i class="bi bi-graph-up"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="total-reportes">{{ $stats['reportes'] ?? 0 }}</div>
                        <div class="stat-label">Reportes Subidos</div>
                    </div>
                    <div class="stat-icon danger">
                        <i class="bi bi-file-text"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="ventas-hoy">{{ $stats['ventas_hoy'] ?? 0 }}</div>
                        <div class="stat-label">Ventas Hoy</div>
                    </div>
                    <div class="stat-icon success">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-header">
                    <div>
                        <div class="stat-value" id="ingresos-total">${{ number_format($stats['ingresos_total'] ?? 0, 2) }}</div>
                        <div class="stat-label">Ingresos Totales</div>
                    </div>
                    <div class="stat-icon warning">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
            </div>
        </div>

        @if(($stats['productos_bajo_stock'] ?? 0) > 0)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <strong>¡Atención!</strong> Tienes {{ $stats['productos_bajo_stock'] }} productos con stock bajo (menos de 10 unidades).
            <a href="{{ route('crud.index') }}" class="alert-link">Ver productos</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <div class="quick-actions">
                    <h3><i class="bi bi-lightning-fill text-warning"></i> Acciones Rápidas</h3>
                    <div class="action-grid">
                        <a href="{{ route('crud.create') }}" class="action-btn">
                            <i class="bi bi-plus-circle"></i>
                            Agregar Producto
                        </a>
                        <a href="{{ route('cajeros.create') }}" class="action-btn secondary">
                            <i class="bi bi-person-plus"></i>
                            Registrar Cajero
                        </a>
                        <a href="{{ route('admin.reportes.index') }}" class="action-btn warning">
                            <i class="bi bi-bar-chart"></i>
                            Ver Reportes
                        </a>
                        <a href="{{ route('ventas.index') }}" class="action-btn danger">
                            <i class="bi bi-cash-coin"></i>
                            Gestionar Ventas
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="recent-activity">
                    <h3><i class="bi bi-clock-history"></i> Actividad Reciente</h3>
                    <div class="activity-list">
                        @forelse(\App\Models\Venta::latest()->take(5)->get() as $venta)
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-cart-plus text-success"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Nueva Venta</div>
                                <div class="activity-subtitle">{{ $venta->producto }} - ${{ number_format($venta->total, 2) }}</div>
                                <div class="activity-time">{{ $venta->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        @empty
                        <div class="no-activity">
                            <i class="bi bi-inbox"></i>
                            <p>No hay actividad reciente</p>
                        </div>
                        @endforelse
                        
                        @foreach(\App\Models\Reporte::with('usuario')->latest()->take(3)->get() as $reporte)
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-file-earmark-text text-info"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Reporte Subido</div>
                                <div class="activity-subtitle">Por: {{ $reporte->usuario->name ?? 'Usuario' }}</div>
                                <div class="activity-time">{{ $reporte->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleMenu(id) {
        const submenu = document.getElementById(id);
        const isVisible = submenu.classList.contains('show');
        
        // Close all submenus first
        document.querySelectorAll('.submenu').forEach(menu => {
            menu.classList.remove('show');
        });
        
        // Toggle current submenu
        if (!isVisible) {
            submenu.classList.add('show');
        }
    }

    // Auto-refresh stats every 30 seconds
    setInterval(function() {
        fetch('/admin/stats')
            .then(response => response.json())
            .then(data => {
                if (data.productos !== undefined) {
                    document.getElementById('total-productos').textContent = data.productos;
                }
                if (data.cajeros !== undefined) {
                    document.getElementById('total-cajeros').textContent = data.cajeros;
                }
                if (data.ventas !== undefined) {
                    document.getElementById('total-ventas').textContent = data.ventas;
                }
                if (data.reportes !== undefined) {
                    document.getElementById('total-reportes').textContent = data.reportes;
                }
                if (data.ventas_hoy !== undefined) {
                    document.getElementById('ventas-hoy').textContent = data.ventas_hoy;
                }
                if (data.ingresos_total !== undefined) {
                    document.getElementById('ingresos-total').textContent = '$' + parseFloat(data.ingresos_total).toLocaleString('en-US', {minimumFractionDigits: 2});
                }
            })
            .catch(error => console.log('Stats update failed:', error));
    }, 30000);

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
