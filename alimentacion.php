<?php
session_start();
if (!isset($_SESSION['correo']) ) {
    header("Location: alimentacion.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Alimentación</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <header class="bg-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold">Portal de Reportes Municipales</h1>
            <p class="mt-1 text-sm opacity-90">Departamento de Seguridad Alimentaria</p>
        </div>
    </header>

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <ul class="flex flex-col md:flex-row gap-4 py-4">
                <li>
                    <a href="login.php" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Reporte de Hurto
                    </a>
                </li>
                <li>
                    <a href="alimentacion.php" class="flex items-center px-4 py-2 text-blue-800 hover:bg-blue-50 rounded-lg transition-colors font-semibold">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Reportes de Alimentación
                    </a>
                </li>
                <li>
                    <a href="recre.php" class="flex items-center px-4 py-2 text-gray-600 hover:bg-blue-50 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1m-2 1l2-1m-2 1v2.5M12 11l-2 1m2-1l2-1m-2 1v2.5M6 7l-2 1m2-1l-2-1m2 1v2.5M18 20l-2 1m2-1l-2-1m2 1v-2.5M12 18l-2 1m2-1l2-1m-2 1v-2.5M6 20l-2 1m2-1l-2-1m2 1v-2.5"/>
                        </svg>
                        Reportes de Recreación
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        <section class="bg-white rounded-xl shadow-md p-6 max-w-2xl mx-auto">
            <h2 class="text-xl font-semibold text-blue-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Reporte de Situación Alimentaria
            </h2>
            
            <form action="#" method="POST" class="space-y-4">
            <?php
                  include "control/control_Food.php";
                  include "modelo/conexion.php";
                  ?>
                <div>
                    <label for="descripcion-alimentacion" class="block text-sm font-medium text-gray-700 mb-2">
                        Descripción del Problema
                    </label>
                    <textarea
                        name="descripcion" 
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Ej: Distribución irregular de alimentos, calidad de los productos..."
                    ></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="fecha-alimentacion" class="block text-sm font-medium text-gray-700 mb-2">
                            Fecha del Reporte
                        </label>
                        <input 
                            type="date"  
                            name="fecha"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                    </div>

                    <div>
                        <label for="ubicacion-alimentacion" class="block text-sm font-medium text-gray-700 mb-2">
                            Ubicación Exacta
                        </label>
                        <input 
                            type="text" 
                            onkeypress="return SoloLetras(event);"
                            name="ubicacion"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Ej: Comedor Comunitario N°5, Sector Este"
                        >
                    </div>
                </div>

                <input 
                    type="submit" 
                    value="Enviar Reporte"
                    class="w-full bg-orange-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-orange-700 transition-colors flex items-center justify-center"
                 name="ReporteA"
                 >
                 
            </form>
        </section>
    </main>

    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-6 text-center text-sm">
            <p>&copy; 2025 Municipalidad de San Francisco - Programa Alimentario</p>
            <p class="mt-2 opacity-75">Sistema de Reportes Ciudadanos v2.0</p>
        </div>
    </footer>
    <script src="validaciones.js"></script>
</body>
</html>