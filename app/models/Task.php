<?php

class Task
{
    private $id;
    private $title;
    private $description;

    public function __construct($title, $description)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setTitle($title){
        $this->title = $title;
        }
    public function setDescription($description){
        $this->description = $description;
        }
    public function setId($id){
        $this->id = $id;
    }
}
?>
