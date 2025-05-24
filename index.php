<?php
include('db.php');
$result = mysqli_query($conn, "SELECT * FROM tareas");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Tareas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Mis Tareas</h1>
        <a href="create.php" class="boton-agregar">Agregar Nueva Tarea</a>
        <table>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
