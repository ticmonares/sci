//Cargar Distritos
const urlGetDistrito = "http://localhost/sci/consulta/getDistrito/"
var $selectRegion = document.querySelector("#region");
//Con un foreach le asignamos un listener a todos los botones
//En result guardamos los datos que insertaremos al select
let result="";

    //Agregamos el listener para el change
    $selectRegion.addEventListener("change", function(){
        const opt = getRegion();
        httpRequest(urlGetDistrito+opt, function(){
            //console.log(this.responseText);
            $distritos = JSON.parse(this.responseText);
            //console.log($distritos);
            $distritos.forEach(distrito =>{
                result=result+'<option value="'+distrito.id+'" >'+distrito.nombre+'</option>';
            });
            document.querySelector("#distrito").innerHTML = result;
            result="";
        });
    });


function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if ( this.readyState == 4 && this.status == 200 ){
            callback.apply(http);
        }
    }
}

function getRegion(){
    $select = document.querySelector("#region");
    $option = $select.options[$select.selectedIndex].value;
//    console.log("Has seleccionado " + $option);
    return $option;
}

//Cargar Municipios
const urlGetMunicipios = "http://localhost/sci/consulta/getMunicipios/";
const selectMunicipio = document.querySelector("#distrito");

selectMunicipio.addEventListener("change", function(){
    const opt = getDistrito();
    console.log(urlGetMunicipios+opt);
    httpRequest(urlGetMunicipios+opt, function(){
        //console.log(this.responseText);
        $municipios = JSON.parse(this.responseText);
        console.log($municipios);
        //console.log($municipios);
        $municipios.forEach(municipio =>{
            result=result+'<option value="'+municipio.id+'" >'+municipio.nombre+'</option>';
        });
        document.querySelector("#municipio").innerHTML = result;
        result="";
    });
});

function getDistrito(){
    let $select = document.querySelector("#distrito");
    let option = $select.options[$select.selectedIndex].value;
    //console.log(option);
    return option;
}


