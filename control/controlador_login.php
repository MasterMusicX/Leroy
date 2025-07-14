<?Php
session_start();
include "modelo/conexion.php";

if (!empty($_POST["ingresar"])) {
    // Verificar si algún campo está vacío
    if (empty($_POST["correo"]) || empty($_POST["contrasenia"])) {
        echo '<div class="alerta">Por favor, complete los campos</div>';
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST["correo"])) {
        // Validación del correo: formato de correo electrónico válido
        echo '<div class="alerta">El correo debe tener un formato válido (por ejemplo, usuario@dominio.com)</div>';
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{7,20}$/", $_POST["contrasenia"])) {
        // Validación de la clave: entre 8 y 20 caracteres, al menos una letra y un número
        echo '<div class="alerta">Contraseña no válida. Por favor ingrese nuevamente su contraseña</div>';
    } else {
        // Sanitizar los datos de entrada
        $correo = htmlspecialchars(trim($_POST["correo"]), ENT_QUOTES, 'UTF-8');
        $contrasenia = trim($_POST["contrasenia"]);

        try {
            // Consulta preparada para verificar el usuario
            $sql = "SELECT idusuarios, correo, nombre, contrasenia FROM usuarios WHERE correo = :correo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();

            // Verificar si el usuario existe
            if ($datos = $stmt->fetch(PDO::FETCH_OBJ)) {
                // Verificar la contraseña con hash
                if (password_verify($contrasenia, $datos->contrasenia)) {
                    // Establecer variables de sesión
                    $_SESSION["correo"] = $datos->correo;
                    $_SESSION["nombre"] = $datos->nombre;
                   

                // Redirigir al inicio
                header("Location: login.php");
                exit();
    
                    
                } else {
                    echo '<div class="alerta">Contraseña incorrecta</div>';
                }
            } else {
                echo '<div class="alerta">Usuario no encontrado</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
        }
    }
}
?>