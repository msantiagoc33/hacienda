@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Nuevo huesped</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('grabaHuesped') }}" method="post">
    @csrf

    @error('concepto_id')
    <div class="alert alert-danger">El PAIS es obligatorio</div>
    @enderror

    @error('nombre')
    <div class="alert alert-danger">El NOMBRE es obligatorio</div>
    @enderror

    @error('telefono')
    <div class="alert alert-danger">El TELEFONO es obligatorio</div>
    @enderror

        <div class="input-group mb-6 margenSuperior mb-3">
            <select id="pais_id" name="pais_id" class="fs-3 fw-bold col-6 form-control bg-primary">
                <option value="0">Selecciona el pais</option>
                @foreach($paises as $pais)
                    <option class="fs-3" value="{{$pais->id}}">{{ $pais->nombre }} </option>
                @endforeach
            </select>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombreHuesped" id="nombreHuesped" placeholder="Nombre">
            <label for="nombreHuesped">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
            <label for="telefono">Telefono</label>
        </div>

        <div class="container">
            <a href="{{ route('huespedes') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Agregar</button>
        </div>
    </form>

    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

