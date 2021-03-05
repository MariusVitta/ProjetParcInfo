@extends("adminTemplate")
@section('content')
    <x-app-layout>

            <x-slot name="header_content">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Listes des profs associés à un logiciel') }}
                </h2>

            </x-slot>

            <br>

    <div class="container">
            <!-- si la variable $salles à recue une/des valeur(s) depuis le controleur "ControleurRecherche" alors on passe à l'étape d'affichage des données -->
            @if(isset($enseignants))

                <!-- $recherche: recherche effectuée  -->
                <h3> Voici la liste des enseignants pour la salle <b> "{{ $salle }}" </b> utilisant le logiciel <b> "{{ $logiciel }}" </b>  :</h3>
                <h5>Details de la recherche</h5>

                <!-- on affiche seulement le nom, l'auteur, le type, la licence et le site du logiciel mais l'ajout de colonne est possible si les données que l'on souhaite à afficher
                    ait été selectionnées dans la recherche depuis le controleur "ControleurRecherche" -->
                <table class="table table-striped table-bordered sortable">
                    <thead>
                        <tr>
                            <th>Nom enseignant</th>
                            <th>Prenom enseignant </th>
                            <th>statut enseignant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- boucle d'affichage des données sur plusieurs lignes -->
                        @foreach($enseignants as $enseignant)
                        <tr>
                            <td>{{$enseignant->nom}}</td>
                            <td>{{$enseignant->prenom}}</td>
                            <td>{{$enseignant->statut}}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container">
                    <form method="POST"  action="{{ URL::to('recherche_admin')}}" >
                        @csrf
                        <input value="{{$salle}}" type="hidden" name="recherche" id="recherche" />
                        <input type="submit" class="btn btn-info" value="retour" ></input>
                    </form>
                </div>
            @endif
    </div>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    </x-app-layout>
@endsection