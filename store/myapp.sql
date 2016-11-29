-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2016 a las 14:55:00
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `Idarticulo` int(11) NOT NULL,
  `Articulo` varchar(30) NOT NULL,
  `Precio` varchar(30) NOT NULL,
  `Detalle` varchar(50) NOT NULL,
  `Talla` varchar(1) NOT NULL,
  `stock` int(11) NOT NULL,
  `Imagen` varchar(25) NOT NULL,
  `Created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Idarticulo`, `Articulo`, `Precio`, `Detalle`, `Talla`, `stock`, `Imagen`, `Created`) VALUES
(10001, 'Tshirt AC DC', '12.40', 'TShirt ACDC ', 'M', 32, '1.jpg', '0000-00-00 00:00:00'),
(10002, 'T-Shit NighWish', '13', 'T-Shit NighhWish para Hombre', 'L', 1, '2.jpg', '0000-00-00 00:00:00'),
(10003, 'T-Shirt Metallica', '20', 'T-Shirt Metallica para Dama', 'S', 11, '16.jpg', '0000-00-00 00:00:00'),
(10004, 'Buso SLAYER', '23', 'Buso de Algodon Slayer para Hombre', 'L', 3, '14.jpg', '2016-11-28 06:16:31'),
(10008, 'Tshit Motorhead', '25', 'T-Shirt Motorhead para hombre en todas las tallas', 'L', 12, '1480425644-13.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canasta`
--

CREATE TABLE `canasta` (
  `IdCanasta` int(11) NOT NULL,
  `UserId` varchar(35) NOT NULL,
  `IdArticulo` varchar(35) NOT NULL,
  `Articulo` varchar(35) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canasta`
--

INSERT INTO `canasta` (`IdCanasta`, `UserId`, `IdArticulo`, `Articulo`, `Precio`, `Cantidad`, `Fecha`, `Status`) VALUES
(6, '2', '10004', 'Buso SLAYER', 23, 2, '0000-00-00 00:00:00', 'PENDIENTE'),
(11, '1', '10004', 'Buso SLAYER', 23, 1, '0000-00-00 00:00:00', 'PENDIENTE'),
(12, '1', '10003', 'T-Shirt Metallica', 20, 2, '0000-00-00 00:00:00', 'PENDIENTE'),
(13, '6', '10004', 'Buso SLAYER', 23, 3, '0000-00-00 00:00:00', 'PENDIENTE'),
(14, '1', '10008', 'Tshit Motorhead', 25, 5, '0000-00-00 00:00:00', 'PENDIENTE'),
(15, '1', '10008', 'Tshit Motorhead', 25, 1, '0000-00-00 00:00:00', 'PENDIENTE'),
(16, '7', '10008', 'Tshit Motorhead', 25, 1, '0000-00-00 00:00:00', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `rol` int(11) NOT NULL COMMENT '0:Admin 1:User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `created_at`, `rol`) VALUES
(1, 'admin', 'admin', 'admin@localhost', 'admin', '2016-10-22 22:39:29', 1),
(2, 'user1', 'user1', 'user1@localhost', 'user1', '2016-10-22 22:41:44', 0),
(3, 'test', 'test', 'te@hotmail.com', '123', '2016-10-30 18:27:11', 0),
(6, 'Alberto Bueno', 'Alberto', 'abuenop@hotmail.com', 'abuenop', '2016-11-29 08:13:49', 0),
(7, 'Usuario3', 'Usuario3', 'Usuario3@hotmail.com', 'Usuario3', '2016-11-29 08:34:00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Idarticulo`);

--
-- Indices de la tabla `canasta`
--
ALTER TABLE `canasta`
  ADD PRIMARY KEY (`IdCanasta`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `Idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;
--
-- AUTO_INCREMENT de la tabla `canasta`
--
ALTER TABLE `canasta`
  MODIFY `IdCanasta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
