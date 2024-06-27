<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\TpClasse;
use App\Http\Controllers\GestEleve;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CoiffureController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\GestClientController;
use App\Http\Controllers\GestCoiffeur;
use App\Http\Controllers\GestCaissiere;
use App\Http\Controllers\CaissiereController;
use App\Http\Controllers\Logout;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('contact/', function () {
    return view('contact');
});
Route::get('presentation/', function () {
    return view('presentation');
});

Route::get('accueil/', function () {
    return view('accueil');
});

Route::get('/listEtudiant', function () {
    $lespersonnes =[
        'sarba abidine' , 'oyeniyi thomas' , 'amafi canisius'
    ];
    return view('listEtudiant' ,['lespersonnes' ->$lespersonnes] );
});


route::get('/calculette', [TpClasse::class, 'afcalculatrice']);


Route::get('/tva', [TpClasse::class, 'aftva']);
Route::post('/tva', [TpClasse::class, 'operationtva']); // corrected method name

route::get('/Ajouteleve',[GestEleve::class,'create']);
route::post('/Ajouteleve',[GestEleve::class,'store']);

route::get('/listeleve',[GestEleve::class,'index']);


route::get('/modifeleve/(id)',[GestEleve::class,'show']);
route::post('/modifeleve/(id)',[GestEleve::class,'update']);



Route::get('accueil/', function () {
    return view('accueil');
});






Route::get('/index', [BaseController::class, 'index'])->name('index');
Route::get('/connexion_ad', [BaseController::class, 'afcon_ad'])->name('connexion_ad');
Route::post('/connexion_ad', [BaseController::class, 'opconnexion']);


Route::middleware('admin')->get('/admin_dashboard', [Admin::class, 'affad'])->name('admin_dashboard');



Route::get('/connexion_cl', [ClientController ::class, 'afcon_cl'])->name('connexion');
Route::post('/connexion_cl', [ClientController ::class, 'opcon_cl']);

Route::get('compte_cl/', function () {
    return view('compte_cl');
})->name('compte_cl');                                                 



Route::middleware('client')->get('/compte_cl', [CoiffureController::class, 'index'])->name('compte_cl');

Route::post('/compte_cl', [CoiffureController::class, 'choisirCoiffure']);
Route::get('/reservation_cl', [ClientController::class, 'showreservation'])->name('reservation_cl');




// Route pour afficher le formulaire de connexion
// Route::get('/connexion_cl', 'Auth\LoginController@showLoginForm')->name('connexion');
// Route::get('/connexion_cl', [Auth\LoginController::class, 'showLoginForm']);

// Route pour traiter la soumission du formulaire de connexion
// Route::post('/login', 'Auth\LoginController@login');

// // Route pour traiter la déconnexion de l'utilisateur
// Route::post('/connexion_cl', 'Auth\LoginController@logout')->name('logout');


// Route::get('profil_client/', function () {
//     return view('profil_client');
// })->name('profil_client');

Route::get('/profil_client', [ClientController::class, 'showProfile'])->name('profil_client');
Route::post('/profil_client', [ClientController::class, 'showProfile']);









Route::get('/choixx', [CoiffureController::class, 'choisirCoiffure']);
Route::get('/dispo_coiff', [CoiffureController::class, 'choisirCoiffeur']);
Route::post('/dispo_coiff', [CoiffureController::class, 'reservation']);
// Route::post('/choixx', [CoiffureController::class, 'choisirCoiffeur']);


Route::get('creation_compte/', function () {
    return view('creation_compte');
});

Route::post('creation_compte/', [ClientController ::class, 'register']);



// route::get('/admin_dashboard', [Admin::class, 'affad'])->middleware('auth')->name('admin_dashboard');



Route::post('/confirmer_rdv/{id}', [RendezVousController ::class, 'confirmerRdv'])->name('confirmer_rdv');
Route::get('/annuler_rdv/{id}',[RendezVousController::class,'annulerRdv']);
Route::get('/terminer_rdv/{id}',[RendezVousController::class,'terminerRDV']);


//GESTION CLIENT 
Route::get('/GESTION_CLIENT/gestion_cl', [GestClientController::class, 'index'])->name('gestclient');
// Route::get('/GESTION_CLIENT/ajout_client', [GestClientController::class, 'store'])->name('gestclient');

Route::get('/GESTION_CLIENT/ajout_client', function () {
    return view('GESTION_CLIENT.ajout_client');
})->name('ajoutclient');

Route::post('/GESTION_CLIENT/ajout_client', [GestClientController::class, 'store']);


Route::get('/GESTION_CLIENT/modif_cl/{id}', [GestClientController::class, 'show'])->name('modifclient');
Route::post('/GESTION_CLIENT/modif_cl/{id}', [GestClientController::class, 'update']);
Route::get('/GESTION_CLIENT/delete_cl/{id}', [GestClientController::class, 'destroy']);

//gestion coiffeur

Route::get('/GESTION_COIFFEUR/liste_coiffeur', [GestCoiffeur::class, 'index'])->name('listecoiffeur');

Route::get('/GESTION_COIFFEUR/ajout_coiffeur', [GestCoiffeur::class, 'create'])->name('ajoutcoiffeur');
Route::post('/GESTION_COIFFEUR/ajout_coiffeur', [GestCoiffeur::class, 'store']);

Route::get('/GESTION_COIFFEUR/modif_coiffeur/{id}', [GestCoiffeur::class, 'show'])->name('modifcoiffeur');
Route::post('/GESTION_COIFFEUR/modif_coiffeur/{id}', [GestCoiffeur::class, 'update']);
Route::get('/GESTION_COIFFEUR/delete_coiffeur/{id}', [GestCoiffeur::class, 'destroy']);


//gestion caisiiere

Route::get('/GESTION_CAISSIERE/liste_caissière', [GestCaissiere::class, 'index'])->name('listecaissière');

Route::get('/GESTION_CAISSIERE/ajout_caissière', [GestCaissiere::class, 'create'])->name('ajoutcaissière');
Route::post('/GESTION_CAISSIERE/ajout_caissière', [GestCaissiere::class, 'store']);

Route::get('/GESTION_CAISSIERE/modif_caissière/{id}', [GestCaissiere::class, 'show'])->name('modifcaissière');
Route::post('/GESTION_CAISSIERE/modif_caissière/{id}', [GestCaissiere::class, 'update']);
Route::get('/GESTION_CAISSIERE/delete_caissière/{id}', [GestCaissiere::class, 'destroy']);


Route::get('/GESTION_RDV/reservations', [RendezVousController::class, 'reservations']);
Route::get('/GESTION_RDV/ajout_rdv', [RendezVousController::class, 'ajoutrdv']);


Route::get('/logout', [Logout::class, 'logout'])->name('logout');

Route::post('/GESTION_RDV/ajout_rdv', [RendezVousController::class, 'creerReservation']);


Route::get('/caissiere_dashboard', [CaissiereController::class, 'rdvconf'])->name('caissière_dashboard');
