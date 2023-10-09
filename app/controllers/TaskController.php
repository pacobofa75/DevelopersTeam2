<?php
require_once '../app/models/TaskModel.php';

class TaskController extends Controller{
    private $model;
    private $jsonFile;

    public function __construct() {
            $this->jsonFile = "../app/models/data/tasks.json";
            $this->model = new TaskModel();

    }
    public function indexAction()
    {   
        $taskList = new TaskModel();
        // Obtener todas las tareas
        $tasks = $taskList->getAllTasks();

        // Pasar las tareas a la vista
        $this->view->tasks = $tasks;
    }
    public function createTaskAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
            // Obtener datos del formulario
            $title = $_POST['title'];
            $user = $_POST['user'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $startTime = $_POST['starTime'];
            $endTime = $_POST['endTime'];

            $this->model->createTask($title, $user, $description,$status, $startTime, $endTime);
        
            // Redirigir a la página principal
            header("Location: index.php");
            exit;
        }
    }
    public function editTaskAction() {
        if (isset($_GET['id'])) {
            $taskId = $_GET['id'];
            $task = $this->model->getId($taskId);
    
            if ($task !== null) {
                $this->view->task = $task;
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->model->updateTask(
                        $_GET["id"], 
                        $_POST['title'],
                        $_POST['description'],
                        $_POST['status'],
                        $_POST['endTime']
                    );
                    
                    header('Location: showTasks.php');
                    exit;
                }
            } else {
                echo "Task not found";
            }
        }
    }
    
    public function updateTask($taskId, $title, $description, $status, $endTime) {
        return $this->model->updateTask($taskId, $title, $description, $status, $endTime);
    }

    public function showTasksAction() {
        
        $taskList = new TaskModel();
        // Obtener todas las tareas
        $tasks = $taskList->getAllTasks();

        // Pasar las tareas a la vista
        $this->view->tasks = $tasks;
    }
    public function deleteTaskAction() {
        if (isset($_GET['id'])) {
            $taskId = $_GET['id'];
            $taskList = new TaskModel();
    
            if (!$taskList->deleteTask($taskId)) {
                echo "Task not found";
            }
        } else {
            echo "Invalid request";
        }
    }
    
    }
?>