<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Municipalidad</title>
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
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-8 space-y-6 transition-all duration-300 hover:shadow-3xl">
            
            <div class="text-center space-y-2">
                <div class="mx-auto w-24 h-24 text-blue-600">
                    <svg viewBox="0 0 64 64" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 2L2 22v40h60V22L32 2zm28 56H4V23.5L32 5.5l28 18V58z"/>
                        <path d="M20 26h24v8H20zM20 38h24v8H20zM16 46h8v6h-8zM40 46h8v6h-8zM16 34h8v6h-8zM40 34h8v6h-8z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Registro Ciudadano</h1>
                <p class="text-gray-600">Municipalidad de San Francisco</p>
            </div>

            <form action="registro.php" method="post" class="space-y-4">
                <?php
                    include "control/controlador_registrar.php";
                    include "modelo/conexion.php";
                ?>

                <!-- Sección de Datos Personales -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Ingrese su nombre"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido</label>
                        <input 
                            type="text" 
                            id="apellido" 
                            name="apellido"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Ingrese su apellido"
                        >
                    </div>
                </div>

                <!-- Sección de Credenciales -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                        <input 
                            type="email" 
                            id="correo" 
                            name="correo"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="ejemplo@municipalidad.com"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                        <input 
                            type="password" 
                            id="contraseña" 
                            name="contrasenia"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="••••••••"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                        <input 
                            type="password" 
                            id="confirm_password" 
                            name="confirm_password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="••••••••"
                        >
                    </div>
                </div>

                <!-- Preguntas de Seguridad -->
                <div class="space-y-4">
                    <!-- Pregunta 1 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pregunta de Seguridad 1</label>
                        <select 
                            id="pregunta1" 
                            name="pregunta1"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                            <option value="">Seleccione una pregunta</option>
                            <option value="nombre_mascota">¿Cuál es el nombre de tu primera mascota?</option>
                            <option value="escuela_primaria">¿Cuál es el nombre de tu escuela primaria?</option>
                            <option value="ciudad_nacimiento">¿En qué ciudad naciste?</option>
                        </select>
                        <input 
                            type="text" 
                            id="respuesta1" 
                            name="respuesta1"
                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Ingrese su respuesta"
                        >
                    </div>

                    <!-- Pregunta 2 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pregunta de Seguridad 2</label>
                        <select 
                            id="pregunta2" 
                            name="pregunta2"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                            <option value="">Seleccione una pregunta</option>
                            <option value="Color_Favorito">¿Color Favorito?</option>
                            <option value="Auto_Preferido">Marca de auto preferida</option>
                            <option value="Pelicula_Favorita">¿Película Favorita?</option>
                        </select>
                        <input 
                            type="text" 
                            id="respuesta2" 
                            name="respuesta2"
                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Ingrese su respuesta"
                        >
                    </div>

                    <!-- Pregunta 3 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pregunta de Seguridad 3</label>
                        <select 
                            id="pregunta3" 
                            name="pregunta3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        >
                            <option value="">Seleccione una pregunta</option>
                            <option value="nombre_mascota">¿Cuál es el nombre de tu primera mascota?</option>
                            <option value="nombre_padres">¿Cuál es el nombre de tu padre o madre?</option>
                            <option value="Lugar_nacimiento">¿En donde naciste?</option>
                        </select>
                        <input 
                            type="text" 
                            id="respuesta3" 
                            name="respuesta3"
                            class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Ingrese su respuesta"
                        >
                    </div>
                </div>

                <!-- Botón de Registro -->
                <input
                    type="submit" 
                    value="Resgistrar Cuenta"
                    name="registro"
                    class="w-full bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors shadow-md hover:shadow-lg flex items-center justify-center"
                >
                    

                <!-- Enlace de Regreso -->
                <div class="text-center pt-4">
                    <a href="index.php" class="text-blue-600 hover:text-blue-800 text-sm">
                        ← Volver al Inicio
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

