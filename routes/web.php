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
//public

Route::get('/messages/form', function () {
    return view('User.ContactUs');
});
  Route::get('/fr/maroc', [IndexController::class, 'GetApp']);
  Route::get("/view/{id}",[IndexController::class,"getViewArticle"]);
 Route::post('/messages/premium', [AnnonceController::class, 'SendMsgPremium']);
//admin
Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'Logout']);
    Route::get('/message/premium/view', [AnnonceController::class, 'MsgPremium']);
    Route::put('/putdonepremium/{id}', [AnnonceController::class, 'PutdonePremium']);
    Route::delete('/deleteannonce/{id}',[AnnonceController::class, 'DeleteAnnonceNormal']);
    Route::post('/updateprofile', [AnnonceController::class, 'UpdateProfile']);
    Route::get('/adminauth0', [AnnonceController::class, 'GetInfoAdmiin']);
    Route::get('/dash', [IndexController::class, 'dash'])->name('dashboard');
    Route::get('/getcountinfo',[AnnonceController::class, 'getCountInfo']);
    Route::get('/getmsgs',[AnnonceController::class, 'GetMsg']);
    Route::get('/getannonce/{id}',[AnnonceController::class, 'GetAnnonceByID']);
    Route::put('/putdone/{id}',[AnnonceController::class, 'PutDone']);
    Route::post('/addadmin',[AnnonceController::class, 'AddAdmin']);
    Route::get('/allannonce',[AnnonceController::class, 'GetAllFunction']);
    Route::get('/getannoncebyid/{id}',[AnnonceController::class, 'getannoncebyidInput']);
    Route::get('/getadmins',[AnnonceController::class, 'GetAdmins']);
    Route::delete('/deleteadmin/{id}',[AnnonceController::class, 'DeleteAdmin']);
    Route::put('/updateadmin/{id}',[AnnonceController::class, 'UpdateAdmin']);
    Route::post('/posting/annonce', [AnnonceController::class, 'CreateAnnonce']);
});
    












