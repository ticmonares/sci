<?php
class Login extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view->mensaje= "";
    }
    
    function render(){
        if(!Core::validarSession()){
            $this->view->render('login/index');
        }else{
            $this->view->render('main/index');
        }
    }
    

    function procesarLogin(){
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $datos = [
            'correo' => $correo,
            'contrasena' => $contrasena
        ];
        if ($this->model->validaLogin($datos)){
            // $mensaje = "Bienvenido";
            // $tipoMensaje = "success";
            // $render= "main/index";
            header('location:' . constant('URL').'main');
        }else{
            $mensaje = "¡ERROR! Comprueba tu usario o contraseña";
            $tipoMensaje = "danger";
            $render= "login/index";
        }
        $this->view->mensaje = $mensaje;
        $this->view->tipoMensaje = $tipoMensaje;
        
        $this->view->render($render);
    }
}
?>