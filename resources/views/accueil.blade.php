@extends("template")

@section("titre")
    Bibliothèque de logiciels
@endsection

@section("champ_de_saisie")
    <div class="container">
        <div >
            <form method="POST" id="form" action="{{ URL::to('recherche')}}" role="search">
                @csrf
                <input class="form-control mr-sm-2 " type="search" name="recherche" id="recherche" placeholder="Rechercher un logiciel ou une salle" autocomplete="off" />
                <!-- tableau servant à l'affichage de l'autocompletion, le donnée affichée sont filtrées depuis le controleur "App/Http/ControleurAutoCompletion" -->
                <table class="table table-bordered table-hover">
                    <tbody id="completion"></tbody>
                </table>
                <input type="submit" value="Rechercher" />
            </form>
        </div>
        <div>
                <!-- affichage du message d'erreur au cas ou aucun logiciel ou aucune salle n'ait été trouvé pour la recherche -->
            @if(!empty($message))
                <!--$message: message d'erreur
                        $recherche: recherche effectuée
                -->
                <div class="alert alert-danger"> 
                    {{ $message }} {{ $recherche }} <br/> 
                    Vous pouvez faire une demande d'installation ou de mise à jour auprès du service informatique
                    <a href="mailto:iut-laval@univ-lemans.fr" style="color:#263a7a">ici</a>
                </div>
            @endif
        
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
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
        </div>
    </div>

@endsection

@section("resultatRecherche")
    <!-- conteneur qui sert à l'affichage de la liste des salles pour un logiciel recherché sous forme d'un tableau  -->
    <div class="container">
        <!-- si la variable $logiciels à recue une/des valeur(s) depuis le controleur "ControleurRecherche" alors on passe à l'étape d'affichage des données -->
    @if(isset($logiciels))

        <!-- $recherche: recherche effectuée  -->
            <h3> Voici la liste des salles pour le logiciel <b> " {{ $recherche }} " </b> :</h2>
                <h5>Details de la recherche</h3>
            <!-- on affiche seulement le nom de la salle et la version du logiciel mais l'ajout de colonne est possible si les données que l'on souhaite à afficher
                ait été selectionnées dans la recherche depuis le controleur "ControleurRecherche" -->
            <table class="table table-striped table-bordered sortable">
                <thead>
                <tr>
                    <th>Nom salle </th>
                    <th>Version logiciel </th>
                    <th>Nom du logiciel </th>
                </tr>
                </thead>
                <tbody>
                <!-- boucle d'affichage des données sur plusieurs lignes -->
                @foreach($logiciels as $salle)
                    <tr>
                        <td>{{$salle->nom_salle}}</td>
                        <td>{{$salle->version_logiciel}}</td>
                        <td>{{$salle->nom_logiciel}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- conteneur qui sert à l'affichage de la liste des logiciels pour une salles recherché sous forme d'un tableau  -->
    <div class="container">
        <!-- si la variable $salles à recue une/des valeur(s) depuis le controleur "ControleurRecherche" alors on passe à l'étape d'affichage des données -->
    @if(isset($salles))

        <!-- $recherche: recherche effectuée  -->
            <h3> Voici la liste des logiciels pour la salle <b> " {{ $recherche }} " </b> :</h3>
            <h5>Details de la recherche</h5>

            <!-- on affiche seulement le nom, l'auteur, le type, la licence et le site du logiciel mais l'ajout de colonne est possible si les données que l'on souhaite à afficher
                ait été selectionnées dans la recherche depuis le controleur "ControleurRecherche" -->
            <table class="table table-striped table-bordered sortable">
                <thead>
                <tr>
                    <th>Nom </th>
                    <th> Version </th>
                    <th>Auteur </th>
                    <th>Type</th>
                    <th>Licence </th>
                    <th> Site </th>
                    
                </tr>
                </thead>
                <tbody>
                <!-- boucle d'affichage des données sur plusieurs lignes -->
                @foreach($salles as $logiciel)
                    <tr>
                        <td>{{$logiciel->nom_logiciel}}</td>
                        <td> {{$logiciel->version_logiciel}} </td>
                        <td>{{$logiciel->editeur}}</td>
                        <td>{{$logiciel->type_logiciel}}</td>
                        <td>{{$logiciel->licence}}</td>
                        <td>{{$logiciel->siteWeb}}</td>
                       
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

       <!--
        scripts utilisés pour l'affichage dynamique de l'autocomplétion
        le premier script importe jquery pour permettre de rendre la recherche dynamique
        et le second script est là pour mettre à jour la liste des resultats correspondant à la recherche à chaque entrée ou suppresion dans la barre de recherche
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script type="text/javascript">

        // .on('keyup' : listener sur toutes les modifications faite à la barre de recherche
        $('#recherche').on('keyup',function(event){

           /**
            * si la touche pressé par l'utilisateur est la touche flèche du haut ou flèche du bas
            * on enlève le focus sur la barre de recherche car à chaque modification sur celle-ci
            * elle rafraichit le resultat, ceci est simplement mit en place pour eviter de perdre la couleur du focus
            */
            if(event.keyCode == 38) { // flèche du haut
                $('#recherche').blur(); //.blur(): retire le focus sur la barre de recherche
            }
            else if(event.keyCode == 40){ //flèche du bas
                $('#recherche').blur();
            }
            else if(event.keyCode == 13){ // si on appuie sur la touche entrée, on lance la recherche
                $('tbody.completion').html('');
                document.forms["form"].submit();
            }
            else{ 
                search_value=$(this).val();
                $.ajax({
                    type:'GET',
                    url: '{{ URL::to('autocompletion_accueil')}}',
                    data: {'search': search_value},
                    success:function(data){
                        // ajout dans le hmtl de la partie de tableau correspondante au resultat de la recherche
                        $('tbody#completion').html(data);
                    },
                    error: function(err){
                        console.log('Error'+err);
                    }
                });
                $('#recherche').focus();
            }

            /**
             *  fonction qui va permettre lors d'un clique sur l'une des proposition de l'autocompletion de mettre le choix dans la barre de recherche
             * et de lancer la recherche derrière automatiquement avec le "document.forms["form"].submit();"
             */
            $(document).on('click', 'td', function(){
                $('#recherche').val($(this).text().replace('[Logiciel] ', '').replace('[Salle] ', ''));
                $('tbody.completion').html('');
                document.forms["form"].submit();
            });

        });

        // dès qu'une touche est pressée
        $(document).on('keydown', function(event) {

             /**
             * si une des suggestion est surlignée, on va d'abord verifier si l'utilisateur presse les flèches du haut ou du bas
             * si c'est le cas:
             *      - c'est la premiere ou la derniere, on retourne 0 et laisse le focus sur la complétion
             *      - sinon on va déplacer la classe qui permet d'afficher la ligne surlignée d'une cellule vers le haut ou vers le bas dans le tableau "#completion"
             *
             */
            if($('.highlight_row')){
                var eqItem = $('.highlight_row').index();


                if (event.keyCode == 38) {  // si la touche "key up" (flèche du haut) est pressée
                    if(eqItem==0) {
                        return 0;
                    }
                    $('#completion tr').removeClass('highlight_row');
                    $('#completion tr:eq('+(eqItem-1)+')').addClass('highlight_row');
                    $('#recherche').val( $(".highlight_row").text().replace('[Logiciel] ', '').replace('[Salle] ', '')); //on ajoute dynamique la recherche selectionnée avec les flèches dans la barre
                }
                if (event.keyCode == 40) { // si la touche "key down" (flèche du bas) est pressée
                    if(eqItem==$('#completion tr').length-1) {
                        return 0;
                    }
                    $('#completion tr').removeClass('highlight_row');
                    $('#completion tr:eq('+(eqItem+1)+')').addClass('highlight_row');
                    $('#recherche').val( $(".highlight_row").text().replace('[Logiciel] ', '').replace('[Salle] ', '')); //on ajoute dynamique la recherche selectionnée avec les flèches dans la barre
                }

                if (event.keyCode == 8){ //si la touche "back" (effacer) ou n'importe qu'elle touche est pressée on remet le focus sur la barre de recherche
                    $('#recherche').focus();
                }
                else{
                    $('#recherche').focus();
                }  
            }

        });
    </script>

@endsection