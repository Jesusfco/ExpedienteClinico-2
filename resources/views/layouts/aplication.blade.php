<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{url('icon.ico')}}">
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
            <a href="{{ url('/') }}">
            <img src="{{ url('img/logo.png')}}"></a>
            <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('login') }}">Login</a></li>
                {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
            @else

            @if(Auth::user()->user_type == 1)
                <li><a href="{{ url('app/crearCita')}}">CREAR CITA</a></li>
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
                <li><a href="{{ url('app/users')}}">Usuarios</a></li> 
            @endif
                <li><a href="{{ url('logout') }}">Salir</a></li>
                
            @endif
        </ul>

        <div class="userDataInfo">
            <p><a href="{{ url('app/perfil') }}">{{Auth::user()->fullName() }}</a></p>
            <p>{{ Auth::user()->userTypeView()}}</p>

        </div>
    </div>

    <div id="notification">
        <h5 v-on:click="showNot()">Notificaciones @{{notificationNotRead()}}</h5>
        <div v-if="notView">
        <a v-bind:class="{ 'readedNot': not.read == 1 }" v-bind:href="generateLink(not)"  v-for="not in notifications">
                    
                <p><strong>@{{ not.title }}</strong> @{{not.description}}</p>

            </a>
        </div>
    </div>
        <div class="content">
            @yield('content')
        </div>

    

                    <!-- Right Side Of Navbar -->
                    
                
        

                        

        

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    {{-- <script src="{{ url('js/app/notification.js')}}"></script> --}}
    <script>

        var basicUrl = "{{url('/')}}";
        var notification = new Vue({
        el: '#notification',
        

        data: {
           
            notView: false,
           notifications: [],



        },

        created: function () {

            setTimeout(() => {
                
                this.getNotifications();                                
                
            }, 100);

        },

        methods: {

            generateLink: function(not) {
                
                return basicUrl + '/' + not.url;
            }, 
            showNot: function() {
                this.notView = !this.notView;
                if(this.notView && this.notificationNotRead() > 0) {
                    this.setReadNotifications();
                }
            },
            notificationNotRead: function()  {

                let counter = 0;
                for(let not of this.notifications) {
                    if(not.read == 0) {
                        counter++;
                    }
                }

                return counter;

            },
            getNotifications: function() {                
                    
                axios.get(basicUrl + '/app/getNotifications', )

                .then((response) => {

                    for(let not of response.data) {
                        this.notifications.push(not);                    
                    }
                    


                }).catch((error) => {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            },


            setReadNotifications: function() {
                axios.get(basicUrl + '/app/setReadNotifications', )

                .then((response) => {

                    

                }).catch((error) => {
                    

                });
            }

        }

        });
    </script>
    @yield('scripts')
</body>
</html>
