<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// racine : guests -> login ; users authentifiés -> home ou dashboard selon role
Route::get('/', function () {
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('dashboard');
    }

    return redirect()->route('home');
})->name('root');

// page d'accueil (protégée)
Route::get('home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Auth routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authentificate', [AuthController::class, 'authentificate'])->name('authentificate');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

// logout (POST)
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// tableau de bord admin (protégé)
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('dashboard');





