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

    <!-- Formulario -->
    <form action="create.php" method="POST">
      <input type="text" name="titulo" placeholder="Título de la tarea..." required>
      <textarea name="descripcion" placeholder="Descripción..." required></textarea>
      <input type="date" name="fecha" required>
      <input type="submit" value="Agregar tarea">
    </form>

    <!-- Botón para ver calendario -->
    <a href="calendar.html" class="calendar-button"><i class="fas fa-calendar-alt"></i> Ver calendario</a>

    <!-- Tabla de tareas -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Descripción</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('db.php');
        $query = "SELECT * FROM tareas ORDER BY fecha";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$row['id']}</td>";
          echo "<td>{$row['titulo']}</td>";
          echo "<td>{$row['descripcion']}</td>";
          echo "<td>{$row['fecha']}</td>";
          echo "<td>";
          echo $row['estado'] == 1 ? "<span class='completada'>Completada</span>" : "<span class='pendiente'>Pendiente</span>";
          echo "</td>";
          echo "<td class='actions'>
                  <a href='edit.php?id={$row['id']}'><i class='fas fa-edit'></i> Editar</a>
                  <a class='delete' href='delete.php?id={$row['id']}'><i class='fas fa-trash-alt'></i> Eliminar</a>
                  <a class='cambiar-estado' href='toggle_estado.php?id={$row['id']}'><i class='fas fa-check-circle'></i> Cambiar estado</a>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

