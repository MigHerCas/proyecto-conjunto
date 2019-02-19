<?php

    require_once '../dist/init.php';

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
            <a href="">CERRAR SESIÓN</a>
        </div>
    </aside>
    <main>
        <div class="ficha">
            <div class="caratula">
                <img src="../assets/imgs/N01.jpg" alt="Caratula juego" />
            </div>

            <div class="tecnica">
                <h1>Ficha técnica</h1>
                <div id="nombre">
                    <h3>Nombre</h3>
                    <p>Lorem</p>
                </div>
                <div id="valoracion">
                    <h3>Valoracion</h3>
                    <p>Lorem</p>
                </div>
                <div id="genero">
                    <h3>Género</h3>
                    <p>Lorem</p>
                </div>
                <div id="pegi">
                    <h3>Edad</h3>
                    <p>Lorem</p>
                </div>
                <div id="multi">
                    <h3>Multijugador</h3>
                    <p>Lorem</p>
                </div>
                <div id="plataforma">
                    <h3>Plataforma</h3>
                    <p>Lorem</p>
                </div>
                <div id="descr">
                    <h3>Descripcion</h3>
                    <p>Lorem</p>
                </div>
            </div>
            <div class="alquilar">
                <form method="POST">
                    <input type="text" name="" value="" hidden="true" />
                    <button id="alquilar">ALQUILAR</button>
                </form>
            </div>
    </main>
</body>
</html>