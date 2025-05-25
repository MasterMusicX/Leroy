<?php
// Verificar si el usuario es administrador
if (!isset($_SESSION['correo']) ) {
    header("Location: login.php");
    exit();
}

// Eliminar reporte
if (isset($_GET['eliminar'])) {
    $id_reporte = $_GET['eliminar'];
    $sql = "DELETE FROM reportes WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id_reporte, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: admin.php");
    exit();
}

// Actualizar reporte
if (isset($_POST['actualizar'])) {
    $id_reporte = $_POST['id'];
    $descripcion = htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');
    $estado = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');

    $sql = "UPDATE reportes SET descripcion = :descripcion, estado = :estado WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id_reporte, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: admin.php");
    exit();
}

// Obtener todos los reportes
$sql = "SELECT id, descripcion, estado, fecha FROM reportes ORDER BY fecha DESC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$reportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

?>
<?php
session_start();
include "../modelo/conexion.php";

// Verificar sesión de admin
if (!isset($_SESSION['es_admin']) || $_SESSION['es_admin'] !== 1) {
    header("Location: ../login.php");
    exit();
}

// Variables
$error = '';
$exito = '';

// Crear nuevo registro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $ubicacion = htmlspecialchars($_POST['ubicacion']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $cantidad = (int)$_POST['cantidad'];
    $fecha = $_POST['fecha'];

    try {
        $stmt = $conexion->prepare("INSERT INTO alimentacion (descripcion, ubicacion, tipo, cantidad, fecha) 
                                  VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$descripcion, $ubicacion, $tipo, $cantidad, $fecha]);
        $exito = "Registro creado exitosamente!";
    } catch (PDOException $e) {
        $error = "Error al crear: " . $e->getMessage();
    }
}

// Eliminar registro
if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    try {
        $stmt = $conexion->prepare("DELETE FROM alimentacion WHERE id = ?");
        $stmt->execute([$id]);
        $exito = "Registro eliminado exitosamente!";
    } catch (PDOException $e) {
        $error = "Error al eliminar: " . $e->getMessage();
    }
}

// Actualizar registro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {
    $id = (int)$_POST['id'];
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $ubicacion = htmlspecialchars($_POST['ubicacion']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $cantidad = (int)$_POST['cantidad'];
    $fecha = $_POST['fecha'];

    try {
        $stmt = $conexion->prepare("UPDATE alimentacion SET 
                                  descripcion = ?, 
                                  ubicacion = ?, 
                                  tipo = ?, 
                                  cantidad = ?, 
                                  fecha = ?
                                  WHERE id = ?");
        $stmt->execute([$descripcion, $ubicacion, $tipo, $cantidad, $fecha, $id]);
        $exito = "Registro actualizado exitosamente!";
    } catch (PDOException $e) {
        $error = "Error al actualizar: " . $e->getMessage();
    }
}

// Obtener registros
$registros = [];
try {
    $stmt = $conexion->query("SELECT * FROM alimentacion ORDER BY fecha DESC");
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error al obtener registros: " . $e->getMessage();
}
?>