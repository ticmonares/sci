<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h1 class="center">Editar a <?php echo $this->usuario->no_empleado; ?> </h1>

                <div class="center">
                    <?php
                    echo $this->mensaje;
                    ?>
                </div>

            </div>
        </div>
    </div>

    <div>
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <form action="<?php echo constant('URL') . 'usuarios/actualizarUsuario'; ?>" method="POST">
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input class="form-control" type="text" name="id" id="id" value="<?php echo $this->usuario->id; ?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="no_empleado">No. Empleado</label>
                            <input class="form-control" type="text" name="no_empleado" id="no_empleado" value="<?php echo $this->usuario->no_empleado; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $this->usuario->nombre; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input class="form-control" type="email" name="correo" id="correo" value="<?php echo $this->usuario->correo; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" name="rol" required>
                                <?php echo $this->usuario->stringRol; ?>
                            </select>
                        </div>
                        <input class="btn btn-dark bg-red-pj" type="submit" value="Editar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>

</html>