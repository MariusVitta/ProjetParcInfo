<?php

namespace App\Http\Controllers;
use App\Models\Departement;

use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function create()
    {
        {
            return view ('ajouter_departement');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nom' => 'required',

        ]);

        $departement = Departement::create([
            'nom' => $request->nom
        ]);

        return  redirect()->route('departement.lister')->with('success', ' Departement bien ajouté.') ;
    }

    /**
     * listing des departements, par page de 5 départements par départements
     */
    public function lister(){

        $departements = Departement::latest()->paginate(5);

        return view('list_departement', compact('departements'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * méthode de vue des données sur le departement
     * tout les champs sont désactivés lors de la vue sur les données associés au departement
     */
    public function show(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
        if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */

            $res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/

            /*
             * recuperation du departement avec l'id spécifié en paramètre
             */
            $departement= Departement::select("nom")->where('id','LIKE',$request->search)
                ->get();

            if($departement){
                foreach($departement as $key=>$departement){

                    $res .= '<label class="flex pull-left justify-end mt-4" value="nomDepartement" >nom departement</label>';
                    $res.= '<input class="form-control items-center justify-end mt-4 " name="nomDepartement"  value="'. $departement->nom. '" disabled>';
                }
            }
            return Response($res);
        }

    }


    /**
     * méthode d'edition des données sur le departement
     *
     */
    public function edit(Request $request){

        /* l'utilisation de l'ajax fin de compléter les modals à l'aide des données disponibles depuis le controleur */
        if($request->ajax()){ /* on verifie que l'on soit bien sur une requete ajax afin de ne pas transmettre les données sur un endroit non voulu */

            $res=""; /* variable qui contiendra les données renvoyé sous forme d'un formulaire pré-rempli*/


            /* création du formulaire avec les champ remplis */
            /*
             * recuperation du departement avec l'id spécifié en paramètre
             */
            $departement= Departement::select("nom")->where('id','LIKE',$request->search)
                ->get();

            if($departement){
                foreach($departement as $key=>$departement){
                    $res .= '<label class="flex pull-left justify-end mt-4" value="nomDepartement" >Choisir le nom du departement</label>';
                    $res.= '<input class="form-control items-center justify-end mt-4 " name="nom"  value="'. $departement->nom. '">';
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
            'nom' => 'required',

        ]);

        Departement::where('id',$id)->update(['nom'=>$request->nom]);

        return redirect()->route('departement.lister')->with('success', 'Departement bien mis à jour.');
    }

    /**
     * méthode de suppression d'un departement, rechercheé par id
     * @param id: id du departement à supprimer
     */
    public function deleteDepartement($id){
        $departement = Departement::find($id);
        $resultatSuppression = $departement->delete();
        if($resultatSuppression)
            return redirect()->route('departement.lister')->with('success', 'Departement bien supprimé.');
        else
            return redirect()->route('departement.lister')->with('error', 'Erreur de suppression du departement.');
    }


}
