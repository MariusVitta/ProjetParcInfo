<?php

namespace App\Http\Controllers;

use App\bd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Test;

class SearchController extends Controller{
    public function index(){
        //return view('accueil');
        return view ('accueil')->withMessage('No Details found. Try to search again !');
    }

	public function store(Request $request){
        
       
    }

    
    public function recherche(Request $request) { 
        //dd($request->all());
        $q = $request->input('q');
        $user = Test::where('name','LIKE','%'.$q.'%')->get();
         
         if(count($user) > 0)
            return view('accueil')->withDetails( $user)->withQuery($q);
        else return view ('accueil')->withMessage('Aucun resultat trouvé pour la recherche')->withQuery($q);
    }
}
