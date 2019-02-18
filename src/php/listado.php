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
    flex: 1;
    min-height: 12em;
    max-height: 12em;
    display: flex;
    flex-direction: row;
    background-color: #ebebeb;
    border-radius: 5px;
    align-items: center;
}

.item:not(:last-child) {
    margin-bottom: 15px;
}

.item-img-container {
    height: 9em;
    flex: 1 0 auto;
}

.item-img-container img {
    width: 7em;
    height: 10em;
    margin-right: 10px;
    margin-left: 2em;
}   

.item-description {
    flex: 10 0 auto;
}

.item-description h3 {
    margin-bottom: 0;

}

.item-description h3 label {
    margin-left: 3em;
}

.item-description p {
    margin-top: 10px;
}

.valoracion {
    flex: 1 0 auto;
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
                        <?php print "<img src='../assets/".$array[1]."' alt='Imagen Videojuego' />"; ?>
                    </div>
                    <div class="item-description">
                        <h3><?= $array[0]?> <label>Valoración: <?= $array[3] ?></label></h3>
                        <p></span>Género: <span><?= $array[2] ?></p>
                        <p></span>Pegi <span><?= $array[4] ?></p>
                        <p></span>Max Jugadores: <span><?= $array[5] ?></p>
                        <p></span>Plataforma: <span><?= $array[6] ?></p>
                    </div>
                </li>    
            <?php } ?>
    </ul>
    </main>
</body>
</html>