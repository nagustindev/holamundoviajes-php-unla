-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 28-10-2025 a las 21:36:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `holamundo_viajes`
--
CREATE DATABASE IF NOT EXISTS `holamundo_viajes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `holamundo_viajes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id` int(11) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `transporte` varchar(50) NOT NULL,
  `dias` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `descuento` int(11) DEFAULT 0,
  `es_oferta` tinyint(1) DEFAULT 0,
  `noches` int(11) DEFAULT 1,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id`, `destino`, `hotel`, `transporte`, `dias`, `stock`, `imagen`, `categoria`, `precio`, `descuento`, `es_oferta`, `noches`, `descripcion`) VALUES
(8, 'Rio de Janeiro', 'Rede Andrade Lapa Hotel', 'Vuelo', 8, 0, 'uploads/1760054039_ebed9a812928007cbc27.jpg', 'Familiar', 435000, 0, 0, 7, 'Vive la magia de Río de Janeiro. 8 días para explorar sus playas y el Pan de Azúcar. Paquete familiar con vuelo y estadía en el hotel Rede Andrade Lapa. ¡Imperdible!'),
(9, 'Nueva York', 'The Manhattan at Times Square Hotel', 'Vuelo', 3, 86, 'uploads/1760054043_1bc9fc6b30bd3b459595.jpg', 'Familiar', 4000000, 0, 0, 2, 'Descubre la Gran Manzana en 3 días. Este paquete familiar incluye tu vuelo y 2 noche de alojamiento en el icónico The Manhattan at Times Square Hotel.'),
(13, 'San Carlos de Bariloche', 'Hotel Llao Llao', 'Vuelo', 3, 25, 'uploads/1760054048_6a0b7be6bf2eb9c79436.jpg', 'Aventura', 987000, 0, 0, 2, 'Escapate 3 días a Bariloche. Un viaje de aventura con 2 noches en el exclusivo Hotel Llao Llao, con vuelo incluido. Ideal para explorar la Patagonia.'),
(14, 'Punta Cana', 'Sol Caribe Beach Group', 'Vuelo', 5, 4, 'uploads/1760054125_e326ff3b819a1f33b968.jpg', 'Relax', 1133155, 0, 0, 4, '¡Relax total en Punta Cana! 5 días y 4 noches en el paraíso. Este paquete incluye vuelo y estadía en Sol Caribe Beach Group. Desconecta en playas de arena blanca.'),
(18, 'Cataratas del Iguazú', 'Complejo Americano', 'Vuelo', 5, 10, 'uploads/1761542961_2b8e52548457551df82c.jpg', 'Aventura', 379322, 25, 1, 4, '¡Oferta 25% OFF! Vive la aventura en Cataratas del Iguazú. 5 días y 4 noches con vuelo y estadía en Complejo Americano. ¡No te lo pierdas! Stock limitado.'),
(20, 'Córdoba ', 'Raices Aconcagua', 'Vuelo', 3, 5, 'uploads/1761629515_db6659bb80a2a18d152d.jpg', 'Aventura', 627876, 10, 1, 2, '¡Aventura en Córdoba con 10% OFF! 3 días, 2 noches. Incluye vuelo, estadía en Raíces Aconcagua y visita a 3 bodegas. ¡Últimos 5 lugares!'),
(21, 'Cancún', 'Grand Oasis Cancún All Inclusive', 'Vuelo', 8, 15, 'uploads/1761630183_1a6b568c249882a606ca.jpg', 'Playa', 2356765, 15, 1, 7, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `tipo_usuario` enum('cliente','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contraseña`, `tipo_usuario`) VALUES
(5, 'admin@gmail.com', '$2y$10$.eOOvCF1PWT.flIvGLDLHepn2Ocjz2e/OjpT8sobbGVzPuqEeOXPq', 'admin'),
(6, 'pepito@gmail.com', '$2y$10$LEsag708pSvXIDjLkepXzOG94vG9SPpgVCHz0sTfFxnRiBYeAKmeG', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paquete` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL CHECK (`cantidad` > 0),
  `fecha_venta` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `id_paquete`, `cantidad`, `fecha_venta`) VALUES
(1, 6, 8, 1, '2025-10-21 21:56:14'),
(2, 6, 8, 1, '2025-10-21 21:57:15'),
(3, 6, 8, 1, '2025-10-21 21:57:18'),
(4, 5, 13, 1, '2025-10-21 22:02:29'),
(5, 6, 9, 1, '2025-10-21 22:12:57'),
(6, 6, 9, 1, '2025-10-22 17:07:58'),
(7, 6, 9, 1, '2025-10-22 17:30:19'),
(8, 6, 9, 1, '2025-10-22 17:30:34'),
(9, 6, 13, 1, '2025-10-22 19:34:25'),
(10, 6, 13, 1, '2025-10-22 19:34:29'),
(11, 6, 13, 1, '2025-10-22 19:34:31'),
(12, 6, 13, 1, '2025-10-22 19:34:33'),
(13, 5, 8, 1, '2025-10-22 19:36:09'),
(14, 5, 9, 1, '2025-10-22 19:36:17'),
(15, 5, 9, 1, '2025-10-28 04:19:24'),
(16, 5, 9, 1, '2025-10-28 04:43:06'),
(17, 5, 9, 1, '2025-10-28 04:44:43'),
(18, 6, 14, 1, '2025-10-28 04:58:17'),
(19, 5, 9, 1, '2025-10-28 05:00:57'),
(20, 5, 9, 5, '2025-10-28 05:05:39'),
(21, 5, 8, 1, '2025-10-28 20:10:06'),
(22, 5, 8, 4, '2025-10-28 20:10:32'),
(23, 5, 14, 1, '2025-10-28 20:21:25'),
(24, 5, 8, 1, '2025-10-28 20:21:28'),
(25, 5, 8, 4, '2025-10-28 20:21:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_paquete` (`id_paquete`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
