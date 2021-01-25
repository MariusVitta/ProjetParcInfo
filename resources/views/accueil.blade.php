@extends('template')
 
@section('titre')
    Bibliotheque logiciel 
@endsection
 
@section('contenu')
    <div id="searchbar" >
            <form action="{{ url('recherche') }}" method="POST" role="search">
                @csrf
                <label for="site-search"> Barre de recherche:</label>
                <input type="search" id="site-search" name="q" placeholder="Rechercher un logiciel ou une salle" autocomplete="off">
                
                <button type="submit" id="boutonSearch">Rechercher</button>
            </form>
    </div>
    <div>
        @if(!empty($message))
            <div class="alert alert-success"> {{ $message }} {{ $query }}</div>
        @endif
    </div>
  
@endsection

@section('resultatRecherche')
    <div class="container">
        @if(isset($details))
            <p> les resultats pour la recherche <b> {{ $query }} </b> est :</p>
        <h2>details de la recherche</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $user)
                <tr>
                    <td>{{$user->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection