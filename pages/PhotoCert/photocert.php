<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
use Emergence\Adherent;
use Emergence\Abonnement;
include_once "../../assets/class/includes/header.php";
$adherent = new Adherent();
$adherents = $adherent->Alladherent();
$all_abonnement = (new Abonnement())->AllAbonnement();

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>PHOTOS & CERTIFICAT</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><b>Accueil</b></a></li>
            <li><a href="#"><b>PhotoCert</b></a></li>
            <li class="active"><b>Photo / Cretificat</b></li>

        </ol>
        <br>
        <div id="chart-1"><!-- Fusion Charts will render here--></div><br><br>
        <div id="chart-2"><!-- Fusion Charts will render here--></div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success" style="display: none" id="success"></div>
                <div class="alert alert-danger" style="display: none" id="error"></div>
                <div class="box">
                    <div class="box-header">
                        <div class="callout bg-info text-white hidden">

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
                                <th>Date de naissance</th>
                                <th>Date d'inscription</th>
                                <th>Photo</th>
                                <th>Certificat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($all_abonnement as $all): ?>
                                <tr>
                                    <td><?= $all->id_adherent ?></td>
                                    <td><?= $all->nom_adherent ?></td>
                                    <td><?= $all->prenom_adherent ?></td>
                                    <td><?= $all->date_naissance ?></td>
                                    <td><?= $all->date_abonnement ?></td>
                                    <td style='text-align:center;'>
                                        <img src="<?= $all->chemin_photo ?>" alt="" height="80" width="100" >
                                    </td>
                                    <td style='text-align:center;'>
                                        <a href="<?= $all->chemin_certificat ?>" class="btn btn-default" target="_blank"><i class="fa fa-file fa-5x"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Identifiant</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Date de naissance</th>
                                <th>Date d'inscription</th>
                                <th width="100">photo</th>
                                <th width="100">Certificat</th>
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


</div>

<?php include_once "../../assets/class/includes/footer.php" ?>

<script>
    $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        "lengthMenu": [[6, 14, 28, -1], [6, 14, 28, "Afficher tout"]],
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
</script>

