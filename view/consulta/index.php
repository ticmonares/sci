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
        <h1 class="center">Nuevo Registro</h1>
    </div>
    <div class="center">
    <?php
        //echo $this->mensaje ;
    ?>
    </div>
    <div class="main">
        <a href="<?php echo constant('URL') . 'consulta/nuevoRegistro'; ?>">Nuevo</a>
        <h2>Aquí va la tabla</h2>
        <table>
           <thead>
               <tr>
                    <th>#</th>
                    <th>Region</th>
                    <th>Distrito</th>
                    <th>Municipio</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td>Un dato</td>
                   <td>Un dato</td>
                   <td>Un dato</td>
                   <td>Un dato</td>
               </tr>
           </tbody>
       </table>
    </div>
    <?php require_once 'view/footer.php'; ?>
</body>
</html>