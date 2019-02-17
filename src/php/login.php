<?php

    include('./clases/Database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="./login.php">
            <legend>
                Login
            </legend>
            <p>
                <input type="text" name="email" id="email" placeholder="Correo electronico" />
            </p>
            <p>
                <input type="password" name="pass" id="pass" placeholder="Contraseña" />
            </p>
            <p>
                <button>Enviar</button>
            </p> 
    </form>
</body>
</html>