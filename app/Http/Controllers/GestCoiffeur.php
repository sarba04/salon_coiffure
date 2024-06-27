<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coiffeur;
use Illuminate\Support\Facades\DB;

class GestCoiffeur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coiffeurs = Coiffeur::all();
        
      
        return view('GESTION_COIFFEUR/liste_coiffeur', compact('coiffeurs'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('GESTION_COIFFEUR.ajout_coiffeur');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $valeur=[
            request('login'),
            request('password'),
            request('nom'),
            request('prenom'),
            request('date'),
            request('tel'),
            request('adresse'),
        ];
        
        $verification = DB::select('SELECT COUNT(*) as count FROM coiffeur WHERE login_coiffeur = ?', [$valeur[0]]);
        $count = $verification[0]->count;
        
        if($count > 0) {
            
            return redirect()->route('ajoutcoiffeur')->with('error', 'L\'ogin déjà existant. Veuillez en choisir un autre');
        
        } else {
            $retour = DB::insert('INSERT INTO coiffeur(login_coiffeur, mot_pass_coiffeur, nom_coiffeur, prenom_coiffeur, datenaiss_coiffeur, telephone_coiffeur, email_coiffeur) VALUES(?,?,?,?,?,?,?)', $valeur);
            if($retour) {
                $msg = "Ajout effectué avec succès";
                return redirect()->route('listecoiffeur')->with('success2', 'Ajout effectué avec succès');
            } else {
                $msg = 'Échec de l\'enregistrement';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coiffeur= DB::SELECT('SELECT * FROM coiffeur WHERE login_coiffeur=?',[$id]);
        $coiffeur=$coiffeur[0];


        $coiffures_coiffeur = DB::table('commande_coiffure')
        ->join('coiffure', 'commande_coiffure.id_coiffure', '=', 'coiffure.id_coiffure')
        ->select('coiffure.nom_coiffure', 'coiffure.id_coiffure')
        ->where('commande_coiffure.login_coiffeur', [$id])
        ->get();

        $coiffures = DB::table('coiffure')->get();
        

        return view('GESTION_COIFFEUR.modif_coiffeur',compact( 'coiffeur','coiffures_coiffeur','coiffures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (request()->has('modifier')) {
            $log = request('login');
            $password = request('mot_pass');
            $nom = request('nom');
            $prenoms = request('prenom');
            $date = request('date');
            $telephone = request('tel');
            $adresse = request('email');
        
            // Mise à jour du coiffeur
            DB::table('coiffeur')
                ->where('login_coiffeur', $id)
                ->update([
                    'login_coiffeur' => $log,
                    'mot_pass_coiffeur' => $password,
                    'nom_coiffeur' => $nom,
                    'prenom_coiffeur' => $prenoms,
                    'datenaiss_coiffeur' => $date,
                    'telephone_coiffeur' => $telephone,
                    'email_coiffeur' => $adresse,
                ]);
        
            // Redirection après la mise à jour
            return redirect()->route('modifcoiffeur', ['id' => $id])->with('success_message', 'Modification effectuée avec succès');
        }
       if (request()->has('ajouter_coiffure')) {
    $nouvelle_coiffure_id = request('nouvelle_coiffure');

    // Insertion de la nouvelle coiffure
    DB::table('commande_coiffure')->insert([
        'id_coiffure' => $nouvelle_coiffure_id,
        'login_coiffeur' => $id,
    ]);

    return redirect()->route('modifcoiffeur', ['id' => $id])->with('success_message', 'La nouvelle coiffure a été ajoutée avec succès.');
}
if (request()->has('supprimer_coiffure')) {
    $coiffures_a_supprimer = request('coiffures_a_supprimer');

    // Suppression des coiffures sélectionnées
    DB::table('commande_coiffure')
        ->where('login_coiffeur', $id)
        ->whereIn('id_coiffure', $coiffures_a_supprimer)
        ->delete();

    // Redirection après la suppression
    return redirect()->route('modifcoiffeur', ['id' => $id])->with('success_message', 'Les coiffures sélectionnées ont été supprimées avec succès.');
}
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requete="DELETE FROM coiffeur WHERE login_coiffeur=?";
        DB::DELETE($requete, [$id]);
        return redirect()->route('listecoiffeur')->with('delete','coiffeur supprimer avec succes');
        }
        //
    
}
