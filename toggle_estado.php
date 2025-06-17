<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener el estado actual
    $query = "SELECT estado FROM tareas WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $estado_actual = $row['estado'];
        $nuevo_estado = ($estado_actual == 1) ? 0 : 1;

        // Actualizar el estado
        $updateQuery = "UPDATE tareas SET estado = $nuevo_estado WHERE id = $id";
        mysqli_query($conn, $updateQuery);
    }
}

header("Location: index.php");
exit();
?>
