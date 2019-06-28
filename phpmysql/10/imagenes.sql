-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2018 a las 18:18:38
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comercioit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `url_imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_producto`, `url_imagen`) VALUES
(1, 10, 'E:/www/9//images/uploads/Chrysanthemum.jpg'),
(2, 10, 'E:/www/9//images/uploads/Desert.jpg'),
(3, 10, 'E:/www/9//images/uploads/Hydrangeas.jpg'),
(4, 10, 'E:/www/9//images/uploads/Jellyfish.jpg'),
(5, 10, 'E:/www/9//images/uploads/Lighthouse.jpg'),
(6, 10, 'E:/www/9//images/uploads/Penguins.jpg'),
(7, 10, 'E:/www/9//images/uploads/Tulips.jpg'),
(9, 13, 'E:/www/9//images/uploads/pdvhhC6pCB'),
(10, 13, 'E:/www/9//images/uploads/mQE1fb7ddx'),
(11, 13, 'E:/www/9//images/uploads/d0fvFLN9Hk'),
(12, 13, 'E:/www/9//images/uploads/R512TpRJQH'),
(13, 13, 'E:/www/9//images/uploads/WLd3sYX49I'),
(51, 18, 'assa'),
(52, 19, 'E:/www/9//images/uploads/BhH2pL454R.jpg'),
(53, 19, 'E:/www/9//images/uploads/FUGMiuOflh.jpg'),
(54, 19, 'E:/www/9//images/uploads/AuCfActTTC.jpg'),
(55, 19, 'E:/www/9//images/uploads/L87rPulVvT.jpg'),
(56, 19, 'E:/www/9//images/uploads/bK8PH9zgwR.jpg'),
(57, 19, 'E:/www/9//images/uploads/9FH4JZSwDJ.jpg'),
(58, 19, 'E:/www/9//images/uploads/6qIQ0ukNEX.jpg'),
(59, 20, 'E:/www/9//images/uploads/izFwYC6pdU.jpg'),
(60, 20, 'E:/www/9//images/uploads/AllUcxdCxJ.jpg'),
(61, 20, 'E:/www/9//images/uploads/asH63rgpc0.jpg'),
(62, 20, 'E:/www/9//images/uploads/lRt7v9chSx.jpg'),
(63, 20, 'E:/www/9//images/uploads/eq2HU34T46.jpg'),
(64, 20, 'E:/www/9//images/uploads/AN53FFLTTd.jpg'),
(65, 20, 'E:/www/9//images/uploads/s4oD1yKFNO.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `imagenes_ibfk_1` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
