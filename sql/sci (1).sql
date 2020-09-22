-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2020 a las 01:10:29
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sci`
--
CREATE DATABASE IF NOT EXISTS `sci` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `sci`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos_judiciales`
--

CREATE TABLE `distritos_judiciales` (
  `id` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `distritos_judiciales`
--

INSERT INTO `distritos_judiciales` (`id`, `id_region`, `nombre`) VALUES
(1, 1, 'CHALCO'),
(2, 3, 'CUAUTITLÁN'),
(3, 4, 'ECATEPEC DE MORELOS'),
(4, 1, 'DISTRITO JUDICIAL DE EL ORO'),
(5, 1, 'IXTLAHUACA'),
(6, 1, 'JILOTEPEC'),
(7, 1, 'LERMA'),
(8, 1, 'NEZAHUALCÓYOTL'),
(9, 1, 'OTUMBA'),
(10, 1, 'SULTEPEC'),
(11, 1, 'TEMASCALTEPEC'),
(12, 1, 'TENANGO DEL VALLE'),
(13, 1, 'TENANCINGO'),
(14, 2, 'TEXCOCO'),
(15, 3, 'TLALNEPANTLA'),
(16, 1, 'TOLUCA'),
(17, 1, 'VALLE DE BRAVO'),
(18, 1, ' ZUMPANGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_procesal`
--

CREATE TABLE `estado_procesal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estado_procesal`
--

INSERT INTO `estado_procesal` (`id`, `nombre`) VALUES
(1, 'REGULARIZACIÓN DE PROPIEDAD POR PARTE DEL DONADOR'),
(2, 'POR RATIFICAR DONACIÓN'),
(3, 'INTEGRAIÓN DE CARPETA PARA DESINCORPORACIÓN'),
(4, 'CARPETA PRESENTADA ANTE LEGISLATURA'),
(5, 'EN PROCESO DE ESCRITURACIÓN'),
(6, 'ESCRITURADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad_propiedad`
--

CREATE TABLE `modalidad_propiedad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modalidad_propiedad`
--

INSERT INTO `modalidad_propiedad` (`id`, `nombre`) VALUES
(1, 'DONACIÓN ESTATAL'),
(2, 'DONACIÓN MUNICIPAL'),
(3, 'COMPRA-VENTA'),
(4, 'ESCRITURADO'),
(5, 'COMODATO'),
(6, 'PRÉSTAMO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`) VALUES
(1, 'Toluca 1'),
(2, 'Toluca 2'),
(3, 'Texcoco 1'),
(4, 'Texcoco 2'),
(5, 'Tlanepantla 1'),
(6, 'Tlanepantla 2'),
(7, 'Ecatepec 1'),
(8, 'Ecatepec 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`) VALUES
(1, 'Toluca'),
(2, 'Texcoco'),
(3, 'Tlanepantla'),
(4, 'Ecatepec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_inmuebles`
--

CREATE TABLE `registro_inmuebles` (
  `id` int(11) NOT NULL,
  `no_consecutivo` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_distrito_judicial` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `edificio` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `domicilio` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_modalidad_prop` int(11) NOT NULL,
  `id_estado_proc` int(11) NOT NULL,
  `superficie` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `doc_status` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `doc_acciones_real` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_generada` date NOT NULL,
  `fecha_mod` date NOT NULL,
  `id_user_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro_inmuebles`
--

INSERT INTO `registro_inmuebles` (`id`, `no_consecutivo`, `id_region`, `id_distrito_judicial`, `id_municipio`, `edificio`, `domicilio`, `id_modalidad_prop`, `id_estado_proc`, `superficie`, `doc_status`, `doc_acciones_real`, `id_usuario`, `fecha_generada`, `fecha_mod`, `id_user_mod`) VALUES
(1, 555, 1, 17, 1, 'El edificio', 'El domicilio', 1, 1, 'La superficie', 'enlace del PDF', 'Enlace del otro PDF', 2, '2020-09-20', '2020-09-13', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `pass`, `rol`) VALUES
(1, 'super usuario', 'super@correo.com', '123', 0),
(2, 'coordinación general jurídica', 'coordinación@correo.com', '456', 1),
(3, 'dirección de control patrimonial', 'direccion@correo.com', '789', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distritos_judiciales`
--
ALTER TABLE `distritos_judiciales`
  ADD PRIMARY KEY (`id`,`id_region`),
  ADD KEY `id_region` (`id_region`);

--
-- Indices de la tabla `estado_procesal`
--
ALTER TABLE `estado_procesal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidad_propiedad`
--
ALTER TABLE `modalidad_propiedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_inmuebles`
--
ALTER TABLE `registro_inmuebles`
  ADD PRIMARY KEY (`id`,`id_region`,`id_municipio`,`id_usuario`),
  ADD KEY `id_modalidad_prop` (`id_modalidad_prop`),
  ADD KEY `id_estado_proc` (`id_estado_proc`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `distrito_judicial` (`id_distrito_judicial`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos_judiciales`
--
ALTER TABLE `distritos_judiciales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `estado_procesal`
--
ALTER TABLE `estado_procesal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modalidad_propiedad`
--
ALTER TABLE `modalidad_propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro_inmuebles`
--
ALTER TABLE `registro_inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distritos_judiciales`
--
ALTER TABLE `distritos_judiciales`
  ADD CONSTRAINT `distritos_judiciales_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id`);

--
-- Filtros para la tabla `registro_inmuebles`
--
ALTER TABLE `registro_inmuebles`
  ADD CONSTRAINT `registro_inmuebles_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_3` FOREIGN KEY (`id_modalidad_prop`) REFERENCES `modalidad_propiedad` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_4` FOREIGN KEY (`id_estado_proc`) REFERENCES `estado_procesal` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_6` FOREIGN KEY (`id_distrito_judicial`) REFERENCES `distritos_judiciales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
