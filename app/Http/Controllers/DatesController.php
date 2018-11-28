<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Date;
use App\User;

class DatesController extends Controller
{

    public function __construct() {
        $this->middleware('Nurse');   
    }

    public function list(Request $re) {

        $users = User::all();

        $dates = Date::orderBy('date', 'DESC')->paginate(20);

        for($i = 0; $i < count($dates); $i++) {

            foreach($users as $user) {

                if($dates[$i]->user_id == $user->id) {
                    $dates[$i]->user = $user->name . ' ' . $user->patern;
                    break;
                }

            }

            foreach($users as $user) {

                if($dates[$i]->medic_id == $user->id) {
                    $dates[$i]->medic = $user->name . ' ' . $user->patern;
                    break;
                }

            }
            

        }

        return view('app/citas/list')->with('dates', $dates);


    }

    public function create() {
        return view('app/citas/create');
    }

    public function sugest(Request $re) {
        $users = User::orderBy('name', 'ASC')->where([
            ['name', 'LIKE', '%' . $re->name . '%'],
            ['patern', 'LIKE', '%' . $re->patern . '%'],
            ['matern', 'LIKE', '%' . $re->matern . '%'],
            // ['user_type', 1],
            // ['user_type', 3],
            ])->limit(7)->get();

        return response()->json($users);
    }

    public function store(Request $re) {

        $date = new Date();

        $date->user_id = $re->user_id;
        $date->medic_id = $re->medic_id;
        $date->date = $re->date;
        $date->hour = $re->hour;
        $date->room = $re->room;

        $date->save();

        return redirect('/app/citas');

    }

     public function delete($id) {
         Date::find($id)->delete();
         return back();
     }

}
