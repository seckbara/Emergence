<?php
error_reporting(0);
require_once '../../vendor/autoload.php';
include_once "../../assets/class/includes/header.php";

use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Versement;

$abonnement  = new Abonnement();
$abonnement->setId($_GET['abonnement']);
$listings = $abonnement->listingByAbonnement();
$adherent = $_GET['adherent'];
$versement = (new Versement())->VersementById($abonnement->getId());
$abonnement = (new Abonnement())->AbonnementById($abonnement->getId());
$adherent = (new Adherent())->AdherentById($adherent);
$situation = (new Adherent())->SituationById($adherent->situation);
$type_pai = (new Abonnement())->TypePaiment($abonnement->type_paiement);
$typeactivite= (new Abonnement())->TypeActivite($abonnement->id_activite);
$typeabonn = (new Abonnement())->TypeAbonn($abonnement->type_abonnement);

$difference = $listings[0]->difference;
/* scripts/fiche_adherent.php?adherent=<?= $adherent->id ?>&abonnement=<?= $abonnement->id ?> */
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="rigth">
                <div class="col-md-7" id="notification"></div>
            </h1><br>

            <h1>Détail de l'abonnement de <?= $adherent->nom_adherent.' '.$adherent->prenom_adherent  ?></h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i><b>Accueil</b></a></li>
                <li><a href="#"><b>Abonnement</b></a></li>
                <li class="active"><b>Detail abonnement</b></li>
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

            <div class="modal fade" id="ajout_versement">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title primary">modification de l'adherent</h4>
                        </div>
                        <div class="modal-body">
                            <p>Contenu du modal pour la modification</p>
                        </div>
                        <div class="modal-footer">
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
            <form method="post" id="fiche">
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date d'abonnement :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $abonnement->date_abonnement ?>" readonly/>
                                    <input type="hidden" min="0" class="form-control" id="adherent" name="id_adh" value="<?= $adherent->id ?>"/>
                                    <input type="hidden" min="0" class="form-control" id="abonnement" name="id_abon" value="<?= $abonnement->id ?>"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durée d'abonnement :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $abonnement->duree_abonnement ?> mois" readonly/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Montant en € :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $abonnement->montant ?> €" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Situation :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $situation->situation ?>" readonly/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date de certificat :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $abonnement->date_certificat ?>" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type de paiement :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $type_pai->type ?>" readonly/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type d'activité :</label>
                                    <input type="text" min="0" class="form-control" value="<?= $typeactivite->nom_activite ?>" readonly/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type d'abonnement :</label>
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
                        <table id="versement" class="table table-bordered table-striped">
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
                                    <td><?= $vers->montant ?>  €</td>
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
            <div style="display: none" id="ajout">
                <button type="button"  data-toggle="modal" data-target="#ajout_versement" class="btn btn-primary btn-sm btn-block" onclick="ajout_versement(<?= $abonnement->id ?>);">Completer le versement</button>
            </div><br>

            <div class="text-center">
                <div class="">
                    <a href="rechercher_abon.php" class="btn btn-success btn-sm">Retour à la liste des abonnés</a>&nbsp;
                    <b><a href="#" id="editer" class="btn btn-primary btn-sm">Editer la fiche</a>&nbsp;</b>
                    <a href="#" class="btn btn-info btn-sm">Generer le devis</a>&nbsp;
                </div>
            </div>

            </form>

        </section>
    </div>


<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="../../web/asset/jquery-confirm/jquery.confirm.js"></script>
<script src="../../web/asset/notify/notify.min.js"></script>
<script src="../../assets/script/traitement.js"></script>


<script>
    var adherent = $('#adherent').val();
    var abonnement = $('#abonnement').val();
    var diff = <?= $difference ?>;

    $(function () {
        $('#versement').DataTable({
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

    $('#versement').on("click", ".confirm", function(e){
        e.preventDefault();
        $link = $(this);
        var rowData = $('#versement').DataTable().row($link.closest('tr')).data();
        var id = rowData[0];
        $.confirm({
            text: "Etes-vous sûr de vouloir suprrimer ce versement",
            confirmButton: "Supprimer",
            cancelButton: "Annuler",
            confirm: function(data) {
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

    if(diff != 0){
        $("#ajout").show();
        $("#notification").notify(
            "Il y'a une difference entre la somme total et les sommes versés ",
            {
                position:"right",
                autoHideDelay: 15000,
                elementPosition: 'bottom left',
                globalPosition: 'top right',
                arrowSize: 10,
                className: 'warn',
                gap: 2
            }
        );
    }

    });


</script>

