-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-11-2014 a las 20:30:52
-- Versión del servidor: 5.5.40-36.1
-- Versión de PHP: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mvvtech_miturno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `User` varchar(20) NOT NULL,
  `Pass` varchar(40) NOT NULL,
  `IdCliente` int(5) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `IdEmpresa` int(20) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`User`, `Pass`, `IdCliente`, `Tipo`, `IdEmpresa`) VALUES
('upb', 'd4d769dc7edd14036d0d', 9, 'admin', 9),
('anal', '347341c085ab1ff63e84', 10, 'admin', 99),
('admin2', 'admin2', 13, 'admin', 3),
('toto', 'f71dbe52628a3f83a77ab494817525c6', 16, 'admin', 12),
('lipe', '114dde61ee8708c9c30c287ea2b919e1', 17, 'empleado', 11),
('fit', '1977c9daa1d67de51a4651abdb160c09', 18, 'empleado', 6),
('eafit', 'a0822f83ce79553d3ec033afe084e6b8', 19, 'empleado', 6),
('admin', '21232f297a57a5a743894a0e4a801fc3', 20, 'admin', 0),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 21, 'empleado', 3),
('adr', 'de7c54d99428fb909bef013577070f0d', 22, 'empleado', 7);

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
(1, 6, 'Admisiones y Registros', 3, 'Eafit'),
(2, 6, 'Certificados', 5, 'Eafit'),
(3, 6, 'Cartera', 4, 'Eaft'),
(4, 6, 'Caja', 2, 'Eafit'),
(5, 3, 'Dependencia Uno', 1, 'Empresa'),
(6, 3, 'Dependencia Dos', 2, 'Empresa'),
(7, 3, 'Dependencia Tres', 3, 'Empresa'),
(8, 7, 'Desayunos', 2, 'ADR'),
(9, 7, 'Almuerzos', 2, 'ADR');

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
(3, 19, 'Empresa'),
(6, 19, 'eafit'),
(7, 19, 'Asados Doña Rosa');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Volcado de datos para la tabla `tbl_Estadisticas`
--

INSERT INTO `tbl_Estadisticas` (`IdEstadistica`, `IdDependencia`, `Fecha`, `Mes`, `Dia`, `Hora`) VALUES
(68, 2, '2014-11-09', 'Nov', 'Monday', '18:20:17'),
(69, 4, '2014-11-09', 'Nov', 'Monday', '15:20:23'),
(70, 2, '2014-11-09', 'Nov', 'Sunday', '08:20:24'),
(71, 2, '2014-11-09', 'Nov', 'Monday', '11:20:28'),
(72, 2, '2014-11-09', 'Nov', 'Monday', '15:20:31'),
(73, 2, '2014-11-09', 'Nov', 'Monday', '10:20:39'),
(74, 4, '2014-11-09', 'Nov', 'Monday', '10:20:39'),
(75, 2, '2014-11-09', 'Nov', 'Monday', '17:20:42'),
(76, 4, '2014-11-09', 'Nov', 'Sunday', '15:40:43'),
(77, 4, '2014-11-09', 'Nov', 'Monday', '09:25:44'),
(78, 2, '2014-11-09', 'Nov', 'Monday', '19:20:45'),
(79, 4, '2014-11-09', 'Nov', 'Monday', '09:20:48'),
(80, 2, '2014-11-09', 'Nov', 'Monday', '19:19:19'),
(81, 4, '2014-11-09', 'Nov', 'Monday', '16:20:50'),
(82, 4, '2014-11-09', 'Nov', 'Sunday', '10:00:54'),
(83, 4, '2014-11-09', 'Nov', 'Monday', '18:00:55'),
(84, 4, '2014-11-09', 'Nov', 'Monday', '09:09:09'),
(85, 4, '2014-11-09', 'Nov', 'Monday', '10:59:00'),
(86, 4, '2014-11-09', 'Nov', 'Sunday', '08:47:04'),
(87, 9, '2014-11-09', 'Nov', 'Monday', '08:00:05'),
(88, 4, '2014-11-09', 'Nov', 'Sunday', '10:11:59'),
(89, 9, '2014-11-09', 'Nov', 'Sunday', '10:21:07'),
(90, 4, '2014-11-09', 'Nov', 'Monday', '18:21:07'),
(91, 9, '2014-11-09', 'Nov', 'Sunday', '10:21:09'),
(92, 9, '2014-11-09', 'Nov', 'Sunday', '09:29:11'),
(93, 4, '2014-11-09', 'Nov', 'Sunday', '09:21:12'),
(94, 9, '2014-11-09', 'Nov', 'Monday', '09:21:13'),
(95, 9, '2014-11-09', 'Nov', 'Sunday', '14:21:15'),
(96, 4, '2014-11-09', 'Nov', 'Sunday', '09:21:15'),
(97, 9, '2014-11-09', 'Nov', 'Monday', '09:21:17'),
(98, 9, '2014-11-09', 'Nov', 'Monday', '11:21:18'),
(99, 4, '2014-11-09', 'Nov', 'Monday', '14:21:19'),
(100, 4, '2014-11-09', 'Nov', 'Monday', '19:21:19'),
(101, 9, '2014-11-09', 'Nov', 'Monday', '18:21:21'),
(102, 9, '2014-11-09', 'Nov', 'Monday', '18:21:23'),
(103, 4, '2014-11-09', 'Nov', 'Monday', '15:21:23'),
(104, 4, '2014-11-09', 'Nov', 'Monday', '18:21:25'),
(105, 9, '2014-11-09', 'Nov', 'Monday', '18:21:25'),
(106, 9, '2014-11-09', 'Nov', 'Monday', '09:21:27'),
(107, 4, '2014-11-09', 'Nov', 'Sunday', '10:21:28'),
(108, 9, '2014-11-09', 'Nov', 'Monday', '08:21:29'),
(109, 4, '2014-11-09', 'Nov', 'Sunday', '09:21:29'),
(110, 9, '2014-11-09', 'Nov', 'Sunday', '08:21:31'),
(111, 4, '2014-11-09', 'Nov', 'Sunday', '11:21:33'),
(112, 9, '2014-11-09', 'Nov', 'Sunday', '18:21:34'),
(113, 9, '2014-11-09', 'Nov', 'Monday', '18:21:36'),
(114, 4, '2014-11-09', 'Nov', 'Sunday', '18:21:36'),
(115, 9, '2014-11-09', 'Nov', 'Monday', '16:21:38'),
(116, 4, '2014-11-09', 'Nov', 'Sunday', '11:21:40'),
(117, 9, '2014-11-09', 'Nov', 'Sunday', '18:21:40'),
(118, 9, '2014-11-09', 'Nov', 'Monday', '18:21:42'),
(119, 4, '2014-11-09', 'Nov', 'Sunday', '14:21:43'),
(120, 9, '2014-11-09', 'Nov', 'Sunday', '15:21:45'),
(121, 3, '2014-11-09', 'Nov', 'Sunday', '15:21:45'),
(122, 9, '2014-11-09', 'Nov', 'Monday', '15:21:46'),
(123, 4, '2014-11-09', 'Nov', 'Sunday', '15:21:48'),
(124, 9, '2014-11-09', 'Nov', 'Sunday', '08:21:49'),
(125, 4, '2014-11-09', 'Nov', 'Sunday', '18:21:51'),
(126, 9, '2014-11-09', 'Nov', 'Sunday', '18:21:52'),
(127, 4, '2014-11-09', 'Nov', 'Sunday', '17:21:52'),
(128, 4, '2014-11-09', 'Nov', 'Sunday', '17:21:53'),
(129, 9, '2014-11-09', 'Nov', 'Sunday', '17:21:54'),
(130, 9, '2014-11-09', 'Nov', 'Sunday', '17:21:56'),
(131, 9, '2014-11-09', 'Nov', 'Sunday', '16:21:57'),
(132, 4, '2014-11-09', 'Nov', 'Sunday', '16:21:59'),
(133, 9, '2014-11-09', 'Nov', 'Sunday', '16:22:00'),
(134, 9, '2014-11-09', 'Nov', 'Sunday', '15:22:03'),
(135, 9, '2014-11-09', 'Nov', 'Sunday', '14:22:05'),
(136, 4, '2014-11-09', 'Nov', 'Monday', '15:22:06'),
(137, 9, '2014-11-09', 'Nov', 'Sunday', '08:22:07'),
(138, 9, '2014-11-09', 'Nov', 'Monday', '08:22:11'),
(139, 3, '2014-11-09', 'Nov', 'Sunday', '20:10:06'),
(140, 3, '2014-11-09', 'Nov', 'Sunday', '20:10:12'),
(141, 9, '2014-11-09', 'Nov', 'Sunday', '20:11:27'),
(142, 2, '2014-11-09', 'Nov', 'Sunday', '20:11:39'),
(143, 2, '2014-11-09', 'Nov', 'Sunday', '20:11:59'),
(144, 2, '2014-11-09', 'Nov', 'Sunday', '20:16:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_turnos_pedidos`
--

CREATE TABLE IF NOT EXISTS `test_turnos_pedidos` (
  `NombreDependencia` varchar(30) NOT NULL,
  `Cod` varchar(6) NOT NULL,
  `Numero Aviso` int(2) NOT NULL,
  `Turno` int(5) NOT NULL,
  `NombreEmpresa` varchar(30) NOT NULL,
  PRIMARY KEY (`Cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `test_turnos_pedidos`
--

INSERT INTO `test_turnos_pedidos` (`NombreDependencia`, `Cod`, `Numero Aviso`, `Turno`, `NombreEmpresa`) VALUES
('Almuerzos', '02NQ3', 0, 4, '7'),
('Caja', '0SXGY', 0, 26, '6'),
('Almuerzos', '336EU', 0, 23, '7'),
('Almuerzos', '3CRJG', 0, 12, '7'),
('Certificados', '3JE9X', 0, 9, '6'),
('Almuerzos', '427XO', 0, 20, '7'),
('Almuerzos', '4CC18', 0, 17, '7'),
('Certificados', '56I6P', 0, 4, '6'),
('Caja', '5D1XI', 0, 17, '6'),
('Almuerzos', '5G9YK', 0, 31, '7'),
('Certificados', '5RU1E', 0, 7, '6'),
('Cartera', '5SXB6', 0, 3, '6'),
('Caja', '71K3C', 0, 25, '6'),
('Caja', '7YLGF', 0, 13, '6'),
('Certificados', '8EX05', 0, 5, '6'),
('Caja', '8F793', 0, 4, '6'),
('Caja', '8QVMW', 0, 12, '6'),
('Almuerzos', '96U3L', 0, 16, '7'),
('Almuerzos', '9PYUK', 0, 21, '7'),
('Caja', 'ABZQL', 0, 27, '6'),
('Almuerzos', 'AEN2J', 0, 11, '7'),
('Caja', 'BNMWS', 0, 8, '6'),
('Caja', 'CG5GB', 0, 7, '6'),
('Caja', 'D81AC', 0, 31, '6'),
('Almuerzos', 'E4ETY', 0, 14, '7'),
('Caja', 'EZMBX', 0, 10, '6'),
('Caja', 'FPHQU', 0, 24, '6'),
('Certificados', 'G6O7G', 0, 8, '6'),
('Caja', 'GDKWY', 0, 29, '6'),
('Caja', 'GFEXO', 0, 18, '6'),
('Caja', 'GP27Z', 0, 30, '6'),
('Caja', 'GSDSE', 0, 5, '6'),
('Caja', 'HRG0Q', 0, 16, '6'),
('Almuerzos', 'IXYA5', 0, 26, '7'),
('Almuerzos', 'JG1CU', 0, 25, '7'),
('Caja', 'JSBKQ', 0, 11, '6'),
('Almuerzos', 'KPOX6', 0, 1, '7'),
('Certificados', 'LBN1P', 0, 6, '6'),
('Certificados', 'LJQQG', 0, 1, '6'),
('Caja', 'N3OF2', 0, 3, '6'),
('Caja', 'N66JF', 0, 2, '6'),
('Cartera', 'NDUVV', 0, 2, '6'),
('Caja', 'NGHEP', 0, 6, '6'),
('Caja', 'OIQT3', 0, 15, '6'),
('Caja', 'PKMCC', 0, 23, '6'),
('Almuerzos', 'PLMZR', 0, 9, '7'),
('Almuerzos', 'POLHO', 0, 2, '7'),
('Caja', 'PQOMX', 0, 20, '6'),
('Almuerzos', 'PYOQ3', 0, 7, '7'),
('Almuerzos', 'QE353', 0, 28, '7'),
('Caja', 'RJNTC', 0, 28, '6'),
('Cartera', 'SJUSU', 0, 1, '6'),
('Almuerzos', 'SSPJV', 0, 5, '7'),
('Almuerzos', 'TRE2T', 0, 3, '7'),
('Almuerzos', 'U0064', 0, 6, '7'),
('Almuerzos', 'UDW6B', 0, 18, '7'),
('Caja', 'UQKKM', 0, 19, '6'),
('Certificados', 'UYIWS', 0, 3, '6'),
('Certificados', 'V3CUX', 0, 2, '6'),
('Almuerzos', 'V5Q9O', 0, 24, '7'),
('Almuerzos', 'VJ1V9', 0, 27, '7'),
('Almuerzos', 'VNVVB', 0, 10, '7'),
('Almuerzos', 'VSMEP', 0, 8, '7'),
('Almuerzos', 'VUY8T', 0, 29, '7'),
('Almuerzos', 'W8VD1', 0, 19, '7'),
('Almuerzos', 'WF1TJ', 0, 30, '7'),
('Caja', 'WHRG2', 0, 14, '6'),
('Caja', 'Y1125', 0, 1, '6'),
('Almuerzos', 'Y580V', 0, 22, '7'),
('Almuerzos', 'YE8EH', 0, 13, '7'),
('Caja', 'YEJ2J', 0, 9, '6'),
('Caja', 'YQATA', 0, 21, '6'),
('Caja', 'ZE5EH', 0, 22, '6'),
('Almuerzos', 'ZEUNF', 0, 15, '7');

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
