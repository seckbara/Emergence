<?php
 require_once '../../../vendor/autoload.php';
 $_POST = filter_input_array(INPUT_POST);
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

 if($_POST['id_adh'] != null){
     $abonnement_adh = (new Abonnement())->AbonnementByIdAdhe($_POST['id_adh']);
     $versement = (new Versement())->deleteVersement($abonnement_adh->id);
     $abonnement = (new Abonnement())->deleteAbonnement($_POST['id_adh']);
     $adherent = (new Adherent())->deleteAdherent($_POST['id_adh']);

     if($abonnement_adh && $versement && $abonnement && $adherent){
         $return['result'] = 'echec';
         $return['response'] = "Suppression échouée";
         exit();
     }
     else{
         $return['result'] = 'echec';
         $return['response'] = "Suppression échouée";
         exit();
     }
 }
 else{
     $adh = $adherent->AjoutAdherents($nom,$prenom,$date_naissance,$ville,$sexe,$tel,$adresse,$mail,$certificat,$situation,$quartier,$numer_secu,$type_doc,$tel_fixe,$commentaire);
     if($adh){
         $lasId = $adherent->LastIdAdherent();
         header('Location: ../../abonnements/ajouter_abonn.php?id='.$lasId->id.'"');
         exit();
     }
     else{
         header('Location: ../../adherents/ajouter_adher.php');
         exit();
     }
 }
