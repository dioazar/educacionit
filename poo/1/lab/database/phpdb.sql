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

CREATE TABLE `marcas` (
  `cod_marca` int(10) unsigned NOT NULL auto_increment,
  `nombre_marca` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`cod_marca`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- 
-- Dumping data for table `marcas`
-- 

INSERT INTO `marcas` VALUES (1, 'SANYO');
INSERT INTO `marcas` VALUES (2, 'SONY');
INSERT INTO `marcas` VALUES (3, 'LG');
INSERT INTO `marcas` VALUES (4, 'AOC');
INSERT INTO `marcas` VALUES (5, 'SAMSUNG');
INSERT INTO `marcas` VALUES (6, 'TOSHIBA');
INSERT INTO `marcas` VALUES (7, 'HEWLETT PACKARD');
INSERT INTO `marcas` VALUES (8, 'EPSON');
INSERT INTO `marcas` VALUES (9, 'KODAK');
INSERT INTO `marcas` VALUES (10, 'PHILCO');
INSERT INTO `marcas` VALUES (11, 'HITACHI');
INSERT INTO `marcas` VALUES (12, 'ADMIRAL');
INSERT INTO `marcas` VALUES (13, 'NOBLEX');
INSERT INTO `marcas` VALUES (14, 'PHILIPS');
INSERT INTO `marcas` VALUES (15, 'COMPAQ PRESARIO');
INSERT INTO `marcas` VALUES (16, 'X-VIEW');
INSERT INTO `marcas` VALUES (17, 'KEN BROWN');
INSERT INTO `marcas` VALUES (18, 'RANSER');
INSERT INTO `marcas` VALUES (19, 'PATRICK');
INSERT INTO `marcas` VALUES (20, 'SIGMA');
INSERT INTO `marcas` VALUES (21, 'GAFA');
INSERT INTO `marcas` VALUES (22, 'WESTINGHOUSE');

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

CREATE TABLE `productos` (
  `cod_producto` int(10) unsigned NOT NULL auto_increment,
  `cod_categoria` int(10) unsigned NOT NULL default '0',
  `nombre` varchar(45) NOT NULL default '',
  `precio` float NOT NULL default '0',
  `stock` int(10) unsigned NOT NULL default '0',
  `cod_marca` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cod_producto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

-- 
-- Dumping data for table `productos`
-- 

INSERT INTO `productos` VALUES (1, 1, 'TV LCD 19" MODELO PFL3403', 2199, 40, 14);
INSERT INTO `productos` VALUES (2, 1, 'TV LCD22" MODELO LN22A450', 2399, 30, 5);
INSERT INTO `productos` VALUES (3, 1, 'TV LCD 32" MODELO LC813H ', 2999, 25, 13);
INSERT INTO `productos` VALUES (4, 1, 'TV LCD 26" MODELO 26LG30R', 2999, 25, 3);
INSERT INTO `productos` VALUES (5, 1, 'TV LCD 26" MODELO CDH-L26S02', 3099, 20, 11);
INSERT INTO `productos` VALUES (6, 1, 'TV LCD 32" MODELO PL3219 ', 3399, 20, 10);
INSERT INTO `productos` VALUES (7, 2, 'CPU LE1250DVD2GB160VS', 2199, 15, 12);
INSERT INTO `productos` VALUES (8, 2, 'CPU A64X246DV2G160VBOF ', 2499, 8, 12);
INSERT INTO `productos` VALUES (9, 2, 'CPU E5200DVDR2GB320VB ', 2699, 5, 12);
INSERT INTO `productos` VALUES (10, 2, 'CPU SG3308LA ', 3099, 5, 15);
INSERT INTO `productos` VALUES (11, 3, 'IMPRESORA T23 ', 219, 18, 8);
INSERT INTO `productos` VALUES (12, 3, 'IMPRESORA DJ-6940 ', 349, 20, 7);
INSERT INTO `productos` VALUES (13, 3, 'IMPRESORA T33', 399, 12, 8);
INSERT INTO `productos` VALUES (14, 3, 'IMPRESORA K5400  ', 499, 8, 7);
INSERT INTO `productos` VALUES (15, 13, 'HOME CINEMA SPH70 ', 319, 0, 10);
INSERT INTO `productos` VALUES (16, 13, 'HOME CINEMA AMX115 ', 419, 0, 13);
INSERT INTO `productos` VALUES (17, 13, 'HOME CINEMA HT E 860 ', 599, 0, 16);
INSERT INTO `productos` VALUES (18, 13, 'HOME CINEMA DC-T990 ', 759, 5, 1);
INSERT INTO `productos` VALUES (19, 13, 'HOME CINEMA HT-1105U', 829, 18, 13);
INSERT INTO `productos` VALUES (20, 13, 'HOME CINEMA HT304SL-A2 ', 949, 6, 3);
INSERT INTO `productos` VALUES (21, 13, 'HOME CINEMA HT-Z110 ', 999, 22, 5);
INSERT INTO `productos` VALUES (22, 13, 'HOME CINEMA HTS3011/55', 1099, 18, 14);
INSERT INTO `productos` VALUES (23, 13, 'HOME CINEMA HT503SH', 1299, 15, 3);
INSERT INTO `productos` VALUES (24, 13, 'HOME CINEMA HT503SH-AM', 1299, 12, 3);
INSERT INTO `productos` VALUES (25, 13, 'HOME CINEMA HT-IS10', 1499, 7, 2);
INSERT INTO `productos` VALUES (26, 13, 'HOME CINEMA HTS3365/55', 1599, 5, 14);
INSERT INTO `productos` VALUES (27, 12, 'RADIO PORT RP 299  ', 49, 5, 13);
INSERT INTO `productos` VALUES (28, 12, 'RADIO DX-365', 79, 15, 17);
INSERT INTO `productos` VALUES (29, 12, 'RADIO ICF-S10MK2/SCE', 79, 15, 2);
INSERT INTO `productos` VALUES (30, 12, 'RADIO ICF-18  ', 99, 15, 2);
INSERT INTO `productos` VALUES (31, 12, 'RADIO ICF-303/304 AM-FM ', 129, 8, 2);
INSERT INTO `productos` VALUES (32, 12, 'RADIO SRF-59/SC E ', 129, 10, 2);
INSERT INTO `productos` VALUES (33, 4, 'NOTEBOOK C2D2VB250WC14', 3699, 12, 12);
INSERT INTO `productos` VALUES (34, 4, 'NOTEBOOK CQ40-300', 2999, 9, 15);
INSERT INTO `productos` VALUES (35, 4, 'NOTEBOOK DV2-1010', 3999, 7, 7);
INSERT INTO `productos` VALUES (36, 4, 'NOTEBOOK DV4-1212', 4199, 9, 7);
INSERT INTO `productos` VALUES (37, 4, 'NOTEBOOK DV4-1212', 4199, 10, 7);
INSERT INTO `productos` VALUES (38, 6, 'TELEFONO DECT1221S INALAMBRICO', 169, 15, 14);
INSERT INTO `productos` VALUES (39, 6, 'TELEFONO CD1401B INALAMBRICO', 169, 8, 14);
INSERT INTO `productos` VALUES (40, 6, 'TELEFONO CD2401S INALAMBRICO', 239, 8, 14);
INSERT INTO `productos` VALUES (41, 6, 'TELEFONO CD1302S INALAMBRICO', 249, 8, 14);
INSERT INTO `productos` VALUES (42, 6, 'TELEFONO SANYO HNS-3300 ', 69, 10, 1);
INSERT INTO `productos` VALUES (43, 7, 'LAVARROPA GAFA 7000 DIG PROGR 7KG', 1679, 7, 21);
INSERT INTO `productos` VALUES (44, 7, 'LAVARROPA GAFA 7500 T750 7,5K ', 1839, 4, 21);
INSERT INTO `productos` VALUES (45, 7, 'LAVARROPA GAFA ACQ7500 GRAFT750 7,5K ', 1939, 12, 21);
INSERT INTO `productos` VALUES (46, 7, 'LAVARROPA LG WF-T1202TP 12KG C/S', 2449, 10, 3);
INSERT INTO `productos` VALUES (47, 7, 'LAVARROPA LG WF-T1205TP 12K TITANIUM', 2499, 10, 3);
INSERT INTO `productos` VALUES (48, 8, 'CAMARA DIGITAL KODAK C813', 549, 10, 9);
INSERT INTO `productos` VALUES (49, 8, 'CAMARA DIGITAL VPCS-870EX ', 579, 15, 1);
INSERT INTO `productos` VALUES (50, 8, 'CAMARA DIGITAL C913', 599, 15, 9);
INSERT INTO `productos` VALUES (51, 8, 'CAMARA DIGITAL 760+KIT', 649, 15, 5);
INSERT INTO `productos` VALUES (52, 8, 'CAMARA DIGITAL ES10', 749, 20, 5);
INSERT INTO `productos` VALUES (53, 8, 'CAMARA DIGITAL ES15 ', 799, 40, 5);
INSERT INTO `productos` VALUES (54, 9, 'CAMARA VIDEO DCR-DVD650', 2749, 15, 2);
INSERT INTO `productos` VALUES (55, 9, 'CAMARA VIDEO DCR-DVD810 ', 2999, 10, 2);
INSERT INTO `productos` VALUES (56, 10, 'CALEFACTOR TB 2400 GN', 459, 12, 20);
INSERT INTO `productos` VALUES (57, 10, 'CALEFACTOR TB 3000 GN', 699, 12, 20);
INSERT INTO `productos` VALUES (58, 10, 'CALEFACTOR TB 5000 GN', 1999, 15, 20);
INSERT INTO `productos` VALUES (59, 11, 'AIRE ACONDICIONADOR SP TS-C096EMAO 2200FS', 1999, 15, 3);
INSERT INTO `productos` VALUES (60, 11, 'AIRE ACONDICIONADOR SP TS-C096EMAO 2200FS ', 1999, 10, 3);
INSERT INTO `productos` VALUES (61, 11, 'AIRE ACONDICIONADOR SP TS-C126EMAO 3000FS', 2249, 10, 3);
INSERT INTO `productos` VALUES (62, 11, 'AIRE ACONDICIONADOR SP TS-C1865DLO 4500FS', 3049, 20, 3);
INSERT INTO `productos` VALUES (63, 11, 'AIRE ACONDICIONADOR SP LS-C1863RMO 4500FS', 3349, 20, 3);
INSERT INTO `productos` VALUES (64, 11, 'AIRE ACONDICIONADOR SP WSX09CG5R 2500WFS', 1599, 15, 22);
INSERT INTO `productos` VALUES (65, 0, '', 2999, 12, 15);

-- --------------------------------------------------------

-- 
-- Table structure for table `usuarios`
-- 

CREATE TABLE `usuarios` (
  `usuario` varchar(20) character set utf8 NOT NULL,
  `psw` varchar(20) character set utf8 NOT NULL,
  `nombre` varchar(50) character set utf8 NOT NULL,
  `apellido` varchar(50) character set utf8 NOT NULL,
  `mail` varchar(100) character set utf8 NOT NULL,
  `edad` smallint(5) unsigned default NULL,
  `sexo` varchar(1) character set utf8 NOT NULL,
  `tipo` varchar(3) character set utf8 NOT NULL default 'dni',
  `numero` int(11) NOT NULL,
  `fuma` varchar(2) character set utf8 default NULL,
  `pais` varchar(3) character set utf8 NOT NULL,
  `imagen` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `usuarios`
-- 

INSERT INTO `usuarios` VALUES ('ariel', 'aaa', 'Nahuel', 'martinez', 'PEPE2@gmail.com', 35, 'm', 'le', 4888331, 'No', 'bra', 'basquet.jpg');
INSERT INTO `usuarios` VALUES ('pruebausuario3', 'prueba3', 'jose', 'prueba3', 'jose@hotmail.com', 30, 'm', 'dni', 300000003, 'si', 'chi', 'men.jpg');
INSERT INTO `usuarios` VALUES ('martin1', '111', 'Martin', 'rodriguez', 'martin@mail.com', 50, 'm', 'dni', 10555671, 'No', 'uru', 'gorro.jpg');
INSERT INTO `usuarios` VALUES ('Jorge', 'aaa', 'Pedro', 'martinez', 'jose@gmail.com', 35, 'm', 'dni', 5555555, 'No', 'bra', 'flopped.jpg');
INSERT INTO `usuarios` VALUES ('hola', 'hola', 'Pablo', 'Marzulli', 'papapa@grassdasd.com', 24, 'm', 'dni', 30333357, 'No', 'arg', 'McMahon.jpg');
INSERT INTO `usuarios` VALUES ('marceloca', '123', 'marcelo', 'cabral', 'marce@marece.com', 60, 'm', 'dni', 60305872, 'No', 'bra', 'jugador.jpg');
INSERT INTO `usuarios` VALUES ('sabri', 'sabri', 'Sabrina', 'Merlo', 'sabrimerlo@gmail.com', 34, 'f', 'dni', 454566, 'No', 'arg', 'spicegirl.jpg');
INSERT INTO `usuarios` VALUES ('car', 'car', 'Carla', 'Gomez', 'cgomez@hotmail.com', 33, 'f', 'ci', 3121222, 'Si', 'uru', 'woman.jpg');
