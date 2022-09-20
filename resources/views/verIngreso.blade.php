<?php use Carbon\Carbon;  ?>
    

@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">(Detalle del ingreso)</h2>
@endsection

@section('cuerpo')

        <div class="card container" style="width: 30rem;">
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <span class="fw-bold">PLATAFORMA</span><li class="list-group-item">{{ $ingreso->plataforma->plataforma }}</li>
                <span class="fw-bold">HUESPED</span><li class="list-group-item">{{ $ingreso->cliente->nombre }}</li>
                <span class="fw-bold">TELEFONO</span><li class="list-group-item">{{ $ingreso->cliente->telefono }}</li>
                <span class="fw-bold">ENTRADA</span> <li class="list-group-item">{{ Carbon::parse($ingreso->fechaEntrada)->format('d/m/Y') }}</li>
                <span class="fw-bold">SALIDA</span><li class="list-group-item">{{ Carbon::parse($ingreso->fechaSalida)->format('d/m/Y') }}</li>
                <span class="fw-bold">IMPORTE</span><li class="list-group-item">{{ $ingreso->importe}}</li>
                <span class="fw-bold">COMENTARIO</span><li class="list-group-item">{{ $ingreso->comentario}}</li>
                <a href="{{ route('hospedajes') }}" class="btn btn-primary container">Volver</a>
            </ul>

@endsection

@section('pie')

@endsection