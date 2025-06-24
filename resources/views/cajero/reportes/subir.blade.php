<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-upload"></i> Subir Reporte de Ventas</h5>
                </div>

                <div class="card-body bg-white">
                    <form action="{{ route('reportes.subir') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="archivo" class="form-label"><i class="bi bi-file-earmark-arrow-up"></i> Seleccionar archivo</label>
                            <input type="file" name="archivo" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cajero.panel') }}" class="btn btn-outline-secondary">
                                ⬅️ Volver al Panel del Cajero
                            </a>
                            <button class="btn btn-success">
                                <i class="bi bi-cloud-arrow-up"></i> Subir Reporte
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
