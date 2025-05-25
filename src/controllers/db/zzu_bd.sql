-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2025 a las 21:26:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zzu_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `comment`, `created_at`) VALUES
(3, 18, 10, 'muy buen producto,gracias!!!', '2025-05-22 18:51:38'),
(4, 19, 10, 'Buena calidad como se ve en la foto, Seiko nunca me ha decepcionado!!!', '2025-05-22 18:52:46'),
(10, 25, 5, 'excelente', '2025-05-22 19:42:05'),
(36, 17, 5, 'Muy buen reloj para lo que vale,la mejor compra que hice.', '2025-05-22 21:27:16'),
(37, 11, 10, 'Este reloj es simplemente increíble, la calidad y el diseño son excepcionales.', '2025-05-23 20:04:34'),
(38, 12, 10, 'Este reloj es simplemente increíble, la calidad y el diseño son excepcionales.', '2025-05-23 20:04:52'),
(39, 13, 10, 'Este reloj es simplemente increíble, la calidad y el diseño son excepcionales.', '2025-05-23 20:05:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image1`, `image2`, `image3`, `stock`) VALUES
(11, 'SRPL39', 'Movimiento:• Número de calibre: 4R36• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones:• Función de parada del segundero• Visualización de día / fechaLa caja / La pulsera:• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 13.4 mm - Diámetro: 42.5 mm - Longitud: 46.0 mm• Cristal: Hardlex curvado• LumiBrite: En agujas, índices y bisel• Cierre: Cierre de tres pliegues con bloqueo seguro• Anchura entre asas: 22 mmOtros detalles:• Resistencia al agua: 10 bares• Resistencia magnética: 4,800 A/m• Peso: 168.0 gCaracterísticas:• Fondo de caja transparente• Fondo de caja de rosca', 480.00, '1747745899_SRPL39K1.webp', '1747745899_SRPL39K1_02.webp', '1747745899_SRPL39K1_03.webp', 30),
(12, 'SRPL83', 'Movimiento• Número de calibre: 4R36• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones• Función de parada del segundero• Visualización de día / fechaLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: – Grosor: 13.9 mm – Diámetro: 42.5 mm – Longitud: 46.0 mm• Cristal: Hardlex curvado• LumiBrite: En agujas e índices• Cierre: – Cierre de tres pliegues con botón de apertura – Cierre de tres pliegues con bloqueo seguro• Diámetro de pulsera: 205.0 mm• Anchura entre asas: 22 mmOtros detalles• Resistencia al agua: 10 bares• Resistencia magnética: 4,800 A/m• Peso: 187.0 gCaracterísticas• Bisel giratorio unidireccional• Fondo de caja transparente• Fondo de caja de rosca', 490.00, '1747746103_SRPL83K1.webp', '1747746103_SRPL83K1_02_1x1.webp', '1747746103_SRPL83K1_01_1x1.webp', 4),
(13, 'SPB457', 'Movimiento• Número de calibre: 6R51• Tipo de movimiento: Automático con capacidad de carga manual• Precisión: de +25 a -15 segundos por día• Duración: Aprox. 72 horas (3 días)• Número de rubís: 24Funciones• Función de parada del segunderoLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 11.6 mm - Diámetro: 36.1 mm - Longitud: 43.0 mm• Cristal: Zafiro en forma de caja• Revestimiento del cristal: Revestimiento antirreflectante en la superficie interna• LumiBrite: En agujas e índices• Cierre: Cierre deployant con botón de apertura• Diámetro de pulsera: 200.0 mm• Anchura entre asas: 19 mmOtros detalles• Resistencia al agua: 10 bares• Peso: 129.0 gCaracterísticas• Fondo de caja de rosca', 2200.00, '1747746402_SPB457J1.webp', '1747746402_SPB457J1_01.webp', '1747746402_SPB457J1_02.webp', 9),
(14, 'SRPK46', 'Movimiento• Número de calibre: 4R35• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 23Funciones• Función de parada del segundero• Visualización de la fechaLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 11.8 mm - Diámetro: 40.5 mm - Longitud: 47.5 mm• Cristal: Hardlex en forma de caja• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 5 bares• Resistencia magnética: 4,800 A/mCaracterísticas• Fondo de caja transparente• Fondo de caja de rosca', 580.00, '1747746550_SRPK46J1.webp', '', '', 19),
(15, 'SRPK01', 'Movimiento• Número de calibre: 4R36• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones• Función de parada del segundero• Visualización de día / fechaLa caja / La pulsera• Material de la caja: Acero inoxidable• Bisel: Acero inoxidable con placa de cerámica• Tamaño de la caja: - Grosor: 13.2 mm - Diámetro: 45.0 mm - Longitud: 47.7 mm• Cristal: Zafiro con lupa• Revestimiento del cristal: Antirreflectante en la superficie interna• LumiBrite: En agujas, índices y bisel• Cierre: Cierre de tres pliegues con bloqueo seguro, liberación de botón con extensor• Anchura entre asas: 22 mmOtros detalles• Resistencia al agua: 200 m / 660 ft (diver\'s)• Peso: 198.0 gCaracterísticas• \"SPECIAL EDITION\" grabado en el fondo de caja• Bisel giratorio unidireccional• Corona de rosca• Cierre de tres pliegues con bloqueo seguro• Fondo de caja de rosca', 695.00, '1747746687_SRPK01K1.webp', '1747746687_SRPK01K1_bac.webp', '', 39),
(16, 'SSK003', 'Movimiento• Número de calibre: 4R34• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones• Aguja de 24 horas (función de indicación de doble horario)• Función de parada del segunderoLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 13.6 mm - Diámetro: 42.5 mm - Longitud: 46.0 mm• Cristal: Hardlex con lupa• LumiBrite: En agujas e índices• Cierre: Cierre de tres pliegues con botón de apertura• Anchura entre asas: 22 mmOtros detalles• Resistencia al agua: 10 bares• Resistencia magnética: 4,800 A/m• Peso: 161.0 gCaracterísticas• Bisel giratorio (indicación de 24 horas)• Cierre de tres pliegues con bloqueo seguro• Fondo de caja transparente• Fondo de caja de rosca', 520.00, '1747746873_SSK003K1.webp', '1747746873_SSK003K1_1.webp', '1747746873_SSK003K1_2.webp', 22),
(17, 'SPB299', 'Movimiento• Número de calibre: 6R35• Tipo de movimiento: Automático con capacidad de carga manual• Precisión: de +25 a -15 segundos por día• Duración: Aprox. 70 horas• Número de rubís: 24Funciones• Función de parada del segundero• Visualización de la fechaLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 12.5 mm - Diámetro: 42.0 mm - Longitud: 48.8 mm• Cristal: Cristal de zafiro• Revestimiento del cristal: Antirreflectante en la superficie interna• LumiBrite: En agujas, índices y bisel• Cierre: Cierre de tres pliegues con bloqueo seguro, liberación de botón con extensor• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 200 m / 660 ft (diver\'s)• Peso: 186.0 gCaracterísticas• \"SPECIAL EDITION\" grabado en el fondo de caja• Bisel giratorio unidireccional• Corona de rosca• Cierre de tres pliegues con bloqueo seguro• Fondo de caja de rosca', 1450.00, '1747746979_SPB299J1.webp', '', '', 24),
(18, 'SPB257', 'Movimiento• Número de calibre: 6R35• Tipo de movimiento: Automático con capacidad de carga manual• Precisión: de +25 a -15 segundos por día• Duración: Aprox. 70 horas• Número de rubís: 24Funciones• Función de parada del segundero• Visualización de la fechaLa caja / La pulsera• Material de la caja: Acero inoxidable (revestimiento endurecido)• Tamaño de la caja: - Grosor: 13.2 mm - Diámetro: 42.7 mm - Longitud: 41.6 mm• Cristal: Zafiro curvado• Revestimiento del cristal: Antirreflectante en la superficie interna• LumiBrite: En agujas, índices y bisel• Material de la correa: Poliéster• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 200 m / 660 ft (diver\'s)• Peso: 106.0 gCaracterísticas• \"LIMITED EDITION\" en el fondo de caja• Número de serie grabado en el fondo de caja• Bisel giratorio unidireccional• Corona de rosca• Fondo de caja de rosca', 1390.00, '1747747132_SPB257J1.webp', '1747747132_SPB257J1_bac.webp', '1747747132_SPB257J1_box.webp', 6),
(19, 'SSK035', 'Movimiento• Número de calibre: 4R34• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones• Aguja de 24 horas (función de indicación de doble horario)• Función de parada del segunderoLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 13.6 mm - Diámetro: 42.5 mm - Longitud: 46.0 mm• Cristal: Hardlex con lupa• LumiBrite: En agujas e índices• Cierre: Cierre de tres pliegues con botón de apertura• Diámetro de pulsera: 215.0 mm• Anchura entre asas: 22 mmOtros detalles• Resistencia al agua: 10 bares• Resistencia magnética: 4,800 A/m• Peso: 159.0 gCaracterísticas• Bisel giratorio (indicación de 24 horas)• Cierre de tres pliegues con bloqueo seguro• Fondo de caja transparente• Fondo de caja de rosca', 520.00, '1747747215_SSK035K1.webp', '', '', 110),
(20, 'SSA464', 'MovimientoNúmero de calibre4R39Tipo de movimientoAutomático con capacidad de carga manualDuraciónAprox. 41 horasNúmero de rubís24FuncionesAguja de 24 horasFunción de para del segunderoLa caja/La pulseraMaterial de la cajaAcero inoxidableTamaño de la cajaGrosor:12.5mmDiámetro:41.8mmLongitud:48.4mmCristalZafiro con doble curvaturaCierreCierre Deployant con botón de aperturaDiámetro de pulsera200.0Anchura entre asas20Otros detallesResistencia al aguaResistente a salpicadura de aguaResistencia magnética4,800 A/mCaracterísticasFondo de caja transparente / Fondo de caja de rosca', 675.00, '1747747337_SSA464J1.webp', '', '', 5),
(21, 'SSA463', 'Movimiento• Número de calibre: 4R39• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones• Aguja de 24 horas• Función de parada del segunderoLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 12.5 mm - Diámetro: 41.8 mm - Longitud: 48.4 mm• Cristal: Zafiro con doble curvatura• Cierre: Cierre Deployant con botón de apertura• Diámetro de pulsera: 200.0 mm• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: Resistente a salpicadura de agua• Resistencia magnética: 4,800 A/mCaracterísticas• Fondo de caja transparente• Fondo de caja de rosca', 595.00, '1747747419_SSA463J1.webp', '', '', 4),
(22, 'SRPH87', 'Movimiento• Número de calibre: 4R35• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 23Funciones• Función de parada del segundero• Visualización de la fechaLa caja / La pulsera• Tamaño de la caja: - Grosor: 11.8 mm - Diámetro: 41.2 mm - Longitud: 48.5 mm• Cristal: Hardlex• Cierre: Cierre de tres pliegues con botón de apertura• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 10 bares• Peso: 130.0 gCaracterísticas• Fondo de caja transparente• Fondo de caja de rosca', 330.00, '1747747498_SRPH87K1.webp', '', '', 7),
(23, 'SRPH85', 'Movimiento• Número de calibre: 4R35• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 23Funciones• Función de parada del segundero• Visualización de la fechaLa caja / La pulsera• Tamaño de la caja: - Grosor: 11.8 mm - Diámetro: 41.2 mm - Longitud: 48.5 mm• Cristal: Hardlex• Cierre: Cierre de tres pliegues con botón de apertura• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 10 bares• Peso: 130.0 gCaracterísticas• Fondo de caja transparente• Fondo de caja de rosca', 330.00, '1747747577_SRPH85K1.webp', '', '', 9),
(24, 'SRPE99', 'Movimiento• Número de calibre: 4R36• Tipo de movimiento: Automático con capacidad de carga manual• Duración: Aprox. 41 horas• Número de rubís: 24Funciones• Función de parada del segundero• Visualización de día / fechaLa caja / La pulsera• Tamaño de la caja: - Grosor: 13.4 mm - Diámetro: 45.0 mm• Cristal: Hardlex• LumiBrite: Lumibrite en agujas, índices y bisel• Cierre: Cierre de tres pliegues con bloqueo seguro, liberación de botón con extensor• Anchura entre asas: 22 mmOtros detalles• Resistencia al agua: 200 m / 660 ft (diver’s)• Peso: 195.0 gCaracterísticas• Bisel giratorio unidireccional• Corona de rosca• Fondo de caja de rosca', 495.00, '1747747665_SRPE99K1.webp', '', '', 36),
(25, 'SPB478', 'Movimiento• Número de calibre: 6R55• Tipo de movimiento: Automático con capacidad de carga manual• Precisión: de +25 a -15 segundos al día• Duración: Aprox. 72 horas (3 días)• Número de rubís: 24Funciones• Función de parada del segunderoLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: - Grosor: 13.0 mm - Diámetro: 40.2 mm - Longitud: 46.0 mm• Cristal: Zafiro con doble curvatura• Revestimiento del cristal: Antirreflectante en la superficie interna• Cierre: Cierre Deployant con botón de apertura• Diámetro de pulsera: 200.0 mm• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 10 bares• Resistencia magnética: 4,800 A/m• Peso: 139.0 gCaracterísticas• Fondo de caja transparente• Fondo de caja de rosca', 1200.00, '1747747843_SPB233J1.webp', '1747747843_SPB233J1_1.webp', '1747747843_SPB233J1_2.webp', 9),
(26, 'SPB478', 'Movimiento• Número de calibre: 6R55• Tipo de movimiento: Automático con capacidad de carga manual• Precisión: de +25 a -15 segundos al día• Duración: Aprox. 72 horas (3 días)• Número de rubís: 24Funciones• Función de parada del segunderoLa caja / La pulsera• Material de la caja: Acero inoxidable• Tamaño de la caja: • Grosor: 13.0 mm • Diámetro: 40.2 mm • Longitud: 46.0 mm• Cristal: Zafiro con doble curvatura• Revestimiento del cristal: Antirreflectante en la superficie interna• Cierre: Cierre Deployant con botón de apertura• Diámetro de pulsera: 200.0 mm• Anchura entre asas: 20 mmOtros detalles• Resistencia al agua: 10 bares• Resistencia magnética: 4,800 A/m• Peso: 139.0 gCaracterísticas• Fondo de caja transparente• Fondo de caja de rosca', 1200.00, '1747747991_SPB478J1.webp', '1747747991_SPB478J1_ima_3_2024.webp', '1747747991_SPB478J1_ima_1_2024.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(5, 'antonio8833', 'antonio10kan@gmail.com', '$2y$10$oTQiqdEvElLb4yBTPtoLnO11EOm5YgREDjWKE7R/Mqw4cRk4qssze', '2025-05-15 19:34:34', 'admin'),
(10, 'miguel11', 'miguel@gmail.com', '$2y$10$O1R7yzeIsqHQYFe5D.cWKezJylBUbLm4UVuxRJ1IHubWQ.VoKOKky', '2025-05-22 16:51:54', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
