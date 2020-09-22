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
            $mensaje = "Bienvenido";
            $render= "main/index";
        }else{
            $mensaje = "Comprueba tus datos";
            $render= "login/index";
        }
        $this->view->mensaje = $mensaje;
        header('location:' . constant('URL').'main');
        //$this->view->render($render);
    }
}
?>