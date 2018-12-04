<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tecnomedics || @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/bulma/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app/layout.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}
</head>
<body>
  
    
        <div class="navegations-left">
            <img src="{{ url('img/logo.png')}}">
            <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('login') }}">Login</a></li>
                {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
            @else

            @if(Auth::user()->user_type == 1)
                <li><a href="{{ url('app/misCitas')}}">MIS CITAS</a></li>
                <li><a href="{{ url('app/misRecetas')}}">MIS RECETAS</a></li>
            @endif

            @if(Auth::user()->user_type > 2)
                <li><a href="{{ url('app/citas')}}">Citas</a></li>
                <li><a href="{{ url('app/users')}}">Usuarios</a></li>                            
                <li><a href="{{ url('app/recetas')}}">Recetas</a></li>
            @endif

            @if(Auth::user()->user_type == 2)
                <li><a href="{{ url('app/citas')}}">Citas</a></li>
            @endif
                <li><a href="{{ url('logout') }}">Salir</a></li>
                
            @endif
        </ul>
    </div>
        <div class="content">
            @yield('content')
        </div>

    

                    <!-- Right Side Of Navbar -->
                    
                
        

                        

        

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
