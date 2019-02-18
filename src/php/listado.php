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
        <div class="control"></div>
    </aside>
    <main>
        <ul class="listado">
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
            <li class="item">
                <div class="img-container"></div>
                <div class="descripcion">
                    <h3>Nombre juego</h3>
                    <ul class="info-juego">
                        <li id="edad">
                            PEGI 7
                        </li>
                        <li id="plataforma">
                            PS4
                        </li>
                    </ul>
                    <button class="animado">Ficha</button>
                </div>
            </li>
        </ul>
    </main>
</body>
</html>