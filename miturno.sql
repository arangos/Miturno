-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2014 a las 11:15:56
-- Versión del servidor: 5.5.40-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `miturno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `User` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `IdCliente` int(5) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IdEmpresa` int(20) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`User`, `Pass`, `IdCliente`, `Tipo`, `IdEmpresa`) VALUES
('Eafit', 'eafit', 1, 'empleado', 6),
('admin', 'admin', 4, 'admin', 0),
('adr', 'adr', 5, 'empleado', 7),
('user', 'user', 6, 'empleado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE IF NOT EXISTS `dependencia` (
  `IdDependencia` int(5) NOT NULL AUTO_INCREMENT,
  `IdEmpresa` int(5) NOT NULL,
  `NombreDependencia` varchar(30) NOT NULL,
  `NumeroTaquillas` int(5) NOT NULL,
  `NombreEmpresa` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdDependencia`),
  KEY `REMP` (`IdEmpresa`),
  KEY `IdEmpresa` (`IdEmpresa`),
  KEY `IdEmpresa_2` (`IdEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`IdDependencia`, `IdEmpresa`, `NombreDependencia`, `NumeroTaquillas`, `NombreEmpresa`) VALUES
(1, 6, 'Admisiones Y Registros', 3, 'Eafit'),
(2, 6, 'Certificados', 5, 'Eafit'),
(3, 6, 'Cartera', 4, 'Eafit'),
(4, 6, 'Caja', 2, 'Eafit'),
(5, 3, 'Dependencia Uno', 1, ''),
(6, 3, 'Dependencia Dos', 2, ''),
(7, 3, 'Dependencia Tres', 3, ''),
(8, 7, 'Desayunos', 2, ''),
(9, 7, 'Almuerzos', 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `IdEmpresa` int(5) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(5) NOT NULL,
  `NombreEmpresa` varchar(30) NOT NULL,
  PRIMARY KEY (`IdEmpresa`),
  KEY `RCLI` (`IdCliente`),
  KEY `IdCliente` (`IdCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `IdCliente`, `NombreEmpresa`) VALUES
(3, 1, 'empresa'),
(6, 1, 'eafit'),
(7, 1, 'Asados Dona Rosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_Estadisticas`
--

CREATE TABLE IF NOT EXISTS `tbl_Estadisticas` (
  `IdEstadistica` int(20) NOT NULL AUTO_INCREMENT,
  `IdDependencia` int(20) NOT NULL,
  `Fecha` varchar(100) NOT NULL,
  `Mes` varchar(20) NOT NULL,
  `Dia` varchar(20) NOT NULL,
  `Hora` varchar(100) NOT NULL,
  PRIMARY KEY (`IdEstadistica`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_Estadisticas`
--

INSERT INTO `tbl_Estadisticas` (`IdEstadistica`, `IdDependencia`, `Fecha`, `Mes`, `Dia`, `Hora`) VALUES
(1, 3, '2014-11-09', '', '', '09:44:48'),
(2, 4, '2014-11-09', '', '', '09:44:58'),
(3, 2, '2014-11-09', '', '', '09:45:09'),
(4, 2, '2014-11-09', '', '', '09:45:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_turnos_pedidos`
--

CREATE TABLE IF NOT EXISTS `test_turnos_pedidos` (
  `NombreDependencia` varchar(30) NOT NULL,
  `Cod` varchar(6) NOT NULL,
  `Numero Aviso` int(2) NOT NULL,
  `Turno` int(5) NOT NULL,
  `Empresa` varchar(30) NOT NULL,
  PRIMARY KEY (`Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD CONSTRAINT `dependencia_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
