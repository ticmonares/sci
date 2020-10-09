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
    //damos formato al input del valor de avalúo
  valorBlur();
  //damos formato al input de la superficie
  superficieBlur();
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

$selectModalidad = document.querySelector("#modalidad");
$selectEstadoProc = document.querySelector("#estado_proc");
$selectModalidad.addEventListener("change", function(){
    validarModalidadEscriturada()
});

function validarModalidadEscriturada(){
    optSelected = $selectModalidad.options[$selectModalidad.selectedIndex].value;
    if (optSelected == 4){
        $selectEstadoProc.options.item(5).selected = 'selected';
        $selectEstadoProc.disabled=true; 
    }else{
        $selectEstadoProc.disabled=false; 
    }
    //console.log( $selectEstadoProc.options[$selectEstadoProc.selectedIndex].value);F
}

//Formato de medidas
$inputValorAvaluo = document.querySelector("#valor_avaluo");
//Aquí le damos el formato de moneda
function formatoMoneda($input) {
  //Leemos el valor del input
  let valorInput = $input.value;
  //Obtenemos el formato de la moneda mexicana
  let moneda = new Intl.NumberFormat("es-MX", {
    style: "currency",
    currency: "MXN",
  });
  //almacenamos en la variable el valor formateado
  let monedaFormat = moneda.format(valorInput);
  //console.log(monedaFormat);
  return monedaFormat;
}

//Agregamos listener para cuando tenga el foco el input, se ejecute el metodo de valor focus
$inputValorAvaluo.addEventListener("focus", valorFocus);
//Agregamos listener para cuando pierda el foco el input, se ejecute el metodo de valor blur
$inputValorAvaluo.addEventListener("blur", valorBlur);
//método focus quita el dormato de la moneda ejecutando la función stringANumero
function valorFocus() {
  // console.log("es focus");
  // console.log("Aquí debemos quitar el formato de moneda");
  // console.log("Y en el submit cambiar también a valor normal");
  let valor = $inputValorAvaluo.value;
  $inputValorAvaluo.value = stringANumero(valor);
}
//Cuando pirede el foco
//Le asignamos el valor formateado
function valorBlur() {
  // console.log("es blur");
  $inputValorAvaluo.value = formatoMoneda($inputValorAvaluo);
}

//Con esta función convertimos el string a valor numérico
function stringANumero(s) {
  return Number(String(s).replace(/[^0-9.-]+/g, ""));
}

$inputSuperficie = document.querySelector("#superficie");
$inputSuperficie.addEventListener("focus", superficieFocus);
$inputSuperficie.addEventListener("blur", superficieBlur);


function superficieFocus() {
    //console.log("converitmos a numero");
    let superficie = $inputSuperficie.value;
    $inputSuperficie.value = stringANumero(superficie);
}
function superficieBlur() {
    let numero = formatoMoneda($inputSuperficie);
    numero = monedaANumero(numero);
    //console.log(numero);
    $inputSuperficie.value = numero;
}
//En esta funciónhacemos el mismo proceso pero quitamos el signo de pesos
function monedaANumero(s) {
  let numero = s.replace("$", "");
  return numero;
}
//Regresamos los dos inputs a su valor original sin separaciones
//Obtenemos el objeto boton del submit del formulario del DOM
$buttonSubmit = document.querySelector("#btn-submit");
//Al hacer clic, restauramos su valor a numérico
$buttonSubmit.addEventListener("click", valorOriginal);

function valorOriginal() {
  valorFocus();
  superficieFocus();
}



//Sólo aceptamos números a todos los inputs con la clase only number
$inputOnlyNumbers = document.querySelectorAll('.only-number');
$inputOnlyNumbers.forEach($inputNumber => {
    //console.log("Sólo aceptamos números");
    $inputNumber.addEventListener("keypress", soloNumeros, false);
});

//Solo permite introducir numeros.
function soloNumeros(e) {
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
            e.preventDefault();
    }
}