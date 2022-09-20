@extends('plantilla')

@section('cabecera')
@if(session('mensaje'))
  <div class="alert alert-success container">
    {{ session('mensaje')}}
  </div>
@endif

<h2 class="container text-center">Listado de conceptos de gastos</h2>

@endsection

@section('cuerpo')
<div class="container" style="width:500px">
<table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
    @foreach($conceptos as $concepto)
    <tr>
      <th scope="row">{{$concepto->id}}</th>
      <td>{{$concepto->nombre}}</td>
      <td>
        <form action="{{ route('eliminarConcepto', $concepto->id) }}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-info btn-sm"  type="submit" onclick=" return confirm('Estas seguro de borrar este gasto ?')">Eliminar</button>
        </form>
      </td>

      <td><a href="{{ route('modificarConcepto', $concepto->id) }}" class="btn btn-warning btn-sm">Editar</a></td>
      
    </tr>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<div class="d-flex justify-content-center">
    {!! $conceptos->links() !!}
    
</div> 
<div class="d-flex justify-content-center"><a href="{{ route('nuevoConcepto') }}" class="btn btn-primary">Nuevo CONCEPTO</a></div>

@endsection

@section('pie')

@endsection