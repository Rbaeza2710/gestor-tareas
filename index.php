<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestor de Tareas</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <h1>Gestor de Tareas</h1>

    <a href="create.php" class="btn">Agregar Nueva Tarea</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM tareas";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$row['id']}</td>";
          echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
          echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
          echo "<td class='actions'>
                  <a href='edit.php?id={$row['id']}'><i class='fas fa-edit'></i> Editar</a>
                  <a class='delete' href='delete.php?id={$row['id']}' onclick=\"return confirm('¿Seguro que quieres eliminar esta tarea?');\"><i class='fas fa-trash-alt'></i> Eliminar</a>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>


