<?php
class Usuario{
    public $id;
    public $nombre;
    public $correo;
    public $pass;
    public $rol;
    public $stringRol;
    function traduceRol($rol){
        if($rol == 0){
            $stringRol = "SU" ;
        }
        if($rol == 1){
            $stringRol = "Coordinación General Jurídica";
        }
        if($rol == 2){
            $stringRol = "Dirección de Control Patrimonial";
        }
        return $stringRol;
    }
    function cargaSelectRol($rolSelected){
        if($rolSelected == 0){
            $string = "<option selected value='". $rolSelected ."' >".$this->traduceRol($rolSelected)."</option>";
            $string .= "<option value='1'>".$this->traduceRol(1)."</option>";
            $string .= "<option value='2'>".$this->traduceRol(2)."</option>";
        }
        if($rolSelected == 1){
            $string = "<option selected value='". $rolSelected ."' >".$this->traduceRol($rolSelected)."</option>";
            $string .= "<option value='0'>".$this->traduceRol(0)."</option>";
            $string .= "<option value='2'>".$this->traduceRol(2)."</option>";
        }
        if($rolSelected == 2){
            $string = "<option selected value='". $rolSelected ."' >".$this->traduceRol($rolSelected)."</option>";
            $string .= "<option value='0'>".$this->traduceRol(0)."</option>";
            $string .= "<option value='1'>".$this->traduceRol(1)."</option>";
        }
        return $string;
    }
}
?>