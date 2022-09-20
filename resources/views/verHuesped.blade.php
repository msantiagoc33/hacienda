<?php use Carbon\Carbon;  ?>
    

@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">Detalle del huesped</h2>
@endsection

@section('cuerpo')

        <div class="card container" style="width: 30rem;">
            <div class="card-body">
            <ul class="list-group list-group-flush">
                <span class="fw-bold">PAIS</span><li class="list-group-item">{{ $huesped->pais->nombre }}</li>
                <span class="fw-bold">NOMBRE</span><li class="list-group-item">{{ $huesped->nombre }}</li>
                <span class="fw-bold">TELEFONO</span><li class="list-group-item">{{ $huesped->telefono }}</li>

                <a href="{{ route('huespedes') }}" class="btn btn-primary container">Volver</a>
            </ul>

@endsection

@section('pie')

@endsection