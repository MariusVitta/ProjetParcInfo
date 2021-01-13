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

		<p> Entrez le nom @yield("objet") : </p>

		<a href="/"> Retour à l'accueil </a>

	</body>

</html>