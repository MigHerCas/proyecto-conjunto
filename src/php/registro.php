<?php
    
    require_once '../dist/init.php';
    require_once '../dist/validacion.php';

    // Variables de los campos del formulario
    $nombre = "";
    $apellidos = "";
    $email = "";
    $telefono = "";
    $edad = "";

    // Si se envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $validacion = validarFormulario( $_POST );
        
        // Si la validación es correcta, no hay ningún mensaje de error en el array
        if ( empty( $validacion ) ) {

            // Comprobamos si hay algún usuario registrado con ese email
            if ( Usuario::comprobarUsuario( $conexion, 1, $_POST ) !== null ) {
                // Si ya hay algún usuario registrado con ese email
                $repetido = true;

            } else {
                // Si no hay algún usuario registrado con ese email

                // Registramos el usuario con el método estático de la clase Usuario
                if ( Usuario::registrar( $conexion, $_POST) ) {
                    // Si todo va bien, avanzamos a la página main.php
                    // header("Location: listado.php");
                } else {
                    $error_registro = "Error en el registro. El usuario puede estar ya registrado.";
                }
            }

        } else {
            // Mantenemos los campos anteriores
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $edad = $_POST['edad'];
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="author" content="David Fernandez" />
    <meta name="author" content="Ruben Portugal" />
    <meta name="author" content="Alvaro Rodriguez" />
    <meta name="author" content="Miguel Hernanz" />
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/formularios.css" />
</head>
<body>
    <main>
        <h1>Vallagame</h1>
        <form action="#" method="POST">
            <h2>Registro</h2>
            <div class="inputs-container">
                <input type="text" name="nombre" placeholder="Nombre" value="<?= $nombre?>" />
            
                <input type="text" name="apellidos" placeholder="Apellidos" value="<?= $apellidos?>" />
                
                <input type="text" name="email" placeholder="Email" value="<?= $email?>" />
                
                <input type="number" name="telefono"  placeholder="Telefono" value="<?= $telefono?>"/>
                <input type="number" name="edad" id="edad" placeholder="Edad" value="<?= $edad?>"/>

                <input type="password" name="password"  placeholder="Contraseña" />
                <button class="animado">Enviar</button>
            </div>
            
            
            <ul class="errores-formulario">      
                <?php if ( isset( $validacion ) ): ?>
                    <?php foreach ($validacion as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if ( isset( $error_registro ) ): ?>
                    <li><?= $error_registro ?></li>
                <?php endif; ?>

                <?php if ( isset( $repetido ) ): ?>
                    <li>Ya hay un usuario registrado con ese email</li>
                <?php endif; ?>
            </ul>
            <a id="login" href="login.php">Volver</a>

        </form>
    </main>    
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