<?php
 require_once '../../../vendor/autoload.php';

  $date_certificat= $_POST['date_certificiat'];
  $type_abonnement = $_POST['type_abonn'];
  $date_abonnement = $_POST['date_abonn'];
  $duree_abonnement = $_POST['duree_abonne'];
  $montant = $_POST['montanttotal'];
  $id_adherent = $_POST['id_adherent'];
  $id_activite = $_POST['activite'];
  $type_paiement = $_POST['type_paie'];

  $listvers = $_POST['versement'];

  $aboonnements = new Abonnement();

  $abonn = $aboonnements->AjoutAbonnement($date_certificat,$type_abonnement,$date_abonnement,$duree_abonnement,$montant,$id_adherent,$id_activite,$type_paiement);

  $versements = new Versement();

  // recuperation de la liste des versements
  $vers = $listvers;
  //recuperation du dernier id
  $last_abonn = $aboonnements->LastIdAbonnement();

  foreach ($vers as $val){
      $queversement = $versements->AjoutVersement($val['date_verse'], $val['commentaire'], $val['montant'], $last_abonn->id);
  }

    header('Location: ../../adherents/rechercher.php');
    exit();