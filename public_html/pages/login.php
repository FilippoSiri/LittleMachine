<!DOCTYPE html>
<?php
    session_start();
$root = "..";
    if(isset($_SESSION['idU']))
        header("location:$root");
    $login = true;

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines</title>
        <?php require_once "../include/library.php"; ?>
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <script src="../js/login.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">

        <!-- Header -->
        <?php
            require_once "../include/header.php";
        ?>

        <!--- Form Login -->

        <main class="container" style="max-width:500px">
            <h1 class="spazioSinistra margin titoloPagina">Accedi</h1>
                <div class="signin-form spazioSinistra"  style="width: 100%;">

                <form method="POST" action="#" class="register-form padding" id="login-form" style="margin:auto">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email" class="borderInputBlue" style="width: 90%;" required/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="borderInputBlue" style="width: 90%;" required/>
                    </div>
                    <p style="visibility: hidden" class="testoErrore" id="erroreEmailOPassword">
                        <i class="fas fa-exclamation-circle"></i>
                        Email o password Sbagliati
                    </p>
                    <div class="form-group form-button padding">
                        <input type="submit" name="signin" id="submit" class="form-submit"style="float:left" value="Accedi"/>
                        <a href="registration.php" class="signup-image-link">Crea un account</a>
                    </div>

                </form>
            </div>
        </main>

        <!--- Footer -->
        <?php
            require_once "../include/footer.php";
        ?>

    </body>
</html>