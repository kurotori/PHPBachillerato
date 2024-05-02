<?php 
    
    /**
     * Ejemplos de declaración de clases en PHP
     * 
     */

    class Sesion{
        public $ID;
        public $activa;
        public $inicio;
        public $final;
    }

    /**
     * Usuario es una clse compuesta, por lo que debemos inicializar los atributos que son
     * objetos de otras clases en el método constructor.
     */
    class Usuario{
        public $ID;
        public $nombre;
        public $apellido;
        public $edad;
        public $sesion; // <<- Este atributo es un objeto que depende la clase 'Sesion' declarada arriba

        /**
         *  __construct()  <<- Método Constructor de las clases de PHP
         * Puede declararse con o sin atributos, dependiendo de las necesidades del código
         */
        public function __construct()
        {
            /**
             *  $this <<- Semejante al 'this' utilizado en Java. 
             * Usado cuando el objeto debe referirse a un aspecto (método o atributo) de sí mismo.
             */

            $this->sesion = new Sesion(); // <<- Inicializamos el atributo $sesion declarado más
        }
    }




 ?>