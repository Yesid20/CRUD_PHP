<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Agregar Usuario</h1>
    <form action="insertarUsuario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required><br><br>
        <label for="cedula">Cédula:</label>
        <input type="text" name="cedula" id="cedula" required><br><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required><br><br>
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" required></textarea><br><br>
        <input type="submit" value="Agregar">
    </form>
    <br>
    <a href="ListadoUsuario.php">Volver al listado de usuarios</a>
</body>
</html>
