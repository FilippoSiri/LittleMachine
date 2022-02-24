<?php
    session_start();
    require_once '../api/functions.php';
    $root = '..';
    $search = true;
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
                include "../include/login.php";
            }
        ?>
        <!-- Ricerca -->
        <main>
            <div class="container">
                <h1 class="titoloPagina spazioSinistra margin">Risultati per: <?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : "tutti i prodotti"; ?></h1>
                <!--Intero carrello-->
                <div class="bloccoRicerca" id="bloccoRicerca">
                    <!--Prodotto 1-->
                    <?php
                        require_once '../database/connectDB.php';
                        if(isset($_GET['search']))
                            $search = '%'.trim($_GET['search']).'%';
                        else
                            $search = '%';
                        try {
                            $result = makeQuery($conn, "SELECT DISTINCT m.idP, m.name, m.description, m.price, m.imgPath, m.imgDescription, m.qta  
                                               FROM model m LEFT JOIN model_category mc ON m.idP = mc.idP LEFT JOIN category c on c.idC = mc.idC
                                               WHERE m.name LIKE ? OR m.description LIKE ? OR c.name LIKE ?", "sss", $search, $search, $search);
                        } catch(Exception $e){
                            require_once '../database/disconnectDB.php';
                            exitJSON(false, "Errore database", 0);
                        }
                        if(!$result -> num_rows){
                            echo "<h5 class='spazioSinistra sottotitoloPagina padding' style='margin-top:20px'> Nessun prodotto presente</h5>";
                        }

                        while ($product = $result -> fetch_assoc()){
                            $qta = 0;
                            if(isset($_SESSION['idU'])){
                                if(!$qtaCart = $conn -> query("SELECT qtaProd FROM cart WHERE idU = ".$_SESSION['idU']." AND idP = ".$product['idP'])) {
                                    require_once '../database/disconnectDB.php';
                                    exitJSON(false, "Errore database", 1);
                                }
                                if($qtaCart -> num_rows){
                                    $tmp = $qtaCart -> fetch_assoc();
                                    $qta = $tmp['qtaProd'];
                                }
                            }
                            if(!$categoryRes = $conn -> query("SELECT name FROM category NATURAL JOIN model_category WHERE idP = ".$product['idP'])) {
                                require_once '../database/disconnectDB.php';
                                exitJSON(false, "Errore database", 1);
                            }
                            include '../include/productSearch.php';
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

