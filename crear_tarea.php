<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar el nombre de la tarea del formulario
    $taskName = $_POST['task_name'];

    // Validar y crear la tarea
    if (!empty($taskName)) {
        // Incluir el controlador
        require_once('controlador/taskController.php');
        
        // Crear una instancia del controlador con la ruta del archivo JSON
        $controller = new TaskController('datos/tasks.json');
        
        // Llamar al método crearTarea para agregar la nueva tarea
        $controller->crearTarea($taskName);
    }
    
    // Redirigir de vuelta a la página principal
    header('Location: index.php');
}
?>
