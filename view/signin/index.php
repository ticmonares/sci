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
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1>Registrar usuario</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <form action="<?php echo constant('URL') . 'signin/procesarSignin'; ?>" method="POST">
                    <div class="form-group" >
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group" >
                        <label for="no_empleado">No. Empleado</label>
                        <input class="form-control" type="number" id="no_empleado" name="no_empleado" required>
                    </div>
                    <div class="form-group" >
                        <label for="correo">Correo</label>
                        <input class="form-control" type="mail" id="correo" name="correo" required>
                    </div>
                    <div class="form-group" >
                        <label for="contrasena">Contraseña</label>
                        <input class="form-control" type="password" id="contrasena" name="contrasena" required>
                    </div>
                    <div class="form-group" >
                        <label for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol">
                            <option value="2">Dirección de Control Patrimonial</option>
                            <option value="1">Coordinación General Jurídica</option>
                            <option value="0">Super Usuario</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-dark bg-red-pj" value="Registrar">
                </form>

            </div>
        </div>
    </div>
    </div>
    <?php require 'view/footer.php'; ?>
</body>

</html>