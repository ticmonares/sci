<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <?php require_once 'view/header.php'; ?>
    <div id="main">
        <h1 class="center">Módulo para consultar</h1>
    </div>
    <div id="mensaje" class="center">
        <?php
        echo $this->mensaje;
        ?>
    </div>
    <div  class="main display">
        <div id="respuesta">

        </div>
        <div class="container">
            <div class="row mb-2">
                <a class="btn btn-dark bg-red-pj " href="<?php echo constant('URL') . "signin" ?>">Agregar Usuario</a>
            </div>
            <div class="row">
                <div class="col display" id="table-container" >
                    <table id="tbl-usuarios" class="table table-responsive display">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>No_empleado</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-usuarios">
                            <?php
                            //var_dump($this->alumnos);
                            //include_once 'model/Alumno.class.php';
                            foreach ($this->usuarios as $row) {
                            ?>
                                <tr id="fila-id-<?php echo $row->id; ?>">
                                    <td><?php echo $row->id; ?></td>
                                    <td><?php echo $row->nombre; ?> </td>
                                    <td><?php echo $row->no_empleado; ?> </td>
                                    <td><?php echo $row->correo; ?> </td>
                                    <td><?php echo $row->rol; ?> </td>
                                    <td>
                                        <a class="btn btn-dark bg-red-pj" href="<?php echo constant('URL') . 'usuarios/verUsuario/' .  $row->id; ?>" class="btn">Editar</a>
                                    </td>
                                    <!--
                                    <td>
                                        <a href="<?php echo constant('URL') . 'usuario/borrarUsuario/' . $row->id; ?> ">Eliminar</a>
                                    </td>
                                
                                    <td>
                                        <button class="btnEditar"  data-id="<?php echo $row->id; ?>" >Editar</button>
                                    </td>
                                     -->
                                    <td>
                                        <button class="btnEliminar" data-id="<?php echo $row->id; ?>" data-matricula="<?php echo $row->no_empleado; ?>">
                                            Eliminar
                                        </button>
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
<script src="resources/js/user.js"></script>

</html>