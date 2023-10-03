<?php
// Verificar si se recibió el ID de la tarea y los datos del formulario
if (isset($_POST['taskId'], $_POST['title'], $_POST['description'])) {
    $taskId = $_POST['taskId'];
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    // Cargar las tareas desde el archivo JSON
    $jsonFile = 'task.json';
    $tasks = [];

    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        $tasks = json_decode($jsonContent, true);
    }

    // Verificar si el ID de la tarea existe en el arreglo de tareas
    if (array_key_exists($taskId, $tasks)) {
        // Actualizar los datos de la tarea
        $tasks[$taskId]['title'] = $title;
        $tasks[$taskId]['description'] = $description;

        // Guardar los cambios en el archivo JSON
        file_put_contents($jsonFile, json_encode($tasks));

        // Redirigir de vuelta a la página de lista de tareas con un mensaje de éxito
        header('Location: lista_tareas.php?success=1');
        exit();
    } else {
        echo 'Tarea no encontrada.';
    }
} else {
    echo 'Datos de tarea no válidos.';
}
?>
