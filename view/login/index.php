<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
    <?php require 'view/header.php'; ?>
    <div id="respuesta">
    <?php
        if (isset($this->mensaje)){
            echo "".$this->mensaje;
        }
    ?>
    </div>
    <div id="main" class="center">
        <img id="logo" src="<?php echo constant('URL') . "resources/img/logo-pjedomex.png" ?>" alt="Logo Poder Judicual del Estado de México">
        <h1>Iniciar sesión</h1>
        <form action="<?php echo constant('URL') . 'login/procesarLogin'; ?>" method="POST" >
            <p>
                <label for="correo">Correo</label>
                <input type="mail" id="correo" name="correo" required >
            </p>
            <p>
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required >
            </p>
            <input type="submit">
        </form>
    </div>
    <?php require 'view/footer.php'; ?>
</body>
</html>