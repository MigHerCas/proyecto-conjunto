<?php

  
    require_once '../dist/init.php';
    require_once '../dist/validacion.php';    

    // Variables de los campos del formulario
    $email = "";

    // Si se envía el formulario
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $validacion = validarFormulario( $_POST );

        
        // Si la validación es correcta
        if ( empty( $validacion ) ) {
            
            // Comprobamos que no haya ningún usuario registrado con ese NIF
            $comprobacion = Usuario::comprobarUsuario( $conexion, 2, $_POST );
            

            if ( $comprobacion !== null ) {
                // Si hay algún usuario coincide 
                // Guardamos los datos e iniciamos sesión
                $_SESSION['sesion_iniciada'] = true;
                $_SESSION['email'] = $comprobacion['email'];
                
                header("Location: listado.php");
            } else {
                // Si no hay ningún usuario que coincida 
                $email = $_POST['email'];
                $errorLogin = 'Email o contraseña incorrectos';
            }

        } 

    }

?>  

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            <input type="text" name="email" placeholder="Email" value="<?= $email?>" />
        </p>
        <p>
            <input type="password" name="password" placeholder="Contraseña" />
        </p>
        <p>
            <button>Enviar</button>
        </p> 
    </form>
</body>
</html>



<?php
    // Función para validar el formulario
    function validarFormulario( $campos ) {
        
        $estadoEmail;
        $estadoContraseña;

        $errores = array();

        // Aquí validamos todos los campos 

        // Email
        $estadoEmail = validarEmail( $campos['email'] );
        
        if ( $estadoEmail !== null) {
            // Si no es correcto
            array_push( $errores, $estadoEmail );
        } 
        
        // Contraseña
        $estadoContraseña = comprobarClave( $campos['password'] );
        
        if ( $estadoContraseña !== null) {
            array_push( $errores, $estadoContraseña );
        }

        return $errores;
    }


?>

