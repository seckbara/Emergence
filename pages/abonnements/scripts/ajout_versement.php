<?php
require_once '../../../vendor/autoload.php';
use Emergence\Versement;

$versement = new Versement();
$versement->setAbonnementId($_POST['id_abonnement']);
$versement->setDateVersement($_POST['date_versement']);
$versement->setMontant($_POST['montant']);
$versement->setCommentaire($_POST['commentaire']);

if($versement->AjoutVersementByAbonId()){
    header('Location: ../../abonnements/detail_abonnement.php?abonnement='.$_POST['id_abonnement'].'&adherent='.$_POST['id_adh'].'');
}
else{

}
