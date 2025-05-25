<?php

try {
    // Conexión usando PDO
    $conexion = new PDO('mysql:host=localhost;port=3306;dbname=proyecto', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set names utf8"); // Configuración para manejar caracteres UTF-8
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error de conexión: " . $e->getMessage();
    exit();
}


?>

