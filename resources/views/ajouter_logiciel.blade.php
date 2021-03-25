
    <x-app-layout>

        <x-slot name="header_content">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter logiciel') }}
            </h2>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Accueil</a></div>
                <div class="breadcrumb-item"><a href="#">Logiciels</a></div>
                <div class="breadcrumb-item"><a href="{{ route('Logiciel.create') }}">Ajouter logiciel</a></div>
            </div>
        </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-center" style="text-align:center;">
                                <h2> Ajouter logiciel</h2>
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
                        <form method="POST" action="{{route('Logiciel.create') }}">
                            @csrf
                            <div class="mt-4">
                                <label value="nom_logiciel"></label>
                                <input class="form-control items-center justify-end mt-4" type="text" id="nom_logiciel" name="nom_logiciel" :value="old('nom_logiciel')" placeholder="Nom du logiciel *" required autofocus />

                                <label value="editeur"></label>
                                <input class="form-control  items-center justify-end mt-4"  id="editeur" name="editeur" placeholder="Editeur  du logiciel">{{ old('editeur') }}</input>

                                <label value="type_logiciel"></label>
                                <input class="form-control items-center justify-end mt-4"  id="type_logiciel" name="type_logiciel" placeholder=" Type  du logiciel">{{ old('type_logiciel') }}</input>

                                <label value="licence"></label>
                                <input class="form-control items-center justify-end mt-4"  id="licence" name="licence" placeholder="Licence  du logiciel" >{{ old('licence') }}</input>

                                <label value="siteWeb" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="siteWeb" name="siteWeb" placeholder="Site web du logiciel">{{ old('siteWeb') }}</input>

                                 <label value="vers_logiciel" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="vers_logiciel" name="vers_logiciel" placeholder="Version du logiciel *" required>{{ old('vers_logiciel') }}</input>

                                <br>
                                <div class="form-group">
                                    <label class="">Choisir la/les salle(s) </label>
                                    <select id="selectSalles" multiple class="form-control"  name="salles[]"  required>
                                        @foreach($salles as $salle)
                                            <option value="{{ $salle->id }}">{{ $salle->nom_salle }}</option>
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
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
     

    </x-app-layout>