<?php

include "modelo/conexion.php";
if (!empty($_POST["recuperar"])) {
    // Verificar si algún campo está vacío
    if (
        empty($_POST["respuesta1"]) ||
        empty($_POST["respuesta2"]) ||
        empty($_POST["nueva_clave"]) ||
        empty($_POST["confirmar_clave"])
    ) {
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        // Validar campos con expresiones regulares
        if (!preg_match("/^[a-zA-ZÀ-ÿ\s]{4,12}$/", $_POST["respuesta1"])) {
            echo '<div class="alerta">La respuesta 1 debe contener solo letras y espacios (mínimo 4 caracteres)</div>';
        } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/", $_POST["nueva_clave"])) {
            echo '<div class="alerta">La contraseña debe tener entre 8 y 20 caracteres, contener números, y al menos una letra</div>';
        } else {
            // Verificar si las contraseñas coinciden
            if ($_POST["nueva_clave"] !== $_POST["confirmar_clave"]) {
                echo '<div class="alerta">Las contraseñas no coinciden</div>';
            } else {
                // Sanitizar datos de entrada
                $respuesta1 = htmlspecialchars(trim($_POST["respuesta1"]), ENT_QUOTES, 'UTF-8');
                $respuesta2 = htmlspecialchars(trim($_POST["respuesta2"]), ENT_QUOTES, 'UTF-8');
                $nueva_clave = trim($_POST["nueva_clave"]);

                try {
                    // Consulta preparada para verificar respuestas de seguridad
                    $sql = "SELECT * FROM usuarios WHERE respuesta1 = :respuesta1 AND respuesta2 = :respuesta2";
                    $stmt = $conexion->prepare($sql);
                    $stmt->bindParam(':respuesta1', $respuesta1, PDO::PARAM_STR);
                    $stmt->bindParam(':respuesta2', $respuesta2, PDO::PARAM_STR);
                    $stmt->execute();

                    // Verificar si las respuestas coinciden
                    if ($stmt->fetch(PDO::FETCH_OBJ)) {
                        // Actualizar la contraseña
                        $update_sql = "UPDATE usuarios SET contrasenia = :nueva_clave WHERE respuesta1 = :respuesta1 AND respuesta2 = :respuesta2";
                        $update_stmt = $conexion->prepare($update_sql);
                        $update_stmt->bindParam(':nueva_clave', $nueva_clave, PDO::PARAM_STR);
                        $update_stmt->bindParam(':respuesta1', $respuesta1, PDO::PARAM_STR);
                        $update_stmt->bindParam(':respuesta2', $respuesta2, PDO::PARAM_STR);

                        if ($update_stmt->execute()) {
                            echo '<div class="success">Contraseña actualizada correctamente</div>';
                        } else {
                            echo '<div class="alerta">Error al actualizar la contraseña</div>';
                        }
                    } else {
                        echo '<div class="alerta">Datos incorrectos. Verifica tus respuestas de seguridad</div>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
                }
            }
        }
    }
}
?>
