@extends("template")

@section("titre")
	accueil
@endsection

@section("champ_de_saisie")
	<div class="container">
        <div id="searchbar" >
                <form  method="POST" role="search">
                    @csrf
                    <input class="form-control mr-sm-2" type="text" name="logiciel" id="logiciel" placeholder="Rechercher un logiciel ou une salle" autocomplete="off" />
                    <input type="submit" value="Rechercher" />
                </form>
        </div>
        <div>
            @if(!empty($message))
                <div class="alert alert-danger"> {{ $message }} {{ $query }}</div>
            @endif
        </div>
    </div>
	
@endsection

@section("resultatRecherche")
	<div class="container">
        @if(isset($details))
            <p> Voici la liste des salles pour le logiciel <b> " {{ $query }} " </b> :</p>
        <h2>Details de la recherche</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom salle </th>
					<th>Version logiciel </th>
					
                </tr>
            </thead>
            <tbody>
                @foreach($details as $salle)
                <tr>
                    <td>{{$salle->nom_salle}}</td>
					<td>{{$salle->version_logiciel}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="container">
        @if(isset($salles))
            <p> Voici la liste des logiciels pour la salle <b> " {{ $query }} " </b> :</p>
        <h2>Details de la recherche</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom du logiciel </th>
					<th>Auteur </th>
					<th>Type </th>
					<th>Licence </th>
					<th> Site </th>
                </tr>
            </thead>
            <tbody>
                @foreach($salles as $logiciel)
                <tr>
                    <td>{{$logiciel->nom_logiciel}}</td>
					<td>{{$logiciel->auteur}}</td>
					<td>{{$logiciel->type_logiciel}}</td>
					<td>{{$logiciel->licence}}</td>
					<td>{{$logiciel->site}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection