@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Alergías de Paciente <br> {{$user->name }} {{ $user->patern }} {{ $user->matern }}</div>

    <div class="panel-body">

        <form v-on:submit.prevent="create()">

                <h3 class="text-center">Agrega una nueva Alergía</h3>
    
                <div class="form-group">
                    <label >Nombre:</label>
                    <input type="text" class="form-control" name="pacient" v-model="name" required>
                </div>
        
                <div class="form-group">
                    <label >Descripción</label>
                    <input type="text" class="form-control" name="medic" v-model="description">
                </div>
    
                <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Nueva Alergía</button>
    
            </form>   

        <input value="{{$user->id}}" id="userId" hidden>

        <table class="table" v-if="allergies.length > 0">

            <thead>
                
                <tr>

                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>

                </tr>

            </thead>

            <tbody>

                <tr v-for="allergy in allergies" >         
                
                    <td> @{{ allergy.name }}</td>
                    <td> @{{ allergy.description }}</td>
                    <td> <button v-on:click="deleteAllergy(allergy)" type="button" class="btn btn-warning btn-sm">Eliminar</button></td>
            
                </tr>

            </tbody>
            
        </table>       

    </div>  
       

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script>
    
    var app = new Vue({
        el: '#app',
        

        data: {
            allergies: [],
            name: '',
            description: '',
            user_id: null
            

            },

        created: function () {

            setTimeout(() => {               
               
                app.user_id = document.getElementById('userId').value;
                app.getAllergies();

            }, 100);

        }, 

        methods: {

            getAllergies: function() {

                axios.get(app.user_id + '/get')

                .then(function(response) {

                    app.allergies = response.data;

                }).catch(function(error) {

                });

            },

            deleteAllergy: function(allergy) {

                var formD = new FormData();
                formD.append('id', allergy.id);

                axios.post('../deleteAllergy', formD)

                .then(function(response) {

                    let i = 0;

                    for(let d of app.allergies) {
                        if(d.id == allergy.id) {
                            break;
                        }

                        i++;
                    }

                    app.allergies.splice(i,1);

                }).catch(function(error) {

                });

            }, 

            create: function() {

                if(!this.validateForm()) return;

                var formD = new FormData();

                formD.append('user_id', this.user_id);
                formD.append('name', this.name);
                formD.append('description', this.description);

                axios.post('../createAllergy', formD).then(function(response) {

                    app.allergies.push(response.data);
                    app.setNewAllergy();

                }).catch(function(error) {

                });

            },

            setNewAllergy: function() {
                this.name = '';
                this.description = '';
            },

            validateForm: function() {

                if(this.name == '') return false; 

                return true;

            }

        }
        });
    
    </script>
@endsection