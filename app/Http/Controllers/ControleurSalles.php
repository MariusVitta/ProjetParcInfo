<?php

	/* Contrôleur de la page des salles */

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class ControleurSalles extends Controller {

	    public function index() {
	        return view('salles');
	    }
	}

?>
