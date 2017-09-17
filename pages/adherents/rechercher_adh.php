<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
include_once "../../assets/class/includes/header.php";

$adherent = new Adherent();
$adherents = $adherent->Alladherent();
//dump($adherents);
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Formulaire de recherche d'adherent</h1>
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

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id adherents</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach($adherents as $adherent): ?>
                                <tr>
                                    <td><?= $adherent['id'] ?></td>
                                    <td><?= $adherent['nom_adherent'] ?></td>
                                    <td><?= $adherent['prenom_adherent'] ?></td>
                                    <td><?= $adherent['date_naissance'] ?></td>
                                    <td><?= $adherent['adresse'] ?></td>
                                    <td><?= $adherent['tel'] ?></td>
                                    <td><?= $adherent['email'] ?></td>
                                    <td style='text-align:center;'>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id adherents</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date de naissance</th>
                                    <th>Ville</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
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

<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            "lengthMenu": [[7, 14, 28, -1], [7, 14, 28, "Afficher tout"]]
        })
    })
</script>
