<?php 
    include_once "../../credenciales/bdd.php";
    include_once "../../base/index.php";
    include_once "../../base/basededatos.php";

    $datos = preValidarDatos( file_get_contents("php://input") );


    // FUNCIONES //

    /**
     * Permite validar si los datos recibidos por POST
     * se corresponden con la estructura de un usuario
     */
    function validarUsuario($datosPOST){
        if (empty($datosPOST->nombre) and ) {
            # code...
        }
    }


 ?>