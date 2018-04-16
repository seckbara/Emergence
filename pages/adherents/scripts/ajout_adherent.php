<?php
ini_set("display_errors",0);error_reporting(0);
 require_once '../../../vendor/autoload.php';
 use Emergence\Adherent;
 use Emergence\Abonnement;
 use Emergence\Activite;
 use Emergence\Functions;
 use Emergence\Versement;

 $_POST = filter_input_array(INPUT_POST);
 $adherent =  new Adherent();
 $adherent->id = $_POST['id_adh'];
 $adherent->nom_adherent = trim($_POST['nom_adherent'], " ");
 $adherent->prenom_adherent = trim($_POST['prenom_adherent'], " ");
 $adherent->date_naissance = $_POST['date_naissance'];
 $adherent->ville = $_POST['ville'];
 $adherent->sexe = $_POST['sexe'];
 $adherent->tel = $_POST['tel'];
 $adherent->adresse = $_POST['adresse'];
 $adherent->email = $_POST['email'];
 $adherent->certificat = $_POST['certificat'];
 $adherent->situation = $_POST['situation'];;
 $adherent->quartier = $_POST['quartier'];
 $adherent->num_secu = $_POST['num_secu'];
 $adherent->document = $_POST['document'];
 $adherent->tel_fixe = $_POST['tel_fixe'];
 $adherent->commentaire = $_POST['commentaire'];

 if ($adherent->id != null) {
     $abonnement_adh = (new Abonnement())->AbonnementByIdAdhe($adherent->id);
     $versement = (new Versement())->deleteVersement($abonnement_adh->id);
     $abonnement = (new Abonnement())->deleteAbonnement($abonnement_adh->id);
     $adherent = (new Adherent())->deleteAdherent($adherent->id);

     $return = [];
     if ($adherent) {
         $return['result'] = 'success';
         echo json_encode($return);
         exit();
     } else {
         $return['result'] = 'echec';
         echo json_encode($return);
         exit();
     }
 } else {

    if($adherent->AjoutAdherents()){

         $lasId = $adherent->LastIdAdherent();

         // recuperation du certificat
         $chemin_cert = "../../../documents/".$_POST['nom_adherent'].'_'. $_POST['prenom_adherent'].'_'.$lasId->id.'/certificat/';
         $chemin_adherent = "../../documents/".$_POST['nom_adherent'].'_'. $_POST['prenom_adherent'].'_'.$lasId->id.'/certificat/';
         if (!file_exists($chemin_cert)) {
             mkdir($chemin_cert, 0755, true);
         }

         // recuperation de la photo
        $chemin_photo = "../../../documents/".$_POST['nom_adherent'].'_'. $_POST['prenom_adherent'].'_'.$lasId->id.'/photo/';
        $chemin_adherent_photo = "../../documents/".$_POST['nom_adherent'].'_'. $_POST['prenom_adherent'].'_'.$lasId->id.'/photo/';
        if (!file_exists($chemin_photo)) {
            mkdir($chemin_photo, 0755, true);
        }

        $adherent->chemin_photo =  $chemin_adherent_photo.$_FILES['photo']['name'];
        $adherent->chemin_certificat =  $chemin_adherent.$_FILES['file_certificat']['name'];

         if ($adherent->updateCertAdhere($adherent->getCheminCertificat(), $adherent->getCheminPhoto(), $lasId->id)) {
             // Deplacement de la photo
             move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_photo.$_FILES['photo']['name']);
             // Deplacement du certificat
             move_uploaded_file($_FILES['file_certificat']['tmp_name'], $chemin_cert.$_FILES['file_certificat']['name']);

             header('Location: ../../abonnements/ajouter_abonn.php?id='.$lasId->id.'"');
             exit();
         }
    }else {
         header('Location: ../../adherents/ajouter_adher.php');
         exit();
    }
 }
