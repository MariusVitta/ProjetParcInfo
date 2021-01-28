<?php

	/* Contrôleur de la page des logiciels */

	namespace App\Http\Controllers;

	use App\Http\Requests\RequeteLogiciel;
	use App\Models\Logiciels;
	use App\Models\Salles;

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
    		$resultatRequeteLogiciel = Logiciels::select("nom_salle", "version_logiciel")
    								->join("installations", "logiciels.id_logiciel", "=", "installations.id_logiciel")
    								->join("salles", "installations.id_salle", "=", "salles.id_salle")
									->where("nom_logiciel",'LIKE', '%'. $requete->input("logiciel"). '%')->get();
									
			/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_logiciel", "version_logiciel", "auteur", "type_logiciel", "licence", "site" FROM salles
    		 * NATURAL JOIN installations NATURAL JOIN logiciels WHERE "nom_salle = <salle saisie>"
    		*/
        	$resultatRequeteSalle = Salles::select("nom_logiciel", "auteur", "type_logiciel", "licence", "site")
    								->join("installations", "salles.id_salle", "=", "installations.id_salle")
    								->join("logiciels", "installations.id_logiciel", "=", "logiciels.id_logiciel")
    								->where("nom_salle", $requete->input("logiciel"))->get();

    	
			//$resultatRequete = Logiciels::where("nom_logiciel",'LIKE','%'.$requete->input("logiciel").'%')->get();
			
			if (count($resultatRequeteLogiciel) > 0 ){
				return view('accueil')->withDetails( $resultatRequeteLogiciel)->withQuery($requete->input("logiciel"));
			}
			else if( count($resultatRequeteSalle) > 0){
				return view('accueil')->with("salles",$resultatRequeteSalle)->withQuery($requete->input("logiciel"));
			}
			else return view ('logiciels')->withMessage('Aucun resultat trouvé pour la recherche:')->withQuery($requete->input("logiciel"));
    	}
	}

?>
