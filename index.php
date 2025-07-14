<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Municipalidad</title>
   <link rel="stylesheet" href="Estilos.css">
   <style>
        /* Define custom keyframe animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0px rgba(59, 130, 246, 0.4); }
            50% { box-shadow: 0 0 15px rgba(59, 130, 246, 0.8); }
            100% { box-shadow: 0 0 0px rgba(59, 130, 246, 0.4); }
        }

        @keyframes rotateIn {
            from { opacity: 0; transform: rotate(-90deg) scale(0.5); }
            to { opacity: 1; transform: rotate(0deg) scale(1); }
        }

        /* Apply animations to elements */
        .login-card.animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        .login-logo-container.animate-rotate-in {
            animation: rotateIn 0.6s ease-out forwards;
        }

        .login-title.animate-slide-in-up,
        .login-subtitle.animate-slide-in-up,
        .form-group.animate-slide-in-up,
        .button-group.animate-slide-in-up,
        .bottom-links.animate-slide-in-up {
            animation: slideInUp 0.7s ease-out forwards;
        }

        /* Input focus glow */
        .form-input.input-focus-glow:focus {
            outline: none;
            border-color: #3B82F6; /* Tailwind blue-500 */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5); /* Tailwind blue-500 with opacity */
        }

        /* Button gradient and hover effects */
        .submit-button.button-gradient {
            background-image: linear-gradient(to right, #3B82F6, #2563EB); /* Tailwind blue-600 to blue-700 */
        }
        .submit-button.button-gradient:hover {
            background-image: linear-gradient(to right, #2563EB, #1D4ED8); /* Darker blue on hover */
            transform: translateY(-2px); /* Slight lift on hover */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* More pronounced shadow */
        }
        .submit-button.button-gradient:active {
            transform: translateY(0); /* Press effect */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Link hover underline */
        .link-hover-underline:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="municipal-bg">
    <div class="login-container">
        <div class="login-card animate-fade-in" style="animation-delay: 0.2s;">
            <div class="login-header">
                <div class="login-logo-container animate-rotate-in" style="animation-delay: 0.4s;">
                   
                    <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12C2 17.523 6.477 22 12 22C17.523 22 22 17.523 22 12C22 6.477 17.523 2 12 2ZM12 4C7.582 4 4 7.582 4 12C4 16.418 7.582 20 12 20C16.418 20 20 16.418 20 12C20 7.582 16.418 4 12 4ZM12 6C10.8954 6 10 6.89543 10 8V12C10 13.1046 10.8954 14 12 14H14C15.1046 14 16 13.1046 16 12V8C16 6.89543 15.1046 6 14 6H12ZM12 8H14V12H12V8Z" />
                        <path d="M12 8H14V12H12V8Z" fill="white"/>
                    </svg>
                </div>
                <h1 class="login-title animate-slide-in-up" style="animation-delay: 0.6s;">Municipalidad</h1>
                <p class="login-subtitle animate-slide-in-up" style="animation-delay: 0.7s;">Sistema de Gestión Ciudadana</p>
            </div>

            <form action="#" method="POST" class="login">
                    <?php
                      include "control/controlador_login.php";
                       include "modelo/conexion.php";
                ?> 

               
                <div class="form-group animate-slide-in-up" style="animation-delay: 0.8s;">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        class="form-input input-focus-glow"
                        placeholder="ejemplo@municipalidad.com"
                        required
                    >
                </div>

                <div class="form-group animate-slide-in-up" style="animation-delay: 0.9s;">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        id="contrasenia"
                        name="contrasenia"
                        class="form-input input-focus-glow"
                        placeholder="••••••••"
                        required
                    >
                </div>

                 <!-- Botón de acceso -->
                 <div class="button-group animate-slide-in-up" style="animation-delay: 1.0s;">
                    <input
                        type="submit"
                        value="Iniciar"
                        name="ingresar"
                        class="submit-button button-gradient link-hover-underline"
                    >

                    <!-- Enlace Administrador -->
                    <div class="admin-link-container">
                        <a href="login_admin.php" class="admin-link link-hover-underline">
                            Acceso Administrativo
                        </a>
                    </div>
                </div>

                <!-- Enlaces inferiores -->
                <div class="bottom-links animate-slide-in-up" style="animation-delay: 1.1s;">
                    <a href="registro.php" class="create-account-link link-hover-underline">
                        Crear Cuenta Municipal
                    </a>
                    <span class="separator">|</span>
                    <a href="inicio_recuperar.php" class="recover-password-link link-hover-underline">
                        Recuperar Contraseña
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>