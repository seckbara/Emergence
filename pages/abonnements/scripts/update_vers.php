<?php
require_once '../../../vendor/autoload.php';
use Emergence\Versement;

$versement = new Versement();
$versement->setId(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
$versement->setDateVersement(filter_var($_POST['date_versement'], FILTER_SANITIZE_STRING));
$versement->setMontant(filter_var($_POST['montant'], FILTER_SANITIZE_STRING));
$versement->setCommentaire(filter_var($_POST['commentaire'], FILTER_SANITIZE_STRING));

$t = $versement->updateVersementById($versement->getId(), $versement->getDateVersement(), $versement->getMontant(), $versement->getCommentaire());

header('Location: ../../abonnements/detail_abonnement.php?abonnement='.$_POST['id_abon'].'&adherent='.$_POST['id_adh'].'');
exit();
