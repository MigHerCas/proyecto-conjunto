-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2019 a las 09:11:36
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vallagame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id_plataforma` int(1) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(4) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `id_videojuego` varchar(3) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(3) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` int(9) NOT NULL,
  `edad` int(2) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `id_videojuego` varchar(3) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `id_img` varchar(15) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `ficha_tecnica` varchar(250) NOT NULL,
  `multijugador` tinyint(1) NOT NULL,
  `pegi` int(2) NOT NULL,
  `id_plataforma` int(1) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `valoracion` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id_plataforma`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_videojuego` (`id_videojuego`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`id_videojuego`),
  ADD KEY `id_plataforma` (`id_plataforma`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuego` (`id_videojuego`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD CONSTRAINT `videojuego_ibfk_1` FOREIGN KEY (`id_plataforma`) REFERENCES `plataforma` (`id_plataforma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- 	Insertando los datos
--
INSERT INTO `plataforma` (`id_plataforma`, `nombre`) VALUES (1, 'Nintendo'), (2, 'PS4'), (3, 'X-Box One');

INSERT INTO `videojuego` (`id_videojuego`, `titulo`, `id_img`, `genero`, `ficha_tecnica`, `multijugador`, `pegi`, `id_plataforma`, `disponible`, `valoracion`) VALUES 
('N01', 'Metroid', 'img/metroid.jpg', 'Aventura', 'Explora un hostil planeta alienígena plagado de agresivas formas de vida en la piel de la legendaria cazarrecompensas Samus Aran. El arsenal de Samus Aran ha sido mejorado con nuevos movimientos y habilidades.', '1', '7', '1', '1', NULL),
('N02', 'Mario Kart 8 Deluxe', 'img/mariokart.jpg', 'Carreras', 'Gracias a Nintendo Switch, los aficionados pueden disfrutar de la versión definitiva de Mario Kart 8 donde quieran y cuando quieran, incluso en partidas multijugador local para hasta ocho pilotos.', '12', '3', '1', '1', NULL),
('N03', 'The Legend of Zelda Breath of the Wild', 'img/zelda.jpg', 'SandBox', 'Explora las tierras de Hyrule como más te guste Escala torres y montañas en busca de nuevos destinos y sigue tu propio camino para llegar hasta ellos. Por el camino lucharás contra enormes enemigos y cazarás feroces bestias.', '1', '12', '1', '1', NULL),
('N04', 'Super Mario Odyssey', 'img/supermario.jpg', 'SandBox', 'Mario se embarca en un nuevo viaje a través de mundos desconocidos, correr y saltar a través de enormes mundos 3D en el primer sandbox al estilo de juego de Mario desde Super Mario 64 y Super Mario Sunshine.', '1', '3', '1', '1', NULL),
('N05', 'Super Smash Bros Ultimate', 'img/supersmash.jpg', 'Lucha', 'El legendario juego de los mundos y los combatientes chocan en el enfrentamiento final una nueva entrada en el Super Smash Bros de la serie para Nintendo Cambiar el sistema!', '8', '12', '1', '1', NULL),
('P01', 'FIFA 19', 'img/fifa.jpg', 'Deportes', 'FIFA 19 nos brinda la oportunidad de experimentar la competición de clubes más prestigiosa del mundo, la legendaria UEFA Champions League. La UEFA Champions League se ha incorporado a todos los modos de FIFA 19.', '4', '7', '2', '1', NULL),
('P02', 'GTA V', 'img/gtav.jpg', 'Acción', 'Los Santos, una extensa y soleada metrópolis llena de gurús de autoayuda, aspirantes a estrellas y famosos en decadencia, en su día la envidia del mundo occidental, lucha ahora por mantenerse a flote en una era de incertidumbre económica.', '1', '18', '2', '1', NULL),
('P03', 'Battlefield 1', 'img/battlefield.jpg', 'Shooter', 'Battlefield 1 nos traslada a la Segunda Guerra Mundial, ahondando en ideas como la hermandad entre soldados, añadiendo nuevos modos de juego, mejorando los gráficos y apostando claramente por mayor diversión, complejidad y sentido del espectáculo.', '1', '18', '2', '1', NULL),
('P04', 'Crash Bandicoot N. Sane Trilogy', 'img/crash.jpg', 'Plataformas', 'Tu marsupial favorito está de vuelta. Y lo hace mejorado, y listo para bailar en Crash Bandicoot N. Sane Trilogy. Recopila Frutas Wumpa mientras aceptas el desafío de los retos épicos y las aventuras de los tres juegos Crash que lo iniciaron todo.', '1', '7', '2', '1', NULL),
('P05', 'Fórmula Uno 2018', 'img/f1.jpg', 'Conducción', 'F1 2018 es la adaptación en forma de videojuego de conducción del Mundial de Fórmula 1 de la temporada 2018 a cargo de Codemasters para PC, PlayStation 4 y Xbox One, con todas las licencias oficiales, es decir, pilotos, escuderías y circuitos.', '1', '3', '2', '1', NULL),
('X01', 'Tom Clancy’s Rainbow Six Siege', 'img/rainbow.jpg', 'Shooter', 'Por primera vez en un Tom Clancy Rainbow Six juego, los jugadores pueden elegir entre una variedad de operadores antiterrorista únicas y participar en asedios tangibles.', '1', '18', '3', '1', NULL),
('X02', 'Halo 5 Guardians', 'img/halo.jpg', 'Shooter', 'Cuando el héroe más grande de la humanidad se pierde, un nuevo espartano se le asigna la tarea de cazar el Jefe Maestro y resolver un misterio que amenaza a toda la galaxia.', '4', '16', '3', '1', NULL),
('X03', 'Dying Light The Following', 'img/dying.jpg', 'Terror', 'Dying Light: The Following es una expansión masiva de la muerte la Luz y la incalculable capítulo de Kyle Crane historia.', '4', '18', '3', '1', NULL),
('X04', 'Sniper Elite 3', 'img/sniper.jpg', 'Shooter', 'Esta vez tendremos que acabar con los planes del Tercer Reich en África, cumpliendo misiones en los desiertos con sigilo y precisión.', '4', '18', '3', '1', NULL),
('X05', 'Borderlands The Handsome Collection', 'img/borderlands.jpg', 'Shooter', 'Incluye las versiones definitivas de ambos Borderlands: 2 y Borderlands: La Pre - Sequel, construidos específicamente para las consolas de nueva generación.', '2', '18', '3', '1', NULL);





