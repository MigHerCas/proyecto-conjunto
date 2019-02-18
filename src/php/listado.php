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
    <aside class="operaciones">
        <div class="cabecera">
            <img src="../assets/imgs/logo.png" alt="Imagen logo" />
            <h2>Listado</h2>
        </div>
        <div class="filtrado"></div>
        <div class="control"></div>
    </aside>
    <main>
        <ul class="listado"></ul>
    </main>
</body>
</html>