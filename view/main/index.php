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
    <div id="main" class="center">
    <img id="logo" src="<?php echo constant('URL') . "resources/img/logo-pjedomex.png" ?>" alt="Logo Poder Judicual del Estado de México">
        <h1>Bienvenido</h1>
        <h2>Sistema de Contro de Inmuebles</h2>      
        <h2>Usuario</h2>
        <div class="btn-container">
            <a class="button" href="<?php echo constant('URL')?>main/saludo"> Saludos </a>
        </div>
    </div>
    <?php require 'view/footer.php'; ?>
</body>
</html>