const inptBuscar = document.getElementById("inptBuscar");
const btnBuscar = document.getElementById("btnBuscar");


btnBuscar.addEventListener("click",obtenerFecha);

let servidor = {};

function buscarLibro() {
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