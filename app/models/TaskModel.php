<?php
class TaskModel {
    private $jsonFile;
    private $tasks;

    public function __construct($jsonFile) {
        $this->jsonFile = $jsonFile;
        $this->loadTasks();
    }

    private function loadTasks() {
        if (file_exists($this->jsonFile)) {
            $jsonContent = file_get_contents($this->jsonFile);
            $this->tasks = json_decode($jsonContent, true);
        } else {
            $this->tasks = [];
        }
    }

    public function getTask($taskId) {
        if (array_key_exists($taskId, $this->tasks)) {
            return $this->tasks[$taskId];
        } else {
            return null;
        }
    }

    public function updateTask($taskId, $title, $description) {
        if (array_key_exists($taskId, $this->tasks)) {
            $this->tasks[$taskId] = [
                'title' => $title,
                'description' => $description,
            ];
            $this->saveTasks();
            return true;
        } else {
            return false;
        }
    }

    public function getAllTasks() {
        return $this->tasks;
    }

    private function saveTasks() {
        file_put_contents($this->jsonFile, json_encode($this->tasks, JSON_PRETTY_PRINT));
    }
}
?>
