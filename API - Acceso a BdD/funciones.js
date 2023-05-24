const inptBuscar = document.getElementById("inptBuscar");
const btnBuscar = document.getElementById("btnBuscar");
const h3Titulo = document.getElementById("titulo");
const divCuerpo = document.getElementById("cuerpo");


btnBuscar.addEventListener("click",busqueda);

let servidor = {};


function busqueda() {
    const dato = {
        dato:inptBuscar.value
    }

    buscarLibro(dato);
}

function cambiarTextoTitulo(texto) {
    h3Titulo.innerText=texto;
    divCuerpo.appendChild(h3Titulo);
}


function buscarLibro(datoLibro) {
    
    divCuerpo.innerText="";
    cambiarTextoTitulo("Espere...");
    
    const opciones = {
        method : "POST",
        headers: {
            "Content-Type": "application/json"
          },
        body: JSON.stringify(datoLibro)
    };
    
    //Retraso en la respuesta para simular un servidor ocupado
    setTimeout(() => {

        //Comienzo de operación fetch
        fetch("libro/buscar_POST/",opciones)
        .then(respuesta=>respuesta.text())
        .then(datos=>{
            servidor = JSON.parse(datos);
            
            if (servidor.Respuesta.estado=="OK") {
                if ( Array.isArray(servidor.Respuesta.datos) ) {
                    servidor.Respuesta.datos.forEach(libro => {
                        const divDatosLibro = document.createElement("div");
                        divDatosLibro.classList.add("resultado_libro");
                        const h3TituloLibro = document.createElement("h3");
                        const pDatosLibro = document.createElement("p");
                        
                        h3TituloLibro.innerText = libro.titulo;
                        pDatosLibro.innerText = libro.autor + " - " + libro.genero + " - " + libro.anio_pub;
                        
                        divDatosLibro.appendChild(h3TituloLibro);
                        divDatosLibro.appendChild(pDatosLibro);
                        
                        divCuerpo.appendChild(divDatosLibro);
                    });

                    h3Titulo.innerText="";
                }
                else{
                    cambiarTextoTitulo(servidor.Respuesta.datos);
                }
            } else {
                cambiarTextoTitulo("Ha ocurrido un error en el sistema...");
                console.error(servidor.Respuesta.datos);
            }

        });
        //Fin de operación fetch

    }, 500);
    
}