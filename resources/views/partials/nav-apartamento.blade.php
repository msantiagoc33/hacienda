<h2 class="container text-center">Apartamento SANGUT (Hacienda Beach)</h2>
  <nav class="navbar navbar-expand-lg bg-light">
  
  <div class="container-fluid container" id="cabecera">

    <div class="collapse navbar-collapse container fs-3" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('index')}}">SANGUT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('hospedajes')}}">Ingresos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('gastos')}}">Gastos</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('huespedes')}}">Huespedes</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('paises')}}">Paises</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('conceptos')}}">Conceptos</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('historico')}}">Historico</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('plataformas')}}">Plataformas</a>
        </li>

        <li class="nav-item">        
          <!-- <form action="{{ route('logout')}}" method="post">
              @csrf  -->
              <!-- <a href="#" class="" onclick="this.closest('form').submit()">Desconectar</a> -->
              <a class="nav-link" href="{{ route('logout')}}">Desconectar</a>
              <!-- <button class="d-inline" type="submit">Desconectar</button> -->
          <!-- </form> -->
        </li>

      </ul>
    </div>
  </div>
</nav>