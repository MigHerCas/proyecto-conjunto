<?php

    require_once '../dist/init.php';

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
</head>
<style>
    .listado {
    min-height: 100%;
    max-height: 100%;
    overflow: auto;
    width: 85%;
    margin: 0 auto;
    list-style: none;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
}

.item {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr 2fr;
    grid-template-areas: 
        "caratula juego juego juego"
        "caratula descripcion descripcion1 botones";
    min-height: 12em;
    max-height: 12em;
    background-color: #ebebeb;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    align-items: center;
}

.item:not(:last-child) {
    margin-bottom: 15px;
}

.item-img-container {
    height: 10em;
    grid-area: caratula;
}

.item-img-container img {
    width: 7.5em;
    height: 10em;
    margin-right: 10px;
    margin-left: 2em;
}   

.item-description {
    grid-area: descripcion;
}
.item-description1 {
    grid-area: descripcion1;
}
.item-botones {
    grid-area: botones;
}
.item-titulo{
    grid-area: juego;
}


.item-titulo h3 {
    margin-bottom: 0;
}

.item-titulo h3 label {
    margin-left: 3em;
}

.item-description p {
    margin-top: 10px;
}
</style>
<body>
    <div class="titulo">
        <h1>VallaGame</h1>
    </div>
    <aside class="usuario">
    
    </aside>
    <aside class="operaciones">
    
    </aside>
    <main class="wrapper">
    <ul class="listado">
        <?php
            $query = "SELECT v.titulo, v.id_img, v.genero, v.valoracion, v.pegi, v.multijugador, p.nombre from videojuego v left outer join plataforma p on v.id_plataforma=p.id_plataforma";
            $resul = $conexion->query($query);
            while($array = $resul->fetch_row()){
                ?>
                <li class="item">
                    <div class="item-img-container">
                        <img src="<?= '../assets/' . $array[1] ?>" alt="Imagen videojuego" />
                    </div>
                    <div class="item-titulo">
                        <h3><?= $array[0]?></h3>
                    </div>
                    <div class="item-description">
                        <p></span>Género: <span><?= $array[2] ?></p>
                        <p></span>Pegi <span><?= $array[4] ?></p>
                    </div>
                    <div class="item-description1">
                        <p></span>Max Jugadores: <span><?= $array[5] ?></p>
                        <p></span>Plataforma: <span><?= $array[6] ?></p>
                    </div>
                    <div class="item-botones">
                        <h3><label>Valoración: <?= $array[3] ?></label></h3>
                        <p><button>Ver Juego</button></p>
                    </div>
                </li>    
            <?php } ?>
    </ul>
    </main>
</body>
</html>