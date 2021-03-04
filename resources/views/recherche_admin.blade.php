 <x-app-layout>

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Recherche') }}
                </h2>

            </x-slot>

            <br>
        
        <div class="container ">
                <form method="POST" id="form" action="{{ URL::to('recherche_admin')}}" role="search">
                    @csrf
                    <input class="form-control mr-sm-2 " type="text" name="recherche" id="recherche" placeholder="Rechercher un logiciel ou une salle" autocomplete="off" />

                    <!-- tableau servant à l'affichage de l'autocompletion, le donnée affichée sont filtrées depuis le controleur "App/Http/ControleurAutoCompletion" -->
                    <table class="table table-bordered table-hover">
                        <tbody class="completion"></tbody>
                    </table>
                    <input type="submit" value="Rechercher" class="btn btn-primary "/>
                </form>
            <div>
                <!-- affichage du message d'erreur au cas ou aucun logiciel ou aucune salle n'ait été trouvé pour la recherche -->
            @if(!empty($message))
                <!--$message: message d'erreur
                        $recherche: recherche effectuée
                    -->
                    <div class="alert alert-danger"> {{ $message }} {{ $recherche }}</div>
            @endif
            </div>
            @extends("errors")
        </div>


    <!-- conteneur qui sert à l'affichage de la liste des logiciels pour une salles recherché sous forme d'un tableau  -->
    <div class="container">
        <!-- si la variable $logiciels à recue une/des valeur(s) depuis le controleur "ControleurRecherche" alors on passe à l'étape d'affichage des données -->
        @if(isset($logiciels))

            <!-- $recherche: recherche effectuée  -->
                <h3> Voici la liste des salles pour le logiciel <b> " {{ $recherche }} " </b> :</h3>
                    <h3>Details de la recherche </h3>

                <!-- on affiche seulement le nom de la salle et la version du logiciel mais l'ajout de colonne est possible si les données que l'on souhaite à afficher
                    ait été selectionnées dans la recherche depuis le controleur "ControleurRecherche" -->
                <table class="table table-striped table-bordered sortable">
                    <thead>
                    <tr>
                        <th>Nom salle </th>
                        <th>Version logiciel </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- boucle d'affichage des données sur plusieurs lignes -->
                    @foreach($logiciels as $salle)
                        <tr>
                            <td>{{$salle->nom_salle}}</td>
                            <td>{{$salle->version_logiciel}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        @endif
    </div>

    <!-- conteneur qui sert à l'affichage de la liste des logiciels pour une salles recherché sous forme d'un tableau  -->
    <div class="container">
        @if(isset($salles))
        <!-- $recherche: recherche effectuée  -->
            <h3> Voici la liste des logiciels pour la salle <b> " {{ $recherche }} " </b> :</h3>
            <h5>Details de la recherche</h5>

            <!-- on affiche seulement le nom, l'auteur, le type, la licence et le site du logiciel mais l'ajout de colonne est possible si les données que l'on souhaite à afficher
                ait été selectionnées dans la recherche depuis le controleur "ControleurRecherche" -->
            <table class="table table-striped table-bordered sortable">
                <thead>
                <tr>
                    <th>Nom du logiciel </th>
                    <th>Auteur </th>
                    <th>Type </th>
                    <th>Licence </th>
                    <th> Site </th>
                    <th> Informations logiciel </th>
                </tr>
                </thead>
                <tbody>
                <!-- boucle d'affichage des données sur plusieurs lignes -->
                @foreach($salles as $logiciel)
                    <tr>
                        <td>{{$logiciel->nom_logiciel}}</td>
                        <td>{{$logiciel->editeur}}</td>
                        <td>{{$logiciel->type}}</td>
                        <td>{{$logiciel->licence}}</td>
                        <td>{{$logiciel->siteWeb}}</td>
                        @if(isset($enseignants))
                            @foreach($enseignants as $enseignant)
                                @if($enseignant->id === $logiciel->id)
                                    <td>
                                        <form method="POST" id="formtest" action="{{ URL::to('listeProfs')}}" >
                                            @csrf
                                            <input value="{{$logiciel->nom_logiciel}}" type="hidden" name="nomLogiciel" id="nomLogiciel" />
                                            <input value="{{$recherche}}" type="hidden" name="nomSalle" id="nomSalle" />
                                            <input type="submit" class="btn btn-info" value="Info" ></input>
                                        </form>
                                    </td>
                                @endif
                            @endforeach
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>



    </x-app-layout>

