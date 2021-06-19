<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnonceController;




Route::post('/posting/annonce', [AnnonceController::class, 'CreateAnnonce']);



Route::get('/getregion',[AnnonceController::class, 'GetRegion']);
Route::get('/getville/{id}',[AnnonceController::class, 'GetVille']);
Route::get('/getannonce',[AnnonceController::class, 'GetAnnonce']);
Route::get('/maroc',[AnnonceController::class, 'GetAnnonceA']);
Route::get('/getelement',[AnnonceController::class, 'gettest']);
Route::get('/getarticleview/{id}',[AnnonceController::class, 'GetArticleView']);
Route::post('/sendmsg/{id}',[AnnonceController::class, 'SendMsg']);
Route::get('/getmsgs',[AnnonceController::class, 'GetMsg']);
Route::get('/suggestion',[AnnonceController::class, 'GetSuggestion']);
Route::get('/counttype',[AnnonceController::class, 'GetCountType']);
Route::get('/annoncepremium',[AnnonceController::class, 'GetAnnoncePremium']);
Route::put('/activeannonce',[AnnonceController::class, 'activeannonce']);
Route::get('/getannonce/{id}',[AnnonceController::class, 'GetAnnonceByID']);
Route::put('/putdone/{id}',[AnnonceController::class, 'PutDone']);
Route::get('/getcountinfo',[AnnonceController::class, 'getCountInfo']);
Route::get('/allannonce',[AnnonceController::class, 'GetAllFunction']);
Route::get('/getannoncebyid/{id}',[AnnonceController::class, 'getannoncebyidInput']);
Route::delete('/deleteannonce/{id}',[AnnonceController::class, 'DeleteAnnonceNormal']);
Route::post('/addadmin',[AnnonceController::class, 'AddAdmin']);
Route::get('/getadmins',[AnnonceController::class, 'GetAdmins']);
Route::delete('/deleteadmin/{id}',[AnnonceController::class, 'DeleteAdmin']);
Route::put('/updateadmin/{id}',[AnnonceController::class, 'UpdateAdmin']);






















// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
