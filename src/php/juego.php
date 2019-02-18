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
        .wrapper{
            display:grid;
            grid-template-columns: auto 1fr;
            padding-top:10px;
            padding-bottom:10px;
        }
        #datos{
            grid-column: 2 / 2;
        }
        #imagen{
            max-width:80%;
            grid-column: 1 / 1;
            display:flex;
            align-items:center;
        }
        #imagen img{
            width:100%;
        }
        #datos{
            display:grid;
            grid-template-columns:50% 50%;
            grid-template-rows: 20% 30% 40% 10%;
        }
        #varios{
            grid-row:2 / 2;
            grid-column: 1 / 3;
            display:grid;
            grid-template-columns:50% 50%;
            grid-template-rows: 50% 50%;
            
        }
        #varios p:nth-child(1){
            grid-row:1 / 1;
            grid-column: 1 / 1;
        }
        #varios p:nth-child(2){
            grid-row:1 / 1;
            grid-column: 2/ 2;
        }
        #varios p:nth-child(3){
            grid-row:2 / 2;
            grid-column: 1 / 1;
        }
        #varios p:nth-child(4){
            grid-row:2 / 2;
            grid-column: 2 / 2;
        }
        #datos>p{
            grid-row: 3 / 3;
            grid-column: 1 / 3;
            text-align:center; 
        }
        #datos>button{
            grid-row: 4 / 4;
            grid-column: 1 / 3;
            text-align:center;
            width:80%;
            border-radius:50px;
        }
        #datos h2{
            grid-row: 1 / 1;
            grid-column: 1 / 3;
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="titulo"></div>
    <aside class="usuario">
    
    </aside>
    <aside class="operaciones">
    
    </aside>
    <main class="wrapper">
        <div id="imagen">
            <img src="../assets/imgs/videojuegos/N01.jpg" alt="n1">
        </div>
        <div id="datos">
            <h2 id="titulo">Titulo</h2>
            <div id="varios">
                <p>Genero:</p><p>Jugadores:</p>
                <p>Valoración:</p><p>Pegi:</p>
            </div>
            <p>Descripción:</p>
            <button>Alquilar</button>
        </div>
    </main>
</body>
</html>