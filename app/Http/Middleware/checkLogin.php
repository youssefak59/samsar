<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
         return $next($request);
        // if (Auth::check()) {

        //     return $next($request);
        
        // }
        // return response()->json([
        //     'msg'=>'Your account is inactive',
            
        // ]);
        // \Log::info('dsd');
        // if (auth()->user()->name=='admin')
        //   return $next($request);   
        // else{
        //      return response()->json([
        //     'msg'=>'not login',
        //     'auth'=>Auth::check(),
        // ]);
        // }
       
        // return redirect('/login');
         
        
    }
}
