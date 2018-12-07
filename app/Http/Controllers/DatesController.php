<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Date;
use App\User;
use App\Notification;
use QRCode;
use Auth;
use DB;
class DatesController extends Controller
{

    public function __construct() {
        $this->middleware('Doctor');   

        $this->middleware('Admin', ['only' => ['store', 'create', 'edit', 'update']]); 
    }

    public function list(Request $re) {

        $users = User::all();

        if(Auth::user()->user_type == 3) {
            $dates = Date::where('medic_id', Auth::id())->orderBy('date', 'DESC')->paginate(20);                          
        } else if(Auth::user()->user_type == 4) {
            $dates = Date::orderBy('date', 'DESC')->paginate(20);                          
        } else {
            return 'No estas autorizado para Ver esto';
        }
        

        return view('app/citas/list')->with('dates', $dates);


    }


    public function show($id) {
        $date = Date::find($id);

        if($date == null) return 'Cita inexistente';

        if(Auth::user()->user_type == 3) {

            if($date->medic_id != Auth::id()) {

                return redirect('app/citas');

            }

        }
        
        
        return view('app/citas/show')->with('date', $date);
    }

    public function create() {
        return view('app/citas/create');
    }

    public function sugest(Request $re) {
        $users = User::orderBy('name', 'ASC')->where([
            [DB::raw("CONCAT(`name`, ' ', `patern`, ' ', `matern`)"), 'LIKE', '%' . $re->name . '%'],
            
            // ['user_type', 1],
            // ['user_type', 3],
            ])->limit(7)->get();

        return response()->json($users);
    }

    public function sugestMedic(Request $re) {
        $users = User::orderBy('name', 'ASC')->where([
            [DB::raw("CONCAT(`name`, ' ', `patern`, ' ', `matern`)"), 'LIKE', '%' . $re->name . '%'],
                        
            ['user_type', 3],
            ])->limit(7)->get();

        return response()->json($users);
    }

    public function store(Request $re) {

        $date = new Date();

        $date->user_id = $re->user_id;
        $date->medic_id = $re->medic_id;
        $date->subject = $re->subject;
        $date->date = $re->date;
        $date->hour = $re->hour;
        $date->room = $re->room;

        $date->save();

        return redirect('/app/citas')->with('mjs', 'Cita Creada Correctamente');

    }

    public function edit($id) {
        $date = Date::find($id);
        if($date == NULL) return 'Esta Cita es inexistente';
        return view('app/citas/edit')->with('date', $date);
    }

    public function update(Request $re, $id) {

        $date = Date::find($id);

        $validate = false;

        if($date->medic_id != $re->medic_id) {
            $notification = new Notification();
            $notification->user_id = $date->user_id;
            $notification->title = 'Medico Establecido en tu cita';
            $notification->description = 'Ya solo falta que asistas el dia indicado a tu cita';
            $notification->type = 1;
            $notification->url = 'app/misCitas';
            $notification->save();

            $notification = new Notification();
            $notification->user_id = $re->medic_id;
            $notification->title = 'Tienes una Cita asignada';
            $notification->description = "Programada para el día $re->date hora $re->hour";
            $notification->type = 1;
            $notification->url = 'app/citas/show/' . $date->id;
            $notification->save();
        }
        
        $date->medic_id = $re->medic_id;
        $date->subject = $re->subject;
        $date->date = $re->date;
        $date->hour = $re->hour;
        $date->room = $re->room;

        $date->save();

        return redirect('/app/citas')->with('mjs', 'Cita Creada Correctamente');
    }

     public function delete($id) {
         Date::find($id)->delete();
         return back();
     }

}
