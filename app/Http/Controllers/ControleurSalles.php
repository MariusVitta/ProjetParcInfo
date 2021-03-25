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
        
        return view ('ajouter_salle',compact('departements'));
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

        return redirect()->route('salle.lister')
            ->with('success', 'Salle bien ajoutée.');
    }
    public function lister(){

        $salles = Salle::latest()->simplePaginate(10);
        
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
         
                $res.='<label class="flex pull-left justify-end mt-4" value="nom_salle">Nom salle </label>';
                $res.= '<input class="form-control  items-center justify-end mt-4" type="text" name="nom_salle" value="'. $salle[0]->nom_salle. '" disabled>';
    
                $res .= '<label class="flex pull-left justify-end mt-4" value="type_salle">Type salle</label>';
                $res .= '<input class="form-control  items-center justify-end mt-4"   name="type_salle" value="'.$salle[0]->type_salle. '" disabled>';

                $res .= '<label class="flex pull-left justify-end mt-4" value="quantitePC">Quantité PC</label>';
                $res .= '<input class="form-control items-center justify-end mt-4"   name="quantitePC" value="'.$salle[0]->quantitePC. '" disabled>';

                $res .= '<label class="flex pull-left justify-end mt-4" value="systemeExploitationPC">Systeme d\'exploitation des PC</label>';
                $res .= '<input class="form-control items-center justify-end mt-4"   name="systemeExploitationPC"  value="'.$salle[0]->systemeExploitationPC. '" disabled>';

                $res .= '<label class="flex pull-left justify-end mt-4" value="numero" >Numero salle</label>';
                $res .= '<input class="form-control  items-center justify-end mt-4"  name="numero" value="'.$salle[0]->numero. '" disabled>';

                $res .= '<label class="flex pull-left justify-end mt-4" value="departement"> Departement de la salle</label>';
                $res .= '<input class="form-control  items-center justify-end mt-4"  name="departement" value="'.$salle[0]->nom_departement. '" disabled>';
                
            }

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
               
                $res.='<label class="flex pull-left justify-end mt-4" value="nom_salle">Nom salle </label>';
                $res.= '<input class="form-control  items-center justify-end mt-4" type="text" placeholder="Nom de la salle*" name="nom_salle" value="'. $salle[0]->nom_salle. '" required>';
        
                $res .= '<label class="flex pull-left justify-end mt-4" value="type_salle">Type salle</label>';
                $res .= '<input class="form-control  items-center justify-end mt-4" placeholder="Type de salle"   name="type_salle" value="'.$salle[0]->type_salle. '">';

                $res .= '<label class="flex pull-left justify-end mt-4" value="quantitePC">Quantité PC</label>';
                $res .= '<input class="form-control items-center justify-end mt-4" placeholder="Quantité de PC dans la salle" name="quantitePC" value="'.$salle[0]->quantitePC. '">';

                $res .= '<label class="flex pull-left justify-end mt-4" value="systemeExploitationPC">Systeme d\'exploitation des PC</label>';
                $res .= '<input class="form-control items-center justify-end mt-4" placeholder="Systeme d\'exploitation des PC" name="systemeExploitationPC"  value="'.$salle[0]->systemeExploitationPC. '">';

                $res .= '<label class="flex pull-left justify-end mt-4" value="numero" >Numero salle</label>';
                $res .= '<input class="form-control  items-center justify-end mt-4" placeholder="Numéro de la salle"  name="numero" value="'.$salle[0]->numero. '">';
            
            }
        
            $res .= '<div class="field">';
            $res .= '<label class="flex pull-left justify-end mt-4">Choisir le département de la salle*</label>';
            $res .= '<div class="select">';
            $res .= '<select name="departement_id" id="departement_id" class="form-control" aria-label=".form-select-lg example" required>';
            foreach($departements as $key=>$departement){
                if( $departement->nom === $salle[0]->nom_departement ){
                    $res .= '<option value="'. $departement->id. '"  selected >' .$departement->nom. '</option>';
                }
                else{
                    $res .= '<option value="'. $departement->id. '" >' .$departement->nom. '</option>';
                }
            }
            $res .= '</select>';
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

    public function importation(Request $request){

        // récupération de l'id la salle grâce à son nom
        $salleId = Salle::select("id")
                    ->where("nom_salle",'LIKE',$request->nom_salle)
                    ->get();
        //dd($request->importFile) ;

        //suppression de tout les logiciels associés à cette salle
        $installation = Installation::where('salle_id',$salleId[0]->id)->delete();
        //dd($installation);
       
        if (($fichier = fopen($request->importFile, "r")) !== FALSE) { /*Ouverture du fichier CSV */

            while (($donnees = fgetcsv($fichier, ",")) !== FALSE) { /* Récupération ligne par ligne des données du fichier CSV */

                // récupération de l'id du logiciel grâce à son nom
                $logiciel = Logiciel::select("id",'nom_logiciel','editeur','siteWeb','licence','type_logiciel')
                            ->where("nom_logiciel",'LIKE','%'.$donnees[0].'%')
                            ->get();   
                          
                // vérification que le logiciel existe ou non dans la base s'il existe on crée simplement le lien entre la salle et le logiciel
                if($logiciel->count() > 0){
                    //dd($logiciel->count());
                    
                    foreach($logiciel as $key=>$logiciel){
                        // on va vérifier si le lien entre la salle et le logiciel existe déjà
                        $installation = Installation::where([
                            ['logiciel_id', '=', $logiciel->id ],
                            ['salle_id', '=',  $salleId[0]->id]
                        ])->get();

                        // si c'est le cas on va vérifier que le logiciel déja présent comporte une version différente de celle que l'on veut importer
                        if($installation->count() > 0){
                            foreach($installation as $key=>$installation){
                                if($installation->version_logiciel !=  $donnees[2]){

                                    Logiciel::create([
                                        'nom_logiciel' => $logiciel->nom_logiciel,
                                        'editeur' =>  $logiciel->editeur,
                                        'siteWeb' =>  $logiciel->siteWeb,
                                        'licence' =>  $logiciel->licence,
                                        'type_logiciel' =>  $logiciel->type_logiciel,
                                    ]);

                                    // on recupere le dernier logiciel que l'on vient d'inserer
                                    $dernierLogiciel = Logiciel::latest()->first();         

                                    Installation ::create([
                                        'logiciel_id' => $dernierLogiciel->id,
                                        'salle_id' => $salleId[0]->id,
                                        'version_logiciel' => $donnees[2],  
                                    ]);
                                    //dd($installation);
                                }   
                            }
                        }
                        else{ //sinon c'est le premier lien entre le logiciel et la salle
                            Installation ::create([
                                'logiciel_id' => $logiciel->id,
                                'salle_id' => $salleId[0]->id,
                                'version_logiciel' => $donnees[2],  
                            ]);
                        }
                    }
                }
                else{   // sinon on crée le logiciel et le lie à la salle
                    Logiciel::create([
                        'nom_logiciel' => $donnees[0],
                        'editeur' =>  $donnees[1],
                        'siteWeb' =>  $donnees[3],
                        'licence' =>  $donnees[3],
                        'type_logiciel' =>  $donnees[3],
                    ]);

                    // on recupere le dernier logiciel que l'on vient d'inserer
                    $dernierLogiciel = Logiciel::latest()->first();

                    Installation ::create([
                        'logiciel_id' =>  $dernierLogiciel->id,
                        'salle_id' => $salleId[0]->id,
                        'version_logiciel' => $donnees[2],  
                    ]);
                }
            }

            fclose($fichier);
        }

        if($salleId && $installation)
            return redirect()->route('salle.lister')->with('success', 'le fichier ' . $request->importFile .' a bien été importé.');
        else 
            return redirect()->route('salle.lister')->with('error', 'Erreur lors de l\'importation du fichier ' . $request->importFile);

    }
}

?>