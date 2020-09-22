<?php
class Signin extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view->mensaje= "";
    }
    public function render(){
        if ( Core::validarSU() ){
            $this->view->render('signin/index');
        }else{
            $this->view->render('login/index');            
        }
        
    }
    public function procesarSignin(){
        if (isset($_POST['nombre'])){
            $nombre = $_POST ['nombre'];
            $no_empleado = $_POST ['no_empleado'];
            $correo = $_POST ['correo'];
            $contrasena = $_POST ['contrasena'];
            $rol = $_POST ['rol'];
            $datos = [
                'nombre' => $nombre,
                'no_empleado' => $no_empleado,
                'correo' => $correo,
                'contrasena' => $contrasena,
                'rol' => $rol
            ];
            if ($this->model->insert($datos)){
                $mensaje = " Usuario registrado con éxito";
            }else{
                $mensaje = "Error al registrar usuario";
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }else{
            $this->view->render('login/index');
        }
    }
    
}
?>