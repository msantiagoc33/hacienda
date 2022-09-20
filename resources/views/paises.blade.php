@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">Listado de paises</h2>
@endsection

@section('cuerpo')
<div style="width:500px;" class="container">
<table class="table table-striped container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
    @foreach($paises as $pais)
    <tr>
      <th scope="row">{{$pais->id}}</th>
      <td>{{$pais->nombre}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection

@section('pie')

@endsection