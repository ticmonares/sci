<?php
class Consulta extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view->datos = [];
    }
    public function render(){
        //muestra los datos
        /*
        $datos = $this->model->getDatos();
        $this->view->datos = $datos;
        $this->view->mensaje = "";
        $this->view->render('consulta/index');
        */
        $this->view->render('consulta/index');
    }


    public function nuevoRegistro(){
        //cargar formulario
        $this->view->mensaje = "Agregar nuevo";
        $regiones = $this->model-> getRegiones();
        $this->view->regiones = $regiones;
        $this->view->render('consulta/nuevo');
    }

    public function  registrarNuevo(){
        echo "Amos a registrar";
    }

    public function getDistrito($param = null){
        //Recibimos el id del distrito
        //print " Se cargo  el id " . $distrito[0];
        $id_region = $param[0];
        $distritos = $this->model->getDistritos($id_region);
        if($distritos){
            $mensaje ="Distritos cargados correctamente";
        }else{
            $mensaje ="Error al cargar distritos";
        }
        $distritosJSON = json_encode($distritos);
        echo $distritosJSON;
    }    

    public function getMunicipios($param = null){
        $id_distrito = $param[0];
        $municipios = $this->model->getMunicipios($id_distrito);
        if ($municipios){
            $mensaje = "Exito al cargar municipios";
        }else{
            $mensaje = "Error al cargar municipios";
        }
        $municipiosJSON = json_encode($municipios);
        echo $municipiosJSON;
    }
}
?>