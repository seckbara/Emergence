<?php
require_once '../../../../vendor/autoload.php';
use Carbon\Carbon;
use Emergence\Adherent;
use Emergence\Abonnement;
use Emergence\Versement;
use Emergence\Functions;

$abonn = $_POST['id_abonn'];
$adherent = $_POST['id_adher'];
$verse = $_POST['id_vers'];

$versement = (new Versement())->VersementById($abonn);
$adherent = (new Adherent())->AdherentById($adherent);
$abonnement = (new Abonnement())->AbonnementById($abonn);
$situation = (new Adherent())->SituationById($adherent->situation);

$formatdate = new Functions();

$date = date_parse($abonnement->date_abonnement);
$date_fin = $formatdate->DureeAbonnement($date['year'], $date['month'], $date['day'], $abonnement->duree_abonnement);

?>

<b style="color: #0a6ebd">Abonnement du  <?= $formatdate->Date_Format_Fr($abonnement->date_abonnement).' AU '.$formatdate->Date_Format_Fr($date_fin). "##" ?></b>


<div class="container">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Date d'abonnement:</label>
        <div>
            <?= $abonnement->date_abonnement ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Durée d'abonnement:</label>
        <div>
            <?= $abonnement->duree_abonnement ?> mois
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Montant en &euro; :</label>
        <div>
            <?= $abonnement->montant ?> &euro;
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Situation :</label>
        <div>
            <?= $situation->situation ?>
        </div>
    </div>
    <div class="form-group row">
        <ul class="list-group col-sm-6">
            <li class="list-group-item active">Versement en <?= count($versement) ?> fois :</li>
            <?php foreach ($versement as $vers): ?>
                <li class="list-group-item">
                    <b>Montant :</b>  &nbsp; <?= $vers->montant ?> &euro; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <b>Date de versement:</b> &nbsp; <?= $vers->date_versement ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
