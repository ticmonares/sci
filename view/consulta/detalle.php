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
        <h1 class="center">Editar expediente: <?php echo $this->registro->no_expediente; ?> </h1>
    </div>
    <div class="center">
        <?php
        echo $this->mensaje;
        ?>
    </div>
    <div class="container py-5 mb-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="<?php echo constant('URL') . 'consulta/editarRegistro'; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="region">Región</label>
                            <select class="form-control" name="region" id="region" class="region" required disabled >
                                <?php
                                $region = new Region();
                                $id_region = $this->registro->id_region;
                                echo $region->cargaSelectRol($id_region);
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="distrito">Distrito Judicial </label>
                            <select class="form-control" name="distrito" id="distrito" class="registro" required disabled >
                                <!-- <option value="">Elija una opción</option> -->
                                <option value="0">
                                    <?php
                                        echo $this->registro->nombreDistrito;
                                    ?>
                                </option>
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="municipio">Municipio</label>
                            <select class="form-control" name="municipio" id="municipio" required disabled >
                                <!-- <option value="">Elija una opción</option> -->
                                <option value="0">
                                    <?php
                                        echo $this->registro->nombreMunicipio;
                                    ?>
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edificio">Edificio</label>
                            <input class="form-control" type="text" name="edificio" id="edificio" maxlength="30" value="<?php echo $this->registro->edificio; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="domicilio">Domicilio</label>
                            <input class="form-control" type="text" name="domicilio" id="domicilio" maxlength="30" value="<?php echo $this->registro->domicilio; ?>" required>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="modalidad">Modalidad de propiedad</label>
                                <select class="form-control" name="modalidad" id="modalidad" required>
                                    <option value="">Elija una opción</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="estado_proc">Estado procesal</label>
                                <select class="form-control" name="estado_proc" id="estado_proc" required>
                                    <option value="">Elija una opción</option>
                                </select>
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="superficie">Superficie</label>
                                <input class="form-control" type="text" name="superficie" id="superficie" maxlength="30" value="<?php echo $this->registro->superficie; ?>" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="doc_status">Documentación que ampara status del inmueble</label>
                                <input class="form-control" type="file" name="doc_status" id="doc_status" required>
                            </div> -->

                            <input class="btn btn-dark bg-red-pj" type="submit" value="Editar" disabled>
                </form>
            </div>
        </div>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
<!--<script src="<?php echo constant('URL'); ?>resources/js/inmuebles.js"></script>-->
<!-- <script src="<?php echo constant('URL') . 'resources/js/detallesInmuebles.js'; ?>"></script> -->

</html>