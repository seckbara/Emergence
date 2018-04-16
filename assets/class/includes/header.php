<?php
    session_start();

    require '../../vendor/autoload.php';
    use Emergence\Utilisateurs;

    if ((!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['id'] == ""))
    {
        header('Location: ../../pages/authentification/connection.php');
        exit;
    }

    $current_user = (new Utilisateurs())->getUsers($_SESSION['utilisateur']['id']);

    $_SESSION['id'] = $_SESSION['utilisateur']['id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Association Emergence</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- ajout de jquery step -->
    <link rel="stylesheet" href="../../bower_components/smartwizard/dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../bower_components/smartwizard/dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../bower_components/jquery.steps/demo/css/jquery.steps.css">
    <!-- Fin du css pour le jquery step -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>

    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>EMERGENCE</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Vous avez 1 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <?php if ($current_user->chemin != "") : ?>
                                                    <img src="<?= $current_user->chemin ?>" idth="35" height="35" class="img-circle" alt="">
                                                <?php else: ?>
                                                    <img src="../../dist/img/default.png" width="35" height="35" class="img-circle" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <h4>
                                                <small><i class="fa fa-clock-o"></i> 5 mn</small>
                                            </h4>
                                            <p>un exemple à afficher</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">Voir tout les messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Vous avez réçu 1 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if ($current_user->chemin != "") : ?>
                                <img src="<?= $current_user->chemin ?>" idth="35" height="35" class="img-circle" alt="">
                            <?php else: ?>
                                <img src="../../dist/img/default.png" width="35" height="35" class="img-circle" alt="">
                            <?php endif; ?>
                            <span class="hidden-xs"><?= ucfirst($_SESSION['utilisateur']['nom']) ?> <?= strtoupper($_SESSION['utilisateur']['prenom']) ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php if ($current_user->chemin != "") : ?>
                                    <img src="<?= $current_user->chemin ?>" idth="35" height="35" class="img-circle" alt="">
                                <?php else: ?>
                                    <img src="../../dist/img/default.png" width="35" height="35" class="img-circle" alt="">
                                <?php endif; ?>

                                <p>
                                    <?= ucfirst($_SESSION['utilisateur']['nom']) ?> <?= strtoupper($_SESSION['utilisateur']['prenom']) ?>
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="../../pages/profile/profile.php" class="btn btn-success btn-xs btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../../pages/authentification/connection.php" class="btn btn-danger btn-xs btn-flat">Se déconnecter</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php if ($current_user->chemin != "") : ?>
                        <img src="<?= $current_user->chemin ?>" class="img-circle" alt="">
                    <?php else: ?>
                        <img src="../../dist/img/default.png" width="35" height="35" class="img-circle" alt="">
                    <?php endif; ?>
                </div>
                <div class="pull-left info">
                    <p><?= ucfirst($_SESSION['utilisateur']['nom']) ?> <?= strtoupper($_SESSION['utilisateur']['prenom']) ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-male" aria-hidden="true"></i> <span>Adherents</span>
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
<!--                        <li><a href="../../pages/adherents/historique.php"><i class="fa fa-history" aria-hidden="true"></i> Historique</a></li>-->
                        <li><a href="../../pages/adherents/ajouter_adher.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter</a></li>
                        <li><a href="../../pages/adherents/rechercher_adh.php"><i class="fa fa-search" aria-hidden="true"></i> Rechercher</a></li>
                    </ul>
                </li>
            </ul>

            <!-- partie concernant un abonnement -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i> <span>Abonnement</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
<!--                        <li><a href="../../pages/abonnements/ajouter_abonn.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter</a></li>-->
                        <li><a href="../../pages/abonnements/fin_abonn.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Fin abonnement</a></li>
                        <li><a href="../../pages/abonnements/rechercher_abon.php"><i class="fa fa-search" aria-hidden="true"></i> Rechercher</a></li>
                    </ul>
                </li>
            </ul>
            <!-- fin partie abonnement -->

            <!-- partie statistique -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Afficher les stats</span>
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/statistique/stats.php"><i class="fa fa-line-chart" aria-hidden="true"></i> Stats adherent</a></li>
                    </ul>
                </li>
            </ul>
            <!--   -->

            <!-- partie statistique -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calculator" aria-hidden="true"></i> <span>Devis</span>
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/devis/devis.php"><i class="fa fa-bar-chart" aria-hidden="true"></i>Devis</a></li>
                        <li><a href="../../pages/devis/listing.php"><i class="fa fa-th-list" aria-hidden="true"></i>Listing</a></li>
                    </ul>
                </li>
            </ul>
            <!--   -->


            <!-- partie certificat & photo -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-image" aria-hidden="true"></i> <span>Certificat & Photo</span>
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/photocert/photocert.php"><i class="fa fa-file-image-o" aria-hidden="true"></i>Certificat / Photo</a></li>
                    </ul>
                </li>
            </ul>
            <!--   -->

        </section>
        <!-- /.sidebar -->
    </aside>

