
<?php

    require_once './clases/Database.php';
    require_once './clases/Usuario.php';
    
    $conexion = Database::crearConexion();

    session_start();
?>