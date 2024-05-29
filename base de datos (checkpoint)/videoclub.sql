-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2024 a las 13:03:25
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
  `id_categoria` int(8) NOT NULL,
  `nom_categoria` varchar(32) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nom_categoria`) VALUES
(1, 'Sin definir'),
(2, 'comedia'),
(3, 'drama'),
(4, 'romántica'),
(5, 'suspense'),
(6, 'acción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(8) NOT NULL,
  `nom_cliente` varchar(32) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nom_cliente`) VALUES
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
  `direccion` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `categoria_id` int(16) DEFAULT '1',
  `caratula_jpg` varchar(8) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0.jpg',
  `caratula_png` varchar(8) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0.png',
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `nom`, `direccion`, `categoria_id`, `caratula_jpg`, `caratula_png`, `descripcion`) VALUES
(1, 'Cadena Perpetua', 'Frank Darabont', 3, '1.jpg', '1.png', 'Andrew Dufresne es un hombre inocente que es acusado del asesinato de su mujer. Tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank, en Maine.'),
(2, 'El padrino', 'Francis Ford Coppola', 5, '2.jpg', '2.png', 'Don Vito Corleone es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York en los años 40. El hombre tiene cuatro hijos: Connie, Sonny, Fredo y Michael, que no quiere saber nada de los negocios sucios de su padre.'),
(3, 'Batman', 'Matt Reeves', 1, '3.jpg', '3.png', 'En su segundo año luchando contra el crimen, Batman explora la corrupción existente en la ciudad de Gotham y el vínculo de esta con su propia familia. Además, entrará en conflicto con un asesino en serie conocido como \"el Acertijo\".'),
(4, '12 Hombres sin piedad', 'Sidney Lumet', 5, '4.jpg', '4.png', 'Multipremiado drama judicial de Sidney Lumet en el que un brillante reparto se encarga de dar vida a un jurado popular en un caso de parricidio.'),
(5, 'La lista de schindler', 'Steven Spielberg', 3, '5.jpg', '5.png', 'Oskar Schindler, un hombre de enorme astucia y talento organiza un ambicioso plan para ganarse la simpatía de los nazis y a la vez poder rescatar a miles de judíos.'),
(6, 'El señor de los anillos', 'Peter Jackson', 2, '6.jpg', '6.png', 'En la Tierra Media, el Señor Oscuro Sauron forjó los Grandes Anillos del Poder y creó uno con el poder de esclavizar a toda la Tierra Media. Frodo Bolsón es un hobbit al que su tío Bilbo hace portador del poderoso Anillo Único con la misión de destruirlo.'),
(7, 'Pulp fiction', 'Quentin Tarantino', 2, '7.jpg', '7.png', 'Historias de dos matones, un boxeador y una pareja de atracadores de poca monta envueltos en una violencia espectacular e irónica.'),
(8, 'El bueno, el malo y el feo', 'Sergio Leone', 4, '8.jpg', '8.png', 'Los protagonistas son tres cazadores de recompensas que buscan un tesoro que ninguno de ellos puede encontrar sin la ayuda de los otros dos. Así que los tres colaboran entre sí, al menos en apariencia.'),
(9, 'Nanking, ciudad de vida y muerte', 'Lu Chuan', 4, '9.jpg', '9.png', 'Las historias de un soldado japonés y un oficial chino relatan las atrocidades cometidas por las fuerzas japonesas durante la ocupación de Nanking en 1937.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `Firstname` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Lastname` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nameuser` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `Firstname`, `Lastname`, `Email`, `Nameuser`, `Password`, `Status`) VALUES
(6, 'nvhgg', 'dvsvf', 'dfrgrg@vznfd.com', 'dfafds', '7c222fb2927d828af22f592134e8932480637c0d', '1'),
(1, 'Jeremy', 'Cortés', 'jeremias@jeremias.com', 'Jeremy', 'Jeremias123*', '');

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
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Nameuser`),
  ADD UNIQUE KEY `id_users` (`id_users`);

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
  MODIFY `id_categoria` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
