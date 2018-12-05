<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Reset;
use App\Recipe;
use App\Mail\ResetMail;
use Session;
use Mail;
use QRCode;
use PDF;

class VisitorController extends Controller
{
    public function checkAuth() {

        if (Auth::check()) {

            if(Auth::user()->user_type > 2) {
                return redirect('/app/users');
            } else if(Auth::user()->user_type == 2) {
                return redirect('/app/citas');
            }else {
                return redirect('/app/misCitas');
            }

        } else {

            return view('visitor/login');

        }
        

    }

    public function validateReceipt($id) {

        $recipe = Recipe::find($id);

        if($recipe == NULL)
            return '<h2>Receta Inexistente</h2>';                
     

            QRCode::text(url('aplicacion/verificarReceta', $id))
                ->setSize(4)
                ->setMargin(2)
                ->setOutfile('images/QRLinks/'. $id . '.png')
                ->png();        

        // return view('app/pdf/receta')->with('recipe', $recipe);
        $pdf = PDF::loadView('app/pdf/receta', ['recipe' => $recipe] );
        return $pdf->stream('TECNOMEDICS_RECETA #'. $recipe->id . '.pdf');     

    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(Auth::user()->user_type > 2) {
                return redirect('/app/users');
            } else if(Auth::user()->user_type == 2) {
                return redirect('/app/citas');
            } else {
                return redirect('/app/misCitas');
            }
        } else {
            return back();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function resetPassword(){
        return view('auth/passwords/email');
    }

    public function sentTokenReset(Request $request) {

        
        $user = User::where('email', 'LIKE', $request->email)->first();        

        if(isset($user->id)){

            $reset = new Reset();
            $reset->user_id = $user->id;
            $reset->token = hash('tiger192,3', rand(1000, 10000));
            $reset->save();

            $data = array(
                'token' => $reset->token,
                'email' => $user->email,
                'name' => $user->name
            );

            
            $request->token = $reset->token;
            $request->email = $user->email;
            $request->email = $user->email;

            $data = (object) $data;

            Mail::send(new ResetMail($data));

            Session::flash('success', 'asdf');
            return back();

        } else {

            Session::flash('errorEmail', 'asdf');
            return back();

        }
    }

    public function resetPassword2($token){

        $reset = Reset::where('token', 'LIKE', $token)->first();

        if(isset($reset->id)){

            $user = User::find($reset->user_id);
            return view('auth/passwords/reset')->with('email', $user->email);

        } else {

            return redirect('login');

        }

    }

    public function updatePassword($token, Request $re){

        $reset = Reset::where('token', 'LIKE', $token)->first();
        
        if(isset($reset->id)){
            $user = User::find($reset->user_id);
            $user->password =  bcrypt($re->password);
            $user->save();

            Auth::login($user);
            $reset->delete();
            
        } 
          
        return redirect('login');
        
    }
}
