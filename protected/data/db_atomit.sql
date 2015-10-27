-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2015 a las 11:47:48
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_atomit`
--
CREATE DATABASE IF NOT EXISTS `db_atomit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_atomit`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

DROP TABLE IF EXISTS `accesorios`;
CREATE TABLE IF NOT EXISTS `accesorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id`, `nombre`) VALUES
(1, 'Cable corriente'),
(2, 'Fuente'),
(3, 'Cable corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

DROP TABLE IF EXISTS `authitem`;
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

DROP TABLE IF EXISTS `barrio`;
CREATE TABLE IF NOT EXISTS `barrio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CIUDAD` (`id_ciudad`),
  KEY `FK_DEPTO` (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id`, `nombre`, `id_ciudad`, `id_departamento`) VALUES
(1, 'Cordon', 1, 1),
(2, 'Reducto', 1, 1),
(3, 'Centro', 1, 1),
(4, 'Punta Carretas', 1, 1),
(5, 'Carrasco', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_DEPTO` (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`, `id_departamento`) VALUES
(1, 'Montevideo', 1),
(2, 'Durazno', 2),
(3, 'Sarandi del Yi', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `rut` varchar(30) DEFAULT NULL,
  `razon_social` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `agencia` varchar(50) DEFAULT NULL,
  `nota` text,
  `id_barrio` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_BARRIO` (`id_barrio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `id_empresa`, `nombre`, `rut`, `razon_social`, `direccion`, `email`, `web`, `telefono`, `agencia`, `nota`, `id_barrio`, `fecha_creacion`) VALUES
(4, NULL, 'Fernando Rodriguez', '32233222', 'Chebay SRL', '18 de Julio 1234', 'fer@gmail.com', 'www.fr.com.uy', 99332222, 'Nossar', 'adasdasdasdas', 1, '2015-08-14 01:26:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CLIENTES` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Montevideo'),
(2, 'Durazno'),
(4, 'Canelones'),
(5, 'Florida'),
(6, 'Flores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `imagen` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `nro_serie` varchar(50) DEFAULT NULL,
  `tipo` enum('PC','Notebook','Otros') DEFAULT NULL,
  `id_marca` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marca` (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `id_empresa`, `modelo`, `nro_serie`, `tipo`, `id_marca`) VALUES
(14, NULL, 'ASDASDASD', 'ASSS2222', 'PC', 1),
(15, NULL, 'jag', 'adasd2', 'PC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_accesorio`
--

DROP TABLE IF EXISTS `equipo_accesorio`;
CREATE TABLE IF NOT EXISTS `equipo_accesorio` (
  `id_equipo` int(11) NOT NULL,
  `id_accesorio` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`,`id_accesorio`),
  KEY `FK_EQUIPO` (`id_equipo`),
  KEY `FK_ACCESORIO` (`id_accesorio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estilo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `visto` tinyint(1) DEFAULT '0',
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_Usuario_historial` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=90 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `id_empresa`, `id_usuario`, `tipo`, `estilo`, `descripcion`, `visto`, `fecha_creacion`) VALUES
(1, NULL, 2, 'Create', 'Success', 'Creo el cliente:Fernando Rodriguez', 0, '2015-08-14 01:26:01'),
(2, NULL, 2, 'Create', 'Success', 'Creo el usuario: nacheen', 0, '2015-08-14 22:13:24'),
(3, NULL, 2, 'Create', 'Success', 'Creo el usuario: chachan', 0, '2015-08-14 22:35:17'),
(4, NULL, 2, 'Create', 'Success', 'Creo el usuario: ramon', 0, '2015-08-15 15:31:36'),
(5, NULL, 2, 'Create', 'Success', 'Creo el usuario: joaquin', 0, '2015-08-15 15:38:50'),
(6, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: joaquin', 0, '2015-08-15 15:41:29'),
(7, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: ramon', 0, '2015-08-15 15:43:10'),
(8, NULL, 2, 'Delete', 'Error', 'Elimino el usuario: joaquin', 0, '2015-08-15 15:55:03'),
(9, NULL, 2, 'Delete', 'Error', 'Elimino el usuario: ramon', 0, '2015-08-15 15:55:31'),
(10, NULL, 2, 'Delete', 'Error', 'Elimino el usuario: chachan', 0, '2015-08-15 15:59:08'),
(11, NULL, 2, 'Create', 'Success', 'Creo el accesorio: Cable corriente', 0, '2015-08-16 14:01:39'),
(12, NULL, 2, 'Delete', 'Error', 'Elimino el cliente: Nacho Castro', 0, '2015-08-21 23:31:30'),
(13, NULL, 2, 'Create', 'Success', 'Creo el usuario: gasgas', 0, '2015-09-06 14:55:59'),
(14, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-06 15:14:04'),
(15, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-06 23:46:55'),
(16, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-06 23:53:33'),
(17, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-06 23:55:29'),
(18, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-06 23:58:06'),
(19, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-06 23:58:24'),
(20, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-07 00:00:56'),
(21, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-07 00:01:09'),
(22, NULL, 2, 'Update', 'Warning', 'Modifico el usuario: admin', 0, '2015-09-07 00:01:33'),
(23, NULL, 2, 'Delete', 'Error', 'Elimino el cliente: Gaston Baldenegro', 0, '2015-09-09 02:47:06'),
(24, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 00:04:39'),
(25, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: A44', 0, '2015-09-11 00:16:26'),
(26, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: ', 0, '2015-09-11 00:16:29'),
(27, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: A504', 0, '2015-09-11 00:16:32'),
(28, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: PC', 0, '2015-09-11 00:16:34'),
(29, NULL, 2, 'Delete', 'Error', 'Elimino la orden: 1', 0, '2015-09-11 00:31:09'),
(30, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: SAB1234', 0, '2015-09-11 00:37:29'),
(31, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 00:50:40'),
(32, NULL, 2, 'Delete', 'Error', 'Elimino la orden: 2', 0, '2015-09-11 00:50:53'),
(33, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: S3', 0, '2015-09-11 00:51:44'),
(34, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 00:52:03'),
(35, NULL, 2, 'Delete', 'Error', 'Elimino la orden: 3', 0, '2015-09-11 00:52:12'),
(36, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 01:01:15'),
(37, NULL, 2, 'Delete', 'Error', 'Elimino el equipo: aaaaaaaaaaab', 0, '2015-09-11 01:02:24'),
(38, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 01:04:41'),
(39, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 01:05:30'),
(40, NULL, 2, 'Delete', 'Error', 'Elimino la orden: 5', 0, '2015-09-11 01:07:56'),
(41, NULL, 2, 'Delete', 'Error', 'Elimino la orden: 6', 0, '2015-09-11 01:07:58'),
(42, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 01:10:35'),
(43, NULL, 2, 'Delete', 'Error', 'Elimino la orden: 7', 0, '2015-09-11 01:11:36'),
(44, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 01:12:05'),
(45, NULL, 2, 'Create', 'Success', 'Creo la orden: ', 0, '2015-09-11 22:39:43'),
(46, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-09-11 23:40:44'),
(47, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-09-11 23:40:45'),
(48, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-09-11 23:40:46'),
(49, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-09-11 23:42:00'),
(50, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-09-26 02:50:22'),
(51, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-09-26 02:51:27'),
(52, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-21 00:10:55'),
(53, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-21 00:11:13'),
(54, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-21 00:11:20'),
(55, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 19:27:44'),
(56, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-24 19:29:37'),
(57, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 19:31:26'),
(58, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 19:32:02'),
(59, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-24 19:32:36'),
(60, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 19:33:14'),
(61, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-24 19:34:45'),
(62, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-24 19:34:51'),
(63, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 19:53:17'),
(64, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-24 19:59:21'),
(65, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 19:59:48'),
(66, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-24 20:01:18'),
(67, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:08:00'),
(68, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:08:46'),
(69, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:10:50'),
(70, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:15:55'),
(71, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:16:24'),
(72, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-25 23:17:52'),
(73, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:26:44'),
(74, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-25 23:27:30'),
(75, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-25 23:27:54'),
(76, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-25 23:28:34'),
(77, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-25 23:29:26'),
(78, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-25 23:47:13'),
(79, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-25 23:59:12'),
(80, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:00:31'),
(81, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:05:35'),
(82, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:06:51'),
(83, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:07:58'),
(84, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:10:40'),
(85, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-26 00:11:41'),
(86, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:14:10'),
(87, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1001', 0, '2015-10-26 00:16:54'),
(88, NULL, 2, 'Update', 'Warning', 'Modifico la orden: 1000', 0, '2015-10-26 01:34:53'),
(89, NULL, 2, 'Create', 'Success', 'Creo el usuario: jaja', 0, '2015-10-27 00:17:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE IF NOT EXISTS `ordenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `falla` text,
  `diagnostico` text,
  `solucion` text,
  `nota` text,
  `condicion` enum('Presupuestado','Garantia Reparacion') DEFAULT NULL,
  `estado` enum('Ingresado','En Reparación','Reparado con Cargo','No Fallo','Reparado sin Cargo','Retiran sin Reparar','Plazo Vencido') DEFAULT NULL,
  `transporte` enum('(Ninguna)','Enviado','Entregado','Avisado') DEFAULT NULL,
  `finalizada` tinyint(4) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_EQUIPO` (`id_equipo`),
  KEY `FK_CLIENTE` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1002 ;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `id_empresa`, `id_equipo`, `fecha_ingreso`, `fecha_cierre`, `fecha_retiro`, `falla`, `diagnostico`, `solucion`, `nota`, `condicion`, `estado`, `transporte`, `finalizada`, `id_cliente`) VALUES
(1000, NULL, 14, '2015-09-11', NULL, NULL, 'asdasd', 'asdasdasd', 'asdasdas', 'asdasd', 'Garantia Reparacion', 'Ingresado', '(Ninguna)', 0, 4),
(1001, NULL, 15, '2015-09-12', NULL, NULL, 'La falla es aleatoria, es un error de pantalla azul.', 'Esto es una prueba de diagnostico', '', '', 'Presupuestado', 'Ingresado', '(Ninguna)', 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `pin` int(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `foto` blob,
  `estado` tinyint(1) NOT NULL,
  `sesion` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_empresa`, `nick`, `pass`, `pin`, `nombre`, `apellido`, `direccion`, `email`, `celular`, `foto`, `estado`, `sesion`, `fecha_creacion`) VALUES
(1, 0, 'gbg933', 'gaston4681', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '2014-07-17 17:38:13');
INSERT INTO `usuarios` (`id`, `id_empresa`, `nick`, `pass`, `pin`, `nombre`, `apellido`, `direccion`, `email`, `celular`, `foto`, `estado`, `sesion`, `fecha_creacion`) VALUES
(2, 0, 'admin', 'admin', 0, NULL, NULL, NULL, NULL, NULL, 0xffd8ffe000104a46494600010101006000600000ffe1003a4578696600004d4d002a00000008000351100001000000010100000051110004000000010000000051120004000000010000000000000000ffdb0043000201010201010202020202020202030503030303030604040305070607070706070708090b0908080a0807070a0d0a0a0b0c0c0c0c07090e0f0d0c0e0b0c0c0cffdb004301020202030303060303060c0807080c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0c0cffc00011080119012c03012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f52424e4f033c735cef8bfc710e86de54327997457a2f45f726a9f887e26ac16ed0c21649986032f216bcff51d4248629af243b96105d893cf0326bfa3e8e0e4deba23f89f198eb4953c3bf99cd7c5df8eba77c36816e35479b50d4af98a59d95b8f32e6edfd157f2e7815cb7807e1378b7f680d42d356f1a5bc5a5e87149e75be8630ff0037f0b4cdd188fee8c8ac3fd98f41b5f895e24d5be236a5711df5d5ede3595945f7974d810e30be8cd9c9c7b57d65a6c10c3651fd9d76a6dfcfdeb9a55278ae5ab37cb0d5c62baf4bb3d58ca865d51d08453aaadcd396aeef78c17d9b6d7fbb420d23c356ba0428902afca00181d07b7ff5ab8cf1486fed6badbf7b923eb5e858dabc71ce4d717e37d35ad3540ffc13fcd903a7b57a7869daa72f91e163e2dd3e79fd939213c3e19d06e2ea7610a44ad3cce78c7193cd7d2fff0006f2fc006d4bc27e39f8ebad5af97aa7c42d45ed34832a65a1d3e2380549fe176c11f4af8dff006825d43c6f67a2fc3dd0d99b5ef885a8c5a45a8519648dcfef24c7a2a839fad7ee07ecf1f06f4bfd9dfe0af85bc13a5dba4365e1cd361b28554704aa8058fd4e6bf35f10b324ead3c0c3d5faf43f6ef06f229470f5332afbcf45fe1eafef3b0b9b98ad2d4c934890c70aee795b855503249fa7735f8ddfb67fed1baf7fc16aff006aad53e09f8075ad434af817e05998f8a35ab4cc6bad5c236df251ba95ddbb1fc276e7d2becbff0082f0fed31aa7ecc5ff0004ecf15dc6832dc2f883c4d345e1fd3da16c4b1b5c12a587d00fd6bc5ffe095bfb1cc3fb1bfec99a1e8b7883fe122d6635d4f57948cbb4f2286284ff00b00edfa835f9a1fb71f2ff00fc14bbfe0897f0ff00c3ff00b204daa7c29f0e8d2fc53e09856f3cd866669f538946240d9272e07cdc01cad799feccff00b4ee8bfb537fc133bc3ba66bde27b59be307c17d7bedb159df4852f2ef4c27ca6d85bfd6158cf2a32dc6715faf86c23bab49166412dbc8763861f29cf63dabf193fe0b37ff0004c99bf65ff1ca7c6cf8730f93e1f9ef049ac584071f61919b97503ac6dd08ed9f4aceb53e6a5289d997d654f111aafecb4fee3dee091668448a772c8030fc4669dbbcb2ade86b98f833f102cfe287c2dd135cb161e4df5a46e547fcb36c0057f03915d2c9feaff1afc9f114dd3a9c9d99fd3946b2ab49558ed249fde7a069eff6cd2e36ebe62570b776df66be914ff0b115d9784e6dfa25bffb008ae5fc478feda9b03a9c9a2b7c28ce8fc666de59a5fdb98a455653d88fc688d9847e5ff0afaf7a9bb5340e39ace5f09d91f88cdf150ff8914dfef2ff003ae457a5759e2d7ff8914bfefaff003ae4c1e2bae8fc271623e2026a9ebfa72eb5a4dc5aff00cfc46d19fc411fd6ae62902fcdbb1f356a60456568b61671c2bcac4a147d054927ce76afdeebc5380c0a8df6a9dcd208f6f7f6a7672d109cac8e1758b75b1be99a63c292c49ff3ed5d37fc102afbc3971fb7cfc48f8d7e34d534bd0fc1fe07d3de18f51d42558e386473b551771e4950f80324d7cc7fb697ed6ba7f86aef52f0ee8acd717f3422392ee07568e1ce4300739dd5f26ea3f13b5ad4fc1d0f86ed6f2e20d19e5f39eca063b6e25e9bdc0fbedf5afafc8f093a70e6abf23f24e34cca159ac2d295d4756fb9fb71fb79ff00c1d87a5f86355d4341f813e1f8f5afb3b3463c41aaa3241211c6e8e2e18af7cb63e95e0ffb287fc1c19fb50691f15bc33e32f888adab7c29d77578f4bbd95b4e58ad620c403e5c800dac320e4920806bccff00e0963ff0423f127ed3f3d8f8bfe245ade683e0d6757b6d3402b7daa8ebc2f5543ea719cf15fae9fb40fec23e13f1cfec9baa7c238f43b7d1f479acbc9b08e383cbfb24aa331c8a7aee0475eb826be837d0fcfef6d4fa0fe3a689a3f8a2c2d6ea0586fb46f145996200dd1cf1ba8e7dc10c2bf177c2df09ae7f607fdbc3c61f0c66f323f0cf8bb3ad78799f95233f322fba8383f857e81ffc131fe3cea1f11bf6538fc03e2b9b6f8fbe0cdfb7873568e46024961c1fb3cc07f75d236c1ff66b82ff0082b7fecdf37c48f84963f107c3f6c5fc5bf0dae3fb4ed4203bee2dc7fad878eb95e71ea2bd0cb7192c362a3597d93caceb2d8e3b05570ef792fc56c7e717ed87e0cf88df0f7f686f0d7c42d47535d63c17a4ea8af1471854fece5738dac38273eb93f857dac9790ea5631c909492d6e230ca47cc1948feb5e11f1d7c0d1fede1fb29dbb786f506b392ea35bcb752f85f340e627c7420f1ec4527fc13ebe286a5e25f85d3785bc44925bf89bc14e2c2ea193ef3a2f087df818cfb57e9d829c618c9c65ac6a6a9f4e63f1ecc232c465f4ea2b2a943dc94568d47bfde65fc78fd85dbfe12a93c71f0cef3fe11bf17c67cc9208cedb5bdf55651c0cfe59ae27c2fff0005195f00df7fc239f15342d4bc37ac5b9db2dda425e0971fc431d8ff00b3915f65249f36f5f94b0c1ae37e2efc04f0a7c76d164d3fc45a35adfee1f2ccca1648ff00dd7ea2b4c46535217a984972beaba3672e0788a84d2a199439d2d135f12479a7867f6e7f84fe27bf8e3b3f1958b48e02e268e5847d32ea05777ad7ecfde17f8e5e1c6babaf0d68fad5a5d8056e162466607b875e4fe75f12fed9dff04bcb1f83fe0ad43c59e17d65574ed3d7cc96cef64c3819e88dfc47d8d7a87fc1193e2278aad7c25abaea73dd5c786e19923b5f389214f3b8293d8578f87c5549637ea58ba6949abdff00ccfa1c66070ef01fda39555768bb38bd18bf19bfe0903e15d6de49b419752d02e1b958dd0c9083e9cf23f3af9bfc55ff0004a7f899a2eb525bd8c3a76a36cbca4e93050df50d839afd9fd6754b4b5d0daf245f3a00808c8cef07a579edd78cecaee6322e8f6aaa7a73827dcd7563386f06fdf51b5fb1c194f1e6634db8544da5dcc3242bff0074fafad73ff16b591a3fc35d72e87de86c666fafc86ba9d3f4d935abf8ede35f998e738e82ba1d77e1f586bda4b5abc6acacbb2456195901e3915fa2e2e5cd4e54e3a369dbc9f73f01c0e1e5ed635fa269bf44d1f935fb04fedabff0a1bc7f79a5ebd348fe19d6670d26ef9becb2648f33e9cf3f415fab1f0bfc7967e23d261920b88ae2cee007b69d1f72ba9f7afcd0ff008288ff00c13bef3e11eab77e2cf0bda39d0e46325c59a2e5ad8f7651fdcfe55ccfec2bfb7d5ffc08d461f0eebf33dc7866570119892f6249eabfecfb57e6594671572da9fd9d98e91be8fd7afa7e47f40f1370d61f3fc37f6d648d7b45f147bd92dffbcbf13f6126564f9872b8ce3d6b9cf1edd85b58530d990eee0648aa9e06f8a763e23f0ddadd43751de5bdcc62486e213b95d48aabe39f1f69b1699e65e3c36290fcde74f2ac6a3f3ff1afd1230941fb6fb296ede9eb7fd0fc631328d5fdcc53e67a34d5f6e96dcabff0477f005c7ed23ff055bf1578a357852e345f847a49b7d3d31b963ba9d942c9fef15492bf686f7518ece369a668edd211969667091e3dc9e057f3effb017fc155edff0062dd23e2c41e09f08dc78cbe2178ebc401a2b89015d3ed6de1122c6cccbcbf321f954f6eb5cf7c4ef895fb497ede3fb46780bc23e32f885e20b593c7bac2409a3e8f20b2b5b3b5073236c8c066555e32e49afc2f33a38bc5e26a635a6e37776f6d36499fd5b9156c260f0b87cbe324a7cb6e556bed7775b9fa31fb746a167ff0502fdb77e1ef813c3f751eb7e0af8652378835e92d184b6d757bc2c16e5870c472c7078afa0b54d12eb44bb55bc89adda45dea1c57ab7c02fd9a7c23fb38783adf47f0c68b63a7c30a85668e20aee71d491d49f53c9ae73e3e5e2dd78ba18c6d3e4c186c7a9af0cfa52cf81bc19178d3e155d5b32a24cd705e2900fbac3a7f87e35f9fff00f05a0f17df691fb2a5ff008274db6864f1078d2f63d1a28ee93e55c9cbb8fa28241afd2ef83f63fd97f0facd8fc8d2665627a735f8e9ff00052df8fd37c6dfdbfd2c55849a0f82c3cf10551b04c47939c8e79525bad007c09f0a353f8e1fb15e983499bc34be24f0e4323394b6fde79409c92acbc8f5c1af70f875ff000511f03f8c9d2db58fb77856ff0080d16a11322eef40c462bdd2ef4c748fcc0bba1930cae9cab7bd73be2cf84fe18f1f5b6dd5b42d2efc1c8265b75ddf9f5fd6bcac5e4986afef5acd9f5995719663814a107ed22b4b3e88ea7c13f1734fd42dd1b4dd4b4fd4ad59778586656c7e47356b51bd6d4af9e75458f7f4527ad7cfdabfec13e09699a4d166d6fc2f3c87264d37509179fa3123f0c5471fece1f113c22117c3df14b556863e15354b68ae73ed9da0d7835f856a6f4e575e67da617c45c336bdb51717e4eebee3df8f07ef7d7148ed85eb5e15737bf1efc36c91a2f837c411af5765782471f8362b0f5bf8b3fb41b3c8b67e05f0ea21e15a495db1eff7c5703e1ac65fddb35ea7b9febee57cb79395ff00c363ddbc7171e5d9c70ab0fde1cb0f5ae67e68a4db271ec2bc3755f12fed25acccad2786fc311ed18e19bff8bacfbd4fda52ea0daba3787e163fc4a727f526baa9f0fe296924bef386a71d65d3d62e5ff809f423c9b97f76cbc1e49ed597acf8db49f0dc6f25fea9636aabff003d2655feb5f38dd7ecf5fb467c4d98a6a9e24b5d16d1b86489d2338ff80a83fad5ad17fe095975afcde678a3c71a9de3372c2107767eac4ff2aeea7c372deab3c9c47881412b50a4dbeedfe8771e38fdb9be1df82207ff0089d0d4655e025aaf9849fc2be6efda2bfe0a13a9fc4ad25b47f0bdbdc6976937124e4e67947a0c741fad7d33e09ff825dfc31f0e443fb42cf52d6df3cfdaee9973ff007ef6d7a9786bf663f00f83b6ae9de13d1e1d9cab3c1e6b03f57c9af5b0f9361e93e6ddf99f2b9871863f130704f962fb6ff7ee7e46cbe1ad6af6dee2fa4b1d43ecf1e0cb3c913055cf72c457ecaffc11effe0885e1bd1fc3be1bf8a1e389ec7c59ab6a91a5de95a6c2c25b2b50dcab311f7dc7a1e0556f197c23d1bc79e09bed0ef34fb7fecdbd8cc6ea9104033d08c7715df7fc108ff69fbdfd9b3e355e7ecf9e399bceb7b376bdf0b5e4a7fd65bb1f9a307b95e081ec6bd4f23e4e52bea7ec47c32f86167f0ff49857c987ed8c80165500443fbaa3b56a78c7c1d65e2cd3da3ba8c6e03e49147cc86b4e293ed423914ef5c7df1d1aa575debb4d049f923ff0518f01eaff00f04f9fdb07c37f1cf4b5957c27ae95d03c6b6f103e5cb1330305d9038ca10c0b75f980ef5f5ed9ded878cfc3315cc2d0ea1a6eab6e1d581de92c6ebc7e60d7b7fed3bfb39683fb53fc17d7bc17e20b68e6b3d6ad5edcbe06e8c9070c3e8707f0afcebff8279f8d354fd9fb5cd73f671f8857afff000997c3b9d869124e48fedad289fdcca8c7efed18079cf3401f2c782fc16dfb2cfed87f113e13b7fa3e8f7176daf78754fcabf6698ef31afb26ec568f853e0c5c7867f6a2f1078ba18d63d275ad3e38e4556fbf3af0323e9debd2bfe0b51e063f0cfc4bf0e7e34d8c7b7fe117d40697abb2af32dacc7001f60c3bd47a46b76daee970dfd9cd1dd5adc0122491386470791d2bf4ce15af0c66195396ae9eab53f1be34c2d6c1e3255a9e91af1b3d3aedff0004b50447c8f986def91dab27c6de3dd1fe1cf8766d635ad42dec2ced23323492b85fc8773ed58ff1e3e33697f00fe19ea5e25d6240b6f68a0a45bbe69d8f0aa07b9afc8efda93f6bbf13fed35e339af352ba961d2d0edb5b08c958625ed91dcfb9af4b39cf6380a765ace5d3aa3c7e19e15a99ac954a978c13d5f7f23b9fdb97f6e6bdfda6bc66ba65835c5978474f9311420e1ae8e7991febce076afd09fd96edfc3fa7fc03f0cc3e1dfb3b69e74f898f9401dd29505c9f7dd9afc67f30c8fe9db81d057d8bff0004c9f897f103c2f7f2dbd9e8ba86bbe0e9a5f2a72bd2d1bbb2e4fe62be3b29cd1bc637895772ebdbc8fd3b3fc8e9c32cf6784b4630e9dfcfd4fd38f0d6aff6ad0ae34bba93e5d9be02c7a11ce2b977570e71c73e94d818cf10906e5df86f42323a53dc798793ed5fa174b2d8fc7541abd8f41f0c689fd9764add269065891d3dab4d576b7fb38c6297393fd28e86bdba9272773e0695150a7ece267ebfe1db7f11e9135adec515c4120d8c2440c307b60d7c0ffb4b7fc12134af1178aafb50f0a6acba449704cbf6391330ab1f43d547b57e840fbdf874ed5e4ff1c1b5ad0fc37ad5e68d6eb79a9436ef25ac2fd2570385ae3c6e03098ba2d62a37b2f9af43d6cbb3dcc32daf0797cf95c9a4efb3e9777fcf7f33f286d3f690f893fb2a5d6b5e05d3f5d92dd74dba7b67206ffb3ba920f979e82bea0fd83be07ea5f1c3c33ff09c7c43d4b52d7a3bc73f61b4bb99bc96c7f1b28c03ed5f0378e6ef54d4bc6ba95d6b4b32ea535c3bdcf9a3e7dc4e4e6beeff00f82537ed19e20f1b5bcde09bab3b77d2743b6f320b851b5e2c9e10f639e7935f9c70be2a9d4cc161b15293846ea31bbb5efd57a1fb6f1e60eb61f23962f030846a68e734926d6cf95dafabdb5d8facbc33f0b7c3fe066925d2749b3b19253b9da38c2927fa7e15ebdff0462f845ff0bebf6fcf1d7c4ab884cfa2fc33b44d074c764f905e4bccac87fdd04715e35f1afc7b1fc33f857ac6b521dad676ee514f77e8a3f12457e8ff00fc1137f66dbafd9b7f605f0a26a30490f883c5dbfc41aa89066459ae3e60a4ff00b23a7d6be878ff00170a30a784a7a26f9acb6b2d169eba9f0de0fe5f5b178aad9b62af2e55ca9bd5ddeaddfd343eb2d4f538f48d3a5ba9b6ac50a96249af048dae3c7be3d58d4331bc98927fbabffd615dbfc79f17ff00a0c5a5c0fb5a51be719e9e829bfb3ef858db58cfab4d1e7ccfddc27b8f5afc9cfe8427fda63e21dbfc0efd9c7c41ac13e5ae9f6263b73d332361171f89cd7e08786b5e6f18f8abc4de249b7349aadfb2a3b36e0d1c64aab03efd6bf493fe0beffb463780be0ed9f856d2631dc5c7fa548a1bef48ff00ba8908ef967cff00c06bf3a7e19784459e91a468f0c7b7cb44465f7eadfae6803dcbe0924b77e0bdb76be645e6110ef1d57ffd75a3ab781639642f6ede5b373b3f86b6f44d3a3d274b82d620a12140a00f6ab0e091c1a01ebb9e7d77e1fbcb294ab42d9f5519aad258dc4637794ca7d4835e91b3239514d306e3fc3f951763e6695933cddade4284306f66c74a410c817e66dd8e8735e926d030e76fd3147d862ff9e69ff7cd023ce19b775c7fdf35161bfbc6bd2ffb3a1ff9e6bf9527f65c1ff3ce3ffbe4509db603ce636dabce4d350287f9b77b67bd7a21d0ed49ff00531ffdf34d1e1db366dc6dd73ec2ab998eefa9c4e97a3dd6a93ec48cedfef9fbb5d5695e0db7b34dd21134b9cfb0ad48e0fb3c5b63c2fb638a7c7b81f982fa715227aee57b8b28a48bc968e328c082a1715e05fb49fc23d52eee6cbc45e179bec1e32f08dc0d4747bae86465e7ca63fdd6c6315f436cfde6eef8ac5f19e8bfda1a7b48ab99a3fbbee2803ee7ff00824d7fc14374bfdb83e0458cd2b7f67f8974bc59eaba5b9db358dca8c346ca7e6c6412091c8afad44bbce36b0cfad7f3f3a5789b5dfd8c3e34c7f17bc070cf334657fe125d261247f6a5b03969147fcf55e48c726bf6bbf638fdad3c33fb617c12d2fc61e19bc8efacb5089642e3e565cf50cbd5581c820f208a00f5a638526be03ff82f67ecfec7f66cff0085dde13b7167f12be14ca9a8596a500db24969bbf7b0c98fbc98e706befaf337a13d57d7d6b8ff00da0fe18dafc61f80fe2df09de46b25aeb9a5cf68cac33f790d007e3bfc4afdb93c25ff000523ff008246fc46d4a36b3b1f1668fa289356d2677c496970b8c4b1a9e4c6c738619c67079af80ff64bfd8e7e3afc40f847a7f88bc1fe3e8746d275042f0c0f76edc2b6dc630403ec2bd0bf66bb7d43f681f186a5f087c43e09d26ded7c08afa3eafac5adcc969726089fcbf2982f0c58af20e7a57de5e05f871a3fc37f0759e87a0dbae9fa6d84221b78a3fe01dcfd4f5cfad7d464994fb49babceede5a1f19c45c40b0b08e1d4173a7add29247e637c7cff008276fed25e339221ab5f49e308a3e5366a08aabff0062b9fcabc9343fd85bc41e1cd566b7f1f69be2af0d463e65bbb6d1e4bdb755efb9e304035faf9a27c3df15e8de2f177278bae2f748dc4fd8e6b18f701e8241cd53f8b3aafc44d2efda7f0de87e1df1169aa066cae6e0c3739ee416c257a75b21a2e4eab72f9ebf96a78b84e2dabcbec172dba72ab7e7a7e07e74fc1eff82737c34f1bdd477117c4c8b588d88ff444096f39faab1dc3f2afb63e117c24d17e0a784a1d0f41b76b7b2b7e73905a463d4b1ee6bcbbe277c7af02beaf25b7c4ff00829e20f0f4d1f1fda50d899133dca3c4391ef56fe1ff0085bc03f130c30fc35f8b9ae68570dcc5a65e4be6363feb9ca0362b7cbaa61a8371a5057f9dfe49ff009919b7d671304ab4e497a26be6e3fe47b688fc84dcb990373c76a9402c036de1b91c579178ff00c05f19be06f8235af124de2bf0c789348d16d5ee9ada4b268ae2455193f32f1d2bb5f839e3e9fe26fc2dd075e754b79354b34b868d39552c3240cd7bb471ded1fb349a96faab3b1f2988cb9d0a5ed549357b68efadbe47bd283b45291934a7914b5f531563f3296a30ab06e0551d77468f59b368dd42b37dd6cfdd35a18a47e9c8cd542e9e84ca0a51e567c79fb5ff00fc13b3c3ff001ddae2f6158f44f12aa9f2eea24fdd5cff00d745eff51cd79fff00c13b3f675d6bf668f16f8a34bf125bc71df5f2466ca78cee8e78d4b6ec1f5e578afbdf56d26df5987cbb8c8ddc2b8fbcb5c4788741fec1bdf2db6945f991caf41eb9ae18e5386ab8c58ca4b966b7ecfa6a8eea9c4d9853cb25946265cf4a564afab56d524fb5cf3cd7fc072fed27fb48fc2bf8476aad32f893575d475403909656f8670de8189515fbb1733db781bc2ca96e8b0d9e9b02c71a818c2a80001f80afcb4ff82127c248be337ed43f147e33dca89ac7c3a13c27a149bb729c92f72d8fef0648c67debf443f681f16b431dbe950b6158096523d3b0afc9b8a332faee3aa4a9ed1692f45b9fd13c0793bcb324a3426ad292e697acbfc91e7d79713f8e3c48cc7fd75e5c631e993fd057bee97616fe17d02280158a3b48b2c73f2900724ff3af22f813a22eafe36599d7f776885bf13d2b47f6e0f8b2bf06ff00668f116a61956e2e20fb15b64e373c9c11f82ee3f857ce1f667e397fc151be3449fb4e7eda56f650cde669da5dcc9a8c8a390228018a24c7bbb861feed3be03e8eda8f8a24b99173f654c8cfa9af16f873aaff00c27fe39f1478a9dbcc8f50bb36968ddfc88495fd5b27f0afa4fe03e94b6fe159ae0860d7529c31ee07140ec7731000b15e869f4c89b29f8d1e7a9ddc9f97af1408931485b0334fb2b09b5990476d6f35c3374d884feb5d9f86bf67fd5f52db2dc05d3e3619f9fe66fca87b683b3b7ba9b38759d58fde0bf5a974fb3b8d51f6db5bcd3b7611a96cd7b7681fb3ee8ba6468d71e75fc9df71db1fe5d7f5aed349d12cf44b758eced2de0503f81314a5251dc72e5d15ecfd19e0f6ff0004bc433e9ab73f6308186446cd893f2ae7758d06fb41936ddd9dc42c3fbc9fd6bea662c182465048c32431ed55eff4a87548bcab88a39a31d432eea4a4f73495269eaacbd753e550f95dd8fce9ab3eeec6bdf35ff80ba1ebe59a1492ce6ec623f2fe4735c3f8abf672d574edd258cd0deaaf6c6c71557f2329791e7dce3952bec697356756d06fb40976df5b4d032f19643b7f3aa66451ff00d6140875366194e94a08e3de926254151f7bad0c0f3ef1968aba6df346cb981c6e2319073dab43fe0963fb4a8fd887f6cbff00856fa85c793e0cf8912bdee8aeedb63b5bd1ccb6e3b6181047a6df7ad9f1a699f6ad316455ded00dc71debe6efdb2fc057fe28f84f2ea9a149247e22f0adc47abe97345c491c919c95cfa11d47b552407f44965a8477b691c90b075900280771568a875c30e0f06be34ff822d7edf567fb727ecb1a4ea134cbff0009169e82d35184f0d14ea30fc751bba8fc7d2beca77d839f4a903f17bc4bf066d7e00ffc14f7e3e69315ba4317886ee1d7adf0bc3adcfef1b1ec1988aeed5593e5e38f4aee7fe0ab7e0fff00841bf6f2f877e2a556583c61a35c68b72c07cbe6c044899e3ae0e3f0ae1f923d6bf46e1da919e0a307ab47e43c5b4651ccf9b68b5f7935b5ec90b0ce197d2af413dbdebb798aaadd01c75acc14d75e8c5b68f5afa2f6b6767b1f19530b1a8f9baa346fbc316b7f098e548e54edb9437f3ae2fc5bfb3b7847c40a66bcf0de932c8a41132c21244f70c3907dc1aee34f9f6da6e91be5cfca4f7a9a67f3ad98afcc84107eb5b54c3d1a91f851e761b32c651ab653763e05f1cc7aefc27ff85f7a2dc6bda8ea5e19b4f0f196c21bb94cbf6669b015031e78048af42fd8f65fb4feccbe0c6e176e9912fe42b88ff829f5bdc7c36f81bf113566fdcc9e2ebab0b18723ef246771c7d4035d4fec2979f6bfd963c26c0eedb6bb79f635f3795c9d3c74a2f56a2f7f367e859ddaae530aabed495fd546c7d5dda9719a8acaf62d4ace3b8b79239a09903c6e872aea464106a6afbd8c93575b1f8cd4a72849c26acd68d3d1a6ba31b8a1a8c5248d8a766f608abbb085d40f986eed8af0eff82817c575f839f006ff00548dcadf5c21b3b28c1c3492bf031efd6bdbf76d61fd6be63f137c359bf6e5ff00829f7c23f8591f993e8fa6ce75dd5954fca20888249ff81051ff0002af273cc67d572e9d7a7a3b597abfeae7bdc2b95c733cce961ea6c9de5e91fd1bb2f99faa1ff0454fd9a26fd98bfe09e5e0bd2750dd1eb5acdbff006e6a248c33cb3e1be6f7db8eb5d5fc42d6db5af16df4ccdb955ca20ff6457b96b1756de13f074db52382dece1f2a251d1140c0c7e82be76790dddc993f8a563fad7e1dd5bee7f54f54fcadf858f5afd9e745f2b44bcbedbf35c3fca7d87ff5ebe13ff83833f68a6f07f802d3c3b6b70639a3803346afcb5c4c445171eaa198d7e897842d23f097802013feebecb6de74c73d3e5dcd5f88dfb56e997dfb77fed94ab0ea1047a26977d26b576ce4b131aee8ad931fed02c73fecd21e8be23c8bc05e175f0578374bd35557f730aa48c3f89cf2c4fb9624d7d39f0df42993c31a7d9c304d2c9e529d91ae5b27dab67c17fb31f86f4a2be6c4da848cc00327ddce7d2be9df0df86ac7c35a7430dbdbc36ec8806150703142d50f96ef7563c4fc3ff0135cd5f6bc918b384919321f9bf2aefb41fd9f745d3991ae8c9792ae0b2b1da99fa5767ab7886d34285a6bcbcb7b7814659e670aabf89af28f1afedb5e0bf08bc90d9dc49ad5c47918b5194cff00be78ae5af8ca7415eabb1ef64fc299be695153c0e1e73bf549d97cf63d6b4ed1acf4a8562b5b682045fe155c63f1a8f5ff001259f85acdae752bab5b1b541ccb712aa2fe66be3ff1dfedd5e29f163c9169696fa4dbe7e5d8374c07d4f4fc2bc7fc43e31d5bc5d7ed36a9a85d5f4c4fde9a42c457cfe2b8a30d1d287bccfdd7867e8df9b629c6a6695a3463d96b27e57d8fb13c6dfb737847c34d3269f24dad4c9c116eb88f3fef1e3f2af15f887fb7278b3c612491e9be56876a4103cb1be5faee3fe15e2b2e164e3017dbbd392369e458d1599e4215540e589e0015f3f88cf7175172c5f2a7b25dcfdef873c16e18c9ff007b569fb69475f7f54be4f4f30f10fc5af14691e208b54b7f116aa97c41dd379c73f88e9fa57a97c2cff829078a3c34c21f115b43addbaf1e72feee6c7d7a1af5bfda9ff61f5f87dfb1a786cc76ebff0009259c0757bb60bf348adcb27e0bd3debe16e8715d919e230ad73c9ddea7c84b0bc31c5352af2508b8c24e1a24ad6eaadb5cfd12f873fb757807c7a91c726a4344bc930025f7eec127b06e95ef7f0fbc28bf11a159adee93ec039fb446772c9f43debf1c162f3ceddaaec4f15ea9f0a7e3478b3e0ecc87c3baf6a5a7360656290ec95bd0a9ebf4af421c48e9bb55575e47c0e65e01d3c5272caaa38257d1ea97cf73f5eacfe10e869079777671df646dfdfe1837d05717e3bfd8abc1fe274924b3865d12e9c6775b9f909f52a6be63f859ff000554f15f834dbc3e34f0f8d4ad180dd3db0f2643efcfcb9afa47e11fedf1f0d3e2cccb6b6fae2e977f31f96d7511e43b1f404f0df857b985cdb0d5f48c927d99f8de7de18f10652dfb6a0e515f6a3aaff8079078dff618f16787b74ba54906af12e480bf2ca47d0ff4af23d6fc21a9783f516b7d4ac6e6ca61d52642ad9fc6bf482ceed6ea2f32291258dc643a30603d2aaeb5e1ad27c476662d4adadef15f82258c3022bd18da5b33e0a746a537fbcd2c7e6d4e56485d4e1948c1af39d5f466b3bab9b6650cae36fcdf7483ff00d6afd09f8a7fb11785f5dd2ef2f34756d36e950c8891be63723b6ded5f23fc43fd963c55617725e5b471ea5086c0f238741dbe53c9355cc968c8f3fc3a9f29fec6bf19af7fe098ff00f050dd38dacd247f0e7e294a209a204f976776186d6cf41f7d87b863e95fd0c786f5b87c4be1bb5d41595a3b88c48b839ce457f3e7fb6b7c0fbcf1ff00c21d46c4c1716dade8ec350b22c855e29a3e78f72322bf54bfe0891fb602fed5ff00b12f86efae24dfac69f10b2d4949e62b8880571f9e290163fe0b39f0b9fc61fb22c9e2ed2e369b52f86ba843af47b172d242876cabeb82a7f4af93bc3bafdaf8a741b2d4aca559acf50852e20914e43a300c08fc08afd49f1269763e3fd23c49e11d4238e68352b278991ffe5a472a95271e809fd2bf0f3f633d5af7e0efc4ff00885f0375f691352f873a94d0e9fe79f9e6b02e7ca23e8a54fd08afabe17c64635de1e5d51f13c6996caae1e38a86f1dfd1f53e87470c3e5e462a4b7b7fb4caab8f97b9f4a8e33b93a6df6a96d2f0da392bf36eed5f734d6bef1f95d5e6d790b7abbadb4091a329c7a536d1bcdd2e4ddf757df19354eee5f358367ef1c9f6ab103edd2a6cf7e95d12d657470ca872d38c5ef73f3fff00e0b097da9afecdcd1dfdd79d1bf8a8adbaff00cf38844c42ff003aecff00e09eba92ddfec9fe19395f911d0fd431aa1ff05b8d2215fd977489a31f32eb68ce7dcc6d54bfe09ab73f68fd933453fddb8b85fca435f291a9ecb349bef147e88f0aebe4b08afe767d15fb2078a9f5bf86f258c92167d2e731ae7b237cc07e1cd7ac678af9f3f624b926e35e87774113e3fefa15f406335e9f8778c962787b0d3a8f549c7ff016e2bf0469f499c8e9657e25e6b428ae584a71a9f3a908ce5ff9349b1d4d64591977f4cf5a3a543a8dea58db34b21e14679afb5d6fee9f82549452f7b6398f8b3e3fb3f076817735ddc2c105ac666b998ffcb3451926bd87fe0859fb226a0df107c5bfb446bd0c6b6fe3cb58ed3c2a8e7f7f159293b9d971f2f99f291c9c815f21fc76f026a9fb44788fc25f0cf4b67fed6f88dadc1a7b32824476fb81958ffb3b6bf74be1d7c3cd2fe13781f48f0ae876eb6ba5e83671595ac407dd8e350abfa0afcf78ef1cbda47010da3ef3f36f6fb8fd9bc29c9a2a8d5cde7f149a8c7fc2b77f79cffc7bd43caf072c7ff3da703f0c135e5be0dd27fb73c5b636e3bca0b7d057a07ed1377e5d8e9f0ff7999bf2ff00f5d33e01f847f7336a932f39d91647e66bf383f6531bf6f5f8a63e157ecd1e229a393cbbcd450595be0f3b9f8c8fa015f977fb1c69f6fa969fe29f1448f0ac3aa5e9b4824c60886dc94209f4126fafa43fe0bc3fb410f0468367a6efdb1e8f6126a1388db39771b5063d7906bf33be1ef8dfc4d07c29d174fbed42e36c70077863fddaef7f99b2075cb135c39863a385576ae7ddf02f04e2388b152a51972a8abb6d5ed77a7de7dcbadfed01e1bf036a1179b789a95cdb9dcb6d6ee373e3df902b8bf1e7ede1e28d7da45d1e1b5d12dcf0a71e74c07bb1e3f4af9fbc33a6b69f6dba403cd986e35a2a339c8af87cc33faf5dda3eeaf23fb0f82fc0ae1fcba846ae321edaaef796c9f64bb7a9a9e24f1deabe3595a6d5b51bcd419b9fdeb92abf41dab25176a0fbbf51dea5098fe546c03b57872a9393bc9b3f6cc2e128e162a187a718a5d12dbd0677a08a74838a8f1cd5464d2f78e9d2f6b5d8d99498f8ce6be86ff826b7ecf1ff000bfbf68ad366ba859b47f0cbaea17848e18a9cc69f52c01fa0af9f776d1bb073e83a9afd74ff00825e7ecd87e057ece367a85ec623d6bc51b751b9cafcc88dfead33ecbcff00c0abd4c8f05edf171babc56a7e47e3571a2c8b87ea2a72b54aaf923dff00bcfe4bf3363f6c2b34bdd52c6ce5556b792d1e364ec549c631f4afc6ff00da33e174ff0007fe2eea5a63aedb71219addfb3c6dc8fcba7d6bf653f6b11ff155e9bff5eedfcebe0fff0082907c22ff0084b3c0163e24b38b375a2b6cbada397818ff00eca727f1afb3ce70aa747da2576bf23f923c26e2879766ff0057aaed0ada7cddeccf8cf40b4f3a6dff00f3cce6bd23e1a78506a97a6f2e17f736c7e51fde6ffeb571de0cd224bbf2a38c7cd33e3e95edba26951e8fa6436f18ff00563048ee6bf39c4549425ca99fdb980a30f649a6d3f2fcc95447316137cdbbb1e82b1357f871a5eaa0b347e5c99c8788e0d741e5a9ec280bb474e2b8f4bdfa9e84a3192e5693febee2a782be24fc46f82f2799e18f125e2dbc6462d6462e981fecb6457bafc2dff82b56ada25c4367e3cf0d099578377a79f2d80f531b6771fa115e2a547e355754d1ed7558b65c42b22f41c74af4f0b9c62685b965a1f119f787991e6edcb17878b93ea959fe1b9fa13f0a7f6d5f86bf1a5563d2bc496d0df48066d6f4082507d08271f91a67c4cf0dff00646b6268fe5b3bc1bd36f2b9ef5f98bae7c266b3ccda7cbf74e551bef29f507dab5fc27fb497c42f85cdf658f5dbf9a04f985bdee66849fa139fc8d7d3e0f8a55ad597ccfc3b893e8f8a0dd5caab3f496b6f9ad8fbb7c43e0fd27c5f0343aa69f6b791b02bf3a64e2be5dff827eebcbff04f9ff829d78abe17e7ecbe0df89e835ed014f0b14c0e25847d0127dcd4df0dff00e0a616eb2fd9fc59a2496ed1919bab16deadea4a1e40fa135cb7edff00e37f0efc55f879a07c54f026b16b378bfe18ea31eaf043bfcb9a6b6cfefa223a91839c7a8afa1c366187afad397e87e179d7026779549fd6a83e55f696a8fd61f8adaeb781fc7fe13f10ab6dd3eeae3fb22f9bb7efb98893d806079f7afc83ff008381fe1eea9fb17ffc1417c09f1fb45b56fec1f1622e95ae6d185691700873ee9823fdcafd38f07f8f2c3f6dafd819b55d0eea49a4d6b458ef6c9e33f3a48a8258cffbdc63f1af34fdb3be13e9ff00f0560ff824aea4a6d636d7eeb475d4ed4200ed61ab5b0fdec40fa875963c7a9af4e9d474e71ab0dee7c6d5a71a94e54aa2d1ab3f33e67f0feb56fe23d0acf50b56dd6b7d0a4f11ff00658061fa1ab9d2be74ff008264fc54b8f887fb33dae9ba93326b9e0f99f49bd591be7568d88f987e047e15f45bb891b72f7afd5f0f885528aabd2cbef3f07ccb0ef0d899527d1bfbafa0d93ee7e35614e34b93dc62a034e8dcec2a0fbe3d6baa35125ab3ce945d4b7a9f19ff00c155a65f157ec79e2394f2744d7a241f8b2aff00ecd5e21fb135deb63f674d1574f9a458164b8042b11cf9cffd315ed5f18eca6f8a9fb1bfc70b498f99359eb93dc203d5044c8ffc94d7c7dfb277ed8969f067e151d0af82b3437b2c917b23053ffa16eaf89cc2ba58a8d65b4a3f933f56c928b5829516aee32fcd5cfbebf635d556c3c57aa42ff2adc411807d08271f9e6be95126467ee8af8f3e086a93693addd490fdef2d41fcebdeb48f1ddc6af12a25d306c7ccb9af63c27e59f0e51837ade7ff00a5365fd32b9a8f8a18dab66d3851dbfebd416bf71e8cf7b1c2dcc8b8ef9ae57c69e205be536f04824881c9358b717735c33079a46f62dd2a164cafdd1b5464e2bf56a78750f799fc9388cca7553a715a33bcff00826378697e267fc1522de66669a1f87fe1892e9948f9565b86d80fd4015faf05fca7caf06bf363fe0801e16ff8487c41f1abc7d2dba2fdb35c4d12ce7c7fae820539c1f4dd5fa35ad6af1e87a74d772f296ea5cd7f3ef10e21e2331ab57a5ff03fb0f83f03f54ca70f41ab5a2bef7aea7987c6d0fe25f1ae9fa7dbfccca3691fdd2d8ff0af4bf0fe8d0f85fc3d05a232aac29f313df8e6b82f84963278b7c557baf5c2fc9b8ac4a7a73fe18fd6af7ed43f1163f85bf033c43ad338436768eb07bc8dc28fccd78a7d2b763f157fe0b2bf1ac7c66f8fb75a2db4d2b2eb5adfd95594e54da5b120fe0702bcaf41d33edb7d1f1fbb8b923b7d2b9ff1cea83c7ffb46eb97eecd243e1f8458c0d9cfef5be697f1078fc2bbaf07da7d9f49f31bef48739f5af87e22c53955e447f677803c3b1a3963c5d45ad477f44b446b672dbbf2f6a7eea8d5f7385c63d4d4f65a65d6a0f8861924e7180bd2be4d9fd4d28a8697d862f34bd6b7ac7e1cdf5d0dcef1c2be84e4d695bfc2d5046eb8924f5dabd2a39d1cf2c541338d939c5347dd3d7a76ed5d0f8cbc17fd836de742ceeaa4020f6ae7377ee54eedad9e7dc55c7df5646946719c6528be96f43d97f615fd9ea4fda2bf687d174b7567d2ec6417b7e40ce234e403f52057ed2d959c3a7d8dbdbdbc6b1dbc312a46a07400631f862be50ff82497ecdc7e137c073e26d421f2f58f173fda515970f15b0f9507e382dff02afacdb970d8e40c57e91c3b84f61439edf11fe7cf8e5c65fdb79e4a8537fbaa0b963eab797ab7f81e03fb58923c59a6f27fe3ddbff42af1bf11786edfc67a2de691751a4905e42d0b861c60f15ec9fb590c78b74dff00af73fcebcbace3126a11a91c6f5fe75ec72dd59f5dcfc76855a949aab1f8efa796d667c08ff06eebe147c50d6747bf8d964d264f2e3dc38915b9523fe0245740381e95f5effc1463e052a783b49f1cd941fbc8cfd92fd947f07f039f7cee1f957c82700fcbf77b57e559c619d1c4b4fe5e87fa1be1e712433bc92962a1f125cb2f271d3f1dc5cf1453734e5e4d7987db85230ce294518cd0034f38f5155756d12d35a8765d46aebd8e3906ae05a318a71d1dd04538fc2cf1df1ffc3b7d20b16e6190fee9d7b7b1ae0f57d199ad26b5932b1cc8637c7f103fd2be90d73498f5ad2dede450ca412bec6bc6f57d2f65c4d0cc9b5a362a33dabd1c3e21c9da47938ecb6957a52f68ae7d41ff0006e77ed3927826efc51f0575db8666d0a7371a47987fd659c8c48c1ff649c7b0afb3bf620d423f82bfb4afc63f83322a436b6fa8ff00c257a2c39e3ecb7a59e6007a09cbff00df42bf34be227c3bd4bf641d17e07fed05a65ac8b1e8f2adbebef127fc7c585d36431f6538ebd057daff00b637c45b7f851fb4d7ecf1fb43697340da16ad71ff00087f88274f9965b6bd5df6ee48e31e622f27fbd5fa961eee8c5b3fce7e26c3d2a19ad7a14be08ce697dfa1f16fed77f0fd7fe09b5ff056cd634af2cd9fc3ff008dd17f6869f8004705eee52c3fefa247d64af68d5b57b6d02c65babc9e3b5b3823def2cae15517b926bddbfe0e15fd8e6e7f698fd893fe12ed1211278b3e17de47e21b09221979615f966407fba118bfb9415f993fb41f89eeff006aad47e1c782ecaf645f0dea5a326bbae490c9832c600548cfb33735f6196e78b0397d49d5d54355f33f33cdb85e79b66942387f75d47cafe5d4fa5be1ff00ed17e06f89babc9a7683e29d1754bc8c13e54174af21fa0cf22bb48cb349cf0081d3a75eb5f10fc7efd97f43f0f7c20fed2f02e916ba1f893c278d42c27b38c472bb272ca48e48619cd7d29fb247c7587f68df80ba1f8923907db2684437b1f78a74f95f23dc8cfd0d77f0c713c7366e325669ede563cde3ef0ff13c39522f9f9d497cae79a7c0bf0da6b9e24f8ede14bc8d5d6e35094ec6fbbb2684f35f8fde3ef0f49e17f1beada748be5bd95dc90951db0c457ed52e932fc3dfdb6669a3ff00905f8f3462a30318b9839fd50357e4dfedc3e1e3e11fdab7c6f67b7e5fed39245f60c735c59e45c28c64d6cdafd4eee14ad1962a74ba4a2a5fa3fc4fd09f840b8b9be3feca8fc726bbdb7b96b370d13159335c4fc2945b3d2efaea4da89b80cb1c0e3ad76169730df8dd1c8b22e33943babd5f0da2e8f0fe193d1fbcfe4e4ceefa545758bf123329c3de8a74e0ecb44e34a09abfadd1d8697e2682e6cff7ac1644ea6b3fc43e36fb3e9775f64f9a458db0587078ac2431beddbe66ece3a75a8aec092ddb6f4653c9afd12be32a4a8b8c7d0fe65c0e494638a8cded7bdbb59ea7dc9ff06c9ea526b5ff0004e36b8b83ba693c477e59fbb1f30f5afbb3e2da1ff842ee218fef5d3ac23f135f097fc1b2769f61ff008274c96ecdfea7c4b7ca4e3afef0d7df9e2bb4fed0bfd32d71f29b8f39be8a0ff88afc02b4bf7b3ef7fd4feb9a297b3496cd2b7a7428785e28b43d6e0d0602a1ed2cc4d3a8fe12e46d27eb86af90ff00e0b5bf1e62f86df082cb4369bcb122bea37401e0c5182147e2c41af78fd99be2241f16fe32fc5fd5219b7da693acdbf87a3607201b68dd9c83ee661c7fb35f94ff00f05c9f8e4df13fe34dfe836b73e75bdfdec7a34015b3fb98f9908fa8158d49a8c79a5b1e9e5d86788ab0a1157949a4979b3e51f843a7dc7fc21cba85d8ff004dd7267bfb9cf5df3317c7e19c57afd95bfd92ca387b460571de1fb20f7f676f8db1c38031e82bb865f98d7e5b8eafcf51c99fe96700e530c0e5f0a71564a2a3ff000475843f68bc8d4ff14817f0af56b1b08ec2d9638d76aa8f4af31d130baadbfa798a7f5af56618e95e5caf63e9b31a92ba426d56ed4d6251770a76ea63b601ecb8e49e82b35a9e5ed7661fc43bbfb1f86cc65be6b8650b9f639fe953fec8df01eebf68df8ffa0f862da1678669c4f76e06447021dcedf90c571de3cf10ff006d6a8ab1b1fb3c59031df1debf4a3fe0895fb377fc20ff000cf56f889aa43e5df78888b7d383ae1a3b543d7fe04d939f4af6723c1baf89e4e9bb3e4fc4ce2a5c39c3753114ff008b53dd8facb45f72d4fb1ac344b7f0dd85be9b6712c76da7c096e8a0708114003f4a98f4a0bbcb712927a927eb5575bd561f0f687757f792471dbd9c4d3ccc4f088a0939fc057e9efdd8e87f9cb3e6c46214926dce5b79bd3f33c07f6acd7ecae7c7b6b671dcc2f7d6b6dba5843659149e09fad79c593edbe85bb34ab9fcebe37bbfdb1eeb5efdbb6ffc4d7d27fc4975e9db4fda5b2b14209588fe0d835f60c12893cb6c8dbc3820f04571e071b1c55f93a33ec38cb83313c3b88a546abbb9c14afdafbaf9687d39e20f0059fc56f8257be1eb95568b50b778fe619c31fba7f03835f941e3af0b5d7803c57aa68b7d1bc77da55cb41229f407afe583f8d7eb6fc21d496f7c3489bb71da1f3e8081fe15f187fc151be071f0af8d2dbc6f6a85adf5c061bd2170239547cadf88efed5e2f146054a97b782db73f4bf00f8a9e07319653397b95b55db996ebeeb9f271ff0026953934c09e5f029c9d6bf3e7e47f664636ba5b0ea534945210504d1d450c78a071dc6b36c42dd96bce7e2b697e46bf04d1ae56e80dc3d4e715e8cdf739fc45666a5e1eff00848fc5be17b450acd75a9450056e8727a66b6c337ce9777638330a8a96167565b24ff23ef9f1e7ecbfa67c65fd86edfe1eea56abe5dd78763b3f2ba846f2863f235f19fec6f26a9fb507fc133be2c7ecf5e249261e3cf86b14b656258e26592cdfcdb6913d37247b41f4afd3ed320fb169d1c6a14054551ec00c57e5b7ed21e367fd82bfe0b23e1ff195aed8fc23f12047a26be17e58a2b86506295bd49fbbff000235fb1463cb18a47f99b99621d7c5caabfb4dbf9b67e84ffc1357e3e5bfedadfb01f84f50d5238e4d4a4d38e85aedac8c1cc33c2a61951fdcedc9fad7e3e7833e087fc283fdb5be367851750fb7dbf86f535b0d398b6e30d9677a45ed8f6afb4bf62af88d0ffc13d7fe0a9fe30f837a9cdf67f87df1c91fc53e0e9b388e0be2774d6e074c30321273d420c735f23ffc14874fd4bf644ff82b35feb17d94f09fc5681516e0e76c7729c306ed9dc3d7a735c99bd2956c24a317fd267b3c2b8aa586cd6956abb26edf3476b75189e26571feb86cda7a153d4578afec7be2283f65ff00da53c49f0df527fb2e97e2a9db55d09d8e119db978b3ebd481ed5ed0f731c8f186923dcdcc7cf2df4af31fdab3e06ffc2d8f09c73e9b68c7c55a4cc26d26ee39fc96b4941cee2c0138e3a63dabe5b85f389e5d8ef6d7b2d9fa773f4df10b85619e6572a09fbf1d535d3c8f63f8ad0add7c6cf87f71e67931692f797b7523f09143f6695324fa6e615f909fb7778eac7e207ed5de32d4b4d912e2ce4be648a54e5640bc6457d79f1a3f6dfd6adbf64af187857c656f0e97f1274d8a2d384cad8fb7dac8ea1a44e3bae73ef5f9cd24ecd23151f78e6bf58ceb32862e947d93beb7fc0fe65e1dc8ebe06bd475e2d4e3eed9f6bddbfbcfd57b7f0cc5f173f67592c6291ecd75eb06922981c32170483c7e15e49ff04f6d0ae7e1febbe30f0feb97527f6d5a4cb88a7909cc5d9973db39e95edffb3fa21f821e162ccc5bfb3a21c77e2bc07fe0a53e1cbbf0569fa4f8d342b8b8d3353dcd6173736ae62778d802a0918f7afaca986a383c251af864d2a714addd58f87a99d6273dccb15471d3f7f15394dcbaf3b6ddfd1bfb8d6fdab3f6d49bc11e3ad3fc1fe13b880df5e48a97b7a8779b6dcd8da9fed75e7b715f47688aede1fb51236e93c85dcffc4e48e49afc92f872f36a7f167459249249e496fa22eccdb99b2e3ad7eb8d8296b289547dd8978fc2ab87f1f53195275e7b6df233e2ec969e574b0f86a4936af77d5bee7df1ff0006e6d98b3fd87f56857e558fc557eb8ffb686bed3f8d7e3cb4f853f0bfc45e29be916387c3fa6cf745db8002a16fe600af87bfe0853e3ed07e167ec5fe269b5ed634dd1eded7c5fa8167bab958801e61e99393f415c7ff00c16a7fe0a9fe12f1d7ecbfaf7c25f863737de29f1a7c41b67b3b792c23221b585594c8ecc71e98e9ce6bf33c554a70ad5149eb77f9b3f63cb68d4ad469b826fdd4b4ef6477dff04b8f8aa7c39ff04a9d63e284d3eebaf17ea3a96bfe639f99a49a422307dc600c7a57e54fc60f114bf13bf6a2b9b8919a48fc336db5998e737131dcdf88191f8d7d75f0c3f69cf09f843fe08f5f0ffe1fe83a84c750f0e9963f115b4d1f9725949082cd1b8f42ce083df6d7c5bf0db4fba93497f105d2b7db7c4d3bea522b760e7e51f80af1f37ace3846e1d4fd47c28ca6389e21a6eb2fe1dddbd363bdf08c1e6deb37f757f5ae9d4e6b0fc170edb4999bab3902b690e17a57e6f88f88ff0043b23a7c9838dc7dacad6974921e70c08c57acdbdd09ece39172cb2283c0af23219837e95d4785bc7ffd9564b6f711bb2c630a41ae796a746330ee7aa3b8fd38cf35c5f8dfc6a26492cedd9846ff0024920eff004aa5e23f1edc6b1134316e8623e8dc91580afe632a10b442296ac9c1e0b9573cfe5ebe675ffb3e7c22bcf8e7f1a7c3fe13b18e467d4af1239180ff005708f9a46fc14135fbb1a0785acfe1b782b47f0ee991c70d9e976c96f12a8c0014015f047fc115bf67b9347b3d63e236a766a26be46b1d2ddd79440c37b8fae319f4cd7df6bfeabe7cb3eece49e95fa1f0fe0552a3eda4ace47f0cf8fdc673ccf398e5d465ee515adb6e67bbf5e9e819e6be54ff0082b37c7d7f853fb3e4ba1585c18752f15b1b5c86f9921ff9687f11f2fe35f562b81b99b854e58fa57e36ff00c1483f68193e3ffed39ad35bccd2e8de1d63a658a03f2b143977c7bb647fc06baf3cc67b0c2b8c77969e8787e08f0a7f6bf10c2a5557851b4e5d9ff2fde7cc5e2a7305d42db9b7ec3835fa03fb1c7c5d4f8c3f07ec649e5cdfe909f65ba4cfcdb97a13f518afcfdf198c5c43fee9af54fd833e30ff00c2b7f8c71d9dd4de4e97af62de604fca927f037f4af99c8f14e94d36f467efde33f0cff6960aace92fded2d55bb2dd7f5d8fd7efd9ff00c44afa2593312049981cf6073c7f4ae83f693f8431fc71f839ac787648d649ae2167b473ff002ce55e50fe605795fc12d5f6dbdd590661f30993faff00215efde12d786b364a1be59234dad83d6beea718ca938cf67fa9fc5f97e2a797e2e389a2ece124d79bbfe8f73f1b355b29346d5ae2ce7568ee2d5cc72a30c1520e0d47b4a36d3d6be8bff8292fc126f873f18ceb76b12ae9fe23cca768c289bf887e3d6be718f8666e79ee7bd7e438cc1bc2d69507d0ff004738573ca39c657471f4f792d7d5692fc492814673484e0d7358fa2e562f6a1b81499a4278ef485b203c574ff00f435f13fed05e0db19235914ea2272187ddd80b5730bf33edfcebd37f607b05f12fed610b7caf1e8d612ce73ced63851fcebd1caa8fb4c4c63e68f90e3ac6fd5b22c5cefac60edeb63f4391be43c6d0a76d7e5c7fc155be1bff00c341c3e36b3819bfb46d24175a748bf7a2b8b7e5083ebc11f8d7e9d6bfadc5e1ed06e2eee245558d19cfae40ed5f9cbe34d586b5aeea5a84ec479d732cc4fa82c4ff005afd6cff0038e7acae782fc79f18eaff00b73ffc1273c0ff00193446687e2d7ece9a9c525d18149b848e36114c99eb8dde5487d91abe82f1ce8de19ff82f2ffc136344f145a5c43a7f8cacb6adc48a32fa5ead12e1bdf64983cfa1af9e3f611f893a6fecebff000510f137c34d7e1ff8b75f1cace6f2ade451e40ba2a43ae0f1864320f72c2b1bc3ba5f8b7fe0df0fdbbf58d27509bfb5fe06fc4a6cf991dc2e2de32dba394c59f9648f80481ca8c66a6eadcaf608c9c5d96e79b7ecbdf127c4ba27c73d4fe1d7c4a8a787c6be188cd8431b26d57863031367b970473dc60d7d27147e55cb28665566dc722b85ff00828a7c5df843affed4bf0dfe317847c53a2ea9fdab6e74bd67ec52664085079523a81d861493d315b117c59f0b5ef1178834b6590e5099c0273f5af81e20c1b8d7fdd2d1a3f74e0acd9d7c072d6694d5d6af56ba1f267fc15efe1ac771e1dd0fc516f6ccd3413fd8ae2445ea84120b1f6200fc6be0cdafec2bf683e277c36d17e3b7c2fd4341bd92deeac6fd0289227490c6c0e55872790706be1cf1c7fc1247c596be2299743d42caf74d3cc6f2b18dc727823d7fc6bdac9733f678754abbd5773e6f8c786f135719f5ac27bca56bdbbd8fa9bf66b76bcf807e1393eeb2e9f1e47af1d2be1afdb67e3978bfc45e37d63c1dac5e1934ad36f99e088460617f879ee2bdf6d740fda665d0acf4ff000df8160d0349b78bcb82333c26445ed92ce0e7f0ae4bc5dff04c1f8ddf1a3c40dadebcda1417f708aae5ee30c31d33b0115fa3675c5381ad84851a755e9a793f33f08e19f0ff0034a38e9e32b61eea4fddef167c91e01d6ee3c35e2fb1d42deddae66b29927f2f19dfb4e7f2f7afb33e0beabf1bff006bcb89352b7d48f843c33928970b08fde7b26465b1eb5e97fb0f7fc12f9bc0fa4f8924f88b6f1b5d5d30b4b68e170c042305dc375f9f81ce0800fad7d55a8e91a5f85b4bb2d234ab686d6d74f4f2e28e250aaabd8715f9fe378a6ae1633a3827db53f63c97c3da18dad1c56694d697566b5bf99f307c3ffd93fc53f0f75bbc85b53b5d761b8b8fb5c5a86a72bceb6f230cb32da9fddeeddceeeb5ebbf0cfe11d9f81afef354b89e5d5bc417aa16e351b9fbc547f020fe05f615d85c5e4766bba46551ee6b91f1ffc54b5f0b6837575bd21b78d71bdf80cc78007b935f27531f89c4cafd59fa961f29c0e5f4bdc8f2c62b65d0e2ff6a282d749f04b68fa5c51c3a978e3518ace468c7cd29392ec71e88a6a6f88fa0c7a04da5da4388e1b6b5110c0e9b4002b9af0a4375f10ff00689d0e1ba6325b78374b7bcb85ce717772576023d5515ff3aee7e33c5ff1e52776056bebf30a72860a3cddd1f21e1ae611ff005be33a7f0cdcbeee851f08283a716fe1de6b4bb5667838ff00c499c77dc6b4c1f93f0afceeb7c47fa0796ffba53f443d7eed29eb4d53f2d3b39a83d07b91cc403f85741f097e1cdf7c5cf89be1ff000de9ca5aeb59bc8e05207dd4272eded8504fe15cfca3cc46071b783ef5f7c7fc117ff67b5bbd5b54f889a9db1c5b8365a7164ea78dee3f967dcd7765b8375f111a6f6dfe47c4f883c514f87f25ad8f93f7d26a2bbb92b2ff0033ef5f859e00b0f859f0ef47f0fe9d1ac36ba5db2c0aa06dc90393f89c9fc6b7c7cc08c6770c62873ba4dcc1791d4535c13c0efeb5faa538c6297647f9938ac53c4569d7af2bf336efddb3c57f6fcf8fd1fecebfb376b5a824db354d4a2fb0d92648632c83191f4049fc2bf174cd34d3bc92b192695cc8ee4f2e49e49f7e49fc6bec1ff82c17ed0bff000b1be38c3e0fb394be9be148c79a54fcb25cb8dcdf5c2951f5cd7c7cad935f9ef10639d7c472c365a1fdf9e04f09bcab208e2eb457b4afefc9f551d3957dc73fe34ff5d0fd3fad62c53c96d3acd196592375752a70410722b6bc67f35cc43ab01d3d2b10b60d71d1d228fa6cddc2ad6a89ababbf9dcfd45fd88fe3e8f88df0f743d659d5ae2dbfd0ef533cab2e01cfd460fe35f5d699a9c9613c73dbc9f2901bd9857e41ff00c13c3e2faf827e25c9e1fba988d3f5ec6cc9c2a4ebd0fe2383f415fa7bf09fc6eba9411e9f7520f3a1188d89fbcb5f7d95d678ac3dbaec7f08f88dc32b28ce27457c12d63f3dfee377f6b9f8696ffb43fc04d4ad6dbcb9358d350ddd9a746dea33b47fbd8c57e60b23433346e8e8d192a430ef5fab4a7c994ccb85382bf5afcc3fdba7c2faa7c01f8f37d1aaf99a56b84df5a7ca76aee2772e7d8e6be778ab04a7cb88a7d3467ecdf47ee2af7aa6475a5b7bd0bf7b5a497e6603c8a87ad2afce3dab89b4f8bc88bfbeb566cf74607f9d594f8bd6130c35adc2fd31fe35f13ece47f55466de875dd169a4ac9f286ae51be2b69e07cb0dce7df1fe358dadfc53babf8992d516da3618dc7ae2854a572252d19d0f8cbc710f8693cab76596e5f8014e767b9afa03fe0917650c3e21f1b788efa45558224b62edf78b31dfc7e55f13ea7e218e06903379af27279ea6becaff00826bdb4a3e0f6a77ccb86d43512a003fdc047f5afa6c870ffed48fc8bc6acd6387e1cab4e3f14b963f7eff0081f4c7c63f889278834abc94168ed6de27da9d3231819af85bc71e20225fb2c6dbbbbe2be9ff00da13c6b1785fe1dea70ee5fb649194001f5af8b7c53e2f83c35a15e6ada8cab15ad8c0f34eec7190067f3ed5fa2c4fe13f23e65fdbd7c69717df17fe1b787bc2e9bbc6963aaa6a36f70bf7ad54038c9ec32437fc06be94b3fd89fc3bf1135a8bc49f126eafbc7de2bbc456b9bfd52777552464a4699c2a0e80015f1d7ec33e2393f68ffdb1bc53e36d4d449158da3b5929e7c9cc8a8807fc00b57e8ee83ab25f69b0af988af18da467d2be433eccaa4713f578e9a1fab7056474658478b9c79a4de89f60f0bfec77f0e3c331a9b1f0b6851a85e0fd8227c8fa95c9abf7bfb30783750b5689bc37e1d68dbb3e970fff001352b7883ece98fb62c6178c6fc539350b8986e13332f5c87af9ff00ac549a5777f99f6d1cbe9c572f2a4bb58e07c45fb037842ee291f4db7b8d0ee32087d32f25b45ebfdc460bfa5258fecdf67a1daa5aaeafaf37963059af37973eb93cd7a08bfb851c4cfcf1cb66abcb365fe69e30ddf2d55ed5c9930c0461a4745e408fc372738ce4d73faef8f22d29d96354caf0599b8addba56b8b568fe5f9d4a83fddaf19f1c7ecd767ae4b235d1d65b7927cc8754b85c7d02b8c7e15cfccaf69bb1e95349a6f46d746ec6deb1f175eecf96accd8cf08368ae6eff00c577573965658c7d393f8d72b77f0335ed0a2f2f41f105dc31c79db05f28b846fabb8327fe3d5cdf8b3e1c7c54f14694fa6da6b3e1df0fbe306f218da49243ec189da0fe75d14e85193d6673d5c562209ba74ddffba95bef649f18bf687d17e18db4925ecf71a86a7b311d8db032cd293d06d5e9f535c4f81fe0b7c46fda1aeffe13af8836f37847c03a1b8bbb3d298625be65c95de3d0019c9fc2bdabf664d6bc2bfb3668d0daf8cbc130da6acaff00e93e25891b525b96eeef236e95013cede40ad0ff0082897ed31a0defece2d6fe18d734fd426d798595a0824cb967c0394ea30b9ea075afb4cab0387a50e78c94dfe47e47c499d66389a8e9d783a697d9d55fcefb3f43c9ff00630d7d7c69aff8c3c40cade67886ff00cf8bda18cb2a7e1835e91f1961ff00894d9cbfdd948cd79c7ecada72f83b52b1d2a31b634b2f281f561b73fd6bd4be2dc5bbc224ff00cf3941aeccce1cd8561e1de23d9710e1e7de6a3f7e8731e0e6ff00406ff7cd6b0e958fe0aff8f3b8fa8ad85fba2bf2badf11fe956572ff006380e1c8a5a60e2927dd95e0fb11599e94b672353c17e0ebcf885e30d3743d3d4c97daa5c2dbc2a07763d7f0193f857ee2fecfdf08ac7e057c23d0fc2b631ed5d2ad51247ff9eae465d8fd58935f9fbff0471fd9ce3f18fc48d43c75a847e659e80be459971c34ec0648ff00741c57e9b32f94fb7f840e0d7de70be094284ab4fe296c7f11fd2278cbeb999d3c968cbdca3ef4bce4fa7c901e2a1d42de4bdb09a28a4f2e4910aabe3ee92383f854c68ee6bea378f2ccfe69a73e47cc9eb7d3cba9f06f8bff00e08aebe30f136a1ab5e7c42bd92f351b97b9949b453b9dd893ce3a0a820ff820b09177278fae1777ad9aff00857dff00a5d9ff0068cbfee9ae9117cbb755feed78f5323c1b97338a7f367eb386f1ab8be94634e962fdc4924925a25a5b63f1e3e387fc1227fe10cf1b49a72f8c1a6f2620db8db6339fc2b8a7ff00825bb7fd0d8bff0080f5fa11fb5949ff001782ebfeb8a7f2af341d28fec7c1dad18a47254f16b8a2757da4b157efa2ff0023e46d2bfe0995a8685a8c3756be2c48aead6459a17101fbc0e476afacb414bad3b4db5134e1ee238d5649506ddcc07247d4d58269c3eed7561f070a0ad03e5f8838ab30ce553fed0973385eda2d99d8f877e33de584490dd42b710271bba3d78dff00c147f47d1be31fc059351b58e51ad7875fed508d996923230e99fc01aecf1c557d4b4e8b54b57b7b84f32de7568dd0f460460d6988a2ab529537d51cfc399c56cab31a58fa1f141a76efdd7dc7e597f6fdac2a17737af0b51bf896207e5dcfec462b77f693f860ff00087e316ada36c22dd5fcfb66ecd1313b40fa722b850769afceea616107e8ec7f7f65f9eac761a18bc3bf76496bebd3e4cd893c51c7cb1fcdef546ef5db89815ced5f6aa725cc718cc9f2afae6b3afbc4d041b9557ccfa511a71b5c75b30714d4e468cd202bb9f1b873c9afba3f63cf1327867f668d161b4c9babc679de4fee16ff00f557e76ddeab35ec80337c8c7007a57e87fc14d17fe11af851a0d9e3fd459a67f2cd7d26434ad5dcfc8fe7ff001bb36e7cbe9d18fda9dfee445f1e75890f8399e49373cb282ece73d2bf247fe0a31fb664de3dd66e3c15e1ebcc68d652117f34471f6b901c6dcff741cfd6bea8ff0082c2fedcf6ff000b3418fc0fe1bbc89fc417cac6ee489813a7c646307d1cd7e58f85b429bc63e29d3ec63df25c6a370b102792cccd8e6beab99463cd23f99a8c1ce518af89e87d3dff0004c03e36d1bc45e22d43c3fa4da6a1a58b502e56e494dec1810a8c3f8ce0f5e3d6beb8f875fb72f82fc5dac49a46a5349e13d6a06f2e5b3d4079655ba6037435d77ecf5f0774ff0080ff000bf4dd02c163592388493b05f9a4948f9893f538ae5ff68ffd8f3c27fb44697e65f5aae9faca8cc5a95baec954f6dd8fbc3eb9f6af80c66370d88c537563a6d75d3d7c8fdcf29cab1f97e0610c1cef2ddc5edf267a80f1769b226f1aae9d246d820fda1391ebd6b67c3ff12ad510c305dd95d2af659958fe86bf22fe3cfecafe3ef81fe246b1bab5d4f50b59188b6b9b4df2a4cbd8f1920fb541f0e7e097c62778eebc3ba3f8aa191ba49148d09fd48ada3905151e7a5596be5ff04f39f1962154f6353092d3b36dfe47ec3def8daea61b61d902b75ee4d664b72d2c85999d98f72d5f14f81fc4dfb507c2ed0e192e3458bc510a8005b5c08de78ffde61863f8935a97dfb6c7c66d0e6f2352f853e5dd60310a921183f4622b825965452d251979f36bf71ee53e22a138a52a528bece323f40be555e7703e8c2a446cf6c573de25bbd27c65a5bd9c97d7502918f321668e44f7071599f0d3c3f65f0e6c2e215d7b53d6239e52ea6fe7f35e2e00da0e0715c8f92da9e97b4a8e76e5b1d85ce990de8fde468dee40ac9d47c03a7def54f9bfbc074ad486f21b91b96443c740d4e92ea0853e791157d4b547b86d1e7b9c3eaff07d5bccfb3dcbaab0271bf1fa57c95fb727ece10e9de1cff84fb41b78d758f0ecab713c51c7b56e63e84950305867af5e6becef10f88e1fb2bdbdb33317e37f6fa5715e234b1bdd2ae2c6fc2c90dd46d1c88dc870460d6f81c53c3d4bc7639733cb638fc1ca35b7b3b7a9f387ecc5e3783c5d7da16ab17ef16f23e573f71b1cd7bafc4cb6fb4783ae3f03f957cbbfb33d8c3e0ff1a6ada45bc812df47d75e1854f558d8e4015f5578d079de15be1ff4c8903d2bf45c44b9b0affbc8fc4f8765f56cf285fa544fee91e7be0bfb937d6b6c7ddac8f07478b191bbb1ad80302bf29adf11fe9ce571ff0063a6c08c9a9f46d1aebc4dac5ae9b671c935d5f4e90451a2e4b331c540cc31fcebeb5ff8247fece8ff00153e35c9e2abd837e8fe1500c7bd7e596e5bee8fc073f856f83c34abe223423b48f3b8cb8829e4993d7cc2acbe18bb79be8bef3f437f648f8176bfb3bfc03f0ff86a08d567b7b6592f1f1ccb3bfcce49eff3123e95e92570694858f0171c0c6076a691839f6c01ea6bf56a746308282d91fe60e698fa98ec4cf1389d6552577f3d4a7e22f1269be10d2a4bed5b50b5d32c611fbcb8b99562893b72cc4015c81fda8be1b0da3fe13ff06ee518ff0090c5be0fe3bebe52ff0082d77c705d1be1e68fe03b5936dc6b130bcbd07fe7827dd1f8bedfcabf35dace02a9fba8d80c804a8c0af9dcc33e587aae946175dcfe80f0dfc078f1164f1cdb155e5454afca924eeaf6beba9fbdda2fed45f0c2c631ff001707c17e649d47f6cdbf1ff8fd697fc3557c34ff00a1ff00c1a7e9abc1ff00c557f3fe2ca156cf951e7fdca71823c7dc5fcabce7c552b7f0ff00168fb98fd17f011d563e5ff80475fc4fd5afda7be37783754f8b3737169e29f0ecd0b449b5d7518994f1ea1ab815f8afe173ff00330e87ff0081f17ff155f983e30f96fe351f740e056589587f137e75d31e2294a37f67f8b67cde2bc00c353a8e1f59969fdd89faa63e29f8658fcbaf68bf85f45ffc5529f89de1916eccde20d1430c8e6fe3e7f5afca296c657e7ed370b9e701cd5697c3925d0f9aeae796ce4c878aafedf9758d8e07e0452bff00bcbf2bc51faf906a76d35b46f14b1c91b2860e8c195fdc114d3a9c61c7cccdec3b7bd780fec05f1222f883f08a2d2e798c97de1f3e43027e6922fe13fd2bdf06930a3b6ddf5f4787ab1ad08d53f9ff003eca6be598e9e0abeb283b5f4d574763e63ff8291fc386f127c3c87c536767bb50d15ca4e51726580e3afd0ff335f05bf88eee588a9f97d0af715fb0de20f06d8f89f40bcd36f177dadf42f0c81b9e1860d7e5a7c5ef83ebf0efc79ac787f50836fd8a7645c640743ca91f515f3b9e61631a8ab7467f43783f9f56c5612595f3a52a7aa4fb1e6b2eb50c4196eae9620fcfef240a2b3aefc5fa3da37cdaad80c73f35ca7f8d6a5e7c04f0bdedc799269f348d9e8d3315fd4d78ff00ed3ba2f807c21e12bcd3ac34b59f5c9d36c62dd99da27cf249e83e879af3f0f49569286ab5e8958fb4cfb199a65b879e26aa872abb5794b5b6b64adbbe876da97c7ff05f856f6ddaf358b768d5c348b09f30900f3d322ba6fda6bfe0b7771abf85dfc3ff000cf4b9b4f568040755bc5025418c12883207d4fe55f14fc38fd9d7c6df173c416fa5787fc37aa6a37d7adb618d212031fa9e057d69f07bfe0df7f8ddf1045bc9ae2e8be12b79393f6bba5964c7fbb196fd6beab0382a5878c929731fcd3c61c4d8cce254feb34fd9a8a6d2b3fbeecf87fc4fe25d43c61af5c6a5aa5d4da85f5e399669e772ef2b1ea493c9aeebf644d42c74bfda3bc2371a83451dac37c3cc690e157208193f5c57d79fb49ffc1307c05fb0ff00c36d7b5cf13eb975e25d4b4f5f22d2141e4c32dc30c018ea4039af25ff008273fec85a7fc73d4eefc4de208e49347d2dfcb8e053b44d2e33ce3b0ad31b88853a129cfb58f9ec8f0b57158c853a0b99deff0071fa390de4178ab2dbc9b94afde46dc08f6a96455daa77b37d6bc675af849e22f84e5af7c1178fa869ff007a4d1aee53b900ff009e2e7bfb31c568fc35fda26d7c637125ac9bacf548389ac2f6330dc44dec0fde1ee320d7e71f544e3cd4b53fa0a8663152546bc7927d9ecfd19edda67866cf57b55f32551203c038e2af47e05b3855b75cb2e013cf0335c2d878c2d64da7cc68641c1cf735a0faf47226e3719f72f5cca335a1d914af78bb12cc3c899d576b2ab755ef59b7fafc56b72cbb9bd4e0d55d57c4f1c30b792fb9cfa0e95cc3ddb4aeccd9dc4d553a777763ad51a566cf1ff855f17be2f7ed09f1356fac74f5f06f84ec270278eee1dd2dd283ca8cf3b88f4e057d3175aa416d7505bc93471cf3731ab9dbe61ef8f5a99215849da02e7b01c0ae73e2dfc368fe2a782ae34b5b96b1bb9066dae93224b693b3a91ce7f4aeaad5296224b952823968e12b61a9394a729cdefccd25e8974323e3dfed1ba0fece3a043a878826bcf2e7256358212e1dbd323a578d59ff00c15abe1e5d49e5cd65ae4299ff005de5ee07f0c57a2f843fe09fd64e2dee3c5ba86bde37923e635d4ae8982223b88d703fefacd6b788bf64ef0bc5232af85746f24744fb1a8dbf42057453965d056a9793ee8f16a7f6c579735271a6974b7337f338597fe0a55f0c5f427bc8353badd8e216b761203f4af9ff00e2b7fc152e6bfbb9a1f0be8ff31c85b9bc6cfe2147f5af54f8b9ff0004edf0978e82cd696775e1f9e33867b3ff005727d5483fa62a8fc3bff82767817c0b742e6f61bed6ee232197ed526114ff00baa07eb9af4a8472b87bed36df4678b982e20ab6a57515dd75f4eccf2dfd8a3c7b71e2ed5b5dd4b52b881b51bbd412e9d72158f5c90bd8722bef0d4c0bef0f4dfdd921fe62bf387e3af87ffe19f7f6bdb59f4d56b3d3f5078e558d3e5408c70540f415fa2169ac2af80acee976b2dcc298cfb8afae8ca3530f75b58fcc69d39e1f318fb47ef426afe7add9ca6816bf65d1a21fc4dc9abf9dd49b3c98d54745a55e3f2afca2b7c67fa9d818c561695bb125869d2eab7d15bc2ad24b33048d07566270057ed17ec1df0023fd9e3f678d174b68d5352bb8c5e5f30ef2bf247e19c57e76ff00c12dff0067693e39fed1d67a85d425b43f09ff00a75cee195965e91a7d72777fc02bf5d95428c2eddbdb1dabec785f03be267f2ff807f237d23f8cbda6229f0fe1a5eec5734adfccf640abb7a7ad47777b1e9d6f24f232ac70a97624fdd001c9a99177b2afdd0ddfd2bc17fe0a31f1e17e06fecc1af4d0c8aba9eb319d36cffbc1a4e188fa26e35f4d5ab2a549ce5b5ae7f3470ee535733cca8e06927cd3928e9ddbb7e5767e63fedbbf1b65f8fdfb47f88f57699a4b382636566bd9628ce063ea41af26f2863e94c84348de633333b673bba93ebf8d4ddebf29c455752a39bea7fa89916574b2ec0d2c150f869c5457c8694c5376f1f5a90d33f845627adb459cc78cb8d463ff0074565ecf7ad3f17b6ed5a35ff64566f535ea53f84fcd732ff78630c7cf5346ddbb86e6e7de9fde98c79ad396ed2386fdcf58fd8b7e2a7fc2aef8dba7f9d2795a76a8c2ca7eca377018fd09afd1b0cb22865fba464107ad7e475b4cd0dc2bab15f2cee523aa9ed5fa59fb29fc4f5f8b7f05b4ad459c3ddc2bf66ba00f2aea3927ebd6be9b23c52b3a523f9bfc70e1de49d0cd21d57249adfba6cf446f906e63c74af917fe0a5bf081b669de32b58b0b816b7781c9feeb1fa723f1afae57f7aa723e5cf1ef581f157c056df13bc05a968b7437457d0346a7af96d8e08fa1af571b8755a938fdc7e43c159e54ca73586323dd465fe13f2b76e73c9c29c5517f0d69cd3b4c6c6d5a5639673182cc7d49adcf14f86aebc21e27bfd36f15a2b8b09da0910faa9c5528f9c67a57c2f2725d75b9fdc91f618aa31aaad28cb557d4f6bff827d7871352fda4acd96140ba7da4b71f2ae31f757ff66afd0c91b6a673f746735f14ff00c12e740fb4f8ff00c4baaba922d6d52db3dbe73bbff64afb3b539c5a69f73237dd8e22dfa57d8e4b0ff674fab67f23f8c5888d5e209421f66315fe7f79f8a5ff0005eaf8d326adf15b4ef0adbc8e218a496fa7507e5724e1723e9cd76fff0004d292d74cfd9834b8632b1cd792cb339c753b88af92ff00e0aafe2993c51fb69f8a599b7c767e5dba027eeed400feb5d4fec13f1ef53f87fe0fb8b5d5b4dd424f0b5bce026a71c64c764ec7eeb7fb27d7b519e6165570ce9df67f79f33c178e861f318caa26935a3ec7e8abc6de4aa7cbee6b8bf8b1f01b41f8b16a24ba8dacf5287fd4dfda9f2e785bd88ea3d8f147853c7b1ea56715d43711de5acca1d644395653e86baeb29bedb009630be5bf232719af84e6ab879d91fb9548d1af0b54578bfeaebb1f2afc42f899e3cfd962e7ec3ae68b2f8cb48241b7d5ed976b88fd24038dc077ef8aeb3e1c7ed3fe0ff892638ed7548ed6f5fadadcfee6404f6c375afa02e34f8ef63db24314b16398dc6e53f9d7cfff00b4c7ec03a3fc73f10e95a9693710f86efed5c0b896d931e6a0e7a0fe21eb5df4b1186aaad5d72beeb5bfa9f3f88c06370c9d4c33e74beccb47f27d7e67a22c8aff0075b77bf6a19726b98f0e782bc55f0eede3d2eeefb4dd5adacd563864f29e399d077662c413f415d1c575ba31bd4a37719cd632b295a2d35e477467374d39ae57dbb1ec53780a648be5914b7a11556dbc2d7d1dd2fee54329c86dc2bbaf0b69575e2c485ad2de66599436d7f94a67fbd9fbbf435b1e2bf02cde10b386696e21769320a01f72b97920e5a9d50c53b6bd4e76d03881449857518383c538a2ca769556fc3ad66ea9e2bb7d3ced66592423a29c81f535ce6aff001452d93734d6b68aa7ac9205feb5ac7f962ae4ca94adccf45e7a7e268f8c34ab7b71bd5446c58657d6bcdfc68b0adec6c9b5640a7728f4a67c48fda0bc31e10d226d4b58f116970470a9600dcaee73d828ce493e82be27f88bff00054fbcbdf13dd7f60e876f736bbf113cecdbe41f41d33e95d782c0e22bc9a8c1a5dd9e7e679f60b050b549abf68bbb1fff000538f0fc72ebbe08bf84edb967921200e5b2508fcbfad7d53e11b892ebe0d78772d930c288f9ee42d7c53f133c5de2cf8d1aef873c61e34f0bde691e17d1df6878d4aa82fb48721b9dbf28e6becdf87572bad7c23b392ddb7c7e71642a782a7a735f7197d3e4c33a72776bb1f8c67f89a55731962229c6f66afd7b9afe6f985be5c6deb93d299bf12edfc3debd63c4bfb1df89b4bf0269daed94475486f2ce39e78a31fbdb762a0b023bfe15e53223c17524722c90cd1f0519769cfa7e15f9b66187a942b5aa46c8ff0046f82f89f019d6574a785ab194945689ea9f5baf2f23f513fe09c9e26f85ff00b3bfc00b486fbc77e0bb5d77593f6cbf59758b7592373f750fcf9f941e87a66be8ab5fda9fe19de01e57c40f064cdd309ac5b9cffe3f5f8509671f5f2236627ba8c9a9c5a470bee11aa37b0e95ede1f88d51a71a7082b2f33f20e20fa3bd3cdb1f531f5f18dca5272dbbfe8ba1fbbd1fc7ff0003dc608f177864c63a9fed3840ff00d0abf37bfe0af7fb47d9fc5ef8c361e1bd16fe1bed17c371ee792da5124334ec3a861c1c0207e75f23b5d4995219fe5edb8e2a23b8bb3373b8f4ac731e22a989a5eca31f33d8e04f03707c399b4735a988753953e5565a49f51e839fc314f3d698839a757ceb4efa9fbcc62d2d40d34f4a53d28cf1f850574672be2dff0090cc7fee8aceef5a3e2e18d5636ff66b3b35eb53f851f9ae637fac485ed4ddb4b475aad8e0693dc618db1f2fca4735f487fc1387e2c7fc22bf126f3c397536db3d662df082df2f9cbd7f1231f957ce39c53adeee4b0bb59a19248654e51d18a953ea2b7c2d7746a7b489e27116474b36cbeae06a6f35a3decfa33f5c0bec455c15ee0629ac7119383ea2bf2aedbe2c78a2cc9f2f5ed5117b6276e2af5afc76f195ac8bb7c51ad29ec3cfe2be8567c924b94fe7f9f8118c84bf77885a2d9a776cf6aff828d7c1e6f0ef8ced7c55691ffa1eabfbab9d8bf2acc3b9fa8af9a41e2ba1d7fe2ef8abc61a29d3b54f106a7a859efdde44d2ef4c8e9dab33c37e16d4bc63acc7a769563757d7d29c2c50c659bf4af9faf2f6d36e923f74e19c1d6cab2a8e131d5137495b9ba5bfe01f657fc12f346fb1fc31f11deb2fcd797a9186c75081bff8aafa13e23ddfd93c0ba84bf75840540f5cd70bfb1dfc29d43e0f7c11b3d37568520d42495a69a3560c537631923bf15d17c79d43ecbe029914e1a4709f5afb6cb69fb3a118753f8f78f330a58dcf31588a32e65cf656ed6ff33f9e3ff8289c407ed93e3a56cee6d45d87d09c8afd03fd927e1ae8da7fecbda06962d6d6e2d352b0579d4a02b3b38dcd9f5ebfa57e7eff00c146ee03fed99e3660b8db7a5707db8af5eff827ff00eddb1f83a1b3f04f8add92c73b2c2e9b8f249e4231ec0f635c19ee0ead5c3a74ba6a6bc13986170d8b6b11af368afd0f61f1a7c23f147ecb3abcdac783e2b8d73c193379977a396df2d88eed0f72073c735e85f0efe3fe8fe3ef0bc379a56a96eb01213ca9240b2c2dfdd653c823debd1adbc5f63a85aa959a3db202c327861f53c57ce3fb4afec71a17c63d4ae350d1677f0eea921de6480958666f5651dfdebe6296221597262bddf3ff0033f50ad87af83bcf0369c5ebcadbfc1fe87b4c5adddb9ddf68949038fee9abf6de2eba830d279720230322be61f01f897c59fb21f83e0b5f1e347ad786e39fca8b52b6937c96bbba065ea57f957b77827c77a3fc43d123d4343bf8350b39390d1386db9f51daa6b60670d63aaee8df079a7d61286b1a9d632dfd51d06adad4d7b862aab8e303d2a1f2d76a9f95b70ce6a3bb812e2d2585db1e62ede3d2bc775fd17e2a78335596cf407b1d5b4927ccb796e97f7b183fc04f7c63afa1ace9d14de964562b151a0939c6e9f6dfe67e925b7c41b0f05784e38edb6fda99373b6dc283ef5e19f18ff6875b09834d24d797375948a087fd74e7d14761ee6bccae3e3d78b7c4daf5e5b5c78796d2c55b6dacc2e41dc3d48038ac1f1d787f53f11c3b2c6ea3d3e6baf92e6f31be748fb88fb0273d4f4ac69d1bcbdfd8dbda28c1b85f9b6d8f17fda7fc67f15be23f8b6cf41f0aea90d8c97197b8b5d3c92d64bc60cd374dc79e06318ae3751ff827d78dfc696c971ae7c437b8be51808e24902fb6735f50782fc0f65e07d352d6c22d8b9dcf2487749337f798f526b6047e53371f535ea53cc254972534bd6da9e0ae1fa75e4e78c72937b7bcff0023e3ad23fe096f7f777006b1e2f59202d9222898b63fe0448af65f841fb11f827e115cadd2d9b6af79172b71778620fa85e82bd8164573c53a32a4e5beee79cf1535b32c4d45653fbba9ae1f8770186973429a6fefb79ea73df14bc0f6fe3bf871aa69371b61b7be8190103fd5f19181ec6bc7ff00612f8a32e85f0fa3d0f55dd79656ba93daf9abcb8546c022acfed1dfb65683f0f2daf3c3fa548baa7886f41b78d51f296cc78058fafb567fecd9f0f25f05f87f47d3ee195af2e2e45c4edfedb9c9af7b23a7569c5ce77b33e0b8eb1342b548d3a1694a2acdae87ecb7c37f883a3f8ebc3f1369376b3471c6aad09f95a2c0e857ad60fc58fd9b3c37f1821692e2d16cf50dbf25ddb80ae0fb8e87f1af93f40f10df7863505b9b0b892d665e77a120fd0d7bb7c29fdaf0145b3f13421646c05bb84607fc097fad7b15b0b4ea4392a2b9f2b9467b986575557c0d69424bb3fccf10f8c9fb2778a3e1423ccb136afa6a9ddf68b71968c7fb4bdabcc4e53ef2b2e7ae7b1afd2dd0f56b3f1168e6e2dae2def2d675e4a618367d7d3e95e57f187f63bf0dfc498cde58a7f63ea8b9224847ee9cff00b49fd4115f278ee19ba7530eade4cfea8e05fa44c65cb86e22872b7a29c569ead5fef3e242df3edfd697f9d769f153e017893e135db7f6859349660e12ea105a371ebedf8d714c76f5cfe55f275a954a2ed35ca7f51e539c60f33a1edf035635236dd3baf9f98e4e4d3bb53236cb7e14faca32bea7a621e05213c7e14add29bfc27e94c3a9ccf8bf9d463ff76b2cd6a78bff00e4211ffbb5975ead3f851f9963a57c44fd45a42d834534839ab392faff005f80a5f9a46191bbb67146dc2ee3d28f21ee1e38e3dcd24a76aaaaee27e94e317376429ce31f793b5bbf4f560065bb7e75369ba7cfabde476f6d049717121c4688a5998fb015eddf03bf60df147c51305f6ac1741d19b049993f7f20ff00657fa9afb13e0e7eccfe12f83160b1e93a6abdd756bab81e64ac7ebc63f0c57a983ca6b56f8b447e5fc55e2c65595c7d8e19fb6abb593d13f367caff00053fe09d5af78c8437fe2d91b45b1621c5b45cdc48beff00ddafaf7e18fc16f0dfc20d2fecba069b15a1c61a523323fbb31e6ba5bbbb874e864b8b89a385231c966da0579af8dff68eb7b3df6fa3c69713743330fdd8ff001afa7c2e5d4e82b247f36713f1ee6f9dde38aa8d2be908e892f3b6ff0079e917ba85b6910b4b7b70b0a752ecdd6bc57e347c57b3f1746ba7d8f9cd0c32798663c07e3d2b8df12f8b6fbc4f75e7df5d4930ea173f2afd0572be3ff165bfc3cf006a9abdf5c2a5be9f6d24ecc71d8135dfcbaa67c4f33fb3a7a1f8bffb70eba7c47fb5a78fae33f7758b88b9ff0065c8af37d26ceef56d52dedad229ae2f276091451296791bb0503926bd53e127ecefe3bfdb9be39ea09e15d16e750b9d56f9e7b8b9d84dbda87727748fd0633f535fb39ff04fdff823df827f63ed26df56d760b7f1678e1b0ed7b320f22ccff7615ed8e9b8e4fd2af9ad7f32968ee8f80fe1db7c57fd8cfe1bf866f7e2e786f50b5f07f889bcbb1bf906e9f4f6232ab30fe10c32403e95f41681e20b5f1369305f595c43756772bba29233b830afd16f8cbf07bc3ff1efe1e6a5e17f1369b0ea3a3ea917952c520198ff00baca7b11d735f8a7fb4c78635eff008249fed447c2a9a84de22f03eb117dbac5265d8cb131e54727e643c13d0fa0af9dcc72955973d0d3ba7d4fbce1be309e1f970f8b6dc2fa3ec7d29ae787b4ef14d9c9a7ea36b6f796b30c4914abb94fff005ebcd3e007c39d2fc0be39f1943a5d9fd9ad63be58e203211418d4903f135d1fc20f8f1e1df8d9a28b9d12f63924c8696dce3ce88f5208feb5d8416ab04d26d54dd29ded801726be6e52a949384b4f23f4c546862a70c4d17771fb4bb123c7e6346aadcf403f5a9153ce1bbe61f5a8f7ec9428c6ecf7ed5cdf8abe30785fc25ab359ea9ad5a5a5daa8668cca0100f4c8ae5f67524d7b3d4eba988c3d27cd5656bf7ee7a46a9f0a356d1b416d42548a38e33cc79f98573624df236eda39e80f4af33b7ff828ff0082fc7168eb7de26b8b758f25e0bb5319e3b0cf535e1ffb41ff00c1462d750d227d27c0f1ceb3dc7ca6fdc6dda3fd85eb9f7aee8e59899cb9545dbbbd8f1b11c459752a4ea46a295ba2776fe47d7dbc73fecf5f6a86f2fa3b189a692448a38c6e77738551ea6be5bfd94edfc79e11f09de78a75c9756d56fb57510699a6cee4839e4cd267eeaf4e7fc6b0e4f0378cbf695f889a89d7b5e99bc2ba4bf96df6162b04f28eb1c7fdec742d5b4b2b8a6d4e5a2ddff91cff00dbd2a9420e34a5cf2da2f4b2eed9ed9f12bf6d6f87ff000d8cd1beb11ea376a0e23b3224e7d323815f2bfc60fdbcbc5df182e5b47f0bdbcda6d8dc650240a64b9981f56ff015ed36bfb14780acdd59ac6e267c6583cc58035dc7843e15f86be1fc20693a559d971f3b08c063ef9aeba55307455a0b99f99e5e2e8e658df72a5454e1d547576f367c91f0f7f62df1978d665d4351997475621f7cff00349ebd3ae7eb5f417ec93e32d42e3c4171a5ebb2473df7877505b392603e594763fa51f12bf6bbf0bf81af64d3ed7ccd6752cec105afcd86f4ddd3f0ac5fd9e742d534fd2b56d6b56b73637fe21bcfb5f92dc346a3ee835eee5f52bd477a9a44f86e21c2e5f8682850bb975d773ee532295fad4fa5e9926a17cb146bfbc6ee4f415cdfc3cf13c7e2cf09dbdd2f2db42ca3fbac3ad741a75cc9a74c970aff00bc1dbd457ac7cb1e91f0db57d4be19cad358ea122c8c7e6898e6361eeb5ef1e07f8eba7f8a16182f9459dd1e0331fddb9f6ffebd7ccd63f1023988fb44262f57ad4b5d72cef5c791770eeec01c1ace516dea55ecacb7ee7d75aae996dac58b47710c7710cc307cc01948af06f8c9fb11697e26966bdf0c37f65ea182df666398253ede99aabe08f8bdaa782648ff00782f2d41e6166fba3d8f6af67f07fc51d27c7316db47f2eeb1b9e173863f4f5ae2c56068d74d558dcfaae19e32cd723aeab65f59c3ba4f47ea8f817c75f0bb5cf861a97d975ab19acdd89dac57f7727fbaddeb04caa3f8abf49bc4be16d3bc57a34b63a959dbdddbce306399777ff5ebe73f8c7fb061833a8783e4565704b5a5c1e07b237f8d7c7661c3b5a9de743def2ea7f5cf02fd203018f71c2e74bd94de9ccbe16fcfb1f32ef0e99073499f95be957bc4de1bd43c21ab4963a959cf637719c3c73214247b7b7bf7acfcf15f37284e2ed2d19fd0f87c551af05568cd495aeacef7f9ec735e2f3ff1308ffddaccc81eb5a5e30ff908c7fee8acbcd7a94fe0bb3f38c73b5793f31c1c15dc0f00e2a392500373f77afb577bf07ff66cf167c6f755d274d923b357db25f4ea52dd3fe05dcfb0afb0fe077ec1de18f855691ea3ac6dd6754b7c486599479111ff00657fa9af430b81ab575b68cfceb8a3c44cab25bc272e7a9fcb1d5fdfd0f967e08fec6be30f8ccd1dd0b5934ad25867ed97284061eaa3bd7d8df047f63af08fc1a822b88ecc6a9aa46a37df5c8ded9ff647402bbc4f1fe8f02958ee95228c630061462b89f1dfed65e1ff000d234167236a374a38118f914fb9afaac2e534a92b3d4fe68e28f14b35ce252a719fb3a7fcb1d3ef7d4f5096ee1b78da4631c71a2f2c485541f5af3df1b7ed0363a2f996da7afdb2407890ff00ab535e0fe35fda1b50f194db5da428d9c460ed415c8dc78c750932aad1c6be80735ea47a23f38e64d59a3d33c51e3bd53c5170d35fde348b9e141da8a3e95cc5d78bacecd982ca921c701066b89babeb8bd2de63bb6e18fbdd2b95f8abf16745f825e0db9d6b5ebb8ad6da2036aeff009e66ecabea4d546367764596e763f117e3969ff0fbc3979ab6a1710e9fa7d92932cd31c2afb7d4fa578ffece1fb31fc57ff82d97c456b7d15b50f08fc12d327f2b50d5e48ca9d4f07948fa06e3b0e9debd13fe09f5ff0004b8f1cffc1577c7f67f11be2959df7853e0a699289b4ad1a5531cdaf9ce43907f8303ef639cf1debf713e1bfc37d07e1178334ff0e785b47b3d2747d2e2115bdadac6238e241c0e0548cf07f861ff0004f0f87bfb1cfecd09e0ef86da0c7a747a7aacd35cb7cf77a8328f9a495fab31eb8e07a0ae1a3915d4e3f87ae3b57d9bb16efcc5f9578e370e0fa835e2df1b7e02e2de6d63478f6c6a7ccb9853a7bb2d4b8dcae63c68b6dfc3afb57e6dff00c1c73f00d7c61f01fc33e3eb7863fb4785af3ec97337f17d9e6e157fefe115f737ed01fb4af84ff660f87b75af78b356874db40db618cb0f3eee4ed1c6bd598fa0af817e367c27fda2ff00e0ad13ac725bcbf0b3e113112dadadfe56eb5351f76478f8272391c605438ea55dbdf6ec7e46f84fc6daa781b5786fb49bfb8d3eea16cef8df6e4fbfad7be7863fe0a71e33d22089350b3d3352310c1936796f27d4f35e1df197e1d4df08be2cf893c2b71279d3787753b8d39a4c63cc3148c99fc719ae6a956c251ac939c753d0c16698ac27f026d7ccfa2bc7dff0525f1bf8aeda486c059e8f1c831be15dd2afd18ff85782eb7e2ad43c47a9cd797b752dd5cccdb9e4918b331acfc518aaa385a34fe18863335c5e2acebcdbb1fa9575ff0004bbf09f8aa11a82f876eb6dd7ef3cc174ccd267b9e6ba2f86ff00f04c5f0cf847548ef2d741b78248ce44976e652a474214f1f8d61ea7fb44dcfc268e15b9d7ae2c2de4e232d931a1faf207e945d7ed82baf590f33c6d67e5c9dbed488c2be1e5531928ae46da3f657472ae6e7e48a6bc923d0bc67a441e14bc9b4dba9ada40136908dc6d3c6315e531f88741d3fc44ba1d9b5a5bdc28f363b48f01a34cf2481eb5c77c61fda2f41f087822ff0050b5d5ecf52d48c6c21459c48cce7a670726be75d122f89ff03ed97e2e6bbe17be6d27c4129b2b7bdbf468a296460586dcf24601c638aecc1e5739734ddd3edd0f3337e23c3d0a90a72d7bbd1da3f23ecb96458c48cccabb4e5893c05ae07fe15e7c4cfdb73c532782fe10e8f71269ac7cbd4f5e9818ad2219c151263ebd3ad697fc129e0b4ff828d7c66f117837c791eb1058ae96d3db49a3c8228617c919989049f6c11935f7f7ecdde37d7bfe09c5a95bfc31f891676b2780e49845e1af19595b88206078586f1064249d30f9c1af5b2fca7d9cb9aaab9f239e7157b78fb3c17babab5a1e06dff06e447e09f8010dd787fc5cf71f172c58dc0b99576e9f72d8ff0051b7a807fbc49af98e7bef107c35f1c4de07f891a3cfe13f1a69adb24b3b85da97207f1c47a329afe88be16fc2a6f1adb43aa5c48bfd9922ac88c9d671d411ec7d6b99ff0082827fc12f3e19ff00c143fe1da69fe28b4fecdf1269b191a4ebf68a16f34f61d39fe25f504d7b4f6e55b1f17ed1df9b77e67e26fc24f199f077885637ff008f0ba6daff00ec9ec6bdd9583a06e3079c8af9c7f696fd9d3e22ff00c13b7e229f097c50b49aeb48b8b868f47f155b467ec7a9267e52dff3ce4c632093ce7eb5ed5f0af5e5f11f81ac2e95d59a34f2cb673bf1c03f8d573199d2e3229932311d176f63de9d19dddf3f4ad4f0e680dacdf6e618823e5bdea80834e5bf900f24dc37e3815b7a7cfe21d2dd658fe565c6d2cd823f1ae82081624d8aa362f0bc549e5afa54cb70f53b2f865fb426bda4cd0dbebd6cb7769d04b0b6254faf635edde1af16d8789ac9e5b1b88ee21619207de53e847635f2f8181c7156f45d7ef3c3575e7e9f3496f27729dfeb536d6eb41e966ba1f42f8f7e17f87fe29696b06b9a74572a41547c6d923f707b57cbff0018bf618d5bc2a27bcf0cb36ad63927c86e2e231edd9abdb3c25fb4a599d358f88b6d97d950b3de03fba2a064961fc38af99fe1d7fc16bf4af8d7fb77693f0abc25e1f5d4bc377734b6926b725ced696444762f1a053f2e571c9e6bcbc76574312bdf5af73f45e0cf1333ae1d9a7859de9afb0f58dbcafb33cdb4ff00819e29f891e313a4e93a3dd4b328db3349198e3871d4963d057d3ff02bfe09dba3f84e2b7d43c592a6b57ca437d9946db788fbf76fc78afa4cc10db9dc91c7ba4e59978cfd6b96f197c66d2fc1ea53cefb5dd0ff0096309fe67b573e0f24a54b57ad8f678b3c62cdf36e6a747f73096f6dfef3a5d2ec2d740d33c98218edad231808a8152302b8ff001e7c6ad1742b69ade3906a7372a618cfc80fb9af30f1afc63d57c66cd1f98d6b66dc7948dfccf7ae4d2154e9d7d6bda8c22b547e4d3ab29b6e4dddf5bebeb72e78975a3e2666f37f731b1c88412ab8f4ac55f0cd9e3e68631e800e95a06353da8db9abf532bb6bde31750f075adec0522511c9d9b35c86a1a7369f235bccadba33918eff004af4791154ab10dd71c57997ed47f17bc33f02bc11378835dbaf2648548b68030f32edfb22afa9a42392f8cdf1b341f815e0dbad6b5cb8f2e31910c09ccd73276451dc935ea1ff0004a9ff0082457893f6e4f1d587c70f8f9a7cb63e0fb76171e17f094d91e7ae72b2cca7f8718e31cd5aff008246ff00c124f5efdb13c7da7fed01f1eac5a1f0fc2cb73e14f094c8763ae7724d286edd3031cfe95fb4163651d944b15ba2450a0011147ca8a3f840ed55cc043a3693078774e8ececa186d6ced944514112ed48d40c050071802ae8a42377f3a09cd48011815e27fb607ed93a47ecd9a458e93676371e28f881e24cdb681e1ab21bee35094ff1b7f7225eace78c715d5fc7ef8caff0bb4086df49b36d6bc55abb9b5d274c53b5ae24fefb1e76c6bd58fa572dfb387ec971fc2cd7eefc69e28bc8fc53f12b5b4cea5abbc784b553cfd9ad81c94857a75c9c64d007c4b6bff04cad7c7c4eb7f8a5f1e27d37c4de31d419a7d37498549d2fc36090de4c6a490ce38cb1ee3a5687ed81fb697823f624f86cdaf78a2ebcb9990a58e9d111e75f38e8a83b01dcf415eb7ff0598ff828f780ff00624f8376f26b570979e269a62fa6e93138f3ae1c23019ee146724f6afe6efe2afc47f8bbff000537f8eb75aa1d3f54f126a4ec45bd8d9c6cf069f167845eca07a9eb53ca6872dfb65fc5b5f8f1fb48789bc609a77f652f88a75be16bbf7f97bd41eb819ce735e5f5b5f10b42d53c29e31bfd275a8e48756d26536577139f9a1922f90a1ff7718fc2b16b58ec014518dcc07ad2988a9e547e268b81eabf17ff006b7f11fc60d1e4d36e45ad9e9ee4168e25c962391cd799a47e6a6d3f3375cfb5533f76af699ff1f317d47f3a8a387841a515d51d588c54ebcf9eb3bb3eeaff0082587ecbde1ef893fb4e78074bd4f47d3f515f33fb42f56e53733c68a5b007fbc52bf65ff6cdfd8e7c3bfb5d7eccbabfc3fbab786d62fb396d3248e31b6c67553e5b28ec07423d2bf33ffe08cfff0027bbe19ffb005eff00382bf64d3fd59fa9fe95d78ea7184fdd3c1ca253ab848e22527ccdcbee4f63f2b7fe0dc9fd8f7c65f0bfe3dfc5ab7d5a16b5bdd19d345bab131fcc24572dbf3d9715fb31ae7ec7de18f89bf0ef50f0ff008dad2df5cb2d62130dc5bb2fc880f71fed0ea0f635f3affc1343fe4ff3f68aff00774dff00d166bee41ff1f07fdd35cb1a6dabdcf439a4f767e78783b5df8adff0478f1eb687e205d5be257ecdb7073a7eb3ccba9f83c03feae61cef8307ef76dbef5f797c32f8a7e1ff008d5e07b0f13785752b3d7346d52212dadd5bb878e453e8477f6a83e2f7fc92cf117fd83a4fe55f147fc1013fe48afc45ff00b1c2ebf99a407d8ffb417ecebe0dfda8fe17ea1e0ff1d6876bafe87aa2149609d7e64ff691bf8587622bf1a7f6a6ff00827bf8d3fe094de2092f74d8756f1cfc05bbb82ff6d45326a1e1bc9e04b8fbd18e9bbfc6bf72ae7fe3da1fa9ae17f69cff009366f197fd82ee3ff403401f90fe06ff008477c79a259eafa3ea0751d36f230e9244e086fcba62baeb4d361b0895615c27515f2cff00c12dbfe499f8abfec3571ffa31abeb06fba9fee8a9e602314ea074a0f4aa01a4d249b88f94edf53e94f3d68fe093fdc3401f2eff00c1563e3c7fc2a0fd9aa7d3ec6e9a2d4bc4cdf6288abe1f67573f971f8d7e737ec39f1da1fd9bff006a7f07f8c6e3e6b5d26f3f7f919da8ea518fe0189afa77fe0b83ff00214f03ff00d7197f99af82ad3efd05c4fe857c31fb69d9fed25a3c975e18d52393488c8576b70793e84ff9c546e7ce1f312ddebe79ff0082677fc9a3786fe87f9d7d0c3a8a0520440a72294b64d2f7a075a09129847992edde5548cf1520e94907fc7eff00c0680382fda07e3ef87bf673f87571e21f105e08e18c15821ce64b993b228f5aabff00048cff00826d6bdff0532f8a56ff00b417c6cb19e2f87fa6dc67c2fa048088af369cac8ca7aa0c75fe235f1cff00c170bfe429e09ffae33ff34afe8c7fe09f9ff265bf0dff00ec016dff00a2c5007abe9d630e93670dac30adbc112048a351b4228e0003b0156163d9fcea13ff001fb1ff00d731562801ac703fc2b1fc65e30d3fc03e15bcd5b52b9f26d6c54bbc84f5f41f5ed8ad897fd5b7d2bc3ff6f7ff009245a37fd8cb61ff00a396803baf86be1c6d6a7ff84b358b5fb3eb1a8458b78e4397b0b73cac7ecc460b1f5af3dff8282fedb9a1fec2bf00f50f115fb1bbd6ae80b4d174c88e65d46edf88e355ea79e7e82bdac7fc8347d6bf37bfe0ad1ff2921fd963fec3573ffa21a803f3a7f680ff008256fed01fb7678d341f889f1175c51e20f176a25afec9ff00d5f87b4f20b2e067ef01b57681d4f35fa35fb23fec71e0dfd8c7e1b59787bc23a7c71b2a01757ce83ed17b263e6676eb8cf6ed5f537c7bff00907dafe15e6b75feae3fa1a8b9a1fcdbff00c152fe1c37c2dfdbe7e2569a5645f3f557d4007eb8b8027fcbf79c7b57cff5f5e7fc1753fe5261e39ffaf5d33ff4820af90eb58ec04b63722d2fa191916448dd5d94ff0010041c7e35fb0df05be22fec23fb40fc2ad075ef18681e1ff0ef8912ce3b3bfb3914c47cc8d402d81d41cf5afc774ff5327d07f315051203ffd9, 0, '', '2014-07-30 00:09:16');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD CONSTRAINT `fk_cuidad_barrio` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_depto_barrio` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_depto_ciudad` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_barrio_cliente` FOREIGN KEY (`id_barrio`) REFERENCES `barrio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fk_clientes_contactos` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_equipo_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_accesorio`
--
ALTER TABLE `equipo_accesorio`
  ADD CONSTRAINT `fk_accesorio_equipo` FOREIGN KEY (`id_accesorio`) REFERENCES `accesorios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipo_accesorio` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `fk_cliente_orden` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipo_orden` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
