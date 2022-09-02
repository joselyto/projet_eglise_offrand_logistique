<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use App\Models\lienvideo;
use Illuminate\Http\Request;

class parametreController extends Controller
{
    public function demande_acces(){
        $demandes = Demande::all();
        return view('app.parametre.demande', compact('demandes'));
    }
    public function utilisateurs(){
        $utilisateurs = User::all();
        return view('app.parametre.utilisateurs', compact('utilisateurs'));
    }
    public function valider_demande1($id){
        $demande = Demande::find($id);
        $statut = 1;
        $types = 1;
        User::create([
           'nom' => $demande->nom,
           'prenom' => $demande->prenom,
           'email' => $demande->email,
           'password' => $demande->password,
           'types' => $types,
           'statut' => $statut,
        ]);
        $demande->delete();

        return redirect()->route('demande')->with('success', "L'utilisateur valider avec success");
        return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");

    }
    public function valider_demande2($id){
        $demande = Demande::find($id);
        $statut = 1;
        $types = 2;
        User::create([
           'nom' => $demande->nom,
           'prenom' => $demande->prenom,
           'email' => $demande->email,
           'password' => $demande->password,
           'types' => $types,
           'statut' => $statut,
        ]);
        $demande->delete();

        return redirect()->route('demande')->with('success', "L'utilisateur valider avec success");
        return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");

    }
    public function valider_demande3($id){
        $demande = Demande::find($id);
        $statut = 1;
        $types = 3;
        User::create([
           'nom' => $demande->nom,
           'prenom' => $demande->prenom,
           'email' => $demande->email,
           'password' => $demande->password,
           'types' => $types,
           'statut' => $statut,
        ]);
        $demande->delete();

        return redirect()->route('demande')->with('success', "L'utilisateur valider avec success");
        return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");

    }
    public function valider_demande4($id){
        $demande = Demande::find($id);
        $statut = 1;
        $types = 4;
        User::create([
           'nom' => $demande->nom,
           'prenom' => $demande->prenom,
           'email' => $demande->email,
           'password' => $demande->password,
           'types' => $types,
           'statut' => $statut,
        ]);
        $demande->delete();

        return redirect()->route('demande')->with('success', "L'utilisateur valider avec success");
        return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");

    }
    public function valider_demande5($id){
        $demande = Demande::find($id);
        $statut = 1;
        $types = 5;
        User::create([
           'nom' => $demande->nom,
           'prenom' => $demande->prenom,
           'email' => $demande->email,
           'password' => $demande->password,
           'types' => $types,
           'statut' => $statut,
        ]);
        $demande->delete();

        return redirect()->route('demande')->with('success', "L'utilisateur valider avec success");
        return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");

    }
    public function videos_form(){
        return view('app.parametre.formVideo');
    }
    public function inser_videos(Request $request){
        
        lienvideo::create([
            'lien' =>$request->video,
        ]);
        return redirect()->route('videos_form')->with('success', "La video ajouter avec success");

    }
}
