<?php
include "modelo/conexion.php";

if (isset($_GET['id'])) {
    $id_desencriptado = base64_decode($_GET['id']);
    
    // Validar que sea un número
    if (!is_numeric($id_desencriptado)) {
        die("Acceso no permitido");
    }

    // Eliminar registro en la base de datos
    try {
        // Preparar la consulta DELETE
        $delete = $conexion->prepare("DELETE FROM alimentacion WHERE id_aliment = :id");
        $delete->bindParam(':id', $id_desencriptado, PDO::PARAM_INT);

        if ($delete->execute()) {
            echo '<div class="success">Registro eliminado correctamente.</div>';
            // Redirigir a la página principal o lista después de eliminar
            header("Location: admin_aliment.php");
            exit;
        } else {
            echo '<div class="alerta">Error al eliminar el registro.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alerta">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</div>';
    }
} else {
    die("ID no válido");
}
?>