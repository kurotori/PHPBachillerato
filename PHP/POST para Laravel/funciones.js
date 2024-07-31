const formulario = document.getElementById('formPublicacion')
const divPublicaciones = document.getElementById('publicaciones')


formulario.addEventListener('submit',
    function (event) {
        event.preventDefault()
        // Obtener los datos del formulario
        const datos = {
            'titulo':formulario[0].value,
            'contenido':formulario[1].value,
            'user_id':1
        };

        axios.post(
            'http://localhost:8000/api/publicaciones/crear', 
            datos, 
            {
                headers: {
                    'Content-Type': 'application/json'  
                }
            })
            .then(function(response) {
                alert("Publicación creada correctamente")
                formulario[0].value = ""
                formulario[1].value = ""
                console.log('Datos enviados correctamente:', response.data);
                verPublicaciones()
                //Recepción de la respuesta de la API
            })
            .catch(function(error) {
                console.error('Error al enviar los datos:', error);
                // Manejo de los errores
            });

    }
)


async function solicitar() {

    datos={
        'info':{
            'nombre':'algo',
            'otros':25
        }
    }

    await fetch(
        "http://localhost:8000/api/pruebas",
        {
            method:'post',
            headers: {
                "Content-Type": "application/json",
              },
            body:JSON.stringify(datos)}
    )
    .then(response => response.json())
    .then(data => console.log(data))
}



async function solicitarConAxios(datos){

    axios.post('http://localhost:8000/api/pruebas', datos, {
                headers: {
                    'Content-Type': 'application/json'
                    
                }
            })
            .then(function(response) {
                console.log('Datos enviados correctamente:', response.data);
                // Aquí puedes manejar la respuesta de la API
            })
            .catch(function(error) {
                console.error('Error al enviar los datos:', error);
                // Aquí puedes manejar los errores
            });
}

async function verPublicaciones() {
    divPublicaciones.innerHTML="";

    axios.get(
        'http://localhost:8000/api/publicaciones/ultimas/10'
    )
    .then(function (response) {
        response.data.publicaciones.forEach(element => {
            console.log(element)
            const h3Titulo = document.createElement('h3')
            h3Titulo.innerText = element.id + ") " + element.titulo
            const h4Autor = document.createElement('h4')
            h4Autor.innerText = "Creado por " + element.user_id
            
            const pContenido = document.createElement('p')
            pContenido.innerText = element.contenido
            divPublicaciones.appendChild(h3Titulo)
            divPublicaciones.appendChild(h4Autor)
            divPublicaciones.appendChild(pContenido)
        });
    })
}