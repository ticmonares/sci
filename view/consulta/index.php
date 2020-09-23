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
        <div class="center">
            <?php
            //echo $this->mensaje ;
            ?>
        </div>
        <a class="btn btn-dark bg-red-pj" href="<?php echo constant('URL') . 'consulta/nuevoRegistro'; ?>">Nuevo</a>
        <div class="container">
            <div class="row ">
                <form action="#" class="form-inline">
                    <strong>Ver por: </strong>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="region">Región</label>
                            <select class="form-control" name="region" id="region">
                                <option value="1">TOLUCA</option>
                                <option value="2">TEXCOCO</option>
                                <option value="3">TLANEPANTLA</option>
                                <option value="4">ECATEPEC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" name="distrito" id="distrito">
                                <option value="1">TOLUCA</option>
                                <option value="2">TEXCOCO</option>
                                <option value="3">TLANEPANTLA</option>
                                <option value="4">ECATEPEC</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="municipio">Municipio</label>
                            <select class="form-control" name="municipio" id="municipio">
                                <option value="1">TOLUCA</option>
                                <option value="2">TEXCOCO</option>
                                <option value="3">TLANEPANTLA</option>
                                <option value="4">ECATEPEC</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col mt-5">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col" >Expediente</th>
                                <th scope="col">Region</th>
                                <th scope="col">Distrito J.</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                    
                                    <!-- <td>
                                        <a href="<?php echo constant('URL') . 'resources/archivosStatus/' . $registro->doc_status; ?>" target="_blank">
                                            <?php echo $registro->doc_status;  ?>
                                        </a>
                                    </td> -->
                                    
                                    <td>
                                        <a href="<?php echo constant('URL') . 'consulta/VerRegistro/' . $registro->id; ?>">Ver más</a>
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

</html>