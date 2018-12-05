@extends('layouts.aplication')
@section('title', 'Crear Receta Medica') 
@section('content')


    <h1>Crear Usuario</h1>

    <div class="panel-body" id="app">

        <h5>Buscar Paciente</h5>
        <div class="field">
            <label class="label">Nombre</label>
            <input class="input" placeholder="Nombre" v-model="search.name">
        </div>
        {{-- <input placeholder="Apellido Paterno" v-model="search.patern">
        <input placeholder="Apellido Materno" v-model="search.matern"> --}}

        <button class="button is-link" v-on:click="sugestUsers()">Buscar </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">A Paterno</th>
                    <th scope="col">A Materno</th>
                    
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>     
                <tr v-for="sugest in sugests" >
                    
                <td> @{{ sugest.id }}</td>
                <td> @{{ sugest.name }}</td>
                <td> @{{ sugest.patern }}</td>
                <td> @{{ sugest.matern }}</td>
                <td> <button v-on:click="selectUser(sugest)" type="button" class="btn btn-success btn-sm">Seleccionar</button></td>
                    
                    
                </tr>
            </tbody>
        </table>

        <form  method="POST" action=""  onsubmit="return app.checkForm()">
            {{ csrf_field() }}

            <input type="hidden" name="user_id" v-model="recipe.user_id">
            
            <input type="hidden" name="medic" id="1" value="">

            <div class="field">
                <label >Paciente</label>
                <input type="text" class="input" name="pacient" value="{{ old('pacient') }}" v-model="recipe.pacient" disabled>
            </div>

            <div class="field">
                <label >Medico</label>
                <input type="text" class="input" name="medic" value="{{ Auth::user()->name }} {{ Auth::user()->patern }} {{ Auth::user()->matern }}" disabled>
            </div>

            

            

            <button type="submit" class="button is-success">Crear Receta</button>

        </form>

        
            
    </div>

</div>

            
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
{{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
<script>
    
    var app = new Vue({
        el: '#app',

        data: {

            recipe: {
                pacient: null,
                medic: null,
                user_id: null,
                
                date: null,
                
            },
            
            search: {
                name: '',
                patern: '',
                matern: '',
            },
            sugests: [],
            
        },

        // created: function () {

        //     setTimeout(() => {

        //         let d = new date();
                
        //         app.recipe.date = d.getDate() + '/' + d.getMonth() + '/' + d.getYearh();
                
                
                
        //     }, 100);

        // },

         methods: {
            sugestUsers: function () {

                var formD = new FormData();
                formD.append('name', this.search.name);
                formD.append('patern', this.search.patern);
                formD.append('matern', this.search.matern);

                axios.post('create/getSugest', formD)

                .then(function(response) {

                    app.sugests = [];

                    for(let x of response.data) {
                        
                        app.sugests.push(x);                        

                    }


                }).catch(function(error) {

                  

                });
            },

            selectUser: function(user) {
                
                

                app.recipe.user_id = user.id;
                app.recipe.pacient = user.name + ' ' + user.patern + ' ' + user.matern;

                
            },

            checkForm: function() {

                let validate = true;
                if(app.recipe.pacient == null) validate = false;

                return validate;

            }
        }
        });
    
</script>
@endsection
