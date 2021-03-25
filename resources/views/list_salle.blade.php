<x-app-layout>

    <x-slot name="header_content">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listes des salles') }}
        </h2>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Accueil</a></div>
            <div class="breadcrumb-item"><a href="#">Salles</a></div>
            <div class="breadcrumb-item"><a href="{{ route('salle.lister') }}">Données salles</a></div>
        </div>
    </x-slot>


    <div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
        <div class="p-8 pt-4 mt-2 bg-white" >
            <div class="flex pb-4 -ml-3">
                <a  href="{{ route('salle.create') }}" class="-ml- btn btn-primary shadow-none">
                    <span class="fas fa-plus"></span> Ajouter une salle <!-- Nouveau du bouton d'ajout: App/Http/Livewire/Table -->
                </a>


            </div>

            <div class="row mb-4">
                <div class="col form-inline" style="visibility: hidden;">
                    Par Page: &nbsp;
                    <select wire:model="perPage" class="form-control">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                    </select>
                </div>

                <div class="col">
                    <input wire:model="search" id="search" class="form-control" type="text" placeholder="Rechercher..." autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="table-responsive">

        <table  id="tab" class=" sortable table-bordered table-responsive-lg bg-white overflow-hidden shadow-xl table table-bordered table-striped text-sm text-gray-600 sm:rounded-lg">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Numero</th>
            <th>Type salle</th>
            <th>Quantité pc</th>
            <th>Système d'exploitation</th>
             <th>Actions</th>

        </tr>
        @foreach ($salles as $salle)
            <tr>
                <td id="id">{{$salle->id}}</td>
                <td id="nom">{{$salle->nom_salle}}</td>
                <td>{{$salle->numero}} </td>
                <td>{{$salle->type_salle}}</td>
                <td>{{$salle->quantitePC}}</td>
                <td>{{$salle->systemeExploitationPC}}</td>
                
                  <td class="whitespace-no-wrap row-action--icon"  style="display:flex;">
                    <button type="button" id="import" data-toggle="modal" data-target="#modalImport" title="import" style="border: none; background-color:transparent;">
                        <i class="fa fa-file-import"></i>
                    </button>

                    <button id="show" type="button" data-toggle="modal" data-target="#modalShow"  style="border: none; background-color:transparent;">
                        <i class="fa fa-eye text-success  fa-lg"></i>  
                    </button>

                    <button id="edit" type="button" data-toggle="modal" data-target="#modalEdit"  style="border: none; background-color:transparent;">
                        <i class="fa fa-16px  fa-pen fa-lg"></i>
                    </button>

                    <button type="button" id="delete" data-toggle="modal" data-target="#modalDelete" title="delete" style="border: none; background-color:transparent;">
                        <i class="fa fa-trash fa-lg text-danger"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!-- messages d'erreurs/succes -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul class="mb-0 mt-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Modal import  -->
    <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Importer </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" id="importForm" action="{{ URL::to('importation')}}" role="search">
                        @csrf
                    <div class="modal-body">
                        <input class="form-control mr-sm-2 " type="search" id="nom_salle" name="nom_salle" placeholder="nom de la salle" autocomplete="off" readonly="readonly" />
                        <br/>
                        <input type="file" id="importFile" name="importFile" directory accept=".csv,.xsl" required>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Importer" />
                        <button type="button" class="btn btn-primary "  data-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal show -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Salle </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary "  data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edition -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edition salle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="editForm" >
                    @csrf
                    <div class="modal-body">
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary "  data-dismiss="modal">Fermer</button>
                        <button id="boutonEditer" type="submit" class="btn btn-success">Editer</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Modal suppression -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Suppression salle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="deleteForm">
                    <div class="modal-body">
                    <p id="textModalDelete"> </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary "data-dismiss="modal">Non, annuler</button>
                        <button type="submit" class="btn btn-danger">Oui, supprimer.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--
        scripts utilisés pour l'affichage des fênetres modals, les completer avec les bons champs remplis avec 
        les données que l'on souhaite voir/editer, ou afficher une fênetre de confirmation avant la suppression irréversible
        - le premier script importe jquery pour l'ouverture des fênetre modal
        - le deuxieme est l'importation de l'ajax afin de remplir dynamique les modals grâce au données récupérées depuis les controleurs
        - le troisième et quatrième sont là pour permettre le bon fonctionnement des fênetres modals
        - le cinquième est le js pour avoir des selections multiples     
    -->    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

    <script  type="text/javascript">

        // .on('keyup' : listener sur toutes les modifications faite à la barre de recherche
        $('#search').on('keyup',function(event){

           // déclarations des varriables
            var input, filter, table, tr, td, i, txtValue;
            input = $(this).val(); // recuperation de la valeur de l'input
            filter = input.toUpperCase(); // eviter l
            table = document.getElementById("tab");
            tr = table.getElementsByTagName("tr");
            
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        });


        $(document).ready(function(){

            $('table #show').click(function(){
                $(this).addClass('show-item-trigger-clicked');
                $('#modalShow').modal('show');
            });
        

            $('#modalShow').on('show.bs.modal', function(event){
                var button = $(".show-item-trigger-clicked"); // on recuperer la ligne du tableau qui a était cliquée

                $.ajax({
                    type:'GET', 
                    url: '{{ URL::to('showSalle')}}',
                    data: {'search': button.closest("tr").find("#id").text()},
                    success:function(data){
                        // ajout dans le hmtl de la partie de tableau correspondante au resultat de la recherche
                        $('#modalShow .modal-body').html(data);
                        $('#selectLogiciels').multiselect();
                        //$('#selectLogiciels').setIsEnabled();
                    },
                    error: function(err){
                        $('#modalShow .modal-body').html('<h3> Erreur lors du chargement des données </h3>');
                        console.log('Error:'+ err);
                    }
                }); 
            });
            
            $('#modalShow').on('shown.bs.modal', function(event){
               //$('#selectSalles2').multiselect();
            });


            // lorsque l'on ferme la fênetre modal d'édition, on supprime le contenu de la fênetre modal d'edition
            $('#modalShow').on('hide.bs.modal', function() {
                $('.show-item-trigger-clicked').removeClass('show-item-trigger-clicked');
            });
        
            /** ouverture de la modal fênetre d'edition */
            $('table #edit').click(function(){
                $(this).addClass('edit-item-trigger-clicked');
                var id = $(this).closest('tr').find('#id').text();
                $('#editForm').attr('action',"updateSalle/"+ id );
                $('#modalEdit').modal('show');
            });
            
            /**
            * show.bs.modal: lorsque l'on appel la méthode "show" avant que la fênetre apparaissait à l'utilisateur 
            * on réalise les actions se trouvant à l'interieur
            * c'est à dire remplir les champs formulaire du modal
            */
            $('#modalEdit').on('show.bs.modal', function(event){
                var button = $(".edit-item-trigger-clicked"); // on recuperer la ligne du table qui a était cliqué
            
                $.ajax({
                    type:'GET', 
                    url: '{{ URL::to('editSalle')}}',
                    data: {'search': button.closest("tr").find("#id").text()},
                    success:function(data){
                        // ajout dans le hmtl de la partie de tableau correspondante au resultat de la recherche
                        $('#modalEdit #boutonEditer').attr("disabled", false);
                        $('#modalEdit .modal-body').html(data);
                        $('#selectLogiciels').multiselect();
                    },
                    error: function(err){
                        $('#modalEdit .modal-body').html('<h3> Erreur lors du chargement des données </h3>');
                        $('#modalEdit #boutonEditer').attr("disabled", true);
                        console.log('Error:'+ err);
                    }
                }); 
            });
            
            /**
            * shown.bs.modal: lorsque l'on appel la méthode "show" quand la fênetre apparaissait à l'utilisateur 
            * on réalise les actions se trouvant à l'interieur
            * c'est à dire modifier le type de select
            */
            $('#modalEdit').on('shown.bs.modal', function(event){
               
            });

            // lorsque l'on ferme la fênetre modal d'édition, on supprime le contenu de la fênetre modal d'edition
            $('#modalEdit').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked');
            });
            

            /** lorsque l'on clique sur l'icone de la poubelle
            * on lance l'ouverture d'une fênetre modal afin de confirmer la suppression irréversible
            * des données
            */
            $('table #delete').click(function(){
                $('#modalDelete').modal('show'); 
                document.getElementById("textModalDelete").innerHTML =  
                "Etes-vous sur de vouloir supprimer la salle <b>" +
                $(this).parents('tr').find("#nom").text() + "</b> ? Cette action est irreversible." ;
                $('#deleteForm').attr('action',"deleteSalle/"+$(this).parents('tr').find("#id").text()); // on ajouter une action au formulaire de la fênetre modal de suppression afin de supprimer les données avec la confirmation
            });


            $('table #import').click(function(){
                $(this).addClass('show-item-trigger-clicked');
                $('#modalImport').modal('show');
            });
        

            $('#modalImport').on('show.bs.modal', function(event){
                var button = $(".show-item-trigger-clicked"); // on recuperer la ligne du tableau qui a était cliquée
                var id = button.closest('tr').find('#id').text();
                
                $('#modalImport #nom_salle').val(button.closest('tr').find('#nom').text());
                $('#modalImport').modal('show');
            });
            
            // lorsque l'on ferme la fênetre modal d'édition, on supprime le contenu de la fênetre modal d'edition
            $('#modalImport').on('hide.bs.modal', function() {
                $('.show-item-trigger-clicked').removeClass('show-item-trigger-clicked');
            });
        
        });
    </script>

   
    {!! $salles->links() !!}
         
</x-app-layout>

