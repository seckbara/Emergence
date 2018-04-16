<?php
error_reporting(0);
require_once '../../../vendor/autoload.php';
use Mpdf\Mpdf;
use Emergence\Abonnement;
use Emergence\Adherent;
use Emergence\Activite;

// Récuperation de l'adherent
$adherent = new Adherent();
$current_adherent = $adherent->AdherentById($_GET['adherent']);

// Récuperation de l'abonnement
$abonnement = new Abonnement();
$current_abonnement = $abonnement->AbonnementById($_GET['abonnement']);

$mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

$stylesheet = file_get_contents('devis.css');
//$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML('
    <p align="left">
        <br>
        <img src="../../../dist/img/logo_emergence.png" width="180" height="45"><br>
        26 rue Kelogard amard<br>
        76600, Le Havre<br>
        02.87.15.10.16<br>
    </p><br><br><br><br>
    
    <img src="smiley.gif" alt="Smiley face" width="42" height="42" align="right"> This is some text.</p>
    
    <h2 align="center" style="border:1px solid #ff1c1a">Bulletin d\'adhésion pour l\'activité Boxe</h2>
    
    <p>Nom :</p>
    <p>Prenom :</p>
    <p>Date de Naissance :</p>
    <p>Ville :</p>
    <p>Date de naissance :</p>
    <p>Présence certificat :</p>
    <p>Durée d\'abonnement :</p> mois
    <p>Montant :</p>

');
$mpdf->Output();

//exit();

