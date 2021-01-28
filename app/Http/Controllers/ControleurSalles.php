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
	    public function afficherLogiciels(RequeteSalle $requete) {

	    	/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_logiciel", "version_logiciel", "auteur", "type_logiciel", "licence", "site" FROM salles
    		 * NATURAL JOIN installations NATURAL JOIN logiciels WHERE "nom_salle = <salle saisie>"
    		*/
        	$resultatRequete = Salles::select("nom_logiciel", "auteur", "type_logiciel", "licence", "site")
    								->join("installations", "salles.id_salle", "=", "installations.id_salle")
    								->join("logiciels", "installations.id_logiciel", "=", "logiciels.id_logiciel")
    								->where("nom_salle", $requete->input("salle"))->get();

    		/* Initialisation du message à afficher */
    		$affichage = "Résultats pour " . $requete->input("salle") . " : <br /> <br />";

			if (sizeof($resultatRequete) > 0) {

				/* Ajout de chacun des résultats de la requête dans l'affichage :
				 * Nom du logiciel : <nom logiciel>
				 * Auteur : <auteur>
				 * Type : <type>
				 * Licence : <licence>
				 * Site : <site>
				 * ------------------------------------------------------------------
				 */
				for ($i = 0; $i < sizeof($resultatRequete); $i++)
        			$affichage .= "Nom du logiciel : " . $resultatRequete[$i]["nom_logiciel"] .
								  "<br />Auteur : " . $resultatRequete[$i]["auteur"] .
								  "<br />Type : " . $resultatRequete[$i]["type_logiciel"] .
								  "<br />Licence : " . $resultatRequete[$i]["licence"] .
								  "<br />Site : " . $resultatRequete[$i]["site"] . "<hr />";

				/* Affichage final */
        		return view("salles")->with("reponse", $affichage);	
			} else /* Erreur sur le nom du logiciel */
        		return view("salles")->with("reponse", $requete->input("salle") . " n'existe pas !");
    	}
	}

?>