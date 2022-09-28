-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2022 a las 22:36:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historiamedica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedente`
--

CREATE TABLE `antecedente` (
  `id_antecedente` int(11) NOT NULL,
  `antecedente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `antecedente`
--

INSERT INTO `antecedente` (`id_antecedente`, `antecedente`) VALUES
(4, 'Alergia'),
(17, 'Anticonceptivo'),
(7, 'Asma'),
(3, 'Diabetes'),
(19, 'Drogas'),
(6, 'EBPOC'),
(20, 'Familiar'),
(18, 'Gastrointestinales'),
(1, 'Hepatitis'),
(2, 'HTA'),
(15, 'Infecto-contagiosas'),
(16, 'Obstetricos'),
(13, 'Parotiditis'),
(9, 'Quirurgico'),
(14, 'Rubéola'),
(11, 'Sarampion'),
(5, 'TBC'),
(10, 'Traumatico'),
(12, 'Varicela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedente_familiar`
--

CREATE TABLE `antecedente_familiar` (
  `id_antecendente_familiar` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_antecedente` int(11) NOT NULL,
  `id_familiar` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `antecedente_familiar`
--

INSERT INTO `antecedente_familiar` (`id_antecendente_familiar`, `id_paciente`, `id_antecedente`, `id_familiar`, `descripcion`) VALUES
(1, 8, 20, 2, 'La madre tuvo cáncer de senos'),
(9, 8, 20, 3, 'antecedente hija');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedente_personal`
--

CREATE TABLE `antecedente_personal` (
  `id_antecedente_personal` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_antecedente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `antecedente_personal`
--

INSERT INTO `antecedente_personal` (`id_antecedente_personal`, `id_paciente`, `descripcion`, `id_antecedente`) VALUES
(2, 8, 'Alergia a los cacaos x2', 4),
(3, 8, 'tiene hta', 2),
(235, 8, 'TBC', 5),
(237, 8, 'Sarampion', 11),
(238, 8, 'Rubéola', 14),
(239, 8, 'Adicto a la cocaina hace 20 años', 19),
(243, 8, 'Antecedente gastrointestinal. gastrointestinal 2', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `droga`
--

CREATE TABLE `droga` (
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_droga` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_droga_table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `droga`
--

INSERT INTO `droga` (`descripcion`, `id_droga`, `id_paciente`, `id_droga_table`) VALUES
('Consumo frecuente', 7, 8, 12),
('Exceso', 6, 8, 13),
('Peor que radio con pilas nuevas', 3, 8, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion`
--

CREATE TABLE `evolucion` (
  `id_evolucion` int(11) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(15) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evolucion`
--

INSERT INTO `evolucion` (`id_evolucion`, `descripcion`, `fecha`, `hora`, `id_paciente`) VALUES
(11, 'Evolucion de prueba 1', '2022-06-06', '0:53', 8),
(12, 'Esta es la tercera evolucion', '2022-06-06', '14:3', 8),
(13, 'Esta es la segunda evolucion', '2022-06-07', '9:16', 1),
(14, 'Esta es la primera evolucion', '2022-06-07', '14:7', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `id_familiar` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `familiar`
--

INSERT INTO `familiar` (`id_familiar`, `nombre`) VALUES
(1, 'padre'),
(2, 'madre'),
(3, 'hija'),
(4, 'hijo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad` int(3) NOT NULL,
  `Sexo` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formacion` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deporte` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_estudio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueño` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FUR` date DEFAULT NULL,
  `menstruacion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `micciones` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `habito_intestinal` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` int(3) DEFAULT NULL,
  `talla` int(3) DEFAULT NULL,
  `tension_arterial` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respiraciones` int(3) DEFAULT NULL,
  `Pulso` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperatura` int(3) DEFAULT NULL,
  `diagnostico` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_introduccion` date NOT NULL,
  `id_pais_origen` int(11) DEFAULT NULL,
  `id_pais_residencia` int(11) DEFAULT NULL,
  `id_ocupacion` int(11) DEFAULT NULL,
  `id_empleo` int(11) DEFAULT NULL,
  `seguro_medico` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `primer_apellido`, `segundo_apellido`, `edad`, `Sexo`, `fecha_nacimiento`, `direccion`, `dni`, `estado_civil`, `formacion`, `deporte`, `nivel_estudio`, `sueño`, `FUR`, `menstruacion`, `micciones`, `habito_intestinal`, `peso`, `talla`, `tension_arterial`, `respiraciones`, `Pulso`, `temperatura`, `diagnostico`, `plan`, `fecha_introduccion`, `id_pais_origen`, `id_pais_residencia`, `id_ocupacion`, `id_empleo`, `seguro_medico`) VALUES
(1, 'Rafael', '', '', 12, 'R', '2001-11-03', '', '', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-12', NULL, NULL, NULL, NULL, ''),
(5, 'Rafael', 'Cifre', 'Falcón', 0, 'M', '2001-11-03', '', '12', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-12', NULL, NULL, NULL, NULL, ''),
(7, 'Rafael', 'Cifre', 'Falcón', 0, '', '2022-05-18', '', '13', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-12', NULL, NULL, NULL, NULL, ''),
(8, 'Adriana', 'Cifre', 'Falcón', 0, 'm', '2022-05-18', 'Calle13', '14', 'casado', 'Universitaria', 'POQUITO POQUITO', 'bajo', 'malos', '2022-05-12', 'normal1', 'normal2', 'normal3', 55, 42, 'Tension Alta', 94, 'Pulso Alto', 39, 'Malo malo', 'Plan planazo', '2022-05-12', 52, 48, 20, 12, 'TamosContigo'),
(9, 'Yasmin', 'Falcón', 'Miranda', 0, '', '1984-11-07', '', '19', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-12', NULL, NULL, NULL, NULL, ''),
(10, 'Dagmar', 'Cifre', 'Falcón', 0, '', '1997-10-03', '', '22', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-12', NULL, NULL, NULL, NULL, ''),
(11, 'Rafael', 'Falcón', 'Miranda', 0, '', '2019-07-08', '', '2999', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-15', NULL, NULL, NULL, NULL, ''),
(12, 'Rafael', 'Cordovez', 'Miranda', 0, '', '2006-06-01', '', '2131', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-05-16', NULL, NULL, NULL, NULL, ''),
(13, 'Pedro', 'Rosa', 'Meltroso', 0, '', '2015-02-11', '', '433231', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-06-06', NULL, NULL, NULL, NULL, ''),
(14, 'Yulio', 'Marquez', 'Marco', 0, '', '2012-03-30', '', '32421342', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, '', NULL, '', NULL, '', '', '2022-06-06', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `nombre_pais` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `iso`, `nombre_pais`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id_profesion` int(11) NOT NULL,
  `nombre_empleo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id_profesion`, `nombre_empleo`) VALUES
(1, 'Abogados y notarios'),
(4, 'Actor'),
(5, 'Agente de viajes'),
(6, 'Arquitecto'),
(7, 'Astrónomo'),
(8, 'Autor'),
(9, 'Barrendero'),
(10, 'Bibliotecario'),
(11, 'Bombero'),
(12, 'Carabinero'),
(18, 'Chef'),
(13, 'Científico'),
(14, 'Cirujano'),
(15, 'Conductor'),
(17, 'Contador'),
(19, 'Dentista'),
(20, 'Diseñador'),
(21, 'Doctor'),
(22, 'Electricista'),
(23, 'Enfermero'),
(24, 'Estilista'),
(25, 'Farmacéutico'),
(27, 'Florista'),
(26, 'Fontanero'),
(28, 'Fotógrafo'),
(2, 'Fotógrafo/a'),
(29, 'Gásfiter'),
(30, 'Granjero'),
(31, 'Jardinero'),
(32, 'Juez'),
(33, 'Júnior'),
(34, 'Lector'),
(35, 'Limpiador'),
(36, 'Maestro de construcción'),
(37, 'Mecánico'),
(62, 'Medico'),
(38, 'Mesero'),
(39, 'Modelo'),
(40, 'Oftalmólogo'),
(41, 'Panadero'),
(42, 'Peluquero'),
(43, 'Periodista'),
(44, 'Pescador'),
(46, 'Piloto'),
(45, 'Pintor'),
(47, 'Plomero'),
(48, 'Policía'),
(49, 'Político'),
(50, 'Profesor'),
(3, 'Psicólogos'),
(51, 'Psiquiatra'),
(52, 'Recepcionista'),
(53, 'Salvavidas'),
(54, 'Sastre'),
(55, 'Secretario'),
(56, 'Soldado'),
(57, 'Taxista'),
(58, 'Trabajador de fabrica'),
(59, 'Traductor'),
(60, 'Vendedor'),
(61, 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_droga`
--

CREATE TABLE `tipo_droga` (
  `id_droga` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_droga`
--

INSERT INTO `tipo_droga` (`id_droga`, `nombre`) VALUES
(1, 'Alcohol'),
(4, 'Anfetamina'),
(6, 'Cannabis'),
(3, 'Cocaina'),
(7, 'MDMA'),
(5, 'Metanfetamina'),
(2, 'Tabaco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int(3) NOT NULL,
  `sexo` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tipo_usuario`, `nombre`, `primer_apellido`, `segundo_apellido`, `edad`, `sexo`, `fecha_nacimiento`, `direccion`, `dni`, `user_name`, `contrasena`) VALUES
(1, 1, 'Rafael', 'Cifre', 'Falcón', 20, '0', '0000-00-00', 'C/ Berrni i Catala 15', '13319163R', 'rafaMed', '321334aaSA*'),
(2, 2, 'Rafael', 'Cfre', 'Falcon', 20, 'M', '2001-11-03', 'Calle 13', '12345', 'rafaAdmin', '321334aaSA*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_cita_paciente`
--

CREATE TABLE `usuario_cita_paciente` (
  `usuario_id_usuario` int(11) NOT NULL,
  `paciente_id_paciente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `hora` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedente`
--
ALTER TABLE `antecedente`
  ADD PRIMARY KEY (`id_antecedente`),
  ADD UNIQUE KEY `antecedente_UNIQUE` (`antecedente`);

--
-- Indices de la tabla `antecedente_familiar`
--
ALTER TABLE `antecedente_familiar`
  ADD PRIMARY KEY (`id_antecendente_familiar`),
  ADD KEY `fk_antecedente_familiar_antecedente1_idx` (`id_antecedente`),
  ADD KEY `fk_antecedente_familiar_paciente1_idx` (`id_paciente`),
  ADD KEY `fk_antecedente_familiar_familiar1_idx` (`id_familiar`);

--
-- Indices de la tabla `antecedente_personal`
--
ALTER TABLE `antecedente_personal`
  ADD PRIMARY KEY (`id_antecedente_personal`),
  ADD KEY `id_paciente_idx` (`id_paciente`),
  ADD KEY `fk_antecedente_personal_antecedente1_idx` (`id_antecedente`);

--
-- Indices de la tabla `droga`
--
ALTER TABLE `droga`
  ADD PRIMARY KEY (`id_droga_table`),
  ADD KEY `id_droga_idx` (`id_droga`),
  ADD KEY `fk_droga_paciente1_idx` (`id_paciente`);

--
-- Indices de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD PRIMARY KEY (`id_evolucion`),
  ADD KEY `fk_evolucion_paciente1_idx` (`id_paciente`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`id_familiar`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `id_empleo_idx` (`formacion`),
  ADD KEY `fk_paciente_pais1_idx` (`id_pais_origen`),
  ADD KEY `fk_paciente_pais2_idx` (`id_pais_residencia`),
  ADD KEY `fk_paciente_profesiones1_idx` (`id_ocupacion`),
  ADD KEY `fk_paciente_profesiones2_idx` (`id_empleo`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`),
  ADD UNIQUE KEY `nombre_pais_UNIQUE` (`nombre_pais`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id_profesion`),
  ADD UNIQUE KEY `nombre_empleo_UNIQUE` (`nombre_empleo`);

--
-- Indices de la tabla `tipo_droga`
--
ALTER TABLE `tipo_droga`
  ADD PRIMARY KEY (`id_droga`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`user_name`);

--
-- Indices de la tabla `usuario_cita_paciente`
--
ALTER TABLE `usuario_cita_paciente`
  ADD PRIMARY KEY (`usuario_id_usuario`,`paciente_id_paciente`),
  ADD KEY `fk_usuario_has_paciente_paciente1_idx` (`paciente_id_paciente`),
  ADD KEY `fk_usuario_has_paciente_usuario1_idx` (`usuario_id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedente`
--
ALTER TABLE `antecedente`
  MODIFY `id_antecedente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `antecedente_familiar`
--
ALTER TABLE `antecedente_familiar`
  MODIFY `id_antecendente_familiar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `antecedente_personal`
--
ALTER TABLE `antecedente_personal`
  MODIFY `id_antecedente_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de la tabla `droga`
--
ALTER TABLE `droga`
  MODIFY `id_droga_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  MODIFY `id_evolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `id_familiar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id_profesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `tipo_droga`
--
ALTER TABLE `tipo_droga`
  MODIFY `id_droga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antecedente_familiar`
--
ALTER TABLE `antecedente_familiar`
  ADD CONSTRAINT `fk_antecedente_familiar_antecedente1` FOREIGN KEY (`id_antecedente`) REFERENCES `antecedente` (`id_antecedente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_antecedente_familiar_familiar1` FOREIGN KEY (`id_familiar`) REFERENCES `familiar` (`id_familiar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_antecedente_familiar_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `antecedente_personal`
--
ALTER TABLE `antecedente_personal`
  ADD CONSTRAINT `fk_antecedente_personal_antecedente1` FOREIGN KEY (`id_antecedente`) REFERENCES `antecedente` (`id_antecedente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `droga`
--
ALTER TABLE `droga`
  ADD CONSTRAINT `fk_droga_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_droga_tipodroga1` FOREIGN KEY (`id_droga`) REFERENCES `tipo_droga` (`id_droga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD CONSTRAINT `fk_evolucion_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_pais1` FOREIGN KEY (`id_pais_origen`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_pais2` FOREIGN KEY (`id_pais_residencia`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_profesiones1` FOREIGN KEY (`id_ocupacion`) REFERENCES `profesiones` (`id_profesion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_profesiones2` FOREIGN KEY (`id_empleo`) REFERENCES `profesiones` (`id_profesion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_cita_paciente`
--
ALTER TABLE `usuario_cita_paciente`
  ADD CONSTRAINT `fk_usuario_has_paciente_paciente1` FOREIGN KEY (`paciente_id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_paciente_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
