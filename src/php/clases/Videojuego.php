<?php

    class Videojuego {

        public static function cargarVideojuegos($conexion ) {

            // Obtenemos los videojuegos registrados
            $consulta =  "SELECT *
                FROM videojuego";

            // Ejecutamos la consulta
            $resultado = $conexion->query( $consulta );

            // Ejecutamos la consulta SQL
            if ( $resultado && $resultado->num_rows !== 0 ) {
                
                return $resultado->fetch_all(MYSQLI_ASSOC);
            } 

            return null;
        } 


        public static function cargarInfoVideojuego( $conexion, $codigo ) {

            // Obtenemos los códigos de los pisos preferidos del usuario
            $consulta = 'SELECT *
                         FROM videojuego
                         WHERE id_videojuego = ?';
           

            // Preparamos la consulta
            $statement = $conexion->prepare( $consulta );

            // Pasamos los parámetros
            $statement->bind_param( 's', $codigo );

            // Ejecutamos la consulta SQL
            if ( $statement->execute() ) {
                
                // Filas devueltas
                $resultado = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
                
                // Comprobamos si hay algún usuario que coincida
                if ( $resultado && count($resultado) !== 0 ) {
                    return $resultado;
                } 

            } 

            return null;
        } 

        public static function filtrarVideojuegos( $conexion, $campos ) {

            $consulta = "SELECT * FROM videojuego";

            $primero = true;

            // Si al menos se ha filtrado por un campo
            if ( $campos['genero'] !== "" || $campos['edad'] !== "" || $campos['plataforma'] !== "" ) {

                $consulta = $consulta . " WHERE ";

                if ( $campos['genero'] !== "" ) {
                    $consulta = $consulta . "genero = \"" . $campos['genero'] . "\"";

                    $primero = false;
                } 
                
                if ( $campos['edad'] !== "" ) {

                    if ( $primero === false ) {
                        $consulta = $consulta . " AND ";
                    } 

                    $primero = false;

                    $consulta = $consulta . "pegi = " . $campos['edad'];
                } 
                
                if ( $campos['plataforma'] !== "" ) {

                    if ( $primero === false ) {
                        $consulta = $consulta . " AND ";
                    } 

                    $consulta = $consulta . "id_plataforma = " . $campos['plataforma'];
                } 

            } 

            // Ejecutamos la consulta
            $resultado = $conexion->query( $consulta );

            // Ejecutamos la consulta SQL
            if ( $resultado && $resultado->num_rows !== 0 ) {
                
                return $resultado->fetch_all(MYSQLI_ASSOC);
            } 

            return null;
        }

        public static function alquilar( $conexion, $id_usuario, $id_videojuego ) {

            // Fechas
            $actual = date('Y-m-d');
            $final = date('Y-m-d', strtotime($actual. ' + 10 days'));

            // Insertamos el prestamo
            $instruccion = "INSERT INTO prestamo (id_usuario, id_videojuego, fecha_inicio, fecha_fin)
                VALUES (?, ?, ?, ?)";

            $statement = $conexion->prepare( $instruccion );
            
            $statement->bind_param( 'isss', intval($id_usuario), $id_videojuego, $actual, $final);

            if ( $statement->execute() ) {
                return true;
            }
            return false;
        }

        public static function actualizar( $conexion, $estado, $id_videojuego) {

            // Modificamos el estado del videojuego
            $instruccion = "UPDATE videojuego
                            SET disponible = ?
                            WHERE id_videojuego = ?";

            $statement = $conexion->prepare( $instruccion );
            
            $statement->bind_param( 'is', $estado, $id_videojuego );

            if ( $statement->execute() ) {
                return true;
            }
            return false;
        }

        public static function comprobarEstado($conexion, $id_videojuego) {

            // Obtenemos los videojuegos registrados
            $consulta =  "SELECT disponible
                FROM videojuego
                WHERE id_videojuego = ?";

            // Preparamos la consulta
            $statement = $conexion->prepare( $consulta );

            // Pasamos los parámetros
            $statement->bind_param( 's', $id_videojuego );

            // Ejecutamos la consulta SQL
            if ( $statement->execute() ) {
                
                // Filas devueltas
                $resultado = $statement->get_result()->fetch_assoc();
                
                // Comprobamos si hay algún usuario que coincida
                if ( $resultado !== null ) {
                    return $resultado;
                } 

            } 

            return null;
        } 

    }

?>