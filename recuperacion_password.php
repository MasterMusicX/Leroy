<?php
session_start();
if (!isset($_SESSION["pregunta1"]) || !isset($_SESSION["pregunta2"])) {
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>Las preguntas no están configuradas correctamente en la sesión.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .municipal-bg {
            background-image: url('Gobierno.jpeg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="min-h-screen municipal-bg">
    <div class="min-h-screen bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 space-y-6 transition-all duration-300 hover:shadow-3xl">
            <!-- Encabezado -->
            <div class="text-center space-y-2">
                <div class="mx-auto w-24 h-24 text-blue-600">
                    <svg viewBox="0 0 64 64" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 2L2 22v40h60V22L32 2zm28 56H4V23.5L32 5.5l28 18V58z"/>
                        <path d="M20 26h24v8H20zM20 38h24v8H20zM16 46h8v6h-8zM40 46h8v6h-8zM16 34h8v6h-8zM40 34h8v6h-8z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Recuperación de Contraseña</h1>
                <p class="text-gray-600">Municipalidad de San Francisco</p>
            </div>

            <form action="#" method="post" class="space-y-4">
                <?php
                    include "modelo/conexion.php";
                    include "control/controlador_question.php";
                ?>

                <!-- Pregunta 1 -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pregunta de Seguridad 1</label>
                    <p class="bg-gray-50 p-3 rounded-lg text-gray-700">
                        <?php echo htmlspecialchars($_SESSION["pregunta1"], ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    <input 
                        type="hidden" 
                        name="pregunta1" 
                        value="<?php echo htmlspecialchars($_SESSION["pregunta1"], ENT_QUOTES, 'UTF-8'); ?>"
                    >
                    <input 
                        type="text" 
                        name="respuesta1" 
                        placeholder="Escribe tu respuesta"
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                    >
                </div>

                <!-- Pregunta 2 -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pregunta de Seguridad 2</label>
                    <p class="bg-gray-50 p-3 rounded-lg text-gray-700">
                        <?php echo htmlspecialchars($_SESSION["pregunta2"], ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    <input 
                        type="hidden" 
                        name="pregunta2" 
                        value="<?php echo htmlspecialchars($_SESSION["pregunta2"], ENT_QUOTES, 'UTF-8'); ?>"
                    >
                    <input 
                        type="text" 
                        name="respuesta2" 
                        placeholder="Escribe tu respuesta"
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                    >
                </div>

                <!-- Campos de Contraseña -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nueva Contraseña</label>
                        <input 
                            type="password" 
                            id="nueva_clave" 
                            name="nueva_clave"
                            placeholder="Nueva contraseña"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                        <input 
                            type="password" 
                            id="confirmar_clave" 
                            name="confirmar_clave"
                            placeholder="Confirma tu contraseña"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                    </div>
                </div>

                <!-- Botón de Recuperación -->
                <button 
                    type="submit" 
                    name="recuperar"
                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg flex items-center justify-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    Restablecer Contraseña
                </button>

                <!-- Enlace de Regreso -->
                <div class="text-center pt-4">
                    <a href="index.php" class="text-blue-600 hover:text-blue-800 text-sm">
                        ← Volver al Inicio de Sesión
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>