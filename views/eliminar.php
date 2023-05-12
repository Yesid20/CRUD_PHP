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

    <form method="POST" action="index.php?action=eliminar&id=<?php echo $id; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="Eliminar">
        <a class="btn btn-danger" href="index.php?action=listar" class="btn btn-secondary ml-2">Cancelar</a>

    </form>
</body>
</html>
