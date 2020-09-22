<?php
class NuevoModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function cargarDatos(){
        
    }

    public function insert($datos){
        try {
            $query = $this->db->conn()->prepare("INSERT INTO usuario (id, matricula, nombre, apellido)
             VALUES (:id, :matricula, :nombre, :apellido) ");
            $query->execute(
                [   
                    null,
                    'matricula' => $datos['matricula'],
                    'nombre' => $datos['nombre'],
                    'apellido' => $datos['apellido'],
                ]
            );
            return true;
        } catch (PDOException $e) {
            print "Error" . $e->getMessage();
            print "Error al insertar en la BD";
            return false;
        }
    }
}
?>