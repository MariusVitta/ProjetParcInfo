<?php

	/* Contrôleur de la page des logiciels */

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class ControleurLogiciels extends Controller {

	    public function index() {
	        return view('logiciels');
	    }
	}

?>
