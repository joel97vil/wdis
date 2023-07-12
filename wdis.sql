-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 12-07-2023 a les 19:03:45
-- Versió del servidor: 10.4.24-MariaDB
-- Versió de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `wdis`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `initial_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `final_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `people_amount` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_id`, `initial_date`, `final_date`, `people_amount`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2022-12-12 19:04:36', '2022-12-25 21:25:32', 2, '123.00', '2022-11-25 15:18:19', '2022-11-25 15:18:19', NULL),
(2, 1, 1, '2022-11-25 14:33:03', '2022-11-25 21:25:32', 3, '97.00', '2022-11-25 14:33:03', '2022-11-25 14:33:03', NULL),
(3, 1, 2, '2022-11-24 23:00:00', '2022-11-25 21:25:32', 2, '31.00', '2022-11-25 14:40:35', '2022-11-25 14:40:35', NULL),
(6, 1, 1, '2022-11-24 23:00:00', '2022-11-25 23:00:00', 3, '97.00', '2022-11-25 20:26:29', '2022-11-25 20:26:29', NULL),
(7, 1, 2, '2022-11-27 23:00:00', '2022-11-28 23:00:00', 2, '31.00', '2022-11-28 14:15:50', '2022-11-28 14:15:50', NULL),
(8, 1, 2, '2022-12-02 23:00:00', '2022-12-03 14:33:25', 1, '31.00', '2022-11-28 16:41:09', '2022-11-28 16:41:09', NULL),
(9, 1, 2, '2022-12-03 23:00:00', '2022-12-04 23:00:00', 1, '31.00', '2022-11-28 17:24:49', '2022-11-28 17:24:49', NULL),
(11, 1, 1, '2022-12-07 22:09:03', '2022-12-07 22:09:03', 3, '97.00', '2022-12-07 20:26:19', '2022-12-07 21:09:03', '2022-12-07 21:09:03'),
(16, 1, 2, '2022-12-09 23:00:00', '2022-12-09 23:00:00', 1, '31.00', '2022-12-07 21:07:42', '2022-12-07 21:07:42', NULL),
(17, 1, 2, '2022-12-06 23:00:00', '2022-12-08 23:00:00', 2, '31.00', '2022-12-07 21:11:48', '2022-12-07 21:11:48', NULL),
(18, 7, 2, '2022-12-12 19:16:51', '2022-12-12 19:16:51', 2, '31.00', '2022-12-08 13:27:05', '2022-12-12 18:14:46', NULL),
(19, 1, 2, '2022-12-10 23:00:00', '2022-12-12 23:00:00', 2, '82.00', '2022-12-09 17:18:02', '2022-12-09 17:18:02', NULL),
(20, 7, 1, '2022-12-12 20:35:52', '2022-12-12 20:35:52', 2, '679.00', '2022-12-12 19:34:58', '2022-12-12 19:35:52', '2022-12-12 19:35:52'),
(28, 15, 1, '2022-12-21 08:54:26', '2022-12-21 08:54:26', 4, '194.00', '2022-12-21 07:52:01', '2022-12-21 07:54:26', '2022-12-21 07:54:26'),
(29, 1, 5, '2022-12-21 08:55:36', '2022-12-21 08:55:36', 1, '208.00', '2022-12-21 07:55:22', '2022-12-21 07:55:36', '2022-12-21 07:55:36'),
(30, 13, 3, '2023-06-26 22:00:00', '2023-06-27 22:00:00', 9, '242.00', '2023-06-27 17:07:23', '2023-06-27 17:07:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `establishments`
--

CREATE TABLE `establishments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establishment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `establishments`
--

INSERT INTO `establishments` (`id`, `name`, `description`, `address`, `image`, `establishment_type`, `city`, `postal_code`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hotel FWBX', 'Hotel a lajsdfoiaj fldasjk fd', 'Av.Madrid 182', '', 'HOTEL', 'Barcelona', '08081', 1, '2022-10-10 20:15:06', NULL, NULL),
(2, 'Apartaments Riumar', 'bomb', 'C/ Prova núm 82', '', 'APARTAMENT', 'Batea', '43786', 1, NULL, '2022-10-25 16:05:59', NULL),
(3, 'Josefina\'s Apartments', 'b', 'c', 'd', 'APARTAMENT', 'e', 'f', 1, '2022-10-18 18:09:51', '2022-11-23 19:45:54', '2022-11-23 19:45:54'),
(4, 'Hotel Presidencial', 'Prova', 'C/ Prova num 2', 'xxx', 'HOTEL', 'Vilalba dels Arcs', '43782', 1, '2022-10-25 15:57:06', '2022-10-25 15:57:06', NULL),
(5, 'Qwerty Hotels', 'test', 'test', 'test', 'HOTEL', 'Camarles', 'tete', 1, '2022-10-26 16:17:57', '2022-11-23 19:38:07', '2022-11-23 19:38:07'),
(6, 'Sant Jaume II', 'bomb', 'Plaça de la Vila n3', '', 'HOTEL', '123', '43782', 1, '2022-12-08 13:38:50', '2022-12-08 13:38:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_08_073532_create_services_table', 1),
(3, '2022_10_08_073532_create_users_table', 1),
(4, '2022_10_08_073630_create_establishments_table', 1),
(5, '2022_10_08_075809_create_rooms_table', 1),
(6, '2022_10_08_075826_create_bookings_table', 1),
(7, '2022_10_08_075826_create_room_has_service_table', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `occupancy` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establishment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `address`, `photo`, `price`, `occupancy`, `comments`, `establishment_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Habitació interior', 'Primera habitacio del hotel', '2n pis 3a porta', 'pexels-huseyn-kamaladdin-667838.jpg', '97.00', 5, 'careta', 1, 1, '2022-11-06 10:51:48', '2022-12-20 18:10:58', NULL),
(2, 'Apartament planta baixa', 'Un apartament de planta baixa amb vistes al casc antic', 'C Major 3', '', '41.00', 2, 'Molt de soroll per les nits', 2, 1, '2022-11-13 18:17:35', '2022-12-08 13:59:10', NULL),
(3, 'Sweet de luxe', 'L\'habitació més luxosa del hotel', '111', 'pexels-vecislavas-popa-1643383.jpg', '121.00', 10, '', 4, 13, '2022-12-08 16:14:26', '2022-12-20 18:12:38', NULL),
(4, 'Apartament primera planta', 'Un apartament a la primera planta', '123', '', '123.00', 123, '1', 2, 13, '2022-12-08 15:35:59', '2022-12-08 15:35:59', NULL),
(5, 'La Presidencial', '1', 'Àtic', 'pexels-pixabay-259962.jpg', '208.00', 4, '1', 6, 1, '2022-12-20 18:14:40', '2022-12-20 18:14:40', NULL),
(7, 'Cozy Retreat', 'A charming room with a view', '123 Main Street', '', '100.00', 2, 'Great stay!', 1, 1, '2023-07-12 16:59:42', '2023-07-12 16:59:42', NULL),
(8, 'Luxury Suite', 'An elegant suite with modern amenities', '456 Elm Avenue', '', '200.00', 2, 'Highly recommended', 1, 1, '2023-07-12 16:59:42', '2023-07-12 16:59:42', NULL),
(9, 'Family Getaway', 'Spacious room for a family vacation', '789 Oak Drive', '', '150.00', 4, 'Perfect for families', 2, 2, '2023-07-12 16:59:42', '2023-07-12 16:59:42', NULL),
(10, 'Ocean View Retreat', 'Enjoy stunning views of the ocean', '987 Beach Boulevard', '', '300.00', 2, 'Unforgettable experience', 5, 5, '2023-07-12 16:59:42', '2023-07-12 16:59:42', NULL),
(11, 'Cozy Retreat', 'A charming room with a view', '123 Main Street', '', '100.00', 2, 'Great stay!', 1, 1, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(12, 'Luxury Suite', 'An elegant suite with modern amenities', '456 Elm Avenue', '', '200.00', 2, 'Highly recommended', 1, 1, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(13, 'Family Getaway', 'Spacious room for a family vacation', '789 Oak Drive', '', '150.00', 4, 'Perfect for families', 2, 2, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(14, 'Ocean View Retreat', 'Enjoy stunning views of the ocean', '987 Beach Boulevard', '', '300.00', 2, 'Unforgettable experience', 5, 5, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(15, 'Mountain Cabin', 'Cozy cabin nestled in the mountains', '321 Pine Lane', '', '120.00', 2, 'Relaxing getaway', 3, 3, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(16, 'Urban Loft', 'Modern loft in the heart of the city', '555 City Avenue', '', '180.00', 2, 'Great location!', 4, 4, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(17, 'Rustic Cottage', 'Quaint cottage with rustic charm', '222 Meadow Road', '', '90.00', 2, 'Peaceful retreat', 2, 2, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(18, 'Seaside Bungalow', 'Charming bungalow by the beach', '777 Shoreline Drive', '', '160.00', 2, 'Amazing location', 5, 5, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(19, 'Modern Condo', 'Sleek and stylish condo with city views', '888 Skyline Avenue', '', '250.00', 2, 'Luxurious stay', 4, 4, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL),
(20, 'Country Inn', 'Cozy inn in a serene countryside setting', '444 Meadow Lane', '', '110.00', 2, 'Friendly staff', 3, 3, '2023-07-12 17:00:40', '2023-07-12 17:00:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `room_images`
--

CREATE TABLE `room_images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `room_id` bigint(20) NOT NULL,
  `header` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de la taula `room_services`
--

CREATE TABLE `room_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `room_services`
--

INSERT INTO `room_services` (`id`, `room_id`, `service_id`) VALUES
(11, 2, 4),
(15, 1, 2),
(16, 1, 9),
(17, 3, 3),
(18, 5, 1),
(19, 5, 2),
(20, 5, 3),
(21, 5, 4),
(22, 5, 5),
(23, 5, 9),
(24, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'Jacuzzi'),
(2, 'Sauna'),
(3, 'Home Cinema Dolby Surround'),
(4, 'Mueble bar'),
(5, 'Majordom'),
(9, 'Llit de luxe');

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 800,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `nif`, `address`, `city`, `postal_code`, `profile_photo`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Joel FFFF', 'joel@gmail.com', '', '12345678Z', 'Ctra Grandesa num 32', 'Barcelona', '43782', '', 800, '2022-10-09 08:58:42', '2022-12-21 07:56:13', NULL),
(2, 'Fellipe Mateo akxxxx', 'felipe@mateo.com', '$2y$10$3UR7YVKKeh9RpQ2sJ39ot.XVersop9BWFWiH0rrsjjMPEHHxWI1cC', '123456789Z', 'Ctra G n 2', 'V d a', '43782', '', 800, '2022-10-18 19:32:56', '2022-11-02 18:14:40', NULL),
(5, 'ca', 'ca', '1', 'ac', 'ac', 'ac', 'ac', '', 800, '2022-10-18 17:42:29', '2022-10-25 15:55:57', '2022-10-25 15:55:57'),
(6, 'Manolo Valdio', 'Manolo', '1', '12345678Z', 'Plaça de la Vila n3', 'Vilalba Dels Arcs', '43782', '', 800, '2022-10-25 16:05:22', '2022-10-25 16:05:38', '2022-10-25 16:05:38'),
(7, 'aka', 'aka@aka.com', '$2y$10$WcljtKQ1CUTEu8vKG06e5.afCsKEqKrtWV5T03h2yrTTvFM8tRbXe', 'aka', 'aka', 'aka', 'aka', '', 700, '2022-11-02 18:32:16', '2022-11-05 09:39:41', NULL),
(8, 'Joel', 'joel@tta.cat', '$2y$10$2tkK7rw3XHibic3Yyh1Oy.OAjckTKJVfpEtMsMlSbJ2xbpB6sO5iu', '123', '123', '123', '123', '', 600, '2022-11-05 10:37:26', '2022-11-05 10:37:26', NULL),
(10, 'xax', 'xax@xax.xax', '$2y$10$v4NmZjQPziToYjpFCk6LBeAO2hxM5R.N7qoj/6eeEajpzljRvDSpG', '123', 'xax', 'xax', '123', '', 600, '2022-11-05 10:38:33', '2022-11-25 13:45:18', NULL),
(11, 'qwe', 'qwe@qwe.qwe', '$2y$10$mKw2lu3aFgeEJhNgujXJA.eN1BLG6XZIyebSBMIVUwpKrywxu41cy', 'qwe', 'qwe', 'qwe', 'qwe', '', 600, '2022-11-05 10:40:32', '2022-11-25 13:42:33', '2022-11-25 13:42:33'),
(13, 'Llogater', 'llogater@llogater.com', '$2y$10$se1xVtUr/NZt1VkSW0Uvt.Ndnrs43wfnnRUTvqkSTEYQlexyfRORG', '12354546', 'asd', 'ASd', '43242', '', 700, '2022-12-08 13:58:25', '2022-12-08 13:58:25', NULL),
(15, 'Joel Fuara', 'joel@faura.com', '$2y$10$CkbAqyIvxRNlw0qMOTGTfOeUePep1/fdTmbsUPN14yOmTpAeTz5Qm', '12345678Z', 'c/ Gandesa 23', 'Vilalba Dels Arcs', '43782', '', 600, '2022-12-21 07:48:24', '2022-12-21 07:48:24', NULL);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `establishments`
--
ALTER TABLE `establishments`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índexs per a la taula `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `room_services`
--
ALTER TABLE `room_services`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la taula `establishments`
--
ALTER TABLE `establishments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la taula `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la taula `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la taula `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `room_services`
--
ALTER TABLE `room_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la taula `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la taula `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
