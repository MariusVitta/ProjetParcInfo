<?php

	/* Contrôleur de la page d'accueil */

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class ControleurAccueil extends Controller {

	    public function index() {
	        return view('accueil');
	    }
	}

?>