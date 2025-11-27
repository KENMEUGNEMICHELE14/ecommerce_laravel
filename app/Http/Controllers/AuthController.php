<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //La première fonction
    public function login(){
        return view("auth.login");
    }

    public function authentificate(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        $credentials = $request->only('email','password');
        $remember = $request->filled('remember');

        if (auth()->attempt($credentials, $remember)) {
            $user = auth()->user();

            // admin -> dashboard, sinon -> page d'accueil
            if ($user instanceof User && $user->isAdmin()) {
                return redirect()->route('dashboard');
            }

            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['email' => 'Les identifiants ne correspondent pas'])->withInput();
    }

    // Pour se deconnecter
    public function logout(){
        auth()->logout();
        return redirect()->route('login');
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
            'telephone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        auth()->login($user);

        // même logique de redirection que pour la connexion
        if ($user instanceof User && $user->isAdmin()) {
            return redirect()->route('dashboard')->with('success','Bienvenue Admin !');
        }

        return redirect()->route('home')->with('success','Bienvenue !');
    }
}

