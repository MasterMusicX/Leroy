<?php
session_start();
include "modelo/conexion.php";
include "control/control_admin.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Panel de Administración</h1>
                    <p class="text-sm">Bienvenido, <?php echo htmlspecialchars($_SESSION['correo']); ?></p>
                </div>
                <div class="flex gap-4">
                    <a href="admin.php" class="hover:text-blue-200">Inicio</a>
                    <a href="admin_aliment.php" class="hover:text-blue-200">Alimentación</a>
                    <a href="admin_recre.php" class="hover:text-blue-200">Recreación</a>
                    <a href="admin_hurt.php" class="hover:text-blue-200">Hurto</a>
                    <a href="login_admin.php" class="hover:text-red-300">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-semibold text-blue-800 mb-6">Seleccione una categoría del menú superior</h2>
        </div>
    </main>
</body>
</html>