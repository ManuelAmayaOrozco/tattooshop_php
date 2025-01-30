<?php

    require_once "./models/TatuadorModel.php";

    class TatuadorController {

        private $tatuadorModel;

        public function __construct() {
            $this->tatuadorModel = new TatuadorModel();
        }

        public function showAltaTatuador($errores = []) {
            require_once "./views/tatuadoresViews/AltaTatuadorView.php";
        }

        public function insertCita($datos = []) {

            $input_nombre = $datos["input_nombre"] ?? "";
            $input_email = $datos["input_email"] ?? "";
            $input_password = $datos["input_password"] ?? "";
            $input_foto = $datos["input_foto"] ?? "";

            $errores = [];

            if ($input_nombre == "" || $input_email == "" || $input_password == "" || $input_foto == "") {

                // COMPROBAR QUÉ CAMPO ESTÁ VACÍO Y LO AÑADAIS A UN ARRAY DE ERRORES
                if($input_nombre == "") {
                    $errores["error_nombre"] = "El campo nombre es obligatorio";
                }
                
                if($input_email == "") {
                    $errores["error_email"] = "El campo email es obligatorio";
                }

                if($input_password == "") {
                    $errores["error_password"] = "El campo password es obligatorio";
                }

                if($input_foto == "") {
                    $input_foto = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png";
                }

            }

            if (!empty($errores)) {

                $this->showAltaTatuador($errores);

            } else {

                $operacionExitosa = $this->tatuadorModel->insertTatuador($input_nombre, $input_email, $input_password, $input_foto);

                if($operacionExitosa) {

                    require_once "./views/tatuadoresViews/AltaTatuadorCorrectoView.php";

                } else {

                    $errores["error_db"] = "Error al insertar la cita, inténtelo de nuevo más tarde.";
                    $this->showAltaCita($errores);

                }

            }

        }

    }

?>