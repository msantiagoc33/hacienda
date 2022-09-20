<?php use Carbon\Carbon;  ?>
    

@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">(Detalle del gasto)</h2>
@endsection

@section('cuerpo')

        <div class="card container" style="width: 30rem;">
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <span class="fw-bold">CONCEPTO</span><li class="list-group-item">{{ $gasto->concepto->nombre    }}</li>
                <span class="fw-bold">FECHA</span><li class="list-group-item">{{ $gasto->fecha }}</li>
                <span class="fw-bold">IMPORTE</span><li class="list-group-item">{{ $gasto->importe }}</li>
                <span class="fw-bold">COMENTARIO</span><li class="list-group-item">{{ $gasto->comentario}}</li>
                <a href="{{ route('gastos') }}" class="btn btn-primary container">Volver</a>
            </ul>

@endsection

@section('pie')

@endsection