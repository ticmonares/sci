<?php
require_once 'model/classes/Region.class.php';
require_once 'model/classes/Distrito.class.php';
require_once 'model/classes/Municipio.class.php';

class ConsultaModel extends Model{
    function __construct(){
        parent::__construct();
    }
    public function getDatos(){
        $datos = [];
        $stringQuery = "SELECT id, no_expediente, id_region,  id_distrito_judicial, id_municipio  FROM registro_inmuebles";
        try{
            $query = $this->db->conn()->prepare($stringQuery);
            if($query->execute()){
                while($row = $query->fetchObject()){
                    //getNombreDistrito($idDistrito);
                    $idDistrito = $row->id_distrito_judicial;
                    $row->nombreDistrito = $this->getNombreDistrito($idDistrito)->nombre;

                    $idMunicipio = $row->id_municipio;
                    $row->nombreMunicipio = $this->getNombreMunicipio($idMunicipio)->nombre;
                    array_push($datos, $row);
                }
                return  $datos;
            }else{  
                print ("Error al ejecutar consulta");
                return null;
            }
        }catch(PDOException $e){
            print ("Error-> "  . $e->getMessage());
            return null;
        }
    }
    public function getLastId(){
        $stringQuery = "SELECT id FROM registro_inmuebles ORDER BY id DESC LIMIT 1";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ( $query->execute() ){
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
    public function insert($datos){
        $noExpediente = $datos['noExpediente'];
        //echo $noExpediente . "<br>";
        $region = $datos ['region'];
        //echo $region . "<br>";
        $distrito = $datos ['distrito'];
        //echo $distrito . "<br>";
        $municipio = $datos ['municipio'];
        //echo $municipio . "<br>";
        $edificio = $datos ['edificio'];
        //echo $edificio . "<br>";
        $domicilio = $datos ['domicilio'];
        //echo $domicilio . "<br>";
        $modalidad = $datos ['modalidad'];
        //echo $modalidad . "<br>";
        $estado = $datos ['estado'];
        //echo $estado . "<br>";
        $superficie = $datos ['superficie'];
        //echo $superficie . "<br>";
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
        // $nombreArchivo = $this->getLastId().$id_user.$fecha_generada.$municipio.".pdf";
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
            id_region, 
            id_distrito_judicial, 
            id_municipio, 
            edificio, 
            domicilio, 
            id_modalidad_prop, 
            id_estado_proc, 
            superficie, 
            id_usuario, 
            fecha_generada)
            VALUES (
            :id, 
            :no_expediente, 
            :id_region, 
            :id_distrito_judicial, 
            :id_municipio, 
            :edificio, 
            :domicilio, 
            :id_modalidad_prop, 
            :id_estado_proc, 
            :superficie, 
            :id_usuario, 
            :fecha_generada)
         ";
         $datos = [
            'id'=> null,
            'no_expediente' => $noExpediente,
            'id_region'=>  $region,
            'id_distrito_judicial'=> $distrito,
            'id_municipio'=>  $municipio,
            'edificio'=>  $edificio,
            'domicilio'=> $domicilio,
            'id_modalidad_prop'=> $modalidad,
            'id_estado_proc'=> $estado,
            'superficie'=> $superficie,
            'id_usuario'=> $id_user,
            'fecha_generada'=>  $fecha_generada
         ];
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ( $query->execute($datos) ){
                //print("Éxito en el registro");
                return true;
            }else{
                //print("Error en el registro");
                return false;
            }
        } catch (PDOException $e) {
            //print ("Error -> " . $e->getMessage());
        }
    }
    //Cargar datos al formulario
    public function getDatosForm(){
        $items = [];
        try {
            $stringQuery= "SELECT id_region, id_distrito_judicial, id_municipio, id_modalidad_prop, id_estado_proc, id_usuario  ";
            $query = $this->db->conn()->prepare($stringQuery);

        } catch (PDOException $e) {
            print ("Error: " . $e->getMessage());
        }
    }
    public function getNombreDistrito($idDistrito){
        $queryString = "SELECT nombre from  distritos_judiciales WHERE id = :id";
        try {
            $query = $this->db->conn()->prepare($queryString);
            if ( $query->execute(['id' => $idDistrito ]) ){
                $distrito = $query->fetchObject();
                return $distrito;
            }else{
                //print "Error al ejecutar consulta";
                return null;
            }
        } catch (PDOException $e) {
            return null;
            print ("Error: " . $e->getMessage());
        }
    }
    public function getNombreMunicipio($id ){
        $queryString = "SELECT nombre from municipios WHERE id = :id";
        try {
            $query = $this->db->conn()->prepare($queryString);
            if ( $query->execute(['id' => $id] ) ){
                $distrito = $query->fetchObject();
                return $distrito;
            }else{
                //print "Error al ejecutar consulta";
                return null;
            }
        } catch (PDOException $e) {
            return null;
            print ("Error: " . $e->getMessage());
        }
    }
    public function getRegiones(){
        $regiones = [];
        try {
            $region = new Region();
            $stringQuery= " SELECT * FROM regiones ";
            $query = $this->db->conn()->prepare($stringQuery);
            if ( $query->execute() ){
                while($row = $query->fetch()){
                    $region = new Region();
                    $region->id = $row['id'];
                    $region->nombre = $row['nombre'];
                    array_push($regiones, $region);
                }
                return $regiones;
                //print ("Éxito al consultar regiones");
            }else{
                //print ("Error al consultar regiones");
                return null;
            }
        } catch (PDOException $e) {
            print ("Error: " . $e->getMessage());
            return null;
        }
    }
    public function getDistritos($id_region){
        $distritos = [];
        $distrito = new Distrito();
        $stringQuery = "SELECT * FROM distritos_judiciales WHERE id_region = :id_region";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute( ['id_region' => $id_region] ) ){
                while($row = $query->fetch()){
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
            }else{
                //print ("Error al consultar regiones");
                return null;
            }
        } catch (PDOException $e) {
            print ("Error: " . $e->getMessage());
            return null;
        }
    }
    public function getMunicipios($id_distrito_judicial){
        $municipios = [];
        $stringQuery = "SELECT * FROM municipios WHERE id_distrito_judicial = :id_distrito_judicial";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if($query->execute(['id_distrito_judicial' => $id_distrito_judicial])){
                while($row = $query->fetch()){
                    $municipio = new Municipio();
                    $municipio->id = $row['id'];
                    $municipio->id_distrito_judicial = $row['id_distrito_judicial'];
                    $municipio->nombre = $row['nombre'];
                    array_push($municipios, $municipio);
                }
                return $municipios;
            }else{
                return null;
            }
        } catch (PDOException $e) {
            print ("Error: " . $e->getMessage());
            return null;
        }
    }
    public function getModalidades(){
        $modalidades = [];
        $stringQuery = "SELECT * FROM modalidad_propiedad";
        try{
            $query = $this->db->conn()->prepare($stringQuery);
            if ($query->execute()){
                while ($row = $query->fetchObject() ){
                    array_push($modalidades, $row);
                }
                //echo $modalidades;
                return $modalidades;
            }else{
                return null;
            }
        } catch (PDOException $e) {
            //print ("Error: " . $e->getMessage());
            return null;
        }
    }
    public function getEstadosProc(){
        $estadosProc = [];
        $stringQuery = "SELECT * FROM estado_procesal";
        try {
            $query= $this->db->conn()->prepare($stringQuery);
            if( $query->execute() ){
                while ($row = $query->fetchObject() ) {
                    array_push($estadosProc, $row);
                }
                return $estadosProc;
            }else{
                return null;
            }
        } catch (PDOexception $e) {
            //print ("Error ->  " . $e->getMessage());
            return null;
        }
    }
    public function getById($id_registro){
        $stringQuery = "SELECT * FROM registro_inmuebles WHERE id = :id";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ( $query->execute( ['id' => $id_registro] ) ){
                $row = $query->fetchObject();

                $idDistrito = $row->id_distrito_judicial;
                $nombreDistrito = $this->getNombreDistrito($idDistrito)->nombre;
                $row->{"nombreDistrito"} = $nombreDistrito;

                $idMunicipio = $row->id_municipio;
                $nombreMunicipio = $this->getNombreMunicipio($idMunicipio)->nombre;
                $row->{"nombreMunicipio"} = $nombreMunicipio;

                //echo var_dump($row);
                return $row;
            }else{
                print "Fallo al ejecutar";
                return null;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return null;
        }
    }
    public function update($idRegistro, $datos){
        /*
        $edificio = $datos['edificio'] ;
        $domicilio = $datos['domicilio'] ;
        $idModalidadProp = $datos['idModalidadProp'] ;
        $idEstadoProc = $datos['idEstadoProc'] ;
        $superficie = $datos['superficie'] ;
        */
        $datos ['id'] = $idRegistro;
        //echo var_dump($datos);
        $stringQuery = "UPDATE registro_inmuebles SET 
        edificio = :edificio, domicilio = :domicilio, id_modalidad_prop = :idModalidadProp, 
        id_estado_proc = :idEstadoProc, superficie = :superficie WHERE id = :id ";
        try {
            $query=$this->db->conn()->prepare($stringQuery);
            if( $query->execute ($datos)){
                return true; 
            }
            else{
                print "Error al actualizar desde el modelo";
                return true;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
            return true;
        }
    }
}
