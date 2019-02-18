<?php

    class Usuario {
        
        public static function registrar( $conexion, $campos ) {
            
            // Cogemos la contraseña para hacer el md5
            // $campos['password'] = md5( $campos['password'] );

            // SQL para registrar el usuario en la BD
            $instruccion = 'INSERT INTO usuario 
                    (nombre, apellidos, email, telefono, edad, direccion, password)
                    VALUES (?, ?, ?, ?, ?, ?, ?)';

            // La preparamos 
            $statement = $conexion->prepare($instruccion);

            // Pasamos los parámetros
            $statement->bind_param('sssiiss', $campos['nombre'], $campos['apellidos'], $campos['email'], $campos['telefono'], $campos['edad'], $campos['direccion'], $campos['password']);

            // Ejecutamos la instrucción SQL ya completa
            if ( $statement->execute() ) {
                // Si todo ha ido bien, devolvemos true
                return true;
            } 

            // Si no se ha ejecutado, devolvemos false
            return false;
        }

        public static function comprobarUsuario( $conexion, $tipo, $campos ) {

            // Comprobamos si hay un usuario registrado con el DNI
            // $campos['password'] = md5( $campos['password'] );

            // Comprobacion para registro
            if ( $tipo === 1 ) {
                $consulta = 'SELECT * 
                            FROM usuario 
                            WHERE email = ?';
           

                // Preparamos la consulta
                $statement = $conexion->prepare( $consulta );

                // Pasamos los parámetros
                $statement->bind_param('s', $campos['email'] );

                // Ejecutamos la consulta SQL
                if ( $statement->execute() ) {
                    
                    // Filas devueltas
                    $resultado = $statement->get_result()->fetch_assoc();
                    
                    // Comprobamos si hay algún usuario que coincida
                    if ($resultado) {
                        return $resultado;
                    }

                } 

                // Si no hay ningún usuario registrado con ese NIF
                return null;

            } else if ( $tipo === 2 ) {
                // Comprobacion para login
                $consulta = 'SELECT *
                            FROM usuario
                            WHERE email = ? 
                            AND password = ?';
           

                // Preparamos la consulta
                $statement = $conexion->prepare( $consulta );
                
                // Pasamos los parámetros
                $statement->bind_param('ss', $campos['email'], $campos['password']);

                // Ejecutamos la consulta SQL
                if ( $statement->execute() ) {
                    
                    // Filas devueltas
                    $resultado = $statement->get_result()->fetch_assoc();
                    
                    // Comprobamos si hay algún usuario que coincida
                    if ($resultado) {
                        return $resultado;
                    }

                } 

                // Si no hay ningún usuario registrado con ese NIF
                return null;
            }
            
        }

    }
    

?>