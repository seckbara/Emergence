<?php
/**
 * Created by PhpStorm.
 * User: seck
 * Date: 13/08/17
 * Time: 14:07
 */

include_once "../../assets/class/includes/header.php"
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<!-- ajout de jquery step -->
<link rel="stylesheet" href="../../bower_components/smartwizard/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../bower_components/smartwizard/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Renouveller un abonnement</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="#">Adherent</a></li>
                <li class="active">Historique des adherents</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div id="smartwizard">
                <ul>
                    <li><a href="#step-1"><h2>Etape 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><br /></a></li>
                    <li><a href="#step-2"><h2>Etape 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><br /></a></li>
                    <li><a href="#step-3"><h2>Etape 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><br /></a></li>
                    <li><a href="#step-4"><h2>Etape 4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><br /></a></li>
                </ul>

                <div>
                    <div id="step-1" class="">
                        <input type="text" class="form-control"><br>
                        <input type="text" class="form-control"><br>
                        <input type="text" class="form-control"><br>
                        <input type="text" class="form-control"><br>
                    </div>
                    <div id="step-2" class="">
                        Step Content
                    </div>
                    <div id="step-3" class="">
                        <input type="text" class="form-control"><br>
                        <input type="text" class="form-control"><br>
                        <input type="text" class="form-control"><br>
                        <input type="text" class="form-control"><br>
                    </div>
                    <div id="step-4" class="">
                        Step Content
                    </div>
                </div>
            </div>        <!-- /.content -->
        </section>
    </div>
    <!-- /.content-wrapper -->


<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../../bower_components/smartwizard/dist/js/jquery.smartWizard.min.js"></script>


<script>
    $(document).ready(function(){
        $('#smartwizard').smartWizard();
    });
</script>
