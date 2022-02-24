<?php
require_once 'functions.php';

function safeSet(&$elem, $val, &$err, $str){
    if(isset($_POST[$val]) && is_string($_POST[$val])){
        if(!strlen(trim($_POST[$val])) && ($val == "firstname" || $val == "lastname"))
            return;
        $elem = trim($_POST[$val]);
        if($err[strlen($err) - 2] == ':')
            $err .= $str;
        else
            $err .= ", " . $str;
    }
}

session_start();
if(!isset($_SESSION['idU'])){
    exitJSON(false, 'Utente non loggato', 0);
}
//checkTokenCSRF(); rimosso per i test
$str = 'Sono stati modificati: ';

require_once '../database/connectDB.php';

$user = getJSONUser($conn);
safeSet($user -> firstname, 'firstname', $str, "nome");
safeSet($user -> lastname, 'lastname', $str, "cognome");
safeSet($user -> email, 'email', $str, "email");
safeSet($user -> city, 'city', $str, "citta");
safeSet($user -> address, 'address', $str, "indirizzo");
if(isset($_POST['pass']) && isset($_POST['confirm'])){
    checkPassword($_POST['pass'], $_POST['confirm']);
    $user -> password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    if($str[strlen($str) - 2] == ':')
        $str .= 'password';
    else
        $str .= ', password';
}

try {
    makeQuery($conn, "UPDATE user SET firstname = ?, lastname = ?, email = ?, password = ?, city = ?, address = ? WHERE idU = ?", "ssssssi",
        $user->firstname, $user->lastname, $user->email, $user->password, $user->city, $user->address, $_SESSION['idU']);
}catch (Exception $e){
    if($e -> getMessage() == 1062) //VIOLAZIONE VINCOLO UNIQUE
        exitJSON(false, "Email già presente", 2);
    exitJSON(false, "Errore database", 1);
}

if(isset($_POST['firstname']) && strlen(trim($_POST['firstname'])))
    $_SESSION['nome'] = htmlspecialchars(html_entity_decode(trim($_POST['firstname'])));

if(isset($_POST['lastname']) && strlen(rtrim($_POST['lastname'])))
    $_SESSION['cognome'] = htmlspecialchars(html_entity_decode(trim($_POST['lastname'])));

exitJSON(true, $str, 0);

require_once '../database/disconnectDB.php';
