-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2020 a las 01:14:51
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sci`
--

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
  `id_distrito_judicial` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `id_distrito_judicial`, `nombre`) VALUES
(1, 1, 'MUNICIPIO DE CHALCO'),
(2, 16, 'ZINACANTEPEC'),
(3, 16, 'TOLUCA'),
(4, 17, 'VALLE DE BRAVO');

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
(1, 'TOLUCA'),
(2, 'TEXCOCO'),
(3, 'TLANEPANTLA'),
(4, 'ECATEPEC');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `no_empleado` int(10) NOT NULL,
  `correo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `no_empleado`, `correo`, `pass`, `rol`) VALUES
(2, 'coordinación general jurídica', 0, 'coordinación@correo.com', '456', 1),
(3, 'dirección de control patrimonial', 0, 'direccion@correo.com', '789', 2),
(4, 'Manuel del Angel', 7894, 'angel@correo.com', '123456', 0),
(5, 'Carlos Adrian Morales', 3256, 'carlos@correo.com', '123456', 0),
(6, 'Luis Fernando Monares González', 9468, 'fernando.monares@correo.com', '$2y$10$.YbvXhVz6htBWogZVkGRV.f/PlMi0pClwAK99Kv3a2xMrYbjoF2ba', 0),
(7, 'Carlos Alberto Gutierrez Albarrán', 7102, 'carlos.alberto@pjedomex.gob.mx', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 1),
(8, 'Juan Alberto Sosa Ramírez', 9100, 'juan.alberto@pjedomex.gob.mx', '$2y$10$b16VD1hWyK1MEcBS3fdt.ennDNEcxpdXue1o39dzPnJRCXUh5twdO', 2);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_distrito_judicial` (`id_distrito_judicial`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro_inmuebles`
--
ALTER TABLE `registro_inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distritos_judiciales`
--
ALTER TABLE `distritos_judiciales`
  ADD CONSTRAINT `distritos_judiciales_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_distrito_judicial`) REFERENCES `distritos_judiciales` (`id`);

--
-- Filtros para la tabla `registro_inmuebles`
--
ALTER TABLE `registro_inmuebles`
  ADD CONSTRAINT `registro_inmuebles_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_3` FOREIGN KEY (`id_modalidad_prop`) REFERENCES `modalidad_propiedad` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_4` FOREIGN KEY (`id_estado_proc`) REFERENCES `estado_procesal` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_5` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_6` FOREIGN KEY (`id_distrito_judicial`) REFERENCES `distritos_judiciales` (`id`),
  ADD CONSTRAINT `registro_inmuebles_ibfk_7` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
