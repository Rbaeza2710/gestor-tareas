<?php
$conn = mysqli_connect("localhost", "root", "", "gestor");

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>

