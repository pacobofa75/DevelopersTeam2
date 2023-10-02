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
        require __DIR__ .'/../../../app/controllers/TaskController.php'; // Adjust the path as needed

        $taskController = new TaskController();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['action'] === 'create') {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $taskController->store($title, $description);
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
            <label for="description" class="block mt-2">Descripción:</label>
            <input type="text" name="description" required class="border rounded py-1 px-2">
            <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded mt-2">Agregar Tarea</button>
        </form>

        <ul>
            <?php foreach ($tasks as $taskId => $task) : ?>
                <li class="mb-2">
                    <?= $task->getTitle(); ?> - <?= $task->getDescription(); ?>
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
