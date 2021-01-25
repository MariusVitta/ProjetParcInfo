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

    		$resultatRequete = Logiciels::where("nom_logiciel", $requete->input("logiciel"))->get();
			if (sizeof($resultatRequete) > 0)
        		return view("logiciels")->with("reponse", "Nom du logiciel : " . $resultatRequete[0]["nom_logiciel"] .
        												  "</br>Auteur : " . $resultatRequete[0]["auteur"] .
        												  "</br>Type : " . $resultatRequete[0]["type_logiciel"] .
        												  "</br>Licence : " . $resultatRequete[0]["licence"] .
        												  "</br>Site : " . $resultatRequete[0]["site"]);
        	else
        		return view("logiciels")->with("reponse", $requete->input("logiciel") . " n'existe pas !");
    	}
	}

?>
