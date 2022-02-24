<!DOCTYPE html>
<?php
session_start();
require_once '../api/functions.php';
$root = '..';
$donation = true;
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Little Machines Per PS5</title>
        <?php require_once "../include/library.php"; ?>
        <link href="../css/common.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <link href="../css/product.css" rel="stylesheet">
        <script src="../js/donation.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <?php
        require_once "../include/header.php";
        if(!isset($_SESSION['idU'])){
            include "../include/login.php";
        }
        require_once '../database/connectDB.php';
        if(!$result = $conn -> query("SELECT firstname, lastname, anonimo, valoreDonazione, dataDonazione 
                                        FROM donation NATURAL JOIN user ORDER BY  dataDonazione DESC;")){
            require_once '../database/disconnectDB.php';
            exitJSON(false, "Errore database", 1);
        }
        require_once '../database/disconnectDB.php';
        $tot = 0;
        $donations = array();
        while ($res = $result -> fetch_assoc()){
            $tot += $res['valoreDonazione']/100.0;
            $donations[] = $res;
        }

        ?>

        <!-- Donation -->
        <main class="container">
            <h1 class="spazioSinistra titoloPagina margin">Donazioni</h1>
            <h4 class="spazioSinistra margin">
                Aiutaci a raggiungere il nostro obiettivo di 5000 euro per poter espandere la nostra linea produttiva e aggiungere altri modellini bellissimi!
            </h4>
            <div class="progress margin" style="height: 20px; width:80%; margin:auto">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $tot*100/5000?>%;" aria-valuenow="<?php echo $tot?>&euro;" aria-valuemin="0" aria-valuemax="5000"><?php echo $tot?>&euro;</div>
            </div>
            <form id="donation" class="spazioSinistra margin" style="margin-left:25%">
                <div class="row">
                    <input type="number" name="amount" id="valoreDonazioni" min="0" class="borderInputBlue" style="width:27%;float:left" placeholder="Donazione" >
                    <div class="" style="margin-top:13px; width:150px"><input type="checkbox" name="anon" id="anonimo" style="display: inline!important; float:left;margin-top:5px"><p>Rimani anonimo</p></div>
                    <?php
                    if(isset($_SESSION['idU']))
                        echo '<input hidden type="text" id="tokenCSRF" value="'.$_SESSION['tokenCSRF'].'">';
                    ?>
                    <button class="btn btn-round bottoneCarrello" style="float:left;margin:10px;" type="submit">
                        Dona!
                    </button>
                </div>

               
            </form>
        </main>


        <table class="table" style="width:60%;margin:auto; margin-bottom:50px" >
            <thead>
                <tr>
                    <th scope="col">Nome e cognome</th>
                    <th scope="col">Quantità donata</th>
                    <th scope="col">Tempo Donazione</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($donations as $donation){
                    if($donation['anonimo']){
                        $nomeCognome = "Donatore anonimo";
                    }else{
                        $nomeCognome = $donation['firstname'].' '.$donation['lastname'];
                    }
                    echo "
                    <tr>
                        <td>$nomeCognome</td>
                        <td>".$donation['valoreDonazione']/100.0."</td>
                        <td>".$donation['dataDonazione']."</td>
                    </tr>
                    ";
                }
            ?>

            </tbody>

        </table>

        <!--- Footer -->
        <?php
            require_once "../include/footer.php";
        ?>
    </body>
</html>