<?php

    require_once '../dist/init.php';

    if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada'] == true) {

        $vacio = false;

        // Cargamos los videojuegos
        $videojuegos = Videojuego::cargarVideojuegos( $conexion );

        if ( $_SERVER['REQUEST_METHOD'] === "GET" ) {
            // echo var_dump( $_GET);
            if ( isset( $_GET['filtro'] ) ) {
                $genero = $_GET['genero'];
                $edad = $_GET['edad'];
                $plataforma = $_GET['plataforma'];

                $videojuegos = Videojuego::filtrarVideojuegos( $conexion, $_GET );
                
                // echo var_dump( $videojuegos);


                if ( $videojuegos === null ) {
                    $vacio = true;
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
    <meta name="author" content="David Fernandez" />
    <meta name="author" content="Ruben Portugal" />
    <meta name="author" content="Alvaro Rodriguez" />
    <meta name="author" content="Miguel Hernanz" />
    <title>Listado</title>
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/layout.css" />
    <link rel="stylesheet" href="../styles/listado.css" />
</head>
<body>
    <aside class="operaciones">
        <div class="cabecera">
            <img src="../assets/imgs/logo.png" alt="Imagen logo" />
            <h2>Listado</h2>
        </div>
        <div class="filtrado">
            <form method="GET">
                <div>
                    <input type="hidden" name="filtro" value="true" />
                    <label>GÉNERO</label>
                    <select name="genero">
                        <option value=""></option>
                        <option value="Shooter">Shooter</option>
                        <option value="Terror">Terror</option>
                        <option value="Lucha">Lucha</option>
                        <option value="SandBox">SandBox</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Conduccion">Conduccion</option>
                        <option value="Deportes">Deportes</option>
                        <option value="Carreras">Carreras</option>
                        <option value="Plataformas">Plataformas</option>
                    </select>
                </div>

                <div>
                    <label>EDAD</label>
                    <select name="edad">
                        <option value=""></option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                    </select>
                </div>

                <div>
                    <label>PLATAFORMA</label>
                    <select name="plataforma">
                        <option value=""></option>
                        <option value="1">NINTENDO</option>
                        <option value="2">PS4</option>
                        <option value="3">XBOX ONE</option>
                    </select>
                </div>

                <div>
                    <button class="animado">BUSCAR</button>
                </div>
            </form>
        </div>
        <div class="control">
            <a href="listado.php">INICIO</a>
            <a href="cerrarSesion.php">CERRAR SESIÓN</a>
        </div>
    </aside>
    <main>
        <ul class="listado">

            <?php if ( isset( $vacio) && $vacio === false ): ?>
                <?php foreach( $videojuegos as $videojuego ): ?>
                    <li class="item">
                        <div class="img-container">
                            <img src="../assets/<?= $videojuego['id_img'] ?>" alt="Imagen caratula" />
                        </div>
                        <div class="descripcion">
                            <h3><?= $videojuego['titulo'] ?></h3>
                            <ul class="info-juego">
                                <li id="edad">
                                    PEGI <?= $videojuego['pegi'] ?>
                                </li>
                                <li id="plataforma">
                                    <?php
                                    $nombre;
                                    switch ( $videojuego['id_plataforma'] ) {
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
                                </li>
                            </ul>
                            <form action="juego.php" method="GET">
                                <input type="text" name="cod" hidden="true" value="<?= $videojuego['id_videojuego'] ?>" />
                                <button class="animado">Ficha</button>
                            </form>
                        </div>
                    </li>        
                <?php endforeach; ?>
            <?php else: ?>
                <li>No hay ningún juego que coincida con esa búsqueda</li>
            <?php endif; ?>
        </ul>
    </main>
</body>
</html>