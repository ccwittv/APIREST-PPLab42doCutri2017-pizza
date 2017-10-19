-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2017 a las 16:55:38
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pplab42docutri2017-pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
`id` int(11) NOT NULL,
  `sabor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pizza`
--

INSERT INTO `pizza` (`id`, `sabor`, `tipo`, `cantidad`, `foto`) VALUES
(1, 'muzzarella', 'molde', '0', 'muzza.jpg'),
(2, 'anchoas', 'molde', '1', 'anchoas.png'),
(3, 'morrones', 'piedra', '0', 'morron.jpg'),
(12, 'fugazetta', 'molde', '5', 'pordefecto.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
`id` int(11) NOT NULL,
  `sabor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `sabor`, `cantidad`) VALUES
(1, 'fugazza', '4'),
(2, 'muzzarella', '2'),
(3, 'anchoas', '1'),
(4, 'morrones', '2'),
(5, 'morrones', '2'),
(6, 'muzzarella', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pizza`
--
ALTER TABLE `pizza`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pizza`
--
ALTER TABLE `pizza`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
