<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthController;


Route::get('/login', function () {
    return view('Admin.loginAdmin');
})->name('login');
Route::post('/loginadmin', [AuthController::class, 'Login']);

Route::post('/logout', [AuthController::class, 'Logout']);
Route::get('/messages/form', function () {
    return view('User.ContactUs');
});

 Route::post('/messages/premium', [AnnonceController::class, 'SendMsgPremium']);
 Route::get('/message/premium/view', [AnnonceController::class, 'MsgPremium']);
 Route::put('/putdonepremium/{id}', [AnnonceController::class, 'PutdonePremium']);



Route::delete('/deleteannonce/{id}',[AnnonceController::class, 'DeleteAnnonceNormal']);


// Route::middleware([CheckLogin::class])->group(function(){
//     Route::get('/dash', [IndexController::class, 'dash']);
// });
 Route::post('/updateprofile', [AnnonceController::class, 'UpdateProfile']);
 Route::get('/adminauth0', [AnnonceController::class, 'GetInfoAdmiin']);


 Route::get('/dash', [IndexController::class, 'dash'])->name('dashboard')->middleware('admin');
  Route::get('/fr/maroc', [IndexController::class, 'GetApp']);
  Route::get("/view/{id}",[IndexController::class,"getViewArticle"]);


   Route::get('/gettele', [AnnonceController::class, 'GetTele']);


