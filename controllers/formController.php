<?php
    Class FormController {
         static public function getRegistro(){
            if(isset($_POST['nombre'])){
                $tabla = 'registros';

                $datos = array(
                    'nombre' => $_POST['nombre'],
                    'email' => $_POST['email'],
                    'password' =>$_POST['password']
                );

                $respuesta = Formulario::registrar($tabla,$datos);  

                $resp = array(
                    'respuesta' => $respuesta,
                    'descricion' => 'se inserto con exito'
                );

                return $resp;
            }
        }

        static public function getRegistros(){
            $tabla = 'registros';
            
            $respuesta = Formulario::obtenerRegistros($tabla);

            return $respuesta;
        }

        public function getIngreso(){
            if(isset($_POST['email'])){
                $tabla = 'registros';
                $item = 'correo';
                $valor =$_POST['email'];

                $respuesta = Formulario::obtenerRegistro($tabla,$item,$valor);

                $resp = [];

                if($respuesta){
                    if($respuesta['correo'] == $_POST['email'] && $respuesta['password'] == $_POST['password']){
                        $datos = array(
                            'id' => $respuesta['id'],
                            'nombre' => $respuesta['nombre'],
                            'email' => $respuesta['correo'],
                            'fecha' => $respuesta['fecha']
                        );
                        session_start();
                        $_SESSION['usuario'] = 'ok';
                        
                        $resp = array(
                            'respuesta' => 'ok',
                            'usuario' => $datos
                        );
                    }
                }else{
                    $resp = array(
                        'respuesta' => 'error'
                    );   
                }
                
                return $resp;
            }
        }

        static public function obtenerUsuario($item,$valor){
            $tabla = 'registros';
            $respuesta = Formulario::obtenerRegistro($tabla,$item,$valor);

            return $respuesta;
        }

        public function actualizarRegistro(){
            if(isset($_POST['nombre'])){
                $tabla = 'registros';

                $datos = array(
                    'nombre' => $_POST['nombre'],
                    'email' => $_POST['email'],
                    'password' =>$_POST['password'],
                    'id' => $_POST['id']
                );

                $respuesta = Formulario::actualizarRegistro($tabla,$datos);  
                $resp = array(
                    'respuesta' => $respuesta,
                    'msg' => 'Se actualizo con exito'
                );

                return $resp;
            }
        }

        public function eliminarRegistro(){
            if(isset($_POST['id'])){
                $tabla = 'registros';
                $valor = $_POST['id'];

                $respuesta = Formulario::eliminarRegistro($tabla,$valor);

                $resp = array(
                    'respuesta' => 'ok',
                    'msg' => 'Registro eliminado'
                );
                 
                return $resp;
            }
        }
    }
?>