<!-- Page de recherche des logiciels :
	 Fonctionnalités :
	 	- demande à l'utilisateur de saisir le nom d'un logiciel
	 	- affiche la liste des salles dans lesquelles est installé le logiciel
	 Chaque section complète le code du template au yield correspondant à la section.
-->

@extends("template")

@section("titre")
	Logiciels
@endsection

@section("champ_de_saisie")
	<div class="container">
        <div id="searchbar" >
                <form  method="POST" role="search">
                    @csrf
                    <label for="logiciel"> Entrez le nom d'un logiciel : </label>
                    <input class="form-control mr-sm-2" type="text" name="logiciel" id="logiciel" placeholder="Rechercher un logiciel" autocomplete="off" />
                    <input type="submit" value="Rechercher" />
                </form>
        </div>
        <div>
            @if(!empty($message))
                <div class="alert alert-danger"> {{ $message }} {{ $query }}</div>
            @endif
        </div>
    </div>
	@error("logiciel") <!-- Gestion des erreurs (le message est généré automatiquement) -->
		<div> {{ $message }} </div>
	@enderror
@endsection