-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 21:57:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm_cumbre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacto`
--

CREATE TABLE `tbl_contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre_cont` varchar(120) NOT NULL,
  `apellido_cont` varchar(120) NOT NULL,
  `cod_car_1` int(11) NOT NULL,
  `cod_car_2` int(11) DEFAULT NULL,
  `telefono_1` int(20) NOT NULL,
  `telefono_2` int(20) DEFAULT NULL,
  `propietario_cont` int(11) NOT NULL,
  `cod_origen_dato` int(11) NOT NULL,
  `cod_estado_cont` int(11) DEFAULT NULL,
  `descripcion_cont` varchar(256) DEFAULT NULL,
  `estado_cont` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`id_contacto`, `nombre_cont`, `apellido_cont`, `cod_car_1`, `cod_car_2`, `telefono_1`, `telefono_2`, `propietario_cont`, `cod_origen_dato`, `cod_estado_cont`, `descripcion_cont`, `estado_cont`) VALUES
(1, 'DAVID ISAIAS', 'VELASQUEZ', 2, NULL, 75311928, NULL, 4, 1, 3, NULL, 1),
(2, 'JUAN', 'LOPEZ', 3, 2, 75311928, NULL, 3, 2, 2, NULL, 1),
(3, 'PEDRO', 'SANCHEZ', 5, NULL, 75311928, NULL, 2, 3, 3, NULL, 1),
(75, 'Beatriz Urandura Justiniano', 'SN', 4, NULL, 63466954, NULL, 2, 1, NULL, '6', 1),
(76, 'Ana Maria Garcia', 'SN', 4, NULL, 70948152, NULL, 3, 1, NULL, '6', 1),
(77, 'Shenin Sandi Encinas', 'SN', 4, NULL, 68762156, NULL, 4, 1, NULL, '6', 1),
(78, 'Margarita lourdes Montero quispe', 'SN', 4, NULL, 68844271, NULL, 2, 1, NULL, '6', 1),
(79, 'Brayan Paina', 'SN', 4, NULL, 75637021, NULL, 3, 1, NULL, '6', 1),
(80, 'crespo', 'SN', 4, NULL, 78042441, NULL, 4, 1, NULL, '6', 1),
(81, 'Elizabeth r. castillo', 'SN', 4, NULL, 60719768, NULL, 2, 1, NULL, '6', 1),
(82, '???', 'SN', 4, NULL, 71520700, NULL, 3, 1, NULL, '6', 1),
(83, 'Georgina G. Escalante', 'SN', 4, NULL, 75674944, NULL, 4, 1, NULL, '6', 1),
(84, 'yoli', 'SN', 4, NULL, 67579631, NULL, 2, 1, NULL, '6', 1),
(85, 'Luis Fernando Villalba', 'SN', 4, NULL, 78092449, NULL, 3, 1, NULL, '6', 1),
(86, 'Darianita Lutino Becerra', 'SN', 4, NULL, 60837933, NULL, 4, 1, NULL, '6', 1),
(87, 'Guadalupe Quiroga Torrez', 'SN', 4, NULL, 76376331, NULL, 2, 1, NULL, '6', 1),
(88, 'Jose Soliz', 'SN', 4, NULL, 69682708, NULL, 3, 1, NULL, '6', 1),
(89, 'Royber L?pez Lopez', 'SN', 4, NULL, 71899752, NULL, 4, 1, NULL, '6', 1),
(90, 'Vania Paco', 'SN', 4, NULL, 67497996, NULL, 2, 1, NULL, '6', 1),
(91, 'Carlos Balderrama', 'SN', 4, NULL, 65672110, NULL, 3, 1, NULL, '6', 1),
(92, 'Carlos Mario', 'SN', 4, NULL, 78508240, NULL, 4, 1, NULL, '6', 1),
(93, 'Miguel Medrano', 'SN', 4, NULL, 69516721, NULL, 2, 1, NULL, '6', 1),
(94, 'Jenny Reyes Lea?o', 'SN', 4, NULL, 77041373, NULL, 3, 1, NULL, '6', 1),
(95, 'Diana Paola Calizaya', 'SN', 4, NULL, 77612618, NULL, 4, 1, NULL, '6', 1),
(96, 'Litz Pizarro', 'SN', 4, NULL, 63482281, NULL, 2, 1, NULL, '6', 1),
(97, 'Jose Carlos Romero Mendez', 'SN', 4, NULL, 70205122, NULL, 3, 1, NULL, '6', 1),
(98, 'Luis Alberto Salazar P', 'SN', 4, NULL, 76349336, NULL, 4, 1, NULL, '6', 1),
(99, 'Elma Barba Montenegro', 'SN', 4, NULL, 69009962, NULL, 2, 1, NULL, '6', 1),
(100, 'Brandon Mejia', 'SN', 4, NULL, 72283741, NULL, 3, 1, NULL, '6', 1),
(101, 'Rolando Lira Cerezo', 'SN', 4, NULL, 76038921, NULL, 4, 1, NULL, '6', 1),
(102, 'Jorge Cruz', 'SN', 4, NULL, 75940686, NULL, 2, 1, NULL, '6', 1),
(103, 'Cristhian Guzman Barba', 'SN', 4, NULL, 73111831, NULL, 3, 1, NULL, '6', 1),
(104, 'Misael Gregorio Salvatierra Medellin', 'SN', 4, NULL, 74157394, NULL, 4, 1, NULL, '6', 1),
(105, 'Evelin Huayra?a Villegas', 'SN', 4, NULL, 73984179, NULL, 2, 1, NULL, '6', 1),
(106, 'Carlitos Cuellar', 'SN', 4, NULL, 68926817, NULL, 3, 1, NULL, '6', 1),
(107, 'Beatriz Llaveta', 'SN', 4, NULL, 76851125, NULL, 4, 1, NULL, '6', 1),
(108, 'Marlen Nair Villacorta Argiro', 'SN', 4, NULL, 76300589, NULL, 2, 1, NULL, '6', 1),
(109, 'Erwin Arauz Vaca', 'SN', 4, NULL, 74525070, NULL, 3, 1, NULL, '6', 1),
(110, 'Juan Carlos Zambrana Rocha', 'SN', 4, NULL, 74922440, NULL, 4, 1, NULL, '6', 1),
(111, 'Fabi Yarari', 'SN', 4, NULL, 74842531, NULL, 2, 1, NULL, '6', 1),
(112, 'V????j?? M????? F????????', 'SN', 4, NULL, 67782595, NULL, 3, 1, NULL, '6', 1),
(113, 'Tamara Cardozo', 'SN', 4, NULL, 78510675, NULL, 4, 1, NULL, '6', 1),
(114, 'Rodolfo Reynaga loayza', 'SN', 4, NULL, 77606060, NULL, 2, 1, NULL, '6', 1),
(115, 'Jimmy Peredo Zambrana', 'SN', 4, NULL, 79961004, NULL, 3, 1, NULL, '6', 1),
(116, 'Keiko Rivero Mole', 'SN', 4, NULL, 77697863, NULL, 4, 1, NULL, '6', 1),
(117, 'dayana flores', 'SN', 4, NULL, 61328898, NULL, 2, 1, NULL, '6', 1),
(118, 'C?spedes Mdc', 'SN', 4, NULL, 60918963, NULL, 3, 1, NULL, '6', 1),
(119, 'Wilfredo Vasco', 'SN', 4, NULL, 71263638, NULL, 4, 1, NULL, '6', 1),
(120, 'Tevys Colque', 'SN', 4, NULL, 62726311, NULL, 2, 1, NULL, '6', 1),
(121, 'Jhonatan Campos', 'SN', 4, NULL, 73961769, NULL, 3, 1, NULL, '6', 1),
(122, 'Bus Geo Yor', 'SN', 4, NULL, 67294894, NULL, 4, 1, NULL, '6', 1),
(123, 'Rafael Choquehuanca Laura', 'SN', 4, NULL, 75227900, NULL, 2, 1, NULL, '6', 1),
(124, '?shly ?ruz ?h', 'SN', 4, NULL, 77651841, NULL, 3, 1, NULL, '6', 1),
(125, 'Yameline Quisbert Zambrana', 'SN', 4, NULL, 77837172, NULL, 4, 1, NULL, '6', 1),
(126, 'Isa?as Paz', 'SN', 4, NULL, 78419914, NULL, 2, 1, NULL, '6', 1),
(127, 'Luis Fernando Villalba', 'SN', 4, NULL, 78092449, NULL, 2, 1, NULL, '6', 1),
(128, 'Jhuly Estrada Vaca', 'SN', 4, NULL, 69084157, NULL, 2, 1, NULL, '6', 1),
(129, 'Aherrera96', 'SN', 4, NULL, 64473436, NULL, 2, 1, NULL, '6', 1),
(130, 'Oscar Almaraz Lopez', 'SN', 4, NULL, 78310135, NULL, 2, 1, NULL, '6', 1),
(131, 'Liliana Fernandez Ortigoza', 'SN', 4, NULL, 79909702, NULL, 2, 1, NULL, '6', 1),
(132, 'Carlos Boni Flores Gonzales', 'SN', 4, NULL, 70255386, NULL, 2, 1, NULL, '6', 1),
(133, '?risthian Rodr?guez', 'SN', 4, NULL, 75327905, NULL, 2, 1, NULL, '6', 1),
(134, 'Luis Alberto Salazar P', 'SN', 4, NULL, 76349336, NULL, 2, 1, NULL, '6', 1),
(135, 'Ximena Arauz', 'SN', 4, NULL, 77603191, NULL, 2, 1, NULL, '6', 1),
(136, 'Evelin Huayra?a Villegas', 'SN', 4, NULL, 73984179, NULL, 2, 1, NULL, '6', 1),
(137, 'Jorge Duardo Sanchez Saucedo', 'SN', 4, NULL, 73984377, NULL, 2, 1, NULL, '6', 1),
(138, 'Rousse Nunes', 'SN', 4, NULL, 76688505, NULL, 2, 1, NULL, '6', 1),
(139, 'Fabi Yarari', 'SN', 4, NULL, 74842531, NULL, 2, 1, NULL, '6', 1),
(140, 'Cesar Castro', 'SN', 4, NULL, 79888616, NULL, 2, 1, NULL, '6', 1),
(141, 'Juan Cabezas', 'SN', 4, NULL, 70275036, NULL, 2, 1, NULL, '6', 1),
(142, 'J ????? Melgar', 'SN', 4, NULL, 76056290, NULL, 2, 1, NULL, '6', 1),
(143, 'Laura RG', 'SN', 4, NULL, 78455875, NULL, 2, 1, NULL, '6', 1),
(144, 'Elmar Torres Mita', 'SN', 4, NULL, 68868156, NULL, 2, 1, NULL, '6', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
