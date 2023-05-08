<?php 
    include_once "../../base/index.php";

    $hora = new Hora;
    $hora->hora = date("H");
    $hora->minuto = date("i");
    
    $respuesta = new Respuesta;

    $respuesta->estado = "OK";
    $respuesta->datos = $hora;

    $json = TransformarEnJSON($respuesta);
    MostrarJSON($json);
?>