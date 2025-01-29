<?php
    class DBHandler {

        // ATRIBUTOS DE CLASE PARA CONECTARNOS A LA BASE DE DATOS
        private $hostname;      // IP
        private $usuario;       // nombre usuario
        private $contrasena;    // password
        private $base_de_datos; // nom base de datos
        private $port;          // puerto de conexion a la base de datos
        private $conexion;      // atributo que almacenará la conexión

        // CONSTRUCTOR DE CLASE PARA INICIALIZAR LOS ATRIBUTOS DE CLASE
        public function __construct($hostname, $usuario, $contrasena, $base_de_datos, $port) {   
            $this->hostname = $hostname;
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;
            $this->base_de_datos = $base_de_datos;
            $this->port = $port;
        }

        // Método para conectar a la base de datos
        public function conectar(){
            try {

                // Usamos la clase mysqli para inicializar una nueva conexión a la base de datos
                $this->conexion = new mysqli(
                    $this->hostname,        // hostname -> La IP donde se encuentra el SGBD
                    $this->usuario,         // usuario -> El usuario de la BDD
                    $this->contrasena,      // contrasena -> La contrasena de la BDD
                    $this->base_de_datos,   // nombre de la base de datos
                    $this->port             // puerto de la base de datos
                );
                // Verificar si hay errores en la conexión
                if ($this->conexion->connect_error) {
                    die("Error de conexión: " . $this->conexion->connect_error); // die -> terminate the current script:
                }

                return $this->conexion; // Devolvemos la conexión a la base de datos

            } catch (Exception $e) {
                die("Error interno de la aplicación: ". $e->getMessage());
            }
        }

        // Método para desconectar de la base de datos
        public function desconectar()    {
            if ($this->conexion) {
                $this->conexion->close();
            }
        }

    }

?>