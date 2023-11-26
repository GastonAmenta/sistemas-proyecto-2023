-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 21:45:58
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anastasia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_nombre` varchar(30) NOT NULL,
  `usuario_apellido` varchar(50) NOT NULL,
  `usuario_email` varchar(100) NOT NULL,
  `usuario_direccion` varchar(50) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `fecha_despacho` datetime NOT NULL,
  `fecha_llegada` datetime NOT NULL,
  `fecha_retiro` datetime DEFAULT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_nombre`, `usuario_apellido`, `usuario_email`, `usuario_direccion`, `producto`, `fecha_despacho`, `fecha_llegada`, `fecha_retiro`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'gaston', 'amenta', 'gaston@gmail.com', 'jujuy 255', 'no se', '2023-11-26 20:19:10', '2023-11-29 16:19:10', '2023-11-26 17:41:48', '2023-11-26 16:19:44', NULL),
(2, 'gaston', 'amenta', 'gaston@gmail.com', 'jujuy 255', 'jajaja', '2023-11-26 20:19:59', '2023-11-28 16:20:00', '2023-11-26 17:41:19', '2023-11-26 16:21:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `precio` int(10) NOT NULL,
  `talle` varchar(5) NOT NULL,
  `imagen_1` varchar(60) DEFAULT NULL,
  `stock` int(10) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`, `talle`, `imagen_1`, `stock`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'test', 'test', 200, 'xl', NULL, 20, '2023-11-26 14:40:58', NULL),
(2, 'test23', 'fjasdio', 123, 'hola', NULL, 124, '2023-11-26 15:00:11', NULL),
(3, 'test23', 'fjasdio', 123, 'hola', NULL, 124, '2023-11-26 15:02:17', NULL),
(4, 'otro', 'otro', 20, 'xl', NULL, 200, '2023-11-26 15:09:27', NULL),
(5, 'otro', 'otro', 20, 'xl', NULL, 200, '2023-11-26 15:12:08', NULL),
(6, 'adfasdf', 'sdfsdf', 123, 'sdf', NULL, 123, '2023-11-26 15:13:15', NULL),
(7, 'adfasdf', 'sdfsdf', 123, 'sdf', NULL, 123, '2023-11-26 15:15:20', NULL),
(8, 'hdfgjo', 'sdfvjo', 123, '123', NULL, 123, '2023-11-26 15:20:25', NULL),
(9, 'hdfgjo', 'sdfvjo', 123, '123', NULL, 123, '2023-11-26 15:24:26', NULL),
(10, 'hdfgjo', 'sdfvjo', 123, '123', NULL, 123, '2023-11-26 15:25:02', NULL),
(11, 'hdfgjo', 'sdfvjo', 123, '123', NULL, 123, '2023-11-26 15:26:59', NULL),
(12, 'hdfgjo', 'sdfvjo', 123, '123', NULL, 123, '2023-11-26 15:28:37', NULL),
(13, 'hdfgjo', 'sdfvjo', 123, '123', '../../images/productos/13/2016_04_24_skin_201604241119404361', 123, '2023-11-26 15:32:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `rol_id` varchar(10) NOT NULL DEFAULT 'usuario',
  `email` varchar(100) NOT NULL,
  `clave` varchar(128) NOT NULL,
  `fecha_nac` datetime(5) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha_alta` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `fecha_baja` datetime(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `nombre_usuario`, `rol_id`, `email`, `clave`, `fecha_nac`, `direccion`, `fecha_alta`, `fecha_baja`) VALUES
(1, 'gaston', 'amenta', 'homero', '2', 'gaston@gmail.com', '0f3fde0103dd44077c040215a2fabd09a097aecc', '2005-04-20 00:00:00.00000', 'jujuy 255', '2023-11-25 20:58:21.00000', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
