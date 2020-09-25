$selectRegion = document.querySelector("#region");
$selectRegion.addEventListener("change", function(){
    cargarDistritos();
});
$selectDistrito = document.querySelector("#distrito");
$selectDistrito.addEventListener("change", function(){
    cargarMunicipios();
} );
var result = "";
window.onload = function () {
    alCargar();
};
function alCargar() {
    cargarDistritos();
    cargarMunicipios();
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
function cargarDistritos(){
    const urlGetDistrito = "http://localhost/sci/consulta/getDistrito/";
    let $selectRegion = document.querySelector("#region");
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
    });
    cargarMunicipios();
}

function getRegion() {
    $select = document.querySelector("#region");
    $option = $select.options[$select.selectedIndex].value;
    //console.log("Has seleccionado " + $option);
    return $option;
}



function cargarMunicipios() {
    const urlGetMunicipios = "http://localhost/sci/consulta/getMunicipios/";
    const selectMunicipio = document.querySelector("#distrito");
    //let opt = getDistrito();
    let opt = selectMunicipio.options[selectMunicipio.selectedIndex].value;
    console.log(urlGetMunicipios + opt);
    httpRequest(urlGetMunicipios + opt, function () {
        //console.log(this.responseText);
        $municipios = JSON.parse(this.responseText);
        //console.log($municipios);
        //console.log($municipios);
        $municipios.forEach(municipio => {
            result = result + '<option value="' + municipio.id + '" >' + municipio.nombre + '</option>';
        });
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