<?php

/* Ce fichier regroupe l'ensemble des routes permettant d'accéder aux différentes pages du site. */

use Illuminate\Support\Facades\Route;

/* Route vers la page d'accueil */
Route::get('/', function () {
    return view("accueil");
});

/* Route vers la page des logiciels */
Route::get('logiciels', function () {
    return view("logiciels");
});

/* Route vers la page des salles */
Route::get('salles', function () {
    return view("salles");
});

?>