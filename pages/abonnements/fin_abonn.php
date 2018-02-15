<?php
require '../../vendor/autoload.php';
include_once "../../assets/class/includes/header.php";
use Emergence\Functions;
$annee = (Functions::getAnnee());

?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Liste des abonnements expirés en <?= date("Y"); ?></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="#">Adherent</a></li>
                <li class="active">Abonnements expirés</li>
            </ol>
        </section>


        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Veuillez patientez</h4>
                    </div>
                    <div class="modal-body">
                        <p align="center"><img src="../../dist/img/loadind.gif" align="center" width="450" ></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-body">
                    <form id="fin_abonn" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Choisir un mois</label>
                                    <select class="form-control select2" style="width: 100%;"  name="type_abonn">
                                        <option selected="selected" value="">Selectionner un mois</option>
                                        <?php foreach ($annee as $a) {
                                            ?>
                                            <option value="<?= $a->id ?>"><?= $a->month ?></option>
                                            <?php
                                        } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Rechercher</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <!-- commencememnt du datatable -->
                        <table id="example1" class="table table-bordered table-striped" hide><br>

                        </table>
                    <!-- Fin du datatable -->

                </div>
            </div>
        </section>
    </div>




<?php include_once "../../assets/class/includes/footer.php" ?>

<script>
    $(function () {

        var $table = $('#example1');
        var $searchForm = $("#fin_abonn");


        $table.dataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "sSearch":         "Rechercher&nbsp;:",
            "lengthMenu": [[7, 14, 28, -1], [12, 14, 28, "Afficher tout"]],
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            },
            columns: [
                { title: "Identifiant", data: 'id' },
                { title: "Date de certificat", data: 'date_certificat' },
                { title: "Type d'abonnement", data: 'type_abonnement' },
                { title: "Date d'abonnement", data: 'date_abonnement' },
                { title: "Durée d'abonnement", data: 'duree_abonnement'},
                { title: "Montant du versement", data: 'montant'},
                { title: "Id Adherent", data: 'id_adherent'},
                { title: "Id Activité", data: 'id_activite'},
                { title: "Type de paiement", data: 'type_paiement'},
                { title: "Actions", data:'OrgBp', className: 'datatable-column-actions'}
            ],
            columnDefs: [
                {
                    render: function (data, type, row) {
                        return '<a href="#" class="link-modal">' + data + '</a>';
                    },
                    targets: 0
                },
                {
                    render: function (data, type, row) {
                        return '<a href="" class="link-modal btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    },
                    targets: 9
                }
            ]
        }).removeClass('hide');

        $("#fin_abonn").submit(function(event){
            event.preventDefault();
            $('#modal-default').modal('show');
            $.post( "scripts/fin_abonn.php",$('#fin_abonn').serializeArray(), function( json ) {
                if (json) {
                    console.log(json);
                    //$('#searchContainer').removeClass('hide');
                    $table.DataTable().clear().rows.add(json).draw();
                    $('#modal-default').modal('hide');
                }
                else{
                    $('#modal-default').modal('hide');
                    console.log('ufu');
                }
            }, "json");
           });
        });

</script>
