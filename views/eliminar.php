<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar usuario</title>
</head>
<body>
    <h1>Eliminar usuario</h1>

    <?php if (isset($mensaje_error)): ?>
        <p style="color: red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <p>¿Está seguro de que desea eliminar este usuario?</p>

    <form method="POST" action="/mvc/controllers/eliminarUsuario.php?action=eliminar&id=<?php echo $id; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" value="Eliminar">Eliminar</button>
        <a class="btn btn-danger" href="index.php?action=listar" class="btn btn-secondary ml-2">Cancelar</a>
        <a href="/mvc/controllers/agregarUsuario.php" type="submit" value="Eliminar">Volver</a>

    </form>
</body>     
</html>
