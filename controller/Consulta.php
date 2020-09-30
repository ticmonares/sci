<?php
class Consulta extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
    }
    public function render()
    {
        //muestra los datos
        $datos = $this->model->getDatos();
        $this->view->datos = $datos;
        $this->view->render('consulta/index');
    }


    public function nuevoRegistro()
    {
        //cargar formulario
        //$this->view->mensaje = "";
        $regiones = $this->model->getRegiones();
        $this->view->regiones = $regiones;
        $this->view->render('consulta/nuevo');
    }

    public function  registrarNuevo()
    {
        if (isset($_POST['region'])) {
            // if ( isset($observaciones) ){
            //     $observaciones = $_POST['observaciones'];
            //     echo "REgistremos la observación " . $observaciones;
            // }
            $noExpediente = $_POST['noExpediente'];
            $region = $_POST['region'];
            $distrito = $_POST['distrito'];
            $municipio = $_POST['municipio'];
            $edificio = $_POST['edificio'];
            $domicilio = $_POST['domicilio'];
            $modalidad = $_POST['modalidad'];
            $estado = $_POST['estado_proc'];
            $superficie = $_POST['superficie'];
            $contactoGobierno = $_POST['gobierno-estatal'];
            $contactoPropietario = $_POST['propietario'];
            $contactoPJ = $_POST['poder-judicial'];
            //$doc_status = [];
            //$doc_status = $_FILES['doc_status'];
            $datos = [
                'noExpediente' => $noExpediente,
                'region' => $region,
                'distrito' => $distrito,
                'municipio' => $municipio,
                'edificio' => $edificio,
                'domicilio' => $domicilio,
                'modalidad' => $modalidad,
                'estado' => $estado,
                'superficie' => $superficie
            ];
            if ($this->model->insert($datos)) {
                //print "Exito";
                $tipoMensaje = "success";
                $mensaje = "Expediente de inmueble registrado con éxito";
                //Una vez registrado el inmueble, registramos los contactos
                if (!$contactoGobierno == "") {
                    $contacto = $this->model->insertContacto($noExpediente, $contactoGobierno, 1);
                    if ($contacto) {
                        // print ("Éxito al registrar contacto gobierno");
                    } else {
                        // print ("Error al registrar contacto gobierno");
                    }
                }
                if (!$contactoPropietario == "") {
                    $contacto = $this->model->insertContacto($noExpediente, $contactoPropietario, 2);
                    if ($contacto) {
                        // print ("Éxito al registrar contacto propietario");
                    } else {
                        // print ("Error al registrar contacto propietario");
                    }
                }
                if (!$contactoPJ == "") {
                    $contacto = $this->model->insertContacto($noExpediente, $contactoPJ, 3);
                    if ($contacto) {
                        // print ("Éxito al registrar contacto PJ");
                    } else {
                        // print ("Error al registrar contacto PJ");
                    }
                }
                header("location:" . constant('URL') . "consulta/verRegistro/" . $this->model->getLastRegistroId());
            } else {
                $tipoMensaje = "danger";
                $mensaje = "ERROR: El número de expediente ya se encuentra registrado";
                //print "Error";
            }
            $this->view->tipoMensaje = $tipoMensaje;
            $this->view->mensaje = $mensaje;
            //print $mensaje;
            $regiones = $this->model->getRegiones();
            $this->view->regiones = $regiones;
            $this->view->render('consulta/nuevo');

        } else {
            if (Core::validarSession()) {
                $this->view->render('main/index');
            } else {
                $this->view->render('login/index');
            }
        }
    }


    public function getDistrito($param = null)
    {
        //Recibimos el id del distrito
        //print " Se cargo  el id " . $distrito[0];
        $id_region = $param[0];
        $distritos = $this->model->getDistritos($id_region);
        if ($distritos) {
            $mensaje = "Distritos cargados correctamente";
        } else {
            $mensaje = "Error al cargar distritos";
        }
        $distritosJSON = json_encode($distritos);
        echo $distritosJSON;
    }

    public function getMunicipios($param = null)
    {
        $id_distrito = $param[0];
        $municipios = $this->model->getMunicipios($id_distrito);
        if ($municipios) {
            $mensaje = "Exito al cargar municipios";
        } else {
            $mensaje = "Error al cargar municipios";
        }
        $municipiosJSON = json_encode($municipios);
        echo $municipiosJSON;
    }
    function getModalidades()
    {
        $modalidades = $this->model->getModalidades();
        if ($modalidades) {
            $mensaje = "Exito al obtener modalidades";
        } else {
            $mensaje = "Error al obtener modalidades";
        }
        //echo $mensaje;
        $modalidadesJSON = json_encode($modalidades);
        echo $modalidadesJSON;
    }
    function getEstadosProc()
    {
        $estadosProc = $this->model->getEstadosProc();
        if ($estadosProc) {
            $mensaje = "Exito al obtener estados";
        } else {
            $mensaje = "Exito al obtener estados";
        }
        $estadosProcJson = json_encode($estadosProc);
        echo $estadosProcJson;
    }
    function verDocumentosStatus($noExpediente)
    {
        $documentosStatus = $this->model->getDocStatus($noExpediente);
        if ($documentosStatus) {
            return $documentosStatus;
            //echo "Exito";
        } else {
            return false;
        }
    }
    function verDocumentosAcciones($noExpediente)
    {
        $documentosAcciones = $this->model->getDocAcciones($noExpediente);
        if ($documentosAcciones) {
            return $documentosAcciones;
            //echo "Exito";
        } else {
            return false;
        }
    }
    function verContactos($noExpediente)
    {
        $contactos = $this->model->getContactos($noExpediente);
        if ($contactos) {
            return $contactos;
            //echo "Exito";
        } else {
            return false;
        }
    }
    public function VerRegistro($param = null)
    {
        $idRegistro = $param[0];
        $registro = $this->model->getById($idRegistro);
        $modalidades  = $this->model->getModalidades();
        $estados  = $this->model->getEstadosProc();
        //echo var_dump($registro);
        $noExpediente = $registro->no_expediente;
        $docStatus = $this->verDocumentosStatus($noExpediente);
        $docAcciones = $this->verDocumentosAcciones($noExpediente);
        if ($registro) {
            //$mensaje = "Exito";
            $this->view->registro = $registro;
            $this->view->modalidades  = $modalidades;
            $this->view->estados_proc  = $estados;
            //echo var_dump($docStatus);
            $this->view->docStatus = $docStatus;
            $this->view->docAcciones = $docAcciones;
            //$this->view->mensaje = "Ver detalles";
            $this->view->render('consulta/detalle');
        } else {
            //$mensaje = "Error";
        }
        //print $mensaje;
    }
    function editarRegistro($param = null)
    {
        $idRegistro = $param[0];
        $datos = [];
        $datos['edificio'] = $_POST['edificio'];
        $datos['domicilio'] = $_POST['domicilio'];
        $datos['idModalidadProp'] = $_POST['modalidad'];
        $datos['idEstadoProc'] = $_POST['estado_proc'];
        $datos['superficie'] = $_POST['superficie'];
        $result = $this->model->update($idRegistro, $datos);
        if ($result) {
            $tipoMensaje = "success";
            $mensaje = "Expediente  actualizado con éxito";
        } else {
            $tipoMensaje = "danger";
            $mensaje = "Error al actualizar registro";
        }
        $this->view->tipoMensaje = $tipoMensaje;
        $this->view->mensaje = $mensaje;
        $this->render('consulta/index');
    }

    function subirDocumento($param = null)
    {
        //TipoDocumento 0->Status |  1->Acciones
        $tipoDocumento = $param[0];
        $noExpediente = $param[1];
        $idRegistro = $param[2];
        $documento = [];
        $documento = $_FILES['documento'];
        $tipo = $documento['type'];
        $tamanio = $documento['size'];

        if (Core::validarPDF($tipo, $tamanio)) {
            if ($tipoDocumento == 0) {
                $docResult = $this->model->insertStatusDoc($noExpediente, $documento);
            }
            if ($tipoDocumento == 1) {
                $docResult = $this->model->insertAccionDoc($noExpediente, $documento);
            }
            if ($docResult) {
                //echo "Exito";
                // echo $idRegistro;
                $mensaje = "Documento guardado con éxito";
                echo 'consulta/VerRegistro/' . $idRegistro;
                //$this->view->render('consulta/detalle');
                header('location: ' . constant('URL') . 'consulta/VerRegistro/' . $idRegistro);
            } else {
                //echo "Error al subir archivo";
                $tipoMensaje = "danger";
                $mensaje = "<p> Error al subir archivo </p>";
            }
        } else {
            $tipoMensaje = "danger";
            $mensaje = "<p>Error en el formato o tamaño del PDF</p>";
            $mensaje .= "<p>puedes 
            <a href='https://www.ilovepdf.com/es/comprimir_pdf' target='_blank' > comprimir tu archivo aquí </a>
            <strong> o </strong>
            <a href='https://www.ilovepdf.com/es/word_a_pdf' target='_blank' > convertir tu archivo aquí </a>
            </p>";
            $this->view->tipoMensaje = $tipoMensaje;
            $this->view->mensaje = $mensaje;
            $this->render('consulta/index');
        }
    }
    function buscarPor($params)
    {
        $criterio = "id_" . $params[0];
        $param = $params[1];
        //echo $param;
        $resultados = $this->model->buscarPor($criterio, $param);
        if ($resultados) {
            $mensaje = "Exito al obtener resultados";
        } else {
            $mensaje = "Error al obtener resultados";
        }
        //echo $mensaje;
        $resultadosJSON = json_encode($resultados);
        echo $resultadosJSON;
    }

    function toluca()
    {
        $this->view->render('consulta/index');
    }
    function texcoco()
    {
        $this->view->render('consulta/index');
    }
    function tlanepantla()
    {
        $this->view->render('consulta/index');
    }
    function ecatepec()
    {
        $this->view->render('consulta/index');
    }
}
