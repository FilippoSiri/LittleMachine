<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['idU']))
        header("location:registration.php");
    $root = '..';
    $update = true;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines</title>
        <?php require_once "../include/library.php"; ?>
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <script src="../js/check.js"></script>
        <script src="../js/update_profile.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">

        <!-- Header -->
        <?php
            require_once "../include/header.php";
        ?>

        <!--- Form Aggiorna Utente -->
        <main class="container" style="max-width:500px">
            <h1 class="spazioSinistra margin titoloPagina">Aggiorna Dati</h1>
            <div class="signin-form spazioSinistra"  style="width: 100%; margin-top:20px">

                    <form method="POST" action="#" class="register-form padding" id="update-form" >
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input class="borderInputBlue" type="text" name="firstname" id="firstname"  style="width:90%" required/>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input class="borderInputBlue" type="text" name="lastname" id="lastname"  style="width:90%" required/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" class="borderInputBlue"  style="width:90%" required/>
                            <p hidden class="testoErrore" id="erroreEmail">  <i class="fas fa-exclamation-circle"></i> Email già utilizzata</p>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" class="borderInputBlue" style="width:90%" />
                            <p hidden class="testoErrore" id="errorePassword">  <i class="fas fa-exclamation-circle"></i> Minimo 12 caratteri</p>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="confirm" id="confirm" placeholder="Ripeti la password" class="borderInputBlue" style="width:90%" />
                            <p hidden class="testoErrore" id="erroreConfirm">  <i class="fas fa-exclamation-circle"></i> Le password Devono essere uguali</p>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input class="borderInputBlue" type="text" name="city" id="city" placeholder="Città" style="width:90%" />
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input class="borderInputBlue" type="text" name="address" id="address" placeholder="Indirizzo" style="width:90%" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="submit" class="form-submit" value="Aggiorna"/>
                        </div>
                    </form>
            </div>
        </main>

        <?php
            require_once "../include/footer.php";
        ?>

</body>
</html>
