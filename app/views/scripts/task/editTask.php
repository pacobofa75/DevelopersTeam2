<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <!-- Enlace al archivo de estilo de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded p-6 shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Editar Tarea</h1>

        <?php
        require_once '../../../controllers/TaskController.php';

        // Obtener el ID de la tarea desde la URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $taskId = $_GET['id'];
            
            $controller = new TaskController('task.json');
            $task = $controller->editTask($taskId);

            // Verificar si el ID es válido
            if ($task !== null) {
                // Mostrar el formulario con los datos de la tarea
                echo '<form action="procesar_edicion.php" method="post" class="mb-4">';
                echo '<input type="hidden" name="taskId" value="' . $taskId . '">';
                echo '<label class="block mb-2">Nombre:</label>';
                echo '<input type="text" name="title" value="' . $task['title'] . '" class="border rounded py-1 px-2 mb-2">';
                echo '<label class="block mb-2">Descripción:</label>';
                echo '<textarea name="description" class="border rounded py-1 px-2 mb-2">' . $task['description'] . '</textarea>';
                echo '<button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded">Guardar Cambios</button>';
                echo '</form>';
            } else {
                echo '<p>Tarea no encontrada.</p>';
            }
        } else {
            echo '<p>ID de tarea no válido.</p>';
        }
        ?>

        <br>
        <a href="showTasks.php" class="text-blue-500 hover:underline">Volver a la Lista de Tareas</a>
    </div>
</body>
</html>
