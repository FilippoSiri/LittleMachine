<?php



    require_once 'functions.php';
    session_start();
    if(!isset($_SESSION['idU']))
        exitJSON(false, "Utente non loggato", 0);
    checkStringGet('idP', "idP mancante");
    checkStringGet('qta', 'qta mancante');
    checkStringGet('tokenCSRF', 'Token CSRF');

    if($_GET['tokenCSRF'] !== $_SESSION['tokenCSRF'])
        exitJSON(false, 'Token CSRF sbagliato', 0);


    if($_GET['qta'] < 0)
        exitJSON(false, "Inserire una quantità >= 0", 0);
    require_once '../database/connectDB.php';
    try {
        $qtaResult = makeQuery($conn, "SELECT qta FROM model WHERE idP = ?", "i", $_GET['idP']);
    }catch (Exception $e){

}
    if($qtaResult -> num_rows){
        $qtaAvailable = $qtaResult -> fetch_assoc()['qta'];
        if($qtaAvailable < $_GET['qta'])
            exitJSON(false, "Quantità non disponibile", 0);
    }
    try {
        if(!$_GET['qta'])
                makeQuery($conn, "DELETE FROM cart WHERE idU = ? AND idP = ?", "ii", $_SESSION['idU'], $_GET['idP']);
        else{
            if(makeQuery($conn, "SELECT * FROM cart WHERE idU = ? AND idP = ?", "ii", $_SESSION['idU'], $_GET['idP']) -> num_rows)
                makeQuery($conn, "UPDATE cart SET qtaProd = ? WHERE idU = ? AND idP = ?", "iii", $_GET['qta'], $_SESSION['idU'], $_GET['idP']);
            else
                makeQuery($conn, "INSERT INTO cart (idU, idP, qtaProd) VALUES (?, ?, ?)", "iii", $_SESSION['idU'], $_GET['idP'], $_GET['qta']);
        }
    }catch(Exception $e){
        exitJSON(false, "Errore database", 0);
    }
    $cart = getJSONCart($conn);
    $cart -> tokenCSRF = $_SESSION['tokenCSRF'];
    require_once '../database/connectDB.php';
    exit(json_encode($cart, JSON_UNESCAPED_UNICODE));