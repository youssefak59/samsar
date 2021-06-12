<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AnnonceController;



Route::get('/login', function () {
    return view('Admin.loginAdmin');
});
// Route::middleware([CheckLogin::class])->group(function(){
//     Route::get('/dash', [IndexController::class, 'dash']);
// });

 Route::get('/dash', [IndexController::class, 'dash']);
  Route::get('/fr/maroc', [IndexController::class, 'GetApp']);
  Route::get("/view/{id}",[IndexController::class,"getViewArticle"]);
//   Route::get("/view/{id}",[AnnonceController::class,"getArticle"]);

// Route::get('/is-auth', function () {
//     $auth = Auth::user();
//     return $auth;
// });


// Route::post('/loginadmin', [AuthController::class, 'Login']);
