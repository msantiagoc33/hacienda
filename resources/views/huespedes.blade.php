@extends('plantilla')

@section('cabecera')
  <h2 class="container text-center">Listado de huespedes</h2>

  @if(session('mensaje'))
    <div class="alert alert-success container">
      {{session("mensaje")}}
    </div>
  @endif

@endsection

@section('cuerpo')
<table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">#Pais</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
    </tr>
  </thead>
  <tbody>
    @foreach($huespedes as $huesped)
    <tr>
      <th scope="row">{{$huesped->id}}</th>
      <td>{{$huesped->pais->nombre}}</td>
      <td>{{$huesped->nombre}}</td>
      <td>{{$huesped->telefono}}</td>
      <td>
        <form action="{{ route('eliminarHuesped', $huesped->id) }}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-info btn-sm"  type="submit" onclick=" return confirm('Estas seguro de borrar este gasto ?')">Eliminar</button>
        </form>
      </td>

      <td><a href="{{ route('modificarHuesped', $huesped->id) }}" class="btn btn-warning btn-sm">Editar</a></td>
      
      <td><a href="{{ route('verHuesped', $huesped->id) }}" class="btn btn-success btn-sm">Ver</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $huespedes->links() !!}
</div>  
<div class="d-flex justify-content-center"><a href="{{ route('nuevoHuesped') }}" class="btn btn-primary">Nuevo HUESPED</a></div>

@endsection

@section('pie')

@endsection