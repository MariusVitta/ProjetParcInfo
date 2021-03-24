
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Page d'accueil du site -->
<!-- Fonctionnalités :
         - permettre l'accès à la page de recherche de logiciels
         - permettre l'accès à la page de recherche de salles
-->
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="../public/photos/newlogoIUT.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titre') </title>

    <!-- lien pour la police d'ecriture  -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- lien pour le CSS bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- importation des icones pour les pages listes salles/logiciels -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- importation du style utilisateur dans le dossier public/css -->
    <link rel="stylesheet" href="{{ URL::asset('css/css.css') }} ">

</head>

<header>
    <section>

        <div class="titreSite">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ url('/') }}" >
                            <img src="{{ URL::to('/photos/newlogoIUT.png') }}" class="img-fluid"  alt="logo de l'IUT de Laval">
                        </a>
                    </div>
                </div>
            </div>

            <h1> Votre bibliothèque de logiciels pour le département informatique</h1>
        </div>
    </section>


</header>
<body class="d-flex flex-column text-center">

<div id="page-content">


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="mb-0 mt-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield("champ_de_saisie")
    @yield('resultatRecherche')
    @yield("content")
</div>
</body>
@include("footer")
</html>
