
@extends("template")
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <h2> Ajouter installation</h2>
                <a class="btn btn-primary pull-right" href="" title="Go back"> <i class="fa fa-backward "></i> </a>
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
        <form method="POST" action="{{route('installation.store') }}">
            @csrf
                <label class="flex items-center justify-end mt-4">Logiciels</label>
                <select class="form-control" aria-label=".form-select-lg example" name="logiciel_formulaire" id="logiciel_formulaire"   >
                    @foreach($logiciels as $log)
                        <option value="{{ $log->id }}">{{ $log->nom_logiciel }}</option>
                    @endforeach
                </select>

                <label class="label flex items-center justify-end mt-4">Salles</label>
                <select class="form-control" aria-label=".form-select-lg example"  name="salle_formulaire" id="salle_formulaire"  >
                    @foreach($salles as $sal)
                        <option value="{{ $sal->id }}">{{ $sal->nom_salle}}</option>
                    @endforeach
                </select>
                <label value="version_logiciel "></label>
                <input class="form-control  items-center justify-end mt-4" type="text" id="version_logiciel" name="version_logiciel" :value="{{ old('version_logiciel') }} " placeholder=" version logiciel " required autofocus />
            

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn btn-secondary">Enregister </button>
                </div>
        </form>

    </div>
@endsection