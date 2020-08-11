-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2020 a las 07:25:11
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evertec_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `customer_email` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `customer_mobile` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'CREATED, PAYED, REJECTED',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `requestId` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `processUrl` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_mobile`, `status`, `created_at`, `updated_at`, `requestId`, `processUrl`) VALUES
(15, 'mailer martinez', 'mailermartinez@gmail.com', '3192432568', 'CREATED', '2020-08-11 00:20:13', NULL, '27700', 'https://dev.placetopay.com/redirection/session/27700/10f6b2725715be4e1c0f1dcf3742eabd'),
(16, 'Juan Perez', 'juanperez@gmail.com', '3218977845', 'REJECTED', '2020-08-11 00:20:52', NULL, '27701', 'https://dev.placetopay.com/redirection/session/27701/bd4c811fa1c08fc7ed93af9a711f522d'),
(17, 'Liliana Serrano', 'liliana@gmail.com', '3254787456', 'PAYED', '2020-08-11 00:21:44', NULL, '27702', 'https://dev.placetopay.com/redirection/session/27702/6854a927a929fd6e5257dfdb8c218fec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id_detail` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `reference` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id_detail`, `id_order`, `id_product`, `reference`) VALUES
(9, 15, 1, ''),
(10, 16, 1, ''),
(11, 17, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(10) NOT NULL,
  `name_product` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `description` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `image` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `price`, `description`, `image`) VALUES
(1, 'Producto Ejemplo', '8500.00', 'Descripción de mi producto de prueba.', 'demo.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
