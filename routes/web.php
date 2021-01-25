<?php
//use SearchController;
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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ControllerAccueil;
use App\Http\Controllers\ControllerConnexion;
use App\Http\Controllers\ControllerLogiciel;
use App\Http\Controllers\ControllerSalle;

/* ROUTE GET */
Route::get('/', [ControllerAccueil::class, 'index'])->name('accueil');
Route::get('accueil', [ControllerAccueil::class, 'index'])->name('accueil');
Route::get('connexion', [ControllerConnexion::class, 'index'])->name('connexion');
Route::get('logiciel', [ControllerLogiciel::class, 'index']);
Route::get('salle', [ControllerSalle::class, 'index']);

/* POST */
Route::post('accueil', [SearchController::class, 'store']);
Route::post('recherche', [SearchController::class, 'recherche'])->name('recherche');

