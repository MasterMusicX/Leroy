<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Reporte</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Actualizar Reporte</h2>

        <?php
        include "modelo/conexion.php";
        include "control/Control_Edit_Cruds.php";
        ?>

        <form method="POST" class="space-y-4">
           
            <div class="flex flex-col">
                <label for="descripcion" class="text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="descripcion" value="<?= $datos['descripcion'] ?>" required
                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div class="flex flex-col">
                <label for="fecha" class="text-sm font-medium text-gray-700">Fecha</label>
                <input type="text" name="fecha" value="<?= $datos['fecha'] ?>" required
                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

          
            <div class="flex flex-col">
                <label for="ubicacion" class="text-sm font-medium text-gray-700">Ubicacion</label>
                <input type="text"  name="ubicacion" value="<?= $datos['ubicacion'] ?>" required
                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
           
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Actualizar
            </button>

            <!-- Botón de Volver -->
            <a href="admin_aliment.php"
                class="block text-center w-full bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Volver
            </a>
        </form>
    </div>
</body>
</html>