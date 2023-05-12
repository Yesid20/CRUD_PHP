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

// Obtener todos los usuarios
$usuarios = $usuario->obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tabla de registros</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    table {
        border: 1px solid black;
    }
    th, td {
        border: 1px solid black;
        padding: 10px;
    }
    </style>
    </head>
    <body>
	    <div class="container">
		    <h2>Tabla de registros</h2>
		    <table class="table">
			    <thead>
				    <tr>
                        <th>id</th>
					    <th>Nombre</th>
					    <th>Correo</th>
					    <th>Cedula</th>
					    <th>Fecha_nacimiento</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
				    </tr>
			    </thead>
            <tbody>
                    <?php foreach($usuarios as $usuario): ?>
                    <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['correo']; ?></td>
                    <td><?php echo $usuario['cedula']; ?></td>
                    <td><?php echo $usuario['fecha_nacimiento']; ?></td>
                    <td><?php echo $usuario['mensaje']; ?></td>
                    <td>
                        <a href="editarUsuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                        <a href="/views/eliminar.php?id=<?php echo $usuario['id']; ?>">Eliminar</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
         <div class="d-flex justify-content-center">
            <a href='insertarUsuario.php' class='btn btn-info'>Agregar</a>
            <button onclick="window.location.reload() class='btn btn-info'">Actualizar</button>
        </div>

	        <!-- Scripts de Bootstrap -->
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>



