document.getElementById('formRegistro').addEventListener('submit',function(event){
    event.preventDefault()
    
    var datosFormulario = new FormData(this);
    const datos = {}

    // Iterar sobre los datos del formulario y mostrar los valores
    datosFormulario.forEach(function(value, key) {
        console.log(key + ": " + value);
        datos[key] = value;
    });

    
    axios.post(
        'http://localhost:8000/api/registrar', 
        //'http://localhost:8000/register',
        datos, 
        {
            headers: {
                'Content-Type': 'application/json'  
            }
        })
        .then(function(response) {
            alert("Publicación creada correctamente")
            console.log('Datos enviados correctamente:', response.data);
            //verPublicaciones()
            //Recepción de la respuesta de la API
        })
        .catch(function(error) {
            console.error('Error al enviar los datos:', error);
            // Manejo de los errores
        });
})


