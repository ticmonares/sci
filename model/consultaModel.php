<?php
require_once 'model/classes/Region.class.php';
require_once 'model/classes/Distrito.class.php';
require_once 'model/classes/Municipio.class.php';

class ConsultaModel extends Model{
    function __construct(){
        parent::__construct();
    }
    //Insert
    public function agregarRegistroInmueble($datos){
        $stringQuery = "INSERT INTO `registro_inmuebles`(`
        id`, `no_consecutivo`, `id_region`, 
        `id_distrito_judicial`, `id_municipio`, `edificio`, 
        `domicilio`, `id_modalidad_prop`, `id_estado_proc`, 
        `superficie`, `doc_status`, `doc_acciones_real`, 
        `id_usuario`, `fecha_generada`, `fecha_mod`, 
        `id_user_mod`) 
        VALUES ([value-1],[value-2],[value-3],
        [value-4],[value-5],[value-6],
        [value-7],[value-8],[value-9],
        [value-10],[value-11],[value-12],
        [value-13],[value-14],[value-15],
        [value-16]) ";
        try {
            $query = $this->bd->conn()->prepare($stringQuery);
            if ($query->execute($datos)){
                print("Éxito en el registro");
                return true;
            }else{
                print("Éxito en el registro");
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
        $municipio = new Municipio();
        $stringQuery = "SELECT * FROM municipios WHERE id_distrito_judicial = :id_distrito_judicial";
        try {
            $query = $this->db->conn()->prepare($stringQuery);
            if($query->execute(['id_distrito_judicial' => $id_distrito_judicial])){
                while($row = $query->fetch()){
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

    }
    public function getEstadosProc(){

    }
}
?>