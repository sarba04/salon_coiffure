<?php

namespace App\Http\Controllers;
use App\Models\Reservations; 
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CaissiereController extends Controller
{
    //
    public function rdvconf()
{
    $reservations = DB::table('rendez_vous as rdv')
    ->select('rdv.id_rdv', 'rdv.date_rdv', 'rdv.login_client', 'coi.nom_coiffeur', 'coi.prenom_coiffeur', 'cli.nom_client', 'cli.prenom_client')
    ->join('coiffeur as coi', 'rdv.login_coiffeur', '=', 'coi.login_coiffeur')
    ->join('client as cli', 'rdv.login_client', '=', 'cli.login_client')
    ->where('rdv.statu_rdv', 'confirmé')
    ->get();


    return view('caissiere_dashboard',compact('reservations'));
}
}
