<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Listado</title>
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/layout.css" />
    <style>
        ul{
            list-style:none;
            padding:0;
        }
        table, th, td {
        border: 1px solid black;
        }
        img{
            width:35%;
            border-radius:30px;
        }
        ul.info-perfil h3{
            display:inline-block;
            width:7em;
        }
    </style>
</head>
<body>
    <div class="titulo"></div>
    <aside class="usuario">
        <h1 class="perfil">Perfil 
            <a href="./perfil.php">
                <img src="../imgs/mandopixel.jpg" alt="mando"/>
            </a>
        </h1>
    </aside>
    <aside class="operaciones">
    
    </aside>
    <main class="wrapper">
    <h1>Perfil</h1>
        <ul class="info-perfil">
            <li><h3>Nombre :</h3><span>asdasd</span></li>
            <li><h3>Apellidos :</h3><span>asdasd</span></li>
            <li><h3>Edad :</h3><span>asdasd</span></li>
            <li><h3>Telefono :</h3><span>asdasd</span></li>
            <li><h3>E-mail :</h3><span>asdasd</span></li>
            <li><h3>Dirección :</h3><span>asdasd</span></li>
        </ul>
        <table>
            <thead>
                <th>Id. prestamo </th>
                <th>Juego </th>
                <th>Fecha de alquiler </th>
                <th>Fecha de entrega </th>
                <th>Entregar</th>
            </thead>
            <tbody>
                <?php
                
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>