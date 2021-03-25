<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\ControleurAccueil;
use App\Http\Controllers\ControleurLogiciels;
use App\Http\Controllers\ControleurSalles;
use App\Http\Controllers\ControleurAutoCompletion;
use App\Http\Controllers\ControleurRecherche;
use App\Http\Controllers\ControleurInstallation;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ControleurListeProfsLogiciel;
use App\Http\Controllers\ControleurEnseignants;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Route vers le contrôleur de la page d'accueil sans authentification*/
Route::resource('accueil',ControleurAccueil::class );
Route::resource('/',ControleurAccueil::class );

Route::get("/", [ControleurAccueil::class, "afficherPage"])->name('accueil');

//Route::post("recherche", [ControleurRecherche::class, "afficherRecherche"])->name("recherche");

Route::post("recherche", [ControleurRecherche::class, "afficherRecherche"])->name("recherche");
Route::get("/", [ControleurAccueil::class, "afficherPage"])->name('accueil.afficherPage');;
Route::post("recherche", [ControleurRecherche::class, "afficherRecherche"])->name("recherche");



Route::get("/", [ControleurAccueil::class, "afficherPage"])->name('accueil.afficherPage');
/* pour l'autocompletion */
Route::get('autocompletion_accueil', [ControleurAutoCompletion::class, 'autocompletion'])->name('autocompletion_accueil');

/*les route liéé a ladmin*/
Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    /*rechcerche admin*/
    Route::post("recherche_admin", [ControleurRecherche::class, "afficherRechercheAdmin"])->name("recherche_admin");
    Route::get("recherche_admin", [ControleurRecherche::class, "afficherRechercheAdminPage"])->name("recherche_admin");
    Route::get('autocompletion', [ControleurAutoCompletion::class, 'autocompletion'])->name('autocompletion');

    /* listes des profs pour un logiciel données */
    Route::post('listeProfs', [ControleurListeProfsLogiciel::class, 'afficherPage'])->name('listeProfs');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('Ajouter_departement', [DepartementController::class, 'create'])->name('departement.create');
    Route::post('Ajouter_departement', [DepartementController::class, 'store'])->name('departement.store');
    Route::get('list_departement', [DepartementController::class, 'lister'])->name('departement.lister');
    Route::get('showDepartement',[DepartementController::class,'show'])->name('showDepartement');
    Route::get('editDepartement',[DepartementController::class,'edit'])->name('editDepartement');
    Route::get('updateDepartement/{id}',[DepartementController::class,'update'])->name('updateDepartement');
    Route::get('deleteDepartement/{id}',[DepartementController::class,'deleteDepartement'])->name('deleteDepartement');

    /* pour les enseignants */
    Route::get('ajouterEnseignant', [ControleurEnseignants::class, 'create'])->name('enseignant.create');
    Route::post('ajouterEnseignant', [ControleurEnseignants::class, 'store'])->name('enseignant.store');
    Route::get('listeEnseignants', [ControleurEnseignants::class, 'lister'])->name('enseignant.lister');
    Route::get('showEnseignant',[ControleurEnseignants::class,'show'])->name('showEnseignant');
    Route::get('editEnseignant',[ControleurEnseignants::class,'edit'])->name('editEnseignant');
    Route::get('updateEnseignant/{id}',[ControleurEnseignants::class,'update'])->name('updateEnseignant');
    Route::get('deleteEnseignant/{id}',[ControleurEnseignants::class,'deleteEnseignant'])->name('deleteEnseignant');


    /* Route vers le contrôleur de la page des logiciels */
    Route::get("list_logiciel", [ControleurLogiciels::class, 'lister'])->name('Logiciel.lister');;
    Route::post("logiciel", [ControleurLogiciels::class, "afficherSalles"]);
    Route::get('Ajouter_logiciels', [ControleurLogiciels::class, 'create'])->name('Logiciel.create');
    Route::post('Ajouter_logiciels', [ControleurLogiciels::class, 'store'])->name('Logiciel.store');
    Route::get('showLogiciel',[ControleurLogiciels::class,'show'])->name('showLogiciel');
    Route::get('editLogiciel',[ControleurLogiciels::class,'edit'])->name('editLogiciel');
    Route::get('updateLogiciel/{id}',[ControleurLogiciels::class,'update'])->name('updateLogiciel');
    Route::get('deleteLogiciel/{id}',[ControleurLogiciels::class,'delete'])->name('deleteLogiciel');

    /* Route vers le contrôleur de la page des salles */
    Route::get("salles", [ControleurSalles::class, "afficherPage"])->name('Logiciel.index');
    Route::post("salles", [ControleurSalles::class, "afficherLogiciels"]);
    Route::get('Ajouter_salles', [ControleurSalles::class, 'create'])->name('salle.create');
    Route::post('Ajouter_salles', [ControleurSalles::class, 'store'])->name('salle.store');
    Route::get('list_salle', [ControleurSalles::class, 'lister'])->name('salle.lister');
    Route::get('showSalle',[ControleurSalles::class,'show'])->name('showSalle');
    Route::get('editSalle',[ControleurSalles::class,'edit'])->name('editSalle');
    Route::get('updateSalle/{id}',[ControleurSalles::class,'update'])->name('updateSalle');
    Route::get('deleteSalle/{id}',[ControleurSalles::class,'deleteSalle'])->name('deleteSalle');
    Route::post('importation',[ControleurSalles::class,'importation'])->name('importation');

});

