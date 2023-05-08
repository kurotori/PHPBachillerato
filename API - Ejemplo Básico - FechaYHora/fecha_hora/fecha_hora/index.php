<?php 
    include_once "../../base/index.php";

    $fechaHora = new fechaHora;
    $fechaHora->fecha->dia = date("d");
    $fechaHora->fecha->mes = date("m");
    $fechaHora->fecha->anio = date("Y");
    $fechaHora->hora->hora = date("H");
    $fechaHora->hora->minuto = date("i");

    $respuesta = new Respuesta;

    $respuesta->estado = "OK";
    $respuesta->datos = $fechaHora;

    /* 
    $json = TransformarEnJSON($respuesta);
    MostrarJSON($json); 
    */

    respuestaJSON($respuesta);
?>