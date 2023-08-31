<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=aplicacion', 'root', '');
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

if (isset($_POST['tarea'])) {
    $tarea = $_POST['tarea'];

    if (!empty($tarea)) {
        $sql = 'INSERT INTO tasks (tarea,completada) VALUES (?,0)';
        $stmt = $conn->prepare($sql);
        
        if ($stmt->execute([$tarea])) {
            echo "Tarea agregada exitosamente"; // Puedes devolver un mensaje de éxito
        } else {
            echo "Error al agregar la tarea"; // Devuelve un mensaje de error en caso de fallo
        }
    } else {
        echo "La tarea no puede estar vacía"; // Devuelve un mensaje si la tarea está vacía
    }
} else {
    echo "No se recibieron datos válidos"; // Devuelve un mensaje si no se recibieron datos válidos
}
?>