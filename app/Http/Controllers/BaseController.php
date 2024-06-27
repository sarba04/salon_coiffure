<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrateur;
use App\Models\Client; 
use App\Models\Caissiere; 

class BaseController extends Controller
{
  
    public function index()
    {


       return view('index');
    } 

    public function afcon_ad(){
        return view('connexion_ad');

    }
  
    public function opconnexion(Request $request)
    {

        $login = $request->input('login');
        $password = $request->input('password');
        $role = $request->input('role');
        
        switch ($role) {
            case "administrateur":
                $user = Administrateur::where('login_admin', $login)
                                       ->where('mot_pass_admin', $password)
                                       ->first();
                if ($user) {
                    $request->session()->put('nom_admin', $user->nom_admin);


                    return redirect()->route('admin_dashboard');
                }
                break;
            case "coiffeur":
                $user = coiffeur::where('login_admin', $login)
                ->where('mot_pass_admin', $password)
                ->first();

                
                break;
            case "caissiere":
                $user = caissiere::where('login_caissière', $login)
                ->where('mot_pass_caissière', $password)
                ->first();

                return redirect()->route('caissière_dashboard');


                
                break;
        }
        
        
        return back()->withInput()->withErrors(['message' => 'Identifiants ou mot de passe incorrects. Veuillez réessayer.']);
    }
    
    //

   
}