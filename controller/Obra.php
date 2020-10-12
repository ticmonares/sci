<script type="text/javascript" src="<?php echo constant('URL') . 'resources/js/sweetalert.min.js'; ?>"></script>
<?php
class Obra extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
    }
    function agregarPlano($params)
    {
        $noExpediente = $params[0];
        $idRegistro = $params[1];
        $documento = [];
        $documento = $_FILES['plano'];
        $tipo = $documento['type'];
        $tamanio = $documento['size'];
        // print 'tipo' . $tipo;
        // print var_dump($documento);
        if (Core::validarPDF($tipo, $tamanio)) {
            //Si exsite plano actualizamos
            if ($this->existePlano($noExpediente)) {
                //actualizamos
                $planoInfo = $this->model->updatePlano($noExpediente, $documento);
            } else {
                //Sino registramos
                $planoInfo = $this->model->insertPlano($noExpediente, $documento);
            }
            if ($planoInfo) {
                // // print "Plano agregado";

                // $mensaje = "Documento guardado con éxito";
                // // echo 'consulta/VerRegistro/' . $idRegistro;
                // // //$this->view->render('consulta/detalle');
                // header('location: ' . constant('URL') . 'consulta/VerRegistro/' . $idRegistro);
                $tipo = "success";
                $titulo = "Archivo cargado";
                $string = "El archivo se ha registrado satisfactoriamente";
                $footer = "";
                $url = constant('URL') . 'consulta/VerRegistro/' . $idRegistro;
                //return true;
            } else {
                // print "Error al agregar documento";
                $mensaje = "Error al agregar documento";
                return false;
            }
        } else {
            //    print "Error en el formato";
            // $mensaje = "Error en el formato";
            // $tipoMensaje = "danger";
            // $this->view->tipoMensaje = $tipoMensaje;
            // $this->view->mensaje = $mensaje;
            // $this->view->render('consulta/index');
            $tipo = "error";
            $titulo = "Error al cargar archivo";
            $string = "Verifica el tamaño o formato del documento";
            $footer = "<p>Puedes comprimir o convertir tu archivo <a href='https://www.ilovepdf.com/es'> aquí. </a></p>";
            $url = constant('URL') . 'consulta/VerRegistro/' . $idRegistro;
        }
        Core::mostrarAlerta($tipo, $titulo, $string, $footer, $url);
    }
    function existePlano($noExpediente)
    {
        $resultado = $this->model->existeRegistro($noExpediente);
        if ($resultado > 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function getPlanoByNoExpediente($noExpediente)
    {
        $planoInfo = obraModel::selectPlano($noExpediente);
        // print var_dump($planoInfo);
        if ($planoInfo) {
            // print "Consulta de plano realizada con éxito";
            return $planoInfo;
        } else {
            // print "No tiene registros";
            return null;
        }
    }
}
