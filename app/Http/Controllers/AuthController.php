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
            // return view('Admin.dashAdmin', ['auth' => "youssef"]);
             return response('admin', 200 );  
            // return Auth::guard('web');
            // return  Auth::check();
        }
        //Return errors
        return response('Vos informations d\'identification ne sont pas correctes !', 422);  
    }
}
