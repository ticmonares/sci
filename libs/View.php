<?php
class View{
    function __construct(){
        //echo "vista base";
    }
    function render($nombre){
        require 'view/' .  $nombre . '.php';
    }
}
?>


