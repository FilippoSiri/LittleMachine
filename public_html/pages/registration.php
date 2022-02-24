<!DOCTYPE html>
<?php
    $root = '..';
    session_start();
    if(isset($_SESSION['idU']))
        header("location:$root");

    $register = true;
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
        <script src="../js/registration.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <?php
            require_once "../include/header.php";
        ?>

        <!--- Form Registrazione -->
        <main class="container" style="max-width:500px">
            <h1 class="spazioSinistra margin titoloPagina">Registrati</h1>
            <div class="signup-form spazioSinistra"  style="width: 100%;">

                <form method="POST" action="#" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="firstname" id="firstname" placeholder="Nome" class="borderInputBlue" style="width: 90%;" required/>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="lastname" id="lastname" placeholder="Cognome" class="borderInputBlue" style="width: 90%;" required/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email" class="borderInputBlue" style="width: 90%;" required/>
                        <p hidden class="testoErrore" id="erroreEmail">  <i class="fas fa-exclamation-circle"></i> Email già utilizzata</p>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="borderInputBlue" style="width: 90%;" required/>
                        <p hidden class="testoErrore" id="errorePassword">  <i class="fas fa-exclamation-circle"></i> Minimo 12 caratteri</p>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="confirm" id="confirm" placeholder="Ripeti la password" class="borderInputBlue" style="width: 90%;" required/>
                        <p hidden class="testoErrore" id="erroreConfirm">  <i class="fas fa-exclamation-circle"></i> Le password Devono essere uguali</p>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="city" id="city" placeholder="Città" style="width: 90%;" class="borderInputBlue"/>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="address" id="address" placeholder="Indirizzo" style="width: 90%;" class="borderInputBlue"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="submit" class="form-submit" style="float:left" style="width: 90%;" value="Registrati"/>
                        <a href="login.php" class="signup-image-link">Sono già iscritto</a>
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