<?php
include_once "../../assets/class/includes/header.php"
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
            <form id="example-form" action="#">
                <div>
                    <h3>Adherent</h3>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le nom de l'adherent" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le prenom" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date de naissance</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir la date de naissance" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ville</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir la ville" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le numéro de téléphone" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir l'adresse email" required/>
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
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir la date de certificat" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type d'abonnement</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le type d'abonnement" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date d'abonnement</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir la date d'abonnement" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Montant</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le montant" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Activité</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le type d'activité" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durée d'abonnement</label>
                                    <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir la durée d'abonnement" >
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Versements</h3>
                    <section>
                        <div class="col-md-6">
                            <div class="row marginBottom-20">
                                <div class="col-xs-3">
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
                                    <label class="form-control-label col-md-4 marginLeft-10">Montant </label>
                                    <div class="col-md-9 col-xs-11"><input type="number" min="0" name="versement[0][montant]" class="form-control" value="" placeholder="Versement"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4 marginLeft-10">Date de versement</label>
                                    <div class="col-md-9 col-xs-11"><input type="text" name="versement[0][date_verse]" class="form-control pull-right datepicker"  placeholder="saisir la date de versement" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4 marginLeft-10">Commentaire</label>
                                    <div class="col-md-9 col-xs-11">
                                        <textarea type="text" class="form-control pull-right" name="versement[0][commentaire]" rows="3" placeholder="Ajouter un commentaire" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- The template for adding new field -->

                            <div class="form-group hidden marginLeft-10" id="contactTemplate">
                                <div class="form-group row">
                                    <label class="form-control-label col-md-4">Montant</label>
                                    <div class="col-md-6 col-xs-11"><input type="number" min="0" class="form-control" name="montant" placeholder="Nom"></div>
                                    <div class="col-xs-1"><button type="button" class="btn btn-danger btn-sm btn removeButton"><i class="fa fa-minus"></i></button></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 form-control-label">Date de versement</label>
                                    <div class="col-md-7 col-xs-11"><input type="text" class="form-control pull-right datepicker"  name="date_verse" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 form-control-label">Commentaire</label>
                                    <div class="col-md-7 col-xs-11"><textarea type="text" class="form-control pull-right"  name="commentaire" rows="3" placeholder="Ajouter un commentaire" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3>Validation</h3>
                    <section>
                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
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
    var form = $("#example-form");
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
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
