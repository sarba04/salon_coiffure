<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caissiere;
use Illuminate\Support\Facades\DB;

class Gestcaissiere extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $caissieres = Caissiere::all();
      
        return view('GESTION_CAISSIERE/liste_caiss', compact('caissieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('GESTION_CAISSIERE.ajout_caissière');
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
        
        $verification = DB::select('SELECT COUNT(*) as count FROM caissière WHERE login_caissière = ?', [$valeur[0]]);
        $count = $verification[0]->count;
        
        if($count > 0) {
            
            return redirect()->route('ajoutcaissière')->with('error', 'L\'ogin déjà existant. Veuillez en choisir un autre');
        
        } else {
            $retour = DB::insert('INSERT INTO caissière(login_caissière, mot_pass_caissière, nom_caissière, prenom_caissière, datenaiss_caissière, telephone_caissière, email_caissière) VALUES(?,?,?,?,?,?,?)', $valeur);
            if($retour) {
                $msg = "Ajout effectué avec succès";
                return redirect()->route('listecaissière')->with('success2', 'Ajout effectué avec succès');
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
        $caissiere= DB::SELECT('SELECT * FROM caissière WHERE login_caissière=?',[$id]);
        $caissiere=$caissiere[0];

        return view('GESTION_CAISSIERE.modif_caissiere', compact('caissiere'));
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
    public function update(Request $request, $id)
    {
        // Récupérer les valeurs du formulaire
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $dateNaissance = $request->input('date');
        $telephone = $request->input('tel');
        $email = $request->input('email');
        $login = $request->input('login');
    
        // Effectuer la mise à jour dans la base de données
        $reponse = DB::update(
            "UPDATE caissière 
             SET nom_caissière=?, prenom_caissière=?, datenaiss_caissière=?, telephone_caissière=?, email_caissière=?, login_caissière=?
             WHERE login_caissière=?",
            [$nom, $prenom, $dateNaissance, $telephone, $email, $login, $id]
        );
    
        // Vérifier si la mise à jour a été effectuée avec succès
        if ($reponse > 0) {
            return redirect()->route('modifcaissière', ['id' => $id])->with('success', 'La modification a été effectuée avec succès');
        } else {
            $msg = "Erreur lors de la modification de la caissière";
            // Gérer l'erreur ici
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requete="DELETE FROM caissière WHERE login_caissière=?";
        DB::DELETE($requete, [$id]);
        return redirect()->route('listecaissière')->with('delete','caissière supprimer avec succes');
        //
    }
}
