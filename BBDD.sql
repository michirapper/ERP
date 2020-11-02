-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2020 a las 17:35:24
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdfase2g8`
--
CREATE DATABASE IF NOT EXISTS `bdfase2g8` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdfase2g8`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confempresa`
--

CREATE TABLE `confempresa` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `NIF` varchar(50) NOT NULL,
  `Logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `confempresa`
--

INSERT INTO `confempresa` (`id`, `Nombre`, `Direccion`, `Ciudad`, `Pais`, `Telefono`, `NIF`, `Logo`) VALUES
(1, 'La Bella Ragazza', 'C/ Inventada', 'Madrid', 'España', '652365987', '52156698F', 'https://img.freepik.com/vector-gratis/insignia-cafeteria-estilo-vintage_1176-95.jpg?size=626&ext=jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `divisa` varchar(45) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `apariencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `divisa`, `idioma`, `apariencia`) VALUES
(2, 'Dolar', 'ES', 1),
(3, 'Dolar', 'EN', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`) VALUES
(1, 'Proyecto Accenture'),
(2, 'Proyecto Matusalen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos`
--

CREATE TABLE `rangos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rangos`
--

INSERT INTO `rangos` (`id`, `nombre`) VALUES
(1, 'Jefe'),
(2, 'Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `ganancias` varchar(45) DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  `usuarios_configuracion_id` int(11) NOT NULL,
  `usuarios_permisos_id` int(11) NOT NULL,
  `rangos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id`, `nombre`, `ganancias`, `usuarios_id`, `usuarios_configuracion_id`, `usuarios_permisos_id`, `rangos_id`) VALUES
(1, 'El jefe rechulon', '5000', 3, 2, 1, 1),
(2, 'Esclavo', '800', 4, 3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores_has_proyectos`
--

CREATE TABLE `trabajadores_has_proyectos` (
  `trabajadores_id` int(11) NOT NULL,
  `trabajadores_usuarios_id` int(11) NOT NULL,
  `trabajadores_usuarios_configuracion_id` int(11) NOT NULL,
  `trabajadores_usuarios_permisos_id` int(11) NOT NULL,
  `proyectos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuarios` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `configuracion_id` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuarios`, `contrasena`, `configuracion_id`, `permisos_id`) VALUES
(3, 'Todopoderoso', 'Passw0rd', 2, 1),
(4, 'esclavo1234', 'Passw0rd', 3, 2),
(5, 'admin', 'admin', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `confempresa`
--
ALTER TABLE `confempresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rangos`
--
ALTER TABLE `rangos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id`,`usuarios_id`,`usuarios_configuracion_id`,`usuarios_permisos_id`,`rangos_id`),
  ADD KEY `fk_trabajadores_usuarios1_idx` (`usuarios_id`,`usuarios_configuracion_id`,`usuarios_permisos_id`),
  ADD KEY `fk_trabajadores_rangos1_idx` (`rangos_id`);

--
-- Indices de la tabla `trabajadores_has_proyectos`
--
ALTER TABLE `trabajadores_has_proyectos`
  ADD PRIMARY KEY (`trabajadores_id`,`trabajadores_usuarios_id`,`trabajadores_usuarios_configuracion_id`,`trabajadores_usuarios_permisos_id`,`proyectos_id`),
  ADD KEY `fk_trabajadores_has_proyectos_proyectos1_idx` (`proyectos_id`),
  ADD KEY `fk_trabajadores_has_proyectos_trabajadores1_idx` (`trabajadores_id`,`trabajadores_usuarios_id`,`trabajadores_usuarios_configuracion_id`,`trabajadores_usuarios_permisos_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`configuracion_id`,`permisos_id`),
  ADD KEY `fk_usuarios_configuracion_idx` (`configuracion_id`),
  ADD KEY `fk_usuarios_permisos1_idx` (`permisos_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `confempresa`
--
ALTER TABLE `confempresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rangos`
--
ALTER TABLE `rangos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `fk_trabajadores_rangos1` FOREIGN KEY (`rangos_id`) REFERENCES `rangos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabajadores_usuarios1` FOREIGN KEY (`usuarios_id`,`usuarios_configuracion_id`,`usuarios_permisos_id`) REFERENCES `usuarios` (`id`, `configuracion_id`, `permisos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajadores_has_proyectos`
--
ALTER TABLE `trabajadores_has_proyectos`
  ADD CONSTRAINT `fk_trabajadores_has_proyectos_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabajadores_has_proyectos_trabajadores1` FOREIGN KEY (`trabajadores_id`,`trabajadores_usuarios_id`,`trabajadores_usuarios_configuracion_id`,`trabajadores_usuarios_permisos_id`) REFERENCES `trabajadores` (`id`, `usuarios_id`, `usuarios_configuracion_id`, `usuarios_permisos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_configuracion` FOREIGN KEY (`configuracion_id`) REFERENCES `configuracion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_permisos1` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
