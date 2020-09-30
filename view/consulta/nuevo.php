<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Inmueble</title>
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <div class="container mt-5 mb-5">
        <div class="col">
            <div class="text-center">
                <h1 class="center">Nuevo Registro</h1>
            </div>
            <div class="center">
                <?php
                if (isset($this->mensaje)) {
                    //echo $this->mensaje;
                    Core::alert($this->mensaje, $this->tipoMensaje);
                }
                ?>
            </div>
            <form action="<?php echo constant('URL') . 'consulta/registrarNuevo'; ?>" method="POST" ">

                <div class=" form-group">
                <label for="noExpediente">Número de expediente</label>
                <input type="number" min="0" class="form-control" name="noExpediente" id="noExpediente" required>
        </div>

        <div class="form-group">
            <label for="region">Región</label>
            <select class="form-control" name="region" id="region" class="region" required>
                <option value="">Elija un opción</option>
                <?php
                foreach ($this->regiones as $result) {
                ?>
                    <option value="<?php echo $result->id ?>"> <?php echo $result->nombre ?> </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="distrito">Distrito Judicial </label>
            <select class="form-control" name="distrito" id="distrito" class="registro" required>
                <option value="">Elija una opción</option>
            </select>
        </div>

        <div class="form-group">
            <label for="municipio">Municipio</label>
            <select class="form-control" name="municipio" id="municipio" required>
                <option value="">Elija una opción</option>
            </select>
        </div>

        <div class="form-group">
            <label for="edificio">Edificio</label>
            <input class="form-control" type="text" name="edificio" id="edificio" maxlength="300" required>
        </div>
        <div class="form-group">
            <label for="domicilio">Domicilio</label>
            <input class="form-control" type="text" name="domicilio" id="domicilio" maxlength="300" required>
        </div>
        <div class="form-group">
            <label for="modalidad">Modalidad de propiedad</label>
            <select class="form-control" name="modalidad" id="modalidad" required>
                <option value="">Elija una opción</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estado_proc">Estado procesal</label>
            <select class="form-control" name="estado_proc" id="estado_proc" required>
                <option value="">Elija una opción</option>
            </select>
        </div>
        <div class="form-group">
            <label for="superficie">Superficie en metros cuadrados </label>
            <input class="form-control" type="number" step="any" name="superficie" id="superficie" required>
        </div>
        <!--
                <div class="form-group">
                    <label for="doc_status">Documentación que ampara status del inmueble</label>
                    <input class="form-control-file" type="file" name="doc_status" id="doc_status" required>
                </div>
                -->

        <input class="btn btn-dark bg-red-pj" type="submit" value="Agregar">
        </form>
    </div>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
<script src="<?php echo constant('URL'); ?>resources/js/inmuebles.js"></script>

</html>