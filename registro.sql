-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2026 a las 15:06:27
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
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre_cli` varchar(100) NOT NULL,
  `telefono_cli` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo_de_arreglo` varchar(50) NOT NULL,
  `color_de_flores` varchar(30) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `detalle_adicional` text DEFAULT NULL,
  `fecha_de_entrega` date NOT NULL,
  `nombre_destinatario` varchar(100) NOT NULL,
  `telefono_destinatario` varchar(20) NOT NULL,
  `direccion_envio` text NOT NULL,
  `metodo_envio` varchar(50) NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(20) DEFAULT 'En Proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `nombre_cli`, `telefono_cli`, `correo`, `tipo_de_arreglo`, `color_de_flores`, `mensaje`, `detalle_adicional`, `fecha_de_entrega`, `nombre_destinatario`, `telefono_destinatario`, `direccion_envio`, `metodo_envio`, `metodo_pago`, `fecha_registro`, `estado`) VALUES
(1, 37, 'Lucy', '8096732456', 'rojaslussy66@gmail.com', 'Ramo grande', 'Rosado', 'Feliz cumpleaños mi amor', 'de 10 rosas', '2026-05-24', 'Ismel de la Cruz', '8296700104', 'los cocos de jacagua', 'Recogida', 'Efectivo', '2026-05-11 16:10:41', 'Devuelto'),
(2, 37, 'Maria', '8095674563', 'rojaslussy66@gmail.com', 'Ramo grande', 'Mixto', 'Feliz cumpleaños mi amor', '10 rosas con mariposas', '2026-05-20', 'Lucy', '8297680987', 'los cocos de jacagua', 'Domicilio', 'Transferencia', '2026-05-11 16:15:30', 'Devuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contraseña` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Apellidos`, `Correo`, `Contraseña`) VALUES
(1, 'Carmen', 'Lopez', 'carmen@gmail.com', '12345'),
(2, 'Ismel', 'De la cruz', 'ismeldelacruz@gmail.com', '123456789'),
(3, 'Noemi', 'Lopez', 'noemialmonte@gmail.com', '0000'),
(4, 'Estelvin', 'vidal', 'vidal@gmail.com', '00000'),
(5, 'Yureylis', 'Sosa', 'yureylissosa@gmail.com', '123456789'),
(7, 'Lucy ', 'Rojas ', 'lucyrojas@gmail.com', '87654321'),
(8, 'patricia', 'peña', 'pena@gmail.com', '12345'),
(9, 'Rafael ', 'Peña', 'rafaelpena@gmail.com', 'rafael123'),
(11, 'Maria', 'Rojas', 'mariarojas@gmail.com', '4321'),
(12, 'Esmelissa', 'Rosario', 'esmelissarosario@gmail.com', '54321'),
(15, 'Ismel Daretza', 'De la cruz Gomez', 'daretzagomez@gmail.com', '0880'),
(16, 'Pepito', 'Ventura', 'pepitoventura@gmail.com', '56789'),
(17, 'Melissa', 'Polanco', 'melissapolanco@gmail.com', '0990'),
(21, 'Pedrito', 'Jaquez', 'pedritojaquez@gmail.com', 'pedrito099'),
(26, 'ramon', 'lopez', 'ramon@gmail.com', '98765'),
(27, 'Julito', 'Peralta', 'julitoperalta@gmail.com', 'julito123'),
(29, 'Julio', 'Ventura', 'venturajulio@gmail.com', '0000'),
(30, 'Perla', 'Sosa', 'PerlaSosa@gmail.com', '88888'),
(33, 'Holfrandy', 'Valerio', 'valerio@gmail.com', '123456'),
(36, 'Estelvin', 'Vidal', 'estelvinvidal@gmail.com', '130418'),
(37, 'Lucy ', 'Rojas', 'rojaslussy66@gmail.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `correo_unique` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
