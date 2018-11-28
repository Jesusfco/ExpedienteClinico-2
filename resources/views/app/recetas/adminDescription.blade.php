@extends('layouts.aplication')

@section('content')


    <div class="panel-heading">Administrar Descripción Receta</div>

    <div class="panel-body" id="app">

        
            <div class="form-group">
                <label >Paciente</label>
                <input type="text" class="form-control" name="pacient" value="{{ $recipe->user->name }} {{ $recipe->user->patern }}" disabled>
            </div>

            <div class="form-group">
                <label >Medico</label>
                <input type="text" class="form-control" name="pacient" value="{{ $recipe->medic->name }} {{ $recipe->medic->patern }}" disabled>
            </div>

            <input type="hidden" value="{{ $recipe->id}}" id="1">

        
            {{ csrf_field() }}

            <h4>Descripción</h4>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Frecuencia</th>
                            
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <tr v-for="desc in descriptions" >
                            
                        
                            <td> @{{ desc.medicine }}</td>
                            <td> @{{ desc.frequency }}</td>
                            
                            <td> <button v-on:click="deleteDesc(desc)" type="button" class="btn btn-warning btn-sm">Eliminar</button></td>
                            
                            
                        </tr>
                    </tbody>
                </table>


                <form v-on:submit.prevent="newDescription()">

                <div class="form-group">
                    <label >Medicamento</label>
                    <input type="text" class="form-control" name="pacient" v-model="description.medicine" required>
                </div>

                <div class="form-group">
                    <label >Frecuencia</label>
                    <input type="text" class="form-control" name="pacient" v-model="description.frequency" required>
                </div>

                <div class="form-group">
                        <label >Contraindicaciones</label>
                        <input type="text" class="form-control" name="pacient" v-model="description.contraindications">
                    </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar</button>

                </form>

        
            
    </div>


    

    
            
@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios@0.12.0/dist/axios.min.js"></script>
    <script>
    
    var app = new Vue({
        el: '#app',
        

        data: {
           description: {
               medicine: null,
               frequency: null,
               recipe_id: null,
               contraindications: null,
               id: null,

           },

           descriptions: [],



        },

        created: function () {

            setTimeout(() => {
                
                app.setNewDescription();
                app.getDescriptions();
                
                
            }, 100);

        },

        methods: {
            newDescription: function() {
                

                var formD = new FormData();
                formD.append('medicine', this.description.medicine);
                formD.append('frequency', this.description.frequency);
                formD.append('contraindications', this.description.contraindications);
                formD.append('recipe_id', this.description.recipe_id);
               

                // axios.post( this.description.recipe_id + '/createDescription', formD)
                axios.post('../createDescription', formD)

                .then(function(response) {

                    app.descriptions.push(response.data);
                    app.setNewDescription();


                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            },

            deleteDesc: function(desc) {

                 var formD = new FormData();
                formD.append('id', desc.id);
               

                axios.post('../deleteDescription', formD)

                .then(function(response) {

                    let i = 0;

                    for(let d of app.descriptions) {
                        if(d.id == desc.id) {
                            break;
                        }

                        i++;
                    }

                    app.descriptions.splice(i,1);


                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            }, 

            

            setNewDescription: function() {

                
                app.description = {
                    medicine: null,
                    frequency: null,
                    recipe_id: null,
                    contraindications: null,
                    id: null,
                };

                app.description.recipe_id = document.getElementById('1').value;

            }, 

            getDescriptions: function() {
                

                

                axios.get( this.description.recipe_id + '/getDescriptions')
                

                .then(function(response) {

                    app.descriptions = response.data;


                }).catch(function(error) {

                    // app.uploading = false;
                    // app.errorHandler(error, i);

                });

            },


            
        }
        });
    
    </script>
@endsection