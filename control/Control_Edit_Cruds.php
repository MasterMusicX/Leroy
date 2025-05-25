<?php
include "modelo/conexion.php";

if (isset($_GET['id'])) {
    // Desencriptar ID y validar
    $id_desencriptado = base64_decode($_GET['id']);
    if (!is_numeric($id_desencriptado)) {
        die("Acceso no permitido.");
    }

    // Obtener datos actuales
    $sql = $conexion->prepare("SELECT * FROM alimentacion WHERE id_aliment = :id");
    $sql->bindParam(':id', $id_desencriptado, PDO::PARAM_INT);
    $sql->execute();
    $datos = $sql->fetch(PDO::FETCH_ASSOC);

    if (!$datos) {
        echo "No se encontró el registro.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitizar los datos y validar con expresiones regulares
        $ubicacion = htmlspecialchars($_POST['ubicacion'], ENT_QUOTES, 'UTF-8');
        $fecha = $_POST['fecha'];
        $descripcion = htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');

        // Validaciones
        $errores = [];
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,50}$/", $ubicacion)) {
            $errores[] = '<div class="alerta">La ubicación debe tener solo letras y espacios (3-50 caracteres).</div>';
        }
        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $fecha)) {
            $errores[] = '<div class="alerta">La fecha debe estar en formato YYYY-MM-DD.</div>';
        }
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,100}$/", $descripcion)) {
            $errores[] = '<div class="alerta">La descripción debe contener solo letras y espacios (mínimo 3 caracteres).</div>';
        }

        if (empty($errores)) {
            // Actualizar datos en la base de datos
            try {
                $update = $conexion->prepare("UPDATE alimentacion SET 
                    ubicacion = :ubicacion,
                    fecha = :fecha,
                    descripcion = :descripcion
                    WHERE id_aliment = :id");

                $update->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);
                $update->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $update->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $update->bindParam(':id', $id_desencriptado, PDO::PARAM_INT);

                if ($update->execute()) {
                    echo '<div class="success">Registro actualizado correctamente.</div>';
                } else {
                    echo '<div class="alerta">Error al actualizar el registro.</div>';
                }
            } catch (PDOException $e) {
                echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
            }
        } else {
            // Mostrar errores de validación
            foreach ($errores as $error) {
                echo $error;
            }
        }
    }
} else {
    echo "ID no especificado.";
    exit;
}
?>
