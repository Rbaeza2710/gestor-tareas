<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tarea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Agregar Nueva Tarea</h1>
    <form method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">← Volver</a>
</div>
</body>
</html>
