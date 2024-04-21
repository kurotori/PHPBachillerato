const inptUsuarioNombre=document.getElementById('usuarioNombre')
const inptUsuarioPasswd=document.getElementById('usuarioPasswd')
const btnCrearUsuario=document.getElementById('btnCrearUsuario')

const usuario={}

btnCrearUsuario.addEventListener("click",crearUsuario)

/**
 * Contiene toda la secuencia de creación de un usuario
 */
function crearUsuario() {
    usuario.nombre=inptUsuarioNombre.value
    //usuario.password=generarHash(inptUsuarioPasswd.value)
    enviarUsuarioNombre(usuario)
}

/**
 * Envía el nombre del usuario al servidor para determinar si ya fue registrado
 * 
 * @param {*} nombre 
 */
function enviarUsuarioNombre(usuario) {
    
    //Opciones generales
    const opciones = {
        method : "POST",
        headers: {
            "Content-Type": "application/json"
          },
        body: JSON.stringify(usuario)
    };

    //Retraso en la respuesta para simular un servidor ocupado
    setTimeout(() => {

        //Comienzo de operación fetch
        fetch("./",opciones)
        .then(respuesta=>respuesta.text())
        .then(datos=>{
            servidor = JSON.parse(datos);
            console.log(servidor)
            if (servidor.Respuesta.estado=="OK") {
                /* if ( Array.isArray(servidor.Respuesta.datos) ) {
                    
                }
                else{
                    cambiarTextoTitulo(servidor.Respuesta.datos);
                } */
            } else {
                //cambiarTextoTitulo("Ha ocurrido un error en el sistema...");
                console.error(servidor.Respuesta.datos);
            }

        });
        //Fin de operación fetch

    }, 500);

}






/**
 * Permite generar un hash con la contraseña proporcionada por el usuario
 * @param {*} password La contraseña del usuario.
 * @returns El hash de la contraseña proporcionada.
 */
function generarHash(password) {
    //1 - Creamos un objeto de hasheo
    var hasheador = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
    //2 - Agregamos el password al objeto de hasheo
    hasheador.update(password);
    //3 - Obtenemos el hash en formato hexadecimal...
    var hash = hasheador.getHash("HEX");
    // ...y devolvemos el mismo.
    return hash;
}

