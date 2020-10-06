<?php
class Usuarios extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->usuarios = [];
    }
    function render()
    {
        if (Core::validarSU()) {
            $usuarios = $this->model->getUsuarios();
            $this->view->usuarios = $usuarios;
            $this->view->mensaje = "";
            $this->view->render('usuarios/index');
        } else {
            $this->view->render('main/index');
        }
    }
    function verUsuario($param = null)
    {
        if (Core::validarSU()) {
            $idUsuario = $param[0];
            $usuario = $this->model->getUserById($idUsuario);
            $_SESSION['id_verUsuario'] = $usuario->id;
            $this->view->mensaje = "";
            $this->view->usuario = $usuario;
            $this->view->render('usuarios/detalle');
        } else {
            $this->view->render('main/index');
        }
    }
    function actualizarUsuario()
    {
        if (Core::validarSU()) {
            $id = $_SESSION['id_verUsuario'];
            $nombre = $_POST['nombre'];
            $no_empleado = $_POST['no_empleado'];
            $correo = $_POST['correo'];
            //$pass = $_POST['pass'];
            $rol = $_POST['rol'];
            //Desasiganos el valor de la  sesión
            unset($_SESSION['id_verUsuario']);
            $datos = [
                'id' => $id,
                'nombre' => $nombre,
                'no_empleado' => $no_empleado,
                'correo' => $correo,
                'rol' => $rol,
            ];
            if ($this->model->update($datos)) {
                $usuario = new Usuario();
                $usuario->id = $id;
                $usuario->nombre = $nombre;
                $usuario->no_empleado = $no_empleado;
                $usuario->correo = $correo;
                $usuario->rol = $rol;
    
                $this->view->usuario = $usuario;
                $mensaje = "Usuario actualizado correctamente";
            } else {
                $mensaje = "Error al  actualizar al usuario";
            }
            //Lo devolvemos al form de editar
            // $this->view->render('usuarios/detalle');
            //Lo devolvemos a la tabla
            $this->view->mensaje = $mensaje;
            $this->render();
        } else {
            $this->view->render('main/index');
        }
    }
    function borrarUsuario($param = null)
    {   
        if (Core::validarSU()) {
            $idUsuario = $param[0];
            if ($usuario = $this->model->disable($idUsuario)) {
                $mensaje  = "Usuario: " . $idUsuario . " eliminado correctamente";
            } else {
                $mensaje = "Error al borrar alumno";
            }
            // $this->view->mensaje = $mensaje;
            // $this->render();
            echo $mensaje;
        }else{
            $this->view->render('main/index');
        }
    }
}
