<?php 
    $dato="";
    // Chequeamos la existencia de datos en POST
    //Si existen los asignamos a la variable $dato
    if ($_POST["dato"]) {
        if ( isset($_POST["dato"]) ) {
            $dato = $_POST["dato"];        
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destino GROSERO para JavaScript desde PHP</title>
    <script>
        // Abrimos un bloque php dentro de un bloque script para generar una variable para JS
        <?php
            echo("dato='" . $dato . "';"); 
         ?>
    </script>
</head>
<body>
    
</body>
</html>