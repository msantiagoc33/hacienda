@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">(Listado de plataformas)</h2>
@endsection

@section('cuerpo')
<div class="container" style="width:500px">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
    @foreach($plataformas as $plataforma)
    <tr>
      <th scope="row">{{$plataforma->id}}</th>
      <td>{{$plataforma->plataforma}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection

@section('pie')

@endsection