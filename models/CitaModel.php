<?php

    class CitaModel {

        private $nombreTabla = "citas";
        private $conexion;

        public function __construct() {
            
        }


        public function insertCita($id, $descripcion, $fechaCita, $cliente, $tatuador) {

            // CONECTARSE A LA BASE DE DATOS
            /* 
            1º NECESITAMOS SABER LOS PARÁMETROS DE CONEXIÓN A LA BASE DE DATOS 
            - puerto
            - nombre de la base de datos
            - usuario
            - contraseña
            - IP (localhost o la IP que sea)
            */
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $bd = "tattoos_bd";
            $port = "3306";
            $this->conexion = new mysqli($hostname, $username, $password, $bd, $port); // mysqli es una clase que contiene métodos para interactuar con la BDD

            // COMPROBAR SI LA CONEXIÓN SE HA REALIZADO CORRECTAMENTE
            if ($this->conexion->connect_error) {

                die("Error de conexión: ". $this->conexion->connect_error);

            }

            // INSERTAR EN LA BASE DE DATOS
            /*
            2º UNA SENTENCIA SQL
            INSERT INTO citas (id, descripcion, fecha_cita, cliente, tatuador) VALUES ($id, $descripcion, $fechaCita, $cliente, $tatuador);
            */
            $sql = "INSERT INTO $this->nombreTabla (id, descripcion, fecha_cita, cliente, tatuador) VALUES (?, ?, ?, ?, ?);";

            $stmt = $this->conexion->prepare($sql);

            $stmt->bind_param("sssss", $id, $descripcion, $fechaCita, $cliente, $tatuador); // "Bindear" unir cada parametro a su interrogación. "qué tipo de datos vamos a intercambiar", "los datos en si"

            /*
            3º EJECUTAR LA SENTENCIA SQL
            */
            try {

                if($stmt->execute()) { // EXECUTE DEVUELVE UN TRUE O FALSE -> SI HA SIDO EXITOSA LA OPERACIÓN O NO
                    return true;
                } else {
                    return false;
                }    

            } catch(Exception $e) {

                return false;

            } finally {

                $this->cerrarConexion();

            }
            
        }

        public function cerrarConexion() {

            /*
            4º CERRAR LA CONEXIÓN
            */
            $this->conexion->close();

        }

    }

?>
