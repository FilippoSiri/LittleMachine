<!DOCTYPE html>
<?php
    $root = '..';

    session_start();

    require_once '../api/functions.php';

    if(!isset($_GET['idP']))
        header("location:search.php");

    require_once '../database/connectDB.php';

    try {
        $result = makeQuery($conn, "SELECT * FROM model WHERE idP = ?", "i", $_GET['idP']);
    }catch (Exception $e){
        exitJSON(false, "Errore database", 0);
    }
    if(!$result -> num_rows)
        header("location:search.php");
    $product = $result -> fetch_assoc();
    try {
        $resultCat = makeQuery($conn, "SELECT name FROM category JOIN model_category ON category.idC = model_category.idC WHERE idP = ?", "i", $_GET['idP']);
    }catch (Exception $e){
        exitJSON(false, "Errore database", 0);
    }
    $qta = 0;
    if(isset($_SESSION['idU'])){
        try {
            $resultQta = makeQuery($conn, "SELECT qtaProd FROM cart WHERE idU = ? AND idP = ?", "ii", $_SESSION['idU'], $_GET['idP']);
        }catch (Exception $e){
            exitJSON(false, "Errore database", 0);
        }
        if($resultQta -> num_rows){
            $tmp = $resultQta -> fetch_assoc();
            $qta = $tmp['qtaProd'];
        }
    }
    require_once '../database/disconnectDB.php';

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines</title>
        <?php require_once "../include/library.php"; ?>
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/product.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <script src="../js/product.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <?php
            require_once "../include/header.php";
            if(!isset($_SESSION['idU'])){
                include "../include/login.php";
            }
        ?>

        <!-- Prodotto -->
        <main class="container">
            <div class="container-fluid padding ">
                <div class="row padding">
                    <div class="col-xs-12 col-sm-6 col-md-4 spazioSinistra">
                        <div class="pro-img-details">
                            <img src="<?php echo $root.$product['imgPath']?>" class="immaginePrincipale" alt="<?php echo $product['imgDescription']?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <h4 class="pro-d-title testoProdotto">
                            <?php echo $product['name'];?>
                        </h4>
                        <p class="noMargin">
                            <?php echo $product['description']; ?>
                        </p>

                        <div class="">
                            <?php
                                if($resultCat -> num_rows){
                                    echo '<span class="posted_in">';
                                    echo '<strong>Categorie: </strong>';
                                    $first = true;
                                    while ($cat = $resultCat -> fetch_assoc()){
                                        if(!$first)
                                            echo ', ';
                                        echo '<a rel="tag" href="search.php?search='.$cat['name'].'">'.$cat['name'].'</a>';
                                        $first = false;
                                    }
                                    echo '.';
                                    echo '</span>';
                                }
                            ?>
                        </div>
                        <div>
                            <strong>Prezzo : </strong>
                            <span><?php echo $product['price']/100.0;?>&euro;</span>
                        </div>
                        <form id="product">
                            <div class="form-group">
                                <input type="number" min="0" value="<?php echo $qta; ?>" class="form-control quantity" id="qta">
                            </div>
                            <?php
                                if(isset($_SESSION['idU']))
                                    echo '<input type="text" hidden name="tokenCSRF" id="tokenCSRF" value="'.$_SESSION['tokenCSRF'].'">';
                            ?>
                            <input type="text" name="idP" id="idP" hidden value="<?php echo $_GET['idP'];?>">
                            <p <?php echo $product['qta'] ? '' : "hidden"; ?>>
                                <button class="btn btn-round bottoneCarrello" type="submit"><i class="fa fa-shopping-cart"></i> Aggiungi al Carrello</button>
                            </p>
                            <div <?php echo $product['qta'] ? 'hidden' : ""; ?> class="testoErrore" id="avvisoerrore">  <i class="fas fa-exclamation-circle"></i> Prodotto non presente in magazzino</div>
                        </form>
                    </div>

                </div>
            </div>
        </main>

        <!--- Footer -->
        <?php
            require_once "../include/footer.php";
        ?>
    </body>
</html>
