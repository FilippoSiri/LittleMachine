<?php
require_once '../../creds.php';

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed");
}
?>