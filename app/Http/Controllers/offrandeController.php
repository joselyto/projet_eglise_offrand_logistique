<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mouvement;
use Illuminate\Http\Request;
use App\Models\Mouvementoffrande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Typemouvementoffrande;

class offrandeController extends Controller
{
    //==========================OFFRANDE ORDINAIRE======================================

    public function offrande_ordinaire(){
        $mouvementoffrandes = DB::table('mouvementoffrandes')
                                ->join('users','mouvementoffrandes.user_id', '=','users.id')
                                ->select('mouvementoffrandes.*', 'users.id','users.nom','users.prenom')
                                ->where('mouvementoffrandes.type_offrande', 1)
                                ->latest()->get();
        //---------------------CALCUL DE MONTANT EN FRANC-------------                       
        $montant_entre_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                        ->where('type_offrande', 1)
                        ->where('monnaie', 2)
                        ->where('typemouvementoffrande_id', 1)
                        ->get();
        $montant_sortie_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                        ->where('type_offrande', 1)
                        ->where('monnaie', 2)
                        ->where('typemouvementoffrande_id', 2)
                        ->get();

        $result_franc = $montant_entre_franc[0]['montant'] - $montant_sortie_franc[0]['montant'];
        //---------------------CALCUL DE MONTANT EN DOLLAR-------------                       
        $montant_entre_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
              ->where('type_offrande', 1)
              ->where('monnaie', 1)
              ->where('typemouvementoffrande_id', 1)
              ->get();
        $montant_sortie_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
              ->where('type_offrande', 1)
              ->where('monnaie', 1)
              ->where('typemouvementoffrande_id', 2)
              ->get();
        $result_dollar = $montant_entre_dollar[0]['montant'] - $montant_sortie_dollar[0]['montant'];

        return view('app.offrandes.ordinaire', compact('mouvementoffrandes', 'result_franc', 'result_dollar'));
    }
    public function offrande_ordinaire_form(){
        $typemouvs = Typemouvementoffrande::all();
        return view('app.offrandes.form_ordinaire', compact('typemouvs'));
    }
    //-----------------------AFFICHAGE--------------------------------
    public function offrande_ordinaire_dollar(){
        $mouvementoffrandes_dollars = DB::table('mouvementoffrandes')
                            ->join('users','mouvementoffrandes.user_id', '=','users.id')
                            ->select('mouvementoffrandes.*', 'users.id','users.nom','users.prenom')
                            ->where('mouvementoffrandes.monnaie', 1)
                            ->where('mouvementoffrandes.type_offrande', 1)
                            ->get();
        
            //---------------------CALCUL DE MONTANT EN DOLLAR-------------                       
            $montant_entre_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                ->where('type_offrande', 1)
                ->where('monnaie', 1)
                ->where('typemouvementoffrande_id', 1)
                ->get();
            $montant_sortie_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                ->where('type_offrande', 1)
                ->where('monnaie', 1)
                ->where('typemouvementoffrande_id', 2)
                ->get();
            $result_dollar = $montant_entre_dollar[0]['montant'] - $montant_sortie_dollar[0]['montant'];
        return view('app.offrandes.ordinaire_dollar', compact('mouvementoffrandes_dollars', 'result_dollar'));
    }
    public function offrande_ordinaire_franc(){
        $mouvementoffrandes_dollars = DB::table('mouvementoffrandes')
                            ->join('users','mouvementoffrandes.user_id', '=','users.id')
                            ->select('mouvementoffrandes.*', 'users.id','users.nom','users.prenom')
                            ->where('mouvementoffrandes.monnaie', 2)
                            ->where('mouvementoffrandes.type_offrande', 1)
                            ->get();
            //--------------------------CALCUL EN FRANC---------------------------------------
            $montant_entre_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                            ->where('type_offrande', 1)
                            ->where('monnaie', 2)
                            ->where('typemouvementoffrande_id', 1)
                            ->get();
            $montant_sortie_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                            ->where('type_offrande', 1)
                            ->where('monnaie', 2)
                            ->where('typemouvementoffrande_id', 2)
                            ->get();
    
            $result_franc = $montant_entre_franc[0]['montant'] - $montant_sortie_franc[0]['montant'];
        return view('app.offrandes.ordinaire_franc', compact('mouvementoffrandes_dollars', 'result_franc'));
    }
    public function offrande_social_dollar(){
        $mouvementoffrandes_dollars = DB::table('mouvementoffrandes')
                            ->join('users','mouvementoffrandes.user_id', '=','users.id')
                            ->select('mouvementoffrandes.*', 'users.id','users.nom','users.prenom')
                            ->where('mouvementoffrandes.monnaie', 1)
                            ->where('mouvementoffrandes.type_offrande', 2)
                            ->get();
                
                //---------------------CALCUL DE MONTANT EN DOLLAR-------------                       
        $montant_entre_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                            ->where('type_offrande', 2)
                            ->where('monnaie', 1)
                            ->where('typemouvementoffrande_id', 1)
                            ->get();
        $montant_sortie_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                            ->where('type_offrande', 2)
                            ->where('monnaie', 1)
                            ->where('typemouvementoffrande_id', 2)
                            ->get();

        $result_dollar = $montant_entre_dollar[0]['montant'] - $montant_sortie_dollar[0]['montant'];
        return view('app.offrandes.social_dollar', compact('mouvementoffrandes_dollars', 'result_dollar'));
    }
    public function offrande_social_franc(){
        $mouvementoffrandes_dollars = DB::table('mouvementoffrandes')
                            ->join('users','mouvementoffrandes.user_id', '=','users.id')
                            ->select('mouvementoffrandes.*', 'users.id','users.nom','users.prenom')
                            ->where('mouvementoffrandes.monnaie', 2)
                            ->where('mouvementoffrandes.type_offrande', 2)
                            ->get();

                //---------------------CALCUL DE MONTANT EN FRANC-------------                       
        $montant_entre_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                            ->where('type_offrande', 2)
                            ->where('monnaie', 2)
                            ->where('typemouvementoffrande_id', 1)
                            ->get();
        $montant_sortie_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                            ->where('type_offrande', 2)
                            ->where('monnaie', 2)
                            ->where('typemouvementoffrande_id', 2)
                            ->get();

        $result_franc = $montant_entre_franc[0]['montant'] - $montant_sortie_franc[0]['montant'];
        return view('app.offrandes.social_franc', compact('mouvementoffrandes_dollars', 'result_franc'));
    }
    
    //--------------------INSERT ORDINAIRE------------------------------
    public function inser_offrande_ordinaire(Request $request){
        // dd($request);
        $user = Auth::user()->id;
        $typeoffr = 1;
        $request->validate([
            'montant' => 'required',
            'mouvement' => 'required',
            'motif' => 'required',
            'montant' => 'required',
            'monnaie' => 'required',
            'date_concerner' => 'required',
        ]);
        if($request->monnaie == 1){
            if($request->mouvement == 2){
                //---------------------CALCUL DE MONTANT EN DOLLAR-------------                       
                $montant_entre_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 1)
                    ->where('monnaie', 1)
                    ->where('typemouvementoffrande_id', 1)
                    ->get();
                $montant_sortie_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 1)
                    ->where('monnaie', 1)
                    ->where('typemouvementoffrande_id', 2)
                    ->get();
                $result_dollar = $montant_entre_dollar[0]['montant'] - $montant_sortie_dollar[0]['montant'];
                if($request->montant > 0){
                    if($request->montant < $result_dollar){
                        Mouvementoffrande::create([
                            'montant' => $request->montant,
                            'monnaie' => $request->monnaie, 
                            'motif'=> $request->motif,
                            'date_concerner'=> $request->date_concerner,
                            'typemouvementoffrande_id' => $request->mouvement,
                            'type_offrande' => $request = $typeoffr,
                            'user_id' => $request = $user,
                        ]);
                        return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");
                    }else{
                        return redirect()->route('offrande.ordinaireForm')->with('error', "La sortie du montant ne peut pas etre superieur au montant present à la caise");
                    }
                }else{
                    return redirect()->route('offrande.ordinaireForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");

                }
               
            }else{
                if($request->montant > 0){
                    Mouvementoffrande::create([
                        'montant' => $request->montant,
                        'monnaie' => $request->monnaie, 
                        'motif'=> $request->motif,
                        'date_concerner'=> $request->date_concerner,
                        'typemouvementoffrande_id' => $request->mouvement,
                        'type_offrande' => $request = $typeoffr,
                        'user_id' => $request = $user,
                    ]);
                    return redirect()->route('offrande.ordinaireForm')->with('success', "L'operation a été effectuer avec succès");
                }else{
                    return redirect()->route('offrande.ordinaireForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");
                }
            }
        }else{
            if($request->mouvement == 2){
            //--------------------CALCUL montant en franc--------------------------------
                $montant_entre_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 1)
                    ->where('monnaie', 2)
                    ->where('typemouvementoffrande_id', 1)
                    ->get();
                $montant_sortie_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 1)
                    ->where('monnaie', 2)
                    ->where('typemouvementoffrande_id', 2)
                    ->get();
                $result_franc = $montant_entre_franc[0]['montant'] - $montant_sortie_franc[0]['montant'];
                if($request->montant > 0){
                    if($request->montant < $result_franc){
                        Mouvementoffrande::create([
                            'montant' => $request->montant,
                            'monnaie' => $request->monnaie, 
                            'motif'=> $request->motif,
                            'date_concerner'=> $request->date_concerner,
                            'typemouvementoffrande_id' => $request->mouvement,
                            'type_offrande' => $request = $typeoffr,
                            'user_id' => $request = $user,
                        ]);
                        return redirect()->route('offrande.ordinaireForm')->with('success', "L'offrande du jour à été ajouter avec success");
                    }else{
                        return redirect()->route('offrande.ordinaireForm')->with('error', "La sortie du montant ne peut pas etre superieur au montant present à la caise");
                    }
                }else{
                    return redirect()->route('offrande.ordinaireForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");
                }
            }else{
                if($request->montant > 0){
                    Mouvementoffrande::create([
                        'montant' => $request->montant,
                        'monnaie' => $request->monnaie, 
                        'motif'=> $request->motif,
                        'date_concerner'=> $request->date_concerner,
                        'typemouvementoffrande_id' => $request->mouvement,
                        'type_offrande' => $request = $typeoffr,
                        'user_id' => $request = $user,
                    ]);
                    return redirect()->route('offrande.ordinaireForm')->with('success', "L'offrande du jour à été ajouter avec success");
                }else{
                    return redirect()->route('offrande.ordinaireForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");
                }
            }
        }
        
    }

    //==========================OFFRANDE SOCIAL======================================
    public function offrande_social(){
        $mouvementoffrandes = DB::table('mouvementoffrandes')
        ->join('users','mouvementoffrandes.user_id', '=','users.id')
        ->select('mouvementoffrandes.*', 'users.id','users.nom','users.prenom')
        ->where('mouvementoffrandes.type_offrande', 2)
        ->get();

        //---------------------CALCUL DE MONTANT EN FRANC-------------                       
        $montant_entre_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                        ->where('type_offrande', 2)
                        ->where('monnaie', 2)
                        ->where('typemouvementoffrande_id', 1)
                        ->get();
        $montant_sortie_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                        ->where('type_offrande', 2)
                        ->where('monnaie', 2)
                        ->where('typemouvementoffrande_id', 2)
                        ->get();

        $result_franc = $montant_entre_franc[0]['montant'] - $montant_sortie_franc[0]['montant'];

        //---------------------CALCUL DE MONTANT EN DOLLAR-------------                       
        $montant_entre_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
              ->where('type_offrande', 2)
              ->where('monnaie', 1)
              ->where('typemouvementoffrande_id', 1)
              ->get();
        $montant_sortie_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
              ->where('type_offrande', 2)
              ->where('monnaie', 1)
              ->where('typemouvementoffrande_id', 2)
              ->get();

        $result_dollar = $montant_entre_dollar[0]['montant'] - $montant_sortie_dollar[0]['montant'];

        return view('app.offrandes.social', compact('mouvementoffrandes', 'result_dollar', 'result_franc'));
    }
    public function offrande_social_form(){
        $typemouvs = Typemouvementoffrande::all();
        return view('app.offrandes.form_social', compact('typemouvs'));
    }
    //--------------------INSERT OFFRANDE SOCIAL------------------------------
    public function inser_offrande_social(Request $request){
        // dd($request);
        $user = Auth::user()->id;
        $typeoffr = 2;
        $request->validate([
            'montant' => 'required',
            'mouvement' => 'required',
            'motif' => 'required',
            'montant' => 'required',
            'monnaie' => 'required',
            'date_concerner' => 'required',
        ]);
        if($request->monnaie == 1){
            if($request->mouvement == 2){
                //---------------------CALCUL DE MONTANT EN DOLLAR-------------                       
                $montant_entre_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 2)
                    ->where('monnaie', 1)
                    ->where('typemouvementoffrande_id', 1)
                    ->get();
                $montant_sortie_dollar = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 2)
                    ->where('monnaie', 1)
                    ->where('typemouvementoffrande_id', 2)
                    ->get();
                $result_dollar = $montant_entre_dollar[0]['montant'] - $montant_sortie_dollar[0]['montant'];
                if($request->montant > 0){
                    if($request->montant < $result_dollar){
                        Mouvementoffrande::create([
                            'montant' => $request->montant,
                            'monnaie' => $request->monnaie, 
                            'motif'=> $request->motif,
                            'date_concerner'=> $request->date_concerner,
                            'typemouvementoffrande_id' => $request->mouvement,
                            'type_offrande' => $request = $typeoffr,
                            'user_id' => $request = $user,
                        ]);
                        return redirect()->route('offrande.socialForm')->with('success', "L'operation a été effectuer avec succès");
                    }else{
                        return redirect()->route('offrande.socialForm')->with('error', "La sortie du montant ne peut pas etre superieur au montant present a la caise");
                    }
                }else{
                    return redirect()->route('offrande.socialForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");

                }
               
            }else{
                if($request->montant > 0){
                    Mouvementoffrande::create([
                        'montant' => $request->montant,
                        'monnaie' => $request->monnaie, 
                        'motif'=> $request->motif,
                        'date_concerner'=> $request->date_concerner,
                        'typemouvementoffrande_id' => $request->mouvement,
                        'type_offrande' => $request = $typeoffr,
                        'user_id' => $request = $user,
                    ]);
                    return redirect()->route('offrande.socialForm')->with('success', "L'operation a été effectuer avec succès");
                }else{
                    return redirect()->route('offrande.socialForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");
                }
            }
        }else{
            if($request->mouvement == 2){
            //--------------------CALCUL montant en franc--------------------------------
                $montant_entre_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 2)
                    ->where('monnaie', 2)
                    ->where('typemouvementoffrande_id', 1)
                    ->get();
                $montant_sortie_franc = Mouvementoffrande::selectRaw('sum(montant) as montant')
                    ->where('type_offrande', 2)
                    ->where('monnaie', 2)
                    ->where('typemouvementoffrande_id', 2)
                    ->get();
                $result_franc = $montant_entre_franc[0]['montant'] - $montant_sortie_franc[0]['montant'];
                if($request->montant > 0){
                    if($request->montant < $result_franc){
                        Mouvementoffrande::create([
                            'montant' => $request->montant,
                            'monnaie' => $request->monnaie, 
                            'motif'=> $request->motif,
                            'date_concerner'=> $request->date_concerner,
                            'typemouvementoffrande_id' => $request->mouvement,
                            'type_offrande' => $request = $typeoffr,
                            'user_id' => $request = $user,
                        ]);
                        return redirect()->route('offrande.socialForm')->with('success', "L'offrande du jour à été ajouter avec success");
                    }else{
                        return redirect()->route('offrande.socialForm')->with('error', "La sortie du montant ne peut pas etre superieur au montant present à la caise");
                    }
                }else{
                    return redirect()->route('offrande.socialForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");
                }
            }else{
                if($request->montant > 0){
                    Mouvementoffrande::create([
                        'montant' => $request->montant,
                        'monnaie' => $request->monnaie, 
                        'motif'=> $request->motif,
                        'date_concerner'=> $request->date_concerner,
                        'typemouvementoffrande_id' => $request->mouvement,
                        'type_offrande' => $request = $typeoffr,
                        'user_id' => $request = $user,
                    ]);
                    return redirect()->route('offrande.socialForm')->with('success', "L'offrande du jour à été ajouter avec success");
                }else{
                    return redirect()->route('offrande.socialForm')->with('error', "Le montant ne peu pas etre inferieur ou egale a 0");
                }
            }
        }
    }
}
