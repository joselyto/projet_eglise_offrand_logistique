<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\logistiqueController;
use App\Http\Controllers\offrandeController;
use App\Http\Controllers\parametreController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


Route::get('/', [indexController::class, 'index'])->name('index');
Route::get('/videos', [indexController::class, 'videos'])->name('videos');
Route::get('/administrateur-intiale-du-logiciel-hfdtrtkhgshj-ghjskghfsjkshysd', [indexController::class, 'admini_initail']);


Route::middleware(['auth'])->group(function(){

    Route::get('/menu', [indexController::class, 'menu'])->name('menu');
    //===================================OFFRANDE===========================================
    //-----------------------------------OFFRANDE ORDINAIRE--------------------------
    Route::get('/offrande_ordinaire', [offrandeController::class, 'offrande_ordinaire'])->name('offrande.ordinaire');
    Route::get('/offrande_ordinaire_form', [offrandeController::class, 'offrande_ordinaire_form'])->name('offrande.ordinaireForm');
    Route::post('/inser_offrande_ordinaire', [offrandeController::class, 'inser_offrande_ordinaire'])->name('inser_offr_ordi');
    //-----------------------------AFFICHANGE------------------------------------------------------
    Route::get('/offrande_ordinaire_dollar',[offrandeController::class, 'offrande_ordinaire_dollar'])->name('offrande.ordinaire.dollar');
    Route::get('/offrande_ordinaire_franc',[offrandeController::class, 'offrande_ordinaire_franc'])->name('offrande.ordinaire.franc');

    //-----------------------------------OFFRANDE SOCIAL--------------------------
    Route::get('/offrande_social', [offrandeController::class, 'offrande_social'])->name('offrande.social');
    Route::get('/offrande_social_form', [offrandeController::class, 'offrande_social_form'])->name('offrande.socialForm');
    Route::post('/inser_offrande_social', [offrandeController::class, 'inser_offrande_social'])->name('inser_offr_soc');
    //-----------------------------AFFICHANGE------------------------------------------------------
    Route::get('/offrande_social_dollar',[offrandeController::class, 'offrande_social_dollar'])->name('offrande.social.dollar');
    Route::get('/offrande_social_franc',[offrandeController::class, 'offrande_social_franc'])->name('offrande.social.franc');



    //=============================================LOGISTIQUE=================================================
    //---------------------------------------------MATERIAUX----------------------------------------------
    Route::get('/logistique', [logistiqueController::class, 'logistique'])->name('logistique');
    Route::get('/logistique_form', [logistiqueController::class, 'logistique_form'])->name('logistique.form');
    Route::post('/inser_logistique_form', [logistiqueController::class, 'inser_logistique_form'])->name('inser.logistique.form');
    Route::get('/mouv_logistique_form/{id}', [logistiqueController::class, 'mouv_logistique_form'])->name('mouv.logistique.form');
    Route::post('/inser_mouv_logistique_form/{id}', [logistiqueController::class, 'inser_mouv_logistique'])->name('inser.mouv_logistique.form');
    Route::get('/mouvement', [logistiqueController::class, 'mouvement'])->name('mouvement');
    //----------------------------------------------CATEGORIE----------------------------------------
    Route::get('/categorie', [logistiqueController::class, 'categorie'])->name('categorie');
    Route::get('/categorie_form', [logistiqueController::class, 'categorie_form'])->name('categorie.form');
    Route::post('/inser_categorie_form', [logistiqueController::class, 'inser_categorie_form'])->name('inser.categorie.form');
    Route::get('/categorie_logistique/{id}', [logistiqueController::class, 'categorie_logistique'])->name('categorie.logistique');
    //============================================PARAMETRE====================================================
    Route::get('parametre_demande', [parametreController::class, 'demande_acces'])->name('demande');
    Route::get('utilisateur', [parametreController::class, 'utilisateurs'])->name('utilisateurs');
    Route::get('valider_demande1/{id}', [parametreController::class, 'valider_demande1'])->name('valider1');
    Route::get('valider_demande2/{id}', [parametreController::class, 'valider_demande2'])->name('valider2');
    Route::get('valider_demande3/{id}', [parametreController::class, 'valider_demande3'])->name('valider3');
    Route::get('valider_demande4/{id}', [parametreController::class, 'valider_demande4'])->name('valider4');
    Route::get('valider_demande5/{id}', [parametreController::class, 'valider_demande5'])->name('valider5');
    Route::get('videos_form', [parametreController::class, 'videos_form'])->name('videos_form');
    Route::post('inser_videos', [parametreController::class, 'inser_videos'])->name('inser_videos');

    //============================================Contact====================================================
    Route::post('/contact', [indexController::class, 'contact'])->name('contact');

});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
