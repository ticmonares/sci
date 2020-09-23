<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>
<body>
    <?php require 'view/header.php'; ?>
    <div class="container text-center">
    <img class="img-fluid" id="logo" src="<?php echo constant('URL') . "resources/img/logo-pjedomex.png" ?>" alt="Logo Poder Judicual del Estado de México">
        <h1>Bienvenido</h1>
        <h2>Sistema de Contro de Inmuebles</h2>      
        <h2>Usuario</h2>
        <div class=" ">
            <a class="btn btn-dark bg-red-pj" href="<?php echo constant('URL')?>consulta/nuevoRegistro"> 
                Iniciar
            </a>
        </div>
    </div>
    <?php require 'view/footer.php'; ?>
</body>
</html>