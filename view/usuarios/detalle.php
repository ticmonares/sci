<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div id="main">
        <h1 class="center">Editar a  <?php echo $this->usuario->no_empleado; ?> </h1>
    </div>
    <div class="center">
    <?php
        echo $this->mensaje;
    ?>
    </div>
    <div>
        <form action="<?php echo constant('URL').'usuarios/actualizarUsuario'; ?>" method="POST">
            <p>
                <label for="id">Id</label>
                <input type="text" name="id" id="id" value="<?php echo $this->usuario->id; ?>" required  disabled>
            </p>
            <p>
                <label for="no_empleado">Matrícula</label>
                <input type="text" name="no_empleado" id="no_empleado" value="<?php echo $this->usuario->no_empleado; ?>" required>
            </p>
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $this->usuario->nombre; ?>" required>
            </p>
            <p>
                <label for="correo">Correo</label>
                <input type="email" name="correo" id="correo" value="<?php echo $this->usuario->correo; ?>" required>
            </p>
            <p>
                <label for="rol">Rol</label>
                <select name="rol" required>
                   <?php echo $this->usuario->stringRol; ?>
                </select>
            </p>
            <input type="submit" value="Editar">
        </form>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
</html>