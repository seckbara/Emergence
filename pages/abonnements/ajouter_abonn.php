<?php
ini_set("display_errors", 0);error_reporting(0);
require_once '../../vendor/autoload.php';
use Carbon\Carbon;

include_once "../../assets/class/includes/header.php";
use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Activite;
use Emergence\Functions;
use Emergence\Versement;

// recuperation de l'adherent en cours
$this_adherents = (new Adherent())->AdherentById($_GET['id']);
// recuperation de la liste des activites
$activite = (new Activite())->AllActivite();
// recuperation de tout les types abonnements
$type_abonnement = (new Activite())->AllTypeabonnement();
// recuperation de tout les types de paiement
$type_paie = (new Activite())->AllTypePaiement();
$id_adherent = $_GET['id'];

$today = Carbon::now()->format('d-m-Y');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>Abonnement de <?= ($this_adherents->sexe == "F")?"Mme.":"Mr." ?> <?= $this_adherents->nom_adherent ." ". $this_adherents->prenom_adherent ?></b></h1>
        <ol class="breadcrumb">
            <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="ajouter_abonn.php">Abonnement</a></li>
            <li class="active">Ajouter un abonnement</li>
        </ol>
    </section>


    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <form action="scripts/ajout_abonnement.php" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Certificat :</label>
                                <div class="input-group">
                                    <label>
                                        &nbsp; Oui &nbsp;
                                        <input type="radio" name="certificat" class="flat-red" onclick="show1();" value="Oui" <?= ($this_adherents->certificat == "O")?"checked":"" ?>>
                                    </label>
                                    <label>
                                        &nbsp; Non &nbsp;
                                        <input type="radio" name="certificat" value="Non" onclick="show2();" class="flat-red" <?= ($this_adherents->certificat == "N")?"checked":"" ?>>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date de certificat :</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="hidden" class="form-control pull-right" value="<?= $id_adherent ?>" name="id_adherent" />
                                    <input type="text" class="form-control pull-right datepicker"  placeholder="saisir la date du certfificat" name="date_certificiat" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Activité choisis :</label>
                                    <select class="form-control select2" style="width: 100%;" required name="activite">
                                        <?php foreach ($activite as $activ) {
    ?>
                                        <option selected="selected" value="<?= $activ->id ?>"><?= $activ->nom_activite ?></option>
                                        <?php
} ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Type d'abonnement :</label>
                                <select class="form-control select2" style="width: 100%;" required name="type_abonn">
                                    <?php foreach ($type_abonnement as $type) {
        ?>
                                        <option selected="selected" value="<?= $type->id ?>"><?= $type->type_abonnement ?></option>
                                    <?php
    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date d'abonnement :</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" value="<?= $today ?>"  name="date_abonn" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Durée d'abonnement :</label>
                                <div class="input-group">
                                    <label>
                                        3 mois &nbsp;
                                        <input type="radio" name="duree_abonne" class="flat-red" value="3">
                                    </label>
                                    <label>
                                        &nbsp; 6 mois &nbsp;
                                        <input type="radio" name="duree_abonne" class="flat-red" value="6">
                                    </label>
                                    <label>
                                        &nbsp; 12 mois &nbsp;
                                        <input type="radio" name="duree_abonne" class="flat-red" value="12">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type de debut paiement :</label>
                                <select class="form-control select2" style="width: 100%;" required name="type_paie">
                                    <?php foreach ($type_paie as $types_paiement) {
        ?>
                                        <option selected="selected" value="<?= $types_paiement->id ?>"><?= $types_paiement->type ?></option>
                                    <?php
    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 hide" id="div1">
                            <div class="form-group">
                                <label>Choisir le certficat :</label>
                                <div class="form-group" >
                                    <label class="control-label col-md-3" ><b>Choisir un fichier</b></label>
                                    <div class="controls col-md-9" >
                                        <div class="fileupload fileupload-new" data - provides = "fileupload" >
                                            <input type="file" name ="fichier_cert" class="btn btn-default" id="file" required/>
                                            <div id="errorBlock" class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Montant total l'abonnement :</label>
                                <input type="number" min="0" class="form-control" name="montanttotal" placeholder="Montant d'abonnement" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row marginBottom-20">
                                <div class="col-md-11 col-xs-11">
                                    <label>Versement :</label>
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="btn btn-primary btn-sm addButton"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div><hr/>
                            <div id="contactForm">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4 marginLeft-10">Montant :</label>
                                    <div class="col-md-7 col-xs-11"><input type="number" min="0" name="versement[0][montant]" class="form-control" value="" placeholder="Versement"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4 marginLeft-10">Date de versement :</label>
                                    <div class="col-md-7 col-xs-11"><input type="text" name="versement[0][date_verse]" class="form-control pull-right datepicker"  placeholder="saisir la date de versement" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4 marginLeft-10">Commentaire :</label>
                                    <div class="col-md-7 col-xs-11">
                                        <textarea type="text" class="form-control pull-right" name="versement[0][commentaire]" rows="3" placeholder="Ajouter un commentaire" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- The template for adding new field -->

                            <div class="form-group hidden marginLeft-10" id="contactTemplate">
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4">Montant :</label>
                                    <div class="col-md-6 col-xs-11"><input type="number" min="0" class="form-control" name="montant" placeholder="Nom"></div>
                                    <div class="col-xs-1"><button type="button" class="btn btn-danger btn-sm btn removeButton"><i class="fa fa-minus"></i></button></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 form-control-label">Date de versement :</label>
                                    <div class="col-md-7 col-xs-11"><input type="text" class="form-control pull-right datepicker"  name="date_verse" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 form-control-label">Commentaire :</label>
                                    <div class="col-md-7 col-xs-11"><textarea type="text" class="form-control pull-right"  name="commentaire" rows="3" placeholder="Ajouter un commentaire" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm btn-block" value="Ajouter" <?= (isset($_GET['id']))? "" : "disabled" ?>/>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
</div>

<?php include_once "../../assets/class/includes/footer.php" ?>

<script>
    var contactIndex = 0;
    $('.addButton').click(function () {
        //debugger;
        contactIndex++;
        var $template = $('#contactTemplate'),
            $clone = $template
                .clone()
                .removeClass('hidden')
                .removeAttr('id')
                .attr('data-contact-index', contactIndex)
                .insertBefore($template);

        // Update the name attributes
        $clone
            .find('[name="montant"]').attr('name', 'versement[' + contactIndex + '][montant]').end()
            .find('[name="date_verse"]').attr('name', 'versement[' + contactIndex + '][date_verse]').end()
            .find('[name="commentaire"]').attr('name', 'versement[' + contactIndex + '][commentaire]').end();


        $('.removeButton').click(function () {
            var $row = $(this).parents('.form-group'),
                index = $row.attr('data-contact-index');
            // Remove element containing the fields
            $row.remove();
        });
    });

    //Date picker
    $('.datepicker').datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        numberOfMonths: 1
    });

    $("#file").fileinput({
        showUpload: false,
        showPreview: false,
        maxFileSize: 5000,
        allowedFileExtensions: ["pdf"],
        elErrorContainer: "#errorBlock",
        removeLabel: "Supprimer",
        browseLabel: "Charger la fiche",
        language: "fr"
    });

    function show1(){
        alert('ici');
        console.log('ici');
        document.getElementById('div1').style.display ='none';
    }
    function show2(){
        document.getElementById('div1').style.display = 'block';
    }

</script>
