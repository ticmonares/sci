<?php
require_once 'model/classes/Region.class.php';
require_once 'model/classes/Distrito.class.php';
require_once 'model/classes/Municipio.class.php';

class ConsultaModel extends Model{
    function __construct(){
        parent::__construct();
    }
    //Insert
    public function insert($datos){

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
        //echo $id_user . "<br>";
        /*
        [seconds] => 40
    [minutes] => 58
    [hours]   => 21
    [mday]    => 17
    [wday]    => 2
    [mon]     => 6
    [year]    => 2003
    [yday]    => 167
    [weekday] => Tuesday
    [month]   => June
    [0]       => 1055901520
         */
        //2020-09-22
        $fecha_generada = getdate();
        $agno = $fecha_generada['year'];
        $mes = $fecha_generada['mon'];
        $dia = $fecha_generada['mday'];
        $fecha_generada = Core::formatDBFecha($agno, $mes, $dia);
        echo $fecha_generada;
        

        $stringQuery = "INSERT INTO registro_inmuebles(
        id, no_consecutivo, id_region, 
        id_distrito_judicial, id_municipio, edificio, 
        domicilio, id_modalidad_prop, id_estado_proc, 
        superficie, doc_status, doc_acciones_real, 
        id_usuario, fecha_generada) 
        VALUES (:id, :no_consecutivo, :id_region, 
        :id_distrito_judicial, :id_municipio, :edificio, 
        :domicilio, :id_modalidad_prop, :id_estado_proc, 
        :superficie, :doc_status, :doc_acciones_real, 
        :id_usuario, :fecha_generada)
         ";
         $datos = [
            'id'=> null,
            'no_consecutivo' => "pendiente",
            'id_region'=>  $region,
            'id_distrito_judicial'=> $distrito,
            'id_municipio'=>  $municipio,
            'edificio'=>  $edificio,
            'domicilio'=> $domicilio,
            'id_modalidad_prop'=> $modalidad,
            'id_estado_proc'=> $estado,
            'superficie'=> $superficie,
            'doc_status'=> "pendiente",
            'doc_acciones_real'=> "pendiente",
            'id_usuario'=> $id_user,
            'fecha_generada'=>  $fecha_generada
         ];
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if ( $query->execute($datos) ){
                print("Éxito en el registro");
                return true;
            }else{
                print("Error en el registro");
                return false;
            }
        } catch (PDOException $e) {
            print ("Error -> " . $e->getMessage());
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
}
?>