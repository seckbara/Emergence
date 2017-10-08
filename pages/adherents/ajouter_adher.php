<?php
require_once '../../vendor/autoload.php';
use Carbon\Carbon;
include_once "../../assets/class/includes/header.php";

$ville = new Villes;
$villes = $ville->AllVilles();
$situations = (new Adherent())->AllSituation();
//dump($situations);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><b>Formulaire d'ajout d'adherent</b></h1>
        <ol class="breadcrumb">
            <li><a href="../../index.html"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li><a href="ajouter_adher.php">Adherent</a></li>
            <li class="active">Ajouter un adherent</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <form action="scripts/ajout_adherent.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="nom_adherent" placeholder="Saisir le nom de l'adherent" required/>
                            </div>
                            <div class="form-group">
                                <label>Date de naissance:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" placeholder="saisir la date" name="date_naissance" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" class="form-control" name="prenom_adherent" placeholder="Saisir le prenom de l'adherent" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ville</label>
                                <select class="form-control select2" style="width: 100%;" required name="ville">
                                    <?php foreach ($villes as $ville): ?>
                                    <option value="<?= $ville->id_ville ?>"><?= $ville->ville ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sexe &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <div class="input-group">
                                    <label>
                                        Homme &nbsp;
                                        <input type="radio" name="sexe" class="flat-red" value="H" checked>
                                    </label>
                                    <label>
                                        &nbsp; Femme &nbsp;
                                        <input type="radio" name="sexe" class="flat-red" value="F">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro de Téléphone</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control"  required name="tel">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" class="form-control" name="adresse" placeholder="Saisir l'adresse" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse Email:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" class="form-control" name="email" placeholder="Saisir l'adresse email" required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Certificat: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <div class="input-group">
                                    <label>
                                        Oui &nbsp;
                                        <input type="radio" name="certificat" value="O" class="flat-red" >
                                    </label>
                                    <label>
                                        &nbsp; Non &nbsp;
                                        <input type="radio" name="certificat" value="N" class="flat-red" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Situation Professionnel</label>
                                    <select class="form-control select2" style="width: 100%;" name="situation" required>
                                        <?php foreach ($situations as $situation): ?>
                                            <option value="<?= $situation['id'] ?>"><?= $situation['situation'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quartier</label>
                                <select class="form-control select2" style="width: 100%;" name="quartier" required>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro de sécurité social</label>
                                <input type="text" class="form-control pull-right" placeholder="Numéro de sécurité social" name="num_secu" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type de document</label>
                                <select class="form-control select2" style="width: 100%;" name="document" required>
                                    <option selected="selected">Carte d'etudiant</option>
                                    <option>APS</option>
                                    <option>Autres</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Téléphone fixe</label>
                                <input type="text" class="form-control pull-right" placeholder="Numéro de téléphone fixe" name="tel_fixe" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Commentaire:</label>
                                <textarea class="form-control" rows="3" placeholder="Ajouter un commentaire" name="commentaire" required></textarea>
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


