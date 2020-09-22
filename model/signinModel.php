<?php
class signinModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insert($datos){

        $nombre = $datos['nombre'];
        $no_empleado = $datos['no_empleado'];
        $correo = $datos['correo'];
        $contrasena = $datos['contrasena'];
        $rol = $datos['rol'];
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
        try {
            if($this->validaCorreo($correo)){
                $query = "INSERT INTO `usuarios`(`id`, `nombre`, `no_empleado`, `correo`, `pass`, `rol`) VALUES (null, :nombre, :no_empleado, :correo, :pass, :rol)";
                $query = $this->db->conn()->prepare($query);
                $insertArray = [
                    'nombre' => $nombre,
                    'no_empleado' => $no_empleado,
                    'correo' => $correo,
                    'pass' => $hashedPassword,
                    'rol' => $rol
                ];
                if ($query->execute($insertArray)){
                    return true;
                }else{
                    return false;
                }
            }else{
                print "El correo ya se encuentra registrado";
                return false;
            }
        } catch (PDOException $e) {
            //print "Error -> " . $e->getMessage();
            return false;
        }
    }

    public function validaCorreo($correo){
        $query = "SELECT correo FROM usuarios WHERE correo = :correo";
        $query = $this->db->conn()->prepare($query);
        try {
            $query->execute(['correo' => $correo]);
            if ( $query->rowCount() == 0 ){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            print "Error -> " . $e->getMessage();
        }
    }
}
?>