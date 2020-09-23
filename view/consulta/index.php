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
        <h1 class="center">Registros</h1>
    </div>
    <div class="center">
        <?php
        //echo $this->mensaje ;
        ?>
    </div>
    <div class="main">
        <a href="<?php echo constant('URL') . 'consulta/nuevoRegistro'; ?>">Nuevo</a>
        <h2>Ver por</h2>
        <form action="#">
            <label for="">Region</label>
            <select name="region" id="region">
                <option value="1">TOLUCA</option>
                <option value="2">TEXCOCO</option>
                <option value="3">TLANEPANTLA</option>
                <option value="4">ECATEPEC</option>
            </select>
            <label for="">Distrito</label>
            <select name="distrito" id="distrito">
                <option value="1">Distrito 1</option>
                <option value="2">Distrito 2</option>
                <option value="3">Distrito 3</option>
                <option value="4">Distrito 4</option>
            </select>
            <label for="">Region</label>
            <select name="region" id="region">
                <option value="1">TOLUCA</option>
                <option value="2">VALLE DE BRAVO</option>
                <option value="3">ZINACANTEPEC</option>
                <option value="4">LERMA</option>
            </select>
        </form>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Region</th>
                    <th>Distrito J.</th>
                    <th>Municipio</th>
                    <th>Documentos de Status</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->datos as $registro) { 
                ?>
                    <tr>
                        <td>
                            <?php
                            echo $registro->id;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $registro->id_region;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $registro->id_distrito_judicial;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $registro->id_municipio;
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo constant('URL').'resources/archivosStatus/'.$registro->doc_status; ?>" target="_blank">
                                <?php  echo $registro->doc_status;  ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo constant('URL').'consulta/VerRegistro/'.$registro->id; ?>">Ver más</a>
                        </td>
                       
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>

</html>