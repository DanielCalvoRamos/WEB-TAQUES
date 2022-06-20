-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2022 a las 16:25:37
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_taques`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imatges`
--

CREATE TABLE `imatges` (
  `id` int(10) UNSIGNED NOT NULL,
  `ID_pacient_associat` int(11) NOT NULL,
  `imatge_pujada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_pujada` date NOT NULL,
  `comentaris_metge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentatge_malignitat` int(11) NOT NULL,
  `diagnostic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mascara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imatges`
--

INSERT INTO `imatges` (`id`, `ID_pacient_associat`, `imatge_pujada`, `data_pujada`, `comentaris_metge`, `percentatge_malignitat`, `diagnostic`, `mascara`, `remember_token`, `created_at`, `updated_at`) VALUES
(112, 16, 'margaritas.jpg', '2022-06-17', 'hola', 0, 'la vas a palmar bro', '', NULL, '2022-06-17 18:54:03', '2022-06-19 12:44:35'),
(113, 14, 'descarga.jpg', '2022-06-17', '', 0, '3', '113last_result.jpg', NULL, '2022-06-17 18:56:12', '2022-06-19 09:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metges`
--

CREATE TABLE `metges` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_naixament` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `metges`
--

INSERT INTO `metges` (`id`, `nom`, `cognom`, `email`, `contrasena`, `data_naixament`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raul', 'Bravo', 'useruser2@email.com', '$2y$10$RcViyMfSYT0zEGJkImeRIeG5zlyAwbhSAYosR1wBsTDrG4YEPD5BO', '0000-00-00', 'hH6aeBGrwy', '2022-04-20 14:25:50', '2022-04-20 14:25:50'),
(19, 'Juan', 'Magan', 'useruser3@email.com', '$2y$10$F68EjU2panaXW4kgXTgUL.dOCQDQ60OGfEMnFjbhUHFEzFz/KoBxW', '0000-00-00', 'wkcgruK1yM', '2022-04-20 17:08:05', '2022-04-20 17:08:05'),
(21, 'Pablo', 'Espinosa', 'useruser10@email.com', '$2y$10$q93HWOTcaynOlL9Rd6y9yOgr0oLlDAitMUpIrxBXbUIAWZqtgu6aG', '1998-04-23', 'Q0FhLt2EXJ', '2022-05-05 12:15:00', '2022-05-05 12:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(24, '2014_10_12_000000_create_users_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2022_03_24_170726_pacient', 1),
(30, '2022_03_24_170900_metge', 1),
(31, '2022_03_24_170823_imatge', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacients`
--

CREATE TABLE `pacients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_naixament` date NOT NULL,
  `ID_metge_associat` int(11) NOT NULL,
  `num_fotos` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacients`
--

INSERT INTO `pacients` (`id`, `nom`, `cognom`, `email`, `contrasena`, `data_naixament`, `ID_metge_associat`, `num_fotos`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'disiar', 'ada', 'DrVi2dal@email.com', '$2y$10$9ZdJAjqTUnAoYr0oA2L/oOHGrhL434AafBRcJa8G8KeFn2yH5VvP6', '0111-11-11', 2, 0, NULL, '2022-04-20 16:04:21', '2022-04-20 16:04:21'),
(10, 'istomasee', 'sssss', 'mariajesudddsrel7@gmail.com', '$2y$10$o862.FuEZhqSKI.9Bo4MSuRLOwSOtHsD/3xg4iaVx/WjsYEOk.GQy', '2011-02-10', 21, 0, NULL, '2022-04-20 16:08:43', '2022-05-05 13:05:28'),
(11, 'iriri', 'arara', 'rara@email.com', '$2y$10$Ztjt/Q9RZAnrulcKmtPf0.MD7928Xj1TkzeIm0YYWuEyu6HUFVscq', '2022-04-06', 21, 0, NULL, '2022-04-20 16:52:08', '2022-05-14 10:00:43'),
(12, 'SubGestor', 'subesggg', 'daniel.calvor@e-campus.uab.cat', '$2y$10$EKrY56Zx4lXoIMz6vwQpFeJ5lVWgq4QIQFmJI8TziMksa0ItQ8zq2', '2020-02-10', 19, 0, NULL, '2022-04-20 17:52:35', '2022-04-20 17:52:35'),
(13, 'paciente', 'pacientee', 'dcr30d06@gmail.com', '$2y$10$yGH77f4kqHLFlzjt2qu7P.rt0cMc1Ej9Mfi/gW2HAiP4L.R3IAw2G', '2010-02-10', 19, 0, NULL, '2022-04-20 20:14:18', '2022-04-20 20:14:18'),
(14, 'daniel', 'calvo', 'daniel.calvor3@e-campus.uab.cat', '$2y$10$4rudbBXSI37gxC4JUOBu6eUL08HZlCr3/ZzhZRj6Be8mwIt1NqGhK', '1999-06-30', 1, 2, NULL, '2022-04-21 12:41:33', '2022-04-21 12:41:33'),
(15, 'rrr', 'eee', 'useruser444@email.com', '$2y$10$1sIVTXhGMk2nta9TcvELc.AIGp5kiR4xJOEiYAVPLh0BfC4rZv4Rm', '2000-08-10', 21, 0, NULL, '2022-04-21 13:00:59', '2022-05-25 07:14:55'),
(16, 'Juan', 'Ruiz', 'useruser44@email.com', '$2y$10$8IEW7DkzxkuxSWKHejE.RuEu.8NwZObcoHvDgjjFEkwEqme2PGRga', '2022-04-06', 1, 2, NULL, '2022-04-27 13:16:56', '2022-06-17 18:56:12'),
(17, 'dad', 'ada', 'useruser13@email.com', '$2y$10$flsomSCMBEh3/8fHolDsNuTRybb0qGL/CAa7hdD4GmM7hq/asnv7e', '2022-05-03', 19, 0, NULL, '2022-05-06 14:10:56', '2022-05-06 14:10:56'),
(18, 'sfsdf', 'sdfdsfs', 'mariajesusrleee7@gmail.com', '$2y$10$wwnrYYE4MGhXorvm8jBgCONlAjVTa7ibeNgGJTQ7y8oInr/pwAO8W', '2022-05-03', 1, 0, NULL, '2022-05-06 14:18:20', '2022-05-06 14:18:20'),
(19, 'unama', 'madita', 'unamamadita@email.com', '$2y$10$l4XlbME851XRN45IOWs7dO4rxlEvKRgAFaxofZH56WJi0x2Ph7Cpy', '2022-05-04', 19, 0, NULL, '2022-05-06 14:23:20', '2022-05-06 14:23:20'),
(20, 'ProjecteWeb', 'sdfs', 'useruser344@email.com', '$2y$10$HgQ6FL0rpOqA9F5Wr1eKaOSV..2bgmfMVc8c5NB4Jxww7.nLKorii', '2022-04-27', 1, 0, NULL, '2022-05-10 14:46:08', '2022-05-10 14:46:08'),
(21, 'istomas', 'istomas', 'istomas@uab.cat', '$2y$10$4QFT9ts75Iwqst3cCwvHu..k4NIcL6M7wOt3cs6Ca6sZV131.EgHe', '2022-05-13', 19, 0, NULL, '2022-05-14 10:15:48', '2022-05-14 10:15:57'),
(22, 'sermanker', 'sermanker', 'sermanker@sermanker.com', '$2y$10$SVLH7SVB0Ba4O41p4PoPNeDBvXo2KO.tVpZ8VNcYIBXQ7CKN/eEt6', '1999-07-17', 19, 1, NULL, '2022-06-17 07:33:25', '2022-06-17 07:39:41'),
(23, 'df', 'df', 'useruser332@email.com', '$2y$10$5oJjsAK5ZHVNFVtxQVZs8u7uVFOyb0tCixm7ybWgOA5lahcarE32O', '1999-02-20', 21, 0, NULL, '2022-06-19 12:04:08', '2022-06-19 12:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('useruser2@email.com', '$2y$10$YzI1asjGjd16R5EQvQHA/OyE2yK8.xLWOTAGqZuGr5zPV1KM/jHWG', '2022-04-29 05:42:39'),
('useruser44@email.com', '$2y$10$4MvT1BNB7LtN.I6/2p54P.pOyND3Bw2PuwhA9SsW9QJMtDa8h8j3G', '2022-05-06 12:51:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'useruser2@email.com', NULL, 1, '$2y$10$cf67XKDJOb5uXbRlbSDNJubU0/36Ox4OMuzXJUsE77VA9Ka9BgNMe', 'ARx1ruybVEflUc6BMgwZXZQH8PgMi298qU5NQdUTrT4jxrGGkCd9tEFXiyos', '2022-04-20 14:25:50', '2022-06-19 11:14:33'),
(15, 'DrVi2dal@email.com', NULL, 2, '$2y$10$SVPrnQfbAzObKuBCbZJOsOocH0m0/oMxNd3WqM.tyIIKyPH5VvPta', NULL, '2022-04-20 16:04:20', '2022-04-20 16:04:20'),
(16, 'mariajesusrel7@gmail.com', NULL, 2, '$2y$10$mJ1wPcKHlRxCEpG0CSek0O7em1hkl40AlaUpsvNlLfqaqrI7yI9O6', NULL, '2022-04-20 16:07:38', '2022-04-20 16:07:38'),
(17, 'mariajesudddsrel7@gmail.com', NULL, 2, '$2y$10$xy3EaiypbFFgYiFFGBMFTOS5CooD7M54s5KQ5JcWsPO1L8t9U/PrW', NULL, '2022-04-20 16:08:43', '2022-04-20 16:08:43'),
(18, 'rara@email.com', NULL, 2, '$2y$10$Vn7sLv3xkChfnvd.Fc4vPeZya9gdZYqoWS5lLU4nCQEGVKBy55gnO', NULL, '2022-04-20 16:52:08', '2022-04-20 16:52:08'),
(19, 'useruser3@email.com', NULL, 1, '$2y$10$yvEbH8oe3WakWfPOaYmmLOr.BSsOSv86vwybHAclgGMsdGFSVgbve', 'cCoN9xl3YEiMD3k9MMg9tRjydWUib7jv1McX0EJw1Kw1tYDxaXJK05SllSO6', '2022-04-20 17:08:05', '2022-04-20 17:08:05'),
(20, 'daniel.calvor@e-campus.uab.cat', NULL, 2, '$2y$10$vc/pC4F1PEAccQbjNX6VD.NfKIuz9KzycqvWYfE.YHbllfO0d8Il2', NULL, '2022-04-20 17:52:35', '2022-04-20 17:52:35'),
(22, 'dcr30d06@gmail.com', NULL, 2, '$2y$10$BHYQhRmv/kstlRZCNV2yZuziWHv3TWEhmuK54pOlrSFxMYfE.JiSC', NULL, '2022-04-20 20:14:18', '2022-04-20 20:14:18'),
(23, 'daniel.calvor3@e-campus.uab.cat', NULL, 2, '$2y$10$qnwGwAGzZCWHCsAtBB1zl.mkbW93v45X/HvxR9pYC6pYkwRvr1XX.', NULL, '2022-04-21 12:41:33', '2022-04-21 12:41:33'),
(25, 'useruser44@email.com', NULL, 2, '$2y$10$LwxoSOzS2CXyfM.WWFmiYeqDhewQGNWYyGo6DySh.VWDkYBGlS2Pi', NULL, '2022-04-27 13:16:56', '2022-06-19 11:31:06'),
(26, 'useruser10@email.com', NULL, 1, '$2y$10$x2yE6eNGcHpusyRbkx3nQOy6ahB0YU2bMUxrsdV/aEmYOGYim9aQW', 'UljZpmKnjp', '2022-05-05 12:15:00', '2022-05-05 12:15:00'),
(27, 'useruser13@email.com', NULL, 2, '$2y$10$NKwVqo2kD9MUbI80YlRcIOkYaV.vMvSAfj.rgzv1hH7TkGi5Bon4G', NULL, '2022-05-06 14:10:56', '2022-05-06 14:10:56'),
(28, 'mariajesusrleee7@gmail.com', NULL, 2, '$2y$10$ZHchRi9EnOtB3kv0ct1jDewz4OM/oIVp6/eA8vqYXbNJmaYtNbYVO', NULL, '2022-05-06 14:18:20', '2022-05-06 14:18:20'),
(29, 'unamamadita@email.com', NULL, 2, '$2y$10$RSqNgZyFTotRlyTy66QRROZftDBHVBWVN6z3YYedYWij7UQRt.9Ee', NULL, '2022-05-06 14:23:20', '2022-05-06 14:23:20'),
(30, 'useruser344@email.com', NULL, 0, '$2y$10$gm7kDPEcbwHGhs/0JrgV2.26H5KQvMqQ74fv9UkcnsFHyog311AKe', NULL, '2022-05-10 14:46:08', '2022-05-10 14:46:08'),
(31, 'istomas@uab.cat', NULL, 2, '$2y$10$jTMhnE8BJPHhnZXMEYCwSuvNu5uz/G1S6sIrCydugvhG6Z3YBKGA2', NULL, '2022-05-14 10:15:48', '2022-05-14 10:15:48'),
(32, 'sermanker@sermanker.com', NULL, 2, '$2y$10$2l9t6/UCV7yrOykxX4z84.KFFDgDsLGD8BPfrYVfsHhsGS2hFfbp.', NULL, '2022-06-17 07:33:25', '2022-06-17 07:33:25'),
(34, 'useruser332@email.com', NULL, 2, '$2y$10$ZW04RpORlmESkTDewOPwQuq6J7i10zM.s3ZwjsslgW4RPcJmuhLPi', NULL, '2022-06-19 12:04:08', '2022-06-19 12:04:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `imatges`
--
ALTER TABLE `imatges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metges`
--
ALTER TABLE `metges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metges_email_unique` (`email`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacients`
--
ALTER TABLE `pacients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pacients_email_unique` (`email`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imatges`
--
ALTER TABLE `imatges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `metges`
--
ALTER TABLE `metges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pacients`
--
ALTER TABLE `pacients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
