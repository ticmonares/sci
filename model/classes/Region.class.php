<?php
class Region{
    public $id;
    public $nombre;
    
    
    function traduceRegion($region){
        switch ($region) {
            case 1:
                $stringRol = "TOLUCA";
                break;
            case 2:
                $stringRol = "TEXCOCO";
                break;
            case 3:
                $stringRol = "TLANEPANTLA";
                break;
            case 4:
                $stringRol = "ECATEPEC";
                break;
            default:
            $stringRol = "INVALIDO";
                break;
        }
        return $stringRol;
    }
    function cargaSelectRol($regionSelected){
        switch ($regionSelected) {
            case 1:
                $string = "<option selected value='". $regionSelected ."' >".$this->traduceRegion($regionSelected)."</option>";
                $string .= "<option value='2'>".$this->traduceRegion(2)."</option>";
                $string .= "<option value='3'>".$this->traduceRegion(3)."</option>";
                $string .= "<option value='4'>".$this->traduceRegion(4)."</option>";
                break;
            case 2:
                $string = "<option selected value='". $regionSelected ."' >".$this->traduceRegion($regionSelected)."</option>";
                $string .= "<option value='1'>".$this->traduceRegion(1)."</option>";
                $string .= "<option value='3'>".$this->traduceRegion(3)."</option>";
                $string .= "<option value='4'>".$this->traduceRegion(4)."</option>";
                break;
            case 3:
                $string = "<option selected value='". $regionSelected ."' >".$this->traduceRegion($regionSelected)."</option>";
                $string .= "<option value='1'>".$this->traduceRegion(1)."</option>";
                $string .= "<option value='2'>".$this->traduceRegion(2)."</option>";
                $string .= "<option value='4'>".$this->traduceRegion(4)."</option>";
                break;
            case 4:
                $string = "<option selected value='". $regionSelected ."' >".$this->traduceRegion($regionSelected)."</option>";
                $string .= "<option value='1'>".$this->traduceRegion(1)."</option>";
                $string .= "<option value='2'>".$this->traduceRegion(2)."</option>";
                $string .= "<option value='3'>".$this->traduceRegion(3)."</option>";
                break;
            default:
                # code...
                break;
        }
        return $string;
    }
}
?>