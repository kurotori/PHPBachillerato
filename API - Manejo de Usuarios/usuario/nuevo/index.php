<?php 
    include_once "../../credenciales/bdd.php";
    include_once "../../base/index.php";
    include_once "../../base/basededatos.php";

    $datos = preValidarDatos( file_get_contents("php://input") );
    $datos = validarDato($datos);

    echo("$datos");

    // FUNCIONES //

    


 ?>