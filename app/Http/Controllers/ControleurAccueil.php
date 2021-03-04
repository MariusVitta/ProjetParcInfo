<?php

	/* Contrôleur de la page d'accueil */

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class ControleurAccueil extends Controller {

		/* Affichage de la page */
	    public function afficherPage() {
	        return view("accueil");
	    }
	}

?>