<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=aplicacion', 'root', '');
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Salir del script si hay un error de conexión
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Preparar y ejecutar la consulta para eliminar la tarea por ID
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$id])) {
        echo "Tarea eliminada exitosamente"; // Devuelve un mensaje de éxito
    } else {
        echo "Error al eliminar la tarea"; // Devuelve un mensaje de error en caso de fallo
    }
} else {
    echo "No se recibieron datos válidos"; // Devuelve un mensaje si no se recibieron datos válidos
}

// Redireccionar al archivo index.php
header("Location: index.php?status=" . $_GET['status']);
exit();
?>
