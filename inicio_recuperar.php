<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .municipal-bg {
            background-image: url('Gobierno.png');
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
                    include "control/controlador_inicio_rec.php";
                    include "modelo/conexion.php";
                ?>

                <!-- Instrucciones -->
                <p class="text-gray-600 text-center">
                    Ingrese su correo electrónico para recuperar su contraseña
                </p>

                <!-- Campo Correo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                    <input 
                        type="email" 
                        name="correo"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-400"
                        placeholder="ejemplo@municipalidad.com"
                    >
                </div>

                <!-- Botón de Envío -->
                <input 
                    type="submit" 
                    value="Continuar"
                    name="ingresar"
                    class="w-full bg-orange-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-orange-700 transition-colors shadow-md hover:shadow-lg flex items-center justify-center"
                >
                    

                <!-- Enlaces Adicionales -->
                <div class="flex flex-col items-center space-y-2 pt-4">
                    <a href="registro.php" class="text-blue-600 hover:text-blue-800 text-sm">
                        ¿No tienes cuenta? Regístrate aquí
                    </a>
                    <a href="index.php" class="text-gray-600 hover:text-gray-800 text-sm">
                        ← Volver al Inicio de Sesión
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
</html>