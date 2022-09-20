@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Editar ingreso</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('updateIngreso', $modificarIngreso->id)}}" method="post">
    <!-- No se puede utilizar put en el form por eso exite este metodo para que lo utilice -->
    @method('PUT')

    @csrf

        <div class="input-group mb-6 margenSuperior mb-3">
            
            <select id="paisSeleccionado" name="cliente_id" class="fs-3 fw-bold col-6 form-control bg-primary">
            <option value="{{ $modificarIngreso->cliente_id }}">{{$modificarIngreso->cliente->nombre}}</option>
                @foreach($clientes as $cliente)
                    <option class="fs-3" value="{{$cliente->id}}">{{ $cliente->nombre }} ({{$cliente->telefono}}) </option>
                @endforeach
            </select>

            <select id="plataformaSeleccionada" name="plataforma_id" class="fs-3 fw-bold col-6 form-control bg-success">
                <option value="{{ $modificarIngreso->plataforma_id }}">{{$modificarIngreso->plataforma->plataforma}}</option>
                @foreach($plataformas as $plataforma)
                    <option class="fs-3" value="{{$plataforma->id}}">{{ $plataforma->plataforma }}</option>
                @endforeach
            </select>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="huespedes" id="huespedes" placeholder="Numero huespedes" value="{{ $modificarIngreso->huespedes}}">
            <label for="huespedes">Numero de huespedes</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fechaEntrada" id="fechaEntrada" placeholder="Fecha entrada" value="{{ $modificarIngreso->fechaEntrada}}">
            <label for="fechaEntrada">Fecha entrada</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fechaSalida" id="fechaSalida" placeholder="Fecha salida" value="{{ $modificarIngreso->fechaSalida}}">
            <label for="fechaSalida">Fecha salida</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="importe" id="importe" placeholder="Importe" value="{{ $modificarIngreso->importe}}">
            <label for="importe">Importe</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario" value="{{ $modificarIngreso->comentario}}">
            <label for="comentario">Comentario</label>
        </div>

        <div class="container">
            <a href="{{ route('hospedajes') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
        </div>
    </form>

    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

