<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Association Emergence</b>
  </div>

    <?php

        include 'scripts/function.php';
        require_once '../../vendor/autoload.php';

        if(!empty($_POST)){
            $error = [];
            if (empty($_POST['nom'])){
                $error['nom'] = "Vous n'avaez pas saisie le nom de votre utilsatuer";
            }

            else if(empty($_POST['prenom'])){
                $error['prenom'] = "Vous n'avaez pas saisie le prenom de votre utilsatuer";
            }
            else if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $error['email'] = "Vous adresse email est invalide";
            }

            else if(empty($_POST['pass'])){
                $error['pass'] = "Vous n'avaez pas saisie un bon mot de passe";
            }

            else if(empty($_POST['cpass'])){
                $error['cpass'] = "Vous n'avaez pas saisie la conformation de votre mots de passe";
            }

            else if ($_POST['cpass'] != $_POST['pass']){
                $error['ver_mot'] = "Le mots de passe n'est pas identique";
            }
            else{
                if((new Utilisateurs())->VerifExistUser($_POST['prenom'])){
                    $error['valider'] = "Ce nom d'utilisateur existe deja";
                }
                else{
                    $user = (new Utilisateurs())->SaveUsers($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['pass']);
                    $error['valider'] = "le compte à été créer";
                    header('Location: connection.php');
                    die();
                }
            }
            debuug($error);
        }
    ?>

  <div class="register-box-body">
    <h5 class="login-box-msg">Page d'inscription pour les utilisateurs</h5>

    <form action="" method="post">

        <div class="form-group has-feedback">
          <input type="text" name="nom" class="form-control" placeholder="Saisir votre nom">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="text" name="prenom" class="form-control" placeholder="Saisir votre prenom">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Saisir votre adresse email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="pass" class="form-control" placeholder="Votre mots de passe">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" name="cpass" class="form-control" placeholder="Confirmation de votre mots de passe">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">S'inscrire</button>
          </div>
        </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OU -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Se connecter avec
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Se connecter avec votre compte
        Google+</a>
    </div>

  </div>
</div>

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
