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
 
 		/* Affichage de toutes les salles dans lesquelles le logiciel entré par l'utilisateur est présent avec la version du logiciel.
 		 * Paramètre : résultat de la saisie
 		 */
    	public function afficherSalles(RequeteLogiciel $requete) {

    		/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_salle", "version_logiciel" FROM logiciels NATURAL JOIN installations NATURAL JOIN salles
    		 * WHERE "nom_logiciel = <logiciel saisi>"
    		*/
    		$resultatRequete = Logiciels::select("nom_salle", "version_logiciel")
    								->join("installations", "logiciels.id_logiciel", "=", "installations.id_logiciel")
    								->join("salles", "installations.id_salle", "=", "salles.id_salle")
    								->where("nom_logiciel", $requete->input("logiciel"))->get();

    		/* Initialisation du message à afficher */
    		$affichage = "Résultats pour " . $requete->input("logiciel") . " : <br /> <br />";

        	if (sizeof($resultatRequete) > 0) {

        		/* Ajout de chacun des résultats de la requête dans l'affichage ("<nom salle> - <version logiciel>") */
        		for ($i = 0; $i < sizeof($resultatRequete); $i++)
        			$affichage .= $resultatRequete[$i]["nom_salle"] . " - " . $resultatRequete[$i]["version_logiciel"] . "</br>";
        		
        		/* Affichage final */
        		return view("logiciels")->with("reponse", $affichage);	

        	} else /* Erreur sur le nom du logiciel */
        		return view("logiciels")->with("reponse", $requete->input("logiciel") . " n'existe pas !");
    	}
	}

?>
