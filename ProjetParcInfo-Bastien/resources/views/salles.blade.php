<!-- Page de recherche des salles :
	 Fonctionnalités :
	 	- demande à l'utilisateur de saisir le nom d'une salle
	 	- affiche la liste des logiciels installés dans la salle
	 Chaque section complète le code du template au yield correspondant à la section.
-->

@extends("template")

@section("titre")
	Salles
@endsection

@section("champ_de_saisie")
	<label for="salle"> Entrez le nom d'une salle : </label>
	<input type="text" name="salle" id="salle" />
	@error("salle") <!-- Gestion des erreurs (le message est généré automatiquement) -->
		<div> {{ $message }} </div>
	@enderror
@endsection