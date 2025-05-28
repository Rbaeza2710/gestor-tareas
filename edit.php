<?php
include('db.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int)$_GET['id'];

$query = "SELECT * FROM tareas WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
  $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);

  $query = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion' WHERE id=$id";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <h1>Editar Tarea</h1>
    <form method="POST">
      <label for="titulo">Título:</label>
      <input type="text" name="titulo" value="<?php echo htmlspecialchars($row['titulo']); ?>" required>

      <label for="descripcion">Descripción:</label>
      <textarea name="descripcion" required><?php echo htmlspecialchars($row['descripcion']); ?></textarea>

      <button type="submit" class="btn"><i class="fas fa-save"></i> Guardar cambios</button>
    </form>
    <a href="index.php">← Volver</a>
  </div>
</body>
</html>


