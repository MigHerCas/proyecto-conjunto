
<?php
    

    /* Función para comprobar la clave introducida, de 4 a 8 dígitos*/
    function comprobarClave($clave) {
        $expClave = "/^\w{5,10}$/i"; 
        
        if ( !preg_match($expClave, $clave) ) {
            return 'La contraseña necesita un mínimo de 5 caracteres.';
        } 

        return null;
    }

    // Función para comprobar el nombre introducido
    function validarNombre($nombre) {
        if ( !empty($nombre) ) {
            $patron = "/^[A-Za-z]+$/";
            if (!preg_match($patron, $nombre)) {
                return 'Estructura del nombre incorrecta';
            } 
        }
        return null;
    }

    // Función para comprobar los apellidos introducidos
    function validarApellidos($apellidos) {
        if ( !empty($apellidos) ) {
            $patron = "/^[a-z ,.'-]+$/i";
            if (!preg_match($patron, $apellidos)) {
                return 'Estructura de los apellidos incorrecta';
            } 
        }
        return null;
    }

    // Función para comprobar el email introducido
    function validarEmail($email) {
        if ( !empty($email) ) {
            $patron = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
            if (!preg_match($patron, $email)){
                return 'Email no válido.';
            }
        }
        return null;
    }

    // Función para comprobar el telefono introducido
    function validarTelefono($telefono) {
        if (preg_match("/\w+/", $telefono) && !preg_match("/\d{9,9}/", $telefono)) {
                return "El téfono debe contener 9 dígitos.";
        } else {
            return null;
        }
    }

    // Función para comprobar la direccion introducida
    function validarDireccion( $direccion ) {
        if ( !empty($direccion) ) {
            $patron = "/^[a-z0-9 .\-]+$/i";
            if (!preg_match($patron, $direccion)) {
                return 'Formato de la dirección incorrecta';
            } 
        }
        return null;
    }

    // Función para comprobar la edad
    function validarEdad($edad) {
        if (preg_match("/^[0-99]{1,2}$/", $edad) && !preg_match("/\d{1,2}/", $edad)) {
                return "Edad incorrecta.";
        } else {
            return null;
        }
    }

?>
