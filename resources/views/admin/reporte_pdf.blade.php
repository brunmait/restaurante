<h2>PDF de Productos</h2>
<table>
@foreach($productos as $producto)
<tr><td>{{ $producto->nombre }}</td><td>{{ $producto->precio }}</td></tr>
@endforeach
</table>