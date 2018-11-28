<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Recipe;
use App\Date;
use App\User;
use PDF;

class PatientController extends Controller
{

    public function __construct() {
        $this->middleware('Pacient');   
    }

    public function dates(){

        $dates = Date::where('user_id', Auth::id())->get();

        $users = User::where('user_type', 3)->get();

        for($i = 0; $i < count($dates); $i++) {

            foreach($users as $user) {

                if($dates[$i]->medic_id == $user->id) {
                    $dates[$i]->medic = $user->name . ' ' . $user->patern;
                    break;
                }

            }   

        }

        return view('app/patient/dates')->with('dates', $dates);
        
    }

    public function recipes(){

        $users = User::where('user_type', 3)->get();

        $recipes = Recipe::where('user_id', Auth::id())->get();

        for($i = 0; $i < count($recipes); $i++) {

            foreach($users as $user) {

                if($recipes[$i]->medic_id == $user->id) {
                    $recipes[$i]->medic = $user->name . ' ' . $user->patern;
                    break;
                }

            }
            

        }

        return view('app/patient/recipes')->with('recipes', $recipes);
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
