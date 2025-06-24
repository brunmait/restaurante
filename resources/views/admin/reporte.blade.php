<h2>Reporte de Productos</h2>
<table>
@foreach($productos as $producto)
<tr><td>{{ $producto->nombre }}</td><td>{{ $producto->precio }}</td></tr>
@endforeach
</table>
<a href="{{ route('reporte.pdf') }}">Descargar PDF</a>