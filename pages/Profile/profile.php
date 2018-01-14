<?php
/**
 * Created by PhpStorm.
 * User: seck
 * Date: 13/08/17
 * Time: 14:07
 */

include_once "../../assets/class/includes/header.php"
?>
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                    <li><a href="#">Adherent</a></li>
                    <li class="active">Espace uitilisateur</li>
            </ol>
            <h1>Bienvenu Monsieur <?= ucfirst($_SESSION['utilisateur']['nom']) ?> <?= strtoupper($_SESSION['utilisateur']['prenom']) ?>
        </section>

        <br><br>
        <section class="content">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Minimal</label>


                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="input-folder-2">Upload All Files From Folder</label>
                            <div class="file-loading">
                                <input id="input-folder-2" name="input-folder-2[]" type="file" multiple webkitdirectory accept="image/*">
                            </div>
                            <div id="errorBlock" class="help-block"></div>
                            <script>
                                $(document).on('ready', function() {
                                    $("#input-folder-2").fileinput({
                                        browseLabel: 'Select Folder...',
                                        previewFileIcon: '<i class="fa fa-file"></i>',
                                        allowedPreviewTypes: null, // set to empty, null or false to disable preview for all types
                                        previewFileIconSettings: {
                                            'doc': '<i class="fa fa-file-word-o text-primary"></i>',
                                            'xls': '<i class="fa fa-file-excel-o text-success"></i>',
                                            'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                                            'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
                                            'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
                                            'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
                                            'htm': '<i class="fa fa-file-code-o text-info"></i>',
                                            'txt': '<i class="fa fa-file-text-o text-info"></i>',
                                            'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
                                            'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
                                        },
                                        previewFileExtSettings: {
                                            'doc': function(ext) {
                                                return ext.match(/(doc|docx)$/i);
                                            },
                                            'xls': function(ext) {
                                                return ext.match(/(xls|xlsx)$/i);
                                            },
                                            'ppt': function(ext) {
                                                return ext.match(/(ppt|pptx)$/i);
                                            },
                                            'jpg': function(ext) {
                                                return ext.match(/(jp?g|png|gif|bmp)$/i);
                                            },
                                            'zip': function(ext) {
                                                return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                                            },
                                            'htm': function(ext) {
                                                return ext.match(/(php|js|css|htm|html)$/i);
                                            },
                                            'txt': function(ext) {
                                                return ext.match(/(txt|ini|md)$/i);
                                            },
                                            'mov': function(ext) {
                                                return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                                            },
                                            'mp3': function(ext) {
                                                return ext.match(/(mp3|wav)$/i);
                                            },
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    </section>

        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include_once "../../assets/class/includes/footer.php" ?>

