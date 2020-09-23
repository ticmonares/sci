<?php
class Consulta extends Controller{
    public function __construct(){
        parent::__construct();
        $this->view->datos = [];
    }
    public function render(){
        //muestra los datos
        $datos = $this->model->getDatos();
        $this->view->datos = $datos;
        $this->view->mensaje = "";
        $this->view->render('consulta/index');
    }


    public function nuevoRegistro(){
        //cargar formulario
        $this->view->mensaje = "";
        $regiones = $this->model-> getRegiones();
        $this->view->regiones = $regiones;
        $this->view->render('consulta/nuevo');
    }

    public function  registrarNuevo(){
        if (isset($_POST['region'])){
            $region = $_POST ['region'];
            $distrito = $_POST ['distrito'];
            $municipio = $_POST ['municipio'];
            $edificio = $_POST ['edificio'];
            $domicilio = $_POST ['domicilio'];
            $modalidad = $_POST ['modalidad'];
            $estado = $_POST ['estado_proc'];
            $superficie = $_POST ['superficie'];
            $doc_status = [];
            $doc_status = $_FILES['doc_status'];
            $datos = [
                'region' => $region,
                'distrito' => $distrito,
                'municipio' => $municipio,
                'edificio' => $edificio,
                'domicilio' => $domicilio,
                'modalidad' => $modalidad,
                'estado' => $estado,
                'superficie' => $superficie
            ];
            if ($this->model->insert($datos, $doc_status)){
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

    function getModalidades(){
        $modalidades = $this->model->getModalidades();
        if($modalidades){
            $mensaje = "Exito al obtener modalidades";
        }else{
            $mensaje = "Error al obtener modalidades";
        }
        //echo $mensaje;
        $modalidadesJSON = json_encode($modalidades);
        echo $modalidadesJSON;
    }

    function getEstadosProc(){
        $estadosProc = $this->model->getEstadosProc();
        if ($estadosProc){
            $mensaje = "Exito al obtener estados";
        }else{
            $mensaje = "Exito al obtener estados";
        }
        $estadosProcJson = json_encode($estadosProc);
        echo $estadosProcJson;
    }
    public function VerRegistro($param = null){
        $id_registro = $param[0];
        $registro = $this->model->getById($id_registro);
        if ($registro){
            //$mensaje = "Exito";
            $this->view->registro = $registro;
            $this->view->mensaje = "Ver detalles";
            $this->view->render('consulta/detalle');
        }else{
            //$mensaje = "Error";
        }
        //print $mensaje;
    }
    //Editar registro?
    
}
?>