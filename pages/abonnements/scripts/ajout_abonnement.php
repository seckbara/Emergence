<?php
 require_once '../../../vendor/autoload.php';

 $nom = $_POST['nom_adherent'];
 $prenom = $_POST['prenom_adherent'];
 $date_naissance = $_POST['date_naissance'];
 $ville = $_POST['nom_adherent'];
 $sexe = $_POST['sexe'];
 //$tel = trim($_POST['tel'], "-");
 $tel = "0698627516";
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

 $adherent->AjoutAdherents($nom,$prenom,$date_naissance,$ville,$sexe,$tel,$adresse,$mail,$certificat,$situation,$quartier,$numer_secu,$type_doc,$tel_fixe,$commentaire);

 $lasId = $adherent->LastIdAdherent();
 header('Location: ../ajouter.php');
 exit();
 //dump($conn);
 //exit();