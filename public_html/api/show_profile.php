<?php
require_once 'functions.php';

session_start();
if(!isset($_SESSION['idU']))
    exitJSON(false, "Utente non loggato", 0);

require_once '../database/connectDB.php';
$JSONUser = getJSONUser($conn);
$JSONUser -> tokenCSRF = $_SESSION['tokenCSRF'];
$JSONUser -> firstname = htmlspecialchars($JSONUser -> firstname);
$JSONUser -> lastname = htmlspecialchars($JSONUser -> lastname);
$JSONUser -> email = htmlspecialchars($JSONUser -> email);
$JSONUser -> city = htmlspecialchars($JSONUser -> city);
$JSONUser -> address = htmlspecialchars($JSONUser -> address);
unset($JSONUser -> idU);
unset($JSONUser -> password);
require_once '../database/disconnectDB.php';

exit(json_encode($JSONUser, JSON_UNESCAPED_UNICODE));

