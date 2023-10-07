<?php
class TaskModel {
    private $jsonFile;
    private $tasks;

public function __construct() {
    $this->jsonFile = __DIR__ . "/../../../app/models/data/task.json";
    $this->loadTasks();
    // Debugging: Output the value of $this->jsonFile
    // echo "JSON File Path: " . $this->jsonFile;
}
private function loadTasks() {
    if (file_exists($this->jsonFile)) {
        $jsonContent = file_get_contents($this->jsonFile);
        $this->tasks = json_decode($jsonContent, true);
        var_dump($this->tasks); // Add this line for debugging
    } else {
        $this->tasks = [];
    }
}
    private function readData() {
        // va al archivo json
        $tasksData = file_get_contents($this->jsonFile);

        // lee el archivo json y lo transforma 
         return $data_read = json_decode($tasksData, true);
    }

    public function getId($taskId) {
        foreach ($this->tasks as $task) {
            if ($task['id'] === $taskId) {
                return $task;
            }
        }
        return null;
    }

    public function updateTask($taskId, $title, $description, $status, $endTime) {
        $task = $this->getId($taskId);

        if ($task !== null) {
            // Actualiza los datos editados
            $task['title'] = $title;
            $task['description'] = $description;
            $task['status'] = $status;
            $task['endTime'] = $endTime;

            // guarda los datos editados 
            foreach ($this->tasks as $key => $value) {
                if ($value['id'] === $taskId) {
                    $this->tasks[$key] = $task;
                    break;
                }
            }

            $this->saveTasks();
        }
    }

    public function getAllTasks() {
        return $this->tasks;
    }

    private function saveTasks() : void {
        $result = file_put_contents($this->jsonFile, json_encode($this->tasks, JSON_PRETTY_PRINT));
        
        if ($result === false) {
            die("Failed to save tasks to the JSON file.");
        }
    }
    
        public function createTask($title, $user, $description,$status, $startTime, $endTime) {
            $id = uniqid();//genera un id unico

        // Crear tarea nueva
        $newTask = [
            'id' => $id,
            'title' => $title,
            'user' => $user,
            'description' => $description,
            'status' => $status,
            'startTime' => $startTime,
            'endTime' => $endTime,
        ];

        // la agrega a un array
        $this->tasks[] = $newTask;

        // y lo guarda
        $this->saveTasks($newTask);
    } 
    public function deleteTask($id) {
        $task = $this->getId($id);
    
        if ($task === null) {
            return false; 
        }
        foreach ($this->tasks as $key => $value) {
            if ($value['id'] === $id) {
                unset($this->tasks[$key]);
                $this->saveTasks();
                return true; 
            }
        }
    
        return false; 
    }
    
    }
?>