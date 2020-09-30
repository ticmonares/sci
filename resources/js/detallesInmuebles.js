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
    console.log( $selectEstadoProc.options[$selectEstadoProc.selectedIndex].value);
}