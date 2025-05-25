<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Reportes de Luz</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <a href="admin.php" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
            Salir
        </a>

        <h1 class="text-3xl font-bold mb-6 text-gray-800">Reportes de Alimnetacion</h1>

        <!-- Tabla de registros -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ubicación</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">descripcion</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">fecha</th>
  
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM alimentacion");
                    while ($datos = $sql->fetchObject()) { 
                        $id_encriptado = base64_encode($datos->id_aliment);
                        
                    ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?= htmlspecialchars($datos->ubicacion, ENT_QUOTES, 'UTF-8') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?= htmlspecialchars($datos->descripcion, ENT_QUOTES, 'UTF-8') ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?= htmlspecialchars($datos->fecha, ENT_QUOTES, 'UTF-8') ?>
                        </td>
                       
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex gap-2">
                                <a href="Edit_Food.php?id=<?= urlencode($id_encriptado)?>"class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">Editar</a>

                                <a href="Delete_Food.php?id=<?= urlencode($id_encriptado) ?>" 
                                   class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition-colors"
                                   onclick="return confirm('¿Estás seguro de eliminar este registro?')">
                                    Eliminar
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>