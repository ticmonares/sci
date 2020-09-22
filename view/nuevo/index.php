<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div id="main">
        <h1 class="center">Módulo para agregar</h1>
    </div>
    <div class="center">
    <?php
        echo $this->mensaje;
    ?>
    </div>
    <div>
        <form action="<?php echo constant('URL').'nuevo/registrarAlumno'; ?>" method="POST">
            <p>
                <label for="matricula">Matrícula</label>
                <input type="text" name="matricula" id="matricula" required>
            </p>
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
            </p>
            <p>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" required>
            </p>
            <input type="submit" value="Agregar">
        </form>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
</html>