<?php
    require_once 'Conexion.php';
    Class Formulario{
        static public function registrar($tabla,$datos){
            try {
                $query = "INSERT INTO $tabla (nombre,correo,password) VALUES (?,?,?)";
                $stmt = Conexion::conectar()->prepare($query);
                $stmt->bindParam(1,$datos['nombre'],PDO::PARAM_STR);
                $stmt->bindParam(2,$datos['email'],PDO::PARAM_STR);
                $stmt->bindParam(3,$datos['password'],PDO::PARAM_STR);
                
                $result = $stmt->execute();
                if($result){
                    return 'ok';
                }else{
                    return 'error';
                }

            } catch (PDOException $e) {
                echo 'Error: '.$e-getMessage();
            }

            // $stmt->close();
            $stmt = null;
        }

        static public function obtenerRegistros($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        static public function obtenerRegistro($tabla,$item,$valor){
            $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla WHERE $item = ? ");

            $stmt->bindParam(1,$valor,PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        }

        static public function actualizarRegistro($tabla,$datos){
            try {
                $query = "UPDATE  $tabla SET nombre = ?, correo = ?, password = ? WHERE id = ?";
                $stmt = Conexion::conectar()->prepare($query);
                $stmt->bindParam(1,$datos['nombre'],PDO::PARAM_STR);
                $stmt->bindParam(2,$datos['email'],PDO::PARAM_STR);
                $stmt->bindParam(3,$datos['password'],PDO::PARAM_STR);
                $stmt->bindParam(4,$datos['id'],PDO::PARAM_INT);
                
                $result = $stmt->execute();
                if($result){
                    return 'ok';
                }else{
                    return 'error';
                }

            } catch (PDOException $e) {
                echo 'Error: '.$e-getMessage();
            }

            // $stmt->close();
            $stmt = null;
        }

        static public function eliminarRegistro($tabla,$valor){
            try {
                $query = "DELETE FROM $tabla WHERE id = ?";
                $stmt = Conexion::conectar()->prepare($query);
                $stmt->bindParam(1,$valor,PDO::PARAM_INT);
     
                $result = $stmt->execute();
                if($result){
                    return 'ok';
                }else{
                    return 'error';
                }

            } catch (PDOException $e) {
                echo 'Error: '.$e-getMessage();
            }

            // $stmt->close();
            $stmt = null;
        }
    }
?>