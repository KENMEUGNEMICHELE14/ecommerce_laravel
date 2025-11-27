<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //La première fonction
    public function login(){
        return view("auth.login");
    }

    public function authentificate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            // rediriger tous vers la page d'accueil
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
    }

    // Pour se deconnecter
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
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
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        auth()->login($user);

        // même logique de redirection que pour la connexion
        if ($user instanceof User && method_exists($user, 'isAdmin') && $user->isAdmin()) {
            return redirect()->route('dashboard')->with('success','Bienvenue Admin !');
        }

        return redirect()->route('home')->with('success','Bienvenue !');
    }
}

