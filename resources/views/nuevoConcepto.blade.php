@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Nuevo CONCEPTO</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('grabaConcepto')}}" method="post">
    @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Concepto">
            <label for="nombre">Concepto</label>
        </div>

        <div class="container">
            <a href="{{ route('conceptos') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Agregar</button>
        </div>
    </form>
    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

