<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
include_once "../../assets/class/includes/header.php";

$adherent = new Adherent();
//dump($_GET['id']);
//exit();
$this_adherents = $adherent->AdherentById($_GET['id']);
//dump($this_adherents);
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
                                        <option selected="selected">Le Havre</option>
                                        <option>Rouen</option>
                                        <option disabled="disabled">Evreaux</option>
                                        <option>Dauville</option>
                                        <option>Caucrioville</option>
                                        <option>Triter</option>
                                        <option>Harfleur</option>
                                    </select>                                </div>
                            </div>
                            <div class="form-group">
                                <label>Type d'abonnement</label>
                                <select class="form-control select2" style="width: 100%;" required name="type_abonn">
                                    <option selected="selected">Le Havre</option>
                                    <option>Rouen</option>
                                    <option disabled="disabled">Evreaux</option>
                                    <option>Dauville</option>
                                    <option>Caucrioville</option>
                                    <option>Triter</option>
                                    <option>Harfleur</option>
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
                                        <input type="radio" name="certificat" class="flat-red" value="trois">
                                    </label>
                                    <label>
                                        &nbsp; 6 mois &nbsp;
                                        <input type="radio" name="certificat" class="flat-red" value="six">
                                    </label>
                                    <label>
                                        &nbsp; 12 mois &nbsp;
                                        <input type="radio" name="certificat" class="flat-red" value="douze">
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
                            <div class="form-group">
                                <label<>Versements: </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" class="form-control" name="versement" placeholder="Montant" />
                                    <input type="text" class="form-control" name="versement" placeholder="date de versement"/>
                                    <select class="form-control select2" style="width: 100%;"  name="type_abonn">
                                        <option selected>Type d'abonnement</option>
                                        <option>Caucrioville</option>
                                        <option>Triter</option>
                                    </select>
                                    <select class="form-control select2" style="width: 100%;"  name="type_abonn">
                                        <option selected>Type de paiement</option>
                                        <option>Triter</option>
                                        <option>Harfleur</option>
                                    </select>
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


