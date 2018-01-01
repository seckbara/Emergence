<?php
/**
 * Created by PhpStorm.
 * User: seck
 * Date: 13/08/17
 * Time: 14:07
 */

include_once "../../assets/class/includes/header.php"
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Renouveller un abonnement</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="#">Adherent</a></li>
                <li class="active">Historique des adherents</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <form id="example-form" action="#">
                <div>
                    <h3>Account</h3>
                    <section>
                        <label for="userName">User name *</label>
                        <input id="userName" name="userName" type="text" class="required">
                        <label for="password">Password *</label>
                        <input id="password" name="password" type="text" class="required">
                        <label for="confirm">Confirm Password *</label>
                        <input id="confirm" name="confirm" type="text" class="required">
                        <p>(*) Mandatory</p>
                    </section>
                    <h3>Profile</h3>
                    <section>
                        <label for="name">First name *</label>
                        <input id="name" name="name" type="text" class="required">
                        <label for="surname">Last name *</label>
                        <input id="surname" name="surname" type="text" class="required">
                        <label for="email">Email *</label>
                        <input id="email" name="email" type="text" class="required email">
                        <label for="address">Address</label>
                        <input id="address" name="address" type="text">
                        <p>(*) Mandatory</p>
                    </section>
                    <h3>Hints</h3>
                    <section>
                        <ul>
                            <li>Foo</li>
                            <li>Bar</li>
                            <li>Foobar</li>
                        </ul>
                    </section>
                    <h3>Finish</h3>
                    <section>
                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                    </section>
                </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include_once "../../assets/class/includes/footer.php" ?>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>

<script>
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            alert("Submitted!");
        }
    });
</script>
