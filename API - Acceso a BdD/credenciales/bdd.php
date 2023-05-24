<?php

    function verCredenciales(){
        $usuarioBdD = "libreria";
        $contraseniaBdD = "VaqvPLDM";
        $servidorBdD = "localhost:3306";
        $baseDeDatos = "libreria";
        
        $credenciales = array($servidorBdD,$usuarioBdD,$contraseniaBdD,$baseDeDatos);
        return $credenciales; 
    }
   

 ?>