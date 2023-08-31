<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=aplicacion', 'root', '');
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

if (isset($_POST['id']) && isset($_POST['completada'])) {
    $id = $_POST['id'];
    $completada = $_POST['completada'] ? 1 : 0;

    // Actualizar la tarea como completada o no completada según el estado del checkbox
    $sql = "UPDATE tasks SET completada = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$completada, $id])) {
        echo "Tarea marcada como completada";
    } else {
        echo "Error al marcar la tarea como completada";
    }
} else {
    echo "No se recibieron datos válidos";
}
?>
