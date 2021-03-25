<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logiciel;
use App\Models\Salle;
use App\Models\Demande;
use App\Models\Enseignant;
use App\Models\Installation;
use App\Models\Utilisateur;



class ControleurInstallation extends Controller{


    public function afficherInstallations(){
        return view('list_installation');
    }

    public function create(){
        $salles = Salle::all();
        $logiciels = Logiciel::all();
        return view ('installation',compact('salles','logiciels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Installation ::create([

        'logiciel_id' => $request->logiciel_formulaire,
        'salle_id' => $request->get('salle_formulaire'),
        'version_logiciel' => $request->version_logiciel, 
        
        ]);

        return redirect()->route('accueil')
            ->with('success', 'Installation bien ajoutée.');
    }

    public function lister(){
        
    		/* Requête sur la base de données. Équivalent SQL :
    		 * SELECT "nom_salle", "version_logiciel" FROM logiciels NATURAL JOIN installations NATURAL JOIN salles
    		 * WHERE "nom_logiciel = <logiciel saisi>"
    		*/
    		/*$installationsdd = Installation::select("nom_salle", "version_logiciel","nom_logiciel")
            ->join("logiciels", "logiciels.id", "=", "installations.logiciel_id")
            ->join("salles", "installations.salle_id", "=", "salles.id")
            ->get();*/

            $installations = Installation::latest()->paginate(10);
            $salles = Salle::all();
            $logiciels = Logiciel::all();
            $enseignants = Enseignant::all();
            $utilisateurs = Utilisateur::all();

            //$installations = Utilisateur::select("logiciel_id","enseignant_id");
       

        return view('list_installation', compact('installations','salles','logiciels','enseignants','utilisateurs'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}

//logiciel, installation, salle_dinsallation