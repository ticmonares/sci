<?php
    class LoginModel extends Model{
        public function __construct(){
            parent::__construct();
        }        
        public function validaLogin($datos){
            $correo = $datos['correo'];
            $contrasena = $datos['contrasena'];
            $checkCorreo = "SELECT id, correo, pass, rol FROM usuarios WHERE correo = :correo";
            $checkCorreo = $this->db->conn()->prepare($checkCorreo);
            try {
                $checkCorreo->execute([ 'correo' => $correo ]);
                if($checkCorreo->rowCount() > 0  ){
                    //print "El correo existe, prosigamos";
                    //Capturamos datos
                    $row = $checkCorreo->fetchObject();
                    $hashed_password = $row->pass;
                    if( password_verify($contrasena, $hashed_password) ){
                        //print "Coincide usuario y contraseña... Iniciemos sesión";
                        //session_start();
                        $_SESSION['user_id'] = $row->id;
                        $_SESSION['user_rol' ] = $row->rol ;
                       //session_unset();
                        return true;
                    }else{
                        //print "Contraseña incorrecta";                    
                        return false;
                    }
                }else{
                    //print "No existe el correo";
                }
            } catch (PDOException $e) {
                print "Error -> " . $e->getMessage();
            }
        }
    }
?>