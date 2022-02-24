<?php
    require_once 'functions.php';
    session_start();
    if(!isset($_SESSION['idU']))
        exitJSON(false, "Utente non loggato", 0);
    require_once '../database/connectDB.php';
    $cartJSON = getJSONCart($conn);
    require_once '../database/disconnectDB.php';
    $cartJSON -> tokenCSRF = $_SESSION['tokenCSRF'];
    exit(json_encode($cartJSON, JSON_UNESCAPED_UNICODE));