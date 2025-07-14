<?php
session_start();
if (!isset($_SESSION['correo']) ) {
    header("Location: alimentacion.php");
    exit();
}
?>




<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes de Alimentación</title>
    <!-- Enlace a tu archivo de estilos CSS puro -->
    <link rel="stylesheet" href="Styles3.css">
    <!-- Google Fonts - Inter for a modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons for modern SVG icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
</head>
<body class="municipal-bg">
    <header class="app-header animate-fade-in animate-delay-1">
        <div class="container flex justify-between items-center">
            <div class="header-content">
                <h1 class="header-title">Portal de Reportes Municipales</h1>
                <p class="header-subtitle">Departamento de Seguridad Alimentaria</p>
            </div>
            <!-- Theme Toggle Button -->
            <button id="theme-toggle" class="theme-toggle" aria-label="Alternar modo oscuro/claro">
                <i data-lucide="sun" id="theme-icon"></i>
            </button>
        </div>
    </header>

    <nav class="app-nav animate-fade-in animate-delay-2">
        <div class="container">
            <ul class="nav-list">
                <li>
                    <a href="login.php" class="nav-link animate-slide-in-up animate-delay-3">
                        <i data-lucide="file-text"></i>
                        Reporte de Hurto
                    </a>
                </li>
                <li>
                    <a href="alimentacion.php" class="nav-link active animate-slide-in-up animate-delay-4">
                        <i data-lucide="soup"></i>
                        Reportes de Alimentación
                    </a>
                </li>
                <li>
                    <a href="recre.php" class="nav-link animate-slide-in-up animate-delay-5">
                        <i data-lucide="gamepad"></i>
                        Reportes de Recreación
                    </a>
                </li>
                <li class="md:ml-auto">
                    <a href="index.php" class="nav-link logout animate-slide-in-up animate-delay-6">
                        <i data-lucide="log-out"></i>
                        Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main-content container animate-fade-in animate-delay-7">
        <section class="form-section">
            <h2 class="form-title">
                <i data-lucide="utensils"></i> <!-- Changed icon to better represent food/alimentation -->
                Reporte de Situación Alimentaria
            </h2>

            <form action="#" method="POST" class="space-y-4">
                <!-- PHP includes are removed as they cannot be executed in this environment -->
                <!-- <?php
                    // include "control/control_Food.php";
                    // include "modelo/conexion.php";
                ?> -->
                <div class="form-group animate-slide-in-up animate-delay-8">
                    <label for="descripcion-alimentacion" class="form-label">
                        Descripción del Problema
                    </label>
                    <textarea
                        id="descripcion-alimentacion"
                        name="descripcion"
                        rows="4"
                        class="form-textarea"
                        placeholder="Ej: Distribución irregular de alimentos, calidad de los productos..."
                        required
                    ></textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group animate-slide-in-up animate-delay-9">
                        <label for="fecha-alimentacion" class="form-label">
                            Fecha del Reporte
                        </label>
                        <input
                            type="date"
                            id="fecha-alimentacion"
                            name="fecha"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="form-group animate-slide-in-up animate-delay-9">
                        <label for="ubicacion-alimentacion" class="form-label">
                            Ubicación Exacta
                        </label>
                        <input
                            type="text"
                            id="ubicacion-alimentacion"
                            name="ubicacion"
                            class="form-input"
                            placeholder="Ej: Comedor Comunitario N°5, Sector Este"
                            required
                        >
                    </div>
                </div>

                <input
                    type="submit"
                    value="Enviar Reporte"
                    class="submit-button submit-button-orange animate-slide-in-up animate-delay-10"
                    name="ReporteA"
                >
            </form>
        </section>
    </main>

    <footer class="app-footer animate-fade-in animate-delay-10">
        <div class="container">
            <p class="footer-text">&copy; 2025 Municipalidad de San Francisco - Programa Alimentario</p>
            <p class="footer-version">Sistema de Reportes Ciudadanos v2.0</p>
        </div>
    </footer>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Theme Toggle Logic
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');

        // Function to set the theme
        function setTheme(theme) {
            document.body.classList.remove('light-mode', 'dark-mode');
            document.body.classList.add(theme);
            localStorage.setItem('theme', theme);
            if (theme === 'dark-mode') {
                themeIcon.setAttribute('data-lucide', 'moon');
            } else {
                themeIcon.setAttribute('data-lucide', 'sun');
            }
            lucide.createIcons(); // Re-render icon after changing data-lucide attribute
        }

        // Get initial theme from localStorage or system preference
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme) {
            setTheme(savedTheme);
        } else if (prefersDark) {
            setTheme('dark-mode');
        } else {
            setTheme('light-mode');
        }

        // Event listener for theme toggle button
        themeToggle.addEventListener('click', () => {
            if (document.body.classList.contains('dark-mode')) {
                setTheme('light-mode');
            } else {
                setTheme('dark-mode');
            }
        });

        // Simple client-side validation placeholder if needed.
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('form');
            form.addEventListener('submit', (event) => {
                const descriptionInput = document.getElementById('descripcion-alimentacion');
                const dateInput = document.getElementById('fecha-alimentacion');
                const locationInput = document.getElementById('ubicacion-alimentacion');

                if (!descriptionInput.value || !dateInput.value || !locationInput.value) {
                    // In a production environment, replace this with a custom, styled modal or inline error messages.
                    alert('Por favor, complete todos los campos requeridos.');
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
</body>
</html>
