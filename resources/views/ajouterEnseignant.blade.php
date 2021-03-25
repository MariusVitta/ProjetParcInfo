
    <x-app-layout>

        <x-slot name="header_content">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter enseignant') }}
            </h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Accueil</a></div>
                <div class="breadcrumb-item"><a href="#">Enseignant</a></div>
                <div class="breadcrumb-item"><a href="{{ route('enseignant.create') }}">Ajouter enseignant</a></div>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-center" style="text-align:center;">
                                <h2> Ajouter enseignant</h2>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container py-12">
                        <form method="POST" action="{{route('enseignant.create') }}">
                            @csrf

                                <label >Choisir le département de l'enseignant</label>
                                <div class="select">
                                    <select name="departement_id" id="departement_id" class="form-control" aria-label=".form-select-lg example" required>
                                        @foreach($departements as $departement)
                                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <label value="nom_enseignant"  ></label>
                                <input class="form-control  items-center justify-end mt-4" type="text" id="nom_enseignant" name="nom_enseignant" :value="old('nom_enseignant')" placeholder="Nom de l'enseignant *" required autofocus />

                                <label value="prenom_enseignant" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="prenom_enseignant" name="prenom_enseignant" placeholder="Prénom de l'enseignant *" required>{{ old('prenom_enseignant') }}</input>

                                <div class="field">
                                    <label > Choisir le statut de l'enseignant </label>
                                    <div class="select">
                                        <select class="form-control"  aria-label=".form-select-lg example" name="statut" id="statut" required>
                                            @foreach($statuts as $statut)
                                                <option value="{{ $statut }}">{{ $statut}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            <div class="flex items-center justify-end mt-4 ">
                                <button type="submit" class="ml-2 btn btn-success shadow-none">Enregister </button>
                            </div>
                        </form>
                    </div>

                    
                </div>
            </div>
        </div>

    </x-app-layout>
