<!-- vista/index.php -->
<!-- Muestra la lista de tareas -->
<?php
foreach ($tasks as $task) {
    echo $task['id'] . ". " . $task['task_name'] . "<br>";
}
?>

<!-- Formulario para crear nuevas tareas -->
<form action="crear_tarea.php" method="post">
    <label for="task_name">Nueva Tarea:</label>
    <input type="text" id="task_name" name="task_name" required>
    <button type="submit">Agregar Tarea</button>
</form>