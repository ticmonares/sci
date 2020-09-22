<?php
class CerrarSesion extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function cerrarSesion(){
        session_destroy();
        header('location:http://localhost/sci/login');
    }
}
?>