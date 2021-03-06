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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Expediente: <?php echo $this->registro->no_expediente; ?> </h1>
                <p class="lead">Inventario: <?php echo $this->registro->no_inventario; ?></p>
            </div>
        </div>
        <?php
        if (isset($this->mensaje)) {
            //echo $this->mensaje;
            Core::alert($this->mensaje, $this->tipoMensaje);
        }
        ?>
        <div class="row">
            <div class="col-md-10 mx-auto">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <strong>Región: </strong>
                                <?php
                                $region = new Region();
                                $id_region = $this->registro->id_region;
                                echo $region->traduceRegion($id_region);
                                ?>
                            </div>
                            <div class="col-4">
                                <strong>Distrito Judicial: </strong>
                                <?php
                                echo $this->registro->nombreDistrito;
                                ?>
                            </div>
                            <div class="col-4">
                                <strong>Distrito Judicial: </strong>
                                <?php
                                echo $this->registro->nombreDistrito;
                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <p>
                            <strong>Edificio</strong>
                        </p>
                        <p>
                            <?php echo $this->registro->edificio; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p>
                            <strong>Domicilio</strong>
                        </p>
                        <p>
                            <?php echo $this->registro->domicilio; ?>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <strong>Modalidad de propiedad </strong>
                                <?php
                                $modalidad = new ModalidadPropiedad();
                                echo $modalidad->toString($this->registro->id_modalidad_prop);
                                ?>
                            </div>
                            <div class="col-6">
                                <strong>Estado procesal </strong>
                                <?php
                                $estado = new EstadoProcesal();
                                echo $estado->toString($this->registro->id_estado_proc);
                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-6">
                                <strong>Superficie total: </strong>
                                <?php
                                echo $this->registro->superficie;
                                ?>
                            </div>
                            <div class="col-6">
                                <strong>Valor de avalúo: </strong>
                                <?php
                                echo $this->registro->valor_avaluo;
                                ?>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-12">
                                <strong>Observaciones</strong>
                                <?php
                                !isset($this->observacion->observacion) ?  $observacion = "" : $observacion = $this->observacion->observacion;
                                ?>
                                <textarea maxlength="1000" class="form-control" name="observaciones" id="observaciones" cols="30" rows="7" disabled>
                                    <?php echo $observacion; ?>
                                </textarea>
                            </div>
                    </li>
                </ul>


            </div>
        </div>
    </div>
    <!-- //Galería de imagenes -->
    <?php
    if (isset($this->imagen)) {
        require_once 'galeria.php';
    } else {
        require_once 'agregarImg.php';
    }
    ?>
    <!-- Módulo de obra -->
    <?php
    require_once 'obra.php';
    ?>
    <div class="container bg-light rounded  mb-5 ">
        <div class="row">
            <div class="col clearfix mb-4">
                <h2>Historial de documentos</h2>
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
<?php require_once 'modalObra.php'; ?>
<?php require_once 'modalStatus.php'; ?>
<?php require_once 'modalAcciones.php'; ?>
<?php require_once 'modalContacto.php'; ?>
<!--<script src="<?php echo constant('URL'); ?>resources/js/inmuebles.js"></script>-->
<script src="<?php echo constant('URL') . 'resources/js/detallesInmuebles.js'; ?>"></script>

</html>