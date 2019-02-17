<?php
    if(isset($_REQUEST['registro'])){
        include("init.php");
        $sql="SELECT * FROM usuario";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <form action="#" method="post">
        <p><input type="text" name="nombre" id="nombre" placeholder="Nombre"></p>
        <p><input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"></p>
        <p><input type="email" name="email" id="email" placeholder="E-Mail"></p>
        <p><input type="number" name="telefono" id="telefono" placeholder="Telefono"></p>
        <p><input type="number" name="edad" id="edad" placeholder="Edad"></p>
        <p><input type="text" name="direccion" id="direccion" placeholder="Dirección"></p>
        <p><input type="password" name="password" id="password" placeholder="Contraseña"></p>
        <p><input type="password" name="password2" id="password2" placeholder="Repita contraseña"></p>
        <p><button>Registrarse</button></p>
    </form>
</body>
</html>