<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<body>
    <?php require 'view/header.php'; ?>
    <div class="container mx-auto" id="heading">
        <div class="row">
            <div class="col">
                <div id="respuesta">
                    <?php
                    if (!isset($this->mensaje)) {
                        $this->mensaje = "Bienvenido";
                    }
                    echo $this->mensaje;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center mt-5 mb-5 " id="login-form">
        <div clas="row">
            <div class="col">
                <!--<img id="logo" class="img-fluid" src="<?php echo constant('URL') . "resources/img/logo-pjedomex.png" ?>" alt="Logo Poder Judicual del Estado de México">-->
                <h1>Sistema de Control de Inmuebles</h1>
                <h2>Iniciar sesión</h2>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5 ">
                    <div class="card card-login ">
                    <img class="card-im-top img-fluid" src="<?php echo constant('URL') . 'resources/img/square-logo.png' ?>" alt="Logo Poder Judicial">
                    <div class="card-body">
                        <form action="<?php echo constant('URL') . 'login/procesarLogin'; ?>" method="POST">
                            <div class="form-group">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input class="form-control" type="mail" id="correo" name="correo" placeholder="Correo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">***</div>
                                        </div>
                                        <input class="form-control" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                                    </div>
                                    <input class="btn btn-dark bg-red-pj" type="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>

    <?php require 'view/footer.php'; ?>
</body>

</html>