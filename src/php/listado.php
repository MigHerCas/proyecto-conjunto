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
    <link rel="stylesheet" href="../styles/listado.css" />
</head>
<body>
    <aside class="operaciones"></aside>
    <main>
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