-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-10-2022 a las 16:00:57
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(40) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `name`) VALUES
(1, 'ACCION'),
(2, 'COMEDIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `name` int(100) NOT NULL,
  `surname` int(100) NOT NULL,
  `email` int(50) NOT NULL,
  `phone` int(30) NOT NULL,
  `comment` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(15) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `cod` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `title`, `content`, `keywords`, `description`, `category`, `cod`) VALUES
(71, 'Sobre Nosotros', '<p>Trabajamos en el crecimiento econÃ³mico de sus clientes: mÃ¡s de 500 marcas han confiado en nosotros en estos 28 aÃ±os de trabajo, en todo el paÃ­s como asÃ­ tambiÃ©n en Italia, MÃ©xico, Brasil, y Uruguay.</p>', 'sobrenosotros', 'sobrenosotros', 'sobrenosotros', 559274),
(72, 'Servicios', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At modi fugiat libero unde adipisci aspernatur?</p>', 'servicios', 'servicios', 'servicios', 54164),
(75, 'DÃ³nde Encontrarnos', '<p>Estudio Rocha - Advertising and Consulting se encuentra ubicado sobre calle Mariano Moreno al 357 en la ciudad de San Francisco, provincia de CÃ³rdoba, Argentina.</p>', 'dondeencontrarnos', 'dondeencontrarnos', 'dondeencontrarnos', 66183),
(78, 'Contacto', '<p>Â¡Dejanos tus datos para contactarte!</p>', 'contacto', 'contacto', 'contacto', 847882),
(82, 'Estudio Rocha y Asociados', '<h3><strong>Fuimos 4 veces ganadores del Premio Mercurio.</strong></h3><p><i><strong>El premio a la excelencia mÃ¡s importante del marketing argentino.</strong></i></p>', 'estudiorocha', 'estudiorocha', 'estudiorocha', 917736),
(83, 'Home', '<p><strong>Estudio Rocha y Asociados.</strong></p><p>Hacemos crecer empresas.</p>', 'carousel', 'carousel', 'carousel', 507868);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `database`
--

CREATE TABLE `database` (
  `host` varchar(40) NOT NULL,
  `port` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `database` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(40) NOT NULL,
  `url` varchar(200) NOT NULL,
  `content` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `url`, `content`) VALUES
(65, '/archivos/clima-laboral.jpg', 54164),
(66, '/archivos/coaching-ejecutivo-laboral.jpg', 54164),
(67, '/archivos/coaching-laboral.jpg', 54164),
(68, '/archivos/desarrollo-de-talento.jpg', 54164),
(69, '/archivos/e-commerce.jpg', 54164),
(70, '/archivos/headhunting.jpg', 54164),
(71, '/archivos/marketing-operativo.jpg', 54164),
(72, '/archivos/mercadolibre.jpg', 54164),
(73, '/archivos/publicidad-digital.jpg', 54164),
(74, '/archivos/recruiting.jpg', 54164),
(75, '/archivos/redes-sociales.jpg', 54164),
(76, '/archivos/seleccion-de-personal.jpg', 54164),
(79, '/archivos/fuimos-4-veces-ganadores-del-premio-mercurio_49c175bef7_es.jpg', 917736),
(83, '/archivos/imagensn.jpg', 507868),
(84, '/archivos/Imagen 5.png', 507868),
(85, '/archivos/Imagen 2.png', 507868),
(86, '/archivos/Imagen 5.png', 507868),
(87, '/archivos/Imagen 6.png', 507868),
(88, '/archivos/imagensn.jpg', 559274),
(89, '/archivos/empresa_01.jpg', 559274),
(90, '/archivos/empresa_02.jpg', 559274),
(91, '/archivos/empresa_03.jpg', 559274),
(92, '/archivos/publicidad-digital.jpg', 66183),
(93, '/archivos/e-commerce.jpg', 847882);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `state` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `title`, `description`, `image`, `price`, `category_id`, `date`, `state`) VALUES
(23, 'Pelicula2', 'pelicula2', 'test.jpg', '5667', 1, '2022-10-13', 1),
(24, 'Pelicula3', 'pelicula3', 'WhatsApp Image 2022-10-06 at 8.35.01 AM.jpeg', '1234', 1, '2022-10-14', 1),
(25, 'Pelicula 1', 'pelicula1', 'WhatsApp Image 2022-08-30 at 11.04.43 AM.jpeg', '4554', 1, '2022-10-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_cod` (`cod`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cascade_id` (`content`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
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
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`content`) REFERENCES `contents` (`cod`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
