<?php
require_once '../../vendor/autoload.php';

include_once "../../assets/class/includes/header.php";

use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Versement;
use Emergence\Villes;
use Emergence\Activite;


$adherent = (new Adherent())->AdherentById($_GET['adherent']);
$abonnement = (new Abonnement())->AbonnementById($_GET['abonnement']);
$versement = (new Versement())->VersementById($_GET['abonnement']);
$villes = (new Villes())->AllVilles();
$type_abonnement = (new Activite())->AllTypeabonnement();
$activite = (new Activite())->AllActivite();
$date = new Abonnement();

?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Renouveller un abonnement</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="#">Adherent</a></li>
                <li class="active">Renouvellement</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form id="renouveller_abonnement" action="post">
                <div>
                    <h3>Adherent</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" value="<?= $adherent->nom_adherent ?>" name="nom_adherent" placeholder="Saisir le nom de l'adherent"  required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" value="<?= $adherent->prenom_adherent ?>" name="nom_adherent" placeholder="Saisir le prenom"  required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date de naissance</label>
                                    <input type="text" class="form-control" value="<?= $adherent->date_naissance ?>" name="nom_adherent" placeholder="Saisir la date de naissance" readonly required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ville</label>
                                    <select class="form-control select2" style="width: 100%;" required name="ville">
                                        <?php foreach ($villes as $ville): ?>
                                            <option value="<?= $ville->id_ville ?>" <?= ($adherent->ville == $ville->id_ville)?"selected":"" ?>><?= $ville->ville ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" value="<?= $adherent->tel ?>" name="nom_adherent" placeholder="Saisir le numéro de téléphone" readonly required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control"  value="<?= $adherent->email ?>" name="nom_adherent" placeholder="Saisir l'adresse email" required/>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Abonnment</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date de certificat</label>
                                    <input type="text" class="form-control" value="<?= $abonnement->date_certificat ?>" id="datepicker" name="nom_adherent" placeholder="Saisir la date de certificat" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type d'abonnement</label>
                                    <select class="form-control select2" style="width: 100%;" required name="type_abonn">
                                        <?php foreach ($type_abonnement as $type) {
    ?>
                                            <option selected="selected" value="<?= $type->id ?> <?= ($type->id == $abonnement->type_abonnement)?"selected":"" ?>"><?= $type->type_abonnement ?></option>
                                        <?php
} ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date d'abonnement</label>
                                    <input type="text" class="form-control" value="<?= $date->getDateAbonnement(); ?>" name="nom_adherent" placeholder="Saisir la date d'abonnement" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Montant</label>
                                    <input type="text" class="form-control" value="<?= $abonnement->montant ?>" name="nom_adherent" placeholder="Saisir le montant" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Activité choisis</label>
                                    <select class="form-control select2" style="width: 100%;" required name="activite">
                                        <?php foreach ($activite as $activ) {
        ?>
                                            <option selected="selected" value="<?= $activ->id ?>"><?= $activ->nom_activite ?></option>
                                        <?php
    } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durée d'abonnement:</label>
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
                    </section>
                    <h3>Versements</h3>
                    <section>
                        <div class="col-md-12">
                            <div id="contactForm">
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group row">
                                    <div class = "col-md-4"><input type="number" min="0" name="montant" class="form-control" value="" placeholder="Saisir le montant du versement"></div>
                                    <div class = "col-md-4"><input type="text" name="date_versement" id="datepicker" class="form-control" placeholder="Saisir la date du versement"></div>
                                    <div class = "col-md-4"><textarea name="commentaire" rows="5" cols="5" class="form-control" value="" placeholder="Saisir votre commentaire"></textarea></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Liste des versements</h3>
                    <section>
                        <div class="col-md-12">
                            <div id="contactForm">
                                <div class="form-group row">

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </section>
    </div>
    <!-- /.content-wrapper -->

<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="../../web/asset/jquery.steps/build/jquery.steps.js"></script>
<!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->
<script src="../../web/asset/jquery-validation/dist/jquery.validate.js"></script>


<script>
    var form = $("#renouveller_abonnement");

//    var settings = {
//        labels: {
//            current: "current step:",
//            pagination: "Pagination",
//            finish: "Finish",
//            next: "Next",
//            previous: "Previous",
//            loading: "Loading ..."
//        }
//    };
//
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        labels: {
            current: "current step:",
            pagination: "Pagination",
            finish: "Valider",
            next: "Suivant",
            previous: "Précédent",
            loading: "Loading ..."
        },
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }
    });
</script>
