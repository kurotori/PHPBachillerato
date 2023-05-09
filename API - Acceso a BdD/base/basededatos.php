<?php 

    /** Clases para el uso de bases de datos */
    class BaseDeDatos{
        public $conexion;
        public $estado;
        public $mensaje;



        /**
        * Permite Iniciar la conexión a la base  de datos con los parámetros establecidos.
        * La conexión queda almacenada en el atributo $conexion 
        * @param mixed $servidor El servidor mysql al cual conectarse
        * @param mixed $usuario El usuario del servidor mysql
        * @param mixed $password La contraseña del usuario indicado
        * @param mixed $bdd La base de datos a la que nos conectaremos
        */
        public function iniciarConexion($servidor, $usuario, $password, $bdd){
            
            //Ejecutamos el comando mysqli para crear la conexión en el atributo conexion
            $this->conexion = new mysqli($servidor, $usuario, $password, $bdd);

            //Establecemos el estado y el mensaje
            $this->estado = "OK";
            $this->mensaje = "Conexión Exitosa";
    
            //Chequeo de errores de conexión
            if ($this->conexion->connect_error) {
                
                //Si existe el atributo connect_error significa que hubo algún error de conexión
                //Pasamos el estado a ERROR
                $this->estado = "ERROR";

                //Asignamos a mensaje el mensaje de error de connect_error
                $this->mensaje = $this->conexion->connect_error;

                //OPCIONAL: Añadimos el error al registro de errores del servidor
                error_log($this->mensaje, 0);

                //Terminamos el proceso con estatus 1, indicando al servidor que hubo un error
                exit(1);
            }
        }

        
        /**
         * Cierra la conexión al servidor de bases de datos
         */
        public function cerrarConexion(){
            $this->conexion->close();
            $this->estado="CERRADA";
        }


        public function buscarDatos(){
            
        }

    }

?>