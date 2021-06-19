<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
class AuthController extends Controller
{
    public function Login(Request $request){
        
        $attempt = Auth::guard('web')
                ->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);
        if ($attempt ){
            // return view('Admin.dashAdmin');
            $request->session()->regenerate();

            // return redirect()->intended('dashboard');

            return redirect('/dash#/fr/cms');
            //  return response('admin', 200 );  
        }
        //Return errors
        return back()->withErrors([
            'email' => 'Vos informations d\'identification ne sont pas correctes !',
        ]);
        // return response('Vos informations d\'identification ne sont pas correctes !', 422);  
    }
    public function Logout(){
        // dd(auth::check());
        if (auth::check()) {
             Auth::logout();
             return response()->json(['status'=>'success']);
        }
         return response()->json(['status'=>'error']);
       

    // $request->session()->invalidate();

    // $request->session()->regenerateToken();
       
        // return redirect('/login');
    }
}
