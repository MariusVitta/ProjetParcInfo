
    <x-app-layout>

        <x-slot name="header_content">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ajouter logiciel') }}
            </h2>
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
                                <input class="form-control items-center justify-end mt-4" type="text" id="nom_logiciel" name="nom_logiciel" :value="old('nom_logiciel')" placeholder="nom du logiciel *" required autofocus />

                                <label value="editeur"></label>
                                <input class="form-control  items-center justify-end mt-4"  id="editeur" name="editeur" placeholder=" editeur  du logiciel">{{ old('editeur') }}</input>

                                <label value="type_logiciel"></label>
                                <input class="form-control items-center justify-end mt-4"  id="type_logiciel" name="type_logiciel" placeholder=" type  du logiciel">{{ old('type_logiciel') }}</input>

                                <label value="licence"></label>
                                <input class="form-control items-center justify-end mt-4"  id="licence" name="licence" placeholder=" licence  du logiciel" required>{{ old('licence') }}</input>

                                <label value="siteWeb" ></label>
                                <input class="form-control  items-center justify-end mt-4"  id="siteWeb" name="siteWeb" placeholder=" siteWeb  du logiciel">{{ old('siteWeb') }}</input>

                                <br>
                                <div class="field">
                                    <label class="">Choisir le(s) salle(s) </label>
                                    <div class="select">
                                        <select class="select-salles form-control items-center justify-end mt-4"  aria-label=".form-select-lg example" name="salles[]" multiple="true" required>
                                            @foreach($salles as $salle)
                                                <option value="{{ $salle->id }}">{{ $salle->nom_salle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4 ">
                                <button type="submit" class="btn btn-secondary">Enregister </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.select-salles').select2({
                    placeholder: "Selectionnez une ou des salles contenant le logiciel",
                });
            });
        </script>

    </x-app-layout>