<?php

require_once __DIR__ . '/../models/Task.php';

class TaskController
{
    private $tasks = [];

    public function __construct()
    {
        $this->loadTasksFromJson();
    }

    public function index()
    {
        return $this->tasks;
    }

    public function store($title, $description, $startTime, $endTime)
    {
        $task = new Task($title, $description, $startTime, $endTime);
        $this->tasks[] = $task;
        $this->saveTasksToJson();
    }
    public function delete($taskId)
{
    // Check if the task with the given index exists and delete it
    if (array_key_exists($taskId, $this->tasks)) {
        unset($this->tasks[$taskId]);

        // Reindex the array to ensure there are no gaps in keys
        $this->tasks = array_values($this->tasks);

        // Save tasks to JSON file after deleting a task
        $this->saveTasksToJson();
    }
}

    private function loadTasksFromJson()
    {
        $jsonFile = __DIR__ . '/../models/data/tasks.json';
        $json = file_get_contents($jsonFile);
    
        if ($json !== false) {
            $decodedTasks = json_decode($json);
    
            if (is_array($decodedTasks)) {
                foreach ($decodedTasks as $taskData) {
                    $task = new Task($taskData->title, $taskData->description, $taskData->startTime, $taskData->endTime);
                    $task->setId($taskData->id); // Assign the ID
                    $this->tasks[] = $task;
                }
            }
        }
    
        if (!is_array($this->tasks)) {
            $this->tasks = [];
        }
    }
    

    private function saveTasksToJson()
    {
        $jsonFile = __DIR__ . '/../models/data/tasks.json';
        $encodedTasks = [];
    
        foreach ($this->tasks as $task) {
            $encodedTasks[] = [
                'id' => $task->getId(),         // Include the ID
                'title' => $task->getTitle(),
                'description' => $task->getDescription(),
                'startTime' => $task->getStartTime(),
                'endTime' =>$task->getEndTime()
            ];
        }
    
        $json = json_encode($encodedTasks, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $json);
    }
}    
