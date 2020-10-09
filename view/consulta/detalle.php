<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Inmueble</title>
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <div class="container mt-4 py-5 mb-5 bg-light rounded">
        <h1 class=" text-center">Expediente: <?php echo $this->registro->no_expediente; ?> </h1>
        <h2 class="text-center">Inventario: <?php echo $this->registro->no_inventario; ?> </h2>
        <?php
        if (isset($this->mensaje)) {
            //echo $this->mensaje;
            Core::alert($this->mensaje, $this->tipoMensaje);
        }
        ?>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <form action="<?php echo constant('URL') . 'consulta/editarRegistro/' . $this->registro->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" name="noExpediente" id="noExpediente" hidden value="<?php echo $this->registro->no_expediente ?>">
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
                        <input class="form-control" type="text" name="edificio" id="edificio" maxlength="300" value="<?php echo $this->registro->edificio; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="domicilio">Domicilio</label>
                        <input class="form-control" type="text" name="domicilio" id="domicilio" maxlength="300" value="<?php echo $this->registro->domicilio; ?>" required>
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
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="superficie">Superficie <strong>total</strong> en <strong>m2</strong> </label>
                            <input class="form-control only-number" type="text" name="superficie" id="superficie" maxlength="30" value="<?php echo $this->registro->superficie; ?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="valor_avaluo">Valor de avalúo</label>
                            $<input class="form-control only-number" type="text" name="valor_avaluo" id="valor_avaluo" maxlength="30" value="<?php echo $this->registro->valor_avaluo; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <?php
                        !isset($this->observacion->observacion) ?  $observacion = "" : $observacion = $this->observacion->observacion;
                        ?>
                        <textarea maxlength="1000" class="form-control" name="observaciones" id="observaciones" cols="30" rows="7"><?php echo $observacion; ?></textarea>
                    </div>
                    <input class="btn btn-dark bg-red-pj" id="btn-submit" type="submit" value="Editar">
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($this->imagen)) {
        require_once 'carruselmg.php';
    } else {
        require_once 'agregarImg.php';
    }
    ?>
    <div class="container bg-light rounded  mb-5 ">
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
    <!--Cargamos contactos-->
    <?php
    $contactoGob  = "No hay registro";
    $contactoProp = "No hay registro";
    $contactoPJ = "No hay registro";
    $telefonoGob = "";
    $telefonoProp = "";
    $telefonoPJ = "";
    $mailGob = "";
    $mailProp = "";
    $mailPJ = "";
    if ($this->contactos) {
        // print ("Hay  registros");
        foreach ($this->contactos as $contacto) {
            // $contacto->tipo_contacto == 1 ? $contactoGob = $contacto->telefono : "-";
            // $contacto->tipo_contacto == 2 ? $contactoProp = $contacto->telefono : "-";
            // $contacto->tipo_contacto == 3 ? $contactoPJ = $contacto->telefono : "-";
            switch ($contacto->tipo_contacto) {
                case 1:
                    $contactoGob = $contacto->nombre;
                    $telefonoGob = $contacto->telefono;
                    $mailGob = $contacto->correo;
                    break;
                case 2:
                    $contactoProp = $contacto->nombre;
                    $telefonoProp = $contacto->telefono;
                    $mailProp = $contacto->correo;
                    break;
                case 3:
                    $contactoPJ = $contacto->nombre;
                    $telefonoPJ = $contacto->telefono;
                    $mailPJ = $contacto->correo;
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
    ?>
    <div class="container mb-5 bg-light rounded">
        <div class="row">
            <div class="col-12">
                <h4>Contácto</h4>
            </div>
            <div class="col-12 col-sm-4 ">
                <h5>Gobierno Estatal</h5>
                <p>
                    <?php echo $contactoGob ?>
                </p>
                <p>
                    <a href="tel: <?php echo $telefonoGob; ?>">
                        <?php echo $telefonoGob; ?>
                    </a>
                </p>
                <p>
                    <a href="mailto: <?php echo $mailGob ?> ">
                        <?php echo $mailGob; ?>
                    </a>
                </p>
            </div>
            <div class="col-12 col-sm-4 ">
                <h5>Propietario C/V</h5>
                <p>
                    <?php echo $contactoProp ?>
                </p>
                <p>
                    <a href="tel: <?php echo $telefonoProp; ?>">
                        <?php echo $telefonoProp; ?>
                    </a>
                </p>
                <p>
                    <a href="mailto: <?php echo $mailProp ?> ">
                        <?php echo $mailProp; ?>
                    </a>
                </p>
            </div>
            <div class="col-12 col-sm-4 ">
                <h5>Poder Judicial</h5>
                <p>
                    <?php echo $contactoPJ ?>
                </p>
                <p>
                    <a href="tel: <?php echo $telefonoPJ; ?>">
                        <?php echo $telefonoPJ; ?>
                    </a>
                </p>
                <p>
                    <a href="mailto: <?php echo $mailPJ ?> ">
                        <?php echo $mailPJ; ?>
                    </a>
                </p>
            </div>
            <div class="col-12 mb-2">
                <button class="btn btn-dark bg-red-pj" data-toggle="modal" data-target="#modalContacto">Editar contáctos</button>
            </div>
        </div>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
<?php require_once 'modalImagen.php'; ?>
<?php require_once 'modalStatus.php'; ?>
<?php require_once 'modalAcciones.php'; ?>
<?php require_once 'modalContacto.php'; ?>
<!--<script src="<?php echo constant('URL'); ?>resources/js/inmuebles.js"></script>-->
<script src="<?php echo constant('URL') . 'resources/js/detallesInmuebles.js'; ?>"></script>

</html>