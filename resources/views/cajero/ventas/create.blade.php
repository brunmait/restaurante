<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function mostrarCampoOtroPrecio(select) {
            const otroInput = document.getElementById('otro_precio');
            otroInput.style.display = select.value === 'otro' ? 'block' : 'none';
            calcularTotal();
        }

        function calcularTotal() {
            let cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            let precioSelect = document.getElementById('precio');
            let precio = precioSelect.value === 'otro'
                ? parseFloat(document.getElementById('otro_input').value) || 0
                : parseFloat(precioSelect.value);

            document.getElementById('total_mostrar').textContent = (cantidad * precio).toFixed(2);
        }
    </script>
</head>
<body class="bg-light p-4">
<div class="container">
    <h3 class="mb-4">Registrar Nueva Venta</h3>

    <form method="POST" action="{{ route('ventas.store') }}">
        @csrf

        <div class="mb-3">
            <label>Producto</label>
            <select name="producto" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Chacho">Chancho</option>
                <option value="Pollo">Pollo</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" class="form-control" required oninput="calcularTotal()">
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <select id="precio" name="precio" class="form-control" onchange="mostrarCampoOtroPrecio(this)" required>
                <option value="">Seleccione</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="80">80</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="mb-3" id="otro_precio" style="display: none;">
            <label>Otro Precio</label>
            <input type="number" step="0.01" name="otro_input" id="otro_input" class="form-control" oninput="calcularTotal()">
        </div>

        <div class="alert alert-info">
            <strong>Total:</strong> Bs <span id="total_mostrar">0.00</span>
        </div>

        <button class="btn btn-success">Registrar Venta</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Ver Ventas</a>
    </form>
</div>
</body>
</html>
