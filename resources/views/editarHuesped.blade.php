@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Editar huesped</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('updateHuesped', $modificarHuesped->id) }}" method="post">
    <!-- No se puede utilizar put en el form por eso exite este metodo para que lo utilice -->
    @method('PUT')

    @csrf

        <div class="input-group mb-6 margenSuperior mb-3">
            <select id="pais_id" name="pais_id" class="fs-3 fw-bold col-6 form-control bg-success">
                <option value="{{ $modificarHuesped->pais_id }}">{{$modificarHuesped->pais->nombre}}</option>
                @foreach($paises as $pais)
                    <option class="fs-3" value="{{$pais->id}}">{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{ $modificarHuesped->nombre}}">
            <label for="nombre">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="{{ $modificarHuesped->telefono}}">
            <label for="telefono">Telefono</label>
        </div>

        <div class="container">
            <a href="{{ route('huespedes') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
        </div>
    </form>

    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

