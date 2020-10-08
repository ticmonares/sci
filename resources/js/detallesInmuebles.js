$selectModalidad = document.querySelector("#modalidad");
$selectEstadoProc = document.querySelector("#estado_proc");
$selectModalidad.addEventListener("change", function () {
  validarModalidadEscriturada();
});

function validarModalidadEscriturada() {
  optSelected = $selectModalidad.options[$selectModalidad.selectedIndex].value;
  if (optSelected == 4) {
    $selectEstadoProc.options.item(5).selected = "selected";
    $selectEstadoProc.disabled = true;
  } else {
    $selectEstadoProc.disabled = false;
  }
  //console.log( $selectEstadoProc.options[$selectEstadoProc.selectedIndex].value);
}

window.onload = function () {
  //al cargar
  validarModalidadEscriturada();
  //damos formato al input del valor de avalúo
  valorBlur();
  //damos formato al input de la superficie
  superficieBlur();
};

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
    console.log("converitmos a numero");
    let superficie = $inputSuperficie.value;
    $inputSuperficie.value = stringANumero(superficie);
}
function superficieBlur() {
    let numero = formatoMoneda($inputSuperficie);
    numero = monedaANumero(numero);
    console.log(numero);
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
