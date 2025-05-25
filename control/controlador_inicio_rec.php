<?php
include "modelo/conexion.php";
if (!empty($_POST["ingresar"])) {
    // Verificar si el campo usuario está vacío
    if (empty($_POST["correo"])) {
        echo '<div class="alerta">Por favor, completa el campo de usuario</div>';
    } else {
        // Sanitizar el usuario
        $correo = htmlspecialchars(trim($_POST["correo"]), ENT_QUOTES, 'UTF-8');

        try {
            // Consulta para buscar el usuario en la base de datos
            $sql = "SELECT * FROM usuarios WHERE correo = :correo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();

            if ($datos = $stmt->fetch(PDO::FETCH_OBJ)) {
                // Establecer variables de sesión
                session_start(); // Asegurarse de que la sesión esté iniciada
                $_SESSION["idusuarios"] = $datos->id;
                $_SESSION["correo"] = $datos->correo;
                $_SESSION["nombre"] = $datos->nombre;
                $_SESSION["pregunta1"] = $datos->pregunta1;
                $_SESSION["pregunta2"] = $datos->pregunta2;

             // Redirigir al formulario de recuperación
                header("Location: Recuperacion_password.php");
                exit();
            } else {
                echo '<div class="alerta">Usuario no encontrado</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
        }
    }
}
?>
