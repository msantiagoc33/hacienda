<?php use Carbon\Carbon;  ?>
    

@extends('plantilla')

@section('cabecera')

@if(session('mensaje'))
  <div class="alert alert-success container">
    {{ session('mensaje')}}
  </div>
@endif

<h2 class="container text-center">Listado de ingresos</h2>
<div class="container">
  <div class=" d-inline"><a href="{{ route('nuevoIngreso') }}" class="btn btn-primary">Nuevo INGRESO</a></div>
  <div class=" d-inline"><a href="{{ route('nuevoHuesped') }}" class="btn btn-primary">Nuevo HUESPED</a></div>



@endsection
@php
  $sumaPendiente = 0;
  $sumaHistorico = 0;
@endphp

@section('cuerpo')

<?php $hoy = new Carbon; ?>

<table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col" class="text-center">PLATAFORMA</th>
      <th scope="col" class="text-center">CLIENTE</th>
      <th scope="col" class="text-center">HUESPEDES</th>
      <th scope="col" class="text-center">TELEFONO</th>
      <th scope="col" class="text-center">ENTRADA</th>
      <th scope="col" class="text-center">SALIDA</th>
      <th scope="col" class="text-center">IMPORTE</th>



    </tr>
  </thead>
  <tbody>
        
  <?php $hoy = strtotime($hoy); ?>
      
  @foreach($ingresos as $ingreso)
    <?php $fecha = strtotime($ingreso->fechaEntrada); ?>
      
    @if( $fecha > $hoy)
        <tr class='text-body bg-danger'>
    @else
        <tr class='text-body bg-primary'>
    @endif

      <td>{{ $ingreso->plataforma->plataforma}}</td>
      <td>{{ $ingreso->cliente->nombre}}</td> 
      <td class="text-center">{{ $ingreso->huespedes}}</td>  
      <td class="text-center">{{ $ingreso->cliente->telefono }}</td>
      <td class="text-center">{{ Carbon::parse($ingreso->fechaEntrada)->format('d/m/Y') }}</td>
      <td class="text-center">{{ Carbon::parse($ingreso->fechaSalida)->format('d/m/Y') }}</td>
      <td class="" style='text-align:right;'>{{ $ingreso->importe}}</td>
      <!-- Eliminar registro ------------------------------------------->
      <td>
        <form action="{{ route('eliminarIngreso', $ingreso) }}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-info btn-sm"  type="submit" onclick=" return confirm('Estas seguro de borrar este ingreso ?')">Eliminar</button>
        </form>
      </td>
      <!-- ---------------------------------------------------------- -->
      
      <td><a href="{{ route('modificarIngreso', $ingreso) }}" class="btn btn-warning btn-sm">Editar</a></td>
      
      <td><a href="{{ route('verIngreso', $ingreso) }}" class="btn btn-success btn-sm">Ver</a></td>
    </tr>
    @endforeach

  </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $ingresos->links() !!}
</div> 

@foreach($pendiente as $pendiente)
@php
$sumaPendiente += $pendiente->importe;
@endphp
@endforeach

@foreach($historico as $pagado)
@php
$sumaHistorico += $pagado->importe;
@endphp
@endforeach

<div class="text-lg-start container fs-4 fw-bold text-danger">
<div class="text-end">Suma el total de pagos pendientes: <span class='text-primary'>{{ number_format($sumaPendiente,2,',','.')}} </span>  euros.</div>

<div class="text-end">Suma el total de pagos cobrados: <span class='text-primary'>{{ number_format($sumaHistorico,2,',','.')}} </span> euros.</div>
<div class="text-end">---------------------------------------------</div>
<div class="text-end">Gran total: <span class='text-primary'>{{ number_format(($sumaHistorico+$sumaPendiente),2,',','.')}} </span>euros.</div>



@endsection

@section('pie')

@endsection