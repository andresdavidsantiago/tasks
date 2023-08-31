<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=aplicacion', 'root', '');
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Salir del script si hay un error de conexión
}

$status = $_GET['status']; // Estado de las tareas ("incomplete" o "completed")

if ($status === "incomplete") {
    $sql = "SELECT * FROM tasks WHERE completada = 0";
} elseif ($status === "completed") {
    $sql = "SELECT * FROM tasks WHERE completada = 1";
} else {
    // Estado inválido
    echo "Estado de tareas inválido";
    exit(); // Salir del script si hay un estado inválido
}


// recorrer la tabla 
$resultados = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultados as $row) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['tarea'] . '</td>';
    echo '<td>';
    echo '<div class="form-check">';
    echo '<input class="form-check-input" type="checkbox" value="" id="check' . $row['id'] . '" ' . ($row['completada'] ? 'checked' : '') . ' onchange="marcarCompletada(' . $row['id'] . ', this.checked)">';
    echo '</div>';
    echo '</td>';
    echo '<td>';
    echo '<button type="button" class="btn btn-link text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" onclick="eliminarTarea(' . $row['id'] . ', \'' . $status . '\')">';
    echo '<i class="bi bi-trash"></i>';
    echo '</button>';
    echo '</td>';
    echo '</tr>';
}
?>