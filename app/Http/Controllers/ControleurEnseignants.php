<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use App\Models\Enseignant;

use Illuminate\Http\Request;

class ControleurEnseignants extends Controller{
    /* Affichage de la page */
    public function afficherPage() {
        return view("salles");
    }


    public function create(){
        $departements = Departement::all();
        $statuts = ['PERMANENT','CDD','ATER','CTER','VACATAIRE','CONFERENCIER'];

        return view ('ajouterEnseignant',compact('departements','statuts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nom_enseignant' => 'required',
            'prenom_enseignant' => 'required',
        ]);
        
        Enseignant::create([
            "nom" => $request->nom_enseignant,
            "prenom" => $request->prenom_enseignant, 
            "statut" => $request->statut,
            "departement_id" => $request->departement_id,
        ]);

        return redirect()->route('enseignant.lister')
            ->with('success', 'Enseignant bien ajouté.');
    }
    public function lister(){
        
        $enseignants = Enseignant::select("enseignants.id as id","enseignants.nom as nom_enseignant", "prenom", "statut","departements.nom as nom_departement")
                        ->join("departements","departements.id","=","departement_id")
                        ->orderBy('enseignants.id', 'desc')->paginate(5);
                        
        return view('listeEnseignants', compact('enseignants'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * méthode de vue des données sur l'enseignant 
     * tout les champs sont désactivés lors de la vue sur les données associés à l'enseignant
     */
    public function show(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
		if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/
   
			/*
			 * recuperation du departement avec l'id spécifié en paramètre
			 */
			$enseignant= Enseignant::select("enseignants.id as id","enseignants.nom as nom_enseignant", "prenom", "statut","departements.nom as nom_departement")
                            ->join("departements","departements.id","=","departement_id")
                            ->where("enseignants.id","LIKE",$request->search)
							->get();
                          
            if($enseignant){
                foreach($enseignant as $key=>$enseignant){
            
                    $res .= '<label class="flex pull-left justify-end mt-4" value="nomEnseignant" >Nom</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4 " name="nomEnseignant"  value="'. $enseignant->nom_enseignant. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="prenomEnseignant" >Prenom</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4 " name="prenomEnseignant"  value="'. $enseignant->prenom. '" disabled>';
                    
                    $res .= '<label class="flex pull-left justify-end mt-4" value="statutEnseignant" >Statut </label>';
                    $res .= '<input class="form-control items-center justify-end mt-4 " name="statutEnseignant"  value="'. $enseignant->statut. '" disabled>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="departementEnseignant" >Departement </label>';
                    $res .= '<input class="form-control items-center justify-end mt-4 " name="departementEnseignant"  value="'. $enseignant->nom_departement. '" disabled>';
                                       
                }
            }

            return Response($res);
		}
       
    }


    /**
     * méthode d'edition des données sur le enseignant
     */
    public function edit(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
		if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/

			/*
			 * recuperation du departement avec l'id spécifié en paramètre
			 */
			$enseignant= Enseignant::select("enseignants.id as id","enseignants.nom as nom_enseignant", "prenom", "statut","departements.nom as nom_departement")
                            ->join("departements","departements.id","=","departement_id")
                            ->where("enseignants.id","LIKE",$request->search)
							->get();
            
            $statuts = ['PERMANENT','CDD','ATER','CTER','VACATAIRE','CONFERENCIER'];
            $departements = Departement::all();
            
            if($enseignant){
                foreach($enseignant as $key=>$enseignant){
            
                    $res .= '<label class="flex pull-left justify-end mt-4" value="nomEnseignant" >Nom</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4 " name="nom_enseignant" placeholder="Nom de l\'enseignant*"  value="'. $enseignant->nom_enseignant. '" required>';

                    $res .= '<label class="flex pull-left justify-end mt-4" value="prenomEnseignant" >Prenom</label>';
                    $res .= '<input class="form-control items-center justify-end mt-4 " name="prenom_enseignant" placeholder="prénom de l\'enseignant*" value="'. $enseignant->prenom. '" required>';
                    
                    $res .= '<div class="field">';
                    $res .= '<label class="flex pull-left justify-end mt-4">Choisir le statut de l\'enseignant* </label>';
                    $res .= '<div class="select">';
                    $res .= '<select class="form-control"  aria-label=".form-select-lg example" name="statut" id="statut" required>';
                    foreach($statuts as $key=>$statut){
                        if( $statut === $enseignant->statut ){
                            $res .= '<option value="'.$statut. '"  selected >' .$statut. '</option>';
                        }
                        else{
                            $res .= '<option value="'.$statut. '" >' .$statut. '</option>';
                        }
                    }
                    $res .= '</select>';
                    $res .= '</div>';
                    $res .= '</div>';

                    $res .= '<div class="field">';
                    $res .= '<label class="flex pull-left justify-end mt-4">Choisir le département de l\'enseignant*</label>';
                    $res .= '<div class="select">';
                    $res .= '<select name="departement_id" id="departement_id" class="form-control" aria-label=".form-select-lg example" required>';
                    foreach($departements as $key=>$departement){
                        if( $departement->nom === $enseignant->nom_departement ){
                            $res .= '<option value="'. $departement->id. '"  selected >' .$departement->nom. '</option>';
                        }
                        else{
                            $res .= '<option value="'. $departement->id. '" >' .$departement->nom. '</option>';
                        }
                    }
                    $res .= '</select>';
                    $res .= '</div>';
                    $res .= '</div>';            
                }
            }
            return Response($res);
		}
       
    }

    /**
     * méthode de mise à jour des données dans la base de données
     */
    public function update(Request $request,$id){
        $request->validate([
            'nom_enseignant' => 'required',
            'prenom_enseignant' => 'required',
        ]);

        Enseignant::where('id',$id)->update(['nom'=>$request->nom_enseignant, "prenom" => $request->prenom_enseignant, "statut" => $request->statut,
                    "departement_id" => $request->departement_id, ]);

        return redirect()->route('enseignant.lister')->with('success', 'Enseignant bien mis à jour.');
    }

    public function deleteEnseignant($id){
        $enseignant = Enseignant::find($id);
        $resultatSuppression = $enseignant->delete();
        if($resultatSuppression)
            return redirect()->route('enseignant.lister')->with('success', 'Enseignant bien supprimé.');
        else
            return redirect()->route('enseignant.lister')->with('error', 'Erreur de suppression de l\'enseignant.');
    }

    
}
