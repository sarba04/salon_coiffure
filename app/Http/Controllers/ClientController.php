<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; 
use Illuminate\Support\Facades\DB;

use Auth;

class ClientController extends Controller
{
    public function afcon_cl(){
        return view('connexion_cl');

    }

    // public function showLoginForm()
    // {
    //     return view('connexion_cl');
    // }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('login_client', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Authentification réussie, rediriger l'utilisateur
    //         return redirect()->intended('/index');
    //     }

    //     // Authentification échouée, rediriger avec un message d'erreur
    //     return view("compte_cl");
    // }

    public function opcon_cl(Request $request)
    {
        $credentials = $request->validate([
            'login_client' => ['required'],
            'mot_pass_client' => ['required'],
        ]);

        $client = Client::where('login_client', $credentials['login_client'])
                        ->where('mot_pass_client', $credentials['mot_pass_client'])
                        ->first();

        if ($client) {
            // Enregistrez les informations du client dans la session
            $request->session()->put('nom_client', $client->nom_client);
            $request->session()->put('login_client', $client->login_client);
            $request->session()->put('email_client', $client->email_client);

            // Rediriger vers la page de compte après une connexion réussie
            return redirect()->route('compte_cl');
        } else {
            // Rediriger vers la page de connexion avec un message d'erreur
            return back()->withErrors(['message' => 'Identifiant ou mot de passe invalide!']);
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $log = $request->input('login_client');
            $mot_pass = $request->input('mot_pass_client');
            $nom = $request->input('nom_client');
            $prenom = $request->input('prenom_client');
            $adresse = $request->input('email_client');
            $telephone = $request->input('telephone_client');
            $date = $request->input('datenaiss_client');

            // Check if the login already exists
            $count = Client::where('login_client', $log)->count();

            if ($count > 0) {
                return redirect()->back()->with('error', 'Échec de l\'enregistrement:login deja existant');
            } else {
                // Proceed with the insertion
                Client::insert([
                    'login_client' => $log,
                    'mot_pass_client' => $mot_pass,
                    'nom_client' => $nom,
                    'prenom_client' => $prenom,
                    'email_client' => $adresse,
                    'telephone_client' => $telephone,
                    'datenaiss_client' => $date
                ]);

                return redirect()->route('connexion')->with('success', 'Inscription réussie,connectez-vous maintenant');
            }
        }

        return view('client.register');
    }


    public function showProfile(Request $request)
{
    // Récupérer le login_client à partir de la session
    $login_client = session('login_client');

    // Requête SQL pour récupérer les informations du client à partir de la base de données
    $client = DB::table('client')->where('login_client', $login_client)->first();

    // Vérifier si des données ont été trouvées pour ce client
    if (!$client) {
        return redirect()->back()->with('error', 'Aucune information trouvée pour ce client.');
    }

    // Vérifier si le formulaire a été soumis
    if ($request->has('envoyer')) {
        // Valider les données du formulaire
        $request->validate([
            'mot_pass_client' => 'required',
            'nom_client' => 'required',
            'prenom_client' => 'required',
            'email_client' => 'required|email',
            'telephone_client' => 'required',
            'datenaiss_client' => 'required|date',
        ]);

        // Mettre à jour les informations du client
        DB::table('client')->where('login_client', $login_client)->update([
            'mot_pass_client' => $request->input('mot_pass_client'),
            'nom_client' => $request->input('nom_client'),
            'prenom_client' => $request->input('prenom_client'),
            'email_client' => $request->input('email_client'),
            'telephone_client' => $request->input('telephone_client'),
            'datenaiss_client' => $request->input('datenaiss_client'),
        ]);

        // Rediriger vers la page de profil avec un message de succès
        return redirect()->route('profil_client')->with('success', 'Profil mis à jour avec succès.');
    }

    // Retourner la vue du profil avec les informations du client
    return view('profil_client', compact('client'));
}


public function showreservation(Request $request)
{
    // Vérifier si un client est connecté
    if (session()->has('login_client')) {
        // Récupérer le login du client connecté
        $login_client = session('login_client');

        // Requête pour récupérer les informations sur les réservations du client
        $reservations = DB::table('rendez_vous as rdv')
            ->join('coiffeur as coi', 'rdv.login_coiffeur', '=', 'coi.login_coiffeur')
            ->join('coiffure as coif', 'coif.nom_coiffure', '=', 'rdv.nom_coiffure')
            ->select('rdv.date_rdv', 'coi.nom_coiffeur', 'rdv.nom_coiffure', 'coif.prix_coiffure', 'rdv.statu_rdv')
            ->where('rdv.login_client', $login_client)
            ->get();
        // Initialisation des tableaux pour chaque statut de réservation
        $en_attente = [];
        $annulees = [];
        $confirmees = [];
        $terminees = [];

        // Parcourir chaque réservation et les classer en fonction de leur statut
        foreach ($reservations as $reservation) {

            switch ($reservation->statu_rdv) {
                case 'en attente':
                    $en_attente[] = $reservation;
                    break;
                case 'annulé':
                    $annulees[] = $reservation;
                    break;
                case 'confirmé':
                    $confirmees[] = $reservation;
                    break;
                case 'terminé':
                    $terminees[] = $reservation;
                    break;
                default:
                    // Autre statut non pris en charge
                    break;
            }
        }

        // Retourner la vue avec les réservations classées par statut
        return view('reservation_cl', compact('en_attente', 'annulees', 'confirmees', 'terminees'));
    }
    // Rediriger vers une page de connexion si aucun client n'est connecté
    else {
        return redirect()->route('login');
    }
}
}