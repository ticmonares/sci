<?php
class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje= "";
    }
    
    function render(){
        $this->view->render('nuevo/index');
    }

    function registrarAlumno(){
        $mensaje = "";
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $datos = [
            'matricula' => $matricula,
            'nombre' => $nombre,
            'apellido' => $apellido
        ];
        if ($this->model->insert($datos)){
            $mensaje = "Alumno creado";
        }else{
            $mensaje = "Error al resgistrar alumno";
        }
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
 ?>