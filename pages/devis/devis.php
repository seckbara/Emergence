<?php
include_once "../../assets/class/includes/header.php";

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>DEVIS</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i><b>Accueil</b></a></li>
            <li><a href="#"><b>Devis</b></a></li>
            <li class="active"><b>Devis</b></li>

        </ol>
        <br>
        <div id="chart-1"><!-- Fusion Charts will render here--></div><br><br>
        <div id="chart-2"><!-- Fusion Charts will render here--></div>
    </section>

    <div class="modal fade" id="modal-devis">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Géneration en cours</h4>
                </div>
                <div class="modal-body">
                    <p align="center"><img src="../../dist/img/loadind.gif" align="center" width="450" ></p>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <form action="scripts/generate_devis.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom :</label>
                                <input type="text" class="form-control" name="nom" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Prenom :</label>
                                    <input type="text" class="form-control" name="prenom" required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Adresse :</label>
                                <input type="text" class="form-control" name="adresse" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Activité choisis : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <select class="form-control select2" style="width: 100%;" name="actvite" required>
                                    <option value="O" selected>Oui</option>
                                    <option value="N">Non</option>
                                    <option value="NR">Non Renseigné</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Durée D'abonnement :</label>
                                <input type="text" class="form-control" name="duree" required/>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Montant :</label>
                                <input type="text" class="form-control" name="montant" required/>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Divers : &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <select class="form-control select2" style="width: 100%;" name="divers" required>
                                    <option value="O" selected>Oui</option>
                                    <option value="N">Non</option>
                                    <option value="NR">Non Renseigné</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>  &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="submit" class="btn btn-success btn-sm btn-block" value="Génerer le devis" />
                            </div>
                        </div>

                    </div>
                </form>
            </div>
    </section>


</div>

<?php include_once "../../assets/class/includes/footer.php" ?>

