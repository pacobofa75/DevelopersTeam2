<?php
require_once('modelo/Task.php');

class TaskController {
    private $model;

    public function __construct($jsonFile) {
        $this->model = new Task($jsonFile);
    }

    public function index() {
        $tasks = $this->model->getAllTasks();
        include('vista/index.php');
    }

    public function crearTarea($taskName) {
        // Obtener tareas existentes
        $tasks = $this->model->getAllTasks();

        // Crear nueva tarea
        $newTaskId = count($tasks) + 1;
        $newTask = [
            'id' => $newTaskId,
            'task_name' => $taskName
        ];

        // Agregar la nueva tarea al array de tareas
        $tasks[] = $newTask;

        // Guardar el array actualizado en el archivo JSON
        file_put_contents('datos/tasks.json', json_encode($tasks));

        // Redirigir de vuelta a la página principal
        header('Location: index.php');
    }

    // Implementa otras acciones del controlador según sea necesario
}
?>

