<?php

	/* Contrôleur de la page des salles */

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class ControleurSalles extends Controller {

		/* Affichage de la page */
	    public function afficherPage() {
	        return view("salles");
	    }

	    /* Récupération des informations provenant de la barre de recherche de salles
 		 * Paramètre : résultat de la saisie
 		 */
	    public function stockerInfos(Request $requete) {
        	return view("salles")->with("reponse", "La salle recherchée est " . $requete->input("salle"));
    	}
	}

?>