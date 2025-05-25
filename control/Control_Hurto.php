<?php
include "modelo/conexion.php";

if (!empty($_POST["ReporteH"])) {
    // Verificar campos vacíos y formato de fecha
    if (
        empty($_POST["descripcion"]) ||
        empty($_POST["fecha"]) ||
        empty($_POST["ubicacion"]) 
    ) {
        echo '<div class="alerta">¡Error! Complete todos los campos requeridos</div>';
    } else {
        // Sanitizar datos de entrada
        $descripcion = htmlspecialchars(trim($_POST["descripcion"]), ENT_QUOTES, 'UTF-8');
        $fecha = $_POST["fecha"];
        $ubicacion = htmlspecialchars(trim($_POST["ubicacion"]), ENT_QUOTES, 'UTF-8');

            // Validar con expresiones regulares
            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{5,100}$/", $descripcion)) {
            echo '<div class="alerta">El campo descripcion debe contener solo letras y espacios (mínimo 3 caracteres)</div>';
           } elseif (!preg_match("/^[a-zA-Z0-9\s]{5,100}$/", $ubicacion)) {
           echo '<div class="alerta">La ubicacion debe contener solo letras, números y espacios (mínimo 3 caracteres)</div>';
             }




             try {
                // Insertar los datos en la base de datos
                $sql = "INSERT INTO hurtos (ubicacion, descripcion, fecha) 
                        VALUES (:ubicacion, :descripcion, :fecha)";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':ubicacion', $ubicacion, PDO::PARAM_STR);
                $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo '<div class="success">Reporte enviado correctamente</div>';
                } else {
                    echo '<div class="alerta">Error al registrar el reporte. Código: ' . implode(', ', $stmt->errorInfo()) . '</div>';
                }
            } catch (PDOException $e) {
                echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
            }
        }
    }
?>