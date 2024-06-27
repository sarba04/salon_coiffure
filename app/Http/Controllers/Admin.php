<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservations; 
use App\Models\Coiffeur; 
use App\Models\Client; 

use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    //

    public function affad()
    {
        // Exécution de la requête SQL
        $results = DB::select("
            SELECT
                (SELECT COUNT(*) FROM rendez_vous) AS total_reservations,
                (SELECT COUNT(*) FROM client) AS total_clients,
                (SELECT COUNT(*) FROM coiffeur) AS total_coiffeurs,
                (SELECT COUNT(*) FROM caissière) AS total_caissieres
        ");
        
        // Vérification du succès de l'exécution de la requête
        if ($results) {
            // Récupération des résultats
            $total_reservations = $results[0]->total_reservations;
            $total_clients = $results[0]->total_clients;
            $total_coiffeurs = $results[0]->total_coiffeurs;
            $total_caissieres = $results[0]->total_caissieres;
        } else {
            $total_reservations = "Erreur lors de l'exécution de la requête.";
        }
    
        // Récupérer les rendez-vous en attente
        $rdvsAttente = Reservations::with('coiffeur', 'client')
            ->where('statu_rdv', 'en attente')
            ->get();
    
        // Récupérer les rendez-vous confirmés
        $rdvsConfirmes = Reservations::with('coiffeur', 'client')
            ->where('statu_rdv', 'confirmé')
            ->get();
    
        return view('admin_dashboard', [
            'total_reservations' => $total_reservations,
            'total_clients' => $total_clients,
            'total_coiffeurs' => $total_coiffeurs,
            'total_caissieres' => $total_caissieres,
            'rdvsAttente' => $rdvsAttente, // Ajout de rdvsAttente
            'rdvsConfirmes' => $rdvsConfirmes // Ajout de rdvsConfirmes
        ]);
    }
    
}
