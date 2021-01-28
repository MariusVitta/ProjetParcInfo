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
	<label for="logiciel"> Entrez le nom d'un logiciel : </label>
	<input type="text" name="logiciel" id="logiciel" />
	@error("logiciel") <!-- Gestion des erreurs (le message est généré automatiquement) -->
		<div> {{ $message }} </div>
	@enderror
@endsection