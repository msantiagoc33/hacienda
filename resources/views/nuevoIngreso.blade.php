@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Nuevo ingreso</h2>
@endsection

@section('cuerpo')
<div class="container" style="width: 500px;">
    <form action="{{ route('grabaIngreso')}}" method="post">
    @csrf

    <div class="input-group mb-6 margenSuperior mb-3">
            <select id="cliente_id" name="cliente_id" class="fs-5 fw-bold col-6 form-control bg-primary">
                <option value="0">El cliente ?</option>
                @foreach($clientes as $cliente)
                    <option class="fs-3" value="{{$cliente->id}}">{{ $cliente->nombre }} ({{$cliente->telefono}}) </option>
                @endforeach
            </select>
           
            <select id="plataforma_id" name="plataforma_id" class="fs-5 fw-bold col-6 form-control bg-success">
                <option value="0">La plataforma ?</option>
                @foreach($plataformas as $plataforma)
                    <option class="fs-3" value="{{$plataforma->id}}">{{ $plataforma->plataforma }}</option>
                @endforeach
            </select>
        </div>    
        {!! $errors->first('cliente_id', '<small>:message</small><br>') !!}
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="huespedes" id="huespedes" placeholder="Numero huespedes" value="{{ old('huespedes') }}">
            <label for="huespedes">Numero de huespedes</label>
            {!! $errors->first('huespedes', '<small>:message</small><br>') !!}
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fechaEntrada" id="fechaEntrada" placeholder="Fecha entrada" value="{{ old('fechaEntrada') }}">
            <label for="fechaEntrada">Fecha entrada</label>
            {!! $errors->first('fechaEntrada', '<small>:message</small><br>') !!}
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fechaSalida" id="fechaSalida" placeholder="Fecha salida" value="{{ old('fechaSalida') }}">
            <label for="fechaSalida">Fecha salida</label>
            {!! $errors->first('fechaSalida', '<small>:message</small><br>') !!}
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="importe" id="importe" placeholder="Importe" value="{{ old('importe') }}">
            <label for="importe">Importe</label>
            {!! $errors->first('importe', '<small>:message</small><br>') !!}
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario" value="{{ old('comentario') }}">
            <label for="comentario">Comentario</label>
        </div>

        <div class="container">
            <a href="{{ route('hospedajes') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Agregar</button>
        </div>
    </form>
    

</div>

@endsection

@section('pie')

@endsection

