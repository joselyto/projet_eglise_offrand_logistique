<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use App\Models\Materielcategorie;
use App\Models\Mouvementmateriel;
use Illuminate\Support\Facades\Auth;
use App\Models\Typemouvementmateriel;
use Illuminate\Support\Facades\DB;

class logistiqueController extends Controller
{
    //
    //==============================LOGISTIQUE=========================================
    public function logistique(){
        $materiels = Materiel::all();
        return view('app.logistiques.logistique', compact('materiels'));
    }
    public function logistique_form(){
        $categories = Materielcategorie::all();
        return view('app.logistiques.form_logistique', compact('categories'));

    }
    public function inser_logistique_form(Request $request){
        $validated = $request->validate([
            'libelle' => 'required',
        ]);
        Materiel::create([
            'libelle' => $request->libelle,
            'quantite' => $request->quantite,
            'materielcategorie_id' => $request->categorie,
        ]);
        return redirect()->route('logistique.form')->with('success', "Le materiel a été ajouter avec success");
    }
    public function mouv_logistique_form($id){
        $materiel = Materiel::find($id);
        $typesmouvs = Typemouvementmateriel::all();
        return view('app.logistiques.mouv_mat', compact('materiel', 'typesmouvs')); 
    }
    public function inser_mouv_logistique(Request $request, $id){
        // dd($request, $id);
        $validated = $request->validate([
            'motif' => 'required',
            'qte' =>'required',
            'mouvement' =>'required',
        ]);
        $materiel = Materiel::find($id);
        $user = Auth::user()->id;
        if($request->mouvement == 1){
            if($request->qte > 0 ){
                //echo 'ajouter la modifiction';
                $matmouv = $materiel->quantite + $request->qte;
                $materiel->update([
                    'quantite' => $matmouv
                ]);
                Mouvementmateriel::create([
                    'quantite' => $request->qte,
                    'motif' => $request->motif,
                    'materiel_id'=> $id,
                    'typemouvementmateriel_id'=> $request->mouvement,
                    'user_id' => $user,
                ]);

                return redirect()->route('mouvement')->with('success', "Les materiels a été mis a jour avec success");
            }else{  
                return redirect()->route('mouvement')->with('error', "La quantité n'est peut pas etre inferieur ou egale a 0");
            }
        }else{
            if($request->qte > 0 ){
                if($materiel->quantite >= $request->qte ){
                    $matmouv = $materiel->quantite - $request->qte;
                    $materiel->update([
                        'quantite' => $matmouv
                    ]);
                    Mouvementmateriel::create([
                        'quantite' => $request->qte,
                        'motif' => $request->motif,
                        'materiel_id'=> $id,
                        'typemouvementmateriel_id'=> $request->mouvement,
                        'user_id' => $user,
                    ]);
                    return redirect()->route('mouvement')->with('success', "Les materiels a été mis a jour avec success");
                }else{
                    return redirect()->route('mouvement')->with('error', "La quantité de la sortie n'est peut pas etre superieur a celle du stock");
                }
            }else{
                return redirect()->route('mouvement')->with('error', "La quantité n'est peut pas etre inferieur ou egale a 0");
            }
        }

    }
    //==============================CATEGORIE=======================================
    public function categorie(){
        $categories = Materielcategorie::all();
        return view('app.logistiques.categorie', compact('categories'));
    }
    public function categorie_form(){
        return view('app.logistiques.form_categorie');
    }
    public function inser_categorie_form(Request $request){
        $validated = $request->validate([
            'libelle' => 'required',
        ]);
        Materielcategorie::create([
            'libelle' => $request->libelle,
            'description' => $request->desc,
        ]);
        return redirect()->route('categorie.form')->with('success', "La categorie a été ajouter avec success");
    }
    public function categorie_logistique($id){
        
        $categorie_logis = Materiel::where('materielcategorie_id', $id)->get();
        return view('app.logistiques.cat_logistique', compact('categorie_logis'));
    }

    //==============================MOUVEMENT DE MATERIEL=======================================

    public function mouvement(){
        $mouvements = DB::table('mouvementmateriels')
                        ->join('users', 'mouvementmateriels.user_id', '=', 'users.id')
                        ->join('materiels', 'mouvementmateriels.materiel_id', '=', 'materiels.id')
                        ->select('mouvementmateriels.*', 'users.nom','users.prenom', 'materiels.libelle')
                        ->get();
        return view('app.logistiques.vue_mouv_mat', compact('mouvements'));
        
    }

}
