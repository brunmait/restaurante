<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="min-width: 400px;">
        <h3 class="text-center text-primary mb-4">Registrarse</h3>
        <form method="POST" action="{{ route('registro.guardar') }}">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Correo:</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Contraseña:</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="rol">Rol:</label>
        <select name="rol" class="form-select" required>
            <option value="admin">Administrador</option>
            <option value="tecnico">Técnico</option>
            <option value="cajero">Cajero</option>
            <option value="dueno">Dueño</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success w-100">Registrar</button>
</form>


</body>
</html>
