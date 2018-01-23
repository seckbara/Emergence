<?php
require_once '../../../vendor/autoload.php';
use Emergence\Abonnement;


$abonnement  = new Abonnement();
$abonnement->setId(filter_var($_POST['id_abonnement'], FILTER_SANITIZE_NUMBER_INT));
$abonnement->setDateCertificat(filter_var($_POST['date_certificat'], FILTER_SANITIZE_STRING));
$abonnement->setDateAbonnement(filter_var($_POST['date_abonnement'], FILTER_SANITIZE_STRING));
$abonnement->setDureeAbonnement(filter_var($_POST['duree_abonne'], FILTER_SANITIZE_NUMBER_INT));
$abonnement->setMontant(filter_var($_POST['montant'], FILTER_SANITIZE_NUMBER_INT));
$abonnement->setIdActivite(filter_var($_POST['activite'], FILTER_SANITIZE_NUMBER_INT));

$t = $abonnement->updateAbonnementById($abonnement->getId(), $abonnement->getDateCertificat(), $abonnement->getDateAbonnement(), $abonnement->getDureeAbonnement(), $abonnement->getMontant(), $abonnement->getIdActivite());

header('Location: ../../abonnements/rechercher_abon.php');
exit();
