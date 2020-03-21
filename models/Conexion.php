<?php
    Class Conexion {
        static public function conectar(){

            //Get Heroku ClearDB connection information
            $cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $cleardb_server   = $cleardb_url["host"];
            $cleardb_username = $cleardb_url["user"];
            $cleardb_password = $cleardb_url["pass"];
            $cleardb_db       = substr($cleardb_url["path"],1);
            try {
                $conn = new PDO("mysql:host=$cleardb_server;dbname=$cleardb_db",
                $cleardb_username,$cleardb_password);
                $conn->exec("set names utf8");
            } catch (PDOException $e) {
                echo "Fallo la conexion" . $e->getMessage();  
            }
            return $conn;
        }
    }
?>