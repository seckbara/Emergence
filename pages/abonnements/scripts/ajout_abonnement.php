<?php
 require_once '../../../vendor/autoload.php';

  $date_certificat= date('d-m-Y', strtotime($_POST['date_certificiat']));
  $type_abonnement = $_POST['type_abonn'];
  $date_abonnement = $_POST['date_abonn'];
  $duree_abonnement = $_POST['duree_abonne'];
  $montant = $_POST['montanttotal'];
  $id_adherent = $_POST['id_adherent'];
  $id_activite = $_POST['activite'];
  $type_paiement = $_POST['type_paie'];


    $aboonnements = new Abonnement();
    $abonn = $aboonnements->AjoutAbonnement($date_certificat,$type_abonnement,$date_abonnement,$duree_abonnement,$montant,$id_adherent,$id_activite,$type_paiement);


     if($abonn){
         $listvers = $_POST['versement'];
         //recuperation du dernier id
         $last_abonn = $aboonnements->LastIdAbonnement();

         foreach ($listvers as $val){
             $versements = new Versement();
             $versements->date_versement = date('d-m-Y', strtotime($val['date_verse']));
             $versements->commentaire = $val['commentaire'];
             $versements->montant = $val['montant'];
             $versements->setLastAbonnId($last_abonn->id);
             //$queversement = $versements->AjoutVersement(date('d-m-Y', strtotime($val['date_verse'])), $val['commentaire'], $val['montant'], $last_abonn->id);
             $queversement = $versements->AjoutVersementTEST();
         }

         header('Location: ../../abonnements/rechercher_abon.php');
         exit();
     }
     else{
         header('Location: ../../abonnements/ajouter_abonn.php?id='.$id_adherent.'"');
         exit();
     }