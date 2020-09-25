<?php require_once 'modalStatus.php'; ?>
<?php require_once 'modalAcciones.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Inmueble</title>
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <div class="container py-5 mb-5">
        <div id="main">
            <h1 class="center">Editar expediente: <?php echo $this->registro->no_expediente; ?> </h1>
        </div>
        <div class="center">
            <?php
            if (isset($this->mensaje)) {
                echo $this->mensaje;
            } else {
                echo "Ver detalles";
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="<?php echo constant('URL') . 'consulta/editarRegistro/' . $this->registro->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="region">Región</label>
                            <select class="form-control" name="region" id="region" class="region" required disabled>
                                <?php
                                $region = new Region();
                                $id_region = $this->registro->id_region;
                                echo $region->cargaSelectRol($id_region);
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="distrito">Distrito Judicial </label>
                            <select class="form-control" name="distrito" id="distrito" class="registro" required disabled>
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
                        <select class="form-control" name="municipio" id="municipio" required disabled>
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
                        <input class="form-control" type="text" name="edificio" id="edificio" maxlength="100" value="<?php echo $this->registro->edificio; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <input class="form-control" type="text" name="domicilio" id="domicilio" maxlength="100" value="<?php echo $this->registro->domicilio; ?>" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="modalidad">Modalidad de propiedad</label>
                            <select class="form-control" name="modalidad" id="modalidad" required>
                                <?php
                                $this->modalidades;
                                foreach ($this->modalidades as $modalidad) {
                                    if ($this->registro->id_modalidad_prop == $modalidad->id) {
                                ?>
                                        <option selected value="<?php echo $modalidad->id ?>">
                                            <?php
                                            echo $modalidad->nombre;
                                            ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $modalidad->id ?>">
                                            <?php
                                            echo $modalidad->nombre;
                                            ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="estado_proc">Estado procesal</label>
                            <select class="form-control" name="estado_proc" id="estado_proc" required>
                                <?php
                                $this->estados_proc;
                                foreach ($this->estados_proc as $estado_proc) {
                                    if ($this->registro->id_estado_proc == $estado_proc->id) {
                                ?>
                                        <option selected value="<?php echo $estado_proc->id ?>">
                                            <?php
                                            echo $estado_proc->nombre;
                                            ?>
                                            </>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $estado_proc->id ?>">
                                            <?php
                                            echo $estado_proc->nombre;
                                            ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="superficie">Superficie</label>
                        <input class="form-control" type="text" name="superficie" id="superficie" maxlength="100" value="<?php echo $this->registro->superficie; ?>" required>
                    </div>
                    <!-- <div class="form-group">
                                <label for="doc_status">Documentación que ampara status del inmueble</label>
                                <input class="form-control" type="file" name="doc_status" id="doc_status" required>
                            </div> -->
                    <input class="btn btn-dark bg-red-pj" type="submit" value="Editar">
                </form>
            </div>
        </div>
    </div>

    <div class="container  mb-5 ">
        <div class="row">
            <div class="col clearfix mb-4">
                <h3>Historial de documentos</h3>
                <!-- Button trigger modal -->
                <a href="#" class="btn btn-dark bg-red-pj float-left" data-toggle="modal" data-target="#modalStatus">Agregar Status</a>
                <a href="#" class="btn btn-dark bg-red-pj float-right" data-toggle="modal" data-target="#modalAcciones">Agregar Evidencia</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <table class="table tabala-documentos">
                    <thead>
                        <tr>
                            <th>Status Inmueble</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($this->docStatus) {
                            foreach ($this->docStatus as $documentoStatus) {
                        ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $documentoStatus['fecha'];
                                        ?>
                                        <a href="<?php echo constant('URL') . 'resources/archivosStatus/' . $documentoStatus['nombre']; ?> " target="_blank">
                                            <?php
                                            echo $documentoStatus['nombre'];
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    echo "No hay registros";
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="table tabala-documentos">
                    <thead>
                        <tr>
                            <th>Acciones realizadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($this->docAcciones) {
                            foreach ($this->docAcciones as $documentoAcciones) {
                        ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $documentoAcciones['fecha'];
                                        ?>
                                        <a href="<?php echo constant('URL') . 'resources/archivosAcciones/' . $documentoAcciones['nombre']; ?> " target="_blank">
                                            <?php
                                            echo $documentoAcciones['nombre'];
                                            ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    echo "No hay registros";
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once 'view/footer.php'; ?>
</body>
<!--<script src="<?php echo constant('URL'); ?>resources/js/inmuebles.js"></script>-->
<!-- <script src="<?php echo constant('URL') . 'resources/js/detallesInmuebles.js'; ?>"></script> -->

</html>