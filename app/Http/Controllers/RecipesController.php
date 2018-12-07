<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Recipe;
use App\User;
use App\RecipeDescription;
use PDF;
use QRCode;
use DB;

class RecipesController extends Controller
{

    public function __construct() {
        $this->middleware('Nurse');   
        $this->middleware('Doctor', ['only' => ['store', 'create', 'edit', 'update', 'delete']]); 
    }
    
    public function list(){

        $users = User::all();

        $recipes = Recipe::orderBy('created_at', 'DESC')->paginate(20);

        for($i = 0; $i < count($recipes); $i++) {

            foreach($users as $user) {

                if($recipes[$i]->user_id == $user->id) {
                    $recipes[$i]->user = $user->name . ' ' . $user->patern;
                    break;
                }

            }

            foreach($users as $user) {

                if($recipes[$i]->medic_id == $user->id) {
                    $recipes[$i]->medic = $user->name . ' ' . $user->patern;
                    break;
                }

            }
            

        }

        return view('app/recetas/list')->with('recipes', $recipes);

    }

    public function create() {
        return view('app/recetas/create');
    }

    public function sugest(Request $re) {
        $users = User::orderBy('name', 'ASC')->where([
            [DB::raw("CONCAT(`name`, ' ', `patern`, ' ', `matern`)"), 'LIKE', '%' . $re->name . '%'],
            
            ['user_type', 1],
            // ['user_type', 3],
            ])->limit(7)->get();

        return response()->json($users);
    }

    public function store(Request $re) {
        $recipe = new Recipe();
        $recipe->user_id = $re->user_id;
        $recipe->medic_id = Auth::id();
        $recipe->save();

        return redirect('app/recetas/crearDescription/' . $recipe->id);
    }

    public function description($id) {

        $recipe = Recipe::find($id);
        $recipe->user = User::find($recipe->user_id);
        $recipe->medic = User::find($recipe->medic_id);

        
        return view('app/recetas/adminDescription')->with('recipe', $recipe);

    }

    public function getDescriptions($id) {
        $descriptions = RecipeDescription::where('recipe_id', $id)->get();

        return response()->json($descriptions);
    }

    public function saveDescription(Request $re) {

        $description = new RecipeDescription();
        $description->recipe_id = $re->recipe_id;
        $description->medicine = $re->medicine;
        $description->frequency = $re->frequency;
        $description->contraindications = $re->contraindications;
        $description->save();

        return response()->json($description);

    }

    public function deleteDescription(Request $re) {
        $description = RecipeDescription::find($re->id);
        $description->delete();
        return response()->json('true');
    }

    public function show($id) {
        $recipe = Recipe::find($id);
        $recipe->user = User::find($recipe->user_id);
        $recipe->medic = User::find($recipe->medic_id);
        $recipe->description;
        return view('app/recetas/show')->with('recipe', $recipe);
    }

    public function getPDF($id) {
        $recipe = Recipe::find($id);
        $recipe->user = User::find($recipe->user_id);
        $recipe->medic = User::find($recipe->medic_id);
        $recipe->description;

        QRCode::text(url('aplicacion/verificarReceta', $id))
        ->setSize(4)
        ->setMargin(2)
        ->setOutfile('images/QRLinks/'. $id . '.png')
        ->png();      
        // return view('app/pdf/receta')->with('recipe', $recipe);
        $pdf = PDF::loadView('app/pdf/receta', ['recipe' => $recipe] );
        return $pdf->stream('TECNOMEDICS-RECETA #'. $recipe->id . '.pdf');      
    }

    public function delete($id) {

        $recipe = Recipe::find($id);
        RecipeDescription::where('recipe_id', $recipe->id)->delete();
        $recipe->delete();

        return back();

    }

}
