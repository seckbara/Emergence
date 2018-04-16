<?php
error_reporting(0);
include_once "../../assets/class/includes/header.php";

use Emergence\Abonnement;

$listings = (Abonnement::listing());

?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>LISTING DES SOMMES RESTANTS DUES</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i><b>Accueil</b></a></li>
                <li><a href="#"><b>Devis</b></a></li>
                <li class="active"><b>Listing</b></li>

            </ol>
            <br>
            <div id="chart-1"><!-- Fusion Charts will render here--></div><br><br>
            <div id="chart-2"><!-- Fusion Charts will render here--></div>
        </section>

        <section class="content">
            <div class="box box-default">
                <div class="box-body">
                    <table id="listing" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nom - Prénom</th>
                            <th>Date de naissance</th>
                            <th>Inscription</th>
                            <th>Reste d&ucirc;</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  foreach ($listings as $listing): ?>
                            <?php if ($listing->difference != 0): ?>
                                <td><?= $listing->nom_adherent ?>    <?= $listing->prenom_adherent ?></td>
                                <td><?= $listing->date_naissance ?></td>
                                <td><?= $listing->date_abonnement ?></td>
                                <td><?= $listing->difference ?>  €</td>
                                <td style='text-align:center;'>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail" onclick=""><i class="fa fa-eye" aria-hidden="true"></i></button>
                                </td>
                            <?php endif; ?>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nom - Prénom</th>
                            <th>Date de naissance</th>
                            <th>Inscription</th>
                            <th>Reste d&ucirc;</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
        </section>

    </div>

<?php include_once "../../assets/class/includes/footer.php" ?>

<script>

    $('#listing').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        "sSearch":         "Rechercher&nbsp;:",
        "lengthMenu": [[6, 12, 24], [6, 12, 24, "Afficher tout"]],
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




