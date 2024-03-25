<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\UserAuthController;

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
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])
    ->middleware('auth:sanctum');
Route::resource('progress', ProgressController::class)->middleware('auth:sanctum');
Route::put('progress/status/{progress}', [ProgressController::class, 'markProgressAsCompleted'])->middleware('auth:sanctum');



// Route::get('user', function () {
//     return User::all();
// });
Route::delete('user/{user}', [UserController::class, 'destroy']);