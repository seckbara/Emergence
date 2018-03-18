<?php
require_once '../../../vendor/autoload.php';
use Emergence\Utilisateurs;

$user = (new Utilisateurs());

$t = $_POST;

$user->setId($_POST['id']);
$user->setNom($_POST['nom']);
$user->setPrenom($_POST['prenom']);
$user->setEmail($_POST['email']);
$user->setRole($_POST['role']);
$user->setPassword($_POST['mp']);
//$user->setChemin($_FILES['input-freq-1']['tmp_name'][0]);

$response = [];
if ($user->updateUser()) {
    $response["result"] = "success";
    echo json_encode($response);
} else {
    $response["result"] = "error";
    echo json_encode($response);
}
