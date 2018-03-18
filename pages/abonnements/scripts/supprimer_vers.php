<?php
require_once '../../../vendor/autoload.php';
use Emergence\Versement;

$_POST = filter_input_array(INPUT_POST);
$versement =  new Versement();
$versement->setId($_POST['id_vers']);



if ($versement->getId() != null) {
    $vers = (new Versement())->deleteVersement($versement->getId());

    if ($vers) {
        $return['result'] = 'success';
        echo json_encode($return);
        exit();
    } else {
        $return['result'] = 'echec';
        echo json_encode($return);
        exit();
    }
}
