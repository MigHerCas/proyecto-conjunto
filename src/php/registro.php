<?php
    
    require_once '../dist/init.php';
    require_once '../dist/validacion.php';

    // Variables de los campos del formulario
    $nombre = "";
    $apellidos = "";
    $email = "";
    $telefono = "";
    $edad = "";
    $direccion = "";

    // Si se envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $validacion = validarFormulario( $_POST );
        echo var_dump( $validacion);
        echo var_dump( $_POST);
        
        // Si la validación es correcta, no hay ningún mensaje de error en el array
        if ( empty( $validacion ) ) {

            // Registramos el usuario con el método estático de la clase Usuario
            if ( Usuario::registrar( $conexion, $_POST) ) {
                // Si todo va bien, avanzamos a la página main.php
                // header("Location: listado.php");
            } else {
                $error_registro = "Error en el registro. El usuario puede estar ya registrado.";
            }

        } else {
            // Mantenemos los campos anteriores
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $edad = $_POST['edad'];
            $direccion = $_POST['direccion'];
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registro</title>
</head>
<body>
    <form action="#" method="POST">
        <p>
            <input type="text" name="nombre" placeholder="Nombre" value="<?= $nombre?>" />
        </p>
        <p>
            <input type="text" name="apellidos" placeholder="Apellidos" value="<?= $apellidos?>" />
        </p>
        <p>
            <input type="email" name="email" placeholder="Email" value="<?= $email?>" />
        </p>
        <p>
            <input type="number" name="telefono"  placeholder="Telefono" value="<?= $telefono?>"/>
        <p>
            <input type="number" name="edad" id="edad" placeholder="Edad" value="<?= $edad?>"/>
        <p>
            <input type="text" name="direccion"  placeholder="Dirección" value="<?= $direccion?>" />
        <p>
            <input type="password" name="password"  placeholder="Contraseña" />
        <!-- <p>
            <input type="password" name="password2"  placeholder="Repita contraseña" />
        <p> -->
        <p>
            <button>Registrarse</button>
        </p>
    </form>
</body>
</html>

<?php
    // Función para validar el formulario
    function validarFormulario( $campos ) {
        
        $estadoNombre;
        $estadoApellidos;
        $estadoContraseña;
        $estadoEmail;
        $estadoTelefono;
        $estadoDireccion;
        $estadoEdad;

        $errores = array();

        // Aquí validamos todos los campos 

        // Nombre
        $estadoNombre = validarNombre( $campos['nombre'] );
        
        if ( $estadoNombre !== null) {
            array_push( $errores, $estadoNombre );
        }

        // Apellidos
        $estadoApellidos = validarApellidos( $campos['apellidos'] );
        
        if ( $estadoApellidos !== null) {
            array_push( $errores, $estadoApellidos );
        }

        // Email
        $estadoEmail = validarEmail( $campos['email'] );
        
        if ( $estadoEmail !== null) {
            array_push( $errores, $estadoEmail );
        }

        // Telefono
        $estadoTelefono = validarTelefono( $campos['telefono'] );

        if ( $estadoTelefono !== null ) {
            array_push( $errores, $estadoTelefono );
        }

        // Direccion
        $estadoDireccion = validarDireccion( $campos['direccion'] );

        if ( $estadoDireccion !== null ) {
            array_push( $errores, $estadoDireccion );
        }

        // Edad
        $estadoEdad = validarEdad( $campos['edad'] );

        if ( $estadoEdad !== null ) {
            array_push( $errores, $estadoEdad );
        }

        // Contraseña
        $estadoContraseña = comprobarClave( $campos['password'] );
        
        if ( $estadoContraseña !== null) {
            array_push( $errores, $estadoContraseña );
        }

        // Devolvemos los posibles errores
        return $errores;

    }
    

?>