<?php
class obraModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function insertPlano($noExpediente, $documento)
    {
        $id_user = $_SESSION['user_id'];
        $fechaGenerada = getdate();
        $agno = $fechaGenerada['year'];
        $mes = $fechaGenerada['mon'];
        $dia = $fechaGenerada['mday'];
        //Datos para el nombre único
        $nombreArchivo = $fechaGenerada['hours'];
        $nombreArchivo .= $fechaGenerada['minutes'];
        $nombreArchivo .= $fechaGenerada['seconds'];
        $fechaGenerada = Core::formatDBFecha($agno, $mes, $dia);
        $nombreArchivo = "Plano-" . $noExpediente . "-" . $id_user . "-" . $fechaGenerada . "-" . $nombreArchivo . ".pdf";
        $ruta = $documento['tmp_name'];
        $destino = "resources/obra/planos/" . $nombreArchivo;

        if ($nombreArchivo != "") {
            if (copy($ruta, $destino)) {
                //echo "exito";
                $documento = $nombreArchivo;
                //print $documento;
                $stringQuery = "INSERT INTO planos (no_expediente, nombre, fecha, id_usuario) 
                VALUES (:no_expediente, :nombre, :fecha, :id_usuario )";
                //echo "El numero de expediente" .  $noExpediente;
                try {
                    $query = $this->db->conn()->prepare($stringQuery);
                    $arrayDatos = [
                        'no_expediente' => $noExpediente,
                        'nombre'  => $documento,
                        'fecha'  => $fechaGenerada,
                        'id_usuario'  => $id_user,
                    ];
                    if ($query->execute($arrayDatos)) {
                        // print "Archivo guardado";
                        return true;
                    } else {
                        print "Error al subir archivo";
                        return false;
                    }
                } catch (PDOException $e) {
                    print "Error -> " . $e->getMessage();
                    return false;
                }
            } else {
                echo "Error al copiar archivo";
            }
        }
    }
    public static function selectPlano($noExpediente)
    {
        $planoInfo = [];
        $stringQuery = "SELECT nombre, fecha FROM planos WHERE no_expediente = :noExpediente ";
        try {
            $query = Database::connStatic()->prepare($stringQuery);
            $data = ['noExpediente' => $noExpediente];
            if ($query->execute($data)) {
                $planoInfo = $query->fetchObject();
                return $planoInfo;
            } else {
                print 'Error al realizar la consulta';
                return null;
            }
        } catch (PDOException $e) {
            print 'Error-> ' . $e->getMessage();
            return null;
        }
    }
    function existeRegistro($noExpediente)
    {
        $stringQuery = "SELECT no_expediente FROM planos WHERE no_expediente = :noExpediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = ['noExpediente' => $noExpediente];
            if ($query->execute($data)) {
                $row = $query->rowCount();
                return $row;
            } else {
                //print "Error al ejecutar consulta";
                return null;
            }
        } catch (PDOException $e) {
            print 'Error-> ' . $e->getMessage();
            return null;
        }
    }
    function updatePlano($noExpediente, $documento)
    {
        $id_user = $_SESSION['user_id'];
        $fechaGenerada = getdate();
        $agno = $fechaGenerada['year'];
        $mes = $fechaGenerada['mon'];
        $dia = $fechaGenerada['mday'];
        //Obtenemos los datos
        $nombreArchivo = $this->getNombrePlano($noExpediente);
        //Datos para el nombre único
        $fechaGenerada = Core::formatDBFecha($agno, $mes, $dia);
        //$nombreArchivo = "Plano" . $noExpediente . "-" . $id_user . "-" . $fechaGenerada . "-" . $nombreArchivo . ".pdf";
        $ruta = $documento['tmp_name'];
        $destino = "resources/obra/planos/" . $nombreArchivo;
        if ($nombreArchivo != "") {
            //Sobreescribimos
            if (copy($ruta, $destino)) {
                //echo "exito";
                $documento = $nombreArchivo;
            }
            $stringQuery = "UPDATE planos 
                SET fecha = :fecha, nombre = :nombre, id_usuario = :idUsuario
                WHERE no_expediente = :noExpediente";
            try {
                $query = DataBase::connStatic()->prepare($stringQuery);
                $data = [
                    'noExpediente' => $noExpediente,
                    'nombre'  => $documento,
                    'fecha'  => $fechaGenerada,
                    'idUsuario'  => $id_user,
                ];
                if ($query->execute($data)) {
                    return true;
                } else {
                    print 'Error al realizar actualización';
                    return false;
                }
            } catch (PDOException $e) {
                print 'Error-> ' . $e->getMessage();
                return false;
            }
        }
    }
    function getNombrePlano($noExpediente)
    {
        $stringQuery = "SELECT nombre FROM planos WHERE no_expediente = :noExpediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = ['noExpediente' => $noExpediente];
            if ($query->execute($data)) {
                $nombrePlano = $query->fetchObject();
                $nombrePlano = $nombrePlano->nombre;
                return  $nombrePlano;
            } else {
                // print "error al realizar consulta";
                return null;
            }
        } catch (PDOException $e) {
            print 'Error-> ' . $e->getMessage();
            return null;
        }
    }
}
