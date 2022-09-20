@if(session('mensaje'))
  <div class="alert alert-primary container">
    {{ session('mensaje')}}
  </div>
@endif