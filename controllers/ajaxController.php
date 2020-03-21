<?php 
    require_once '../models/Formulario.php';
    require_once 'formController.php';
    Class AjaxController{
        static public function registrarUsuario(){
            $respuesta = FormController::getRegistro();
            return $respuesta;
        }

        static public function loguinUsuario(){
            $respuesta = FormController::getIngreso();
            return $respuesta;
        }

        static public function obtenerUsuarios(){
            $repuesta = FormController::getRegistros();
            return $repuesta;
        }
        static public function actualizarUsuario(){
            $respuesta = FormController::actualizarRegistro();
            return $respuesta;
        }

        static public function eliminarUsuario(){
            $respuesta = FormController::eliminarRegistro();
            return $respuesta;
        }
    }

    // Escoger la funcion a realizar
    $funciones = get_class_methods(new AjaxController());
    foreach ($funciones as $funcion) {
        if($funcion == $_POST['action']){
            die(json_encode(AjaxController::$funcion()));
        }
    }
?>