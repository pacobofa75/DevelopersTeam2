<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
    // Obtener datos del formulario
    $title = $_POST['title'];
    $user = $_POST['user'];
    $description = $_POST['description'];
    $starTime = $_POST['starTime'];
    $endTime = $_POST['endTime'];

    // Crear un nuevo array con los datos del formulario
    $nuevaTarea = [
        'title' => $title,
        'user' => $user,
        'description' => $description,
        'starTime' => $starTime,
        'endTime' => $endTime
    ];

    // Obtener tareas existentes del archivo JSON (si existe)
    $tareas = [];
    if (file_exists('tasks.json')) {
        $tareasJson = file_get_contents('tasks.json');
        $tareas = json_decode($tareasJson, true);
    }

    // Agregar la nueva tarea al array de tareas
    $tareas[] = $nuevaTarea;

    // Guardar el array actualizado en el archivo JSON
    file_put_contents('tasks.json', json_encode($tareas, JSON_PRETTY_PRINT));

    // Redirigir a la página principal
    header("Location: index.php");
    exit();
}
?>
