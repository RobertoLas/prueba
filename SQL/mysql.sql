-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2023 a las 01:56:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebadsis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE `candidato` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `candidato`
--

INSERT INTO `candidato` (`id`, `nombre_completo`) VALUES
(1, 'Pablo Samora'),
(2, 'Marcelo Ruiz'),
(3, 'Fabian Araya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `nombre`, `region_id`) VALUES
(1, 'Arica', 1),
(2, 'Camarones', 1),
(3, 'General Lagos', 1),
(4, 'Putre', 1),
(5, 'Alto Hospicio', 2),
(6, 'Iquique', 2),
(7, 'Camiña', 2),
(8, 'Colchane', 2),
(9, 'Huara', 2),
(10, 'Pica', 2),
(11, 'Pozo Almonte', 2),
(12, 'Antofagasta', 3),
(13, 'Mejillones', 3),
(14, 'Sierra Gorda', 3),
(15, 'Taltal', 3),
(16, 'Calama', 3),
(17, 'Ollague', 3),
(18, 'San Pedro de Atacama', 3),
(19, 'María Elena', 3),
(20, 'Tocopilla', 3),
(21, 'Chañaral', 4),
(22, 'Diego de Almagro', 4),
(23, 'Caldera', 4),
(24, 'Copiapó', 4),
(25, 'Tierra Amarilla', 4),
(26, 'Alto del Carmen', 4),
(27, 'Freirina', 4),
(28, 'Huasco', 4),
(29, 'Vallenar', 4),
(30, 'Canela', 5),
(31, 'Illapel', 5),
(32, 'Los Vilos', 5),
(33, 'Salamanca', 5),
(34, 'Andacollo', 5),
(35, 'Coquimbo', 5),
(36, 'La Higuera', 5),
(37, 'La Serena', 5),
(38, 'Paihuaco', 5),
(39, 'Vicuña', 5),
(40, 'Combarbalá', 5),
(41, 'Monte Patria', 5),
(42, 'Ovalle', 5),
(43, 'Punitaqui', 5),
(44, 'Río Hurtado', 5),
(45, 'Isla de Pascua', 6),
(46, 'Calle Larga', 6),
(47, 'Los Andes', 6),
(48, 'Rinconada', 6),
(49, 'San Esteban', 6),
(50, 'La Ligua', 6),
(51, 'Papudo', 6),
(52, 'Petorca', 6),
(53, 'Zapallar', 6),
(54, 'Hijuelas', 6),
(55, 'La Calera', 6),
(56, 'La Cruz', 6),
(57, 'Limache', 6),
(58, 'Nogales', 6),
(59, 'Olmué', 6),
(60, 'Quillota', 6),
(61, 'Algarrobo', 6),
(62, 'Cartagena', 6),
(63, 'El Quisco', 6),
(64, 'El Tabo', 6),
(65, 'San Antonio', 6),
(66, 'Santo Domingo', 6),
(67, 'Catemu', 6),
(68, 'Llaillay', 6),
(69, 'Panquehue', 6),
(70, 'Putaendo', 6),
(71, 'San Felipe', 6),
(72, 'Santa María', 6),
(73, 'Casablanca', 6),
(74, 'Concón', 6),
(75, 'Juan Fernández', 6),
(76, 'Puchuncaví', 6),
(77, 'Quilpué', 6),
(78, 'Quintero', 6),
(79, 'Valparaíso', 6),
(80, 'Villa Alemana', 6),
(81, 'Viña del Mar', 6),
(82, 'Colina', 7),
(83, 'Lampa', 7),
(84, 'Tiltil', 7),
(85, 'Pirque', 7),
(86, 'Puente Alto', 7),
(87, 'San José de Maipo', 7),
(88, 'Buin', 7),
(89, 'Calera de Tango', 7),
(90, 'Paine', 7),
(91, 'San Bernardo', 7),
(92, 'Alhué', 7),
(93, 'Curacaví', 7),
(94, 'María Pinto', 7),
(95, 'Melipilla', 7),
(96, 'San Pedro', 7),
(97, 'Cerrillos', 7),
(98, 'Cerro Navia', 7),
(99, 'Conchalí', 7),
(100, 'El Bosque', 7),
(101, 'Estación Central', 7),
(102, 'Huechuraba', 7),
(103, 'Independencia', 7),
(104, 'La Cisterna', 7),
(105, 'La Granja', 7),
(106, 'La Florida', 7),
(107, 'La Pintana', 7),
(108, 'La Reina', 7),
(109, 'Las Condes', 7),
(110, 'Lo Barnechea', 7),
(111, 'Lo Espejo', 7),
(112, 'Lo Prado', 7),
(113, 'Macul', 7),
(114, 'Maipú', 7),
(115, 'Ñuñoa', 7),
(116, 'Pedro Aguirre Cerda', 7),
(117, 'Peñalolén', 7),
(118, 'Providencia', 7),
(119, 'Pudahuel', 7),
(120, 'Quilicura', 7),
(121, 'Quinta Normal', 7),
(122, 'Recoleta', 7),
(123, 'Renca', 7),
(124, 'San Miguel', 7),
(125, 'San Joaquín', 7),
(126, 'San Ramón', 7),
(127, 'Santiago', 7),
(128, 'Vitacura', 7),
(129, 'El Monte', 7),
(130, 'Isla de Maipo', 7),
(131, 'Padre Hurtado', 7),
(132, 'Peñaflor', 7),
(133, 'Talagante', 7),
(134, 'Codegua', 8),
(135, 'Coínco', 8),
(136, 'Coltauco', 8),
(137, 'Doñihue', 8),
(138, 'Graneros', 8),
(139, 'Las Cabras', 8),
(140, 'Machalí', 8),
(141, 'Malloa', 8),
(142, 'Mostazal', 8),
(143, 'Olivar', 8),
(144, 'Peumo', 8),
(145, 'Pichidegua', 8),
(146, 'Quinta de Tilcoco', 8),
(147, 'Rancagua', 8),
(148, 'Rengo', 8),
(149, 'Requínoa', 8),
(150, 'San Vicente de Tagua Tagua', 8),
(151, 'La Estrella', 8),
(152, 'Litueche', 8),
(153, 'Marchihue', 8),
(154, 'Navidad', 8),
(155, 'Peredones', 8),
(156, 'Pichilemu', 8),
(157, 'Chépica', 8),
(158, 'Chimbarongo', 8),
(159, 'Lolol', 8),
(160, 'Nancagua', 8),
(161, 'Palmilla', 8),
(162, 'Peralillo', 8),
(163, 'Placilla', 8),
(164, 'Pumanque', 8),
(165, 'San Fernando', 8),
(166, 'Santa Cruz', 8),
(167, 'Cauquenes', 9),
(168, 'Chanco', 9),
(169, 'Pelluhue', 9),
(170, 'Curicó', 9),
(171, 'Hualañé', 9),
(172, 'Licantén', 9),
(173, 'Molina', 9),
(174, 'Rauco', 9),
(175, 'Romeral', 9),
(176, 'Sagrada Familia', 9),
(177, 'Teno', 9),
(178, 'Vichuquén', 9),
(179, 'Colbún', 9),
(180, 'Linares', 9),
(181, 'Longaví', 9),
(182, 'Parral', 9),
(183, 'Retiro', 9),
(184, 'San Javier', 9),
(185, 'Villa Alegre', 9),
(186, 'Yerbas Buenas', 9),
(187, 'Constitución', 9),
(188, 'Curepto', 9),
(189, 'Empedrado', 9),
(190, 'Maule', 9),
(191, 'Pelarco', 9),
(192, 'Pencahue', 9),
(193, 'Río Claro', 9),
(194, 'San Clemente', 9),
(195, 'San Rafael', 9),
(196, 'Talca', 9),
(197, 'Bulnes', 10),
(198, 'Chillán', 10),
(199, 'Chillán Viejo', 10),
(200, 'Cobquecura', 10),
(201, 'Coelemu', 10),
(202, 'Coihueco', 10),
(203, 'El Carmen', 10),
(204, 'Ninhue', 10),
(205, 'Ñiquen', 10),
(206, 'Pemuco', 10),
(207, 'Pinto', 10),
(208, 'Portezuelo', 10),
(209, 'Quirihue', 10),
(210, 'Ránquil', 10),
(211, 'Treguaco', 10),
(212, 'Quillón', 10),
(213, 'San Carlos', 10),
(214, 'San Fabián', 10),
(215, 'San Ignacio', 10),
(216, 'San Nicolás', 10),
(217, 'Yungay', 10),
(218, 'Arauco', 11),
(219, 'Cañete', 11),
(220, 'Contulmo', 11),
(221, 'Curanilahue', 11),
(222, 'Lebu', 11),
(223, 'Los Álamos', 11),
(224, 'Tirúa', 11),
(225, 'Alto Biobío', 11),
(226, 'Antuco', 11),
(227, 'Cabrero', 11),
(228, 'Laja', 11),
(229, 'Los Ángeles', 11),
(230, 'Mulchén', 11),
(231, 'Nacimiento', 11),
(232, 'Negrete', 11),
(233, 'Quilaco', 11),
(234, 'Quilleco', 11),
(235, 'San Rosendo', 11),
(236, 'Santa Bárbara', 11),
(237, 'Tucapel', 11),
(238, 'Yumbel', 11),
(239, 'Chiguayante', 11),
(240, 'Concepción', 11),
(241, 'Coronel', 11),
(242, 'Florida', 11),
(243, 'Hualpén', 11),
(244, 'Hualqui', 11),
(245, 'Lota', 11),
(246, 'Penco', 11),
(247, 'San Pedro de La Paz', 11),
(248, 'Santa Juana', 11),
(249, 'Talcahuano', 11),
(250, 'Tomé', 11),
(251, 'Carahue', 12),
(252, 'Cholchol', 12),
(253, 'Cunco', 12),
(254, 'Curarrehue', 12),
(255, 'Freire', 12),
(256, 'Galvarino', 12),
(257, 'Gorbea', 12),
(258, 'Lautaro', 12),
(259, 'Loncoche', 12),
(260, 'Melipeuco', 12),
(261, 'Nueva Imperial', 12),
(262, 'Padre Las Casas', 12),
(263, 'Perquenco', 12),
(264, 'Pitrufquén', 12),
(265, 'Pucón', 12),
(266, 'Saavedra', 12),
(267, 'Temuco', 12),
(268, 'Teodoro Schmidt', 12),
(269, 'Toltén', 12),
(270, 'Vilcún', 12),
(271, 'Villarrica', 12),
(272, 'Angol', 12),
(273, 'Collipulli', 12),
(274, 'Curacautín', 12),
(275, 'Ercilla', 12),
(276, 'Lonquimay', 12),
(277, 'Los Sauces', 12),
(278, 'Lumaco', 12),
(279, 'Purén', 12),
(280, 'Renaico', 12),
(281, 'Traiguén', 12),
(282, 'Victoria', 12),
(283, 'Corral', 13),
(284, 'Lanco', 13),
(285, 'Los Lagos', 13),
(286, 'Máfil', 13),
(287, 'Mariquina', 13),
(288, 'Paillaco', 13),
(289, 'Panguipulli', 13),
(290, 'Valdivia', 13),
(291, 'Futrono', 13),
(292, 'La Unión', 13),
(293, 'Lago Ranco', 13),
(294, 'Río Bueno', 13),
(295, 'Ancud', 14),
(296, 'Castro', 14),
(297, 'Chonchi', 14),
(298, 'Curaco de Vélez', 14),
(299, 'Dalcahue', 14),
(300, 'Puqueldón', 14),
(301, 'Queilén', 14),
(302, 'Quemchi', 14),
(303, 'Quellón', 14),
(304, 'Quinchao', 14),
(305, 'Calbuco', 14),
(306, 'Cochamó', 14),
(307, 'Fresia', 14),
(308, 'Frutillar', 14),
(309, 'Llanquihue', 14),
(310, 'Los Muermos', 14),
(311, 'Maullín', 14),
(312, 'Puerto Montt', 14),
(313, 'Puerto Varas', 14),
(314, 'Osorno', 14),
(315, 'Puero Octay', 14),
(316, 'Purranque', 14),
(317, 'Puyehue', 14),
(318, 'Río Negro', 14),
(319, 'San Juan de la Costa', 14),
(320, 'San Pablo', 14),
(321, 'Chaitén', 14),
(322, 'Futaleufú', 14),
(323, 'Hualaihué', 14),
(324, 'Palena', 14),
(325, 'Aisén', 15),
(326, 'Cisnes', 15),
(327, 'Guaitecas', 15),
(328, 'Cochrane', 15),
(329, 'O\'higgins', 15),
(330, 'Tortel', 15),
(331, 'Coihaique', 15),
(332, 'Lago Verde', 15),
(333, 'Chile Chico', 15),
(334, 'Río Ibáñez', 15),
(335, 'Antártica', 16),
(336, 'Cabo de Hornos', 16),
(337, 'Laguna Blanca', 16),
(338, 'Punta Arenas', 16),
(339, 'Río Verde', 16),
(340, 'San Gregorio', 16),
(341, 'Porvenir', 16),
(342, 'Primavera', 16),
(343, 'Timaukel', 16),
(344, 'Natales', 16),
(345, 'Torres del Paine', 16),
(346, 'Cabildo', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_votacion`
--

CREATE TABLE `contacto_votacion` (
  `id` int(20) NOT NULL,
  `id_medio_contacto` int(11) NOT NULL,
  `id_votante` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto_votacion`
--

INSERT INTO `contacto_votacion` (`id`, `id_medio_contacto`, `id_votante`) VALUES
(53, 13, 24),
(54, 14, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_contacto`
--

CREATE TABLE `medio_contacto` (
  `id` int(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medio_contacto`
--

INSERT INTO `medio_contacto` (`id`, `descripcion`) VALUES
(13, 'Web'),
(14, 'TV'),
(15, 'Redes Sociales'),
(16, 'Amigo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `region` varchar(64) NOT NULL,
  `abreviatura` varchar(4) NOT NULL,
  `capital` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `region`, `abreviatura`, `capital`) VALUES
(1, 'Arica y Parinacota', 'AP', 'Arica'),
(2, 'Tarapacá', 'TA', 'Iquique'),
(3, 'Antofagasta', 'AN', 'Antofagasta'),
(4, 'Atacama', 'AT', 'Copiapó'),
(5, 'Coquimbo', 'CO', 'La Serena'),
(6, 'Valparaiso', 'VA', 'valparaíso'),
(7, 'Metropolitana de Santiago', 'RM', 'Santiago'),
(8, 'Libertador General Bernardo O\'Higgins', 'OH', 'Rancagua'),
(9, 'Maule', 'MA', 'Talca'),
(10, 'Ñuble', 'NB', 'Chillán'),
(11, 'Biobío', 'BI', 'Concepción'),
(12, 'La Araucanía', 'IAR', 'Temuco'),
(13, 'Los Ríos', 'LR', 'Valdivia'),
(14, 'Los Lagos', 'LL', 'Puerto Montt'),
(15, 'Aysén del General Carlos Ibáñez del Campo', 'AI', 'Coyhaique'),
(16, 'Magallanes y de la Antártica Chilena', 'MG', 'Punta Arenas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE `votacion` (
  `id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `votante_id` int(11) NOT NULL,
  `candidato_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `votacion`
--

INSERT INTO `votacion` (`id`, `fecha`, `votante_id`, `candidato_id`) VALUES
(17, '2023-09-16 00:00:00', 24, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votante`
--

CREATE TABLE `votante` (
  `id` int(11) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `nombre_completo` varchar(30) NOT NULL,
  `alias` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `comuna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `votante`
--

INSERT INTO `votante` (`id`, `rut`, `nombre_completo`, `alias`, `email`, `comuna_id`) VALUES
(24, '19330183-5', 'Roberto Espinoza', 'Roerto1234', 'roberto.espinoza.espinoza@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto_votacion`
--
ALTER TABLE `contacto_votacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medio_contacto_fk` (`id_medio_contacto`),
  ADD KEY `id_votacion` (`id_votante`);

--
-- Indices de la tabla `medio_contacto`
--
ALTER TABLE `medio_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votacion_candidato_fk` (`candidato_id`),
  ADD KEY `votacion_votante_fk` (`votante_id`);

--
-- Indices de la tabla `votante`
--
ALTER TABLE `votante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rut` (`rut`),
  ADD KEY `comuna_fk` (`comuna_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidato`
--
ALTER TABLE `candidato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT de la tabla `contacto_votacion`
--
ALTER TABLE `contacto_votacion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `medio_contacto`
--
ALTER TABLE `medio_contacto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `votacion`
--
ALTER TABLE `votacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `votante`
--
ALTER TABLE `votante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto_votacion`
--
ALTER TABLE `contacto_votacion`
  ADD CONSTRAINT `contacto_votacion_ibfk_1` FOREIGN KEY (`id_votante`) REFERENCES `votante` (`id`),
  ADD CONSTRAINT `medio_contacto_fk` FOREIGN KEY (`id_medio_contacto`) REFERENCES `medio_contacto` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `votacion_candidato_fk` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votacion_votante_fk` FOREIGN KEY (`votante_id`) REFERENCES `votante` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `votante`
--
ALTER TABLE `votante`
  ADD CONSTRAINT `comuna_fk` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
