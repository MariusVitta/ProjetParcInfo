<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerLogiciel extends Controller{
    //
    public function index(){
        return view('logiciel');
    }
    public function getInfos()
    {
        //return view('welcome');
        return view ('welcome')->withMessage('No Details found. Try to search again !');
	}

	public function store(Request $request){
        
       
    }
}
