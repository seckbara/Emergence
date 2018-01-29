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
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Choisir un mois</label>
                                <select class="form-control select2" style="width: 100%;" required name="type_abonn">
                                    <?php foreach ($annee as $a) {
                                        ?>
                                        <option selected="selected" value="<?= $a->id ?>"><?= $a->month ?></option>
                                        <?php
                                    } ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm">Rechercher</button>
                        </div>
                    </div>
                    <br>
                    <!-- commencememnt du datatable -->
                        <table id="example1" class="table table-bordered table-striped"><br>
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
                            </tbody>
                        </table>
                    <!-- Fin du datatable -->

                </div>
            </div>
        </section>
    </div>




<?php include_once "../../assets/class/includes/footer.php" ?>
<script type="text/javascript" src= "https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src= "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
            }
        })
    });


</script>
