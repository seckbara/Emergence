<?php
require_once '../../../vendor/autoload.php';
use Emergence\Abonnement;

$abonnement  = (new Abonnement())->AllAbonnement();

echo json_encode($abonnement);