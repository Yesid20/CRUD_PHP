<?php
$ruta_actual = '/var/www/html/mvc';
$ruta_includes = $ruta_actual . '/models/ConexionDB.php';
require_once $ruta_includes;

$ruta_actual = '/var/www/html/mvc';
$ruta_includes = $ruta_actual . '/models/Cusuario.php';
require_once $ruta_includes;

// Crear instancia de la clase ConexionDB
$db = new ConexionDB();

// Obtener objeto PDO para realizar consultas
$pdo = $db->getPdo();

// Crear instancia de la clase Usuario
$usuario = new Usuario($pdo);

// Obtener el id del usuario a eliminar
$id = $_GET['id'];

// Eliminar el usuario de la base de datos
$filas_afectadas = $usuario->eliminar($id);

if ($filas_afectadas > 0) {
    // Mostrar mensaje de éxito
    echo "El usuario ha sido eliminado correctamente.";
} else {
    // Mostrar mensaje de error
    echo "Ha ocurrido un error al eliminar el usuario.";
}
?>
