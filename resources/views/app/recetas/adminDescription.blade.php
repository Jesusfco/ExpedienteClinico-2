@extends('layouts.aplication')
@section('title', 'Editar Receta Medica') 
@section('content')


    <h1>Administrar descripción de receta</h1>

    <div class="panel-body" id="app">

        
            <div class="form-group">
                <label >Paciente</label>
                <input type="text" class="input" name="pacient" value="{{ $recipe->user->name }} {{ $recipe->user->patern }}" disabled>
            </div>

            <div class="form-group">
                <label >Medico</label>
                <input type="text" class="input" name="pacient" value="{{ $recipe->medic->name }} {{ $recipe->medic->patern }}" disabled>
            </div>

            <input type="hidden" value="{{ $recipe->id}}" id="1">

        
            {{ csrf_field() }}

            <h4>Descripción</h4>

            <p v-if="descriptions.length == 0">Esta receta aun no tiene ningun medicamento establecido</p>

            <table class="table" v-if="descriptions.length != 0">
                    <thead>
                        <tr>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Frecuencia</th>
                            <th scope="col">Contraindicaciones</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <tr v-for="desc in descriptions" >
                            
                        
                            <td> @{{ desc.medicine }}</td>
                            <td> @{{ desc.frequency }}</td>
                            <td> @{{ desc.contraindications }}</td>
                            <td> <button v-on:click="deleteDesc(desc)" type="button" class="button is-danger">Eliminar</button></td>
                            
                            
                        </tr>
                    </tbody>
                </table>


                <form v-on:submit.prevent="newDescription()">

                <div class="form-group">
                    <label >Medicamento</label>
                    <input type="text" class="input" name="pacient" v-model="description.medicine" required>
                </div>

                <div class="form-group">
                    <label >Frecuencia</label>
                    <input type="text" class="input" name="pacient" v-model="description.frequency" required>
                </div>

                <div class="form-group">
                        <label >Contraindicaciones</label>
                        <input type="text" class="input" name="pacient" v-model="description.contraindications">
                    </div>
                    <br>
                <button type="submit" class="button is-success">Agregar</button>

                </form>

        
            
    </div>


    

    
            
@endsection

@section('scripts')


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