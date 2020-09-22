<?php
include_once 'model/classes/Alumno.class.php';
include_once 'model/classes/Usuario.class.php';
class UsuariosModel extends Model{
    public function __construct(){
        parent::__construct();        
    }
    public function getUsuarios(){
        $items = [];
        try{
            $query = $this->db->conn()->query("SELECT * FROM usuarios");
            while ($row = $query->fetch()){
                $item = new Usuario();
                $item->id = $row['id'];
                $item->nombre = $row['nombre'];
                $item->no_empleado = $row['no_empleado'];
                $item->correo  = $row['correo'];
                //Pasamos los datos del objeto alumno al arreglo items
                array_push($items, $item);
            }
            //Retornamos el arreglo
            return $items;
        }
        catch(PDOException $e){
            print "Error" . $e->getMessage();
            print "Error al insertar en la BD";
            return [];
        }
    }
    //Consultamos por id para mostrar en formulario de editar
    public function getUserById($idAlumno){
        try{
            $item = new Usuario();
            $query = $this->db->conn()->prepare("SELECT * FROM usuarios WHERE id = :id");
            $query->execute(['id' => $idAlumno ]);
            while($row = $query->fetchObject()){
                $item->id = $row->id;
                $item->nombre = $row->nombre;
                $item->no_empleado = $row->no_empleado;
                $item->correo = $row->correo;
            }
            //$item =   $query->fetchObject;
            return $item;
        }catch(PDOException $e){
            print ("Error -> " . $e->getMessage());
            print ("Error al obtener información");
            return null;
        }
    }
    //Método para actualizar
    public function update($params){
        $id = $params['id'];
        $matricula = $params['matricula'];
        $nombre = $params['nombre'];
        $apellido = $params['apellido'];
        $query = $this->db->conn()->prepare("UPDATE usuarios SET 
        matricula = :matricula, 
        nombre = :nombre, 
        apellido = :apellido WHERE id = :id ");        
        try{
            $query->execute([
                'id' => $id,
                'matricula' => $matricula,
                'nombre' => $nombre,
                'apellido' => $apellido
            ]);
            return true;
        }
        catch(PDOException $e){
            print ("Error -> " . $e->getMessage());
            print ("Error al obtener información");
            return false;
        }
    }

    public function delete($idAlumno){
        $query = $this->db->conn()->prepare("DELETE FROM usuarios WHERE id = :id");
        try{
            $query->execute(['id' => $idAlumno]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>