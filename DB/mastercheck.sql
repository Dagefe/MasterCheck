-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2017 a las 20:50:25
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mastercheck`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `id` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `movil` int(8) NOT NULL,
  `provincia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`id`, `nombre`, `apellidos`, `email`, `contrasena`, `movil`, `provincia`) VALUES
(1, 'Roberto', 'Ruiz Vazquez', 'roberto@roberto.com', 'gI8u7zXHK1nREq4JR1Quvw==', 644721223, 'Madrid'),
(2, 'daniel', 'guerrero feu', 'daniel@daniel.com', '+rmQpnr+2rwHUlOCB2B7fg==', 2147483647, 'Cordoba'),
(3, 'tonel', 'madera ', 'tonel@tonel.com', 'CEyeYRG+swweetcjbUCyRg==', 2147483647, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empresa`
--

CREATE TABLE `Empresa` (
  `id` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `movil` int(8) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `poblacion` varchar(100) NOT NULL,
  `cp` int(8) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Empresa`
--

INSERT INTO `Empresa` (`id`, `email`, `contrasena`, `contacto`, `movil`, `pais`, `poblacion`, `cp`, `direccion`, `nombre_empresa`, `sector`) VALUES
(1, 'prueba@prueba.es', '26d7f3226fbee170bbb20f2dd2c84b644238769d', 'prueba', 434343434, 'prueba', 'sdfadfafak', 0, 'jljkjklj', '', ''),
(2, 'refsad@adffd.com', '26d7f3226fbee170bbb20f2dd2c84b644238769d', 'dfakÃ±m', 43234, 'lkdanÃ±fam', 'kmafdnasÃ±fk', 0, '33321', 'dsfsdlk', ''),
(3, 'daniel@daniel.com', '+rmQpnr+2rwHUlOCB2B7fg==', 'daniel', 2147483647, 'Daniel and company', 'dafsfdaaf', 0, '23123', 'fsafsdfads', 'dfasdfsasfd'),
(4, 'tonel@tonel.com', 'CEyeYRG+swweetcjbUCyRg==', 'toneeeee', 666688858, 'EspaÃ±a', 'Cordoba', 29890, 'calle culinario', 'Toneles', 'Cortador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Favoritos`
--

CREATE TABLE `Favoritos` (
  `id_favoritos` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `id_ofertas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ofertas`
--

CREATE TABLE `Ofertas` (
  `id_oferta` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` blob NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` int(8) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ofertas`
--

INSERT INTO `Ofertas` (`id_oferta`, `nombre`, `imagen`, `descripcion`, `precio`, `fecha_inicio`, `fecha_fin`, `tipo`) VALUES
(1, 'Naru', '', 'Oferta 2x1 cerveza nacional', 2, '2017-05-13', '2017-05-31', 'bar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  ADD PRIMARY KEY (`id_favoritos`);

--
-- Indices de la tabla `Ofertas`
--
ALTER TABLE `Ofertas`
  ADD PRIMARY KEY (`id_oferta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Empresa`
--
ALTER TABLE `Empresa`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Favoritos`
--
ALTER TABLE `Favoritos`
  MODIFY `id_favoritos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Ofertas`
--
ALTER TABLE `Ofertas`
  MODIFY `id_oferta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
