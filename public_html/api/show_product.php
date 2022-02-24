<?php
require_once 'functions.php';

if(!isset($_GET['id']))
    exitJSON(false, "Specificare l'id del prodotto", 0);

//Query
require_once '../database/connectDB.php';
try {
    $result = makeQuery($conn, "SELECT * FROM model WHERE idP = ?", "i", $_GET['id']);
}catch (Exception $e){
    exitJSON(false, "Errore database", 1);
}
if(!$result -> num_rows)
    exitJSON(false, "Prodotto non presente", 0);
$productInfo = $result -> fetch_assoc();
try {
    $resultCat = makeQuery($conn, "SELECT name FROM category NATURAL JOIN model_category WHERE idP = ?", "i", $_GET['id']);
}catch (Exception $e){
    exitJSON(false, "Errore database", 1);
}
require_once '../database/disconnectDB.php';

//Preparazione JSON contenente le categorie
$arrayCat = array();
while ($cat = $resultCat -> fetch_assoc()){
    $arrayCat[] = $cat['nome'];
}

//Preparazione JSON contenente l'output
$resultJSON = (object) $productInfo;
$resultJSON -> result = true;
$resultJSON -> category = $arrayCat;

//Invio token CSRF se l'utente è loggato
session_start();
if(isset($_SESSION['idU'])){
    $resultJSON -> loggato = true;
    $resultJSON -> tokenCSRF = $_SESSION['tokenCSRF'];
}else{
    $resultJSON -> loggato = false;
}

exit(json_encode($resultJSON, JSON_UNESCAPED_UNICODE));