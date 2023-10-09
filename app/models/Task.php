<?php
//agregar status
class Task
{
    private $id;
    private $title;
    private $user;
    private $description;
    private $startTime;
    private $endTime;

    public function __construct($title, $user, $description, $startTime, $endTime)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->user = $user;
        $this->description = $description;
        $this ->startTime = $startTime;
        $this ->endTime = $endTime;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getStartTime(){
        return $this -> startTime; 
    }
    public function getEndTime(){
        return $this -> endTime; 
    }
}
?>
