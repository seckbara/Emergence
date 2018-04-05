<?php

//require_once __DIR__ . '../../../vendor/autoload.php';
require_once '../../../vendor/autoload.php';
use Mpdf\Mpdf;
use Emergence\Abonnement;

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$montant = $_POST['montant'];
$adresse = $_POST['adresse'];
$activite = $_POST['activite'];
$duree = $_POST['duree'];
$mpdf = new Mpdf();

$stylesheet = file_get_contents('devis.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML('
    <p align="left">
        <br>
        <img src="../../../dist/img/logo_emergence.png" width="180" height="45"><br>
        26 rue Kelogard amard<br>
        76600<br>
        Le Havre<br>
        02.87.15.10.16<br>
        www.bara-seck.fr<br>
        baraseck1208@gmail.com
    </p>
    <p align="right"> '.$nom.' '.$prenom. ',<br> '.$adresse.'</p><br><br>
    
    <p align="left">
        Date : '.date('d-m-Y'). '
    </p>

    <h1 align="center" style="border:1px solid #ff1c1a">DEVIS</h1>
    
    <p>Activité choisis : ' .$activite.'</p>
    
    <table border="1">
          <tr>
                <th>Activité</th>
                <th>Durée Abonnement</th>
                <th>Montant T.T.C</th>
          </tr>
          <tr>
            <td>'.$activite.'</td>
            <td>'.$duree.' mois</td>
            <td>' .$montant.' €</td>
          </tr>
    </table><br><br><br><br>
    
    <p align="left">
        Fait le : '.date('d-m-Y').', à Le Havre. 
    </p><br>
    
    <p align="right">
        Signature du directeur
    </p>


');
$mpdf->Output('../../../documents/devis.pdf');

echo    "<div class=\"box box-default\">
            <div class=\"box-body\" id=\"download\">
                <a type=\"button\" class=\"btn btn-primary btn-md btn-block\" href=\"../../documents/devis.pdf\" target='_blank'>Télécharger le dévis</a>
            </div>
        </div>";
