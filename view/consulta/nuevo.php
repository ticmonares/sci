<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Inmueble</title>
</head>
<body>
    <?php require_once 'view/header.php'; ?>
    <div id="main">
        <h1 class="center">Nuevo Registro</h1>
    </div>
    <div class="center">
    <?php
        echo $this->mensaje;
    ?>
    </div>
    <div>
        <form action="<?php echo constant('URL').'consulta/registrarNuevo'; ?>" method="POST">
        <?php
        
        ?>
            <p>
                <label for="region">Región</label>
                <select name="region" id="region" class="region" required>
                    <option value="">Elija un opción</option>
                    <?php
                    foreach ($this->regiones as $result ) {
                        ?>
                        <option value="<?php echo $result->id ?>"> <?php echo $result->nombre ?> </option>
                        <?php
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="distrito">Distrito</label>
                <select name="distrito" id="distrito" class="registro" required>
                    <option value="">Elija una opción</option>
                </select>
            </p>       
            <p>
                <label for="municipio">Municipio</label>
                <select name="municipio" id="municipio" required>
                    <option value="">Elija una opción</option>
                </select>
            </p>
            <p>
                <label for="edificio">Edificio</label>
                <input type="text" name="edificio" id="edificio" maxlength="30" required>
            </p>
            <p>
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" id="domicilio" maxlength="30" required>
            </p>
            <p>
                <label for="modalidad">Modalidad de propiedad</label>
                <select name="modalidad" id="modalidad" required>
                    <option value="">Elija una opción</option>
                </select>
            </p>
            <p>
                <label for="estado_proc">Estado procesal</label>
                <select name="estado_proc" id="estado_proc" required>
                    <option value="">Elija una opción</option>
                </select>
            </p>
            <p>
                <label for="superficie">Superficie</label>
                <input type="text" name="superficie" id="superficie" maxlength="30" required>
            </p>
           
            <input type="submit" value="Agregar">
        </form>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
<script src="<?php echo constant('URL');?>resources/js/inmuebles.js"></script>
</html>