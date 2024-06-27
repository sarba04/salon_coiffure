<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coiffure;
use App\Models\Coiffeur;
use App\Models\CommandeCoiffure;
use Illuminate\Support\Facades\Session;

class CoiffureController extends Controller
{
    public function index()
{
    $coiffures = Coiffure::all();
    return view('compte_cl', ['coiffures' => $coiffures]);
}


    public function choisirCoiffure(Request $request)
    {
        $selectedCoiffeur = $request->input('selected_coiffeur');

        $nomCoiffure = $request->input('nom_coiffure');
        $idCoiffure = $request->input('id_coiffure');
        $prixCoiffure = $request->input('prix_coiffure');

        // Stocker les informations de la coiffure dans la session
        $request->session()->put('nom_coiffure', $nomCoiffure);
        $request->session()->put('id_coiffure', $idCoiffure);
        $request->session()->put('prix_coiffure', $prixCoiffure);


        $coiffeurs_dispo = Coiffeur::join('commande_coiffure', 'coiffeur.login_coiffeur', '=', 'commande_coiffure.login_coiffeur')
                                    ->where('id_coiffure', $idCoiffure)
                                    ->select('coiffeur.nom_coiffeur', 'coiffeur.prenom_coiffeur', 'coiffeur.telephone_coiffeur', 'coiffeur.login_coiffeur')
                                    ->get();
        
        // Rediriger l'utilisateur vers une autre page
        return view('choix_coiff', ['coiffeurs_dispo' => $coiffeurs_dispo]);    }



    public function choisirCoiffeur(Request $request)
    {
        $loginCoiffeur = $request->input('selected_coiffeur');
        Session::put('login_coiffeur', $loginCoiffeur);

        $jours = DB::table('Disponibilité')
        ->distinct()
        ->join('coiffeur_disponibilité', 'Disponibilité.id_dispo', '=', 'coiffeur_disponibilité.id_dispo')
        ->where('coiffeur_disponibilité.login_coiffeur', session('login_coiffeur'))
        ->pluck('jour');

    // Récupérer les heures disponibles pour chaque jour
    $heures = [];
    foreach ($jours as $jour) {
        $heures[$jour] = DB::table('Disponibilité')
            ->join('coiffeur_disponibilité', 'Disponibilité.id_dispo', '=', 'coiffeur_disponibilité.id_dispo')
            ->where('coiffeur_disponibilité.login_coiffeur', session('login_coiffeur'))
            ->where('Disponibilité.jour', $jour)
            ->pluck('heure');
    }

        return view('dispo_coiff',compact('jours', 'heures'));
    }

    public function choisirCoiffeurPost(Request $request)
    {
        // $request->session()->put('login_coiffeur', $request->input('selected_coiffeur'));

        // return redirect()->route('dispo_coiff');
    }


    public function reservation(Request $request)
    {
        if ($request->isMethod('post')) {
            $jour = $request->input('jour');
            $heure = $request->input('heure');
            $coiff = $request->session()->get('login_coiffeur');
            $log_cl = $request->session()->get('login_client');
            $nom_c = $request->session()->get('nom_coiffure');
            $id_c = $request->session()->get('id_coiffure');
            $p_c = $request->session()->get('prix_coiffure');

            // Statut de la réservation (peut être "en attente", "confirmée", etc.)
            $statutRdv = "en attente";
            $selectedDayTime = $jour . ' ' . $heure;

            // Requête SQL pour insérer une nouvelle réservation dans la table "rendez_vous"
            $requete_reservation = "INSERT INTO rendez_vous(date_rdv, statu_rdv, login_coiffeur, login_client, nom_coiffure) VALUES (?, ?, ?, ?, ?)";

            // Préparer la requête
            $execute = DB::insert($requete_reservation, [$selectedDayTime, $statutRdv, $coiff, $log_cl, $nom_c]);

            if ($execute) {
                // Rediriger vers une page de confirmation ou de remerciement
                return redirect()->back()->with('success', 'Réservation effectuée avec succès.');
            } else {
                // Gérer le cas où les champs nécessaires ne sont pas définis
                return redirect()->back()->with('error', 'Certains champs sont manquants.');
            }
        }

        // Rediriger vers une page d'erreur si la méthode de requête n'est pas valide
        return redirect()->back()->with('error', 'Méthode de requête invalide.');
    }

 }
