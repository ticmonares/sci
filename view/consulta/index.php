<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Inmueble</title>
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <div class="container">
        <div id="main">
            <h1 class="center">Registros</h1>
        </div>
        <?php
        if (isset($this->mensaje)) {
            //echo $this->mensaje;
            Core::alert($this->mensaje, $this->tipoMensaje);
        }
        ?>
        <a class="btn btn-dark bg-red-pj" href="<?php echo constant('URL') . 'consulta/nuevoRegistro'; ?>">Nuevo</a>
        <div class="container "  >
            <div class="row">
                <form action="#" class="form-inline">
                    <strong>Ver por: </strong>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3  ">
                        <div class="form-group">
                            <label for="region">Región</label>
                            <select class="form-control registro-select " name="region" id="region">
                                <option value="0">Seleccione una región</option>
                                <option value="1">TOLUCA</option>
                                <option value="2">TEXCOCO</option>
                                <option value="3">TLALNEPANTLA</option>
                                <option value="4">ECATEPEC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 ">
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control registro-select " name="distrito" id="distrito">
                                <option value="0">Seleccione un distrito</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 ">
                        <div class="form-group">
                            <label for="municipio">Municipio</label>
                            <select class="form-control registro-select " name="municipio" id="municipio">
                            <option value="0">Seleccione un municipio</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="row ">
                <p>
                <strong>Buscar por:</strong>    
                </p>
                <div class="col-4">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Atributo">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        
                        <select name="criterio" id="criterio" class="form-control">
                            <option value="1">No. Expediente</option>
                            <option value="1">Modalidad</option>
                            <option value="1">Estado procesal</option>
                            <option value="1">Status</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <input type="button" value="Buscar" class="btn btn-dark bg-red-pj  " >
                    </div>
                </div>
            </div> -->

        </div>
        <div class="container mb-5 mt-0">
            <div class="row mt-0">
                <div class="col-12">
                    <table class="table" id="tabla-registros-inmuebles" >
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th class="tbl-heading" scope="col">No. Exp</th>
                                <th class="tbl-heading" scope="col">Región</th>
                                <th class="tbl-heading" scope="col">Distrito J.</th>
                                <th class="tbl-heading" scope="col">Municipio</th>
                                <th class="tbl-heading" scope="col">Edificio</th>
                                <th class="tbl-heading" scope="col">Modalidad</th>
                                <th class="tbl-heading" scope="col">Estado Procesal</th>
                                <th class="tbl-heading" scope="col">Ver</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-tabla-registros" >
                            <?php
                            //
                            require_once 'model/classes/ModalidadPropiedad.class.php';
                            $modalidad = new ModalidadPropiedad();
                            require_once 'model/classes/EstadoProcesal.class.php';
                            $estado = new EstadoProcesal();
                            //
                            foreach ($this->datos as $registro) {
                            ?>
                                <tr>
                                    <!-- <th class="scope">
                                        <?php
                                        echo $registro->id;
                                        ?>
                                    </th> -->
                                    <th>
                                        <?php
                                        echo $registro->no_expediente;
                                        ?>
                                    </th>
                                    <td>
                                        <?php
                                        $region = new Region();
                                        $idRegion = $registro->id_region;
                                        echo $region->traduceRegion($idRegion);
                                        //echo $registro->nombre;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        //echo $registro->id_distrito_judicial;
                                        echo $registro->nombreDistrito;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        //echo $registro->id_municipio;
                                        echo $registro->nombreMunicipio;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        
                                        echo $registro->edificio;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        //echo $registro->id_modalidad_prop;
                                        echo $modalidad->toString($registro->id_modalidad_prop);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        //echo $registro->id_estado_proc;
                                        echo $estado->toString($registro->id_estado_proc);
                                        ?>
                                    </td>

                                    <!-- <td>
                                        <a href="<?php echo constant('URL') . 'resources/archivosStatus/' . $registro->doc_status; ?>" target="_blank">
                                            <?php echo $registro->doc_status;  ?>
                                        </a>
                                    </td> -->

                                    <td>
                                        <a href="<?php echo constant('URL') . 'consulta/VerRegistro/' . $registro->id; ?>">más</a>
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
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
<script src="<?php echo constant('URL'); ?>resources/js/tabla-inmuebles.js"></script>
</html>