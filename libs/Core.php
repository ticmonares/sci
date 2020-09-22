<?php session_start(); ?>
<?php
class Core{
    private static $validarRol;
    public function __construct(){

    }
    public static function validarSession(){
        if ( isset( $_SESSION['user_id']) ){
            return true;
        }else{
            return false;
        }
    }

    public static function validarRol(){

    }
    public static function validarSU(){
        if (isset($_SESSION['user_rol'])){ 
            if ($_SESSION['user_rol'] == 0){
                return true;
            }
        }else{
            return false;
        }
    }
    public static function validarAD(){
        if (isset($_SESSION['user_rol'])){ 
            if ($_SESSION['user_rol'] == 1){
                return true;
            }
        }else{
            return false;
        }
    }
    public static function validarUS(){
        if (isset($_SESSION['user_rol'])){ 
            if ($_SESSION['user_rol'] == 2){
                return true;
            }
        }else{
            return false;
        }
    }

    public static function formatDBFecha($agno, $mes, $dia){
        $fechaFormateada = $agno."-".$mes."-".$dia;
        return $fechaFormateada;
    }

}
?>