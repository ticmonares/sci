<?php
class View{
    function __construct(){
        //echo "vista base";
    }
    function render($nombre){
        if (Core::validarSession()){
            if (Core::validarSU() || Core::validarAD() ){
                require 'view/' .  $nombre . '.php';
            }else{
                require 'view/main/index.php';
            }
        }else{
            require 'view/login/index.php';
        }
    }
}
?>


