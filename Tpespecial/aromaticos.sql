-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 01:09:25
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aromaticos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Incienso'),
(2, 'Sahumerio'),
(3, 'Cono'),
(5, 'Bomba de humo'),
(6, 'Aceite para hornillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `puntaje`, `id_usuario`, `id_producto`) VALUES
(116, 'ponele', 4, 1, 22),
(117, 'ponele otra vez', 4, 1, 22),
(120, 'ponele otra vez', 4, 12, 23),
(122, 'ponele otra vez', 4, 1, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `fk_id_producto` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `fk_id_producto`, `path`) VALUES
(46, 22, 'img/5fc815e64acb5.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `aroma` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `propiedad` text NOT NULL,
  `duracion` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `aroma`, `precio`, `propiedad`, `duracion`, `id_categoria`) VALUES
(4, 'Arandanos', 180, '', 20, 2),
(5, 'Limon', 200, 'Ayuda a crear energía en el ambiente y nos impulsa para ser más activos, facilita la respiración.', 20, 6),
(6, 'Fresias', 100, 'Ayuda a crear energía en el ambiente y nos impulsa a ser más activos.', 15, 3),
(7, 'Melon y miel', 250, 'facilita la respiración, ya sea porque estemos refriados o simplemente queramos abrir más nuestras vías respiratorias. También puede ser un buen repelente de mosquitos. Estimula las defensas del organismo.', 45, 6),
(8, 'Mirra', 100, 'Ayuda a crear energía en el ambiente y nos impulsa para ser más activos, facilita la respiración.', 15, 3),
(11, 'Arandanos', 380, 'Comparte beneficios con el aceite esencial de limón (energizante y facilita la respiración), además ayuda a calmarnos y a relajarnos. También puede ser un buen repelente de mosquitos. Estimula las defensas del organismo.', 120, 5),
(13, 'Fresias', 520, 'Relajante natural', 90, 2),
(14, 'Limon', 200, 'Ayuda a crear energía en el ambiente y nos impulsa para ser más activos, facilita la respiración.', 20, 6),
(16, 'Mirra', 250, 'Indicado para tos seca y tos productiva.', 45, 6),
(18, 'asdasd', 0, '', 4536, 2),
(19, 'Fresias', 800, '', 300, 3),
(22, 'asdasd', 5, 'Maravilla', 80, 1),
(23, 'asdasd', 5, 'Maravilla', 80, 1),
(24, 'asdasd', 5, 'asdasd', 80, 1),
(25, 'aasddasd', 5, 'asdasd', 80, 1),
(26, 'aasddasd', 5, 'asdasd', 80, 1),
(27, 'aasddasd', 5, 'asdasd', 80, 1),
(28, 'aasddasd', 5, '', 80, 2),
(29, 'aasddasd', 5, 'asdasd', 80, 1),
(30, 'aasddasd', 5, 'asdasd', 80, 1),
(31, 'aasddasd', 5, 'asdasd', 80, 1),
(33, 'pera', 5, 'asdasd', 80, 1),
(34, 'pera', 5, 'asdasd', 80, 1),
(35, 'pera', 5, 'asdasd', 80, 1),
(38, 'aguacate', 800, 'asdasd', 40, 1),
(39, 'alala', 10, 'asdasd', 40, 1),
(40, 'mirra', 160, 'Maravilla', 40, 3),
(41, 'Arandanos', 180, '', 20, 2),
(42, 'Prueba api', 180, '', 20, 2),
(52, 'prueba imagen', 2000, 'Maravilla', 10, 6),
(53, 'prueba imagen', 2000, 'Maravilla', 10, 6),
(55, 'aaaaaaaaaaa', 19, 'Maravilla', 20, 1),
(58, 'prueba imagen', 0, '', 0, 1),
(59, 'prueba imagen', 0, '', 0, 1),
(60, 'mirra', 0, '', 0, 1),
(61, 'mirra', 0, '', 0, 1),
(62, 'mirra', 0, '', 0, 1),
(63, 'mirra', 0, '', 0, 1),
(64, 'mirra', 0, '', 0, 1),
(65, 'mirra', 0, '', 0, 1),
(68, 'prueba imagen', 0, '', 0, 1),
(69, 'prueba imagen', 0, '', 0, 1),
(70, 'prueba imagen', 0, '', 0, 1),
(71, '', 0, '', 0, 1),
(72, '', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `administrador`) VALUES
(1, 'fran_tandil@hotmail.com', '$2y$10$9g2SqNeA.2S1i6v/sZeadu7VmweQipVFqQa/FMpJG8niPAqREoL5W', 1),
(12, 'eric_rulo@hotmail.com', '$2y$10$gTWdMZrhPlxa1RLiYr19aeqXBWLC0s5SdMU./KctZLzA4Sz1rzv/u', 0),
(13, 'ramasaromaticas@hotmail.com', '$2y$10$.vhVmyMngkVShvcebgROs.PZYRxWC7Ba9XrcPdJmsDFsQHtAaHqZS', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_producto` (`fk_id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`fk_id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
