<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;

class ControleurListeProfsLogiciel extends Controller{

    /* Affichage de la page */
    public function afficherPage(Request $request) {
        $nomLogiciel = $request->input("nomLogiciel");
        $nomSalle = $request->input("nomSalle");

		$enseignants = Enseignant::select("nom", "prenom", "statut")
            ->join("utilisateurs","enseignant_id","=","enseignants.id")
            ->join("logiciels","logiciels.id","=","utilisateurs.logiciel_id")
            ->join("installations","installations.logiciel_id","=","logiciels.id")
            ->join("salles","salles.id","=","installations.salle_id")
            ->where("nom_salle",'LIKE','%'. $nomSalle. '%')
            ->where("nom_logiciel",'LIKE', $nomLogiciel)->get();
            
        return view("listeProfs")->withEnseignants($enseignants)->withLogiciel($nomLogiciel)->withSalle($nomSalle);
    }
}
