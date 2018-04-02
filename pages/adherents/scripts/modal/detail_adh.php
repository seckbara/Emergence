<?php
require_once '../../../../vendor/autoload.php';
use Emergence\Adherent;

$adherent = $_POST['id_adher'];

$adherent = (new Adherent())->AdherentById($adherent);
?>

 Détail de <?= $adherent->nom_adherent.' '.$adherent->prenom_adherent . "##" ?>


<div class="container">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nom de l'adherent</label>
        <div>
            <?= $adherent->nom_adherent ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Prenom de l'adherent</label>
        <div>
            <?= $adherent->prenom_adherent ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Date de naissance</label>
        <div>
            <?= $adherent->date_naissance ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Adresse</label>
        <div>
            <?= $adherent->adresse ?>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Numéro de téléphone</label>
        <div>
            <?= $adherent->tel ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Adresse messagérie</label>
        <div>
            <?= $adherent->email ?>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Presence d'un certificat médical</label>
        <div>
            <?php
                if($adherent->certificat == "O"){
                    echo "O";
                }
                else if($adherent->certificat == "NR"){
                    echo "NR";
                }
                else{
                    echo "N";
                }
            ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Type de document</label>
        <div>
            <?= $adherent->document ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Commentaire</label>
        <div>
            <?= $adherent->commentaire ?>
        </div>
    </div>

</div>

