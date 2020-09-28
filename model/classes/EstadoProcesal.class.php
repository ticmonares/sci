<?php
class EstadoProcesal{
    private $id;
    private $nombre;
    function toString($idModalidad){ 
        $modalidadString = "";
        switch ($idModalidad) {
            case 1:
                $modalidadString = "REGULARIZACIÓN DE PROPIEDAD POR PARTE DEL DONADOR" ;
            break;
            case 2:
                    $modalidadString = "POR RATIFICAR DONACIÓN" ;
            break;
            case 3:
                    $modalidadString = "INTEGRACIÓN DE CARPETA PARA DESINCORPORACIÓN" ;
            break;
            case 4:
                    $modalidadString = "CARPETA PRESENTADA ANTE LEGISLATURA" ;
            break;
            case 5:
                    $modalidadString = "EN PROCESO DE ESCRITURACIÓN" ;
            break;
            case 6:
                    $modalidadString = "ESCRITURADO" ;
            break;
            default:
                    $modalidadString ="OTRO";
            break;
        }
        return $modalidadString;
    }
}
?>