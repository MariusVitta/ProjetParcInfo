<?php

/* Contrôleur de la page des logiciels */

namespace App\Http\Controllers;

use App\Http\Requests\RequeteLogiciel;
use App\Models\Logiciel;
use App\Models\Salle;
use App\Models\Installation;
use Illuminate\Http\Request;

class ControleurLogiciels extends Controller {

    /* Affichage de la page */
    public function afficherPage() {
        return view("logiciels");
    }


    public function create(){

        $salles = Salle::all();
        return view('ajouter_logiciel')->withSalles($salles);

    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     */

    public function store(Request $request){
        $request->validate([
            'nom_logiciel' => 'required',
        ]);

        Logiciel::create([
            'nom_logiciel' => $request->nom_logiciel,
            'editeur' => $request->editeur,
            'siteWeb' => $request ->siteWeb ,
            'licence' => $request->licence,
            'type_logiciel' => $request->type_logiciel,

        ]);

        // on recupere le dernier logiciel que l'on vient d'inserer
        $dernierLogiciel = Logiciel::latest()->first();
        $salles = $request->input("salles");
        if($salles != null){
            foreach($salles  as $salle){
                Installation ::create([
                    'logiciel_id' => $dernierLogiciel->id,
                    'salle_id' => $salle,
                    'version_logiciel' => "unknown",  // ceci est temporaire

                ]);
            }
        }

        return redirect()->route('Logiciel.lister')
            ->with('success', 'Logiciel bien ajouté.');

            //redirect()->route('Logiciel.lister')->with('success', 'logiciel bien mis à jour.');
    }

    /**
     * listing de tout les logiciels de la base
     */
    public function lister(){

        $logiciels = Logiciel::latest()->paginate(5);
        $salles = Salle::all();
        $installations = Installation::all();

        return view('list_logiciel', compact('logiciels','salles','installations'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * méthode de vue des données sur le logiciel
     * tout les champs sont désactivés lors de la vue sur les données associés au logiciel
     */
    public function show(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
		if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/

			/*
			 * recuperation du logiciel avec l'id spécifié en paramètre
			 */
			$logiciels= Logiciel::select("nom_logiciel", "type_logiciel", "editeur", "siteWeb", "licence")->where('id','LIKE',$request->search)
							->get();

            /*
            * récupération de la liste de salles contenant le logiciel           
            */
            $listeSalleContenantLogiciel= Salle::select("salles.id as id","nom_salle")
                    ->join("installations", "salles.id", "=", "installations.salle_id")
                    ->join("logiciels","installations.logiciel_id", "=", "logiciels.id")
                    ->where("installations.logiciel_id","LIKE",$request->search)
                    ->get();
            
            $toutesSalles = Salle::all();
        
			/* création du formulaire avec les champ remplis */
			if($logiciels){
                foreach($logiciels as $key=>$logiciel){
                    
                    $res.='<label class="flex pull-left justify-end mt-4" value="nom_logiciel">Nom logiciel </label>';
                    $res.= '<input class="form-control items-center justify-end mt-4 "  id="nom_logicielModal" name="nom_logiciel" placeholder="nom du logiciel"  value="'. $logiciel->nom_logiciel. '" disabled>';
          
                    $res .= '<label class="flex pull-left justify-end mt-4" value="editeur">Editeur</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"  id="editeurModalinput" name="editeur" placeholder=" editeur  du logiciel" value="'.$logiciel->editeur. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="type_logiciel">Type Logiciel</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4"  id="type_logicielModal" name="type_logiciel" placeholder=" type  du logiciel" value="'.$logiciel->type_logiciel. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="licence">Licence</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4"  id="licenceModal" name="licence" placeholder=" licence  du logiciel" value="'.$logiciel->licence. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="siteWeb" >Site web</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"  id="siteWebModal" name="siteWeb" placeholder=" siteWeb  du logiciel"  value="'.$logiciel->siteWeb. '" disabled>';

                }   
            }
            $res .= '<div class="form-group">';
            $res .= '<label class=" pull-left justify-end mt-4">Liste de salles contenant le logiciel <b>'. $logiciel->nom_logiciel.  ' </b></label>';
            $res .= '<div class="">';
            $res .=' <select id="" class="select-salles form-control form-control-lg" style="width: 100%" aria-label="form-select-lg " name="salles[]" multiple="multiple">';
            $chaineIdSalleLogiciel = " ";
            foreach($listeSalleContenantLogiciel as $key=>$salle){
                $chaineIdSalleLogiciel .= $salle->id. " ";
            }
            $array = explode(" ",$chaineIdSalleLogiciel);
            if($toutesSalles){
                foreach($toutesSalles as $key=>$salle){
                        if( in_array($salle->id,$array) ){
                            $res .= '<option value="'. $salle->id. '"  selected  >' .$salle->nom_salle. '</option>';
                        }
                        else{
                            $res .= '<option value="'. $salle->id. '" >' .$salle->nom_salle. '</option>';
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
     * méthode d'edition des données sur le logiciel
     * 
     */
    public function edit(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
		if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/

			/*
			 * recuperation du logiciel avec l'id spécifié en paramètre
			 */
			$logiciels= Logiciel::select("nom_logiciel", "type_logiciel", "editeur", "siteWeb", "licence")->where('id','LIKE',$request->search)
							->get();

            /*
            * récupération de la liste de salles contenant le logiciel           
            */
            $listeSalleContenantLogiciel= Salle::select("salles.id as id","nom_salle")
                    ->join("installations", "salles.id", "=", "installations.salle_id")
                    ->join("logiciels","installations.logiciel_id", "=", "logiciels.id")
                    ->where("installations.logiciel_id","=",$request->search)
                    ->get();
            
            $toutesSalles = Salle::all(); 
        
			/* création du formulaire avec les champ remplis */
			if($logiciels){
                foreach($logiciels as $key=>$logiciel){
			
                    $res.= '<label class="flex pull-left justify-end mt-4" value="nom_logiciel">Nom logiciel </label>';
                    $res.= '<input class="form-control items-center justify-end mt-4 "  id="nom_logicielModal" name="nom_logiciel" placeholder="Nom du logiciel*"  value="'. $logiciel->nom_logiciel. '" required>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="editeur">Editeur</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"  id="editeurModalinput" name="editeur" placeholder="Editeur  du logiciel" value="'.$logiciel->editeur. '">';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="type_logiciel">Type Logiciel</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4"  id="type_logicielModal" name="type_logiciel" placeholder="Type  du logiciel" value="'.$logiciel->type_logiciel. '">';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="licence">Licence</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4"  id="licenceModal" name="licence" placeholder="Licence  du logiciel" value="'.$logiciel->licence. '">';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="siteWeb" >Site web</label>';
                    $res .= '<input class="form-control  items-center justify-end mt-4"  id="siteWebModal" name="siteWeb" placeholder="Site web  du logiciel"  value="'.$logiciel->siteWeb. '">';

                }   
            }
            $res .= '<div class="form-group">';
            $res .= '<label class=" pull-left justify-end mt-4">Choisir le(s) salle(s) </label>';
            $res .= '<div class="">';
            $res .=' <select id="selectSalle" class="select-salles form-control form-control-lg" style="width: 100%" aria-label="form-select-lg " name="salles[]" multiple="multiple" required>';
            $chaineIdSalleLogiciel = " ";
            foreach($listeSalleContenantLogiciel as $key=>$salle){
                $chaineIdSalleLogiciel .= $salle->id. " ";
            }
            $array = explode(" ",$chaineIdSalleLogiciel);
            if($toutesSalles){
                foreach($toutesSalles as $key=>$salle){
                        if( in_array($salle->id,$array) ){
                            $res .= '<option value="'. $salle->id. '"  selected  >' .$salle->nom_salle. '</option>';
                        }
                        else{
                            $res .= '<option value="'. $salle->id. '" >' .$salle->nom_salle. '</option>';
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
            'nom_logiciel' => 'required',
        ]);

        Logiciel::where("id",$id)->update([
            'nom_logiciel' => $request->nom_logiciel,
            'editeur' => $request->editeur,
            'siteWeb' => $request ->siteWeb ,
            'licence' => $request->licence,
            'type_logiciel' => $request->type_logiciel,
        ]);

        return redirect()->route('Logiciel.lister')->with('success', 'Logiciel bien mis à jour.');
    }


    /**
     * fonction de suppression de logiciel
     * @param id: id du logiciel à supprimer
     */
    public function delete($id){
        $logiciel = Logiciel::find($id)->delete();
        $installation = Installation::where('logiciel_id',$id)->delete();
        if($logiciel && $installation)
            return redirect()->route('Logiciel.lister')->with('success', 'Logiciel bien supprimé.');
        else
            return redirect()->route('Logiciel.lister')->with('error', 'Erreur de suppression du logiciel.');
    }

   
}

?>
