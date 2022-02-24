<?php
require_once 'functions.php';
session_start();
if(!isset($_SESSION['idU']))
    exitJSON(false, "Utente non loggato", 0);

if(!isset($_POST['amount']))
    exitJSON(false, "Inserire una quantità", 0);
if(!is_numeric($_POST['amount']))
    exitJSON(false, "Inserire un valore decimale", 0);

if(!isset($_POST['tokenCSRF']))
    exitJSON(false, "Token CSRF mancante", 0);
if(!is_string($_POST['tokenCSRF']))
    exitJSON(false, 'Il token CSRF non è una stringa', 0);
if($_POST['tokenCSRF'] !== $_SESSION['tokenCSRF'])
    exitJSON(false, 'Token CSRF sbagliato', 0);

if($_POST['amount']<0)
    exitJSON(false, 'Inserito input inaccettabile', 0);

require_once '../database/connectDB.php';
$amount = intval($_POST['amount']*100);
$anon = $_POST['anon'] ?? false;
try{
    $result = makeQuery($conn, "INSERT INTO donation (idU, anonimo, valoreDonazione) VALUES (?, ?, ?)", "iii", $_SESSION['idU'], intval($anon), $amount);
}catch(Exception $e){
    exitJSON(false, "Errore nel database", 0);
}

require_once '../database/disconnectDB.php';
exitJSON(true,"Donazione effettuata", 0);