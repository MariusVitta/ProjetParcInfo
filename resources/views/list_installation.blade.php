@extends("template")

@section('content')

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Salle</th>
            <th>Logiciel</th>
            <th>Version</th>

            <th>Action</th>

        </tr>
        
        @foreach ($installations as $installation)
            <tr>
             <!-- 'logiciels','enseignants','utilisateurs -->
               @foreach($salles as $salle)
                    @if($installation->where('salle_id','=',$salle->id))
                        <td>{{ $salle->nom_salle}}</td>
                    @endif
                @endforeach

                <td>{{ $installation->logiciel_id}}</td>

                <td>{{ $installation->version_logiciel}} </td>



                <td>
                    <form action="" method="POST">

                        <a href="" title="show">
                            <i class="fa fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="">
                            <i class="fa fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fa fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $installations->links() !!}
@endsection
