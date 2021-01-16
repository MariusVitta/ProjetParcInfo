<?php

	/* Contrôleur de la page des logiciels */

	namespace App\Http\Controllers;

	use App\Http\Requests\RequeteLogiciel;

	class ControleurLogiciels extends Controller {

		/* Affichage de la page */
	    public function afficherPage() {
	        return view("logiciels");
	    }
 
 		/* Récupération des informations provenant de la barre de recherche de logiciels
 		 * Paramètre : résultat de la saisie
 		 */
    	public function stockerInfos(RequeteLogiciel $requete) {
        	return view("logiciels")->with("reponse", "Le logiciel recherché est " . $requete->input("logiciel"));
    	}
	}

?>
