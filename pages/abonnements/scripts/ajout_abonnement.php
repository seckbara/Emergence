<?php
 require_once '../../../vendor/autoload.php';

    $aboonnements = new Abonnement();
    $aboonnements->setDateCertificat(date('d-m-Y', strtotime($_POST['date_certificiat'])));
    $aboonnements->setTypeAbonnement($_POST['type_abonn']);
    $aboonnements->setDateAbonnement($_POST['date_abonn']);
    $aboonnements->setDureeAbonnement($_POST['duree_abonne']);
    $aboonnements->setMontant($_POST['montanttotal']);
    $aboonnements->setIdAdherent($_POST['id_adherent']);
    $aboonnements->setIdActivite($_POST['activite']);
    $aboonnements->setTypePaiement($_POST['type_paie']);

    $abonn = $aboonnements->AjoutAbonnement();


     if($abonn){
         $listvers = $_POST['versement'];
         foreach ($listvers as $val){
             $versements = new Versement();
             $versements->date_versement = date('d-m-Y', strtotime($val['date_verse']));
             $versements->commentaire = $val['commentaire'];
             $versements->montant = $val['montant'];
             $versements->setAbonnementId($aboonnements->LastIdAbonnement()->id);
             $queversement = $versements->AjoutVersementTEST();
         }

         header('Location: ../../abonnements/rechercher_abon.php');
         exit();
     }
     else{
         header('Location: ../../abonnements/ajouter_abonn.php?id='.$aboonnements->getIdAdherent().'"');
         exit();
     }