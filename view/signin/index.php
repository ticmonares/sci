<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>

<body>
    <?php require 'view/header.php'; ?>
    <div id="respuesta">
    <?php
        echo $this->mensaje;
    ?>
    </div>
    <div id="main" class="center">
    <img id="logo" src="<?php echo constant('URL') . "resources/img/logo-pjedomex.png" ?>" alt="Logo Poder Judicual del Estado de México">
        <h1>Registrar usuario</h1>
        <form action="<?php echo constant('URL') . 'signin/procesarSignin'; ?>" method="POST">
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </p>
            <p>
                <label for="no_empleado">No. Empleado</label>
                <input type="number" id="no_empleado" name="no_empleado" required>
            </p>
            <p>
                <label for="correo">Correo</label>
                <input type="mail" id="correo" name="correo" required>
            </p>
            <p>
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </p>
            <p>
                <label for="rol">Rol</label>
                <select name="rol" id="rol">
                    <option value="2">Dirección de Control Patrimonial</option>
                    <option value="1">Coordinación General Jurídica</option>
                    <option value="0">Super Usuario</option>
                </select>
            </p>
            <input type="submit" value="Registrar">
        </form>
    </div>
    <?php require 'view/footer.php'; ?>
</body>

</html>