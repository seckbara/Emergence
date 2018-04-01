<?php
require_once '../../../vendor/autoload.php';
use Emergence\Message;
use Emergence\Utilisateurs;

$current_user = (new Utilisateurs())->getUsers($_SESSION['utilisateur']['id']);

$message = (new Message());
$message->setExpediteur($_POST['current_id']);
$message->setSujet($_POST['sujet']);
$message->setDestinataire($_POST['destinataire']);
$message->setMessage($_POST['message']);
$message->setDateEnvoie("eee");
