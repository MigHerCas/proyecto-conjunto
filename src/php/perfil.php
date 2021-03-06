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
        .titulo>img{
            width:12%;
            float:left;
        }
        a{
            text-decoration:none;
            color:black;
            font-size:150%;
        }
    </style>
</head>
<body>
    <div class="titulo"> <img src="../imgs/logo.png" alt="logo"/><h1>Vallagame</h1></div>
    <aside class="usuario">
        <h1 class="perfil">Perfil 
            <a href="./perfil.php">
                <img src="../imgs/mandopixel.jpg" alt="mando"/>
            </a>
        </h1>
    </aside>
    <aside class="operaciones">
        <ul>
            <li><a href="./listado.php">Inicio</a></li>
            <li> <a href="./cerrarSesion.php">Cerrar sesión</a></li>
        </ul>
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