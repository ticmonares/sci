<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>resources/css/dafault.css">
</head>

<body>
    <!--Aquí va el menu-->
    <div id="header">
        <ul>
            <?php
            if (Core::validarSU()) {
            ?>
                <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>usuarios">Usuarios</a></li>
                <li><a href="<?php echo constant('URL'); ?>consulta/nuevoRegistro">Nuevo Registro</a></li>
                <li><a href="<?php echo constant('URL'); ?>consulta">Consulta Registros</a></li>
<!--                 <li><a href="<?php echo constant('URL'); ?>perfil">Perfil</a></li> -->
                <li><a href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
                <li><a href="<?php echo constant('URL'); ?>cerrarsesion/cerrarSesion">Cerrar sesión</a></li>
            <?php
            }
            ?>
            <?php
            if (Core::validarAD()) {
            ?>
                <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>consulta/nuevoRegistro">Nuevo Registro</a></li>
                <li><a href="<?php echo constant('URL'); ?>consulta">Consulta Registros</a></li>
                <!-- <li><a href="<?php echo constant('URL'); ?>perfil">Perfil</a></li> -->
                <li><a href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
                <li><a href="<?php echo constant('URL'); ?>cerrarsesion/cerrarSesion">Cerrar sesión</a></li>
            <?php
            }
            ?>
            <?php
            if (Core::validarUS()) {
            ?>
                <li><a href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>consulta">Consulta Registros</a></li>
                <!-- <li><a href="<?php echo constant('URL'); ?>perfil">Perfil</a></li> -->
                <li><a href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
                <li><a href="<?php echo constant('URL'); ?>cerrarsesion/cerrarSesion">Cerrar sesión</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>
</html>