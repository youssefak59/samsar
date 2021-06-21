<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnonceController;








Route::get('/getannonce',[AnnonceController::class, 'GetAnnonce']);
Route::get('/maroc',[AnnonceController::class, 'GetAnnonceA']);
Route::get('/getregion',[AnnonceController::class, 'GetRegion']);
Route::get('/getville/{id}',[AnnonceController::class, 'GetVille']);
Route::get('/getelement',[AnnonceController::class, 'gettest']);
Route::get('/getarticleview/{id}',[AnnonceController::class, 'GetArticleView']);
Route::post('/sendmsg/{id}',[AnnonceController::class, 'SendMsg']);
Route::get('/suggestion',[AnnonceController::class, 'GetSuggestion']);
Route::get('/counttype',[AnnonceController::class, 'GetCountType']);
Route::put('/activeannonce',[AnnonceController::class, 'activeannonce']);
Route::get('/annoncepremium',[AnnonceController::class, 'GetAnnoncePremium']);

















// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
