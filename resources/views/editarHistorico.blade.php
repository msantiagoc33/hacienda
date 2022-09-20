@extends('plantilla')

@section('cabecera')

<h2 class="container text-center">Editar HISTORICO</h2>
@endsection

@section('cuerpo')
<div class="container">
    <form action="{{ route('updateIngreso', $modificarHistorico->id)}}" method="post">
    <!-- No se puede utilizar put en el form por eso exite este metodo para que lo utilice -->
    @method('PUT')

    @csrf

        <div class="input-group mb-6 margenSuperior mb-3"> 

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="huespedes" id="huespedes" placeholder="Numero huespedes" value="{{ $modificarHistorico->huespedes}}">
            <label for="huespedes">Numero de huespedes</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="{{ $modificarHistorico->cliente->telefono }}">
            <label for="telefono">Telefono</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fechaEntrada" id="fechaEntrada" placeholder="Fecha entrada" value="{{ $modificarHistorico->fechaEntrada}}">
            <label for="fechaEntrada">Fecha entrada</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" name="fechaSalida" id="fechaSalida" placeholder="Fecha salida" value="{{ $modificarHistorico->fechaSalida}}">
            <label for="fechaSalida">Fecha salida</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="importe" id="importe" placeholder="Importe" value="{{ $modificarHistorico->importe}}">
            <label for="importe">Importe</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentario" value="{{ $modificarHistorico->comentario}}">
            <label for="comentario">Comentario</label>
        </div>

        <div class="container">
            <a href="{{ route('historico') }}" class="btn btn-success btn-lg">Volver</a>
            <button class="btn btn-primary btn-lg" type="submit">Actualizar</button>
        </div>
    </form>

    <div id="mensage" class="bg-danger text-white fw-3 m-4"></div>
    

</div>

@endsection

@section('pie')

@endsection

