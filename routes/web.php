<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class,'index']);
Route::get('/register',[UserController::class,'Register']);
Route::get('/forgot',[UserController::class,'Forgot']);
Route::get('/reset',[UserController::class,'Reset']);


Route::post('/register',[UserController::class,'saveUser'])->name('auth.register');



