<?php
class PageError extends Controller {
    function __construct(){
        //echo "Error al cargar recurso";
        parent::__construct();
        $this->view->mensaje = "Error 404 no existe el recurso";
        $this->view->render('error/index');
    }
}
?>