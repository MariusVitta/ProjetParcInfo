<?php

	/* Contrôleur de la page des logiciels */

	namespace App\Http\Controllers;

	use App\Http\Requests\RequeteLogiciel;
	use App\Models\Logiciels;

	class ControleurLogiciels extends Controller {

		/* Affichage de la page */
	    public function afficherPage() {
	        return view("logiciels");
	    }
 
 		/* Récupération des informations provenant de la barre de recherche de logiciels
 		 * Paramètre : résultat de la saisie
 		 */
    	public function stockerInfos(RequeteLogiciel $requete) {

    		$resultatRequete = Logiciels::select("auteur")->where("nom_logiciel", $requete->input("logiciel"))->get();
			if (sizeof($resultatRequete) > 0)
        		return view("logiciels")->with("reponse", "L'auteur de " . $requete->input("logiciel") . " est " . $resultatRequete[0]["auteur"]);
        	else
        		return view("logiciels")->with("reponse", $requete->input("logiciel") . " n'existe pas !");
    	}
	}

?>
