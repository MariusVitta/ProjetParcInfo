<!DOCTYPE html>

<html lang="fr">

	<!-- Page template : page html modèle pour les pages de recherche de logiciels et de salles,
		 afin de ne pas dupliquer de code.
		 Les yield sont remplacés par les informations propres à chaque page.
	-->

	<head>
		<meta charset="UTF-8">
		<title> @yield("titre") </title>
	</head>

	<body>

		<!-- Barre de recherche permettant d'entrer le nom d'un logiciel ou d'une salle (pour l'instant un formulaire de saisie) -->
		<form method="POST">
			@csrf <!-- Code permettant d'éviter les attaques CSRF -->
			<div>
				@yield("champ_de_saisie")
				<input type="submit" value="Rechercher" />
			</div>
		</form>

		<!-- Affichage de la saisie de l'utilisateur (uniquement après une saisie) -->
		<?php
			if (isset($reponse))
		 		echo "<p> $reponse </p>"
		?>

		<a href="/"> Retour à l'accueil </a>

	</body>

</html>