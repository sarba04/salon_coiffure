<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('connexion_cl');
    }

    
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            // Authentification réussie, rediriger l'utilisateur
            return redirect()->intended('/profil');
        }

        // Authentification échouée, rediriger avec un message d'erreur
        return redirect()->back()->withErrors(['login' => 'Les informations d\'identification sont incorrectes.']);
    }
}
