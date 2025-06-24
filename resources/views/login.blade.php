<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="min-width: 350px;">
        <h3 class="text-center text-primary mb-4">Iniciar Sesión</h3>

        <!-- ✅ Aquí va el mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- ✅ También podés mostrar errores del login -->
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Ingresar</button>
            </div>
        </form>
    </div>
</body>
</html>
