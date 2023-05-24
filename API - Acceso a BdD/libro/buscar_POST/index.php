<?php 

    include_once "../../base/index.php";
    include_once "../../base/basededatos.php";
    include_once "../../credenciales/bdd.php";

    $datos = file_get_contents('php://input');

    $datosValidados = validarPost($datos);

    $objetoJson = json_decode("$datosValidados");

    $datosConsulta = new Consulta;
    $datosConsulta->dato = $objetoJson->dato;

    $respuesta=buscarLibro("$datosConsulta->dato");
    respuestaJSON($respuesta);

    //echo("$objetoJson->dato");
    //print_r($datosConsulta);
    //respuestaJSON($datosConsulta);



    function buscarLibro($dato){
        //Declaramos un objeto para conectarse a la base de datos
        $basededatos = new BaseDeDatos;

        //Declaramos un objeto para la respuesta
        $respuesta = new Respuesta;

        //Iniciamos la conexión al servidor de bases de datos
        $credenciales = verCredenciales();
        $basededatos->iniciarConexion($credenciales[0],$credenciales[1],$credenciales[2],$credenciales[3]);

        //Evaluamos el estado de la conexión a la BdD
        if ($basededatos->estado == "OK") {

            //Si la conexión es correcta, declaramos la consulta con parámetros, indicados por los símbolos de pregunta ----------\/
            $consulta = "SELECT titulo,genero,YEAR(fecha_pub) as anio_pub,nombre_autor,apellido_autor from libro where titulo like ?";
            
            //Con el método 'prepare' de la conexión para declarar un objeto sentencia
            $sentencia = $basededatos->conexion->prepare($consulta);

            //Declaramos variables para los términos de búsqueda
            $termino = "%$dato%";

            //Con el método bind_param del objeto sentencia, añadimos los términos a los parámetros de la consulta 
            $sentencia->bind_param("s",$termino);
            //  bind_param requiere un string con caracteres que indique los tipos de los datos a agregar a los parámetros
            //      i - int, números enteros
            //      d - double, número con decimales
            //      s - string, textos, fechas, otros datos semejantes
            //      b - blob, paquetes de datos, que se envían en forma fragmentaria, en paquetes

            //Ejecutamos la sentencia con el método 'execute'
            $sentencia->execute();

            //Declaramos un objeto 'resultado' para  
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
            //CAMBIAR ESTO PARA PRODUCCIÓN!!!!!!!
            $respuesta->datos=$basededatos->mensaje;
        }
        
        $basededatos->cerrarConexion();

        return $respuesta;        
    }


?>