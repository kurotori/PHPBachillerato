document.getElementById('formRegistro').addEventListener('submit',function(event){
    event.preventDefault()
    //let datos = new FormData(this)
    console.log(this)
    var formData = new FormData(this);

    // Iterar sobre los datos del formulario y mostrar los valores
    formData.forEach(function(value, key) {
        console.log(key + ": " + value);
    });

})


