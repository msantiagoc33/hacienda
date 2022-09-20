@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Nuevo gasto</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('grabaGasto')}}" method="post">
    @csrf
    <div class="input-group mb-6 margenSuperior mb-3">
            <select id="concepto_id" name="concepto_id" class="fs-3 fw-bold col-6 form-control bg-primary">
                <option value="0">Selecciona un concepto</option>
                @foreach($conceptos as $concepto)
                    <option class="fs-3" value="{{$concepto->id}}">{{ $concepto->nombre }} </option>
                @endforeach
            </select>
        </div>    

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha">
            <label for="fecha">Fecha</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="importe" id="importe" placeholder="Importe">
            <label for="importe">Importe</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario" value="{{ old('comentario') }}">
            <label for="comentario">Comentario</label>
        </div>

        <div class="container">
            <a href="{{ route('gastos') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Agregar</button>
        </div>
    </form>
    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

