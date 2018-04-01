<?php
require_once '../../vendor/autoload.php';
include_once "../../assets/class/includes/header.php";

use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Versement;

$abonnement  = new Abonnement();
$abonnement->setId($_GET['abonnement']);
$adherent = $_GET['adherent'];
$versement = (new Versement())->VersementById($abonnement->getId());
$abonnement = (new Abonnement())->AbonnementById($abonnement->getId());
$adherent = (new Adherent())->AdherentById($adherent);
$situation = (new Adherent())->SituationById($adherent->situation);
$type_pai = (new Abonnement())->TypePaiment($abonnement->type_paiement);
$typeactivite= (new Abonnement())->TypeActivite($abonnement->id_activite);
$typeabonn = (new Abonnement())->TypeAbonn($abonnement->type_abonnement);
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Détail de l'abonnement de <?= $adherent->nom_adherent.' '.$adherent->prenom_adherent  ?></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Accueil</a></li>
                <li><a href="#">Abonnement</a></li>
                <li class="active">Detail abonnement</li>
            </ol>
        </section>

        <section class="content">

            <div class="alert alert-success" style="display: none" id="success"></div>
            <div class="alert alert-danger" style="display: none" id="error"></div>

            <div class="modal fade" id="detail">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modifier_vers">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title primary"></h4>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date d'abonnement:</label>
                                <input type="text" min="0" class="form-control" value="<?= $abonnement->date_abonnement ?>" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Durée d'abonnement:</label>
                                <input type="text" min="0" class="form-control" value="<?= $abonnement->duree_abonnement ?>" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Montant en € :</label>
                                <input type="text" min="0" class="form-control" value="<?= $abonnement->montant ?>" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Situation:</label>
                                <input type="text" min="0" class="form-control" value="<?= $situation->situation ?>" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de certificat </label>
                                <input type="text" min="0" class="form-control" value="<?= $abonnement->date_certificat ?>" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type de paiement </label>
                                <input type="text" min="0" class="form-control" value="<?= $type_pai->type ?>" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type d'activité </label>
                                <input type="text" min="0" class="form-control" value="<?= $typeactivite->nom_activite ?>" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type d'abonnement </label>
                                <input type="text" min="0" class="form-control" value="<?= $typeabonn->type_abonnement ?>" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Liste des versement de <?= $adherent->nom_adherent.' '.$adherent->prenom_adherent  ?></h3>
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id du versement</th>
                                <th>Id de l'abonnement</th>
                                <th>Date de versement</th>
                                <th>Montant du versement</th>
                                <th>Commentaire</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($versement as $vers): ?>
                                <tr>
                                    <td><?= $vers->id ?></td>
                                    <td><?= $vers->abonnement_id ?></td>
                                    <td><?= $vers->date_versement ?></td>
                                    <td><?= $vers->montant ?></td>
                                    <td><?= $vers->commentaire ?></td>
                                    <td style='text-align:center;'>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail"  onclick="detail_verse(<?=$vers->id ?>, <?= $_GET['abonnement'] ?>);"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modifier_vers" onclick="modifier_verse(<?= $vers->id ?>, <?= $_GET['abonnement'] ?>, <?= $_GET['adherent'] ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>


<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="../../web/asset/jquery-confirm/jquery.confirm.js"></script>
<script src="../../assets/script/traitement.js"></script>


<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : true,
            "sSearch":         "Rechercher&nbsp;:",
            "lengthMenu": [[7, 14, 28, -1], [7, 14, 28, "Afficher tout"]],
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
            }
        });

//    $(".confirm").confirm({
//        title:"Voulez-vous confirrmer",
//        text:"ëtes vous sur de vouloir supprimer cette abonnement",
//        confirm: function(button) {
//            //alert("You just confirmed.");
//        },
//        cancel: function(button) {
//            //alert("You aborted the operation.");
//        },
//        cancelButton: "Annuler",
//        confirmButton: "Supprimer"
//    });

    $('#example1').on("click", ".confirm", function(e){
        e.preventDefault();
        $link = $(this);
        console.log($link);
        var rowData = $('#example1').DataTable().row($link.closest('tr')).data();
        var id = rowData[0];
        $.confirm({
            text: "Etes-vous sûr de vouloir suprrimer ce versement",
            confirmButton: "Supprimer",
            cancelButton: "Annuler",
            confirm: function(data) {
                console.log(id);

                $.post("scripts/supprimer_vers.php", { id_vers: id}, function (data) {
                    if(data['result'] === 'success') {
                        $("#success").html("La supression s'est effectuer avec succée").show();
                        setTimeout(function() { window.location.reload() },5000);
                    }
                    else{
                        $("#error").html("Erreur lors de la supression").show();
                        setTimeout(function() { window.location.reload() },5000);
                    }
                }, 'json');
            }
        });
    });

    });


</script>

