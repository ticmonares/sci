<?php
class ModalidadPropiedad
{
        private $id;
        private $nombre;
        function toString($idModalidad)
        {
                $modalidadString = "";
                switch ($idModalidad) {
                        case 1:
                                $modalidadString = "DONACIÓN ESTATAL";
                                break;
                        case 2:
                                $modalidadString = "DONACIÓN MUNICIPAL";
                                break;
                        case 3:
                                $modalidadString = "COMPRA-VENTA";
                                break;
                        case 4:
                                $modalidadString = "ESCRITURADO";
                                break;
                        case 5:
                                $modalidadString = "COMODATO";
                                break;
                        case 6:
                                $modalidadString = "PRÉSTAMO";
                                break;
                        case 7:
                                $modalidadString = "ARRENDAMIENTO";
                                break;
                        default:
                                $modalidadString = "OTRO";
                                break;
                }
                return $modalidadString;
        }
}
