<?php
include('db.php');

header('Content-Type: application/json');

$query = "SELECT id, titulo, descripcion, fecha FROM tareas WHERE fecha IS NOT NULL";
$result = mysqli_query($conn, $query);

$tareas = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tareas[] = [
        'id' => $row['id'],
        'title' => $row['titulo'],
        'description' => $row['descripcion'],
        'date' => $row['fecha']
    ];
}

echo json_encode($tareas);
?>
