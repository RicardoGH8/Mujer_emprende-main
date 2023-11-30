-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 17:02:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mujer_emprende`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Codigo_comentario` int(10) UNSIGNED NOT NULL,
  `Contenido` varchar(350) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `Productos_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Codigo_comentario`, `Contenido`, `Fecha`, `Usuario_id`, `Productos_id`) VALUES
(1, 'Prueba', '2023-11-28 02:32:50', 1, 1),
(2, 'muy buen producto pero estaría bien que le agregaran alguna manera de calificar con estrellas o puntuación.', '2023-11-28 02:58:44', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_historias`
--

CREATE TABLE `comentarios_historias` (
  `Codigo_comentario_historias` int(10) UNSIGNED NOT NULL,
  `Comentario` varchar(350) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Usuario_id` int(10) UNSIGNED DEFAULT NULL,
  `Historias_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios_historias`
--

INSERT INTO `comentarios_historias` (`Codigo_comentario_historias`, `Comentario`, `Fecha`, `Usuario_id`, `Historias_id`) VALUES
(1, 'Muy buena historia', '2023-11-28 15:45:10', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `Codigo` int(10) UNSIGNED NOT NULL,
  `Rol` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Contraseña` varchar(120) NOT NULL,
  `Usuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`Codigo`, `Rol`, `Nombre`, `Correo`, `Contraseña`, `Usuario`) VALUES
(1, 2, 'prueba', ' prueba@gmail.com', '$2y$10$iNf9prMzjqFRdNFrK0AzmOXV/d2D63sp8pnnWqTVNMIPaj/QyUfXO', 'Prueba0'),
(2, 3, 'proveedora', ' proveedora@gmail.com', '$2y$10$4nZ5q5OtQHZDcCWafFM7/.2MZWGHNK4ACLbnL8fhSLMJpkOBjzd6i', 'Proveedora0'),
(4, 2, 'hola', ' mundo@gmail.com', '$2y$10$2vsbCoXcotaWobGnAcRe1.dLtqz.MurIvXiy9pSpY7fyOBzSgdHva', 'Mundo'),
(5, 1, 'Carlos Manuel', ' Admin@gmail.com', '$2y$10$l7i6T5IXLMLqplzCYnLT7ew0ORdC76WBll251yhlElbV19J0CT82W', 'Admin0'),
(6, 3, 'Maria', 'Maria@gmail.com', '$2y$10$19MvaunNGd7cfSo0TH/9NOTIe2SdL4ISxF9CVqYKty5mqS7d08N4G', 'Maria123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `Codigo_historia` int(10) UNSIGNED NOT NULL,
  `Titulo_historia` varchar(30) NOT NULL,
  `Breve_descripcion_historia` varchar(30) NOT NULL,
  `Contenido_historia` varchar(350) NOT NULL,
  `Imagen` longblob DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `Usuario_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`Codigo_historia`, `Titulo_historia`, `Breve_descripcion_historia`, `Contenido_historia`, `Imagen`, `Fecha`, `Usuario_id`) VALUES
(1, 'La historia de Doña juanita', 'Doña juanita originaria de...', 'Rebozo artesanal a mano color amarillo.', 02, '2023-11-28 15:17:35', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Codigo_producto` int(10) UNSIGNED NOT NULL,
  `Titulo_producto` varchar(50) NOT NULL,
  `Contenido_producto` varchar(350) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio_producto` double DEFAULT NULL,
  `Foto_producto` longblob DEFAULT NULL,
  `Usuario_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Codigo_producto`, `Titulo_producto`, `Contenido_producto`, `Cantidad`, `Precio_producto`, `Foto_producto`, `Usuario_id`) VALUES
(1, 'Articulos de barro', 'Trastes de barro diferentes medidas ', 300, 1000, 09, 1);
INSERT INTO `productos` (`Codigo_producto`, `Titulo_producto`, `Contenido_producto`, `Cantidad`, `Precio_producto`, `Foto_producto`, `Usuario_id`) VALUES
(2, 'Guayabera', 'Guayabera blanca Mediana para caballero.', 20, 320, 09, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`Codigo_comentario`),
  ADD KEY `Productos_id` (`Productos_id`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- Indices de la tabla `comentarios_historias`
--
ALTER TABLE `comentarios_historias`
  ADD PRIMARY KEY (`Codigo_comentario_historias`),
  ADD KEY `Historias_id` (`Historias_id`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`Codigo_historia`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Codigo_producto`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `Codigo_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comentarios_historias`
--
ALTER TABLE `comentarios_historias`
  MODIFY `Codigo_comentario_historias` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `Codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `Codigo_historia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Codigo_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`Codigo_producto`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `cuenta` (`Codigo`);

--
-- Filtros para la tabla `comentarios_historias`
--
ALTER TABLE `comentarios_historias`
  ADD CONSTRAINT `comentarios_historias_ibfk_1` FOREIGN KEY (`Historias_id`) REFERENCES `historias` (`Codigo_historia`),
  ADD CONSTRAINT `comentarios_historias_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `cuenta` (`Codigo`);

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `historias_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `cuenta` (`Codigo`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `cuenta` (`Codigo`);

