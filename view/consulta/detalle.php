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
    <h1 class="center">Editar registro:  <?php echo $this->registro->id; ?> </h1>
    </div>
    <div class="center">
    <?php
        echo $this->mensaje;
    ?>
    </div>
    <div>
        <form action="<?php echo constant('URL').'consulta/editarRegistro'; ?>" method="POST" enctype="multipart/form-data" >
        <?php
        
        ?>
            <p>
                <label for="region">Región</label>
                <select name="region" id="region" class="region" required>
                    <?php 
                        $region = new Region();
                        $id_region = $this->registro->id_region;
                        echo $region->cargaSelectRol($id_region);
                    ?>
                </select>
            </p>
            <p>
                <label for="distrito">Distrito Judicial </label>
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
                <input type="text" name="edificio" id="edificio" maxlength="30" value="<?php echo $this->registro->edificio; ?>" required>
            </p>
            <p>
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" id="domicilio" maxlength="30" value="<?php echo $this->registro->domicilio; ?>" required>
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
                <input type="text" name="superficie" id="superficie" maxlength="30" value="<?php echo $this->registro->superficie; ?>" required>
            </p>
            <p>
                <label for="doc_status">Documentación que ampara status del inmueble</label>
                <input type="file" name="doc_status" id="doc_status" required>
            </p>
           
            <input type="submit" value="Editar" disabled>
        </form>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
<!--<script src="<?php echo constant('URL');?>resources/js/inmuebles.js"></script>-->
<script src="<?php echo constant('URL').'resources/js/detallesInmuebles.js'; ?>"></script>
</html>