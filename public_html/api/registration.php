<?php

require_once 'functions.php';

/**
 * Vincoli password:
 * * Lunghezza: 8
 * * 1 Maiuscola
 * * 1 Numero
 * * 1 Simbolo
 */

session_start();
if(isset($_SESSION['idU']))
    exitJSON(false, 'Utente già loggato', 0);

checkStringPOST('firstname', 'Nome');
checkStringPOST('lastname', 'Cognome',);
checkStringPOST('email', 'Email');
checkStringPOST('pass', 'Password');
checkStringPOST('confirm', 'Password');
checkPassword($_POST['pass'], $_POST['confirm']);

if(!strlen(trim($_POST['firstname'])))
    exitJSON(false, "Nome non valido", 0);

if(!strlen(trim($_POST['lastname'])))
    exitJSON(false, "Cogome non valido", 0);

if(!strlen(trim($_POST['email'])))
    exitJSON(false, "Email non valido", 0);

$city = isset($_POST['city']) && is_string($_POST['city']) && strlen(trim($_POST['city'])) ? trim($_POST['city']) : null;
$address = isset($_POST['address']) && is_string($_POST['address']) && strlen(trim($_POST['address'])) ? trim($_POST['address']) : null;

require_once '../database/connectDB.php';

$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
try {
    $result = makeQuery($conn, "INSERT INTO user (firstname, lastname, email, password, city, address) VALUES (?, ?, ?, ?, ?, ?)",
        "ssssss", trim($_POST['firstname']), trim($_POST['lastname']), trim($_POST['email']), $password_hash, $city, $address);
}catch (Exception $e){
    if($e -> getMessage() == 1062) //VIOLAZIONE VINCOLO UNIQUE
        exitJSON(false, "Email già presente", 2);
    exitJSON(false, "Errore database", 1);
}
$id = $conn -> insert_id;

require_once '../database/disconnectDB.php';

$_SESSION['nome'] = htmlspecialchars(trim($_POST['firstname']));
$_SESSION['cognome'] = htmlspecialchars(trim($_POST['lastname']));
$_SESSION['idU'] = $id;
$_SESSION['tokenCSRF'] = md5(uniqid(mt_rand(), true));
exitJSON(true, '', 0);
?>