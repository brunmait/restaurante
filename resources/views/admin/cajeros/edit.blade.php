<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cajero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container" style="max-width: 600px;">
        <h3 class="mb-4">✏️ Editar Cajero</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('cajeros.update', $cajero->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $cajero->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" value="{{ $cajero->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nueva contraseña <small>(opcional)</small></label>
                <input type="password" name="password" class="form-control" placeholder="Dejar vacío si no se cambia">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('cajeros.index') }}" class="btn btn-secondary">⬅️ Cancelar</a>
                <button type="submit" class="btn btn-warning">💾 Guardar Cambios</button>
            </div>
        </form>
    </div>
</body>
</html>
