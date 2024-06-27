 <?php
 
namespace App\Http\Controllers;

use App\Models\GestClient;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clients = Client::all();
        // Retourner la vue avec les données des clients
        return view('GESTION_CLIENT/gestion_cl', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   &&
        $valeur=[
    request('login'),
    request('password'),
    request('nom'),
    request('prenom'),
    request('date'),
    request('tel'),
    request('adresse'),
];

$verification = DB::select('SELECT COUNT(*) as count FROM client WHERE login_client = ?', [$valeur[0]]);
$count = $verification[0]->count;

if($count > 0) {
    
    return redirect()->route('ajoutclient')->with('error', 'L\'ogin déjà existant. Veuillez en choisir un autre');

} else {
    $retour = DB::insert('INSERT INTO client(login_client, mot_pass_client, nom_client, prenom_client, datenaiss_client, telephone_client, email_client) VALUES(?,?,?,?,?,?,?)', $valeur);
    if($retour) {
        $msg = "Ajout effectué avec succès";
        return redirect()->route('gestclient')->with('success2', 'Ajout effectué avec succès');
    } else {
        $msg = 'Échec de l\'enregistrement';
    }
}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GestClient  $gestClient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client= DB::SELECT('SELECT * FROM client WHERE login_client=?',[$id]);
        $client=$client[0];
        return view('GESTION_CLIENT.modif_cl',compact( 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GestClient  $gestClient
     * @return \Illuminate\Http\Response
     */
    public function edit(GestClient $gestClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GestClient  $gestClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $valeur=[
            request('nom'),
            request('prenom'),
            request('date'),
            request('tel'),
            request('adresse'),
            request('login')
        ];
        $reponse = DB::UPDATE("UPDATE client SET nom_client=?,prenom_client=?,datenaiss_client=?,telephone_client=?, email_client=? WHERE login_client=?",$valeur);
        if($reponse==TRUE){
            return redirect()->route('modifclient', ['id' => $id])->with('success', 'La modification a été effectuée avec succès');

        }else{
            $msg="Erreur de modifi de l'eleve";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GestClient  $gestClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requete="DELETE FROM client WHERE login_client=?";
        DB::DELETE($requete, [$id]);
        return redirect()->route('gestclient')->with('delete','client supprimer avec succes');
        }
        //
    
}
