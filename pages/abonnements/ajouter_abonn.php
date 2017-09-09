<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
include_once "../../assets/class/includes/header.php";


// recuperation de l'adherent en cours
$this_adherents = (new Adherent())->AdherentById($_GET['id']);
// recuperation de la liste des activites
$activite = (new Activite())->AllActivite();
// recuperation de tout les types abonnements
$type_abonnement = (new Activite())->AllTypeabonnement();
// recuperation de tout les types de paiement
$type_paiem = (new Activite())->AllTypePaiement();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>Abonnement de <?= ($this_adherents->sexe == "H")?"Mr.":"Mme." ?> <?= $this_adherents->nom_adherent ." ". $this_adherents->prenom_adherent ?></b></h1>
        <ol class="breadcrumb">
            <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="ajouter_abonn.php">Abonnement</a></li>
            <li class="active">Ajouter un abonnement</li>
        </ol>
    </section>


    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <form action="scripts/ajout_abonnement.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Certificat:</label>
                                <div class="input-group">
                                    <label>
                                        &nbsp; Oui &nbsp;
                                        <input type="radio" name="certificat" class="flat-red" value="Oui" <?= ($this_adherents->certificat == "O")?"checked":"" ?>>
                                    </label>
                                    <label>
                                        &nbsp; Non &nbsp;
                                        <input type="radio" name="certificat" value="Non" class="flat-red" <?= ($this_adherents->certificat == "N")?"checked":"" ?>>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date de certificat:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" placeholder="saisir la date du certfificat" name="date_certificiat" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Activité choisis</label>
                                    <select class="form-control select2" style="width: 100%;" required name="activite">
                                        <option selected="selected">Choissiez le type d'activité</option>
                                        <?php foreach ($activite as $activ) { ?>
                                        <option value="<?= $activ->id ?>"><?= $activ->nom_activite ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Type d'abonnement</label>
                                <select class="form-control select2" style="width: 100%;" required name="type_abonn">
                                    <option selected="selected">Choissiez le type d'abonnement</option>
                                    <?php foreach ($type_abonnement as $type) { ?>
                                        <option value="<?= $type->id ?>"><?= $type->type_abonnement ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date d'abonnement:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="date_abonn" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Durée d'abonnement:</label>
                                <div class="input-group">
                                    <label>
                                        3 mois &nbsp;
                                        <input type="radio" name="duree_abonne" class="flat-red" value="trois">
                                    </label>
                                    <label>
                                        &nbsp; 6 mois &nbsp;
                                        <input type="radio" name="duree_abonne" class="flat-red" value="six">
                                    </label>
                                    <label>
                                        &nbsp; 12 mois &nbsp;
                                        <input type="radio" name="duree_abonne" class="flat-red" value="douze">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Montant total l'abonnement:</label>
                                <input type="text" class="form-control" name="montant" placeholder="Montant d'abonnement" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row marginBottom-20">
                                <div class="col-md-11 col-xs-11">
                                    <label>Versement</label>
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
                                    <label for="lastname" class="form-control-label col-md-4 marginLeft-10">Montant </label>
                                    <div class="col-md-7 col-xs-11"><input type="text" name="versement[0][montant]" class="form-control" value="" placeholder="Nom"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="firstname" class="form-control-label col-md-4 marginLeft-10">Date de versement</label>
                                    <div class="col-md-7 col-xs-11"><input type="text" name="versement[0][date_verse]" class="form-control pull-right" id="datepicker" placeholder="saisir la date du certfificat" name="date_certificiat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quality" class="form-control-label col-md-4 marginLeft-10">Type de paiement</label>
                                    <div class="col-md-7 col-xs-11">
                                        <input type="text" class="form-control pull-right" name="versement[0][type_paie]" id="datepicker" placeholder="saisir la date du certfificat" name="date_certificiat" required>
                                    </div>
                                </div>
                            </div>
                            <!-- The template for adding new field -->

                            <div class="form-group hidden marginLeft-10" id="contactTemplate"><hr/>
                                <div class="form-group row">
                                    <label for="name" class="form-control-label col-md-4">Montant</label>
                                    <div class="col-md-6 col-xs-11"><input type="text" class="form-control" name="montant" placeholder="Nom"></div>
                                    <div class="col-xs-1"><button type="button" class="btn btn-danger btn-sm btn removeButton"><i class="fa fa-minus"></i></button></div>
                                </div>
                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 form-control-label">Date de versement</label>
                                    <div class="col-md-7 col-xs-11"><input type="text" class="form-control pull-right" id="datepicker" name="date_verse" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quality" class="col-md-4 form-control-label">Type de paiement</label>
                                    <div class="col-md-7 col-xs-11"><input type="text" class="form-control pull-right" id="datepicker" name="type_paie" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm btn-block" value="Ajouter" />
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
            .find('[name="type_paie"]').attr('name', 'versement[' + contactIndex + '][type_paie]').end();

        $('.removeButton').click(function () {
            var $row = $(this).parents('.form-group'),
                index = $row.attr('data-contact-index');
            // Remove element containing the fields
            $row.remove();
        });
    });
</script>


