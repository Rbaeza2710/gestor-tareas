<?php
include('db.php');
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $query = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion' WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM tareas WHERE id=$id");
$tarea = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Editar Tarea</h1>
    <form method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $tarea['titulo']; ?>" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?php echo $tarea['descripcion']; ?></textarea>

        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">← Volver</a>
</div>
</body>
</html>
