<?php

    require_once '../dist/init.php';

    if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada'] == true) {  

        if ($_SERVER['REQUEST_METHOD'] === "GET") {

            if ( isset( $_GET['cod'] ) ) {
                $codigo = $_GET['cod'];
                // Cargamos el videojuego seleccionado
                $info = Videojuego::cargarInfoVideojuego( $conexion, $codigo );

                $_SESSION['info'] = $info;

            } else {
                header("Location: login.php");
            }

        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $correcto = Videojuego::alquilar( $conexion, $_SESSION['id_usuario'], $_POST['id']);

            $disponible = Videojuego::comprobarEstado( $conexion, $_POST['id']);

            if ( $correcto ) {

                if ( $disponible['disponible'] === 1 ) {
                    Videojuego::actualizar( $conexion, 0, $_POST['id']);
                } elseif ( $disponible['disponible'] === 0 ) {
                    Videojuego::actualizar( $conexion, 1, $_POST['id']);
                }
            }
        }   

    } else {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Juego</title>
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/layout.css" />
    <link rel="stylesheet" href="../styles/fichas.css" />
</head>
<body>
    <aside class="operaciones">
        <div class="cabecera">
            <img src="../assets/imgs/logo.png" alt="Imagen logo" />
            <h2>Ficha del juego</h2>
        </div>
        <div class="vacio"></div>
        <div class="control">
            <a href="listado.php">INICIO</a>
            <a href="cerrarSesion.php">CERRAR SESIÓN</a>
        </div>
    </aside>
    <main>
        <div class="ficha">
            <div class="caratula">
                <img src="../assets/<?= $_SESSION['info'][0]['id_img']?>" alt="Caratula juego" />
            </div>

            <div class="tecnica">
                <h1>Ficha técnica</h1>
                <div id="nombre">
                    <h3>Nombre</h3>
                    <p><?= $_SESSION['info'][0]['titulo']?></p>
                </div>
                <div id="valoracion">
                    <h3>Valoracion</h3>
                    <p><?= $_SESSION['info'][0]['valoracion']?></p>
                </div>
                <div id="genero">
                    <h3>Género</h3>
                    <p><?= $_SESSION['info'][0]['genero']?></p>
                </div>
                <div id="pegi">
                    <h3>Edad</h3>
                    <p><?= $_SESSION['info'][0]['pegi']?></p>
                </div>
                <div id="multi">
                    <h3>Multijugador</h3>
                    <p><?= $_SESSION['info'][0]['multijugador']?></p>
                </div>
                <div id="plataforma">
                    <h3>Plataforma</h3>
                    <p>
                    <?php
                        $nombre;
                        switch ( $_SESSION['info'][0]['id_plataforma'] ) {
                            case 1:
                                $nombre = 'NINTENDO';
                                break;
                            case 2:
                                $nombre = 'PS4';
                                break;
                            case 3:
                                $nombre = 'XBOX ONE';
                                break;
                        } ?>
                        <?= $nombre ?>
                    </p>
                </div>
                <div id="descr">
                    <h3>Descripcion</h3>
                    <p><?= $_SESSION['info'][0]['ficha_tecnica']?></p>
                </div>
            </div>
            <div class="alquilar">
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $_SESSION['info'][0]['id_videojuego']?>" />

                    <?php if ( isset($disponible['disponible']) && $disponible['disponible'] == 1 ): ?>
                        <button id="alquilar">ALQUILAR</button>
                    <?php elseif (  isset($disponible['disponible']) && $disponible['disponible'] == 0 ): ?>
                        <button id="devolver">DEVOLVER</button>
                    <?php else: ?>
                        <button id="alquilar">ALQUILAR</button>
                    <?php endif; ?>
                </form>
            </div>
    </main>
</body>
</html>