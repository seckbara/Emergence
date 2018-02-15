<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Functions;

include_once "../../assets/class/includes/header.php";

$adherent = new Adherent();
$adherents = $adherent->Alladherent();
$allabonnement = (new Abonnement())->AllabonnementByAdherent();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Formulaire de recherche abonnement</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <div class="callout bg-info text-white hidden">
                            <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
                                and the content will slightly differ than that of the normal layout.</p>
                        </div>
                    </div>

                    <div class="modal fade" id="detail">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Détail de l'adherent</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Contenu du modal</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modifier_abonn">
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

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Identifiant</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Date de certificat</th>
                                <th>Presence certificat</th>
                                <th>Date d'abonnement</th>
                                <th>Montant</th>
                                <th>Durée d'abonnement</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <th>Quartier</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($allabonnement as $abonnement): ?>
                                <?php $adh = (new Adherent())->AdherentById($abonnement->id_adherent) ?>
                                <?php
                                $formatdate = new Functions();
                                if (!empty($abonnement->date_abonnement)) {
                                    $date = date_parse($abonnement->date_abonnement);
                                    $date_fin = $formatdate->DureeAbonnement($date['year'], $date['month'], $date['day'], $abonnement->duree_abonnement);
                                } else {
                                    $date = "";
                                    $date_fin = "";
                                }
                                ?>
                                <tr <?php if (strtotime((new DateTime())->format('d-m-Y')) > strtotime(((new Functions())->Date_Format_Fr($date_fin)))) {
                                    echo "style=\"background-color: red\"" ;
                                } else {
                                    echo "";
                                }?>>
                                    <td><?= $abonnement->id ?></td>
                                    <td><?= $adh->nom_adherent ?></td>
                                    <td><?= $adh->prenom_adherent ?></td>
                                    <td><?= $abonnement->date_certificat ?></td>
                                    <td><?= ($abonnement->date_certificat = "N")?"<p class=\"text-danger\">Non</p>":"Oui" ?></td>
                                    <td><?= $abonnement->date_abonnement ?></td>
                                    <td><?= $abonnement->montant ?> &euro;</td>
                                    <td><?= $abonnement->duree_abonnement ?> mois</td>
                                    <td><?= $adh->email ?></td>
                                    <td><?= ($adh->sexe = "H")?"Homme":"Femme" ?></td>
                                    <td><?= $adh->quartier ?></td>
                                    <td style='text-align:center;'>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail" onclick="detail_abonn(<?=$abonnement->id ?>,<?=$abonnement->id_adherent ?>,<?=$abonnement->id ?>);"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modifier_abonn"  onclick="update_abonn(<?= $abonnement->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<!--                                        <button type="button" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>https://github.com/rstaib/jquery-steps-->
                                        <a href="detail_abonnement.php?abonnement=<?=  $abonnement->id;?>&amp;adherent=<?= $abonnement->id_adherent ?>" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                        <?php if (strtotime((new DateTime())->format('d-m-Y')) > strtotime(((new Functions())->Date_Format_Fr($date_fin)))): ?>
                                        <a href="traiter_abonnement.php?abonnement=<?=  $abonnement->id;?>&amp;adherent=<?= $abonnement->id_adherent ?>" class="btn btn-default"><i class="fa fa-files-o" aria-hidden="true"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Date de certificat</th>
                                <th>Presence certificat</th>
                                <th>Montant</th>
                                <th>Type de paiement</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <th>Quartier</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="../../assets/script/traitement.js"></script>
<script src="../../web/asset/jquery-confirm/jquery.confirm.js"></script>


<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "sSearch":         "Rechercher&nbsp;:",
            "lengthMenu": [[16, 20, 28, -1], [16, 20, 28, "Afficher tout"]],
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
        })
    });

    $(".confirm").confirm({
        title:"Voulez-vous confirrmer",
        text:"ëtes vous sur de vouloir supprimer cette abonnement",
        confirm: function(button) {
            //alert("You just confirmed.");
        },
        cancel: function(button) {
            //alert("You aborted the operation.");
        },
        cancelButton: "Annuler",
        confirmButton: "Supprimer"
    });

</script>
