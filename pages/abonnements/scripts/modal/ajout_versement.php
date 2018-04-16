<?php
require_once '../../../../vendor/autoload.php';
use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Activite;

$abonnement = (new Abonnement())->AbonnementById($_POST['id_abonn']);
$adherent = (new Adherent())->AdherentById($abonnement->id_adherent);
$type_abonnement = (new Activite())->AllTypeabonnement();
$activite = (new Activite())->AllActivite();
?>

Ajout d'un versement pour l'abonnement de <b><?= $adherent->nom_adherent.' '.$adherent->prenom_adherent. "##" ?></b>

<form action="scripts/ajout_versement.php" method="post">
    <input type="hidden" name="id_abonnement" value="<?= $abonnement->id ?>" class="form-control col-lg-1">
    <input type="hidden" name="id_adh" value="<?= $adherent->id ?>" class="form-control col-lg-1">

    <br><div class="form-group">
        <label>Date de versement</label>
        <input type="text" name="date_versement" value="<?= date('d-m-Y') ?>" class="form-control col-lg-1">
    </div><br>

    <br><div class="form-group">
        <label>Montant</label>
        <input type="number" name="montant" value="" min="0.00" class="form-control col-lg-1">
    </div><br>

    <br><div class="form-group">
        <label>Commentaire :</label>
            <textarea type="text" class="form-control pull-right" name="commentaire" rows="3" placeholder="Ajouter un commentaire" required></textarea><br>
    </div><br>

    <div class="form-group">
        <br><input type="submit" class="btn btn-success btn-sm btn-block" value="Valider"/>
    </div>
</form>
