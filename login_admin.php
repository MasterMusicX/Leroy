<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .admin-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        }
    </style>
</head>
<body class="min-h-screen admin-bg">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 space-y-6">
                       <div class="text-center space-y-2">
                <div class="mx-auto w-20 h-20 text-blue-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 7l6-3m0 0l6 3m-6-3v18m-6-3a3 3 0 01-3-3V7m3 10a3 3 0 003 3h3a3 3 0 003-3V7a3 3 0 00-3-3h-3a3 3 0 00-3 3v10z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Acceso Administrativo</h1>
                <p class="text-sm text-gray-600">Sistema de Gestión Municipal</p>
            </div>

           
            <form action="#" method="POST" class="space-y-4">
            <?php
                    include "control/control_admin.php";
                    include "modelo/conexionn.php";
                ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Correo Institucional</label>
                    <input 
                        type="email" 
                        name="correo" 
               
                        pattern="^[a-zA-Z0-9._%+-]+@(gmail)\.[a-zA-Z]{2,}$"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                        placeholder="usuario@municipalidad.com"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña Maestra</label>
                    <input 
                        type="password" 
                        name="contrasenia" 
                      
                        minlength="12"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                        placeholder="••••••••••••"
                    >
                </div>

                <input type="submit" value="Inicio" name="admin_login"class="w-full bg-blue-900 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-800 transition-colors flex items-center justify-center">
                  
            
               
            </form>
        </div>
    </div>
</body>
</html>