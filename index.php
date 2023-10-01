<?php
// Cargar controlador y ejecutar la acción
require_once('controlador/TaskController.php');
$controller = new TaskController('datos/tasks.json');
$controller->index();
?>
