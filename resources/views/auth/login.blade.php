<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

    <style>
            .container{
                margin-top: 10%;
            }
            .card{
                width: 800px;
            }
            .cabecera{
                text-align: center;
                color: #007fff;
            }
            .input-group{
                width: 500px;
            }
            .miboton{
                margin-bottom: 15px;
            }
        </style>
</head>
<body>
    
    </div>
        <div class="container">
            <div class="card mx-auto">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="cabecera">
                        <h3>Apartamento <span class="fst-italic text-warning"> SANGUT (Hacienda Beach)</span></h3>
                        <h4>Identifícate</h4>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text" id="basic-addon1">Correo del usuario</span>
                        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3 mx-auto">
                        <span class="input-group-text" id="basic-addon1">Su contraseña</span>
                        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="input-group mb-3 mx-auto">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                        </label>
                    </div>

                    <div class="input-group mb-3 mx-auto">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Has olvidado la password ?') }}
                            </a>
                        @endif
                    </div>

                    <div class="miboton mx-auto d-grid gap-2 col-6">
                        <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script src="{{ asset('/jquery.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="{{ asset('/ingresos.js') }}"></script>
        <script src="{{ asset('/gastos.js') }}"></script>
        <script src="{{ asset('/huesped.js') }}"></script>
    </body>
</html>