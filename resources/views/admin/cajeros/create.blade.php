@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3>Registrar Cajero</h3>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('cajeros.store') }}">
            @csrf
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
            <button class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
