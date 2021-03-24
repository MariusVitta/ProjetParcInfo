<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequeteLogiciel;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Logiciel;
use App\Models\Enseignant;
use App\Models\Utilisateur;

class ControleurRecherche extends Controller{
			

   	    /* Affichage de toutes les salles dans lesquelles le logiciel entré par l'utilisateur est présent avec la version du logiciel.
 		 * Paramètre : résultat de la saisie
 		 */
          public function afficherRecherche(Request $request) {
			$request->validate([
				'recherche' => 'required',
			]);

			$recherche = $request->input("recherche");
			//if()
    		/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_salle", "version_logiciel" FROM logiciels NATURAL JOIN installations NATURAL JOIN salles
    		 * WHERE "nom_logiciel = <logiciel saisi>"
    		*/
    		$resultatRequeteLogiciel = Logiciel::select("nom_salle", "version_logiciel","nom_logiciel")
    								->join("installations", "logiciels.id", "=", "installations.logiciel_id")
    								->join("salles", "installations.salle_id", "=", "salles.id")
									->where("nom_logiciel",'LIKE', '%'. $recherche. '%')->get();
									
			/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_logiciel", "version_logiciel", "auteur", "type_logiciel", "licence", "site" FROM salles
    		 * NATURAL JOIN installations NATURAL JOIN logiciels WHERE "nom_salle = <salle saisie>"
    		*/
        	$resultatRequeteSalle = Salle::select("nom_logiciel", "type_logiciel", "editeur", "siteWeb", "licence","nom_salle","version_logiciel")
    								->join("installations", "salles.id", "=", "installations.salle_id")
    								->join("logiciels", "installations.logiciel_id", "=", "logiciels.id")
    								->where("nom_salle", 'LIKE', '%'. $recherche. '%')->get();
    	
			//$resultatRequete = Logiciels::where("nom_logiciel",'LIKE','%'.$requete->input("logiciel").'%')->get();
			
			if (count($resultatRequeteLogiciel) > 0 ){
				
				return view('accueil')->withLogiciels( $resultatRequeteLogiciel)->withRecherche($recherche);
			}
			else if( count($resultatRequeteSalle) > 0){
				return view('accueil')->withSalles($resultatRequeteSalle)->withRecherche($recherche);
			}
			else return view ('accueil')->withMessage('Aucun resultat trouvé pour la recherche:')->withRecherche($recherche);

    	}
		
		public function afficherRechercheAdminPage(){
            return view('recherche_admin');
        }

		public function afficherRechercheAdmin(Request $request){
			$request->validate([
				'recherche' => 'required',
			]);
			$recherche = $request->input("recherche");
    		/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_salle", "version_logiciel" FROM logiciels NATURAL JOIN installations NATURAL JOIN salles
    		 * WHERE "nom_logiciel = <logiciel saisi>"
    		*/
    		$resultatRequeteLogiciel = Logiciel::select("nom_salle", "version_logiciel","nom_logiciel")
    								->join("installations", "logiciels.id", "=", "installations.logiciel_id")
    								->join("salles", "installations.salle_id", "=", "salles.id")
									->where("nom_logiciel",'LIKE', '%'. $recherche. '%')->get();
									
			/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_logiciel", "version_logiciel", "auteur", "type_logiciel", "licence", "site" FROM salles
    		 * NATURAL JOIN installations NATURAL JOIN logiciels WHERE "nom_salle = <salle saisie>"
    		*/
        	$resultatRequeteSalle = Salle::select("nom_logiciel","nom_salle", "type_logiciel", "editeur", "siteWeb", "licence","logiciels.id")
    								->join("installations", "salles.id", "=", "installations.salle_id")
    								->join("logiciels", "installations.logiciel_id", "=", "logiciels.id")
    								->where("nom_salle", 'LIKE', '%'. $recherche. '%')->get();

			
			$enseignants = Enseignant::select("nom", "prenom", "statut","logiciels.id")
							->join("utilisateurs","enseignant_id","=","enseignants.id")
							->join("logiciels","logiciels.id","=","utilisateurs.logiciel_id")
							->join("installations","installations.logiciel_id","=","logiciels.id")
							->join("salles","salles.id","=","installations.salle_id")
							->where("nom_salle",'LIKE','%'. $recherche. '%')->get();

			// on supprime les données ayant des clé primaires identiques
			$enseignants = $enseignants->unique();
			//dd($enseignants);
			
		
			if (count($resultatRequeteLogiciel) > 0 ){
				//return view('accueil')->withLogiciels( $resultatRequeteLogiciel)->withRecherche($nomLogiciel);
                return view('recherche_admin')->withLogiciels( $resultatRequeteLogiciel)->withRecherche($recherche);
			}
			else if( count($resultatRequeteSalle) > 0){
				return view('recherche_admin')->withSalles($resultatRequeteSalle)->withEnseignants($enseignants)->withRecherche($recherche);
			}
			else return view ('recherche_admin')->withMessage('Aucun resultat trouvé pour la recherche:')->withRecherche($recherche);


		}

}
