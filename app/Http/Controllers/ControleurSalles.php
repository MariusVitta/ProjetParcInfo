<?php

	/* Contrôleur de la page des salles */

	namespace App\Http\Controllers;

	use App\Http\Requests\RequeteSalle;
	use App\Models\Salles;

	class ControleurSalles extends Controller {

		/* Affichage de la page */
	    public function afficherPage() {
	        return view("salles");
	    }

	    /* Récupération des informations provenant de la barre de recherche de salles
 		 * Paramètre : résultat de la saisie
 		 */
	    public function stockerInfos(RequeteSalle $requete) {

        	$resultatRequete = Salles::where("nom_salle", $requete->input("salle"))->get();
			if (sizeof($resultatRequete) > 0)
        		return view("salles")->with("reponse", "Nom de la salle : " . $resultatRequete[0]["nom_salle"] .
        												  "</br>Numéro : " . $resultatRequete[0]["numero_salle"] .
        												  "</br>Type : " . $resultatRequete[0]["type_salle"] .
        												  "</br>Nom OS : " . $resultatRequete[0]["nom_OS"] .
        												  "</br>Type OS : " . $resultatRequete[0]["type_OS"] .
        												  "</br>Version OS : " . $resultatRequete[0]["version_OS"]);
        	else
        		return view("salles")->with("reponse", $requete->input("salle") . " n'existe pas !");
    	}
	}

?>