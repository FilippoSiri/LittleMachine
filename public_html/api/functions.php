<?php
function exitJSON($result, $error, $errno){
    $objJSON = new stdClass();
    $objJSON -> result = $result;
    $objJSON -> error = $error;
    $objJSON -> errno = $errno;
    exit(json_encode($objJSON, JSON_UNESCAPED_UNICODE));
}

function checkStringPOST($type, $error){
    if(!isset($_POST[$type])){
        exitJSON(false, $error.' mancante', 0);
    }
    if(!is_string($_POST[$type])){
        exitJSON(false, 'Formato non valido di: '.$error, 0);
    }
    if(strlen($_POST[$type]) == 0){
        exitJSON(false, $error.' troppo breve', 0);
    }
}

function checkStringGet($type, $error){
    if(!isset($_GET[$type])){
        exitJSON(false, $error.' mancante', 0);
    }
    if(!is_string($_GET[$type])){
        exitJSON(false, 'Formato non valido di: '.$type, 0);
    }
}

function checkPassword($pass, $confirm){
    if(!is_string($pass))
        exitJSON(false, "La password (pass) deve essere una stringa", 0);
    if(!is_string($confirm))
        exitJSON(false, "La password (confirm) deve essere una stringa", 0);
    if(strlen($pass) < 12)
        exitJSON(false, "La password deve essere lunga almeno 12 caratteri", 0);
    if($pass !== $confirm)
        exitJSON(false, "Password e conferma password sono diverse", 0);
}

function getJSONUser($conn){
    if(!$result = $conn -> query("SELECT * FROM user WHERE idU = ".$_SESSION['idU'])){
        require_once '../database/disconnectDB.php';
        exitJSON(false, "Errore database", 1);
    }
    if(!$result -> num_rows) {
        $userJSON = new stdClass();
        $userJSON -> result = false;
        return $userJSON;
    }
    $userJSON = $result -> fetch_object();
    $userJSON -> result = true;
    return $userJSON;
}

function getJSONCart($conn){
    if(!$result = $conn -> query("SELECT idP, name, qtaProd, price, imgPath, imgDescription FROM cart NATURAL JOIN model WHERE idU = ".$_SESSION['idU'])){
        require_once '../database/disconnectDB.php';
        exitJSON(false, "Errore database", 1);
    }
    $cartJSON = new stdClass();
    $cartJSON -> result = true;
    $cart = array();
    $tot = 0;
    while ($elem = $result -> fetch_assoc()){
        $cart[] = $elem;
        $tot += ($elem['price'] * $elem['qtaProd']) / 100.0;
        /*
        Nel database viene inserito come valore di default:
        imgPath = "/progettoSAW/img/products/default.jpeg"
        imgDescription = "Immagine di default"
        */
    }
    $cartJSON -> tot = $tot;
    $cartJSON -> cart = $cart;
    return $cartJSON;
}

function makeQuery($conn, $sql, $type, ...$param){
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($type, ...$param);
    if(!$stmt->execute())
        throw new Exception($stmt -> errno);
    $result = $stmt -> get_result();
    $stmt -> close();
    return $result;
}

?>