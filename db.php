<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gestor";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Error al conectar: " . mysqli_connect_error());
}
?>
