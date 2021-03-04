
<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Ajouter Departement') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Accueil</a></div>
            <div class="breadcrumb-item"><a href="#">Departement</a></div>
            <div class="breadcrumb-item"><a href="{{ route('departement.create') }}">Ajouter departement</a></div>
        </div>
    </x-slot>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-center" style="text-align:center;">
                                <h2> Ajouter departement</h2>
                            </div>
                        </div>
                    </div>
        <div class="container py-12">
                    <form method="POST" action="{{route('departement.store') }}">
                        @csrf
                        <div class="mt-4">
                            <label value="nom "></label>
                            <input class="form-control items-center justify-end mt-4" type="text" id=nom name="nom" :value="old('nom')" placeholder="nom du département" required autofocus autocomplete="off"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-secondary">Envoyer </button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
</x-app-layout>


