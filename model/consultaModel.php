<?php
require_once 'model/classes/Region.class.php';
require_once 'model/classes/Distrito.class.php';
require_once 'model/classes/Municipio.class.php';

class ConsultaModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function getDatos()
    {
        $datos = [];
        $stringQuery = "SELECT 
        id, no_expediente, no_inventario, id_region,  id_distrito_judicial, id_municipio, edificio, id_modalidad_prop, id_estado_proc  
        FROM registro_inmuebles ORDER BY no_expediente ";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                while ($row = $query->fetchObject()) {
                    //getNombreDistrito($idDistrito);
                    $idDistrito = $row->id_distrito_judicial;
                    $row->nombreDistrito = $this->getNombreDistrito($idDistrito)->nombre;

                    $idMunicipio = $row->id_municipio;
                    $row->nombreMunicipio = $this->getNombreMunicipio($idMunicipio)->nombre;
                    array_push($datos, $row);
                }
                return  $datos;
            } else {
                print("Error al ejecutar consulta");
                return null;
            }
        } catch (PDOException $e) {
            print("Error-> "  . $e->getMessage());
            return null;
        }
    }
    function getLastRegistroId()
    {
        $stringQuery = "SELECT id FROM registro_inmuebles ORDER BY id DESC LIMIT 1";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                $row = $query->fetchObject();
                //var_dump($row);
                return $row->id;
            }
        } catch (PDOException $e) {
            return null;
            //print ("Error -> " . $e->getMessage()  );
        }
    }
    function getLastStatusId()
    {
        $stringQuery = "SELECT id FROM doc_status ORDER BY id DESC LIMIT 1";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                $row = $query->fetchObject();
                //var_dump($row);
                return $row->id;
            }
        } catch (PDOException $e) {
            return null;
            //print ("Error -> " . $e->getMessage()  );
        }
    }
    function getLastAccionId()
    {
        $stringQuery = "SELECT id FROM doc_acciones_real ORDER BY id DESC LIMIT 1";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                $row = $query->fetchObject();
                //var_dump($row);
                return $row->id;
            }
        } catch (PDOException $e) {
            return null;
            //print ("Error -> " . $e->getMessage()  );
        }
    }
    //Insert
    function insert($datos)
    {
        $noExpediente = $datos['noExpediente'];
        //echo $noExpediente . "<br>";
        $noInventario = $datos['noInventario'];
        $region = $datos['region'];
        //echo $region . "<br>";
        $distrito = $datos['distrito'];
        //echo $distrito . "<br>";
        $municipio = $datos['municipio'];
        //echo $municipio . "<br>";
        $edificio = $datos['edificio'];
        //echo $edificio . "<br>";
        $domicilio = $datos['domicilio'];
        //echo $domicilio . "<br>";
        $modalidad = $datos['modalidad'];
        //echo $modalidad . "<br>";
        $estado = $datos['estado'];
        //echo $estado . "<br>";
        $superficie = $datos['superficie'];
        //echo $superficie . "<br>";
        $valorAvaluo = $datos['valorAvaluo'];
        $id_user = $_SESSION['user_id'];
        //Obtenemos fecha de registro
        $fecha_generada = getdate();
        //Damos formato
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        //echo $fecha_generada;
        //Obteniendo datos del PDF de status
        //echo var_dump($doc_status);
        //$nombreArchivo = $doc_status['name'];
        // $nombreArchivo = $this->getLastRegistroId().$id_user.$fecha_generada.$municipio.".pdf";
        // $tipo = $doc_status['type'];
        // $tamanio = $doc_status['size'];
        // $ruta = $doc_status['tmp_name'];
        // $destino = "resources/archivosStatus/".$nombreArchivo;

        // if ( $nombreArchivo != ""  ){
        //     if(copy($ruta, $destino)){
        //         //echo "exito";
        //         $doc_status = $nombreArchivo;
        //     }else{
        //         //echo "el fracaso te hace mejor";
        //     }
        // }

        $stringQuery = "INSERT INTO registro_inmuebles(
            id, 
            no_expediente, 
            no_inventario,
            id_region, 
            id_distrito_judicial, 
            id_municipio, 
            edificio, 
            domicilio, 
            id_modalidad_prop, 
            id_estado_proc, 
            superficie, 
            valor_avaluo,
            id_usuario, 
            fecha_generada)
            VALUES (
            :id, 
            :no_expediente, 
            :no_inventario,
            :id_region, 
            :id_distrito_judicial, 
            :id_municipio, 
            :edificio, 
            :domicilio, 
            :id_modalidad_prop, 
            :id_estado_proc, 
            :superficie, 
            :valor_avaluo,
            :id_usuario, 
            :fecha_generada)
         ";
        $datos = [
            'id' => null,
            'no_expediente' => $noExpediente,
            'no_inventario' => $noInventario,
            'id_region' =>  $region,
            'id_distrito_judicial' => $distrito,
            'id_municipio' =>  $municipio,
            'edificio' =>  $edificio,
            'domicilio' => $domicilio,
            'id_modalidad_prop' => $modalidad,
            'id_estado_proc' => $estado,
            'superficie' => $superficie,
            'valor_avaluo' => $valorAvaluo,
            'id_usuario' => $id_user,
            'fecha_generada' =>  $fecha_generada
        ];
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute($datos)) {
                //print("Éxito en el registro");
                return true;
            } else {
                //print("Error en el registro");
                return false;
            }
        } catch (PDOException $e) {
            //print ("Error -> " . $e->getMessage());
        }
    }
    //Inertamos contactos
    function insertContacto($noExpediente, $nombre, $telefono, $correo, $tipoContacto)
    {
        $stringQuery = "INSERT INTO contactos (no_expediente, nombre, telefono, correo, tipo_contacto) VALUES (:noExpediente, :nombre, :telefono, :correo, :tipoContacto) ";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $datos = [
                'noExpediente' => $noExpediente,
                'nombre' => $nombre,
                'telefono' => $telefono,
                'correo' => $correo,
                'tipoContacto' => $tipoContacto
            ];
            if ($query->execute($datos)) {
                echo "entra";
                return true;
            } else {
                echo "No ejecuta";
                return false;
            }
        } catch (PDOException $e) {
            print("Error -> " . $e->getMessage());
            return false;
        }
    }
    //insertamos observaciones
    function insertObservacion($noExpediente, $observaciones)
    {   
        //print $observaciones;
        $stringQuery = "INSERT INTO `observaciones`(`no_expediente`, `observacion`) VALUES (:no_expediente, :observacion) ";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'no_expediente' => $noExpediente,
                'observacion' => $observaciones
            ];
            if ($query->execute($data)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print("Error -> " . $e->getMessage());
            return false;
        }
    }
    //Obtener datos por id
    function getById($id_registro)
    {
        $stringQuery = "SELECT id, no_expediente, no_inventario, id_region, id_distrito_judicial, id_municipio, edificio,
        domicilio, id_modalidad_prop, id_estado_proc, superficie, valor_avaluo
        FROM registro_inmuebles WHERE id = :id";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['id' => $id_registro])) {
                $row = $query->fetchObject();
                $idDistrito = $row->id_distrito_judicial;
                $nombreDistrito = $this->getNombreDistrito($idDistrito)->nombre;
                $row->{"nombreDistrito"} = $nombreDistrito;
                $idMunicipio = $row->id_municipio;
                $nombreMunicipio = $this->getNombreMunicipio($idMunicipio)->nombre;
                $row->{"nombreMunicipio"} = $nombreMunicipio;
                //echo var_dump($row);
                return $row;
            } else {
                print "Fallo al ejecutar";
                return null;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return null;
        }
    }
    function getIdByNoExpediente($noExpediente){
        $stringQuery = "SELECT id FROM registro_inmuebles WHERE no_expediente = :noExpediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['noExpediente' => $noExpediente])){
                $id = $query->fetchObject();
                return $id;
            }else{
                return null;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return null;
        }
    }
    //Obtenemos contactos
    function getContactos($noExpediente)
    {
        $datos = [];
        $stringQuery = "SELECT nombre, telefono, correo, tipo_contacto FROM contactos WHERE no_expediente = :noExpediente ";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['noExpediente' => $noExpediente])) {
                while ($row = $query->fetchObject()) {
                    array_push($datos, $row);
                }
                return $datos;
            } else {
                print("Error al obtener contactos");
                return null;
            }
        } catch (PDOException $e) {
            print("Error -> " . $e->getMessage());
            return null;
        }
    }
    //Cargar datos al formulario
    function getDatosForm()
    {
        $items = [];
        try {
            $stringQuery = "SELECT id_region, id_distrito_judicial, id_municipio, id_modalidad_prop, id_estado_proc, id_usuario  ";
            $query = $this->db->conn()->prepare($stringQuery);
        } catch (PDOException $e) {
            print("Error: " . $e->getMessage());
        }
    }
    function getNombreDistrito($idDistrito)
    {
        $queryString = "SELECT nombre from  distritos_judiciales WHERE id = :id";
        try {
            $query = $this->db->conn()->prepare($queryString);
            if ($query->execute(['id' => $idDistrito])) {
                $distrito = $query->fetchObject();
                return $distrito;
            } else {
                //print "Error al ejecutar consulta";
                return null;
            }
        } catch (PDOException $e) {
            return null;
            print("Error: " . $e->getMessage());
        }
    }
    function getNombreMunicipio($id)
    {
        $queryString = "SELECT nombre from municipios WHERE id = :id";
        try {
            $query = $this->db->conn()->prepare($queryString);
            if ($query->execute(['id' => $id])) {
                $distrito = $query->fetchObject();
                return $distrito;
            } else {
                //print "Error al ejecutar consulta";
                return null;
            }
        } catch (PDOException $e) {
            return null;
            print("Error: " . $e->getMessage());
        }
    }
    function getRegiones()
    {
        $regiones = [];
        try {
            $region = new Region();
            $stringQuery = " SELECT * FROM regiones ";
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                while ($row = $query->fetch()) {
                    $region = new Region();
                    $region->id = $row['id'];
                    $region->nombre = $row['nombre'];
                    array_push($regiones, $region);
                }
                return $regiones;
                //print ("Éxito al consultar regiones");
            } else {
                //print ("Error al consultar regiones");
                return null;
            }
        } catch (PDOException $e) {
            print("Error: " . $e->getMessage());
            return null;
        }
    }
    function getDistritos($id_region)
    {
        $distritos = [];
        $distrito = new Distrito();
        $stringQuery = "SELECT * FROM distritos_judiciales WHERE id_region = :id_region";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['id_region' => $id_region])) {
                while ($row = $query->fetch()) {
                    //Crear en cada iteración un nuevo objeto
                    //Importante donde instansiamos el objeto,
                    //SIno se carga el mismo dato
                    $distrito = new Region();
                    $distrito->id = $row['id'];
                    $distrito->id_region = $row['id_region'];
                    $distrito->nombre = $row['nombre'];
                    array_push($distritos, $distrito);
                }
                return $distritos;
                //print ("Éxito al consultar regiones");
            } else {
                //print ("Error al consultar regiones");
                return null;
            }
        } catch (PDOException $e) {
            print("Error: " . $e->getMessage());
            return null;
        }
    }
    function getMunicipios($id_distrito_judicial)
    {
        $municipios = [];
        $stringQuery = "SELECT * FROM municipios WHERE id_distrito_judicial = :id_distrito_judicial";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['id_distrito_judicial' => $id_distrito_judicial])) {
                while ($row = $query->fetch()) {
                    $municipio = new Municipio();
                    $municipio->id = $row['id'];
                    $municipio->id_distrito_judicial = $row['id_distrito_judicial'];
                    $municipio->nombre = $row['nombre'];
                    array_push($municipios, $municipio);
                }
                return $municipios;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            print("Error: " . $e->getMessage());
            return null;
        }
    }
    function getModalidades()
    {
        $modalidades = [];
        $stringQuery = "SELECT * FROM modalidad_propiedad";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                while ($row = $query->fetchObject()) {
                    array_push($modalidades, $row);
                }
                //echo $modalidades;
                return $modalidades;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            //print ("Error: " . $e->getMessage());
            return null;
        }
    }
    function getEstadosProc()
    {
        $estadosProc = [];
        $stringQuery = "SELECT * FROM estado_procesal";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()) {
                while ($row = $query->fetchObject()) {
                    array_push($estadosProc, $row);
                }
                return $estadosProc;
            } else {
                return null;
            }
        } catch (PDOexception $e) {
            //print ("Error ->  " . $e->getMessage());
            return null;
        }
    }
    function getObservacion($noExpediente){
        $stringQuery = "SELECT observacion FROM observaciones WHERE no_expediente = :no_expediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = ['no_expediente' => $noExpediente ];
            if ($query->execute($data)){
                $observacion = $query->fetchObject();
                return $observacion;
            }else{
                // print "Error al obtener observacion";
                return null;
            }
        } catch (PDOexception $e) {
            //print ("Error ->  " . $e->getMessage());
            return null;
        }
    }
    
    function update($idRegistro, $datos, $observaciones, $noExpediente)
    {
        $datos['id'] = $idRegistro;
        //echo var_dump($datos);
        $fecha_generada = getdate();
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        $idUsuario = $_SESSION['user_id'];
        $datos['fechaMod'] = $fecha_generada;
        $datos['idUsuario'] = $idUsuario;
        //echo var_dump($datos);
        $stringQuery = "UPDATE registro_inmuebles SET 
        edificio = :edificio, domicilio = :domicilio, id_modalidad_prop = :idModalidadProp, 
        id_estado_proc = :idEstadoProc, superficie = :superficie, valor_avaluo = :valorAvaluo,
        fecha_mod = :fechaMod,
        id_user_mod = :idUsuario
        WHERE id = :id ";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute($datos)) {
                //evaluamos si existe el registro lo editamos
                if ($this->existeObservacion($noExpediente) > 0){
                    $observacion = $this->updateObservacion($observaciones, $noExpediente);
                    if ($observacion){
                        //print "Exito al actualizar la observación";
                        return true;
                    }else{
                        print "Error al actualizar la observación";
                        return false;
                    }
                }else{
                    //Sino lo creamos
                    if ($this->insertObservacion($noExpediente, $observaciones)){
                        //print "Exito al insertar observación desde actualización";
                        return true;
                    }else{
                        print "Error al insertar observación desde actualización";
                        return false;
                    }
                }
            } else {
                print "Error al actualizar desde el modelo";
                return false;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function updateObservacion($observaciones, $noExpediente){
        $stringQuery = "UPDATE observaciones SET observacion = :observacion WHERE no_expediente = :no_expediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'observacion' =>  $observaciones,
                'no_expediente' => $noExpediente
            ];            
            if ($query->execute($data)){
                return true;
            }else{
                print "Error al actualizar observación";
                return false;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function existeObservacion($noExpediente){
        $stringQuery = "SELECT no_expediente FROM observaciones WHERE no_expediente = :no_expediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'no_expediente' => $noExpediente,
            ];
            if ($query->execute($data)) {
                return $query->rowCount();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //print var_dump($data);
            //print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function updateInmuebleImg($noExpediente, $datosImg, $formato){
        $id_user = $_SESSION['user_id'];
        $fecha_generada = getdate();
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        //echo $fecha_generada;
        //Obteniendo datos del PDF de status
        // echo var_dump($documento);
        $nombreArchivo = $datosImg['name'];
        $nombreArchivo = "Imagen-" . $noExpediente . "-" . $id_user . "-" . $fecha_generada .".". $formato;
        //$tipo = $datosImg['type'];
        //$tamanio = $datosImg['size'];
        $ruta = $datosImg['tmp_name'];
        $destino = "resources/imagenes-inmuebles/" . $nombreArchivo;
        if ($nombreArchivo != "") {
            if (copy($ruta, $destino)) {
                //echo "exito";
                $datosImg = $nombreArchivo;
                $stringQuery = "UPDATE doc_img_inmuebles SET nombre = :nombre, fecha = :fecha, id_usuario = :id_usuario WHERE no_expediente = :no_expediente";
                //echo "El numero de expediente" .  $noExpediente;
                try {
                    $query = $this->db->conn()->prepare($stringQuery);
                    $arrayDatos = [
                        'no_expediente' => $noExpediente,
                        'nombre'  => $datosImg,
                        'fecha'  => $fecha_generada,
                        'id_usuario'  => $id_user
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
                //echo "error al crear archivo";
            }
        }
    }
    function updateContactos($noExpediente, $datos, $tipoContacto)
    {
        $nombre = $datos['nombre'];
        $telefono = $datos['telefono'];
        $correo = $datos['correo'];
        //print $correo;
        $stringQuery = 'UPDATE contactos SET nombre = :nombre, telefono = :telefono, correo = :correo
        WHERE no_expediente = :no_expediente AND tipo_contacto = :tipo_contacto';
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'nombre' => $nombre,
                'telefono' => $telefono,
                'correo' => $correo,
                'no_expediente' => $noExpediente,
                'tipo_contacto' => $tipoContacto
            ];
            //print var_dump($data);
            if ($query->execute($data)) {
                //print "Exito al actualizar contactos";
                print $query->rowCount();
                if ($query->rowCount() != 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                //print "Error al actualizar contactos";
                return false;
            }
        } catch (PDOException $e) {
            //print var_dump($data);
            print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function existeImagen($noExpediente){
        $stringQuery = "SELECT no_expediente FROM doc_img_inmuebles WHERE no_expediente = :no_expediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'no_expediente' => $noExpediente
            ];
            if ($query->execute($data)) {
                return $query->rowCount();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //print var_dump($data);
            //print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function existeContacto($noExpediente, $tipoContacto)
    {
        $stringQuery = "SELECT no_expediente FROM contactos WHERE no_expediente = :no_expediente AND tipo_contacto = :tipo_contacto";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'no_expediente' => $noExpediente,
                'tipo_contacto' => $tipoContacto
            ];
            if ($query->execute($data)) {
                return $query->rowCount();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            //print var_dump($data);
            //print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function getDocStatus($noExpediente)
    {
        $documentos = [];
        $stringQuery = "SELECT nombre, fecha, no_expediente FROM doc_status WHERE  no_expediente = :noExpediente ORDER BY id DESC";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['noExpediente' => $noExpediente])) {
                while ($row = $query->fetch()) {
                    array_push($documentos, $row);
                }
                //echo "Este es el vr".var_dump($datos);
                return $documentos;
            } else {
                print("Error al consultar documentos");
                return false;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function getDocAcciones($noExpediente)
    {
        $documentos = [];
        $stringQuery = "SELECT nombre, fecha, no_expediente FROM doc_acciones_real  WHERE  no_expediente = :noExpediente ORDER BY id DESC";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute(['noExpediente' => $noExpediente])) {
                while ($row = $query->fetch()) {
                    array_push($documentos, $row);
                }
                //echo "Este es el vr".var_dump($datos);
                return $documentos;
            } else {
                print("Error al consultar documentos");
                return false;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function getImagenInmueble($noExpediente){
        $imagenes = [];
        $stringQuery = "SELECT nombre, fecha FROM doc_img_inmuebles WHERE no_expediente = :noExpediente";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            $data = [
                'noExpediente' => $noExpediente
            ];
            if ($query->execute($data)){
                while ($row = $query->fetchObject()) {
                    array_push($imagenes, $row);
                }
                //echo $imagenes;
                return $imagenes;
            }else{
                return null;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return false;
        }
    }
    function insertStatusDoc($noExpediente, $docStatus)
    {
        $id_user = $_SESSION['user_id'];
        //Damos formato
        //Obtenemos fecha de registro
        $fecha_generada = getdate();
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        //echo $fecha_generada;
        //Obteniendo datos del PDF de status
        // echo var_dump($docStatus);
        $nombreArchivo = $docStatus['name'];
        $nombreArchivo = "Status-" . $this->getLastStatusId() . "-" . $noExpediente . "-" . $id_user . "-" . $fecha_generada . ".pdf";
        //$tipo = $docStatus['type'];
        //$tamanio = $docStatus['size'];
        $ruta = $docStatus['tmp_name'];
        $destino = "resources/archivosStatus/" . $nombreArchivo;

        if ($nombreArchivo != "") {
            if (copy($ruta, $destino)) {
                //echo "exito";
                $docStatus = $nombreArchivo;
                $stringQuery = "INSERT INTO `doc_status`(`nombre`, `fecha`, `id_usuario`, `no_expediente`) 
                VALUES (:nombre, :fecha, :id_usuario, :no_expediente)";
                //echo "El numero de expediente" .  $noExpediente;
                try {
                    $query = $this->db->conn()->prepare($stringQuery);
                    $arrayDatos = [
                        'nombre'  => $docStatus,
                        'fecha'  => $fecha_generada,
                        'id_usuario'  => $id_user,
                        'no_expediente' => $noExpediente
                    ];
                    if ($query->execute($arrayDatos)) {
                        print "Archivo guardado";
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
                //echo "el fracaso te hace mejor";
            }
        }
    }
    //Método para insertar documentos de acciones realizads
    function insertAccionDoc( $noExpediente, $documento) {
        $id_user = $_SESSION['user_id'];
        //Damos formato
        //Obtenemos fecha de registro
        $fecha_generada = getdate();
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        //echo $fecha_generada;
        //Obteniendo datos del PDF de status
        // echo var_dump($documento);
        $nombreArchivo = $documento['name'];
        $nombreArchivo = "Accion-" . $this->getLastAccionId() . "-" . $noExpediente . "-" . $id_user . "-" . $fecha_generada . ".pdf";
        //$tipo = $documento['type'];
        //$tamanio = $documento['size'];
        $ruta = $documento['tmp_name'];
        $destino = "resources/archivosAcciones/" . $nombreArchivo;

        if ($nombreArchivo != "") {
            if (copy($ruta, $destino)) {
                //echo "exito";
                $documento = $nombreArchivo;
                $stringQuery = "INSERT INTO doc_acciones_real (`nombre`, `fecha`, `id_usuario`, `no_expediente`) 
                VALUES (:nombre, :fecha, :id_usuario, :no_expediente)";
                //echo "El numero de expediente" .  $noExpediente;
                try {
                    $query = $this->db->conn()->prepare($stringQuery);
                    $arrayDatos = [
                        'nombre'  => $documento,
                        'fecha'  => $fecha_generada,
                        'id_usuario'  => $id_user,
                        'no_expediente' => $noExpediente
                    ];
                    if ($query->execute($arrayDatos)) {
                        //print "Archivo guardado";
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
                //echo "el fracaso te hace mejor";
            }
        }
    }
    function insertInmuebleImg($noExpediente, $datosImg, $formato)
    {
        $id_user = $_SESSION['user_id'];
        $fecha_generada = getdate();
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        //echo $fecha_generada;
        //Obteniendo datos del PDF de status
        // echo var_dump($documento);
        $nombreArchivo = $datosImg['name'];
        $nombreArchivo = "Imagen-" . $noExpediente . "-" . $id_user . "-" . $fecha_generada .".". $formato;
        //$tipo = $datosImg['type'];
        //$tamanio = $datosImg['size'];
        $ruta = $datosImg['tmp_name'];
        $destino = "resources/imagenes-inmuebles/" . $nombreArchivo;
        if ($nombreArchivo != "") {
            if (copy($ruta, $destino)) {
                //echo "exito";
                $datosImg = $nombreArchivo;
                $stringQuery = "INSERT INTO doc_img_inmuebles(no_expediente, nombre, fecha, id_usuario)
                VALUES (:no_expediente, :nombre, :fecha, :id_usuario)";
                //echo "El numero de expediente" .  $noExpediente;
                try {
                    $query = $this->db->conn()->prepare($stringQuery);
                    $arrayDatos = [
                        'no_expediente' => $noExpediente,
                        'nombre'  => $datosImg,
                        'fecha'  => $fecha_generada,
                        'id_usuario'  => $id_user
                    ];
                    if ($query->execute($arrayDatos)) {
                        //print "Archivo guardado";
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
                //echo "error al crear archivo";
            }
        }
    }
    function buscarPor($criterio, $parametro)
    {
        //echo $criterio;
        //echo $parametro;
        //echo "SELECT id, no_expediente, id_region,  id_distrito_judicial, id_municipio  FROM registro_inmuebles WHERE $criterio = $parametro";
        //echo "<br>";
        //echo $parametro;
        $datos = [];
        if ($parametro == 0) {
            $criterio = "all";
        }
        switch ($criterio) {
            case 'id_region':
                $stringQuery = "SELECT id, no_expediente, no_inventario, id_region, id_distrito_judicial, id_municipio, edificio, id_modalidad_prop, id_estado_proc FROM registro_inmuebles WHERE id_region = :id_parametro";
                break;
            case 'id_distrito_judicial':
                $stringQuery = "SELECT id, no_expediente, no_inventario, id_region, id_distrito_judicial, id_municipio, edificio, id_modalidad_prop, id_estado_proc FROM registro_inmuebles WHERE id_distrito_judicial = :id_parametro";
                break;
            case 'id_municipio':
                $stringQuery = "SELECT id, no_expediente, no_inventario, id_region, id_distrito_judicial, id_municipio, edificio, id_modalidad_prop, id_estado_proc FROM registro_inmuebles WHERE id_municipio = :id_parametro";
                break;
            case 'all':
                $stringQuery = "SELECT id, no_expediente, no_inventario, id_region, id_distrito_judicial, id_municipio, edificio, id_modalidad_prop, id_estado_proc FROM registro_inmuebles";
                break;
            default:
                $stringQuery = "";
                break;
        }
        $datos = [];
        try {
            //echo $stringQuery;
            $query = $this->db->conn()->prepare($stringQuery);
            $params = [];
            $criterio == "all" ?: $params = ['id_parametro' => $parametro];
            //echo $params ['id_parametro'];
            if ($query->execute($params)) {
                while ($row = $query->fetchObject()) {
                    //echo"entra aca";
                    //getNombreDistrito($idDistrito);
                    $region = new Region();
                    $idRegion = $row->id_region;
                    $row->nombreRegion = $region->traduceRegion($idRegion);
                    //echo $region->traduceRegion($idRegion);
                    $idDistrito = $row->id_distrito_judicial;
                    $row->nombreDistrito = $this->getNombreDistrito($idDistrito)->nombre;
                    $idMunicipio = $row->id_municipio;
                    $row->nombreMunicipio = $this->getNombreMunicipio($idMunicipio)->nombre;
                    array_push($datos, $row);
                }
                return  $datos;
            } else {
                print("Error al ejecutar consulta");
                return null;
            }
        } catch (PDOException $e) {
            print("Error-> "  . $e->getMessage());
            return null;
        }
    }
}
