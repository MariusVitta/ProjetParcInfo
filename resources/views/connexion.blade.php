@extends('template')
 
@section('titre')
    Connexion
@endsection
 
@section('contenu')
    
    <div id="searchbar" >
    <form action="{{ route('recherche') }}" method="POST" role="search">
                @csrf
                <label for="site-search"> Connexion administrateur </label>
                <input type="search" id="site-search" name="q" placeholder="identifiant" autocomplete="off">
                <input type="search" id="site-search" name="q" placeholder="mot de passe" autocomplete="off">
                <button type="submit" id="boutonSearch">Connexion</button>
            </form>
    </div>
@endsection