<?php
session_start();
require_once 'functions.php';
if(isset($_SESSION['idU']))
    exitJSON(false, 'Utente già loggato', 0);

$objJSON = new stdClass();
checkStringPOST('email', 'Email');
checkStringPOST('pass', 'Password');

require_once '../database/connectDB.php';
try {
    $result = makeQuery($conn, "SELECT idU, firstname, lastname, password FROM user WHERE email = ?", "s", $_POST['email']);
}catch (Exception $e){
    exitJSON(false, "Errore database", 1);
}
require_once '../database/disconnectDB.php';
if(!$result -> num_rows){
    exitJSON(false, 'Email sbagliata', 0);
}

$row = $result->fetch_assoc();

if(password_verify($_POST['pass'], $row['password'])){
    $_SESSION['idU'] = $row['idU'];
    $_SESSION['nome'] = htmlspecialchars($row['firstname']);
    $_SESSION['cognome'] = htmlspecialchars($row['lastname']);
    $_SESSION['tokenCSRF'] = md5(uniqid(mt_rand(), true));
    exitJSON(true, '', 0);
}

exitJSON(false, 'Password sbagliata', 0);
?>




