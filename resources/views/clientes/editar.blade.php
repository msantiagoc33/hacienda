@extends('plantilla')

@section('cabecera')
<div class="container">
<h1>Editando el huesped {{ $cliente->nombre }}</h1>

@if(session('mensaje'))
    <div class="alert alert-success">{{ session('mensaje')}}</div>
@endif
<br>

<form action="{{ route('clientes.editar', $cliente->id)}}" class="form-control mb-2 container" method="post">
        @method('PUT')
        @csrf

        @error('id')
            <div class="alert alert-danger">El ID es obligatorio</div>
        @enderror

        @error('idPais')
        <div class="alert alert-danger">El ID del Pais es obligatorio</div>
        @enderror

        @error('nombre')
        <div class="alert alert-danger">El NOMBRE es obligatorio</div>
        @enderror

        <input type="text" value="{{ $cliente->id}}" name="id" placeholder="id" class="form-control mb-2">
        <input type="text" value="{{ $cliente->pais_id}}" name="idPais" placeholder="idPais" class="form-control mb-2">
        <input type="text" value="{{ $cliente->nombre}}" name="nombre" placeholder="Nombre" class="form-control mb-2">
        <button class="btn btn-warning btn-block">Editar</button>
</form>
</div>
    
@endsection