<?php
require_once '../../../vendor/autoload.php';
use Emergence\Abonnement;
use Emergence\Functions;

$formatdate = new Functions();
$annee_cours = (new Functions())->getYears($_POST['type_abonn'], date("Y"));

$abonnements  = (new Abonnement())->AllAbonnement();

if ($_POST['type_abonn'] == "") {
    echo json_encode($abonnements);
} else {
    $abonnement_expire = [];
    foreach ($abonnements as $abonnement) {
        $date = date_parse($abonnement->date_abonnement);
        $date_fin = $formatdate->DureeAbonnement($date['year'], $date['day'], $date['month'], $abonnement->duree_abonnement);
        $a = strtotime($formatdate->Date_Format_Fr($date_fin));
        $b = strtotime($formatdate->Date_Format_Fr($annee_cours));
        if (strtotime($formatdate->Date_Format_Fr($date_fin)) < strtotime($formatdate->Date_Format_Fr($annee_cours))) {
            array_push($abonnement_expire, $abonnement);
        }
    }
    echo json_encode($abonnement_expire);
}
