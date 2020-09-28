$selectRegion = document.querySelector("#region");
$selectRegion.addEventListener("change", function () {
    cargarDistritos();
    $param = $selectRegion.options[$selectRegion.selectedIndex].value;
    buscarPor("region", $param);
});
$selectDistrito = document.querySelector("#distrito");
$selectDistrito.addEventListener("change", function () {
    cargarMunicipios();
    $param = $selectDistrito.options[$selectDistrito.selectedIndex].value;
    buscarPor("distrito_judicial", $param);
});
$selectMunicipio = document.querySelector("#municipio");
$selectMunicipio.addEventListener("change", function () {
    $param = $selectMunicipio.options[$selectMunicipio.selectedIndex].value;
    buscarPor("municipio", $param);
});
var result = "";
window.onload = function () {
    alCargar();
    cargarURL();
};

function alCargar() {
    cargarDistritos();
    //cargarMunicipios();
    //buscarPorRegion();
}

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

function cargarDistritos() {
    const urlGetDistrito = "http://localhost/sci/consulta/getDistrito/";
    let $selectRegion = document.querySelector("#region");
    const opt = getRegion();
    httpRequest(urlGetDistrito + opt, function () {
        //console.log(this.responseText);
        $distritos = JSON.parse(this.responseText);
        $distrito = $distritos[0].id;
        //console.log($distrito);
        cargarMunicipios($distrito);
        //console.log($distritos);
        $distritos.forEach(distrito => {
            result = result + '<option value="' + distrito.id + '" >' + distrito.nombre + '</option>';
        });
        result = "<option value='0'>ELIJA UN DISTRITO</option>" + result;
        document.querySelector("#distrito").innerHTML = result;
        result = "";
    });
    cargarMunicipios();
}

function getRegion() {
    $select = document.querySelector("#region");
    $option = $select.options[$select.selectedIndex].value;
    //console.log("Has seleccionado " + $option);
    return $option;
}

function cargarMunicipios($distrito) {
    const urlGetMunicipios = "http://localhost/sci/consulta/getMunicipios/";
    const selectMunicipio = document.querySelector("#distrito");
    //let opt = getDistrito();
    let opt;
    $distrito == null ? opt = selectMunicipio.options[selectMunicipio.selectedIndex].value : opt = $distrito;

    //console.log(urlGetMunicipios + opt);
    httpRequest(urlGetMunicipios + opt, function () {
        //console.log(this.responseText);
        $municipios = JSON.parse(this.responseText);
        //console.log($municipios);
        //console.log($municipios);
        $municipios.forEach(municipio => {
            result = result + '<option value="' + municipio.id + '" >' + municipio.nombre + '</option>';
        });
        result = "<option value='0'>ELIJA UN MUNICIPIO</option>" + result;
        document.querySelector("#municipio").innerHTML = result;
        result = "";
    });
}

function getDistrito() {
    $select = document.querySelector("#distrito");
    $option = $select.options[$select.selectedIndex].value;
    //console.log("Has seleccionado " + $option);
    return $option;
}

function buscarPor(criterio, param) {
    //alert("Buscaremos por "  +  criterio + " con parametro " + param);
    let urlGetEstadoProc = "http://localhost/sci/consulta/buscarPor/" + criterio + "/" + param;
    preLoadHTTPRequest(urlGetEstadoProc, '', '#tbody-tabla-registros');
}

function preLoadHTTPRequest(urlPeticion, param, dOMID) {
    //console.log(urlPeticion + param);
    //console.log("El dom del dpreload: " + dOMID );
    httpRequest(urlPeticion + param, function () {
        //console.log(this.responseText);
        $datos = JSON.parse(this.responseText);
        //console.log($datos.length  );
        if ($datos.length == 0) {
            //console.log("no hay");
            result += '  <tr> ';
            result += '  <td colspan="5" > No se encontraron resultados</td> ';
            result += '  </tr> ';
        }
        //console.log($datos);
        $datos.forEach(dato => {
            result += '  <tr> ';
            result += '  <td> ' + dato.no_expediente + '</td> ';
            result += '  <td> ' + dato.nombreRegion + '</td> ';
            result += '  <td> ' + dato.nombreDistrito + '</td> ';
            result += '  <td> ' + dato.nombreMunicipio + '</td> ';
            result += '  <td> <a href="http://localhost/sci/consulta/VerRegistro/' + dato.id + '">Ver más</td> ';
            result += '  </tr> ';
        });
        document.querySelector(dOMID).innerHTML = result;
        result = "";
    });
}
/*Función para cargar la tabla de acuerdo a la selección del mapa */
function cargarURL() {
    /*Obtenemos la URL y la separamos con las diagonales */
    let initialURL = window.location.href;
    let url = initialURL.split('/');
    //var pathname = new URL(url).pathname;
    //console.log("Length " + url.length);
    //);
    /* Si la url tiene longitud de 6 significa que la url viene 
    propoprcionada por el mapa
     */
    if (url.length == 6) {
        let region = url[5];
        console.log(region);
        switch (region) {
            case "toluca":
                param = 1;
                break;
            case "texcoco":
                param = 2;
                break;
            case "tlanepantla":
                param = 3;
                break;
            case "ecatepec":
                param = 4;
                break;

            default:
                break;
        }
        buscarPor("region", param);
        $selectRegion = document.querySelector("#region");
        $selectRegion.options.item(param).selected = 'selected';
        cargarDistritos();
    }
}
