<?php
class Consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
    }
    function render()
    {
        //muestra los datos
        $datos = $this->model->getDatos();
        $this->view->datos = $datos;
        $this->view->render('consulta/index');
    }


    function nuevoRegistro()
    {
        //cargar formulario
        //$this->view->mensaje = "";
        $regiones = $this->model->getRegiones();
        $this->view->regiones = $regiones;
        $this->view->render('consulta/nuevo');
    }

    function  registrarNuevo()
    {
        if (isset($_POST['region'])) {
            $noExpediente = $_POST['noExpediente'];
            $noInventario = $_POST['noInventario'];
            $region = $_POST['region'];
            $distrito = $_POST['distrito'];
            $municipio = $_POST['municipio'];
            $edificio = $_POST['edificio'];
            $domicilio = $_POST['domicilio'];
            $modalidad = $_POST['modalidad'];
            if (isset($_POST['estado_proc'])) {
                $estado = $_POST['estado_proc'];
            } else {
                $estado = 6;
            }
            $superficie = $_POST['superficie'];
            $valorAvaluo = $_POST['valor_avaluo'];



            //Observaciones
            $observaciones = $_POST['observaciones'];
            //Contáctos
            //Nombres
            $contactoGobierno = $_POST['nombreGob'];
            $contactoPropietario = $_POST['nombreProp'];
            $contactoPJ = $_POST['nombrePJ'];
            //Teléfonos
            $telGobierno = $_POST['telGob'];
            $telPropietario = $_POST['telProp'];
            $telPJ = $_POST['telPJ'];
            //Correos
            $mailGobierno = $_POST['mailGob'];
            $mailPropietario = $_POST['mailProp'];
            $mailPJ = $_POST['mailPJ'];


            $datos = [
                'noExpediente' => $noExpediente,
                'noInventario' => $noInventario,
                'region' => $region,
                'distrito' => $distrito,
                'municipio' => $municipio,
                'edificio' => $edificio,
                'domicilio' => $domicilio,
                'modalidad' => $modalidad,
                'estado' => $estado,
                'superficie' => $superficie,
                'valorAvaluo' => $valorAvaluo
            ];
            if ($this->model->insert($datos)) {
                //print "Exito";
                //Insertamos la imagen después de crear el regsitro con no_expediente
                //Imagen
                $datosImg = [];
                $datosImg = $_FILES['img_inmueble'];
                $tipo = $datosImg['type'];
                $tamanio = $datosImg['size'];
                if (Core::validarImagen($tipo, $tamanio)) {
                    $formato = str_replace("image/", "", $tipo);
                    $imgResult = $this->model->insertInmuebleImg($noExpediente, $datosImg, $formato);
                    if ($imgResult) {
                        print "Imagen insertada con exito";
                    } else {
                        print "Error al insertar imagen";
                        die();
                    }
                }
                //Registramos en observaciones, si es que hay
                if (!$observaciones == "") {
                    $observacion = $this->model->insertObservacion($noExpediente, $observaciones);
                    if ($observacion) {
                        //print "Observación registrada con éxito";
                        //die();
                    } else {
                        //print "Error al registrar observación";
                        die();
                    }
                }
                //Una vez registrado el inmueble, registramos los contactos
                if (!$contactoGobierno == "") {
                    $contacto = $this->model->insertContacto($noExpediente, $contactoGobierno, $telGobierno, $mailGobierno, 1);
                    if ($contacto) {
                        // print ("Éxito al registrar contacto gobierno");
                    } else {
                        print("Error al registrar contacto gobierno");
                    }
                }
                if (!$contactoPropietario == "") {
                    $contacto = $this->model->insertContacto($noExpediente, $contactoPropietario, $telPropietario, $mailPropietario, 2);
                    if ($contacto) {
                        // print ("Éxito al registrar contacto propietario");
                    } else {
                        print("Error al registrar contacto propietario");
                    }
                }
                if (!$contactoPJ == "") {
                    $contacto = $this->model->insertContacto($noExpediente, $contactoPJ, $telPJ, $mailPJ, 3);
                    if ($contacto) {
                        // print ("Éxito al registrar contacto PJ");
                    } else {
                        print("Error al registrar contacto PJ");
                    }
                }
                $tipoMensaje = "success";
                $mensaje = "Expediente de inmueble registrado con éxito";
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

    function insertInmuebleImg()
    {
    }

    function getDistrito($param = null)
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

    function getMunicipios($param = null)
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
            //echo "Exito al consultar contactos";
        } else {
            //echo "Error al consultar contactos";
            return null;
        }
    }
    function verObservacion($noExpediente)
    {
        $observacion = $this->model->getObservacion($noExpediente);
        if ($observacion) {
            return $observacion;
        } else {
            return null;
        }
    }
    function verImagen($noExpediente){
        $imagen = $this->model->getImagenInmueble($noExpediente);
        if ($imagen){
            return $imagen;
        }else{
            return null;
        }
    }
    function verRegistro($param = null)
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
            //Agregamos los contactos
            $this->view->contactos = $this->verContactos($noExpediente);
            $this->view->observacion = $this->verObservacion($noExpediente);
            $this->view->imagen = $this->verImagen($noExpediente);
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
        if (isset($_POST['estado_proc'])) {
            $datos['idEstadoProc']  = $_POST['estado_proc'];
        } else {
            $datos['idEstadoProc']  = 6;
        }
        $datos['superficie'] = $_POST['superficie'];
        $datos['valorAvaluo'] = $_POST['valor_avaluo'];
        $noExpediente = $_POST['noExpediente'];
        $observaciones = $_POST['observaciones'];
        $result = $this->model->update($idRegistro, $datos, $observaciones, $noExpediente);
        if ($result) {
            $tipoMensaje = "success";
            $mensaje = "Expediente " . $noExpediente . " actualizado con éxito";
        } else {
            $tipoMensaje = "danger";
            $mensaje = "Error al actualizar registro";
        }
        $this->view->tipoMensaje = $tipoMensaje;
        $this->view->mensaje = $mensaje;
        $this->render('consulta/index');
    }

    function existeObservacion($noExpediente)
    {
        $rows = $this->model->existeContacto($noExpediente);
        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function editarImagen($params = null){
        $noExpediente = $params[0];
        //Imagen
        $datosImg = [];
        $datosImg = $_FILES['img_inmueble'];
        $tipo = $datosImg['type'];
        $tamanio = $datosImg['size'];
        if (Core::validarImagen($tipo, $tamanio)) {
            $formato = str_replace("image/", "", $tipo);
            if ( $this->existeImagen($noExpediente) ){
                //Actualizamos
                $imgResult = $this->model->updateInmuebleImg($noExpediente, $datosImg, $formato);
                if ($imgResult) {
                    $mensaje =  "Imagen actualizada con exito";
                    $tipoMensaje = "success";
                } else {
                    $mensaje =  "Error al actualizar imagen";
                    $tipoMensaje = "danger";
                    die();
                }
            }else{
                //insertamos
                $imgResult = $this->model->insertInmuebleImg($noExpediente, $datosImg, $formato);
                if ($imgResult) {
                    $mensaje =  "Imagen insertada con exito";
                    $tipoMensaje = "success";
                } else {
                    $mensaje =  "Error al insertar imagen";
                    $tipoMensaje = "danger";
                    die();
                }
            }
        }else{
            $mensaje =  "Error al subir archivo, no cumple con el formato o tamaño especificado";
            $tipoMensaje = "danger";
        }
        $this->view->tipoMensaje = $tipoMensaje;
        $this->view->mensaje = $mensaje;
        $this->render('consulta/index'.$noExpediente."/");
    }
    function existeImagen($noExpediente){
        $rows = $this->model->existeImagen($noExpediente);
        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function editarContacto($params = null)
    {
        $noExpediente = $params[0];
        $datos = [];
        $datos['nombre'] = $_POST['nombreGob'];
        $datos['telefono'] = $_POST['telGob'];
        $datos['correo'] = $_POST['mailGob'];
        if ($this->existeContacto($noExpediente, 1)) {
            print "Se va a actualizar";
            if ($this->model->updateContactos($noExpediente, $datos, 1)) {
                // print "contacto actualizado";
            } else {
                print "falla al actualizar";
            }
        } else {
            // print "No se encontro registro... se va crear";
            $newContacto = $this->model->insertContacto($noExpediente, $datos['nombre'], $datos['telefono'], $datos['correo'], 1);
            if ($newContacto) {
                // print "Contacto agregado desde update";
            } else {
                // print "Falla al agregar desde update";
            }
        }

        $datos = [];
        $datos['nombre'] = $_POST['nombreProp'];
        $datos['telefono'] = $_POST['telProp'];
        $datos['correo'] = $_POST['mailProp'];

        if ($this->existeContacto($noExpediente, 2)) {
            print "Se va a actualizar";
            if ($this->model->updateContactos($noExpediente, $datos, 2)) {
                // print "contacto actualizado";
            } else {
                print "falla al actualizar";
            }
        } else {
            // print "No se encontro registro... se va crear";
            $newContacto = $this->model->insertContacto($noExpediente, $datos['nombre'], $datos['telefono'], $datos['correo'], 2);
            if ($newContacto) {
                // print "Contacto agregado desde update";
            } else {
                // print "Falla al agregar desde update";
            }
        }

        $datos = [];
        $datos['nombre'] = $_POST['nombrePJ'];
        $datos['telefono'] = $_POST['telPJ'];
        $datos['correo'] = $_POST['mailPJ'];
        if ($this->existeContacto($noExpediente, 3)) {
            print "Se va a actualizar";
            if ($this->model->updateContactos($noExpediente, $datos, 3)) {
                // print "contacto actualizado";
            } else {
                print "falla al actualizar";
            }
        } else {
            // print "No se encontro registro... se va crear";
            $newContacto = $this->model->insertContacto($noExpediente, $datos['nombre'], $datos['telefono'], $datos['correo'], 3);
            if ($newContacto) {
                // print "Contacto agregado desde update";
            } else {
                // print "Falla al agregar desde update";
            }
        }

        header("location:" . constant('URL') . "consulta/verRegistro/" . $this->model->getLastRegistroId());
    }

    function existeContacto($noExpediente, $tipoContacto)
    {
        $rows = $this->model->existeContacto($noExpediente, $tipoContacto);
        if ($rows > 0) {
            return true;
        } else {
            return false;
        }
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
