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

    }

?>