<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Tareas</h1>

        <?php
        require __DIR__ .'/../app/controllers/TaskController.php'; 

        $taskController = new TaskController();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['action'] === 'create') {
                $title = $_POST['title'];
                $user = $_POST['user'];
                $description = $_POST['description'];
                $starTime = $_POST['starTime'];
                $endTime = $_POST['endTime'];
                $taskController->store($title, $user, $description,  $starTime, $endTime);
            } elseif ($_POST['action'] === 'delete') {
                $taskId = $_POST['task_id'];
                $taskController->delete($taskId);
            }
        }

        $tasks = $taskController->index();
        ?>

        <form method="post" class="mb-4">
            <input type="hidden" name="action" value="create">
            <label for="title" class="block">Título:</label>
            <input type="text" name="title" required class="border rounded py-1 px-2">
            <label for="user" class="block">Usuario:</label>
            <input type="text" name="user" required class="border rounded py-1 px-2">
            <label for="description" class="block mt-2">Descripción:</label>
            <input type="text" name="description" required class="border rounded py-1 px-2">
            <label for="starTime" class="block mt-2">Inicio:</label>
            <input type="datetime-local" name="starTime" required class="border rounded py-1 px-2">
            <label for="endTime" class="block mt-2">Final:</label>
            <input type="datetime-local" name="endTime" required class="border rounded py-1 px-2">
            <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded mt-2">Agregar Tarea</button>
        </form>

        <ul>
            <?php foreach ($tasks as $taskId => $task) : ?>
                <li class="mb-2">
                    <?= $task->getTitle(); ?> - <?= $task->getUser(); ?> - <?= $task->getDescription(); ?>
                    Inicio: <?= $task->getStartTime(); ?> - Fin: <?= $task->getEndTime(); ?>
                    <form method="post" class="inline-block ml-2">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="task_id" value="<?= $taskId; ?>">
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
