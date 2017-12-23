<?php
 require_once '../../../vendor/autoload.php';

 $nom = $_POST['nom_adherent'];
 $prenom = $_POST['prenom_adherent'];
 $date_naissance = date('d-m-Y', strtotime($_POST['date_naissance']));
 //$ville = $_POST['ville'];
 //$sexe = $_POST['sexe'];
 $tel = $_POST['tel'];
 $adresse = $_POST['adresse'];
 $mail = $_POST['email'];
 //$certificat = $_POST['certificat'];
 //$situation = $_POST['situation'];
 //$quartier = $_POST['quartier'];
 //$numer_secu = $_POST['num_secu'];
 $type_doc = $_POST['document'];
 //$tel_fixe = $_POST['tel_fixe'];
 $commentaire = $_POST['commentaire'];

 $t = $_POST['id_adherent'];

 $adherent =  new Adherent();
 $adherent->updateAdherent($nom, $prenom, $date_naissance, $tel, $adresse, $mail, $type_doc, $commentaire,$_POST['id_adherent']);
 header('Location: ../../adherents/rechercher_adh.php');
 exit();
