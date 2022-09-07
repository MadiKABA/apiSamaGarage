<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('profiles',\App\Http\Controllers\ProfileController::class);
Route::apiResource('annonces',\App\Http\Controllers\AnnonceController::class);
Route::apiResource('zones',\App\Http\Controllers\ZoneController::class);
Route::apiResource('typeAnnonces',\App\Http\Controllers\TypeAnnonceController::class);
Route::apiResource('garages',\App\Http\Controllers\GarageController::class);
Route::apiResource('commentaires',\App\Http\Controllers\CommentaireController::class);
Route::apiResource('utilisateurs',\App\Http\Controllers\UtilisateurController::class);
Route::apiResource('services',\App\Http\Controllers\ServiceController::class);
Route::apiResource('servicesGarages',\App\Http\Controllers\ServiceGarageController::class);
Route::apiResource('typeAnnonces',\App\Http\Controllers\TypeAnnonceController::class);
Route::apiResource('annonces',\App\Http\Controllers\AnnonceController::class);
Route::apiResource('notes',\App\Http\Controllers\NoteController::class);
Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
