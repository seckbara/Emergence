<?php
require_once '../../../../vendor/autoload.php';
use Carbon\Carbon;
use Emergence\Adherent;
use Emergence\Abonnement;
use Emergence\Versement;
use Emergence\Functions;

$versement = (new Versement())->getVersement($_POST['id_vers']);
$abonnement = (new Abonnement())->AbonnementById($_POST['id_abonn']);

?>

<b style="color: #0a6ebd">Détail du versement d'Id  <?= $versement->id. "##" ?></b>


<div class="container">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Date de versement :</label>
        <div>
            <?= $versement->date_versement ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Montant du versement :</label>
        <div>
            <?= $versement->montant ?> &euro;
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Date d'abonnement :</label>
        <div>
            <?= $abonnement->date_abonnement ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Durée d'abonnement :</label>
        <div>
            <?= $abonnement->duree_abonnement ?> mois
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire :</label>
        <div>
            <?= $versement->commentaire ?>
        </div>
    </div>
</div>
