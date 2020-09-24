-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 01:12:08
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
(1, 2, 'CHALCO'),
(2, 3, 'CUAUTITLÁN'),
(3, 4, 'ECATEPEC DE MORELOS'),
(4, 1, 'EL ORO'),
(5, 1, 'IXTLAHUACA'),
(6, 1, 'JILOTEPEC'),
(7, 1, 'LERMA'),
(8, 2, 'NEZAHUALCÓYOTL'),
(9, 2, 'OTUMBA'),
(10, 1, 'SULTEPEC'),
(11, 1, 'TEMASCALTEPEC'),
(12, 1, 'TENANGO DEL VALLE'),
(13, 1, 'TENANCINGO'),
(14, 2, 'TEXCOCO'),
(15, 3, 'TLALNEPANTLA'),
(16, 1, 'TOLUCA'),
(17, 1, 'VALLE DE BRAVO'),
(18, 4, ' ZUMPANGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_acciones_real`
--

CREATE TABLE `doc_acciones_real` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `no_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_status`
--

CREATE TABLE `doc_status` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `no_expediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `doc_status`
--

INSERT INTO `doc_status` (`id`, `nombre`, `fecha`, `id_usuario`, `no_expediente`) VALUES
(1, 'Status--9-6-2020-9-24.pdf', '2020-08-11', 6, 9),
(2, 'Status-1-9-6-2020-9-24.pdf', '2020-07-06', 6, 9),
(3, 'Status-2-9-6-2020-9-24.pdf', '2020-09-24', 6, 9),
(4, 'Status-3-1-6-2020-9-25.pdf', '2020-09-25', 6, 1),
(5, 'Status-4-2-6-2020-9-25.pdf', '2020-09-25', 6, 2),
(6, 'Status-5-6-6-2020-9-25.pdf', '2020-09-25', 6, 6);

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
(1, 1, 'CHALCO'),
(2, 1, 'AMECAMECA'),
(3, 1, 'ATLAUTA'),
(4, 1, 'AYAPANGO'),
(5, 1, 'COCOTITLÁN'),
(6, 1, 'ECATZINGO'),
(7, 1, 'IXTAPALUCA'),
(8, 1, 'JUCHITEPEC'),
(9, 1, 'OZUMBA'),
(10, 1, 'TEMAMTLA'),
(11, 1, 'TENANGO DEL AIRE'),
(12, 1, 'TEPETLIXPA'),
(13, 1, 'TLALMANALCO'),
(14, 1, 'VALLE DE  CHALCO SOLIDARIDA'),
(15, 2, 'CUAUTITLÁN'),
(16, 2, 'COYOTEPEC'),
(17, 2, 'CUAUTITLÁN IZCALLI'),
(18, 2, 'HUEHUETOCA'),
(19, 2, 'MELCHOR OCAMPO'),
(20, 2, 'TELOYCUAN'),
(21, 2, 'TEPOTZOTLÁN'),
(22, 2, 'TULTEPEC'),
(23, 2, 'TULTITLÁN'),
(24, 3, 'ECATEPEC DE MORELOS'),
(25, 3, 'COACALCO DE BERRIOZABAL'),
(26, 3, 'TECÁMAC'),
(27, 4, 'EL ORO'),
(28, 4, 'ACAMBAY'),
(29, 4, 'ATLACOMULCO'),
(30, 4, 'SAN JOSÉ DEL RINCÓN'),
(31, 4, 'TEMASCALCINGO'),
(32, 5, 'IXTLAHUACA'),
(33, 5, 'JIQUIPILCO'),
(34, 5, 'JOCOTITLÁN'),
(35, 5, 'MORELOS'),
(36, 5, 'SAN FELIPE DEL PROGRESO'),
(37, 6, 'JILOTEPEC'),
(38, 6, 'ACULCO'),
(39, 6, 'CHAPA DE MOTA'),
(40, 9, 'POLOTITLÁN'),
(41, 10, 'SOYANIQUILPAN DE JUÁREZ'),
(42, 6, 'TIMILPAN'),
(43, 6, 'VILLA DEL CARBÓN'),
(44, 7, 'LERMA'),
(45, 7, 'OCOYOACAC'),
(46, 7, 'OTZOLTEPEC'),
(47, 7, 'SAN MATEO ATENCO'),
(48, 7, 'XONACATLÁN'),
(49, 8, 'NEZAHUALCÓYOTL'),
(50, 8, 'CHIMALHUACÁN'),
(51, 8, 'LA PAZ'),
(52, 9, 'OTUMBCA'),
(53, 9, 'AXAPUSCO'),
(54, 9, 'NOPALTEPEC'),
(55, 9, 'SAN MARTÍN DE LAS PIRÁMIDES'),
(56, 9, 'TEMASCALAPA'),
(57, 9, 'TEOTIHUACÁN'),
(58, 10, 'SULTEPEC'),
(59, 10, 'ALMOLOYA DEL ALQUISIRAS'),
(60, 10, 'TEXATEXCALTITLÁN'),
(61, 10, 'TLATAYA'),
(62, 10, 'ZACUALPAN'),
(63, 11, 'TEMASCALTEPEC'),
(64, 11, 'AMATEPEC'),
(65, 11, 'LUVIANOS'),
(66, 11, 'SAN SIMÓN DE GUERRERO'),
(67, 11, 'TEJUPILCO'),
(68, 12, 'TENANGO DEL VALLE'),
(69, 12, 'ALMOLOYA DEL RÍO'),
(70, 12, 'ATIZAPÁN'),
(71, 12, 'CALIMAYA'),
(72, 12, 'CAPULHUAC'),
(73, 12, 'CHAPULTEPEC'),
(74, 12, 'JOQUICINGO'),
(75, 12, 'MEXICALTZINGO'),
(76, 12, 'RAYÓN'),
(77, 12, 'SAN ANTONIO LA ISLA'),
(78, 12, 'TEXCALYAC'),
(79, 12, 'TIANGUISTENCO'),
(80, 12, 'XATALCO'),
(81, 13, 'TENANCINGO'),
(82, 13, 'COATEPEC HARINAS'),
(83, 13, 'IXTAPAN DE LA SAL'),
(84, 13, 'MALINALCO'),
(85, 13, 'OCULIAN'),
(86, 13, 'TONATICO'),
(87, 13, 'VILLAGUERRERO'),
(88, 13, 'ZUMPAHUACÁN'),
(89, 14, 'TEXCOCO'),
(90, 14, 'ACOLMAN'),
(91, 14, 'ATENCO'),
(92, 14, 'CHIAUTLA'),
(93, 14, 'CHICOLOAPAN'),
(94, 14, 'CHINCONCUAC'),
(95, 14, 'PAPALOTLA'),
(96, 14, 'TEPETLAOXTOC'),
(97, 14, 'TEZOYUCA'),
(98, 15, 'TLANEPANTLA DE BAZ'),
(99, 15, 'ATIZAPÁN DE ZARAGOZA'),
(100, 15, 'HUIXQUILUCAN'),
(101, 15, 'ISIDRO FABELA'),
(102, 15, 'JILOTZINGO'),
(103, 15, 'NAUCALPAN'),
(104, 15, 'NICOLÁS ROMERO'),
(105, 16, 'TOLUCA'),
(106, 16, 'ALMOLOYA DE JUÁREZ'),
(107, 16, 'METEPEC'),
(108, 16, 'TEMOAYA'),
(109, 16, 'VILLA VICTORIA'),
(110, 16, 'ZINACANTEPEC'),
(111, 17, 'VALLE DE BRAVO'),
(112, 17, 'AMANALCO'),
(113, 17, 'DONATO GUERRA'),
(114, 17, 'IXTAPAN DEL ORO'),
(115, 17, 'SANTO TOMÁS'),
(116, 17, 'OTZOLOAPAN'),
(117, 17, 'VILLA DE ALLENDE'),
(118, 17, 'ZACAZONAPAN'),
(119, 18, 'ZUMPANGO'),
(120, 18, 'APAXCO'),
(121, 18, 'HUEYPOXTLA'),
(122, 18, 'JALTENCO'),
(123, 18, 'NEXTLALPAN'),
(124, 18, 'TEQUISQUIAC'),
(125, 18, 'TONANITLA');

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
  `no_expediente` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_distrito_judicial` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `edificio` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `domicilio` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_modalidad_prop` int(11) NOT NULL,
  `id_estado_proc` int(11) NOT NULL,
  `superficie` decimal(50,5) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_generada` date NOT NULL,
  `fecha_mod` date NOT NULL,
  `id_user_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro_inmuebles`
--

INSERT INTO `registro_inmuebles` (`id`, `no_expediente`, `id_region`, `id_distrito_judicial`, `id_municipio`, `edificio`, `domicilio`, `id_modalidad_prop`, `id_estado_proc`, `superficie`, `id_usuario`, `fecha_generada`, `fecha_mod`, `id_user_mod`) VALUES
(1, 1, 1, 16, 105, 'Edificio administrativo de la región ', 'Independencia #123', 6, 4, '500.00000', 6, '2020-09-25', '2020-09-25', 6),
(2, 2, 1, 5, 34, 'Edificio administrativo de la región de Jocotitlán', 'San Sebastian #235 Col. Independencia', 5, 3, '500.00000', 6, '2020-09-25', '0000-00-00', 0),
(3, 3, 1, 12, 70, 'Edificio administrativo de la región de Ixtapan', 'San Sebastian #235 Col. Independencia', 5, 1, '0.00000', 6, '2020-09-25', '2020-09-25', 6),
(4, 4, 1, 6, 42, 'Edificio administrativo', 'San Texcoco #123 Col. Nezahualcóyotl', 1, 1, '500.00000', 6, '2020-09-25', '2020-09-25', 6),
(7, 6, 2, 1, 1, 'Edificio administrativo de la región de Chimalhuacán', 'San Texcoco #123 Col. Nezahualcóyotl', 1, 1, '250.00000', 6, '2020-09-25', '0000-00-00', 0);

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
(1, 'Super Usuario', 9999, 'super@correo.com.mx', '$2y$10$ZMfME4Df3PvhYbT8xW2P4O.1Xhuwyy.mK.o5qO6bCOK5GYUM5LWvW', 0),
(2, 'coordinación general jurídica', 0, 'coordinacion@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 2),
(3, 'dirección de control patrimonial', 0, 'direccion@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 1),
(4, 'Manuel del Angel', 7894, 'angel@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 1),
(5, 'Carlos Adrian Morales', 3256, 'carlos@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 0),
(6, 'Luis Fernando Monares González', 9468, 'fernando.monares@correo.com', '$2y$10$.YbvXhVz6htBWogZVkGRV.f/PlMi0pClwAK99Kv3a2xMrYbjoF2ba', 0),
(7, 'Carlos Alberto Gutierrez Albarrán', 7102, 'carlos.alberto@pjedomex.gob.mx', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 1),
(8, 'Juan Alberto Sosa Ramírez', 9102, 'juan.alberto@pjedomex.gob.mx', '$2y$10$b16VD1hWyK1MEcBS3fdt.ennDNEcxpdXue1o39dzPnJRCXUh5twdO', 2);

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
-- Indices de la tabla `doc_acciones_real`
--
ALTER TABLE `doc_acciones_real`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `no_expediente` (`no_expediente`);

--
-- Indices de la tabla `doc_status`
--
ALTER TABLE `doc_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `no_expediente` (`no_expediente`);

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
  ADD UNIQUE KEY `no_expediente` (`no_expediente`),
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
-- AUTO_INCREMENT de la tabla `doc_acciones_real`
--
ALTER TABLE `doc_acciones_real`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `doc_status`
--
ALTER TABLE `doc_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registro_inmuebles`
--
ALTER TABLE `registro_inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Filtros para la tabla `doc_acciones_real`
--
ALTER TABLE `doc_acciones_real`
  ADD CONSTRAINT `doc_acciones_real_ibfk_1` FOREIGN KEY (`no_expediente`) REFERENCES `registro_inmuebles` (`no_expediente`);

--
-- Filtros para la tabla `doc_status`
--
ALTER TABLE `doc_status`
  ADD CONSTRAINT `doc_status_ibfk_1` FOREIGN KEY (`no_expediente`) REFERENCES `registro_inmuebles` (`no_expediente`);

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
