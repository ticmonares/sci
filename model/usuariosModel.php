<?php
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
                $item->rol  = $item->traduceRol($row['rol']);
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
    public function getUserById($idUsuario){
        try{
            $item = new Usuario();
            $query = $this->db->conn()->prepare("SELECT * FROM usuarios WHERE id = :id");
            $query->execute(['id' => $idUsuario]);
            while($row = $query->fetchObject()){
                $item->id = $row->id;
                $item->nombre = $row->nombre;
                $item->no_empleado = $row->no_empleado;
                $item->correo = $row->correo;
                $item->rol = $row->rol;
                $item->stringRol = $item->cargaSelectRol($item->rol);
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
        $no_empleado = $params['no_empleado'];
        $nombre = $params['nombre'];
        $correo = $params['correo'];
        $rol = $params['rol'];
        $query = $this->db->conn()->prepare("UPDATE usuarios SET 
        no_empleado = :no_empleado, 
        nombre = :nombre, 
        correo = :correo,
        rol = :rol
        WHERE id = :id ");        
        try{
            $query->execute([
                'id' => $id,
                'no_empleado' => $no_empleado,
                'nombre' => $nombre,
                'correo' => $correo,
                'rol' => $rol
            ]);
            return true;
        }
        catch(PDOException $e){
            print ("Error -> " . $e->getMessage());
            print ("Error al obtener información");
            return false;
        }
    }

    public function delete($idUsuario){
        $query = $this->db->conn()->prepare("DELETE FROM usuarios WHERE id = :id");
        try{
            $query->execute(['id' => $idUsuario]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}
?>