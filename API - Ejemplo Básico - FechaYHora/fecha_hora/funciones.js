const titulo = document.getElementById("titulo");
const btnActualizar = document.getElementById("btnActualizar");

btnActualizar.addEventListener("click",obtenerFecha);

let servidor = {};

function obtenerFecha() {
    titulo.innerText="Espere...";
    setTimeout(() => {
        fetch("fecha_hora/index.php")
        .then(respuesta=>respuesta.text())
        .then(datos=>{
            servidor = JSON.parse(datos);
            let dia = servidor.Respuesta.datos.fecha.dia;
            let mes = servidor.Respuesta.datos.fecha.mes;
            let anio = servidor.Respuesta.datos.fecha.anio;
            let hora = servidor.Respuesta.datos.hora.hora;
            let minuto = servidor.Respuesta.datos.hora.minuto;

            titulo.innerText = dia+"/"+mes+"/"+anio+" "+hora+":"+minuto;
            }
        );
    }, 500);
    
}

