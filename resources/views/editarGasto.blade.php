@extends('plantilla')

@section('cabecera')


<h2 class="container text-center">Editar gasto</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('updateGasto', $modificarGasto->id)}}" method="post">
    <!-- No se puede utilizar put en el form por eso exite este metodo para que lo utilice -->
    @method('PUT')

    @csrf

        <div class="input-group mb-6 margenSuperior mb-3">
            <select id="conceptoSeleccionada" name="concepto_id" class="fs-3 fw-bold col-6 form-control bg-success">
                <option value="{{ $modificarGasto->concepto_id }}">{{$modificarGasto->concepto->nombre}}</option>
                @foreach($conceptos as $concepto)
                    <option class="fs-3" value="{{$concepto->id}}">{{ $concepto->nombre }}</option>
                @endforeach
            </select>
        </div>    

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="{{ $modificarGasto->fecha}}">
            <label for="fecha">Fecha</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="importe" id="importe" placeholder="Importe" value="{{ $modificarGasto->importe}}">
            <label for="importe">Importe</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario" value="{{ $modificarGasto->comentario}}">
            <label for="comentario">Comentario</label>
        </div>

        <div class="container">
            <a href="{{ route('gastos') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
        </div>
    </form>

    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

