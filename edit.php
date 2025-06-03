<?php
include('db.php');

$id = $_GET['id'];
$query = "SELECT * FROM tareas WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $fecha = $_POST['fecha'];

  $query = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion', fecha='$fecha' WHERE id=$id";
  mysqli_query($conn, $query);
  header("Location: index.php");
  exit();
}
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
      <input type="text" name="titulo" value="<?= $row['titulo'] ?>" required>
      <textarea name="descripcion" required><?= $row['descripcion'] ?></textarea>
      <input type="date" name="fecha" value="<?= $row['fecha'] ?>" required>
      <button type="submit">Guardar</button>
    </form>
  </div>
</body>
</html>


