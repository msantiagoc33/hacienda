@extends('plantilla')

@section('cabecera')
<h2 class="container text-center">Listado de HISTORICOS</h2>
@endsection

@section('cuerpo')
<table class="table table-striped container">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">PLATAFORMA</th>
      <th scope="col">CLIENTE</th>
      <th scope="col">ENTRADA</th>
      <th scope="col">SALIDA</th>
      <th scope="col">IMPORTE</th>
      <th scope="col">COMENTARIO</th>
    </tr>
  </thead>
  <tbody>
  @foreach($historicos as $historico)
    <tr>
    <th scope="row">{{$historico->id}}</th>
      <td>{{$historico->plataforma->plataforma}}</td>
      <td>{{$historico->cliente->nombre}}</td>
      <td>{{$historico->fechaEntrada}}</td>
      <td>{{$historico->fechaSalida}}</td>
      <td>{{$historico->importe}}</td>
      <td>{{$historico->comentario}}</td>
      <td>
        <form action="{{ route('eliminarHistorico', $historico) }}" method="post" >
          @csrf
          @method('DELETE')
          <button class="btn btn-info btn-sm"  type="submit" onclick=" return confirm('Estas seguro de querer BORRAR este registro de HISTORICO ?')">Eliminar</button>
        </form>
      </td>

      <td><a href="{{ route('modificarHistorico', $historico) }}" class="btn btn-warning btn-sm">Editar</a></td>
      
      <td><a href="{{ route('verHistorico', $historico) }}" class="btn btn-success btn-sm">Ver</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

  <div class="alert alert-success container">
    {{ session('mensaje')}}
  </div>


<div class="d-flex justify-content-center">
    {!! $historicos->links() !!}
</div> 

@endsection

@section('pie')

@endsection