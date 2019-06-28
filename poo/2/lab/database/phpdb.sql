-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 12, 2009 at 09:44 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `phpdb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `categorias`
-- 

CREATE TABLE `categorias` (
  `cod_categoria` int(10) unsigned NOT NULL auto_increment,
  `descripcion` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`cod_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `categorias`
-- 

INSERT INTO `categorias` VALUES (1, 'Televisores');
INSERT INTO `categorias` VALUES (2, 'Computadoras');
INSERT INTO `categorias` VALUES (3, 'Impresoras');
INSERT INTO `categorias` VALUES (4, 'Notebooks');
INSERT INTO `categorias` VALUES (5, 'Heladeras');
INSERT INTO `categorias` VALUES (6, 'Telefonos');
INSERT INTO `categorias` VALUES (7, 'Lavarropas');
INSERT INTO `categorias` VALUES (8, 'Camaras digitales');
INSERT INTO `categorias` VALUES (9, 'Video camaras');
INSERT INTO `categorias` VALUES (10, 'Estufas');
INSERT INTO `categorias` VALUES (11, 'Aire acondicionado');
INSERT INTO `categorias` VALUES (12, 'Radio');
INSERT INTO `categorias` VALUES (13, 'Home Theater');

-- --------------------------------------------------------

-- 
-- Table structure for table `marcas`
-- 

CREATE TABLE `phpdb`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NULL,
  `apellido` VARCHAR(200) NULL,
  `password` VARCHAR(200) NULL,
  `email` VARCHAR(200) NULL,
  `dni` VARCHAR(45) NULL,
  `edad` INT NULL,
  PRIMARY KEY (`id_usuario`)
);

-- --------------------------------------------------------

-- 
-- Table structure for table `peliculas`
-- 

CREATE TABLE IF NOT EXISTS `peliculas` (
  `cod_pelicula` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL DEFAULT '',
  `genero` varchar(45) NOT NULL DEFAULT '',
  `descripcion` varchar(200) NOT NULL DEFAULT '',
  `butacas` int(10) unsigned NOT NULL DEFAULT '0',
  `disponibles` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_pelicula`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`cod_pelicula`, `nombre`, `genero`, `descripcion`, `butacas`, `disponibles`) VALUES
(1, 'El paciente ingles', 'Drama', 'Durante la segunda Guerra Mundial, un piloto es rescatado de los...', 40, 9),
(2, 'Perfume de mujer', 'Drama', 'Charlie está becado en uno de los mejores colegios de Estados Unidos', 50, 50),
(3, 'El mercader de venecia', 'Drama', 'Situada en la Venecia del siglo XVI, esta eterna comedia... ', 30, 30),
(4, 'Atrapado sin salida', 'Accion', 'Para no entrar en la cárcel, Randle Patrick McMurphy convenció al juez que es...', 40, 40),
(5, 'Lo que el viento se llevo', 'Drama', 'Esta grandiosa superproduccion marco un hito en el mundo cinematografico... ', 40, 40),
(6, 'El Mago de Oz', 'Ficcion', 'Dorothy es una niña huérfana que se siente infeliz en la granja de sus...', 50, 50),
(7, 'King Kong', 'Ficcion', 'Carl Denham es un director de cine que busca desesperadamente una actriz... ', 40, 40),
(8, 'Casablanca', 'Drama', 'Durante la II Guerra Mundial, Rick Blaine dirige un exitoso local nocturno en Casablanca... ', 50, 50),
(9, 'La mujer pantera', 'Accion', 'Irena, una muchacha serbia que vive en Nueva York, se halla en el zoologico... ', 40, 40),
(10, 'Cantando bajo la lluvia', 'Musical', 'Con el nacimiento del cine sonoro en 1927, la industria cinematográfica debe renovarse... ', 30, 30);


-- --------------------------------------------------------

-- 
-- Table structure for table `productos`
-- 
CREATE TABLE `phpdb`.`reservas` (
  `id_reserva` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NULL,
  `id_pelicula` INT NULL,
  `date` TIMESTAMP NULL,
  PRIMARY KEY (`id_reserva`),
  INDEX `id_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `id_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `phpdb`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);