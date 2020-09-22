<?php
//Llamamos a la clase error
require_once ('controller/PageError.php');
require_once ('controller/Login.php');
//Creamos una clase para centralizar todo
class App{

    function __construct(){
        //obtenemos la url
        $url = isset($_GET['url']) ? $_GET['url']:'main';
        if(empty($url[0])){
            $controller = new Main;
            $controller->loadModel('main');
            $controller->render();
        }
        //retiramos las diagonales
        $url = rtrim($url,'/');
        //explode() separa un string en un array
        //Lo separamos para acceder a cada parte del string
        //Recibe params (separador,string,limite)
        $url = explode('/',$url);
        //var_dump Muestra información sobre una variable
        //var_dump($url);
        //Mandamos a llamar al controlador deacuerdo a lo recibido en la url
        $archivoController = 'controller/' . $url[0] . '.php';
        //Si existe el archivo lo cargamos
        if (file_exists($archivoController)){
            //rquerimos el archivo con la estructura establecida
            require_once $archivoController;
            //Innstanciamos la clase
            $controller = new $url[0];
            //llamamos al modelo e inicializamos controlador
            $controller->loadModel($url[0]);
            //Detectamos el número de parametros en $nparam
            $nparam = sizeof($url);
            //Si es mayor a uno sería un método
            if ($nparam > 1){
                //Si es mayor a dos sería un método con parámetros
                if ($nparam > 2){
                    //Creamos un arreglo para dividir la url
                    //inicializamos en dos para comenzar con el primer parametro
                    $param = [];
                    for($i = 2; $i < $nparam; $i++ ){                        
                        array_push($param, $url[$i]);
                    }
                    //Ejecutamos el nombre del metodo,obtenido de la url, y envíamos el arregolo por parametro
                    $controller->{$url[1]}($param);
                }else{
                    //Si el método no recibe parámetros, entonces sólo ejecutamos el método
                    $controller->{$url[1]}();
                }
            }else{
                //Sino, renderizamos normalmente
                //Evaluamos si tiene iniciadas las variables de sesión
                if(Core::validarSession()){
                    //Si tiene sesión
                    //Ejecutamos el método render para crear la vista
                    $controller->render();
                }else{
                    //Sino tine sesiónn
                    //Evaluamos
                    //Si estamos en la vista de login renderizamos normalmente
                    if ($url[0] == "login"){
                        $controller->render();
                    //Sino forzamos a cargar la vista del login
                    }else{
                        $controller = new Login;
                        $controller->loadModel('login');
                        $controller->render();
                    }
                }
            }
            
        }else{
            //Llamamos a la clase ArchivoError
            $controller = new PageError();
        }
    }
}
?>