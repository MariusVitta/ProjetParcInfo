
    <x-app-layout>

        <x-slot name="header_content">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter Salle') }}
            </h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Accueil</a></div>
                <div class="breadcrumb-item"><a href="#">Salle</a></div>
                <div class="breadcrumb-item"><a href="{{ route('salle.create') }}">Ajouter salle</a></div>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-center" style="text-align:center;">
                                <h2> Ajouter salle</h2>
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
                        <form method="POST" action="{{route('salle.create') }}">
                            @csrf
                            <div class="field">
                                <label class="flex pull-left justify-end mt-4">Choisir le département</label>
                                <div class="select">
                                    <select name="departement_id" id="departement_id" class="form-control" aria-label=".form-select-lg example">
                                        @foreach($departements as $departement)
                                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4 form-group">
                                <label value="numero"  ></label>
                                <input class="form-control  items-center justify-end mt-4" type="text" id="numero" name="numero" :value="old('numero')" placeholder="numero de la salle*" required autofocus />

                                <label value="nom_salle" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="nom_salle" name="nom_salle" placeholder=" nom de la salle * " required >{{ old('nom_salle') }}</input>

                                <label value="type_salle" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="type_salle" name="type_salle" placeholder=" type  de la salle * " required >{{ old('type_salle') }}</input>

                                <label value="systemeExploitationPC" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="systemeExploitationPC" name="systemeExploitationPC" placeholder=" Systeme d'exploitation des PC *" required >{{ old('systemeExploitationPC') }}</input>

                                <label value="quantitePC"></label>
                                <input class="form-control  items-center justify-end mt-4"  id="quantitePC" name="quantitePC" placeholder=" Quantité de PC dans la salle *" required >{{ old('quantitePC') }}</input>
                            </div>
                            <div class="items-center justify-end mt-4">
                                <button type="submit" class="ml-2 btn btn-success shadow-none">Enregister </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-app-layout>

