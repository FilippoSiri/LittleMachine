<?php
require_once 'functions.php';
session_start();
if(!isset($_SESSION['idU']))
    exitJSON(false, "Utente non loggato", 0);

checkStringGet('tokenCSRF', "Token CSRF");

if($_GET['tokenCSRF'] !== $_SESSION['tokenCSRF'])
    exitJSON(false, 'Token CSRF sbagliato', 0);

require_once '../database/connectDB.php';

if(!$resultAddress = $conn -> query("SELECT city, address FROM user WHERE idU = ".$_SESSION['idU'])){
    require_once '../database/disconnectDB.php';
    exitJSON(false, "Errore database", 1);
}
if(!$resultAddress -> num_rows)
    exitJSON(false, "Utente non presente", 0);
$address = $resultAddress -> fetch_assoc();
if($address['city'] == null || !strlen(trim($address['city'])))
    exitJSON(false, "Inserire la città nell'indirizzo", 0);
if($address['address'] == null || !strlen(trim($address['address'])))
    exitJSON(false, "Inserire l'indirizzo", 0);

$conn -> autocommit(false);

if(!$result = $conn -> query("SELECT m.name, m.idP, c.qtaProd, m.qta, m.price  FROM cart c NATURAL JOIN model m WHERE idU = ".$_SESSION['idU'])){
    require_once '../database/disconnectDB.php';
    exitJSON(false, "Errore database", 1);
}
$results = array();

while ($row = $result -> fetch_assoc()) {
    $tmp = array();
    $tmp['esito'] = $conn->query("UPDATE model SET qta = qta - " . $row['qtaProd'] . " WHERE idP = " . $row['idP']);
    $tmp['product'] = $row['name'];
    $tmp['idP'] = $row['idP'];
    $tmp['qtaProd'] = $row['qtaProd'];
    $tmp['price'] = $row['price'];
    $results[] = $tmp;
}

$notAvailableProducts = array();
$failed = false;

foreach ($results as $t){
    if(!$t['esito']) {
        $notAvailableProducts[] = $t['product'];
        $failed = true;
    }
}

if($failed)
    $conn -> rollback();
else{
    try{
        makeQuery($conn, "INSERT INTO orders (idU, city, address) VALUES  (?, ?, ?)", "iss", $_SESSION['idU'], $address['city'], $address['address']);
        $idO = $conn -> insert_id;
        foreach ($results as $r){
            if(!$conn -> query("INSERT INTO orders_product (idO, idP, qta, price) VALUES ($idO, ".$r['idP'].", ".$r['qtaProd'].", ".$r['price'].")"))
                throw new Exception();
        }
    }catch(Exception $e){
        $conn->rollback();
        require_once '../database/disconnectDB.php';
        exitJSON(false, "Errore nel database", 1 );
    }
}

if(!$failed && !$conn -> query("DELETE FROM cart WHERE idU = ".$_SESSION['idU'])){
    $conn -> rollback();
    require_once '../database/disconnectDB.php';
    exitJSON(false, "Errore nel database", 1);
}

$conn -> autocommit(true);
require_once '../database/disconnectDB.php';

if($failed){
    $s = "Prodotti non disponibili: ";
    $first = true;
    foreach ($notAvailableProducts as $p){
        if(!$first)
            $s .= ", ";
        $s .= $p;
        $first = false;
    }
    exitJSON(false, $s, 0);
}
exitJSON(true, "Prodotti acquistati. <br>Verranno spediti al seguente indirizzo: ".htmlspecialchars($address['address'])." ".htmlspecialchars($address['city']), 0);
