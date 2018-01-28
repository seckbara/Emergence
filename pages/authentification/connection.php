<?php
    session_start();
    require_once '../../vendor/autoload.php';
    use Emergence\Utilisateurs;

//    if ((!isset($_SESSION['utilisateur']) || $_SESSION['utilisateur']['id'] == null) )
//    {
//        header('Location: connection.php');
//        exit();
//    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Association Emergence | Connection</title>
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
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Veuillez vous connectez</p>

      <?php
      if (!empty($_POST)):
            if (!empty($_POST['email'] && !empty($_POST{'password'}))):
                $user = (new Utilisateurs())->ConnectUser($_POST['email'], $_POST['password']);
                if ($user) {
                    $_SESSION['utilisateur'] = [];
                    $_SESSION['utilisateur']['nom'] = $user->username;
                    $_SESSION['utilisateur']['prenom'] = $user->lastname;
                    $_SESSION['utilisateur']['email'] = $user->email;
                    $_SESSION['utilisateur']['id'] = $user->id;

                    header('Location: ../../index.php');
                    die();
                } else {
                    header('Location: inscription.php');
                    die();
                }

            endif;
        endif;
      unset($_SESSION['utilisateur']);
      ?>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Votre adresse email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Sauvegarder votre mots de passe
            </label>
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Se connecter</button>
        </div>
      </div>
    </form>

<!--    <div class="social-auth-links text-center">-->
<!--      <p>- OU -</p>-->
<!--      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Se connecter avec-->
<!--        Facebook</a>-->
<!--      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Se connecter avec votre compte-->
<!--        Google+</a>-->
<!--    </div>-->
    <!-- /.social-auth-links -->

<!--    <a href="#">Mots de passe oublier</a><br>-->
<!--    <a href="inscription.html" class="text-center">Vous n'avez pas de compte s'inscrire</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
