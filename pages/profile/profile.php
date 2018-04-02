<?php
error_reporting(0);
require '../../vendor/autoload.php';
include_once "../../assets/class/includes/header.php";
use Emergence\Utilisateurs;

$current_user = (new Utilisateurs())->getUsers($_SESSION['utilisateur']['id']);
$allUser = (new Utilisateurs())->getAllUsers();
//dump($current_user->chemin);
?>
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

<style>
    .kv-avatar ,.kv-avatar{
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar {
        display: inline-block;
    }
    .kv-avatar {
        display: table-cell;
        width: 213px;
    }
</style>

    <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i><b>Accueil</b></a></li>
                    <li><a href="#"><b>Profile</b></a></li>
                    <li class="active"><b>Esapce utilisateur</b></li>
            </ol>
            <h1>Bienvenu <?= $_SESSION['utilisateur']['nom'] ?>  <?= $_SESSION['utilisateur']['prenom']  ?></h1><br><br>

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
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                <div class="row">
                    <form class="form form-vertical" id="avatar" action="scripts/saveImage.php" method="post" enctype="multipart/form-data">
                            <div class="col-md-4">
                                <input type="hidden" class="form-control pull-right" name="id" value="<?= $current_user->id ?>">
                                <input type="text" class="form-control pull-right" name="nom" value="<?= $current_user->lastname ?>" readonly>
                                <input type="text" class="form-control pull-right" name="prenom" value="<?= $current_user->username ?>" readonly>
                                <div class="box box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">Changer votre photo de profil</h3>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2 text-center">
                                            <div class="kv-avatar">
                                                <div class="file-loading">
                                                    <input id="avatar-1" name="avatar-1" type="file" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="text-center">
                                            <input type="submit" class="btn-block btn-sm btn-success" value="Enregistrer"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                    </form>

                    <div class="col-md-8">
                        <div class="box box-info">

                            <div class="box-header">
                                <h3 class="box-title">Modifier vos information personelle :</h3>
                            </div>

                            <div class="alert alert-success" role="alert" id="success" style="display: none">
                                L'enregistrement s'est bien effectué
                            </div>

                            <div class="alert alert-error" role="alert" id="error" style="display: none">
                                Les modification ne sont pas prises en compte.
                            </div>

                            <div class="box-body">

                                <form id="formulaire">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control pull-right" name="nom" value="<?= $current_user->lastname ?>" readonly>
                                        <input type="hidden" class="form-control pull-right" name="id" value="<?= $current_user->id ?>">
                                    </div><br><br>

                                    <div class="form-group">
                                        <label>Prenom</label>
                                        <input type="text" class="form-control pull-right" name="prenom" value="<?= $current_user->username ?>" readonly>
                                    </div><br><br>

                                    <div class="form-group">
                                        <label>Adresse Email</label>
                                        <input type="email" class="form-control pull-right" name="email" value="<?= $current_user->email ?>" >
                                    </div><br><br>

                                    <div class="form-group">
                                        <label>Rôle</label>
                                        <select class="form-control select2" style="width: 100%;" required name="role">
                                                <option value="visiteur" <?= ($current_user->role == "visiteur")?"selected":"" ?>>visiteur</option>
                                                <option value="admin" disabled>admin</option>
                                                <option value="editeur" <?= ($current_user->role == "editeur")?"selected":"" ?>>editeur</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control pull-right" name="mp" value="<?= $current_user->passw ?>" >
                                    </div><br><br>

                                    <div class="form-group">
                                        <label>Confirmation de mot de passe</label>
                                        <input type="password" class="form-control pull-right" name="cmp" value="<?= $current_user->passw ?>" >
                                    </div><br><br><br>
                                    <button type="button" class="btn-block btn-sm btn-success formulaire"> Valider</button>

                                </form>
                                </div>
                            </div>

                        </div>

                    <div class="col-md-4">
                        <div class="box box-info">

                            <div class="box-header">
                                <h3 class="box-title">Envoyer un message :</h3>
                            </div>

                            <div class="box-body">

                                <form id="message">
                                    <div class="form-group">
                                        <label>Sujet :</label>
                                        <input type="text" class="form-control pull-right" placeholder="Saisir le sujet du message" name="sujet" value="" >
                                        <input type="hidden"name="current_id" value="<?= $current_user->id ?>" >
                                    </div><br><br>

                                    <div class="form-group">
                                        <label>Destinataire :</label>
                                        <select class="form-control select2" style="width: 100%;" required name="destinataire">
                                            <?php foreach ($allUser as $user): ?>
                                                <option value="<?= $user->id ?>"><?= $user->email ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Message :</label>
                                        <textarea rows="2" cols="2" placeholder="Saisissez votre message" type="text" class="form-control pull-right" name="message" value="" ></textarea>
                                    </div><br><br><br>

                                    <div class="form-group">
                                        <button type="button" class="btn-block btn-sm btn-primary message"> Envoyer</button>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>


                </div>
        </section>
    </section>

    </div>


<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="../../web/asset/bootstrap-fileinput/js/locales/fr.js"></script>

<script>

    $(".formulaire").on("click", function() {
        $('#modal-default').modal('show');

        $.post( "scripts/saveUsers.php",$( "#formulaire" ).serialize(), function( datas ) {
            console.log(datas.result);
            if(datas.result == "success"){
                $('#error').hide();
                $('#success').show();
            }
            else{
                $('#success').hide();
                $('#error').show();
            }
            console.log(datas);
            $('#modal-default').modal('hide');
        }, "json");

    });


    $(".message").on("click", function() {
        $('#modal-default').modal('show');

        $.post( "scripts/sendMessage.php",$( "#message" ).serialize(), function( datas ) {
            console.log(datas.result);
            if(datas.result == "success"){
                $('#error').hide();
                $('#success').show();
            }
            else{
                $('#success').hide();
                $('#error').show();
            }
            console.log(datas);
            $('#modal-default').modal('hide');
        }, "json");

    });

    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
        '' +
        '' +
        '</button>';
    $("#avatar-1").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        <?php if ($current_user->chemin != ""): ?>
        initialPreview: [
            "<img class='kv-preview-data file-preview-image' src='<?= $current_user->chemin ?>' width='300px'>"
        ],
        <?php endif; ?>
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        <?php if ($current_user->chemin == ""): ?>
        defaultPreviewContent: '<img src="../../dist/img/default.png" width="380" height="380" alt="Your Avatar">',
        <?php endif; ?>
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
</script>

