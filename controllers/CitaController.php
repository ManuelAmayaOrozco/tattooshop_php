<?php

    require_once "./models/tatuadorModel.php";
    require_once "./models/CitaModel.php";

    class CitaController {

        /*
        ATRIBUTOS DE CLASE.
        En este caso tenemos CitaModel -> Para poder acceder a la Base de Datos
        */
        private $citaModel;

        private $tatuadorModel;

        /*
        CONSTRUCTOR DE CLASE
        El constructor de clase lo utilizamos para inicializar el atributo
        $citaModel.
        */
        public function __construct() {
            $this->citaModel = new CitaModel();
            $this->tatuadorModel = new TatuadorModel();
        }

        /**
         * Método para mostrar el view de AltaCita -> Contiene la página para dar de alta una cita
         */
        public function showAltaCita($errores = []) {

            $tatuadores = $this->tatuadorModel->leerTatuadores();

            require_once "./views/citasViews/AltaCitaView.php";

        }

        public function insertCita($datos = []) {

            // EXTRAER LOS DATOS DEL FORMULARIO Y ALMACENARLOS EN VARIABLES
            $input_id = $datos["input_id"] ?? "";
            $input_descripcion = $datos["input_descripcion"] ?? "";
            $input_fecha_cita = $datos["input_fecha_cita"] ?? "";
            $input_cliente = $datos["input_cliente"] ?? "";
            $input_tatuador = $datos["input_tatuador"] ?? "";

            // COMPROBAR SI LOS DATOS DEL FORMULARIO SON CORRECTOS -> SI NO VIENEN VACIOS
            $errores = [];

            if ($input_id == "" || $input_descripcion == "" || $input_fecha_cita == "" || $input_cliente == "" || $input_tatuador == "") {

                // COMPROBAR QUÉ CAMPO ESTÁ VACÍO Y LO AÑADAIS A UN ARRAY DE ERRORES
                if($input_id == "") {
                    $errores["error_id"] = "El campo id es obligatorio";
                }
                
                if($input_descripcion == "") {
                    $errores["error_descripcion"] = "El campo descripción es obligatorio";
                }

                if($input_fecha_cita == "") {
                    $errores["error_fecha_cita"] = "El campo fecha cita es obligatorio";
                }

                if($input_cliente == "") {
                    $errores["error_cliente"] = "El campo cliente es obligatorio";
                }

                if($input_tatuador == "") {
                    $errores["error_tatuador"] = "El campo tatuador es obligatorio";
                }

            }

            if (!empty($errores)) {

                $this->showAltaCita($errores);

            } else {

                // REGISTRAMOS LA CITA
                // PARA REGISTRAR LA CITA NECESITAMOS ACCEDER A LA BASE DE DATOS -> NECESITAMOS LLAMAR A UN MÉTODO QUE ACCEDA A LA BASE DE DATOS
                // ¿A QUÉ CLAE LLAMAMOS? -> CitaModel.php
                // ¿A QUÉ MÉTODO DE LA CLASE LLAMAMOS? -> insertCita($datosDeLaCita)
                $fecha_cita_formated = date("Y-m-d H:i:s", strtotime($input_fecha_cita));
                $operacionExitosa = $this->citaModel->insertCita($input_id, $input_descripcion, $fecha_cita_formated, $input_cliente, $input_tatuador);

                if($operacionExitosa) {

                    // LLAMAR A UNA PÁGINA QUE MUESTRE EL MENSAJE DE ÉXITO
                    $tatuadores = $this->tatuadorModel->leerTatuadores();

                        foreach ($tatuadores as $tat) {

                            if ($tat["nombre"] == $input_tatuador) {

                                $tatuadorNombre = $input_tatuador;
                                $tatuadorEmail = $tat["email"];
                                $tatuadorFoto = $tat["foto"];
                                break;

                            }

                        }

                    require_once "./views/citasViews/CitaConfirmacionView.php";

                } else {

                    // LLAMAR A ALGÚN SITIO Y MOSTRAR UN MENSAJE DE ERROR
                    $errores["error_db"] = "Error al insertar la cita, inténtelo de nuevo más tarde.";
                    $this->showAltaCita($errores);

                }

            }


        }


    }

?>