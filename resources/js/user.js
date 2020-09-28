
$(document).ready(function() {
    $('#tbl-usuarios').DataTable();
} );
const urlTabla = "http://localhost/sci/usuarios/borrarUsuario/"
//Definimos una constante con una colección de los botones que tengan la clase btnEliminar
const botones = document.querySelectorAll(".btnEliminar");
//Con un foreach le asignamos un listener a todos los botones
botones.forEach(boton => {
    //Agregamos el listener para el click
    boton.addEventListener("click", function(){
        //Almacenamos en una constante la no_empleado obtenida del data de cada renglon
        const id = this.dataset.id;
        const no_empleado = this.dataset.matricula;
        //Creamos un confirm en una constante para evaluar si  realmente se desea eliminar al alumno
        const confirm = window.confirm("¿Deseas deshabilitar al usuario: " + no_empleado  +"?");
        if(confirm){
            //Solicitud AJAX
            httpRequest(urlTabla+id, function(){
                //Insertamos la respuesta en el div de la viasta
                document.querySelector("#respuesta").innerHTML = this.responseText;
                console.log(this.responseText);
                alert(this.responseText);
                //QUitamos el renglon de la tabla
                const tbody = document.querySelector("#tbody-usuarios");
                const row = document.querySelector("#fila-id-"+id);
                tbody.removeChild(row);
            });
        }
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