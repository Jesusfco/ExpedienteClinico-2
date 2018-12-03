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

class UsersController extends Controller
{

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

    public function  edit($id) {
        
        $user = User::find($id);

        $user->address;
        $user->personal;
        $user->medical;
        return view('app/users/edit')->with('user', $user);

    } 

    public function update(Request $r, $id) {

        $this->validate($r, [
            'email' => 'required',
            'name' => 'required',
        ]);

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

        if($user->user_type < 4) {
            
            $address = Address::find($user->address_id);
            $personal = PersonalData::find($user->personal_data_id);

            $address->street = $r->street;
            $address->colony = $r->colony;
            $address->city = $r->city;
            $address->state = $r->state;
            $address->house_number = $r->house_number;
            $address->house_number_int = $r->house_number_int;
            $address->CP = $r->CP;
            $address->save();

            $personal->phone = $r->phone;
            $personal->phone2 = $r->phone2;
            $personal->nacionality = $r->nacionality;
            $personal->birthday = $r->birthday;
            $personal->CURP = $r->CURP;
            $personal->civil_status = $r->civil_status;
            $personal->occupation = $r->occupation;
            $personal->religion = $r->religion;
            $personal->suffering = $r->suffering;
            $personal->blood_type = $r->blood_type;
            $personal->social_secure = $r->social_secure;
            $personal->height = $r->height;
            $personal->economic_level = $r->economic_level;
            $personal->save();

        }

        if($user->user_type == 3) {

            $med = MedicalData::find($user->medical_data_id);

            if(!isset($med->cedula)) {
                $med = new MedicalData();
            }
            $med->sub_speciality = $r->sub_speciality;
            $med->cedula = $r->cedula;
            $med->save();

            $user->medical_data_id = $med->id;
            $user->speciality_id = $r->speciality_id;
            $user->save();

        }

        return back()->with('msj', 'Usuario Actualizado');

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
