<?php

    require_once '../dist/init.php';

    if (isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada'] == true) {

        // Cargamos los videojuegos
        $videojuegos = Videojuego::cargarVideojuegos( $conexion );

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
                    <label>GÉNERO</label>
                    <select name="genero">
                        <option value=""></option>
                        <option value="">Shooter</option>
                        <option value="">Acción</option>
                    </select>
                </div>

                <div>
                    <label>EDAD</label>
                    <select name="edad">
                        <option value=""></option>
                        <option value="">3</option>
                        <option value="">7</option>
                        <option value="">12</option>
                        <option value="">16</option>
                        <option value="">18</option>
                    </select>
                </div>

                <div>
                    <label>PLATAFORMA</label>
                    <select name="genero">
                        <option value=""></option>
                        <option value="">PS4</option>
                        <option value="">XBOX ONE</option>
                        <option value="">NINTENDO</option>
                    </select>
                </div>

                <div>
                    <button class="animado">BUSCAR</button>
                </div>
            </form>
        </div>
        <div class="control">
            <a href="listado.php">INICIO</a>
            <a href="">CERRAR SESIÓN</a>
        </div>
    </aside>
    <main>
        <ul class="listado">
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
                                <?= $videojuego['id_plataforma'] ?>
                            </li>
                        </ul>
                        <form action="juego.php" method="GET">
                            <input type="text" name="cod" hidden="true" value="<?= $videojuego['id_videojuego'] ?>" />
                            <button class="animado">Ficha</button>
                        </form>
                    </div>
                </li>        
            <?php endforeach; ?>

        </ul>
    </main>
</body>
</html>