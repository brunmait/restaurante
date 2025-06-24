<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cajeros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h3 class="mb-3"><i class="bi bi-clipboard-data"></i> LISTA DE CAJEROS</h3>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <a href="{{ route('cajeros.exportPdf') }}" class="btn btn-danger me-2">📄 Exportar PDF</a>
                <a href="{{ route('cajeros.exportExcel') }}" class="btn btn-success">📊 Exportar Excel</a>
            </div>
            <a href="{{ route('cajeros.create') }}" class="btn btn-primary">➕ Añadir nuevo</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-warning text-center">
                <tr>
                    <th>👤 Nombre</th>
                    <th>📧 Correo</th>
                    <th>📅 Fecha Registro</th>
                    <th>🛠️ Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($cajeros as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('cajeros.edit', $c->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                            <form action="{{ route('cajeros.destroy', $c->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar este cajero?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No se encontraron cajeros.</td></tr>
                @endforelse
            </tbody>
        </table>
            </table>

    <div class="text-end mt-3">
        <a href="{{ url('/admin') }}" class="btn btn-outline-dark">🏠 Volver al Panel Admin</a>
    </div>

    </div>
</body>
</html>
