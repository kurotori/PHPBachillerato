<?php 
    include_once "../../base/index.php";
    include_once "../../base/basededatos.php";

    /** Funciones */


    function buscarLibro($dato){
        $basededatos = new BaseDeDatos;
        $respuesta = new Respuesta;

        $basededatos->iniciarConexion("localhost:3306","libreria","VaqvPLDM","libreria");

        if ($basededatos->estado == "OK") {
            $consulta = "SELECT titulo,genero,YEAR(fecha_pub) as anio_pub,nombre_autor,apellido_autor from libro where titulo like ?";
            $sentencia = $basededatos->conexion->prepare($consulta);
            $termino = "%$dato%";
            $sentencia->bind_param("s",$termino);
            $sentencia->execute();

            $resultado = $sentencia->get_result();

            $respuesta->estado = "OK";

            if ($resultado->num_rows > 0) {
                $respuesta->datos = array();

                foreach($resultado as $fila){
                    $libro = new Libro;
                    $libro->titulo = $fila['titulo'];
                    $libro->genero = $fila['genero'];
                    $libro->anio_pub = $fila['anio_pub'];
                    $libro->autor = $fila['apellido_autor'] .", ". $fila['nombre_autor'];

                    array_push($respuesta->datos,$libro);
                }
            }
            else{
                $respuesta->datos = "No se encontraron resultados para la búsqueda";
            }
        }
        else {
            $respuesta->estado=$basededatos->estado;
            $respuesta->datos=$basededatos->mensaje;
        }
        
        return $respuesta;        
    }


    /** Ejecución */
    if ( ! empty($_GET['dato']) and ! is_null($_GET['dato'])) {
        $dato = validarDatos($_GET['dato']);
 
        if ( ! empty($dato) and ! is_null($dato) ) {
            $respuesta=buscarLibro("$dato");
            respuestaJSON($respuesta);
         }
 
    }
    else {
        accesoInadecuado();
    }



    

?>