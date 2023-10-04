<?php
require_once '../../../../app/models/TaskModel.php';

class TaskController {
    private $model;

    public function __construct($jsonFile) {
        $this->model = new TaskModel($jsonFile);
    }
    public function createTask($title, $user, $description, $starTime, $endTime) {
        return $this->model->createTask($title, $user, $description, $starTime, $endTime);
    }

    public function editTask($taskId) {
        $task = $this->model->getTask($taskId);
        return $task;
    }

    public function updateTask($taskId, $title, $description) {
        return $this->model->updateTask($taskId, $title, $description);
    }

    public function getAllTasks() {
        return $this->model->getAllTasks();
    }
}
?>
