-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2015 a las 15:45:37
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema_zebra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `seudonimo` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `nombre`, `seudonimo`) VALUES
(1, 'oaps212@gmail.com', 'oscar', 'oscar121'),
(2, 'oaps212@gmail.com', 'oscar', 'oscar121'),
(3, 'oaps212@gmail.com', 'oscar', 'oscar121'),
(4, 'oaps212@gmail.com', 'oscar', 'oscar121'),
(5, 'oaps212@gmail.com', 'oscar', 'oscar121'),
(6, 'oaps212@gmail.com', 'oscar', 'perdomo'),
(7, 'oaps212@gmail.com', 'oscar', 'perdomo'),
(8, 'oaps212@gmail.com', 'oscar', 'perdomo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `nombre` int(100) NOT NULL,
  `bancos_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `nombre` varchar(10) NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE IF NOT EXISTS `metodos_pago` (
  `tipo` varchar(10) NOT NULL,
  `metodos_pago_id` int(11) NOT NULL,
  PRIMARY KEY (`metodos_pago_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `seudonimo` varchar(20) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido` varchar(10) NOT NULL,
  `tipoid` varchar(1) NOT NULL,
  `id` int(8) NOT NULL,
  `fijo` varchar(12) NOT NULL,
  `celular` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `producto` varchar(60) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `datepicker1` varchar(10) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `metodo` int(1) NOT NULL,
  `receptor` int(3) NOT NULL,
  `emisor` int(3) NOT NULL,
  `transferencia` int(15) NOT NULL,
  `monto` int(10) NOT NULL,
  `tipo` int(1) NOT NULL,
  `encomienda` int(1) NOT NULL,
  `envio` int(1) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `estado` int(3) NOT NULL,
  `ciudad` int(3) NOT NULL,
  `obersvaciones` int(150) NOT NULL,
  `registro_id` int(11) NOT NULL AUTO_INCREMENT,
  `emailconf` varchar(30) NOT NULL,
  `imagen` varchar(123) NOT NULL,
  `observaciones` varchar(123) NOT NULL,
  `terminos` int(1) NOT NULL,
  PRIMARY KEY (`registro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`seudonimo`, `nombre`, `apellido`, `tipoid`, `id`, `fijo`, `celular`, `email`, `producto`, `cantidad`, `datepicker1`, `modelo`, `detalle`, `metodo`, `receptor`, `emisor`, `transferencia`, `monto`, `tipo`, `encomienda`, `envio`, `direccion`, `estado`, `ciudad`, `obersvaciones`, `registro_id`, `emailconf`, `imagen`, `observaciones`, `terminos`) VALUES
('oscar', 'oscar', 'oscar', '1', 123123123, '123123123', '123123123', 'oa@oa.com', 'sdmnd', 1, '07/09/2015', 'skdmsd', 'sdcsdf', 2, 1, 2, 2147483647, 123123123, 1, 1, 1, 'sdkfnsdokfd', 2, 0, 0, 1, 'oa@oa.com', 'C:\\fakepath\\AmumuPoro_1280x1024.jpg', 'aasd', 1),
('oscar', 'oscar', 'perdomo', '1', 12345678, '123123', '123123', 'oaps212@gmail.com', 'ninguno', 1, '07/10/2015', 'ninguno', 'nada', 1, 1, 2, 2147483647, 12123123, 2, 2, 1, 'weqweqwe', 2, 2, 0, 2, 'oaps212@gmail.com', 'C:\\fakepath\\AmumuPoro_1280x1024.jpg', '', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 3, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 4, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 5, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 6, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 7, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 8, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 9, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 10, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 11, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 12, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 13, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 14, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 15, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 16, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 17, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 12123123, 1, 2, 1, 'prueba', 1, 2, 0, 18, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 19, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 20, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 21, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 22, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 23, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'bale berga la bida', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 24, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'oaps212@gmail.com', 'producto', 1, '07/14/2015', 'prueba', 'bale berga la bida', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 25, 'oaps212@gmail.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'verga', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 26, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 27, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 28, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 29, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 30, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 31, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 32, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 33, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 34, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 35, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 36, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 37, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 38, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 39, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 40, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'oscar', '1', 12312312, '123123', '123123', 'prueba@prueba.com', 'producto', 1, '07/14/2015', 'prueba', 'prueba', 1, 1, 1, 2147483647, 45454545, 1, 2, 1, 'prueba', 1, 2, 0, 41, 'prueba@prueba.com', 'C:\\fakepath\\cuadro_Registrate.png', 'prueba', 0),
('oscar', 'oscar', 'prueba', '1', 123123123, '123123', '123123', 'os@os.com', 'adf', 1, '07/18/2015', 'df', 'asdf', 2, 1, 2, 2147483647, 2312312, 1, 1, 2, 'asdasd', 2, 2, 0, 42, 'os@os.com', 'C:\\fakepath\\mapa.jpg', 'qdasd', 0),
('oscar', 'oscar', 'prueba', '1', 123123123, '123123', '123123', 'os@os.com', 'adf', 1, '07/18/2015', 'df', 'asdf', 2, 1, 2, 2147483647, 2312312, 1, 1, 2, 'asdasd', 2, 2, 0, 43, 'os@os.com', 'C:\\fakepath\\mapa.jpg', 'qdasd', 0),
('oscar', 'oscar', 'prueba', '1', 123123123, '123123', '123123', 'os@os.com', 'adf', 1, '07/18/2015', 'df', 'asdf', 2, 1, 2, 2147483647, 2147483647, 1, 1, 2, 'asdasd', 2, 2, 0, 44, 'os@os.com', 'C:\\fakepath\\mapa.jpg', 'qdasd', 0),
('pedro', 'pedro', 'prueba', '1', 123123123, '123123', '123123', 'os@os.com', 'adf', 1, '07/18/2015', 'df', 'asdf', 2, 1, 2, 2147483647, 2147483647, 1, 1, 2, 'asdasd', 2, 2, 0, 45, 'os@os.com', 'C:\\fakepath\\mapa.jpg', 'qdasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(20) NOT NULL,
  `usr_password` varchar(20) NOT NULL,
  `usr_email` varchar(20) NOT NULL,
  `usr_password_salt` varchar(100) NOT NULL,
  `usr_registration_date` date NOT NULL,
  `usr_registration_token` int(10) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_password`, `usr_email`, `usr_password_salt`, `usr_registration_date`, `usr_registration_token`) VALUES
(2, 'admin', 'admin', 'oaps212@gmail.com', '', '0000-00-00', 0),
(3, 'oscar121', '439936eb54f86cf3b242', 'oaps121@gmail.com', '(F#,#"M5{d'',*BkJ/8+9A:}2Egt=QSk4J{0~Ds{9$\\`(^&9(yP', '2015-07-21', 0),
(4, 'prueba', '008fa3c441a2901baac2', 'oaps212@gmail.com', '&5K0///h&;kND@bk3Rc`,W2W7c|M.[FpxU>^36''B#pOy"-yr9>', '2015-07-21', 6),
(5, 'prueba2', 'f01ebb11397445960b1c', 'oaps212@gmail.com', 'LFh)<`>`=Lc"b[vc3OFo#w,!v6V>$<c@0I~1NPFIepF3*={&A5', '2015-07-21', 0),
(6, 'prueba2', '31ef140202ceeb407750', 'oaps212@gmail.com', 'U+^I.zh=4`t^bsfp)]TcBV"Y|gEBukB>Xh/?%;OfcHYEUk2[''N', '2015-07-21', 796),
(7, 'prueba2', '840b70e8ebebfa83a990', 'oaps212@gmail.com', 'N<3(2eHaSibt8jPkRYm|*U)T3P=)Qjwb<8v{76f~VWDD!\\<3j7', '2015-07-21', 2),
(8, 'prueba2', '57bb755d91e06c7d6030', 'oaps212@gmail.com', 'L%XgA$_~wgd?];}WO6/+x`Mgx6^q{|u9}Oy>Nv!qGkk678S;zr', '2015-07-21', 5776644);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
