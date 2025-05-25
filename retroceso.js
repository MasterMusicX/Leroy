function Retroceso(e) {
    // Agregar la página actual al historial
    history.pushState(null, null, location.href);

    // Detectar intento de retroceso (botón "Atrás" o cambio manual de URL)
    window.onpopstate = function(event) {
        // Volver a agregar la página actual al historial
        history.pushState(null, null, location.href);
        
        // Opcional: Mostrar mensaje o redirigir
        alert("La navegación hacia atrás está deshabilitada");
        // window.location.href = "pagina-deseada.html"; // Redirigir si es necesario
    };

    // Bloquear teclas (Alt + Flecha izquierda o Retroceso)
    document.addEventListener('keydown', function(e) {
        if ((e.key === 'Backspace' || e.key === 'ArrowLeft') && e.altKey) {
            e.preventDefault();
            alert("Acción bloqueada");
        }
    });
}(e);