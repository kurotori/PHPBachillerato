<?php
    //Incluímos el archivo con las funciones base para la API
    include_once "../../base/index.php";

    //Creamos un nuevo objeto para la respuesta del servidor
    //y otro para los datos que incluiremos en la misma. 
    
    $respuesta = new Respuesta;
    $hora = new Hora;

    //Cargamos los datos necesarios en el objeto contenedor de
    // los datos de la API
    $hora->hora = date("H");
    $hora->minuto = date("i");
    
    //Establecemos el valor del estado y cargamos los datos
    // de la  respuesta en el objeto respuesta.
    $respuesta->estado = "OK";
    $respuesta->datos = $hora;

    //Transformamos la respuesta en JSON
    $json = TransformarEnJSON($respuesta);

    //Mostramos los datos transformados 
    MostrarJSON($json);

    //Como alternativa se puede utilizar la función combinada directamente con el objeto respuesta:
    // respuestaJSON($respuesta);
?>