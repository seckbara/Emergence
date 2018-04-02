<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
use Emergence\Adherent;
include_once "../../assets/class/includes/header.php";
$adherent = new Adherent();
$adherents = $adherent->Alladherent();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Formulaire de recherche d'adherent</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><b>Accueil</b></a></li>
            <li><a href="#"><b>Adherents</b></a></li>
            <li class="active"><b>Rechercher</b></li>
        </ol>
    </section>

    <!-- Main content -->
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

                    <div class="modal fade" id="detail">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title primary">Détail de l'adherent</h4>
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

                    <div class="modal fade" id="modifier">
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
                                <th>Date de naissance</th>
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Numéro Sécu</th>
                                <th>Sexe</th>
                                <th>Commentaire</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($adherents as $adherent): ?>
                                <tr>
                                    <td><?= $adherent['id'] ?></td>
                                    <td><?= $adherent['nom_adherent'] ?></td>
                                    <td><?= $adherent['prenom_adherent'] ?></td>
                                    <td><?= $adherent['date_naissance'] ?></td>
                                    <td><?= $adherent['adresse'] ?></td>
                                    <td><?= $adherent['tel'] ?></td>
                                    <td><?= $adherent['email'] ?></td>
                                    <td><?= $adherent['num_secu'] ?></td>
                                    <td><?= $adherent['sexe'] ?></td>
                                    <td><?= $adherent['commentaire'] ?></td>
                                    <td style='text-align:center;'>
                                        <button type="button" class="btn btn-info" data-title="detail"  data-toggle="modal" data-target="#detail" onclick="detail_adherent(<?= $adherent['id'] ?>);"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modifier"  onclick="update_adherent(<?= $adherent['id'] ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger confirm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        <a href="<?= $adherent['chemin_certificat'] ?>" class="btn btn-default" target="_blank"><i class="fa fa-file"></i></a>
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
                                <th>Adresse</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Numéro Sécu</th>
                                <th>Sexe</th>
                                <th>Commentaire</th>
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
            "lengthMenu": [[12, 14, 28, -1], [12, 14, 28, "Afficher tout"]],
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
    })
    $('#example1').on("click", ".confirm", function(e){
        e.preventDefault();
        $link = $(this);
        console.log($link);
        var rowData = $('#example1').DataTable().row($link.closest('tr')).data();
        var id = rowData[0];
        $.confirm({
            text: "Etes-vous sûr de vouloir suprrimer cet adherent. Sa supression supprimera toute ses abonnements",
            confirmButton: "Supprimer",
            cancelButton: "Annuler",
            confirm: function(data) {
                console.log(id);
                $.post("scripts/ajout_adherent.php", { id_adh: id}, function (data) {
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
</script>