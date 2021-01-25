<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerAccueil extends Controller{
    public function index(){
        return view('accueil');
    }
   
}
