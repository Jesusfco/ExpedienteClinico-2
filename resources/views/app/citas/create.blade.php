@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Crear Usuario</div>

    <div class="panel-body" id="app">

        <h5>Buscar Paciente/Medico</h5>
        <input placeholder="Nombre" v-model="search.name">
        <input placeholder="Apellido Paterno" v-model="search.patern">
        <input placeholder="Apellido Materno" v-model="search.matern">

        <button v-on:click="sugestUsers()">Buscar </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">A Paterno</th>
                    <th scope="col">A Materno</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>     
                <tr v-for="sugest in sugests" >
                    
                <td> @{{ sugest.id }}</td>
                <td> @{{ sugest.name }}</td>
                <td> @{{ sugest.patern }}</td>
                <td> @{{ sugest.matern }}</td>
                <td> @{{ sugest.type }}</td>
                <td> <button v-on:click="selectUser(sugest)" type="button" class="btn btn-success btn-sm">Seleccionar</button></td>
                    
                    
                </tr>
            </tbody>
        </table>

        <form  method="POST" action=""  onsubmit="return app.checkForm()">
            {{ csrf_field() }}

            <input type="hidden" name="user_id" v-model="date.user_id">
            <input type="hidden" name="medic_id" v-model="date.medic_id">

            <div class="form-group">
                <label >Paciente</label>
                <input type="text" class="form-control" name="pacient" value="{{ old('pacient') }}" v-model="date.pacient" disabled>
            </div>

            <div class="form-group">
                <label >Medico</label>
                <input type="text" class="form-control" name="medic" value="{{ old('medic') }}" v-model="date.medic" disabled>
            </div>

            <div class="form-group">
                <label >Fecha</label>
                <input type="date" class="form-control" name="date" value="{{ old('date') }}" v-model="date.date" required>
            </div>

            <div class="form-group">
                <label >Hora</label>
                <input type="time" class="form-control" name="hour" value="{{ old('hour') }}" v-model="date.hour"  required>
            </div>

            <div class="form-group">
                    <label >Consultorio:</label>
                    <input type="text" class="form-control" name="room" v-model="date.room"  required>
                </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Crear Usuario</button>

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

            date: {
                pacient: null,
                medic: null,
                user_id: null,
                medic_id: null,
                date: null,
                hour: null,
                room: null
            },
            
            search: {
                name: '',
                patern: '',
                matern: '',
            },
            sugests: [],
            
        },

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

                        if(x.user_type == 1 ){
                            x.type = 'PACIENTE';
                            app.sugests.push(x);
                        } else if (x.user_type == 3) {
                            x.type = 'MEDICO';
                            app.sugests.push(x);
                        }

                    }


                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });
            },

            selectUser: function(user) {
                
                if(user.user_type == 1) {

                    app.date.user_id = user.id;
                    app.date.pacient = user.name + ' ' + user.patern + ' ' + user.matern;

                } else {

                    app.date.medic_id = user.id;
                    app.date.medic = user.name + ' ' + user.patern + ' ' + user.matern;

                }
            },

            checkForm: function() {

                let validate = true;
                if(app.date.pacient == null) validate = false;
                if(app.date.medic == null) validate = false;

                let d = new Date(app.date.date);
                let now = new Date();
                d.setHours(1, 1, 1, 1);
                d.setDate(d.getDate() + 1);
                now.setHours(0, 0, 0, 0);
                

                if(d < now){ 
                    validate = false;
                    console.log('FECHA IMPOSIBLE');
                }


                return validate;

            }
        }
        });
    
</script>
@endsection
