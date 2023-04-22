<?php

//if ($_POST["dato"]) {
    //if ( isset($_POST["dato"]) ) {
        $dato = "935aasas";

        switch ($dato) {
            //Chequear variable por si tiene letras
            case (preg_match('/([a-zA-Z])+/',$dato)? true : false):
                echo("Es un string");
                break;
            
            //Chequear si tiene solo números
            case (preg_match('/[0-9]*/',$dato)? true : false):
                    echo("Es un número");
                    break;
                
            default:
                echo("No, macho...");
                break;
        }
  //  }
//}

?>