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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $cedula = $_POST['cedula'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $mensaje = $_POST['mensaje'];

    // Insertar los datos en la tabla de usuarios
    $filas_afectadas = $usuario->insertar($nombre, $correo, $cedula, $fecha_nacimiento, $mensaje);

    if ($filas_afectadas > 0) {
        // Mostrar mensaje de éxito
        $mensaje = "Los datos han sido insertados correctamente.";
    } else {
        // Mostrar mensaje de error
        $mensaje = "Ha ocurrido un error al insertar los datos.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Usuario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center p-5">
        <div class="col-sm-6">
        <h1>Insertar datos de usuario</h1>
    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje ?></p>
    <?php endif ?>

    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <br>
        <label>Correo:</label>
        <input type="email" name="correo" required>
        <br>
        <br>
        <label>Cédula:</label>
        <input type="number" name="cedula" required>
        <br>
        <br>
        <label>Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>
        <br>
        <br>
        <label>Mensaje:</label>
        <textarea name="mensaje" required></textarea>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Insertar</button>
        <a class="btn btn-danger" href="agregarUsuario.php" class="btn btn-secondary ml-2">Cancelar</a>
        <a type="submit" href="agregarUsuario.php" class="btn btn-primary">Volver</a>

            </div>
        </form>
          <br />
            <tbody id="tbody"></tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../assets/code.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
    
</body>
</html>




