<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Recipe;
use App\Date;
use App\User;
use App\Notification;
use PDF;

class PatientController extends Controller
{

    public function __construct() {
        $this->middleware('Pacient');   
    }

    public function dates(){

        $dates = Date::where('user_id', Auth::id())->get();

        return view('app/patient/dates')->with('dates', $dates);
        
    }

    public function recipes(){        

        $recipes = Recipe::where('user_id', Auth::id())->get();

       
        return view('app/patient/recipes')->with('recipes', $recipes);
    }

    public function createDate() {
        return view('app/patient/createDate');
    }

    public function storeDate(Request $re) {

        $date = new Date();

        $date->user_id = Auth::id();
        
        $date->subject = $re->subject;
        $date->date = $re->date;
        $date->hour = $re->hour;
        

        $date->save();

        $notification = new Notification();
        $notification->user_type = 4;
        $notification->title = 'Nueva Cita';
        $notification->description = 'Esta cita aun no tiene un medico asignado';
        $notification->type = 1;
        $notification->url = 'app/citas/show/' . $date->id;
        $notification->save();

        return redirect('/app/misCitas')->with('mjs', 'Cita Creada Correctamente');

    }

    public function pdfRecipe($id){
        $recipe = Recipe::find($id);
        $recipe->user = User::find($recipe->user_id);
        $recipe->medic = User::find($recipe->medic_id);
        $recipe->description;

        // return view('app/pdf/receta')->with('recipe', $recipe);
        $pdf = PDF::loadView('app/pdf/receta', ['recipe' => $recipe] );
        return $pdf->stream('receta #'. $recipe->id . '.pdf');  
    }

    public function accidenteForm($id) {
        $recipe = Recipe::find($id);
        $recipe->user = User::find($recipe->user_id);
        $recipe->medic = User::find($recipe->medic_id);
        $recipe->description;

        return view('app/patient/problemRecipe')->with('recipe', $recipe);
    }
    public function storeObservation(Request $re, $id){
        $recipe = Recipe::find($id);
        $recipe->observation = $re->observation;
        $recipe->save();

        return back()->with(['msj' => 'DATOS GUARDADOS']);
    }

}
