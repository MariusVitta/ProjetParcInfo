 <x-app-layout>

            <x-slot name="header_content">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Listes des  enseignants') }}
                </h2>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Accueil</a></div>
                    <div class="breadcrumb-item"><a href="#">Enseignant</a></div>
                    <div class="breadcrumb-item"><a href="">  Liste Enseignant</a></div>
                </div>
            </x-slot>

            <br>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <table class="table table-bordered table-responsive-lg">
                <tr>
                    <th>Nom</th>
                    <th>prénom</th>
                    <th>statut</th>
                    <th>departement</th>
                    <th>Action</th>
                </tr>
                @foreach ($enseignants as $enseignant)
                    <tr>
                        <td id="nom">{{$enseignant->nom_enseignant}}</td>
                        <td id="prenom">{{$enseignant->prenom}}</td>
                        <td id="statut">{{$enseignant->statut}} </td>
                        <td id="departement">{{$enseignant->nom_departement}}</td>

                        <td>
                            <button id="show" type="button" data-toggle="modal" data-target="#modalShow" data-id="{{$enseignant->id}}">
                                <i class="fa fa-eye text-success  fa-lg"></i>
                            </button>

                            <button id="edit" type="button" data-toggle="modal" data-target="#modalEdit" data-id="{{$enseignant->id}}">
                                <i class="fa fa-edit  fa-lg"></i>
                            </button>

                            <button type="button" id="delete" data-toggle="modal" data-id="{{$enseignant->id}}" data-target="#modalDelete" title="delete" style="border: none; background-color:transparent;">
                                <i class="fa fa-trash fa-lg text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
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

        <!-- Modal show -->
            <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  data-backdrop="false" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Enseignant </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal edition -->
            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edition enseignant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  id="editForm" >
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button id="boutonEditer" type="submit" class="btn btn-success">Editer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Modal suppression -->
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  data-backdrop="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Suppression enseignant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  id="deleteForm">
                            <div class="modal-body">
                                <p id="textModalDelete"> </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non, annuler</button>
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
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script type="text/javascript">

                $(document).ready(function(){

                    $('table #show').click(function(){
                        $(this).addClass('show-item-trigger-clicked');
                        $('#modalShow').modal('show');
                    });

                    $('#modalShow').on('show.bs.modal', function(event){
                        var button = $(".show-item-trigger-clicked"); // on recuperer la ligne du table qui a était cliqué

                        $.ajax({
                            type:'GET',
                            url: '{{ URL::to('showEnseignant')}}',
                            data: {'search': button.data('id')},
                            success:function(data){
                                // ajout dans le hmtl de la partie de tableau correspondante au resultat de la recherche
                                $('#modalShow .modal-body').html(data);
                            },
                            error: function(err){
                                $('#modalShow .modal-body').html('<h3> Erreur lors du chargement des données </h3>');
                                console.log('Error:'+ err);
                            }
                        });
                    });

                    // lorsque l'on ferme la fênetre modal d'édition, on supprime le contenu de la fênetre modal d'edition
                    $('#modalShow').on('hide.bs.modal', function() {
                        $('.show-item-trigger-clicked').removeClass('show-item-trigger-clicked');

                    });

                    /** ouverture de la modal fênetre d'edition
                     *
                     */
                    $('table #edit').click(function(){
                        $(this).addClass('edit-item-trigger-clicked');
                        var id = $(this).data("id");
                        $('#editForm').attr('action',"updateEnseignant/"+ id );
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
                            url: '{{ URL::to('editEnseignant')}}',
                            data: {'search': button.data('id')},
                            success:function(data){
                                // ajout dans le hmtl de la partie de tableau correspondante au resultat de la recherche
                                $('#modalEdit #boutonEditer').attr("disabled", false);
                                $('#modalEdit .modal-body').html(data);
                            },
                            error: function(err){
                                $('#modalEdit .modal-body').html('<h3> Erreur lors du chargement des données </h3>');
                                $('#modalEdit #boutonEditer').attr("disabled", true);
                                console.log('Error:'+ err);
                            }
                        });

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
                            "Etes-vous sur de vouloir supprimer l'enseignant <b>" +
                            $(this).parents('tr').find("#nom").text() + "</b> ? Cette action est irreversible." ;
                        $('#deleteForm').attr('action',"deleteEnseignant/"+$('#delete').data("id")); // on ajouter une action au formulaire de la fênetre modal de suppression afin de supprimer les données avec la confirmation
                    });

                });
            </script>


            {!! $enseignants->links() !!}
                    </div>
                </div>
            </div>

        </x-app-layout>
