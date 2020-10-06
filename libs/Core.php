<?php session_start(); ?>
<?php
class Core
{
    private static $validarRol;
    public function __construct()
    {
    }
    public static function validarSession()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    //Función para indicar que roles pueden hacer ciertas acciones
    //Se recibe como parámetro el rol minimo, en caso de ser 1, solo 1 y 0 retorna true
    //Si se recibe un 0 solo 0 sera true... 2; 0, 1 y 2  seran true
    public static function validarRolMinimo($rol){
        if ( self::validarSession() ){
            if ( $_SESSION['user_rol'] <= $rol ){
                return true;
            }else{
                return false;
            }
        }
    }
    public static function validarSU()
    {
        if (isset($_SESSION['user_rol'])) {
            if ($_SESSION['user_rol'] == 0) {
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
    public static function validarAD()
    {
        if (isset($_SESSION['user_rol'])) {
            if ($_SESSION['user_rol'] == 1) {
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
    public static function validarUS()
    {
        if (isset($_SESSION['user_rol'])) {
            if ($_SESSION['user_rol'] == 2) {
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public static function formatDBFecha($agno, $mes, $dia)
    {
        $fechaFormateada = $agno . "-" . $mes . "-" . $dia;
        return $fechaFormateada;
    }

    public static function alert($mensaje, $tipo = null){
     
        if ( !($tipo != "success" || $tipo != "danger" || $tipo != "warning" ) ) {
            $tipo = "info";
        }
        ?>
            <div class="alert alert-<?php echo $tipo ?>">
                <?php
                if (isset($mensaje)) {
                    echo $mensaje;
                }
                ?>
            </div>
        <?php
    }
    public static function validarPDF($tipo, $tamanio){
        if ($tipo == "application/pdf"){
            if($tamanio < 1000000){
                return true;
            }
        }
        return false;
    }
}
?>