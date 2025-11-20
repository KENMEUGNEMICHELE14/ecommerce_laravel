<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Elle n'a qu'une seule de méthode
Route::get('dashboard',DashboardController:: class)
    ->name('dashboard')
    ->middleware('auth');  








/*/::::::::::::::::::::::::::::::::::::::Route::get('/', function () {
    return view('welcome');
});*/






Route::get('login', [AuthController::class, 'login'])
    ->name('login');


Route::post('authentificate', [AuthController::class, 'authentificate'])
    ->name('authentificate');
    

Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::get('register', [AuthController::class, 'showRegisterForm'])
    ->name('register');
Route::post('register', [AuthController::class, 'register'])
    ->name('register.post');
    



    
