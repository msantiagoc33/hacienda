@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">(Listado de usuarios)</h2>
@endsection

@section('cuerpo')
<table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    @foreach($usuarios as $usuario)
    <tr>
      <th scope="row">{{$usuario->id}}</th>
      <td>{{$usuario->nombre}}</td>
      <td>{{$usuario->password}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('pie')

@endsection