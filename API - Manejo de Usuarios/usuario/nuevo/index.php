<?php 
    include_once "../../credenciales/bdd.php";
    include_once "../../base/index.php";
    include_once "../../base/basededatos.php";

    $datos = validarDato( file_get_contents("php://input") );
    //$datos = file_get_contents("php://input");
    //$datos = preValidarDatos($datos);
    

    
    

    //respuestaJSON($datos);

    //$datos = validarDato($datos);
    //Variables Auxiliares
    $limiteMem = SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE;
    $limiteOps = SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE;
    print_r(password_algos());
    
    echo constant("SODIUM_LIBRARY_VERSION");
    // FUNCIONES //
    echo(crearSal());

    function crearSal(){
       $sal="";
       $caracteres="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890!@#$%^&*()-_=+,.><:;";
       for ($i=0; $i < 100; $i++) { 
            $num=random_int(0, strlen($caracteres));
            $letra=$caracteres[$num];
            $sal="$sal"."$letra";
       } 
       return $sal;
    }

    

    


 ?>