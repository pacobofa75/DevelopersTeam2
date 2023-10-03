<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
    <!-- Agrega el enlace al archivo de estilo de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded p-6 shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>

        <?php
        // Cargar las tareas desde el archivo JSON
        $jsonFile = 'task.json';
        $tasks = [];

        if (file_exists($jsonFile)) {
            $jsonContent = file_get_contents($jsonFile);
            $tasks = json_decode($jsonContent, true);
        }

        // Mostrar las tareas
        if (!empty($tasks)) {
            echo '<ul class="list-disc pl-6">';
            foreach ($tasks as $taskId => $task) {
                echo '<li class="mb-2">' . $task['title'] . ' ';
                echo '<a href="editar_tarea.php?id=' . $taskId . '" class="text-blue-500 hover:underline">Editar</a></li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No hay tareas disponibles.</p>';
        }
        ?>

        <br>
        <a href="index.php" class="text-blue-500 hover:underline">Volver</a>
    </div>
</body>
</html>