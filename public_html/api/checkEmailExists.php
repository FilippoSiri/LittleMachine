<?php
session_start();
require_once 'functions.php';
checkStringPOST('email','Email');
require_once '../database/connectDB.php';
try {
    $result = makeQuery($conn, "SELECT idU, email FROM user WHERE email = ?", "s", $_POST['email']);
}catch(Exception $e){
    exitJSON(false, "Errore database", 1);
}
require_once '../database/disconnectDB.php';

if ($result->num_rows == 1){
    $tmp = $result -> fetch_assoc();
    if(!isset($_SESSION['idU']) || $tmp['idU'] != $_SESSION['idU'])
        exitJSON(true, 'Email già esistente', 0);
}
exitJSON(false, '', 0);
?>