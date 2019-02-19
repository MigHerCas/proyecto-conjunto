
<?php

    require_once './clases/Database.php';
    require_once './clases/Usuario.php';
    require_once './clases/Videojuego.php';
    
    $conexion = Database::crearConexion();

    session_start();
?>