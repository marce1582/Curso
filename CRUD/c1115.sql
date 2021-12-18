-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2021 a las 22:47:11
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c1115`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_dto` int(11) NOT NULL,
  `nombre_dto` varchar(50) NOT NULL,
  `presupuesto` double NOT NULL,
  `fecha_asig_presupuesto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `presupuesto_act` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_dto`, `nombre_dto`, `presupuesto`, `fecha_asig_presupuesto`, `presupuesto_act`) VALUES
(0, 'No Definido', 0, '2021-12-16 13:46:35', 0),
(5, 'Ventas', 906754, '2021-12-15 20:09:57', 0),
(12, 'Tecnica', 70000, '2021-11-15 17:48:49', 1),
(14, 'informatica', 80000, '2021-11-05 13:40:41', 1),
(15, 'Gestion', 87000, '2021-12-15 23:58:44', 0),
(37, 'DevOps', 87000, '2021-12-15 20:50:06', 0),
(50, 'Pharma', 100000, '2021-12-15 21:03:46', 0),
(56, 'Tesoreria', 90000, '2021-11-12 13:55:08', 1),
(65, 'Calidad', 65000, '2021-11-12 13:52:31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL COMMENT 'Llave Primaria',
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `num_dto` int(2) DEFAULT NULL COMMENT 'LLave Foranea',
  `alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `dni`, `nombre`, `apellido`, `num_dto`, `alta`, `activo`) VALUES
(1, '23342414', 'Jose', 'Sejo', 0, '2021-12-15 22:30:37', 0),
(8, '41369852', 'Paula', 'Madariaga', 12, '2021-12-16 15:57:03', 1),
(9, '33698521', 'Pedro', 'Perez', 14, '2021-11-05 14:02:34', 1),
(12, '36125896', 'Marti', 'Julia', 14, '2021-11-05 14:02:34', 1),
(14, '32145698', 'Guadalupe', 'Perez', 0, '2021-11-05 14:02:34', 0),
(15, '32369854', 'Bernardo', 'Pantera', 56, '2021-11-15 13:36:58', 0),
(16, '36125965', 'Lucia', 'Pesaro', 14, '2021-11-05 14:02:34', 1),
(39, '42113453', 'Jose', 'Perez', 56, '2021-11-19 20:53:10', 0),
(40, '25631917', 'Marcelo', 'Donadini', 15, '2021-12-15 22:20:26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol_name`) VALUES
(2, 'Administrator'),
(3, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL,
  `clave` varbinary(255) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `rol`, `clave`, `correo`, `alta`, `activo`) VALUES
(47, 'Operador', 3, 0x2432792431302470544b375847714a51583864495846334a3967626375516441374961414f4c633246674b6e4e6c5873693671426e6e57637970412e, 'operador7050@gmail.com', '2021-12-15 20:44:28', 0),
(50, 'admin', 2, 0x2432792431302441507045343466314564364e4b57466a6862704d522e7848775265757149306939344d6b3972624e644573323565514e653650594f, 'operador7050@gmail.com', '2021-12-16 21:33:11', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_dto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key` (`num_dto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave Primaria', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`num_dto`) REFERENCES `departamentos` (`id_dto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
