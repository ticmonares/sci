-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2020 a las 16:17:14
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `no_expediente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` tinytext COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_contacto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `no_expediente`, `nombre`, `telefono`, `correo`, `tipo_contacto`) VALUES
(1, 102, 'Juan Gómez Tagle', '7222583691', '', 1),
(2, 105, 'Juan Gómez Tagle', '72212345', 'juan.gomez@pjedomex.com.mx', 1),
(3, 106, 'Juan Gómez Tagle', '7222583691', 'juan.gomez@pjedomex.com', 1),
(4, 106, 'Juan Jaime López', '7222583692', 'juan.lopez@gmail.com.mx', 2),
(5, 106, 'Pedro Gutierrez Sosa', '7222583693', 'pedro.guti@pjedomex.com.mx', 3),
(6, 108, 'Juan Gómez Tagle', '7222583691', 'juan.gomez@pjedomex.com', 1),
(7, 108, 'Raul Romero', '722583695', '', 2),
(8, 108, 'Juan Manuel Solis', '', 'juan.solis@pjedomex.com.mx', 3);

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
(3, 'INTEGRACIÓN DE CARPETA PARA DESINCORPORACIÓN'),
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
(6, 'PRÉSTAMO'),
(7, 'ARRENDAMIENTO'),
(8, 'DECOMISADO');

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
(51, 14, 'LA PAZ'),
(52, 9, 'OTUMBA'),
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
(98, 15, 'TLALNEPANTLA DE BAZ'),
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
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `no_expediente` int(11) NOT NULL,
  `observacion` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`no_expediente`, `observacion`) VALUES
(88, 'Según Avalúo de fecha 17 de diciembre de 2019, 3,193.75 m²'),
(89, '4,684.11 M2.\r\n4,915.26 M2.\r\n11,987.09 M2.\r\n3,506.20 M2.\r\n5,875.00 M2.\r\nTotal 30,967.66 m²'),
(90, '757.00 M2.\r\n447.00 M2.\r\nTotal: 1204.00\r\n'),
(97, 'Se esta en posesión de todo el predio aproximadamente 7,552.16 m²\r\n'),
(98, '6,769.66 m² aproximadamente\r\n'),
(9, '(LOTE 2) \r\n1,210.15 M2;\r\n(LOTE 3)\r\n1,217.03 M2;\r\n(LOTE 4)\r\n1,328.90 M2;\r\n(LOTE 18)\r\n787.00 M2\r\nTotal: 4543.08\r\n'),
(12, '620 M2.\r\n\r\n215 M2.\r\n'),
(13, '620 M2.\r\n215 M2.\r\n'),
(15, 'Lote 3 (5,995.05 m²)\r\n'),
(34, '2,500.00 M2.\r\nSegún Avalúo de fecha 17 de enero de 2020\r\n6,005.67 m²'),
(39, 'No Especificada\r\nSegún Avalúo de Fecha 20 de diciembre de 2019\r\nAprox. 1,376.90 m²\r\n'),
(43, 'Según Avalúo de fecha 25 de noviembre de 2019\r\n712.00 m²\r\n'),
(53, 'No Especificada'),
(62, '2,000.00 M2.\r\n1,500.00 M2.'),
(68, '113,985.24 M2.\r\nSegún avalúo de fecha 11 de diciembre de 2019\r\n3,102.23 m²\r\n'),
(74, '1,460.67 M2.\r\n430.64 M2.\r\n'),
(75, '5,215.00 M2.\r\n5,215.00 M2.\r\n4,667.00 M2.\r\n5,967.18 M2.\r\nTotal 21,064.03m²'),
(77, '15,326.90 M2.\r\nSegún avalúo de fecha 25 de noviembre de 2019,\r\n1,580.00 m²'),
(2, ''),
(11, ''),
(17, ''),
(19, ''),
(20, ''),
(26, ''),
(27, ''),
(33, ''),
(37, ''),
(45, ''),
(49, ''),
(50, ''),
(51, ''),
(52, ''),
(58, ''),
(59, ''),
(79, ''),
(81, ''),
(82, ''),
(84, ''),
(85, ''),
(86, ''),
(87, ''),
(91, ''),
(94, ''),
(92, ''),
(99, ''),
(100, ''),
(30, ''),
(102, 'Alguna observación de bla bla bla'),
(103, 'Vamos a poner correos, crucemos los dedos'),
(106, 'Venga vamos por los 3');

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
(3, 'TLALNEPANTLA'),
(4, 'ECATEPEC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_inmuebles`
--

CREATE TABLE `registro_inmuebles` (
  `id` int(11) NOT NULL,
  `no_expediente` int(11) NOT NULL,
  `no_inventario` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_distrito_judicial` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `edificio` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `domicilio` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_modalidad_prop` int(11) NOT NULL,
  `id_estado_proc` int(11) NOT NULL,
  `superficie` decimal(50,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_generada` date NOT NULL,
  `fecha_mod` date NOT NULL,
  `id_user_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro_inmuebles`
--

INSERT INTO `registro_inmuebles` (`id`, `no_expediente`, `no_inventario`, `id_region`, `id_distrito_judicial`, `id_municipio`, `edificio`, `domicilio`, `id_modalidad_prop`, `id_estado_proc`, `superficie`, `id_usuario`, `fecha_generada`, `fecha_mod`, `id_user_mod`) VALUES
(1, 1, 'BI9045', 2, 1, 1, 'Edificio de Juzgados de Chalco', 'Carretera Chalco San Andrés Mixquic, S/N, en San Mateo Huitzilzingo Chalco, Estado de México. C. P. 56625', 5, 1, '2493.00', 6, '2020-09-29', '2020-10-02', 6),
(2, 2, 'BI9074', 2, 1, 2, 'Edificio de Juzgados Civiles de Amecameca', 'Lote número I, de la Hacienda de San Miguel Panoaya, Carretera Federal México-Cuautla, Municipio de Amecameca, Estado de México. C. P. 56900', 4, 6, '6159.63', 6, '2020-09-29', '2020-10-02', 6),
(3, 3, 'BI9034', 2, 1, 7, 'Edificio de Juzgados de Ixtapaluca', 'Calle 7 S/N, Fraccionamiento Los Héroes, Sección II (El Tezontle) Ixtapaluca, Estado de México.', 1, 1, '4812.62', 6, '2020-09-29', '0000-00-00', 0),
(4, 4, 'BI9037', 2, 1, 14, 'Edificio de Juzgados de Chalco Solidaridad', 'Calle Popocatépetl S/N (Atrás del Palacio MunicipalCol. Alfredo Baranda García, Valle de Chalco Solidaridad, Estado de México. C. P. 56610', 1, 1, '4306.66', 6, '2020-09-29', '0000-00-00', 0),
(5, 5, 'BI9003', 3, 2, 15, 'Edificio de Juzgados Civiles de Cuautitlán, Estado de México  Ozumbilla', 'Calle Art. 123 Esquina Con Calle Maestro Alfonso Reyes S/N, Colonia Guadalupe, Municipio de Cuautitlán, Estado de México. C. P. 54805', 1, 1, '5000.00', 6, '2020-09-29', '0000-00-00', 0),
(6, 6, 'BI9017', 3, 2, 17, 'Edificio de Juzgados de Cuautitlán Izcalli', 'Avenida Transformación S/N Esquina Con Asociación Nacional de Industriales Zona Industrial Cuamantla, Cuautitlán Izcalli, Estado de México. C. P. 54800', 1, 1, '4155.67', 6, '2020-09-29', '0000-00-00', 0),
(7, 7, 'BI9019', 3, 2, 17, 'Edificio de Juzgados Penales de Cuautitlán, Estado de México (TORRE I)', 'Calle Porfirio Díaz sin número, Colonia Centro, Cuautitlán, Estado de México. C. P. 54800.', 1, 1, '482.87', 6, '2020-09-29', '0000-00-00', 0),
(8, 9, 'BI9030', 3, 2, 17, 'Inmuebles Lago de Guadalupe en Cuautitlán, Estado de México (TERRENO)', 'Lotes 2, 3, 4 y 18 de la Unidad Vecinal A, del Fraccionamiento Lago de Guadalupe, Municipio de Cuautitlán, Estado de México.', 4, 6, '4543.08', 6, '2020-09-29', '2020-10-02', 6),
(9, 10, 'S/N', 3, 2, 23, 'Juzgado Civil de Cuantía Menor de Tultitlán', 'Plaza Hidalgo Esquina Con Francisco Villa Col. Centro, Tultitlán, México. C. P. 54900', 7, 1, '1122.00', 6, '2020-09-29', '0000-00-00', 0),
(10, 11, 'BI9005', 4, 3, 24, 'Edificio de Juzgados Civiles y Familiares de Ecatepec de Morelos', 'Avenida Adolfo López Mateos No. 57 Colonia La Mora, Ecatepec de Morelos, Estado de México. C. P. 55030', 4, 6, '473.00', 6, '2020-09-29', '2020-10-02', 6),
(11, 12, 'S/N', 4, 3, 24, 'Juzgado 9° Familiar del Distrito Judicial de Ecatepec de Morelos', 'Avenida Adolfo López Mateos, Letra ', 7, 1, '835.00', 6, '2020-09-29', '2020-10-02', 6),
(12, 13, 'S/N', 4, 3, 24, 'Juzgado 10° Familiar del Distrito Judicial de Ecatepec de Morelos', 'Avenida Adolfo López Mateos, Letra ', 7, 1, '835.00', 6, '2020-09-29', '2020-10-02', 6),
(13, 14, 'BI9043', 4, 3, 24, 'Edificio de Juzgados Penales de Ecatepec (EDIFICIO I) (EDIFICIO II)', 'Cerro de Chiconautla Edificio I, S/N Anexo al Centro Preventivo, Colonia Santa María Chiconautla, Ecatepec de Morelos, Estado de México. C.P. 55063', 5, 1, '9241.90', 6, '2020-09-29', '0000-00-00', 0),
(14, 15, 'BI9049', 4, 3, 24, 'Predio de Ecatepec, Estado de México, Denominado ', 'Avenida Constituyente José López Bonaga, (ahora Avenida de los Trabajadores), Ecatepec de Morelos, Estado de México.', 1, 1, '5995.05', 6, '2020-09-29', '2020-10-02', 6),
(15, 16, 'BI9075', 4, 3, 24, 'Edificio las Americas, Ecatepec de Morelos, Estado de México', 'Avenida Insurgentes, Manzana. 136, Lotes 30 y 31 del Fraccionamiento Las Américas, Colonia Las Américas, Ecatepec de Morelos, Estado de México. C.P. 55065.', 1, 1, '6006.90', 6, '2020-09-29', '0000-00-00', 0),
(16, 17, 'BI9004', 4, 3, 25, 'Edificio de Juzgados Civiles de Cocalco, Estado de México', 'Avenida Carretera Coacalco- Tultepec No. 95 esquina calle Bosques de Moctezuma y Calle Bosques de Contreras del Fraccionamiento Conjunto Bosques, Coacalco de Berriozábal, Estado de México. C. P. 55700', 4, 6, '1376.90', 6, '2020-09-29', '2020-10-02', 6),
(17, 18, 'BI9062', 4, 3, 26, 'Edificio de Juzgados de Tecamac, Estado de México', 'Avenida Lázaro Cárdenas S/N esquina con Prolongación Emiliano Zapata, Fraccionamiento Social Progresivo Santo Tomas Chiconautla, Lomas de Tecámac, Estado de México. C. P. 55740', 1, 1, '5084.69', 6, '2020-09-29', '0000-00-00', 0),
(18, 19, 'BI9083', 4, 3, 24, 'Centro de Convivencia Familiar de Ecatepec “El Obraje DOS”', 'Avenida Constituyente José López Bonaga, (ahora Avenida de los Trabajadores), Ecatepec de Morelos, Estado de México.', 4, 6, '12531.71', 6, '2020-09-29', '2020-10-02', 6),
(19, 20, 'BI9084', 4, 3, 24, 'CENTRO DE JUSTICIA ECATEPEC ', 'Avenida Constituyente José López Bonaga, (ahora Avenida de los Trabajadores), Ecatepec de Morelos, Estado de México.', 4, 6, '14441.59', 6, '2020-09-29', '2020-10-02', 6),
(20, 21, 'USUCAPIÓN', 4, 3, 24, 'Edificio', 'Avenida Circunvalación número 136, lote 20, San Cristóbal Centro, Ecatepec de Morelos, Estado de México.', 7, 1, '256.00', 6, '2020-09-29', '0000-00-00', 0),
(21, 22, 'S/N', 1, 4, 27, 'Edificio de Juzgado Penal y Sala de Control del Tribunal de Enjuiciamiento de El Oro.', 'Avenida Juárez S/N Colonia Centro, El Oro, Estado de México. C. P. 50600.', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(22, 23, 'S/N', 1, 4, 27, 'Juzgados 1o. Civil de Primera Instancia y Juzgado de Control y Tribunal de Enjuiciamiento del Distrito Judicial de El Oro', 'Independencia S/N Edificio Oro Club, El Oro, México, C. P. 50600', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(23, 24, 'BI9044', 1, 4, 27, 'Predio de El Oro, Estado de México (TERRENO)', 'Carretera el Oro-Atlacomulco, Estado de México.', 1, 1, '5500.00', 6, '2020-09-29', '0000-00-00', 0),
(24, 25, 'S/N', 1, 4, 28, 'Civil de Cuantía Menor de Acambay y Centro de Mediación', 'Plaza Hidalgo No. 1, Col. Centro Palacio Municipal, Acambay, Estado de México. C. P. 56200', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(25, 26, 'BI9072', 1, 4, 29, 'Edificio de Juzgados de Atlacomulco', 'Calle Adolfo López Mateos número 106, esquina Cerrada Adolfo López Mateos, Col. Isidro Fabela Alfaro, Atlacomulco, Estado de México. C. P. 50454.', 4, 6, '6263.52', 6, '2020-09-29', '2020-10-02', 6),
(26, 27, 'BI9025', 1, 5, 32, 'Edificio de Juzgados de Ixtlahuaca', 'Av. Baja  Velocidad S/N Carretera  Ixtlahuaca- Atlacomulco, Ixtlahuaca,', 4, 6, '3300.00', 6, '2020-09-29', '2020-10-02', 6),
(27, 28, 'S/N', 1, 5, 36, 'Juzgado Civil de Cuantía Menor de San Felipe del Progreso', 'Plaza Posadas y Garduño No. 1, Interior del Palacio Municipal, San Felipe del Progreso, Estado de México. C. P. 50640.', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(28, 29, 'BI9033', 1, 6, 37, 'Edificio de Juzgados de Control, Tribunal de Enjuiciamiento y Ejecución de Sentencias de Jilotepec', 'Calle Ignacio Allende No. 105, Colonia Centro, Jilotepec, Estado de México. C. P. 54240.', 1, 1, '182.71', 6, '2020-09-29', '0000-00-00', 0),
(29, 30, 'BI9073', 1, 6, 37, 'Edificio de Juzgados Civiles y Centro de Mediación de Jilotepec', 'Carretera Xhixhata Km. 0.08 en la Localidad de Xhixhata, Municipio de Jilotepec, Estado de México.', 2, 1, '1553.60', 6, '2020-09-29', '2020-10-03', 6),
(30, 31, 'BI9028', 1, 7, 44, 'Edificio de Juzgados de Lerma', 'Carretera México-Toluca KM. 50+100 Colonia La Estación, Lerma, Estado de México. C. P. 52000.', 5, 1, '3121.13', 6, '2020-09-29', '0000-00-00', 0),
(31, 32, 'BI9067', 1, 7, 46, 'Predio de Otzolotepec (TERRENO)', 'Calle el Capulín S/N en la comunidad de Santa María Tetitla, Otzolotepec, Estado de México.', 1, 1, '2500.06', 6, '2020-09-29', '0000-00-00', 0),
(32, 33, 'BI9057', 1, 7, 48, 'Edificio de Juzgados de Xonacatlán', 'Calle Pánfilo H. Castillo S/N en el paraje denominado La Jordana, Colonia Celso Vicencio, Xonacatlán, Estado de México.', 4, 6, '3105.56', 6, '2020-09-29', '2020-10-02', 6),
(33, 34, 'BI9013', 2, 8, 49, 'Edificio de Juzgados Penales de Nezahualcóyotl  Edificio de Juzgados de Control y Juicios Orales de Nezahualcóyotl', 'Prolongación Avenida Adolfo López Mateos, Anexo al Centro Preventivo, Bordo de Xochiaca, Colonia Benito Juárez, Nezahualcóyotl, Estado de México. C. P.57000', 5, 1, '6005.67', 6, '2020-09-29', '2020-10-02', 6),
(34, 35, 'BI9023', 2, 8, 49, 'Edificio Preceptoría Juvenil', 'Calle Juárez esquina con Ignacio Aldama o Avenida 8, Colonia Tepozanes, Nezahualcóyotl, Estado de México.', 1, 1, '4820.00', 6, '2020-09-29', '0000-00-00', 0),
(35, 36, 'BI9055', 2, 8, 49, 'Predio de Nezahualcóyotl, Prados de Aragón (TERRENO)', 'Fraccionamiento Prados de Aragón,   Nezahualcóyotl, Estado de México.', 1, 1, '1641.62', 6, '2020-09-29', '0000-00-00', 0),
(36, 37, 'BI9006', 2, 8, 50, 'Edificio de Juzgados de Chimalhuacán', 'Avenida Nezahualcóyotl S/N esquina José María Villaseca, Santa María Nativitas, Chimalhuacán, Estado de México, C. P. 56330.', 4, 6, '284.00', 6, '2020-09-29', '2020-10-02', 6),
(37, 38, 'S/N', 2, 8, 51, 'Juzgado Quinto Civil de Primera Instancia del Distrito Judicial de Nezahualcóyotl con residencia en La Paz y Juzgado Sexto Civil  de La Paz.', 'Avenida del Trabajo número setenta y uno, Colonia Los Reyes Acaquilpan, Centro, Municipio de la Paz, Estado de México, C. P. 56400', 7, 1, '6002.00', 6, '2020-09-29', '0000-00-00', 0),
(38, 39, 'BI9047', 2, 9, 52, 'Edificio de Juzgados de Otumba.', 'Carretera a Santa Bárbara S/N Tepachico, adjunto al Centro Preventivo, Otumba, Estado de México. C. P. 55900', 5, 1, '1376.90', 6, '2020-09-29', '2020-10-02', 6),
(39, 40, 'BI9064', 2, 9, 57, 'Juzgado Civil de Cuantía Menor de Teotihuacán', 'Calle potrero S/N, ejido de Purificación, Teotihuacán, Estado de México. C. P. 56240', 1, 1, '2536.32', 6, '2020-09-29', '0000-00-00', 0),
(40, 41, 'BI9054', 1, 10, 58, 'Edificio de Juzgado Mixto de Primera Instancia y Juzgado de Control de Sultepec', 'Libramiento Sultepec S/N, San Miguel Totolmaya, Barrio La Parra, Sultepec, Estado de México. C. P. 51600.', 1, 1, '2054.00', 6, '2020-09-29', '0000-00-00', 0),
(41, 42, 'S/N', 1, 10, 58, 'Juzgado Penal de Primera Instancia de Sultepec', 'Avenida Benito Juárez S/N Barrio del Convento en el Interior del Centro Preventivo, Sultepec, Estado de México. C. P. 51600', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(42, 43, 'BI9040', 1, 11, 63, 'Edificio de Juzgados de Temascaltepec', 'Callejón de Morelos y Plaza Juárez No. 1, Colonia Centro, Temascaltepec, Estado de México, C. P. 51300', 1, 1, '712.00', 6, '2020-09-29', '2020-10-02', 6),
(43, 44, 'BI9053', 1, 11, 63, 'Predio de Temascaltepec (TERRENO)', 'Cancha de Frontón a un costado de la Escuela de Bellas Artes, Temascaltepec, Estado de México, C. P. 51300', 1, 1, '3469.39', 6, '2020-09-29', '0000-00-00', 0),
(44, 45, 'BI9020', 1, 12, 68, 'Edificio de Juzgados de Tenango del Valle', 'Carretera Cuota Toluca-Ixtapan de la Sal, KM. 0+500 (Primera caseta de cobro) Tenango del Valle, México, C. P. 52300.', 4, 6, '24640.00', 6, '2020-09-29', '2020-10-02', 6),
(45, 46, 'BI9016', 1, 12, 79, 'Edificio de Juzgados de Santiago Tianguistenco', 'Carretera Tenango-La Marquesa KM. 18+500, a un costado del Centro Estatal de Justicia, Santiago Tianguistenco, Estado de México, C. P. 52600', 1, 1, '1000.00', 6, '2020-09-29', '0000-00-00', 0),
(46, 47, 'BI9059', 1, 12, 80, 'Edificio del Juzgado Civil de Cuantía Menor de Xalatlaco', 'Paraje denominado Tlilac, entre Manuel Ortiz, Eustogio Galindo y Camino Público Vecinal, Barrio de San Agustín, Xalatlaco, Estado de México, C. P. 52680', 1, 1, '4000.00', 6, '2020-09-29', '0000-00-00', 0),
(47, 48, 'BI9014', 1, 13, 81, 'Edificio de Juzgados de Tenancingo', 'Calle Privada Benito Juárez S/N Colonia el Salitre, Tenancingo, Estado de México, C. P. 52400', 1, 1, '47242.72', 6, '2020-09-29', '0000-00-00', 0),
(48, 49, 'BI9051', 1, 13, 83, 'Edificio de Juzgados de Ixtapan de la Sal', 'Lote Uno, Centro de Desarrollo Social ubicado en el Km. 4.5 del Boulevard Turístico Ixtapan-Tonatico S/N El salitre, Ixtapan de la Sal, Estado de México, C. P. 51900', 4, 6, '2200.00', 6, '2020-09-29', '2020-10-02', 6),
(49, 50, 'BI9069', 1, 13, 83, 'Edificio del Centro de Convivencia Familiar Ixtapan de la Sal ', 'Denominado Escuela Agropecuaria, Ubicado en el Salitre, Ixtapan de la Sal, Estado de México, C. P. 51900', 4, 6, '1581.17', 6, '2020-09-29', '2020-10-02', 6),
(50, 51, 'BI9027', 2, 14, 89, 'Palacio de Justicia de Texcoco', 'Carretera Texcoco-Molino de Flores KM. 1+500, Ex Hacienda el Batan, Colonia Xocotlán, Texcoco, Estado de México, C. P. 56200', 4, 6, '5260.70', 6, '2020-09-29', '2020-10-02', 6),
(51, 52, 'BI9031', 2, 14, 89, 'Edificio Administrativo de Texcoco', 'Carretera Texcoco-Molino de Flores KM. 1+500, Ex Hacienda el Batan, Colonia Xocotlán, Texcoco, Estado de México, C. P. 56200', 4, 6, '3259.00', 6, '2020-09-29', '2020-10-02', 6),
(52, 53, 'BI9048', 2, 14, 89, 'Edificio de Juzgados Penales de Texcoco', 'Carretera a San Miguel Tlaixpan S/N, Adjunto al Centro Preventivo,  Texcoco, Estado de México.', 5, 1, '0.00', 6, '2020-09-29', '2020-10-02', 6),
(53, 54, 'BI9009', 2, 14, 92, 'Edificio del Juzgado Civil de Cuantía Menor de Chiautla', 'Calle 2 de Abril, Barrio de San Sebastián, Chiautla, Estado de México.', 1, 1, '47.88', 6, '2020-09-29', '0000-00-00', 0),
(54, 55, 'S/N', 2, 14, 93, 'Juzgado Civil de Cuantía Menor de Chicoloapan', 'Plaza Constitución S/N Colonia Centro, Chicoloapan, Estado de México, C. P. 56370.', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(55, 56, 'S/N', 2, 14, 94, 'Juzgado Civil de Cuantía Menor de Chiconcuac', 'Calle Basilio Cantabrana S/N esquina con calle Constitución, Barrio de San Miguel Chiconcuac, Estado de México, C. P. 55800.', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(56, 57, 'BI9080', 2, 8, 51, 'Edificio de Juzgados Civiles de Nezahualcóyotl con residencia en La Paz', 'Avenida de las Torres, esquina con calle Ceiba, Colonia Bosques de la Magdalena, La Paz', 1, 1, '2002.13', 6, '2020-09-29', '0000-00-00', 0),
(57, 58, 'BI9001', 3, 15, 98, 'Palacio de Justicia de Tlalnepantla  LOS REYES IZTACALA', 'Paseo del Ferrocarril S/N de la Unidad Habitacional Hogares Ferrocarriles, Colonia Los Reyes Iztacala, Municipio de Tlalnepantla, Estado de México, (atrás del ENEP) C. P. 54090.', 4, 6, '3055.00', 6, '2020-09-29', '2020-10-02', 6),
(58, 59, 'BI9068', 3, 15, 98, 'Edificio de Juzgados de Control, Juicio Oral y Ejecución de Sentencias de Tlalnepantla  TORRE II', 'Calle Ejercito del Trabajo Número 2, San Pedro Barrientos, Tlalnepantla, Estado de México, C. P. 54010', 4, 6, '4304.20', 6, '2020-09-29', '2020-10-02', 6),
(59, 60, 'BI9042', 3, 15, 98, 'Edificio de Juzgados Penales de Tlalnepantla TORRE I Barrientos', 'Avenida Ejercito del Trabajo S/N (adjunto al Centro Preventivo) San Pedro Barrientos, Tlalnepantla, Estado de México, C. P. 54010', 5, 1, '39081.00', 6, '2020-09-29', '0000-00-00', 0),
(60, 61, 'BI9021', 3, 15, 98, 'Edificio de Oficinas Administrativas de Tlalnepantla   TENAYO', 'Avenida Prolongación Vallejo 100 Metros de la Unidad Habitacional El Tenayo, Tlalnepantla de Baz, Estado de México, C. P. 54140', 1, 1, '4251.50', 6, '2020-09-29', '0000-00-00', 0),
(61, 62, 'BI9015', 3, 15, 99, 'Edificio de Juzgados de Atizapán de Zaragoza', 'Avenida Lago de Guadalupe No. 72, Colonia Villas de la Hacienda, Atizapán de Zaragoza, Estado de México, C. P. 52920', 1, 1, '3500.00', 6, '2020-09-29', '2020-10-02', 6),
(62, 63, 'BI9018', 3, 15, 100, 'Edificio de Juzgados de Huixquilucan', 'Paraje la Meza, carretera Huixquilican-San Ramón, en el 4o. Cuartel, Barrio de San Juan Bautista, Huixquilucan, Estado de México, C. P. 52760', 1, 1, '2900.00', 6, '2020-09-29', '0000-00-00', 0),
(63, 64, 'BI9002', 3, 15, 103, 'Edificio de Juzgados de Naucalpan', 'Avenida del Ferrocarril Acámbaro No. 45, esquina con Maximiliano Ruiz Castañeda, a una cuadra de Avenida 1o. de Mayo, Colonia el Conde, Naucalpan Estado de México, C. P. 53500', 1, 1, '2500.00', 6, '2020-09-29', '0000-00-00', 0),
(64, 65, 'BI9026', 3, 15, 104, 'Edificio de Juzgados de Nicolás Romero', 'Calle Fernando Montes de Oca S/N Colonia Juárez, Nicolás Romero, Estado de México, C. P. 54405', 1, 1, '437.62', 6, '2020-09-29', '0000-00-00', 0),
(65, 66, 'BI9082', 3, 2, 23, 'Predio de Tultitlán (Terreno)', 'Calle Fuentes de Quijote, S/N, Colonia Fuentes del Valle,      C. P. 54910, Tultitlán,  Estado de México.', 1, 1, '3307.00', 6, '2020-09-29', '0000-00-00', 0),
(66, 67, 'BI9012', 1, 16, 105, 'Edificios de Juzgados Civiles y Familiares de Toluca', 'Avenida Dr. Nicolás San Juan, No. 104 Col. Ex Rancho Cuauhtémoc. Toluca, México. C. P. 50010', 5, 1, '10000.00', 6, '2020-09-29', '0000-00-00', 0),
(67, 68, 'BI9041', 1, 16, 106, 'Edificio de Juzgados Penales de Toluca', 'Km. 4.5 Carretera Toluca – Almoloya de Juárez,  Santiaguito Tlalcilalcalli Almoloya  de Juárez México. C. P. 50900', 5, 1, '117087.47', 6, '2020-09-29', '2020-10-02', 6),
(68, 69, 'BI9029', 1, 16, 106, 'Torre II de Juzgados de Control y Juicio Oral de Toluca', 'Kilómetro 4.5 Carretera Toluca – Almoloya de Juárez, Almoloya de Juárez, México, C. P.  50900. “Torre II”', 5, 1, '3385.00', 6, '2020-09-29', '0000-00-00', 0),
(69, 70, 'BI9022', 1, 16, 107, 'Edificio de Juzgados de Metepec', 'Avenida Tecnológico, S/N, San Salvador Tizatlalli, antes Fraccionamiento Rancho la Virgen, Metepec, Estado de México C.P.52140', 1, 1, '1107.00', 6, '2020-09-29', '0000-00-00', 0),
(70, 71, 'S/N', 1, 16, 108, 'Juzgado Civil de Cuantía Menor de Temoaya', 'Calle Portal Ayuntamiento No. 103, Colonia Centro, Presidencia Municipal de Temoaya, Estado de México, C. P. 50850', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(71, 72, 'BI9065', 1, 16, 108, 'Predio de Temoaya (TERRENO)', 'Carretera a San Juan Jiquipilco, Barrio de Phote, Temoaya, Estado de México.', 1, 1, '3000.00', 6, '2020-09-29', '0000-00-00', 0),
(72, 73, 'BI9077', 1, 16, 109, 'Juzgados de Cuantía Menor de Villa Victoria', 'Nuevo Edificio Administrativo, ubicado en la Calle Trece de Mayo  S/N Colonia Centro, Villa Victoria, Estado de México.', 5, 1, '63.00', 6, '2020-09-29', '0000-00-00', 0),
(73, 74, 'BI9058', 1, 16, 110, 'Edificio de Juzgados Para Adolescentes (Zinacantepec)', 'Avenida Miguel de la Madrid S/N camino al Testerazo Exhacienda Aserradero Protimbos, Zinacantepec, Estado de México.', 5, 1, '1891.31', 6, '2020-09-29', '2020-10-02', 6),
(74, 75, 'BI9070', 1, 16, 110, 'Cuatro Predios de Zinacantepec (TERRENOS)', 'Predio denominado ', 4, 6, '21.00', 6, '2020-09-29', '2020-10-02', 6),
(75, 76, 'S/N', 1, 16, 110, 'Civil de Cuantía Menor de Zinacantepec Palacio Municipal ', 'Jardín Constitución, No. 12, Palacio Municipal, Barrio De San Miguel, Zinacantepec, México. C. P. 51350', 6, 1, '0.00', 6, '2020-09-29', '0000-00-00', 0),
(76, 77, 'BI9081', 1, 17, 111, 'Edificio de Juzgados Civiles, Mixto y Penales de Control y Juicio Oral del Distrito Judicial de Valle de Bravo', 'Cerrada Fray Gregorio Jiménez de la Cuenca s/n, Valle de Bravo Estado de México, C. P. 51200.', 1, 1, '1580.00', 6, '2020-09-29', '2020-10-02', 6),
(77, 78, 'BI9038', 4, 18, 119, 'Predio de Zumpango (TERRENO)', 'Calle de las Marceñas, Lote 06, Barrio de Santiago, Segunda Sección, Zumpango, Estado de México', 1, 1, '4790.16', 6, '2020-09-29', '0000-00-00', 0),
(78, 79, 'BI9050', 4, 18, 119, 'Edificio de Juzgados Civiles, Familiares y Penales de Zumpango (Las Marceñas)', 'Antiguo Camino A  Jilotzingo, S/N, Barrio de Santiago Segunda Sección. Zumpango, Estado de México. C. P. 55600', 4, 6, '9516.00', 6, '2020-09-29', '2020-10-02', 6),
(79, 80, 'BI9078', 4, 18, 119, 'Juzgado Penal y de Juicios Orales de Zumpango', 'Calle Plaza Juárez S/N, Barrio de San Juan,  Col. Centro Palacio Municipal, Zumpango, México. C. P. 55600', 5, 1, '215.70', 6, '2020-09-29', '0000-00-00', 0),
(80, 8, 'BI9039', 3, 2, 17, 'Edificio de Juzgados Penales de Cuautitlán, Estado de México (TORRE II)', 'Calle Porfirio Díaz sin número, Colonia Centro, Cuautitlán, Estado de México. C. P. 54800.', 1, 1, '482.87', 6, '2020-09-29', '0000-00-00', 0),
(81, 81, 'BI9007', 1, 16, 105, 'Almacén de San Lorenzo (Bienes Incautados)', 'Calle Hidalgo S/N San Lorenzo Tepaltitlán, Toluca, Estado de México.', 4, 6, '589.65', 6, '2020-10-02', '2020-10-02', 6),
(82, 82, 'BI9008', 1, 16, 105, 'Almacén de Papelería Toluca', 'Calle Plutarco González No. 1005, Barrio de San Bernandino, Toluca, Estado de México.', 4, 6, '502.24', 6, '2020-10-02', '2020-10-02', 6),
(83, 83, 'BI9010', 1, 16, 105, 'Inmueble de Ayapango', 'Calle 16 de Septiembre No. 9, en su intersección con la calle Gabriel Ramos Millán, Ayapango Estado de México.', 1, 1, '75.25', 6, '2020-10-02', '0000-00-00', 0),
(84, 84, 'BI9011', 1, 16, 105, 'Casa del Poder Judicial', 'Lerdo de Tejada poniente No. 265, Colonia Centro, Toluca Estado de México', 4, 6, '1468.32', 6, '2020-10-02', '2020-10-02', 6),
(85, 85, 'BI9024', 1, 16, 105, 'Escuela Judicial, Toluca', 'Calle Josefa Ortiz de Domínguez No. 306 Norte, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '2049.79', 6, '2020-10-02', '2020-10-02', 6),
(86, 86, 'BI9032', 1, 16, 105, 'Archivo General  del Poder Judicial', 'Calle Independencia No. 106, en el poblado de San Pablo Autopan, Municipio de Toluca, Estado de México', 4, 6, '5516.18', 6, '2020-10-02', '2020-10-02', 6),
(87, 87, 'BI9036', 1, 16, 105, 'Anexo a la Escuela Judicial', 'Casa No. 711 de la Avenida Independencia Oriente, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '1417.12', 6, '2020-10-02', '2020-10-02', 6),
(88, 88, 'BI9046', 1, 16, 105, 'Edificio Central del Poder Judicial del Estado de México', 'Calle Nicolás Bravo Norte No. 201, Colonia Centro, Toluca, Estado de México.', 5, 1, '3193.75', 6, '2020-10-02', '0000-00-00', 0),
(89, 89, 'BI9052', 1, 16, 105, 'Unidad Deportiva de San Lorenzo Tepaltitlán', 'Calzada San Mateo S/N, San Lorenzo Tepaltitlán, Toluca, Estado de México.', 4, 6, '30967.66', 6, '2020-10-02', '2020-10-02', 6),
(90, 90, 'BI9056', 1, 16, 105, 'Instituto de Investigaciones Judiciales', 'Avenida Independencia No. 709, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '1200.00', 6, '2020-10-02', '2020-10-02', 6),
(91, 91, 'BI9060', 1, 16, 105, 'Nuevo Edificio Administrativo “A”', 'Calle Josefa Ortiz de Domínguez No. 207 Norte, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '2578.00', 6, '2020-10-02', '2020-10-02', 6),
(92, 92, 'BI9061', 1, 16, 105, 'Casa del Juzgador en Retiro', 'Avenida Independencia No. 707, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '564.05', 6, '2020-10-02', '2020-10-02', 6),
(93, 93, 'BI9066', 1, 16, 105, 'Edificio del Centro de Convivencia Familiar de Toluca', 'Avenida Independencia No. 705, Colonia Santa Clara, Toluca, Estado de México.', 3, 1, '408.65', 6, '2020-10-02', '0000-00-00', 0),
(94, 94, 'BI9079', 1, 16, 105, 'Nuevo Edificio Administrativo “B”', 'Avenida Independencia No. 616 Oriente, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '1871.30', 6, '2020-10-02', '2020-10-02', 6),
(95, 95, 'BI9085', 1, 16, 105, '\"Predio de Toluca  Lote C  (TERRENO)\"', 'Calle Dr. Nicolás San Juan, S/N, Ex Hacienda la Magdalena (Barrio San Juan de la Cruz), Santa Cruz Atzcapotzaltongo, Toluca, Estado de México.   ', 1, 1, '15669.79', 6, '2020-10-02', '0000-00-00', 0),
(96, 96, 'BI9086', 1, 16, 109, '\"Predio de Villa Victoria (TERRENO)\"', 'Carretera  - El Oro, Las Peñas, a un costado del Centro de Salud Urbano.', 1, 1, '4000.00', 6, '2020-10-02', '0000-00-00', 0),
(97, 97, 'BI9087', 1, 12, 79, '\"Inmueble de Santiago Tianguistenco  (Terreno)\"', 'Inmueble ubicado en la calle José Miranda N° 506 en Santiago Tianguistenco, Estado de México', 8, 1, '7552.16', 6, '2020-10-02', '0000-00-00', 0),
(98, 98, 'BI9088', 3, 15, 104, 'Inmueble Nicolás Romero (TERRENO)', 'Cerrada Guadalupe Victoria y Andador sin nombre, Colonia Independencia, Nicolás Romero, Estado de México.', 1, 1, '6769.66', 6, '2020-10-02', '2020-10-02', 6),
(99, 99, 'BI9089', 1, 16, 105, 'OFICINAS DE COMUNICACIÓN SOCIAL', 'Calle Leona Vicario número 305, Colonia Santa Clara, Municipio de Toluca, Estado de México.  ', 4, 6, '394.10', 6, '2020-10-02', '2020-10-03', 6),
(100, 100, 'BI9090', 1, 16, 105, 'Casa', 'Calle Leona Vicario número 303, Colonia Santa Clara, Municipio de Toluca, Estado de México.', 4, 6, '971.85', 6, '2020-10-02', '2020-10-03', 6),
(101, 101, 'BI9066', 1, 16, 105, 'Biblioteca de la escuela judicial', 'Avenida Independencia No. 705, Colonia Santa Clara, Toluca, Estado de México.', 4, 6, '408.65', 6, '2020-10-03', '0000-00-00', 0),
(102, 102, 'BI7777', 1, 4, 27, 'El edificio', 'El Domicilio necesita formato', 4, 6, '13456789.00', 6, '2020-10-06', '0000-00-00', 0),
(103, 103, 'BI7777', 1, 4, 27, 'El edificio', 'San Carlos #525 Colonia Paz', 1, 1, '1234596.00', 6, '2020-10-06', '0000-00-00', 0),
(104, 104, 'BI7777', 1, 4, 27, 'El edificio', 'San Carlos #525 Colonia Paz', 1, 1, '123.00', 6, '2020-10-06', '0000-00-00', 0),
(105, 105, 'BI7777', 1, 4, 27, 'El edificio', 'San Carlos #525 Colonia Paz', 1, 1, '123456789.00', 6, '2020-10-06', '0000-00-00', 0),
(106, 106, 'BI7777', 1, 4, 27, 'El edificio', 'San Carlos #525 Colonia Paz', 1, 1, '123456789.00', 6, '2020-10-06', '0000-00-00', 0),
(107, 108, 'BI7777', 1, 4, 27, 'El edificio', 'El Domicilio necesita formato', 1, 1, '123467.00', 6, '2020-10-06', '0000-00-00', 0);

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
  `rol` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `no_empleado`, `correo`, `pass`, `rol`, `status`) VALUES
(1, 'Super Usuario', 9999, 'super@correo.com.mx', '$2y$10$ZMfME4Df3PvhYbT8xW2P4O.1Xhuwyy.mK.o5qO6bCOK5GYUM5LWvW', 0, 1),
(2, 'dirección de control patrimonial', 0, 'direccion@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 1, 1),
(3, 'coordinación general jurídica', 0, 'coordinacion@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 2, 1),
(4, 'Manuel del Angel', 7894, 'angel@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 1, 1),
(5, 'Carlos Adrian Morales', 3256, 'carlos@correo.com', '$2y$10$KSMYNmxbbp.h8CHnxynUTeHRVuJB67wu.AF3e5QE3QuxZsAK2x2W6', 0, 1),
(6, 'Luis Fernando Monares González', 9468, 'fernando.monares@correo.com', '$2y$10$.YbvXhVz6htBWogZVkGRV.f/PlMi0pClwAK99Kv3a2xMrYbjoF2ba', 0, 1),
(7, 'Maria Arzalus', 2020, 'maria.arzaluz@pjedomex.gob.mx', '$2y$10$eoltB6vOv0wReDH4kWiXoO0sj4Si1VoFF8ZfCGwdB9/Ep2LFFVTJS', 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_expediente` (`no_expediente`);

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
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD KEY `no_expediente` (`no_expediente`);

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
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado_procesal`
--
ALTER TABLE `estado_procesal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modalidad_propiedad`
--
ALTER TABLE `modalidad_propiedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`no_expediente`) REFERENCES `registro_inmuebles` (`no_expediente`);

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
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`no_expediente`) REFERENCES `registro_inmuebles` (`no_expediente`);

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
