<?php
 require_once '../../../vendor/autoload.php';

 $nom = $_POST['nom_adherent'];
 $prenom = $_POST['prenom_adherent'];
 $date_naissance = date('d-m-Y', strtotime($_POST['date_naissance']));
 $ville = $_POST['ville'];
 $sexe = $_POST['sexe'];
 $tel = $_POST['tel'];
 $adresse = $_POST['adresse'];
 $mail = $_POST['email'];
 $certificat = $_POST['certificat'];
 $situation = $_POST['situation'];
 $quartier = $_POST['quartier'];
 $numer_secu = $_POST['num_secu'];
 $type_doc = $_POST['document'];
 $tel_fixe = $_POST['tel_fixe'];
 $commentaire = $_POST['commentaire'];

 $adherent =  new Adherent();

 $adh = $adherent->AjoutAdherents($nom,$prenom,$date_naissance,$ville,$sexe,$tel,$adresse,$mail,$certificat,$situation,$quartier,$numer_secu,$type_doc,$tel_fixe,$commentaire);
 //dump($conn);
 //exit();

 if($adh){
     $lasId = $adherent->LastIdAdherent();
     header('Location: ../../abonnements/ajouter_abonn.php?id='.$lasId->id.'"');
     exit();
 }
 else{
     header('Location: ../../adherents/ajouter_adher.php');
     exit();
 }