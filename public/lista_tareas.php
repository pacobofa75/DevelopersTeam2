<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>

    <?php
    // Cargar las tareas desde el archivo JSON
    $jsonFile = 'tasks.json';
    $tasks = [];

    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        $tasks = json_decode($jsonContent, true);
    }

    // Mostrar las tareas
    if (!empty($tasks)) {
        echo '<ul>';
        foreach ($tasks as $task) {
            echo '<li>' . $task['title'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No hay tareas disponibles.';
    }
    ?>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>

