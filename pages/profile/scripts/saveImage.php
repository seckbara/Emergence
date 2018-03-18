<?php
require_once '../../../vendor/autoload.php';
use Emergence\Utilisateurs;

$user = (new Utilisateurs());

$user->setId($_POST['id']);
$user->setNom($_POST['nom']);
$user->setPrenom($_POST['prenom']);

$chemin = "../../../dist/img/".$user->getNom().'_'.$user->getPrenom().'_'.$user->getId().'/';
$chemin_users = "../../dist/img/".$user->getNom().'_'.$user->getPrenom().'_'.$user->getId().'/';

if (!file_exists($chemin) && $_FILES) {
    mkdir($chemin, 0755, true);
}
$user->setChemin($chemin_users.$_FILES['input-freqd-1']['name']);



if ($user->updateImage()) {
    move_uploaded_file($_FILES['input-freqd-1']['tmp_name'], $chemin.$_FILES['input-freqd-1']['name']);
    $reponse['status'] = "succe";
    echo json_encode($reponse);
} else {
    header('Location: ../../adherents/ajouter_adher.php');
    exit();
}
