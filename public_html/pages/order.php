<?php
    session_start();
    require_once '../api/functions.php';
    if(!isset($_SESSION['idU']))
        header("location:registration.php");
    $root = '..';
    $order = true;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines</title>
        <?php require_once "../include/library.php"; ?>
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/product.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <script src="../js/search.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <?php
            require_once "../include/header.php";
            if(!isset($_SESSION['idU'])){
                header( "login.php");
            }
        ?>
        <!-- Ricerca -->
        <main>
            <div class="container">
                <h1 class="titoloPagina spazioSinistra margin">Tutti i tuoi ordini</h1>
                <!--Intera lista ordini-->
                <div class="bloccoRicerca" id="bloccoRicerca">
                    <!--Prodotto 1-->
                    <?php
                        require_once '../database/connectDB.php';
                        if(!$result = $conn -> query("SELECT o.address, o.city, o.idO, op.idP, m.name, op.qta, op.price,m.imgPath,m.imgDescription
                                                    FROM orders o NATURAL JOIN orders_product op JOIN model m ON op.idP=m.idP 
                                                    WHERE o.idU = ".$_SESSION['idU']." ORDER BY o.idO DESC")) {
                            require_once '../database/disconnectDB.php';
                            exitJSON(false, "Errore database", 1);
                        }
                        if(!$result -> num_rows){
                            echo '<h5 class="spazioSinistra sottotitoloPagina padding" style="margin-top:20px">Nessun ordine effettuato</h5>';
                        }
                        $idOrdine=-1;
                        $controllo=false;
                        while ($product = $result -> fetch_assoc()){

                            if($idOrdine!=$product['idO'] && $controllo){
                                echo "</div>";
                            }
                            if(!$controllo)
                                $controllo=true;

                            if($idOrdine!=$product['idO']){
                                echo "<div style='margin:30px;border:solid 1px'>";
                                    echo "<div class='titoloOrdine' style='min-height:44px'>";
                                        echo "<div  style='padding:10px 0px 10px 10px; float:left'>Ordine num:".$product['idO'] ."</div>";
                                        echo "<div  style='padding:10px 0px 10px 10px; float:left; margin-left:200px'>Indirizzo ordine:".htmlspecialchars($product['address']) .",".htmlspecialchars($product['city'])."</div>";
                                    echo "</div>";
                                $idOrdine=$product['idO'];
                            }
                            
                            if(!$categoryRes = $conn -> query("SELECT name FROM category NATURAL JOIN model_category WHERE idP = ".$product['idP'])) {
                                require_once '../database/disconnectDB.php';
                                exitJSON(false, "Errore database", 1);
                            }
                            $qta = $product['qta'];
                            include '../include/productOrder.php';
                        }
                        require_once '../database/disconnectDB.php';
                    ?>
                </div>
            </div>
        </main>
        <!--- Footer -->
        <?php
            require_once "../include/footer.php";
        ?>
    </body>
</html>

