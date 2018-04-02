<?php
require_once '../../../vendor/autoload.php';
use Emergence\Adherent;

$adherent = $_POST['id_adher'];

$adherent = (new Adherent())->AdherentById($adherent);
?>

Modification de l'identité de <?= $adherent->nom_adherent.' '.$adherent->prenom_adherent . "##" ?>

<form action="scripts/update_adh.php" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Nom de l'adherent</label>
                <input type="hidden" name="id_adherent" value="<?= $adherent->id ?>" class="form-control col-lg-1">
                <input type="text" name="nom_adherent" value="<?= $adherent->nom_adherent ?>" class="form-control col-lg-1">
            </div>
            <div class="col-md-6">
                <label>Prenom de l'adherent</label>
                <input type="text" name="prenom_adherent" value="<?= $adherent->prenom_adherent ?>" class="form-control col-lg-1">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Date de naissance</label>
        <input type="text" name="date_naissance" value="<?= $adherent->date_naissance ?>" class="form-control col-lg-1 datepicker">
    </div>

    <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="adresse" value="<?= $adherent->adresse ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Numéro de téléphone</label>
        <input type="text" name="tel" value="<?= $adherent->tel ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Adresse messagérie</label>
        <input type="text" name="email" value="<?= $adherent->email ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Numéro de téléphone</label>
        <input type="text" name="tel" value="<?= $adherent->tel ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Type de document</label>
        <input type="text" name="document" value="<?= $adherent->document ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Commentaire</label>
        <input type="text" name="commentaire" value="<?= $adherent->commentaire ?>" class="form-control col-lg-1">
    </div><br>

    <div class="form-group">
        <br><input type="submit" class="btn btn-success btn-sm btn-block" value="Valider"/>
    </div>
</form>

<script>
    $('.datepicker').datetimepicker({
        format:'DD/MM/YYYY'
    });
</script>