<!DOCTYPE html>
<html>
<head>
	<title>Editar usuario</title>
</head>
<body>
	<h1>Editar usuario</h1>
	<form action="editarUsuario.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
		<br>

		<label for="correo">Correo electrónico:</label>
		<input type="email" name="correo" value="<?php echo $usuario['correo']; ?>" required>
		<br>

		<label for="cedula">Cédula:</label>
		<input type="text" name="cedula" value="<?php echo $usuario['cedula']; ?>" required>
		<br>

		<label for="fecha_nacimiento">Fecha de nacimiento:</label>
		<input type="date" name="fecha_nacimiento" value="<?php echo $usuario['fecha_nacimiento']; ?>" required>
		<br>

		<label for="mensaje">Mensaje:</label>
		<textarea name="mensaje" required><?php echo $usuario['mensaje']; ?></textarea>
		<br>

		<input type="submit" value="Actualizar">
		<a href="listadoUsuarios.php">Cancelar</a>
	</form>
</body>
</html>
