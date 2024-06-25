const formularioRegistro = document.getElementById('formRegistro');


formularioRegistro.addEventListener('submit',
    function (event) {
        event.preventDefault()
        // Obtener los datos del formulario
        const datos = {
            'name':formularioRegistro[0].value,
            'email':formularioRegistro[1].value,
            'password':formularioRegistro[2].value
        };

        axios.post(
            'http://localhost:8000/register', 
            datos, 
            {
                headers: {
                    'Content-Type': 'application/json'  
                }
            })
            .then(function(response) {
                //alert("Publicación creada correctamente")
                formularioRegistro[0].value = ""
                formularioRegistro[1].value = ""
                formularioRegistro[2].value = ""
                console.log('Datos enviados correctamente:', response.data);
                //Recepción de la respuesta de la API
            })
            .catch(function(error) {
                console.error('Error al enviar los datos:', error);
                // Manejo de los errores
            });

    }
)
