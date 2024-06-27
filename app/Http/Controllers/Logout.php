<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Logout extends Controller
{
    //
    public function logout(Request $request)
    {
        // Détruire la session
        Session::flush();

        // Redirection après la déconnexion
        if ($request->headers->has('referer')) {
            $referer = $request->headers->get('referer');

            // Vérifier d'où provient la demande de déconnexion
            if (strpos($referer, "admin_dashboard") !== false) {
                return redirect()->route('connexion_ad'); // Rediriger vers la page de connexion admin
            } elseif (strpos($referer, "compte_cl") !== false) {
                return redirect()->route('connexion'); // Rediriger vers la page de connexion client
            } else {
                return redirect()->route('index'); // Rediriger vers une page par défaut
            }
        } else {
            return redirect()->route('index'); // Rediriger vers une page par défaut si HTTP_REFERER n'est pas disponible
        }
    }
}
