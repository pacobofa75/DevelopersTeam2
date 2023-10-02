<!DOCTYPE html>
<html>
<head>
    <title>Crear Tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Crear Tarea</h1>

        <form method="post" action="procesar_formulario.php" class="mb-4">
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
    </div>
</body>
</html>

