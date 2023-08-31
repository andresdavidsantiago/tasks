// Función para cargar y mostrar las tareas
function loadTasks(status) {
    $.ajax({
        url: "get_tasks.php",
        type: "GET",
        data: { status: status },
        success: function(data) {
            $("#taskTableBody").html(data); // Carga el contenido en el tbody
            $("#taskTable").show(); // Muestra la tabla
        }
    });
}

//Cambia de estado la tarea a completada y la muestra en la tabla completada
function marcarCompletada(id, completada) {
    $.ajax({
        url: "complete_task.php", // Cambia esto al nombre de tu archivo PHP para marcar la tarea como completada
        type: "POST",
        data: { id: id, completada: completada },
        success: function() {
            // Deshabilitar el checkbox
            loadTasks("completed");
            $('#check' + id).prop('disabled', true);
        }
    });
}

//funcion para eliminar la tarea
function eliminarTarea(id, status) {
    if (confirm("¿Estás seguro de que deseas eliminar esta tarea?")) {
        $.ajax({
            url: "delete_task.php", // Cambia esto al nombre de tu archivo PHP para eliminar la tarea
            type: "POST",
            data: { id: id },
            success: function() {
                loadTasks(status); // Recarga la lista de tareas (pendientes o completadas) después de eliminar
            }
        });
    }
}

// Mostrar tareas no completadas al hacer clic en el botón
$(document).ready(function() {
    // Mostrar tareas no completadas al hacer clic en el botón 
    $("#btnShowIncomplete").click(function() {
        loadTasks("incomplete");
    });

    // Mostrar tareas completadas al hacer clic en el botón 
    $("#btnShowCompleted").click(function() {
        loadTasks("completed");
    });

    $("#btnGuardarTarea").click(function(e) {
        e.preventDefault(); // Evita que el formulario se envíe por defecto
        
        var tarea = $("#tarea").val(); // Obtén el valor del campo de tarea
        
        if (tarea !== "") { // Verifica si la tarea no está vacía
            $.ajax({
                url: "add_task.php", // Cambia esto al nombre de tu archivo PHP para guardar la tarea
                type: "POST",
                data: { tarea: tarea },
                success: function() {
                    $("#exampleModal").modal("hide"); // Cierra el modal
                    $("#tarea").val(""); // Limpia el campo de tarea
                    loadTasks("incomplete"); // Recarga la lista de tareas pendientes
                }
            });
        }
    });

    $('#exampleModal').on('hidden.bs.modal', function () {
        // Limpiar el campo de tarea
        $('#tarea').val('');
    });
});