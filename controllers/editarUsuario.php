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

// Obtener el id del usuario a editar
$id = $_GET['id'];

// Obtener los datos del usuario
$datos_usuario = $usuario->buscarPorId($id);

// Verificar si se ha enviado el formulario para guardar los cambios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los nuevos datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $cedula = $_POST['cedula'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $mensaje = $_POST['mensaje'];

    // Actualizar los datos del usuario en la tabla
    $filas_afectadas = $usuario->actualizar($id, $nombre, $correo, $cedula, $fecha_nacimiento, $mensaje);

    if ($filas_afectadas > 0) {
        // Mostrar mensaje de éxito
        echo "Los datos han sido actualizados correctamente.";
    } else {
        // Mostrar mensaje de error
        echo "Ha ocurrido un error al actualizar los datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar usuario</title>
</head>
<body>
    <h2>Editar usuario</h2>

    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $datos_usuario['nombre']; ?>" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" id="correo" value="<?php echo $datos_usuario['correo']; ?>" required>

        <label for="cedula">Cédula:</label>
        <input type="text" name="cedula" id="cedula" value="<?php echo $datos_usuario['cedula']; ?>" required>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $datos_usuario['fecha_nacimiento']; ?>" required>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje"><?php echo $datos_usuario['mensaje']; ?></textarea>

        <button type="submit">Guardar cambios</button>
        <a href="agregarUsuario.php" type="submit">Volver</a>


    </form>
</body>
</html>
