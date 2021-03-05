<?php

/* Contrôleur de la page des salles */

namespace App\Http\Controllers;

use App\Http\Requests\RequeteSalle;
use App\Models\Salle;
use App\Models\Departement;
use App\Models\Logiciel;
use App\Models\Enseignant;
use App\Models\Installation;
use Illuminate\Http\Request;

class ControleurSalles extends Controller {

    /* Affichage de la page */
    public function afficherPage() {
        return view("salles");
    }


    public function create(){
        $departements = Departement::all();
        $logiciels = Logiciel::all();
        $enseignants = Enseignant::all();

        return view ('ajouter_salle',compact('departements','logiciels','enseignants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        Salle::create([

            'nom_salle'=> $request->nom_salle,
            "quantitePC"=> $request->quantitePC,
            'systemeExploitationPC' => $request->systemeExploitationPC,
            'numero' => $request->numero,
            'type_salle' => $request->type_salle,
            'departement_id' => $request->departement_id,
        ]);

        // on recupere le dernier logiciel que l'on vient d'inserer
        $derniereSalle = Salle::latest()->first();
        $logiciels = $request->input("logiciels");
        if($logiciels != null){
            foreach($logiciels  as $logiciel){
                Installation ::create([
                    'logiciel_id' => $logiciel,
                    'salle_id' => $derniereSalle->id,
                    'version_logiciel' => "unknown",  // ceci est temporaire
                ]);
            }
        }

        return redirect()->route('salle.lister')
            ->with('success', 'Salle bien ajoutée.');
    }
    public function lister(){

        $salles = Salle::latest()->paginate(5);

        return view('list_salle', compact('salles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

      /**
     * méthode de vue des données sur la salle
     * tout les champs sont désactivés lors de la vue sur les données associés a la salle
     */
    public function show(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
		if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/

			/*
			 * recuperation du logiciel avec l'id spécifié en paramètre
			 */
			$salle = Salle::select("nom_salle","quantitePC", "systemeExploitationPC", "numero",  "type_salle",  "departements.nom as nom_departement")
                                    ->join("departements", "salles.id", "=", "departements.id")
                                    ->where("salles.id",'LIKE',$request->search)
							        ->get();

            /*
            * récupération de la liste de salles contenant la salle           
            */
            $listeLogicielContenuSalle = Salle::select("logiciels.id as id","nom_logiciel")
                    ->join("installations", "salles.id", "=", "installations.salle_id")
                    ->join("logiciels","installations.logiciel_id", "=", "logiciels.id")
                    ->where("installations.salle_id","LIKE",$request->search)
                    ->get();
            
            
        
			/* création du formulaire avec les champ remplis */
			if($salle){
                foreach($salle as $key=>$salle){
                    
                    $res.='<label class="flex pull-left justify-end mt-4" value="nom_salle">Nom salle </label>';
                    $res.= '<input class="form-control  items-center justify-end mt-4" type="text" name="nom_salle" value="'. $salle->nom_salle. '" disabled>';
          
                    $res .= '<label class="flex pull-left justify-end mt-4" value="type_salle">Type salle</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"   name="type_salle" value="'.$salle->type_salle. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="quantitePC">Quantité PC</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4"   name="quantitePC" value="'.$salle->quantitePC. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="systemeExploitationPC">Systeme d\'exploitation des PC</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4"   name="systemeExploitationPC"  value="'.$salle->systemeExploitationPC. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="numero" >Numero salle</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"  name="numero" value="'.$salle->numero. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="departement"> Departement de la salle</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"  name="departement" value="'.$salle->nom_departement. '" disabled>';
                }   
            }

            $res .= '<div class="form-group">';
            $res .= '<label class=" pull-left justify-end mt-4">Liste de logiciels contenus dans la salle <b>'. $salle->nom_salle.  ' </b></label>';
            $res .= '<div class="">';
            $res .=' <select id="" class="select-salles form-control form-control-lg" style="width: 100%" aria-label="form-select-lg " name="salles[]" multiple="multiple">';
            if($listeLogicielContenuSalle){
                foreach($listeLogicielContenuSalle as $key=>$logiciel){
                        $res .= '<option value="'. $logiciel->id. '"  selected  >' .$logiciel->nom_logiciel. '</option>';
                }
            }
            $res .=' </select>';
            $res .= '</div>';
            $res .= '</div>';
          
            return Response($res);
		}
       
    }

    
    /**
     * méthode d'edition des données sur la salle
     * 
     */
    public function edit(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
		if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/

			/*
			 * recuperation du logiciel avec l'id spécifié en paramètre
			 */
			$salle = Salle::select("nom_salle","quantitePC", "systemeExploitationPC", "numero",  "type_salle",  "departements.nom as nom_departement")
                                    ->join("departements", "salles.departement_id", "=", "departements.id")
                                    ->where("salles.id",'LIKE',$request->search)
							        ->get();
            /*
            * récupération de la liste de salles contenant la salle           
            */
            $listeLogicielContenuSalle = Salle::select("logiciels.id as id","nom_logiciel")
                    ->join("installations", "salles.id", "=", "installations.salle_id")
                    ->join("logiciels","installations.logiciel_id", "=", "logiciels.id")
                    ->where("installations.salle_id","=",$request->search)
                    ->get();
  
            $toutLogiciels = Salle::select("logiciels.id as id","nom_logiciel")
                    ->join("installations", "salles.id", "=", "installations.salle_id")
                    ->join("logiciels","installations.logiciel_id", "=", "logiciels.id")
                    ->get()->unique();
            
            $departements = Departement::all();
        
	    	/* création du formulaire avec les champ remplis */
			if($salle){
                foreach($salle as $key=>$salle){
                    
                    $res.='<label class="flex pull-left justify-end mt-4" value="nom_salle">Nom salle </label>';
                    $res.= '<input class="form-control  items-center justify-end mt-4" type="text" placeholder="Nom de la salle*" name="nom_salle" value="'. $salle->nom_salle. '" required>';
          
                    $res .= '<label class="flex pull-left justify-end mt-4" value="type_salle">Type salle</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4" placeholder="Type de salle"   name="type_salle" value="'.$salle->type_salle. '">';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="quantitePC">Quantité PC</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4" placeholder="Quantité de PC dans la salle" name="quantitePC" value="'.$salle->quantitePC. '">';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="systemeExploitationPC">Systeme d\'exploitation des PC</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4" placeholder="Systeme d\'exploitation des PC" name="systemeExploitationPC"  value="'.$salle->systemeExploitationPC. '">';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="numero" >Numero salle</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4" placeholder="Numéro de la salle"  name="numero" value="'.$salle->numero. '">';
                }   
            }
        
            $res .= '<div class="field">';
            $res .= '<label class="flex pull-left justify-end mt-4">Choisir le département de la salle*</label>';
            $res .= '<div class="select">';
            $res .= '<select name="departement_id" id="departement_id" class="form-control" aria-label=".form-select-lg example" required>';
            foreach($departements as $key=>$departement){
                if( $departement->nom === $salle->nom_departement ){
                    $res .= '<option value="'. $departement->id. '"  selected >' .$departement->nom. '</option>';
                }
                else{
                    $res .= '<option value="'. $departement->id. '" >' .$departement->nom. '</option>';
                }
            }
            $res .= '</select>';
            $res .= '</div>';
            $res .= '</div>';  

            $res .= '<div class="form-group">';
            $res .= '<label class=" pull-left justify-end mt-4">Liste de logiciels contenus dans la salle* <b>'. $salle->nom_salle.  ' </b></label>';
            $res .= '<div class="">';
            $res .=' <select id="" class="select-salles form-control form-control-lg" style="width: 100%" aria-label="form-select-lg " name="logiciels[]" multiple="multiple" required>';

            $chaineIdLogiciel = "";
            foreach($listeLogicielContenuSalle as $key=>$logiciel){
                $chaineIdLogiciel .= $logiciel->id. "-";
            }
            $array = explode("-",$chaineIdLogiciel);
            $array = array_filter($array);
    
            if($toutLogiciels){
                foreach($toutLogiciels as $key=>$logiciel){
                        if( in_array($logiciel->id,$array) ){
                            echo $logiciel->id;
                            $res .= '<option value="'. $logiciel->id. '" selected >' .$logiciel->nom_logiciel. '</option>';
                        }
                        else{
                            $res .= '<option value="'. $logiciel->id. '">' .$logiciel->nom_logiciel. '</option>';
                        }
                }
            }
            $res .=' </select>';
            $res .= '</div>';
            $res .= '</div>';
          
            return Response($res);
		}
       
    }

     /**
     * méthode de mise à jour des données dans la base de données
     */
    public function update(Request $request,$id){
        $request->validate([
            'nom_salle' => 'required',
        ]);

        Salle::where('id',$id)->update([

            'nom_salle'=> $request->nom_salle,
            "quantitePC"=> $request->quantitePC,
            'systemeExploitationPC' => $request->systemeExploitationPC,
            'numero' => $request->numero,
            'type_salle' => $request->type_salle,
            'departement_id' => $request->departement_id,
        ]);

        return redirect()->route('salle.lister')->with('success', 'Salle bien mise à jour.');
    }


    public function deleteSalle($id){
        $salle = Salle::find($id)->delete();
        $installation = Installation::where('salle_id',$id)->delete();
        if($salle && $installation)
            return redirect()->route('salle.lister')->with('success', 'Salle bien supprimée.');
        else
            return redirect()->route('salle.lister')->with('error', 'Erreur de suppression de la salle.');
    }
}

?>