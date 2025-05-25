<?php
session_start();
include "modelo/conexion.php";

if (!empty($_POST["registro"])) {
    // Verificar si algún campo está vacío
    if (
        empty($_POST["nombre"]) ||
        empty($_POST["apellido"]) ||
        empty($_POST["correo"]) ||
        empty($_POST["contrasenia"]) ||
        empty($_POST["pregunta1"]) ||
        empty($_POST["respuesta1"]) ||
        empty($_POST["pregunta2"]) ||
        empty($_POST["respuesta2"]) ||
        empty($_POST["pregunta3"]) ||
        empty($_POST["respuesta3"])
    ) {
        echo '<div class="alerta">Uno de los campos está vacío</div>';
    } else {
        // Sanitizar datos de entrada
        $nombre = htmlspecialchars(trim($_POST["nombre"]), ENT_QUOTES, 'UTF-8');
        $apellido = htmlspecialchars(trim($_POST["apellido"]), ENT_QUOTES, 'UTF-8');
        $correo = htmlspecialchars(trim($_POST["correo"]), ENT_QUOTES, 'UTF-8');
        $contrasenia = trim($_POST["contrasenia"]);
        $pregunta1 = htmlspecialchars(trim($_POST["pregunta1"]), ENT_QUOTES, 'UTF-8');
        $respuesta1 = htmlspecialchars(trim($_POST["respuesta1"]), ENT_QUOTES, 'UTF-8');
        $pregunta2 = htmlspecialchars(trim($_POST["pregunta2"]), ENT_QUOTES, 'UTF-8');
        $respuesta2 = htmlspecialchars(trim($_POST["respuesta2"]), ENT_QUOTES, 'UTF-8');
        $pregunta3 = htmlspecialchars(trim($_POST["pregunta3"]), ENT_QUOTES, 'UTF-8');
        $respuesta3 = htmlspecialchars(trim($_POST["respuesta3"]), ENT_QUOTES, 'UTF-8');

        // Verificar si las contraseñas coinciden
        if ($contrasenia !== $_POST["confirm_password"]) {
            echo '<div class="alerta">Las contraseñas no coinciden</div>';
        } else {
            // Verificar si el usuario ya existe
            if (buscaRepetido($correo, $conexion) == 1) {
                echo '<div class="alerta">Ya existe un usuario o correo con estos datos</div>';
            } else {
                try {  
                    
                    $contrasenia_hash = password_hash($contrasenia, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuarios(nombre, apellido, correo, contrasenia, pregunta1, respuesta1, pregunta2, respuesta2, pregunta3, respuesta3) VALUES (:nombre, :apellido, :correo, :contrasenia, :pregunta1, :respuesta1, :pregunta2, :respuesta2, :pregunta3, :respuesta3)";
                    $stmt = $conexion->prepare($sql);
                    
                    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
                    $stmt->bindParam(':contrasenia', $contrasenia_hash);
                    $stmt->bindParam(':pregunta1', $pregunta1, PDO::PARAM_STR);
                    $stmt->bindParam(':respuesta1', $respuesta1, PDO::PARAM_STR);
                    $stmt->bindParam(':pregunta2', $pregunta2, PDO::PARAM_STR);
                    $stmt->bindParam(':respuesta2', $respuesta2, PDO::PARAM_STR);
                    $stmt->bindParam(':pregunta3', $pregunta3, PDO::PARAM_STR);
                    $stmt->bindParam(':respuesta3', $respuesta3, PDO::PARAM_STR);
                    $stmt->execute();
                    
                    // Ejecutar la consulta
                    if ($stmt->execute()) {
                        echo '<div class="success">Usuario registrado correctamente</div>';
                    } else {
                        echo '<div class="alerta">Error al registrar el usuario</div>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
                }
            }
        }
    }
}

// Función para verificar duplicados de correo
function buscaRepetido($correo, $conexion) {
    try {
        // Verificar si el correo ya existe en la base de datos
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 1; // Correo duplicado
        } else {
            return 0; // Correo único
        }
    } catch (PDOException $e) {
        return 1; // Asumimos duplicado en caso de error
    }
}
?>
