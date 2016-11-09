-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2016 a las 01:17:26
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
SELECT ID, PREGUNTA, TIPO, OPCION1, OPCION2, OPCION3, OPCION4, OPCION5, OPCION6 FROM PREGUNTAS
ORDER BY RAND() LIMIT 5; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_resultados` ()  NO SQL
SELECT DISTINCTROW preguntas.*, Sum(resultados.votos1) AS votos1, Sum(resultados.votos2) AS votos2, Sum(resultados.votos3) AS votos3, Sum(resultados.votos4) AS votos4, Sum(resultados.votos5) AS votos5, Sum(resultados.votos6) AS votos6 FROM `resultados` , `preguntas`,usuario WHERE usuario.id=resultados.idencuesta and resultados.idpregunta = preguntas.ID GROUP BY preguntas.pregunta ORDER BY `resultados`.`idpregunta` ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_id` ()  NO SQL
SELECT * FROM `usuario` ORDER BY `id` DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_progreso` (IN `idencuesta` INT, OUT `progreso` INT)  NO SQL
SELECT resultados.idencuesta, count(`resultados`.`idencuesta`)
FROM `resultados`
WHERE resultados.idencuesta=idencuesta$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrarVoto` (IN `idencuesta` INT, IN `idpregunta` INT, IN `votos1` INT, IN `votos2` INT, IN `votos3` INT, IN `votos4` INT, IN `votos5` INT, IN `votos6` INT)  NO SQL
INSERT INTO resultados (`idpregunta`, `idencuesta`, `votos1`, `votos2`, `votos3`, `votos4`, `votos5`, `votos6` ) VALUES (idpregunta, idencuesta, votos1, votos2, votos3, votos4, votos5, votos6)$$

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
(1, 'Â¿Usted hace supermercado dos veces por mes?', 'radio', 'Si', 'No', '', '', '', ''),
(2, 'Â¿Cual es el Supermercado que usted mas frecuenta?', 'radio', 'Super 99', 'Supermercados el rey', 'Ribasmith', 'Pricesmart', 'Super Xtra', 'Otro'),
(3, 'Â¿En cual rango se encuentra su presupuesto para hacer Supermercado?', 'radio', '50-100 ', '101-150', '151-250', '251-400', 'MÃ¡s de 400', ''),
(4, 'Â¿Seleccione de estos 1 producto que no pueda faltar en su compra? ', 'radio', 'Leche', 'Huevo', 'Pan', 'Detergente', '', ''),
(5, 'Â¿En que Areas considera usted que los precios son mas altos?', 'checkbox', 'Comida', 'Higiene Personal', 'ArtÃ­culos de Limpieza', '', '', ''),
(6, 'Â¿Cual supermercado considera que tiene los precios mas bajos?', 'checkbox', 'Super 99', 'Supermercados Rey', 'Ribasmith ', 'Pricesmart ', 'Super Xtra', 'Super 99'),
(7, 'Â¿Cual Sueprmercado considera que tiene mayor calidad en sus productos?', 'checkbox', 'Super 99', 'Supermercados Rey', 'Ribasmith ', 'Pricesmart ', 'Super Xtra', 'Super 99'),
(8, 'Â¿Cual de los siguiente supermercado es el mas cercano a su residencia?', 'radio', 'Super 99', 'Supermercados Rey', 'Ribasmith ', 'Pricesmart ', 'Super Xtra', ''),
(9, 'Â¿En que momento del dÃ­a le gusta hacer Supermercado?', 'radio', 'DÃ­a', 'Tarde', 'Noche', 'Madrugada', '', ''),
(10, 'Â¿Ha comprado electrodomÃ©sticos en alguno de estos supermercados ?', 'radio', 'Si', 'No', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idencuesta` int(11) NOT NULL,
  `idpregunta` int(11) NOT NULL,
  `votos1` int(11) NOT NULL,
  `votos2` int(11) NOT NULL,
  `votos3` int(11) NOT NULL,
  `votos4` int(11) NOT NULL,
  `votos5` int(11) NOT NULL,
  `votos6` int(11) NOT NULL,
  `sexo` varchar(35) NOT NULL,
  `edad` varchar(35) NOT NULL,
  `provincia` varchar(35) NOT NULL,
  `salario` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`idencuesta`, `idpregunta`, `votos1`, `votos2`, `votos3`, `votos4`, `votos5`, `votos6`, `sexo`, `edad`, `provincia`, `salario`) VALUES
(2, 3, 0, 1, 0, 0, 0, 0, '', '', '', ''),
(20, 1, 0, 1, 0, 0, 0, 0, '', '', '', ''),
(20, 2, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(20, 3, 0, 1, 0, 0, 0, 0, '', '', '', ''),
(20, 4, 0, 0, 0, 1, 0, 0, '', '', '', ''),
(20, 5, 1, 0, 1, 0, 0, 0, '', '', '', ''),
(20, 6, 0, 0, 1, 0, 0, 0, '', '', '', ''),
(20, 7, 0, 0, 1, 0, 0, 0, '', '', '', ''),
(20, 8, 0, 0, 0, 1, 0, 0, '', '', '', ''),
(20, 9, 0, 0, 0, 1, 0, 0, '', '', '', ''),
(20, 10, 0, 1, 0, 0, 0, 0, '', '', '', ''),
(21, 1, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 2, 0, 0, 0, 0, 0, 1, '', '', '', ''),
(21, 3, 0, 0, 0, 1, 0, 0, '', '', '', ''),
(21, 4, 0, 1, 0, 0, 0, 0, '', '', '', ''),
(21, 5, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 6, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 7, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 8, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 9, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(21, 10, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(57, 1, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(57, 2, 0, 0, 0, 0, 0, 1, '', '', '', ''),
(57, 5, 0, 0, 1, 0, 0, 0, '', '', '', ''),
(57, 6, 0, 0, 0, 0, 1, 0, '', '', '', ''),
(57, 10, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(58, 3, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(58, 6, 0, 1, 0, 0, 0, 0, '', '', '', ''),
(59, 6, 0, 0, 1, 0, 0, 0, '', '', '', ''),
(59, 8, 1, 0, 0, 0, 0, 0, '', '', '', ''),
(59, 9, 1, 0, 0, 0, 0, 0, '', '', '', '');

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
(20, 'MANUEL', 'M', 33, 1000, 'Veraguas'),
(21, 'JUAN', 'M', 35, 2000, 'Los Santos'),
(22, 'DANIEL', 'M', 50, 1500, 'Cocle'),
(23, 'JUAN', 'M', 32, 1234, 'Chiriqui'),
(24, 'erty', 'M', 45, 1234, 'Darien'),
(25, 'twertw', 'M', 34, 5423, 'Chiriqui'),
(26, 'PEDRO P', 'M', 32, 324, 'Herrera'),
(27, 'JINNETH', 'F', 32, 1200, 'Panama'),
(28, 'MANUEL', 'M', 38, 2000, 'Panama'),
(29, 'DELMAR', 'M', 32, 342, 'Cocle'),
(30, 'JUAN', 'M', 21, 120, 'Chiriqui'),
(31, 'ANAHIS', 'F', 21, 800, 'Panama'),
(32, 'LUIS', 'M', 21, 2000, 'Panama'),
(33, 'CARMEN', 'F', 43, 700, 'Darien'),
(34, 'ALEXIS', 'M', 33, 399, 'Cocle'),
(35, 'ANGEL', 'M', 33, 499, 'Los Santos'),
(39, 'ANGEL', 'M', 33, 499, 'Los Santos'),
(40, 'JOSE ', 'M', 45, 899, 'Panama'),
(41, 'LORENA', 'F', 54, 3456, 'Darien'),
(42, 'JUAN PEREZ', 'M', 32, 1200, 'Panama Oesta'),
(43, 'ARGELIS', 'F', 34, 3000, 'Bocas del Toro'),
(44, 'YOLANDA', 'F', 55, 2345, 'Veraguas'),
(45, 'MIGUEL ANGEL', 'M', 45, 234, 'Los Santos'),
(46, 'ESTEBAN', 'M', 34, 3000, 'Colon'),
(47, 'MARIA', 'F', 34, 2000, 'Veraguas'),
(48, 'JOSE MIGUEL', 'M', 54, 4567, 'Herrera'),
(49, 'JUAN MIGUEL', 'M', 14, 100, 'Bocas del Toro'),
(50, 'JINNETH', 'F', 32, 1200, 'Panama'),
(51, 'SANDRA', 'F', 40, 345, 'Panama'),
(52, 'KAREN', 'F', 24, 1000, 'Cocle'),
(53, 'JINNETH', 'F', 45, 1233, 'Herrera'),
(54, 'JUAN PEREZ', 'M', 43, 1200, 'Chiriqui'),
(55, 'PEPE', 'M', 21, 1212, 'Cocle'),
(56, 'PEDRO', 'M', 23, 100, 'Cocle'),
(57, 'XIMENA', 'F', 32, 1000, 'Cocle'),
(58, 'ANGEL', 'M', 43, 1234, 'Panama'),
(59, 'hola', 'M', 23, 4567, 'Colon');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`idencuesta`,`idpregunta`),
  ADD KEY `idencuesta` (`idencuesta`),
  ADD KEY `idpregunta` (`idpregunta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
