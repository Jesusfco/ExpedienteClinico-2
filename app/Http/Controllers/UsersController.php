<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;
use App\PersonalData;
use App\MedicalData;
use App\Allergy;
use App\Date;
use App\Receipt;
use App\BornExpedient;
use App\Expedient;
use App\Weight;

class UsersController extends Controller {

    public function __construct() {
        $this->middleware('Doctor');   
    }

    public function list(Request $re) {

        $users = User::orderBy('name', 'ASC')->where('name', 'LIKE', '%' . $re->search . '%')->paginate(15);

        return view('app/users/list')->with('users', $users);

    }

    public function create() {

        return view ('app/users/create');

    }

    public function store(Request $r) {

        $this->validate($r, [
            'email' => 'required|unique:users|max:50',
            'name' => 'required',
        ]);

        $user = new User();

        $user->name = $r->name;
        $user->patern = $r->patern;
        $user->matern = $r->matern;
        $user->user_type = $r->user_type;
        $user->gender = $r->gender;
        $user->email = $r->email;

        if($r->password == NULL) {
            $user->password = bcrypt('secret');
        } else { $user->password = bcrypt($r->password); }
        

        $personal = new PersonalData();
        $personal->save();

        $address = new Address();
        $address->save();

        $born = new BornExpedient();
        $born->save();

        $expedient = new Expedient();
        $expedient->save();

        $user->address_id = $address->id;
        $user->personal_data_id = $personal->id;
        $user->expedient_id = $expedient->id;
        $user->born_expedient_id = $born->id;
        $user->save();

        //if($user->user_type == 3) {            

        $med = new MedicalData();
        $med->cedula = $r->speciality;
        $med->sub_speciality = $r->sub_speciality;
        $med->cedula = $r->cedula;
        $med->save();

        $user->medical_data_id = $med->id;
        $user->save();

        //}

        return redirect('app/users')->with('msj', 'EXITO Nuevo usuario ' . $user->fullName() . ' agregado con exito.' );

    }

    public function  editUsuario($id) {
        
        $user = User::find($id);        
        return view('app/users/edit')->with('user', $user);

    } 

    public function updateUsuario(Request $r, $id) {

        $this->validate($r, [
            'email' => 'required',
            'name' => 'required',
        ]);

        // return Request::all();

        $user = User::find($id);

        $user->name = $r->name;
        $user->patern = $r->patern;
        $user->matern = $r->matern;
        $user->user_type = $r->user_type;
        $user->gender = $r->gender;
        $user->email = $r->email;

        if($r->password != NULL) {
            $user->password = bcrypt($r->password);
        }
        
        $user->save();
                                   
        return back()->with('msj', 'Usuario Actualizado Correctamente');

    }

    public function editDireccion($id) {
        $user = User::find($id);        
        return view('app/users/direction')->with('user', $user);
    }

    public function editPersonal($id) {
        $user = User::find($id);        
        return view('app/users/personal')->with('user', $user);
    }

    public function editExpediente($id) {
        $user = User::find($id);        
        return view('app/users/expediente')->with('user', $user);
    }

    public function editNacimiento($id) {
        $user = User::find($id);        
        return view('app/users/born')->with('user', $user);
    }

    public function updateDireccion(Request $r, $id) {
        $user = User::find($id);
        $address = Address::find($user->address_id);        

        $address->street = $r->street;
        $address->colony = $r->colony;
        $address->city = $r->city;
        $address->state = $r->state;
        $address->house_number = $r->house_number;
        $address->house_number_int = $r->house_number_int;
        $address->CP = $r->CP;
        $address->save();

        return back()->with('msj', 'Direccion actualizada');
    }

    public function updatePersonal(Request $r, $id) {

        $user = User::find($id);
        $personal = PersonalData::find($user->personal_data_id);

        $personal->phone = $r->phone;
        $personal->phone2 = $r->phone2;
        $personal->nacionality = $r->nacionality;
        $personal->birthday = $r->birthday;
        $personal->CURP = $r->CURP;
        $personal->civil_status = $r->civil_status;
        $personal->occupation = $r->occupation;
        $personal->religion = $r->religion;        
        $personal->economic_level = $r->economic_level;

        $personal->save();

    }

    public function updateExpediente(Request $r, $id) {

        $user = User::find($id);

        $expedient = Expedient::find($user->expedient_id);

        if($expedient->weight != $r->weight && $r->weight != NULL) {

            $expedient->weight = $r->weight;
            $w = new Weight();
            $w->user_id = $user->id;
            $w->weight = $r->weight;
            $w->save();

        }
        $expedient->height = $r->height;
        $expedient->blood_type = $r->blood_type;
        $expedient->antecedentes_heredo_familiares = $r->antecedentes_heredo_familiares;
        $expedient->antecedentes_personales_patologicos = $r->antecedentes_personales_patologicos;
        $expedient->antecedentes_personales_no_patologicos = $r->antecedentes_personales_no_patologicos;
        $expedient->padecimientos_actuales = $r->padecimientos_actuales;
        $expedient->save();

        return back()->with('msj', 'Expediente Actualizado Correctamente');

    }

    public function updateNacimiento(Request $r, $id) {

        $user = User::find($id);

        $born = BornExpedient::find($user->born_expedient_id);
        $born->edad_madre = $r->edad_madre;    
        $born->tipo_nacimiento = $r->tipo_nacimiento;
        $born->llanto_inmediato = $r->llanto_inmediato;
        $born->APGAR = $r->APGAR;
        $born->malformaciones = $r->malformaciones;
        $born->sangre_criogena_cordon = $r->sangre_criogena_cordon;
        $born->peso = $r->peso;
        $born->talla = $r->talla;
        $born->complicaciones_embarazo = $r->complicaciones_embarazo;
        $born->no_embarazo = $r->no_embarazo;

        $born->save();

        return back()->with('msj', 'Expediente de Nacimiento Actualizado Correctamente');
    }

    public function allergies($id) {

        $user = User::find($id);
        $user->allergies;

        return view('app/users/allergies')->with('user', $user);

    }

    public function getAllergies($id) {
        $user = User::find($id);
        $user->allergies;
        return response()->json($user->allergies);
    }

    public function storeAllergy(Request $re) {

        $allergy = new Allergy();

        $allergy->user_id = $re->user_id;
        $allergy->name = $re->name;
        $allergy->description = $re->description;

        $allergy->save();

        return response()->json($allergy);
        
    }

    public function deleteAllergy(Request $re) {

        Allergy::find($re->id)->delete();
        return response()->json(true);

    }

    public function deleteUser($id) {

        $user = User::find($id);

        Allergy::where('user_id', $user->id)->delete();
        Date::where('user_id', $user->id)->delete();
        Receipt::where('user_id', $user->id)->delete();
        Address::find($user->address_id)->delete();
        PersonalData::find($user->personal_data_id)->delete();

        if($user->user_type == 3) {
            MedicalData::find($user->medical_data_id)->delete();
        }

        $user->delete();

        return back();

    }

}
