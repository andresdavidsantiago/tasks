<!DOCTYPE html>
<html lang="es">

<head>
    <title>Aplicacion lista de tareas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/ajax.js"></script>
</head>

<body>
    <header class="containertext">
        <div class="card">
            <div class="card-body">
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-plus-lg"></i> Agregar Tarea
                    </button>

                    <!-- Botón para mostrar tareas no completadas -->
                    <button type="button" class="btn btn-primary" id="btnShowIncomplete">Tareas Pendientes</button>

                    <!-- Botón para mostrar tareas completadas -->
                    <button type="button" class="btn btn-primary" id="btnShowCompleted">Tareas Completadas</button>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Tarea</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="tarea" class="form-label">Tarea</label>
                                        <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="helpId" placeholder="Escriba su tarea">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" name="agregar_tarea" id="btnGuardarTarea" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </header>
    <main class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle" id="taskTable" style="display: none;">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Tarea</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody id="taskTableBody">
                    <!-- Aquí se cargarán las filas de la tabla mediante AJAX -->
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <!-- Pie de página -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>