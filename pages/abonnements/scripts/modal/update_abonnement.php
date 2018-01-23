<?php
require_once '../../../../vendor/autoload.php';
$abonnement = (new Abonnement())->AbonnementById($_POST['id_abonn']);
$adherent = (new Adherent())->AdherentById($abonnement->id_adherent);
$type_abonnement = (new Activite())->AllTypeabonnement();
$activite = (new Activite())->AllActivite();

?>

Modification de l'abonnement de <?= $adherent->nom_adherent.' '.$adherent->prenom_adherent. "##" ?>

<form action="scripts/update_abonn.php" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>Identifiant</label>
                <input type="hidden" name="id_abonnement" value="<?= $abonnement->id ?>" class="form-control col-lg-1">
                <input type="text" name="nom_adherent" value="<?= $abonnement->id ?>" class="form-control col-lg-1" readonly>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Date de certificat</label>
        <input type="text" name="date_certificat" value="<?= $abonnement->date_certificat ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Date d'abonnement</label>
        <input type="text" name="date_abonnement" value="<?= $abonnement->date_abonnement ?>" class="form-control col-lg-1">
    </div>
    <br>
    <div class="form-group">
        <br>
        <label>Durée d'abonnement</label>
        <div class="input-group">
            <label>
                3 mois &nbsp;
                <input type="radio" name="duree_abonne" class="flat-red" value="3" <?= ($abonnement->duree_abonnement == 3)?"checked":"" ?>>
            </label>
            <label>
                &nbsp; 6 mois &nbsp;
                <input type="radio" name="duree_abonne" class="flat-red" value="6" <?= ($abonnement->duree_abonnement == 6)?"checked":"" ?>>
            </label>
            <label>
                &nbsp; 12 mois &nbsp;
                <input type="radio" name="duree_abonne" class="flat-red" value="12" <?= ($abonnement->duree_abonnement == 12)?"checked":"" ?>>
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Montant</label>
        <input type="text" name="montant" value="<?= $abonnement->montant ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Activité choisis</label>
        <select class="form-control select2" style="width: 100%;" required name="activite">
            <?php foreach ($activite as $activ) { ?>
                <option selected="selected" value="<?= $activ->id ?>"><?= $activ->nom_activite ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label>Type de paiement</label>
        <select class="form-control select2" style="width: 100%;" required name="type_abonn">
            <?php foreach ($type_abonnement as $type) { ?>
                <option selected="selected" value="<?= $type->id ?> <?= ($type->id == $abonnement->type_abonnement)?"selected":"" ?>"><?= $type->type_abonnement ?></option>
            <?php } ?>
        </select>
    </div><br>

    <div class="form-group">
        <br><input type="submit" class="btn btn-success btn-sm btn-block" value="Valider"/>
    </div>
</form>
