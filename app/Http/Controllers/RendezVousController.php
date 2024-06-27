<?php

namespace App\Http\Controllers;
use App\Models\RendezVous; 
use Illuminate\Support\Facades\DB;
use App\Models\Coiffure;
use App\Models\Coiffeur;
use App\Models\Reservations;
use App\Models\Client;
use App\Models\CommandeCoiffure;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    //
    public function reservations(Request $request)
    {
    $rendez_vous = DB::table('rendez_vous')->get();
    return view('GESTION_RDV.reservations', compact('rendez_vous'));
    }


    public function confirmerRdv($id)
    {
        // Exécuter la requête SQL pour mettre à jour le statut du rendez-vous à "confirmé"
        $confirmé = DB::update('UPDATE rendez_vous SET statu_rdv = ? WHERE id_rdv = ?', ['confirmé', $id]);
    
        if ($confirmé) {
            return redirect()->back()->with('success3', 'Rendez-vous confirmé avec succès.');
        } else {
            return redirect()->back()->with('error', 'Rendez-vous non trouvé.');
        }
    }



    public function annulerRdv($id)
{
    $reponse = DB::update("UPDATE rendez_vous SET statu_rdv = 'annulé' WHERE id_rdv = ?", [$id]);

    if ($reponse) {
        $msg = 'Rendez-vous annulé avec succès.';
    } else {
        $msg = 'Erreur lors de l\'annulation du rendez-vous.';
    }

    // Redirection vers la page précédente avec un message
    return redirect()->back()->with('success', $msg);
}
    


    public function terminerRdv($id)
    {
        $reponse = DB::update("UPDATE rendez_vous SET statu_rdv = 'terminé' WHERE id_rdv = ?", [$id]);
    
        if ($reponse) {
            $msg = 'Rendez-vous terminé  avec succès.';
        } else {
            $msg = 'Erreur lors de l\'annulation du rendez-vous.';
        }
    
        // Redirection vers la page précédente avec un message
        return redirect()->back()->with('success2', $msg);
    }
    
    public function ajoutrdv(Request $request){
        $clients = Client::all();

        // Récupérer la liste de toutes les coiffures disponibles
        $coiffures = DB::table('coiffure')->select('id_coiffure', 'nom_coiffure')->get();
    
        // Récupérer la coiffure sélectionnée dans le formulaire
        $selectedCoiffure = $request->input('coiffure');
    
        // Initialiser les variables pour stocker les sélections précédentes
        $selectedCoiffeur = $request->input('coiffeur');
        $selectedDay = $request->input('jour');
        $selectedHeure = $request->input('heure');
    
        // Initialiser les listes pour stocker les données récupérées
        $coiffeurs = [];
        $jours = [];
        $heures = [];
    
        // Vérifier si une coiffure est sélectionnée
        if ($selectedCoiffure) {
            // Récupérer les coiffeurs pour la coiffure sélectionnée
            $coiffeurs = DB::table('coiffeur')
                ->join('commande_coiffure', 'coiffeur.login_coiffeur', '=', 'commande_coiffure.login_coiffeur')
                ->where('commande_coiffure.id_coiffure', $selectedCoiffure)
                ->select('coiffeur.login_coiffeur', 'coiffeur.nom_coiffeur', 'coiffeur.prenom_coiffeur')
                ->get();
    
            // Vérifier si un coiffeur est sélectionné
            if ($selectedCoiffeur) {
                // Récupérer les jours disponibles pour le coiffeur sélectionné
                $jours = DB::table('Disponibilité')
                    ->join('coiffeur_disponibilité', 'Disponibilité.id_dispo', '=', 'coiffeur_disponibilité.id_dispo')
                    ->where('coiffeur_disponibilité.login_coiffeur', $selectedCoiffeur)
                    ->distinct()
                    ->pluck('Disponibilité.jour')
                    ->toArray();
    
                // Vérifier si un jour est sélectionné
                if ($selectedDay) {
                    // Récupérer les heures disponibles pour le jour sélectionné et le coiffeur sélectionné
                    $heures = DB::table('Disponibilité')
                        ->join('coiffeur_disponibilité', 'Disponibilité.id_dispo', '=', 'coiffeur_disponibilité.id_dispo')
                        ->where('coiffeur_disponibilité.login_coiffeur', $selectedCoiffeur)
                        ->where('Disponibilité.jour', $selectedDay)
                        ->pluck('Disponibilité.heure')
                        ->toArray();
                }
            }
        }
    
        // Passer les données et les sélections précédentes à la vue
        return view('GESTION_RDV.ajout_rdv', compact('coiffures', 'coiffeurs', 'jours', 'heures', 'selectedCoiffure', 'selectedCoiffeur', 'selectedDay', 'selectedHeure','clients'));
    }
    

   public function creerReservation(Request $request)
{
    // Validez les données du formulaire
    $request->validate([
        'jour' => 'required',
        'heure' => 'required',
        'coiffeur' => 'required',
        'client' => 'required',
    ]);

    // Créez une nouvelle instance de réservation
    $reservation = new Reservations();
    $reservation->date_rdv = $request->jour . ' ' . $request->heure;
    $reservation->statu_rdv = "en attente";
    $reservation->login_coiffeur = $request->coiffeur;
    $reservation->nom_coiffure = $request->coiffure;

    $reservation->login_client = $request->client;
    // Ajoutez d'autres champs si nécessaire

    // Enregistrez la réservation
    $reservation->save();

    // Redirigez l'utilisateur vers une page de confirmation ou autre
    return back()->with('success', 'La réservation a été créée avec succès.');
}
}









