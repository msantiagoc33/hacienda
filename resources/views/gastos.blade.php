@extends('plantilla')

@section('cabecera')

@if(session('mensaje'))
  <div class="alert alert-success container">
    {{ session('mensaje')}}
  </div>
@endif

<h2 class="container text-center">(Listado de gastos)</h2>
<div class="container"><a href="{{ route('nuevoGasto') }}" class="btn btn-primary">Nuevo gasto</a></div>
@endsection
@php
$suma = 0;
@endphp
@section('cuerpo')
<table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CONCEPTO</th>
      <th scope="col">FECHA</th>
      <th scope="col">IMPORTE</th>
      <th scope="col">COMENTARIO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  @foreach($gastos as $gasto)
    <tr>
    <th scope="row">{{$gasto->id}}</th>
      <td>{{$gasto->concepto->nombre}}</td>
      <td>{{$gasto->fecha}}</td>
      <td>{{$gasto->importe}}</td>
      <td>{{$gasto->comentario}}</td>
      <td>
        <form action="{{ route('eliminarGasto', $gasto) }}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-info btn-sm"  type="submit" onclick=" return confirm('Estas seguro de borrar este gasto ?')">Eliminar</button>
        </form>
      </td>

      <td><a href="{{ route('modificarGasto', $gasto) }}" class="btn btn-warning btn-sm">Editar</a></td>
      
      <td><a href="{{ route('verGasto', $gasto) }}" class="btn btn-success btn-sm">Ver</a></td>
    </tr>
   
    @endforeach
    
  </tbody>
</table>


<div class="d-flex justify-content-center">
    {!! $gastos->links() !!}
</div> 

@foreach($total as $pago)
@php
$suma += $pago->importe;
@endphp 
@endforeach

<div class="text-lg-start container fs-3 fw-bold text-danger">
<div class="text-end">Suma el total de los gastos: <span class='text-primary'> {{ number_format($suma,2,',','.')}} </span> euros.</div>
</div>

@endsection

@section('pie')

@endsection