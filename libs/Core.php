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

    public static function validarRol()
    {
    }
    public static function validarSU()
    {
        if (isset($_SESSION['user_rol'])) {
            if ($_SESSION['user_rol'] == 0) {
                return true;
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