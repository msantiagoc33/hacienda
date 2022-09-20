<?php use Carbon\Carbon;  ?>
    

@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">Detalle del HISTORICO</h2>
@endsection

@section('cuerpo')

        <div class="card container" style="width: 30rem;">
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <span class="fw-bold">PLATAFORMA</span><li class="list-group-item">{{ $historico->plataforma->plataforma }}</li>
                <span class="fw-bold">HUESPED</span><li class="list-group-item">{{ $historico->cliente->nombre }}</li>
                <span class="fw-bold">TELEFONO</span><li class="list-group-item">{{ $historico->cliente->telefono }}</li>
                <span class="fw-bold">ENTRADA</span> <li class="list-group-item">{{ Carbon::parse($historico->fechaEntrada)->format('d/m/Y') }}</li>
                <span class="fw-bold">SALIDA</span><li class="list-group-item">{{ Carbon::parse($historico->fechaSalida)->format('d/m/Y') }}</li>
                <span class="fw-bold">IMPORTE</span><li class="list-group-item">{{ $historico->importe}}</li>
                <span class="fw-bold">COMENTARIO</span><li class="list-group-item">{{ $historico->comentario}}</li>
                <a href="{{ route('historico') }}" class="btn btn-primary container">Volver</a>
            </ul>
            </div>    
        </div>
@endsection

@section('pie')

@endsection