<?php

    require_once "./database/DBHAndler.php";

    class TatuadorModel {

        private $nombreTabla = "tatuadores";
        private $conexion;
        private $dbHandler;

        public function __construct() {
            $this->dbHandler = new DBHandler("localhost","root","","tattoos_bd","3306");
        }

        public function insertTatuador($nombre, $email, $password, $foto) {

            $this->conexion = $this->dbHandler->conectar();

            $sql = "INSERT INTO $this->nombreTabla (nombre, email, password, foto) VALUES (?, ?, ?, ?)";

            $stmt = $this->conexion->prepare($sql);

            $stmt-> bind_param("ssss", $nombre, $email, $password, $foto);

            try {
                return $stmt->execute(); // EXECUTE DEVUELVE UN TRUE O FALSE -> SI HA SIDO EXITOSA LA OPERACION O NO
            } catch(Exception $e) {
                return false;
            } finally {
                $this->dbHandler->desconectar(); // USAMOS FINALLY PARA ASEGURARNOS QUE HEMOS CERRADO LA CONEXIÓN A LA BASE DE DATOS
            }

        }

        public function leerTatuadores() {

            $this->conexion = $this->dbHandler->conectar();

            $sql = "SELECT * FROM $this->nombreTabla";

            $stmt = $this->conexion->prepare($sql);

            $stmt->execute();
            $resultado = $stmt->get_result();

            $tatuadores = [];
            while ($fila = $resultado->fetch_assoc()) {

                $tatuadores[] = $fila;

            }

            return $tatuadores;

        }

    }

?>