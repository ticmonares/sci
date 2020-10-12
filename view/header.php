<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>resources/bootstrap/css/bootstrap.css">
    <!--Lightbox CSS -->
    <link rel="stylesheet" href="<?php echo constant('URL') . 'resources\css\lightbox.min.css'; ?>">
    <!--Estilos de la galería-->
    <link rel="stylesheet" href="  <?php echo constant('URL') .  'resources/css/gallery-styles.min.css'; ?> ">
    <!--Mis estilos-->
    <link rel="stylesheet" href="<?php echo constant('URL') . 'resources/css/default.css'; ?>">

</head>

<body>
    <!--Aquí va el menu-->
    <div id="header">
        <nav class="navbar navbar-expand-lg  navbar-dark sticky-top  bg-red-pj">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (Core::validarSU()) {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>usuarios">Usuarios</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>consulta/nuevoRegistro">Nuevo Registro</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>consulta">Consulta Registros</a></li>
                        <!--                 <li class= "nav-item" ><a class="nav-link" href="<?php echo constant('URL'); ?>perfil">Perfil</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>cerrarsesion/cerrarSesion">Cerrar sesión</a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if (Core::validarAD()) {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>consulta/nuevoRegistro">Nuevo Registro</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>consulta">Consulta Registros</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>perfil">Perfil</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>cerrarsesion/cerrarSesion">Cerrar sesión</a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if (Core::validarUS()) {
                    ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>main">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>consulta">Consulta Registros</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>perfil">Perfil</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>ayuda">Ayuda</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo constant('URL'); ?>cerrarsesion/cerrarSesion">Cerrar sesión</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>
    <!--Script... RESPETAR ORDEN-->
    <!--JQUERY-->
    <script src="<?php echo constant('URL') . 'resources/js/jquery.min.js'; ?>"></script>
    <!--POPPER-->
    <script src="<?php echo constant('URL') . 'resources/js/popper.min.js'; ?>"></script>
    <!--BOOTSTRAP-->
    <script src="<?php echo constant('URL') . 'resources/bootstrap/js/bootstrap.min.js'; ?>"></script>
    <!--LIGHTBOX-->
    <script src="<?php echo constant('URL') . 'resources\js\lightbox.min.js'; ?> "></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="<?php echo constant('URL') . 'resources/dt/jquery.dataTables.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo constant('URL') . 'resources/dt/dataTables.bootstrap4.min.js'; ?>"></script>
    <!-- Alertas -->
    <!-- <script type="text/javascript" src="<?php echo constant('URL') . 'resources/js/sweetalert.min.js'; ?>"></script> -->
    
