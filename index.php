<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Municipalidad</title>
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
            <!-- Encabezado con logo municipal -->
            <div class="text-center space-y-2">
                <div class="mx-auto w-24 h-24 text-blue-600">
                    <svg viewBox="0 0 64 64" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 2L2 22v40h60V22L32 2zm28 56H4V23.5L32 5.5l28 18V58z"/>
                        <path d="M20 26h24v8H20zM20 38h24v8H20zM16 46h8v6h-8zM40 46h8v6h-8zM16 34h8v6h-8zM40 34h8v6h-8z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Municipalidad de San Francisco</h1>
                <p class="text-gray-600">Sistema de Gestión Ciudadana</p>
            </div>

            <form action="#" method="POST" class="space-y-5">
                <?php
                    include "control/controlador_login.php";
                    include "modelo/conexion.php";
                ?>

                <!-- Campos del formulario -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                    <input 
                        type="email" 
                        name="correo" 
                        onkeypress="return SoloLetras(event);"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-400"
                        placeholder="ejemplo@municipalidad.com"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <input 
                    
                        type="password" 
                        name="contrasenia" 
                       
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-400"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Botón de acceso -->
                <div class="flex flex-col gap-3">
                    <input type="submit" value="Iniciar"  name="ingresar" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg flex items-center justify-center">
                    
                    
                    <!-- Enlace Administrador -->
                    <div class="text-center mt-2">
                        <a href="login_admin.php" class="text-red-600 hover:text-red-800 font-medium text-sm">
                            Acceso Administrativo
                        </a>
                    </div>
                </div>

                <!-- Enlaces inferiores -->
                <div class="flex flex-col sm:flex-row justify-between text-sm space-y-2 sm:space-y-0">
                    <a href="registro.php" class="text-blue-600 hover:text-blue-800 text-center sm:text-left">
                        Crear Cuenta Municipal
                    </a>
                    <span class="hidden sm:inline">|</span>
                    <a href="inicio_recuperar.php" class="text-gray-600 hover:text-gray-800 text-center sm:text-right">
                        Recuperar Contraseña
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="retroceso.js"></script>
    <script src="validaciones.js"></script>
</body>
</html>