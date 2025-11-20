<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //La première fonction

    public function login(){

        return view("auth.login");
    }


    public function authentificate( Request $request){
        $request ->validate([
            'email'=> 'required|email',
             'password'=>'required'
        ]);

         if(auth()->attempt($request->only('email','password'))){
            return redirect()-> route('dashboard');
           
         } 
         
         redirect()->back()->withErrors("Les identifiants ne correspondent");

    }

    // Pour se deconnceter
    public function logout(){

        auth()->logout();

    }

    // Ajoute ces méthodes dans le même AuthController
public function showRegisterForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'telephone' => 'required|string|max:20',
    ]);

    // Créer l'utilisateur
    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'telephone' => $request->telephone,
    ]);

    // Connecter automatiquement
    auth()->login($user);

    return redirect()->route('dashboard')->with('success', 'Inscription réussie !');
}
}

