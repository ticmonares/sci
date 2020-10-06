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
            <form action="<?php echo constant('URL') . 'consulta/registrarNuevo'; ?>" method="POST" enctype="multipart/form-data" >

                <div class=" form-group row">
                <div class="col-sm-4">
                    <label for="noExpediente">Número de expediente</label>
                    <input type="number" min="0" class="form-control" name="noExpediente" id="noExpediente" required>
                </div>
                <div class="col-sm-4">
                    <label for="noInventario">Número de inventario</label>
                    <input type="text" min="0" class="form-control" name="noInventario" id="noInventario" maxlength="10" required>
                </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label for="region">Región</label>
                <select class="form-control" name="region" id="region" class="region" required>
                    <option value="">Seleccione un opción</option>
                    <?php
                    foreach ($this->regiones as $result) {
                    ?>
                        <option value="<?php echo $result->id ?>"> <?php echo $result->nombre ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="distrito">Distrito Judicial </label>
                <select class="form-control" name="distrito" id="distrito" class="registro" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label for="municipio">Municipio</label>
                <select class="form-control" name="municipio" id="municipio" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="edificio">Edificio</label>
            <input class="form-control" type="text" name="edificio" id="edificio" maxlength="300" required>
        </div>
        <div class="form-group">
            <label for="domicilio">Domicilio</label>
            <input class="form-control" type="text" name="domicilio" id="domicilio" maxlength="300" required>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <label for="modalidad">Modalidad de propiedad</label>
                <select class="form-control" name="modalidad" id="modalidad" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="estado_proc">Estado procesal</label>
                <select class="form-control" name="estado_proc" id="estado_proc" required>
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6" >
                <label for="superficie">Superficie en <strong>metros cuadrados</strong> del <strong> área total </strong> </label>
                <input class="form-control" type="number" step="any" name="superficie" id="superficie"  required>
            </div>
            <div class="col-sm-6">
                <label for="valor_avaluo">Valor de avalúo </label>
                <input class="form-control" type="number" step="any" name="valor_avaluo" id="valor_avaluo"  required>
            </div>
        </div>
        <div class="form-group">
            <label for="img_inmueble">Imagen del inmueble <strong>En formato JPEG/JPG/PNG</strong> </label>
            <input class="form-control" type="file" name="img_inmueble" id="img_inmueble">
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
        </div>

        <h4>Contácto telefónico</h4>

        <div class="form-group row">
            <div class="col-sm-4">
                <label for="nombreGob">Gobierno Estatal</label>
                <input type="text" class="form-control" name="nombreGob" placeholder="Nombre de contácto">
                <input type="number" class="form-control mt-1" name="telGob" id="gobierno-estatal" placeholder="Número">
                <input type="email" class="form-control mt-1" name="mailGob" id="mailGob" placeholder="E-mail">
            </div>
            <div class="col-sm-4">
                <label for="nombreProp">Propietario C/V</label>
                <input type="text" class="form-control" name="nombreProp" placeholder="Nombre de contácto">
                <input type="number" class="form-control mt-1" name="telProp" id="gobierno-estatal" placeholder="Número">
                <input type="email" class="form-control mt-1" name="mailProp" id="mailProp" placeholder="E-mail">
            </div>
            <div class="col-sm-4">
                <label for="nombrePJ">Poder Judicial</label>
                <input type="text" class="form-control" name="nombrePJ" placeholder="Nombre de contácto">
                <input type="number" class="form-control mt-1" name="telPJ" id="gobierno-estatal" placeholder="Número">
                <input type="email" class="form-control mt-1" name="mailPJ" id="mailPJ" placeholder="E-mail">
            </div>
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