-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-04-2024 a las 13:01:35
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id` int(8) NOT NULL,
  `id_pelicula` int(8) NOT NULL,
  `id_cliente` int(8) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Disparadores `alquiler`
--
DELIMITER $$
CREATE TRIGGER `alquiler_fecha` BEFORE INSERT ON `alquiler` FOR EACH ROW SET NEW.fecha_ini = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(8) NOT NULL,
  `nom` varchar(32) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nom`) VALUES
(1, 'acciÃ³n'),
(2, 'comedia'),
(3, 'drama'),
(4, 'romÃ¡ntica'),
(5, 'suspense');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(8) NOT NULL,
  `nom` varchar(32) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nom`) VALUES
(1, 'Mariano Moreno'),
(2, 'Lucia Canales'),
(3, 'Gerard Carro'),
(4, 'Eusebio Valle'),
(5, 'Ignacio Pelaez'),
(6, 'Loreto Echeverria'),
(7, 'Brais Galindo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(8) NOT NULL,
  `nom` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `categoria_id` int(16) DEFAULT NULL,
  `caratula_jpg` varchar(8) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0.jpg',
  `caratula_png` varchar(8) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0.png',
  `descripcion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nom`, `direccion`, `categoria_id`, `caratula_jpg`, `caratula_png`, `descripcion`) VALUES
(1, 'Cadena Perpetua', 'Frank Darabont', 3, '1.jpg', '1.png', 'Andrew Dufresne es un hombre inocente que es acusado del asesinato de su mujer. Tras ser condenado a cadena perpetua, es enviado a la cÃ¡rcel de Shawshank, en Maine.'),
(2, 'El padrino', 'Francis Ford Coppola', 5, '2.jpg', '2.png', 'Don Vito Corleone es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York en los aÃ±os 40. El hombre tiene cuatro hijos: Connie, Sonny, Fredo y Michael, que no quiere saber nada de los negocios sucios de su padre.'),
(3, 'Batman', 'Matt Reeves', 1, '3.jpg', '3.png', 'En su segundo aÃ±o luchando contra el crimen, Batman explora la corrupciÃ³n existente en la ciudad de Gotham y el vÃ­nculo de esta con su propia familia. AdemÃ¡s, entrar en conflicto con un asesino en serie conocido como el Joker'),
(4, '12 Hombres sin piedad', 'Sidney Lumet', 5, '4.jpg', '4.png', 'Multipremiado drama judicial de Sidney Lumet en el que un brillante reparto se encarga de dar vida a un jurado popular en un caso de parricidio.'),
(5, 'La lista de schindler', 'Steven Spielberg', 3, '5.jpg', '5.png', 'Oskar Schindler, un hombre de enorme astucia y talento organiza un ambicioso plan para ganarse la simpatÃ­a de los nazis y a la vez poder rescatar a miles de judÃ­os.'),
(6, 'El seÃ±or de los anillos', 'Peter Jackson', 2, '6.jpg', '6.png', 'En la Tierra Media, Frodo BolsÃ³n, de las verdes praderas de La Comarca, se embarca en una larga y peligrosa aventura para evitar que un anillo mÃ¡gico, heredado de su tÃ­o Bilbo BolsÃ³n, caiga ahora en poder de Sauron, seÃ±or de Mordor, que pretende usar su poder para someter a todos los pueblos libres.'),
(7, 'Pulp fiction', 'Quentin Tarantino', 2, '7.jpg', '7.png', 'Historias de dos matones, un boxeador y una pareja de atracadores de poca monta envueltos en una violencia espectacular e irÃ³nica.'),
(8, 'El bueno, el malo y el feo', 'Sergio Leone', 4, '8.jpg', '8.png', 'Los protagonistas son tres cazadores de recompensas que buscan un tesoro que ninguno de ellos puede encontrar sin la ayuda de los otros dos. AsÃ­ que los tres colaboran entre sÃ­, al menos en apariencia.'),
(9, 'Nanking, ciudad de vida y muerte', 'Lu Chuan', 4, '9.jpg', '9.png', 'Las historias de un soldado japonÃ©s y un oficial chino relatan las atrocidades cometidas por las fuerzas japonesas durante la ocupaciÃ³n de Nanking en 1937.'),
(17, 'a', 'a', 5, '0.jpg', '0.png', 'a');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
