<?php

	/* Ce fichier regroupe l'ensemble des routes permettant d'accéder aux différentes pages du site. */

	use Illuminate\Support\Facades\Route;

	/* On utilise des contrôleurs pour l'affichage des pages web */
	use App\Http\Controllers\ControleurAccueil;
	use App\Http\Controllers\ControleurLogiciels;
	use App\Http\Controllers\ControleurSalles;

	/* Route vers le contrôleur de la page d'accueil */
	Route::get('/', [ControleurAccueil::class, 'index']);

	/* Route vers le contrôleur de la page des logiciels */
	Route::get('logiciels', [ControleurLogiciels::class, 'index']);

	/* Route vers le contrôleur de la page des salles */
	Route::get('salles', [ControleurSalles::class, 'index']);

?>