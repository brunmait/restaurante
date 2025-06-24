<h2>Panel Técnico</h2>
<a href="{{ route('crud.create') }}">Agregar producto</a>
<ul>
@foreach($productos as $producto)
<li>{{ $producto->nombre }} - <a href="{{ route('crud.edit', $producto->id) }}">Editar</a></li>
@endforeach
</ul>