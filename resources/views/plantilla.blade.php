
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style>
            #cabecera{
                background-color: #577399;
                color: white;
                font-family: 'Nanum Gothic', sans-serif;
                font-size: 1.3em;
                padding: 5px 0 5px 0;
                font-weight: bold;
                border-radius: 5px;
            }
            .nav-item a{
              color: white;
            }
        </style>
  </head>

  <body>
    @include('partials.nav-apartamento')

    @include('partials.session-status')

    @yield('cabecera')

    @yield('cuerpo')
    
    @yield('pie')
    <script src="{{ asset('/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{ asset('/ingresos.js') }}"></script>
    <script src="{{ asset('/gastos.js') }}"></script>
    <script src="{{ asset('/huesped.js') }}"></script>
  </body>
</html>
