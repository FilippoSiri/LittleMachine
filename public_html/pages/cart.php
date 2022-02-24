<!DOCTYPE html>
<?php
    session_start();
    require_once '../api/functions.php';
    $root = '..';
    if(!isset($_SESSION['idU']))
        header('location:registration.php');
    $cart = true;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines</title>
        <?php require_once "../include/library.php"; ?>
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/product.css" rel="stylesheet">
        <script src="../js/cart.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <?php
            require_once "../include/header.php";
        ?>
        <main class="container">
            <h1 class="spazioSinistra margin titoloPagina">Carrello</h1>
            <div class="row" id="contenitoreCarrello">


                        <?php
                            require_once '../database/connectDB.php';
                            $cartJSON = getJSONCart($conn);
                            require_once '../database/disconnectDB.php';
                            $cart = $cartJSON -> cart;
                            $totale = 0;
                            if(isset($cart[0])){ //Non si usa count per non visitare tutto l'array
                                echo '<div class="col-xs-12 col-sm-8 col-md-8">';
                                echo '<div class="bloccoCarrello" id="carrello">';
                                foreach ($cart as $product) {
                                    echo '<!-- Product -->';
                                    include '../include/productCart.php';
                                    $empty = false;
                                }
                                echo '</div>';
                                echo '</div>';
                                echo '
                                    <div class="col-xs-12 col-sm-4 col-md-4 text-center" id="carrelloTotale" >
                                        <p><strong>Totale:</strong><bdi id="totale">'.$totale.'</bdi>&euro;</p>
                                        <input type="text" hidden id="tokenCSRF" value="'.$_SESSION['tokenCSRF'].'">
                                        <button class="btn btn-round" id="acquista" type="button">Acquista</button>
                                        <div id="erroreCart" class="testoErrore"></div>
                                    </div>
                                ';
                            }else{
                                echo '<h5 class="spazioSinistra sottotitoloPagina padding" style="margin-top:20px">Nessun elemento nel carrello</h5>';
                            }
                        ?>

            </div>
        </main>
        <!--- Footer -->
        <?php
            require_once "../include/footer.php";
        ?>
    </body>
</html>

