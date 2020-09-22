<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div id="main">
        <h1 class="center">Editar a  <?php echo $this->alumno->matricula; ?> </h1>
    </div>
    <div class="center">
    <?php
        echo $this->mensaje;
    ?>
    </div>
    <div>
        <form action="<?php echo constant('URL').'consulta/actualizarAlumno'; ?>" method="POST">
            <p>
                <label for="id">Id</label>
                <input type="text" name="id" id="id" value="<?php echo $this->alumno->id; ?>" required  disabled>
            </p>
            <p>
                <label for="matricula">Matrícula</label>
                <input type="text" name="matricula" id="matricula" value="<?php echo $this->alumno->matricula; ?>" required>
            </p>
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $this->alumno->nombre; ?>" required>
            </p>
            <p>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $this->alumno->apellido; ?>" required>
            </p>
            <input type="submit" value="Editar">
        </form>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
</html>