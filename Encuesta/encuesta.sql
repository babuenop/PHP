-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2016 a las 09:24:20
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_preguntas` ()  BEGIN 
SELECT ID, PREGUNTA, TIPO, OPCION1, OPCION2, OPCION3, OPCION4, OPCION5, OPCION6 FROM PREGUNTAS; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `PREGUNTA` varchar(200) NOT NULL DEFAULT '',
  `TIPO` varchar(10) NOT NULL DEFAULT '',
  `OPCION1` varchar(100) NOT NULL DEFAULT '',
  `OPCION2` varchar(100) NOT NULL DEFAULT '',
  `OPCION3` varchar(100) DEFAULT NULL,
  `OPCION4` varchar(100) DEFAULT NULL,
  `OPCION5` varchar(100) DEFAULT NULL,
  `OPCION6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`ID`, `PREGUNTA`, `TIPO`, `OPCION1`, `OPCION2`, `OPCION3`, `OPCION4`, `OPCION5`, `OPCION6`) VALUES
(1, 'De los siguientes productos cual es el que mas consume \r\n', 'checkbox', 'Leche', 'Huevos', 'Arroz', 'Pasta', NULL, NULL),
(2, 'Cuantas veces en el mes visita el supermercado \r\n', 'radio', '1 vez\r\n', '2 veces\r\n', '3 veces\r\n', NULL, NULL, NULL),
(3, 'Cuantas personas componen su grupo familiar \r\n', 'radio', '1 Persona', '2 Persona', '2 Persona', '3 Persona', '4 Persona', NULL),
(14, 'Pregunta 15 ', 'radio', 'x', 'y', 'z', NULL, NULL, NULL),
(15, 'Pregunta 16 ', 'checkbox', 'x', 'y', 'z', 's', NULL, NULL),
(16, 'Pregunta 17 ', 'radio', 'x', 'y', 'z', NULL, NULL, NULL),
(17, 'Pregunta 18 ', 'checkbox', 'x', 'y', 'z', 's', NULL, NULL),
(18, 'test1', 'checkbox', '1', '1', '', '', '', ''),
(19, 'test1', 'checkbox', '1', '1', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idpregunta` int(11) NOT NULL,
  `votos1` int(11) NOT NULL,
  `votos2` int(11) NOT NULL,
  `votos3` int(11) NOT NULL,
  `votos4` int(11) NOT NULL,
  `votos5` int(11) NOT NULL,
  `votos6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Edad` int(30) NOT NULL,
  `Salario` int(30) NOT NULL,
  `Provincia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Nombre`, `Sexo`, `Edad`, `Salario`, `Provincia`) VALUES
(19, 'Pedro', 'M', 32, 2500, 'Colon'),
(20, 'MANUEL', 'M', 33, 1000, 'Veraguas'),
(21, 'JUAN', 'M', 35, 2000, 'Los Santos'),
(22, 'DANIEL', 'M', 50, 1500, 'Cocle'),
(23, 'JUAN', 'M', 32, 1234, 'Chiriqui');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
