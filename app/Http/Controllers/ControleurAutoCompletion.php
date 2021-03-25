<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logiciel;
use App\Models\Salle;

class ControleurAutoCompletion extends Controller{
   
    public function autocompletion(Request $request){
        /* on utilise de l'ajax dans le fichier accueil.blade.php afin d'avoir cette aspect dynamique sur la complétion */
		if($request->ajax() && $request->search != ""){ /* on verifie que la chaine ne soit pas vide afin d'eviter l'affichage complet des données */
			
			$res=""; /* variable qui contiendra les données renvoyé sous forme de ligne d'un tableau */

			/*
			 * recuperation des logiciels et des salles dont la chaine recherchée est contenue soit dans le nom du logiciel ou le nom de la salle
			 */
			$logiciels= Logiciel::select("nom_logiciel")->where('nom_logiciel','LIKE','%'.$request->search.'%')
							->get();
            $salles= Salle::select("nom_salle")->where('nom_salle','LIKE','%'.$request->search.'%')
							->get();

			/* création de ligne individuelle d'un tableau pour chacune des données correspondant à la recherche effectuée */
			if($logiciels){
				foreach($logiciels as $key=>$logiciel){
					$res.='<tr>'.
						'<td><a href="#">[Logiciel] '.$logiciel->nom_logiciel.'</a></td>'.
						'</tr>';
				}
            }
            if($salles){
				foreach($salles as $key=>$salle)
				{
					$res.='<tr>'.
						'<td><a href="#">[Salle] '.$salle->nom_salle.'</a></td>'.
						'</tr>';
				}
            }
            return Response($res);
		}
	}

}
