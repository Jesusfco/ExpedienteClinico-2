@extends('layouts.aplication')
@section('title', 'Crear Citas Medicas') 
@section('content')


    <h1>Crear Cita</h1>

    <div class="panel-body" id="app">

        
        <form  method="POST" action=""  onsubmit="return app.checkForm()">
            {{ csrf_field() }}

            

            <div class="field">
                <label >Paciente</label>
                <input type="text" class="input" name="pacient" value="{{ Auth::user()->fullName()}}" disabled>
            </div>

            <div class="field">
                <label >Medico</label>
                <input type="text" class="input" name="medic" value="La administración es la encargada de asignar al Medico" disabled>
            </div>

            <div class="field">
                <label >Asunto:</label>
                <input class="input" type="text"  name="subject" v-model="date.subject"  required>
            </div>

            <div class="field">
                <label >Fecha</label>
                <input type="date" class="input" name="date"  v-model="date.date" required>
            </div>

            <div class="field">
                <label >Hora</label>
                <input type="time" class="input" name="hour" value="{{ old('hour') }}" v-model="date.hour"  required>
            </div>
           

            <button type="submit" class="button is-success">Crear Cita</button>
            <button type="button" v-on:click="cancelForm()" class="button is-danger">Cancelar</button>

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
               
                date: null,
                hour: null,                   
                subject: null,
            },
            
            search: {
                name: '',
                patern: '',
                matern: '',
            },
           
            
        },

         methods: {
          


            cancelForm: function() {
                this.date = {
                   
                    date: null,
                    hour: null,                   
                    subject: null,
                };
            },

            checkForm: function() {

// console.log(this.date);
                let validate = true;
                
                

                let d = new Date(app.date.date);
                let now = new Date();
                d.setHours(1, 1, 1, 1);
                d.setDate(d.getDate() + 1);
                now.setHours(0, 0, 0, 0);
                

                if(d < now){ 
                    validate = false;
                    alert('Coloque una fecha proxima a ocurrir')                
                }

                // return false;
                return validate;

            }
        }
        });
    
</script>
@endsection
