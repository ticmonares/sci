//Cargar Distritos
const urlGetDistrito = "http://localhost/sci/consulta/getDistrito/";
var $selectRegion = document.querySelector("#region");
//Con un foreach le asignamos un listener a todos los botones
//En result guardamos los datos que insertaremos al select
let result = "";

//Agregamos el listener para el change
$selectRegion.addEventListener("change", function () {
    const opt = getRegion();
    httpRequest(urlGetDistrito + opt, function () {
        //console.log(this.responseText);
        $distritos = JSON.parse(this.responseText);
        //console.log($distritos);
        $distritos.forEach(distrito => {
            result = result + '<option value="' + distrito.id + '" >' + distrito.nombre + '</option>';
        });
        document.querySelector("#distrito").innerHTML = result;
        result = "";
        cargarMunicipios()
    });
});


function httpRequest(url, callback) {
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(http);
        }
    }
}

function getRegion() {
    $select = document.querySelector("#region");
    $option = $select.options[$select.selectedIndex].value;
    //    console.log("Has seleccionado " + $option);
    return $option;
}

//Cargar Municipios
const urlGetMunicipios = "http://localhost/sci/consulta/getMunicipios/";
const selectMunicipio = document.querySelector("#distrito");

function cargarMunicipios() {
    const opt = getDistrito();
    console.log(urlGetMunicipios + opt);
    httpRequest(urlGetMunicipios + opt, function () {
        //console.log(this.responseText);
        $municipios = JSON.parse(this.responseText);
        console.log($municipios);
        //console.log($municipios);
        $municipios.forEach(municipio => {
            result = result + '<option value="' + municipio.id + '" >' + municipio.nombre + '</option>';
        });
        document.querySelector("#municipio").innerHTML = result;
        result = "";
    });
}

selectMunicipio.addEventListener("change", function () {
    cargarMunicipios();
});

function getDistrito() {
    let $select = document.querySelector("#distrito");
    let option = $select.options[$select.selectedIndex].value;
    //console.log(option);
    return option;
}


window.onload = function () {
    alCargar();
};

function alCargar() {
    cargarSelectModalidad();
    cargarSelectEstadoProcesal();
}

function cargarSelectModalidad() {
    let urlGetModalidad = "http://localhost/sci/consulta/getModalidades/";
    preLoadHTTPRequest(urlGetModalidad, '', '#modalidad' );
}

function cargarSelectEstadoProcesal() {
    let urlGetEstadoProc = "http://localhost/sci/consulta/getEstadosProc/";
    preLoadHTTPRequest(urlGetEstadoProc, '', '#estado_proc');
}

function preLoadHTTPRequest(urlPeticion, param, dOMID) {
    //console.log(urlPeticion + param);
    httpRequest(urlPeticion + param, function () {
        //console.log(this.responseText);
        $datos = JSON.parse(this.responseText);
        //console.log($datos);
        //console.log($datos);
        $datos.forEach(dato => {
            result = result + '<option value="' + dato.id + '" >' + dato.nombre + '</option>';
        });
        document.querySelector(dOMID).innerHTML = result;
        result = "";
    });
}