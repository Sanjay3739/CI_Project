<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CountryCityController;
use App\Http\Controllers\UserEditProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('fetch-city',[CountryCityController::class,'fetchCity']);
Route::post('/users/update-password',[UserEditProfileController::class, 'updatePassword'])->name('users.update-password');
Route::post('/users/update-skills', [UserEditProfileController::class, 'updateSkills'])->name('users.update-skills');






