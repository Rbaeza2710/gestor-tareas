<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

$query = "INSERT INTO tareas (titulo, descripcion, fecha, estado) VALUES ('$titulo', '$descripcion', '$fecha', 0)";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit();
}
?>