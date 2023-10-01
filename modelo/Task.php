<?php
class Task {
    private $data;

    public function __construct($jsonFile) {
        $this->data = json_decode(file_get_contents($jsonFile), true);
    }

    public function getAllTasks() {
        return $this->data;
    }

    
}
?>
