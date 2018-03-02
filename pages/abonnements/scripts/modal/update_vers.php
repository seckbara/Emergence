<?php
require_once '../../../../vendor/autoload.php';
use Emergence\Versement;

$versement = (new Versement())->getVersement($_POST['id_vers']);
dump($versement);
?>

Modification du versement <?= $versement->id. "##" ?>

<form action="scripts/update_vers.php" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-md-12">
                <label>Identifiant :</label>
                <input type="text" name="id" value="<?= $_POST['id_vers'] ?>" class="form-control col-lg-1" readonly>
                <input type="hidden" name="id_abon" value="<?= $_POST['id_abon'] ?>" class="form-control col-lg-1" >
                <input type="hidden" name="id_adh" value="<?= $_POST['id_adhe'] ?>" class="form-control col-lg-1" >
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Date de versement :</label>
        <input type="text" name="date_versement" value="<?= $versement->date_versement ?>" class="form-control col-lg-1">
    </div>

    <div class="form-group">
        <label>Montant</label>
        <input type="text" name="montant" value="<?= $versement->montant ?>" class="form-control col-lg-1">
    </div>
    <br>

    <div class="form-group">
        <label>Commentaire</label>
        <textarea rows="2" cols="5" name="commentaire"  class="form-control col-lg-1"><?= $versement->commentaire ?></textarea>
    </div><br/><br/>

    <div class="form-group">
        <br/><input type="submit" class="btn btn-success btn-sm btn-block" value="Valider"/>
    </div>
</form>
