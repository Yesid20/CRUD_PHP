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

// Obtener todos los usuarios de la base de datos
$usuarios = $usuario->listar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>

    <a href="agregarUsuario.php">Agregar usuario</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Cédula</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['correo']; ?></td>
                <td><?php echo $usuario['cedula']; ?></td>
                <td><?php echo $usuario['fecha_nacimiento']; ?></td>
                <td>
                    <a href="editarUsuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <form action="eliminarUsuario.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
