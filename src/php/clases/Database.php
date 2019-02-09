<?php

    class Database {

        public static function crearConexion() {
            $host = "127.0.0.1";
            $user = "administrador";
            $pass = "administrador";
            $name = "vallagame";

            $conexion = mysqli_connect($host, $user, $pass, $name);

            if ($conexion->connect_errno) {
                return false;
            }
            return $conexion;
        }

    }

?>