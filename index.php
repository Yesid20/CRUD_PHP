<?php
$ruta_actual = '/var/www/html/mvc';
$ruta_includes = $ruta_actual . '/models/ConexionDB.php';
require_once $ruta_includes;

$ruta_actual = '/var/www/html/mvc';
$ruta_includes = $ruta_actual . '/models/Cusuario.php';
require_once $ruta_includes;


// Obtener acción a realizar
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

// Crear instancia de la clase ConexionDB
$db = new ConexionDB();

// Obtener objeto PDO para realizar consultas
$pdo = $db->getPdo();

// Crear instancia de la clase Usuario
$usuario = new Usuario($pdo);

switch ($action) {
    case 'listar':
        // Obtener todos los usuarios
        $registros = $usuario->listar();
        // Cargar la vista correspondiente
        require_once 'views/ListadoUsuarios.php';
        break;
    case 'agregar':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $cedula = $_POST['cedula'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $mensaje = $_POST['mensaje'];

            // Insertar los datos en la tabla de usuarios
            $filas_afectadas = $usuario->insertar($nombre, $correo, $cedula, $fecha_nacimiento, $mensaje);

            if ($filas_afectadas > 0) {
                // Redireccionar a la lista de usuarios
                header('Location: index.php?action=listar');
            } else {
                // Mostrar mensaje de error
                $mensaje_error = "Ha ocurrido un error al insertar los datos.";
            }
        }
        // Cargar la vista correspondiente
        require_once 'views/formularioAgregarUsuario.php';
        break;
    case 'editar':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $cedula = $_POST['cedula'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $mensaje = $_POST['mensaje'];

            // Actualizar los datos en la tabla de usuarios
            $filas_afectadas = $usuario->actualizar($id, $nombre, $correo, $cedula, $fecha_nacimiento, $mensaje);

            if ($filas_afectadas > 0) {
                // Redireccionar a la lista de usuarios
                header('Location: index.php?action=listar');
            } else {
                // Mostrar mensaje de error
                $mensaje_error = "Ha ocurrido un error al actualizar los datos.";
            }
        } else {
            // Obtener el id del usuario a editar
            $id = $_GET['id'];

            // Obtener los datos del usuario a editar
            $usuario_editar = $usuario->obtener($id);

            if (!$usuario_editar) {
                // Mostrar mensaje de error
                $mensaje_error = "El usuario no existe.";
            }
        }
        // Cargar la vista correspondiente
        require_once 'views/formularioEditarUsuario.php';
        break;
    case 'eliminar':
        // Obtener el id del usuario a eliminar
        $id = $_GET['id'];

        // Eliminar el usuario de la tabla de usuarios
        $filas_afectadas = $usuario->eliminar($id);

        if ($filas_afectadas > 0) {
                // Redireccionar a la lista de usuarios
                header('Location: index.php?action=listar');
            } else {
                // Mostrar mensaje de error
                $mensaje_error = "Ha ocurrido un error al eliminar el usuario.";
            }
            // Cargar la vista correspondiente
            require_once 'views/eliminar.php';
            break;
        
        }
?>