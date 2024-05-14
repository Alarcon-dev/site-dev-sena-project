-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-05-2024 a las 02:16:56
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dev_opinion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id_article` int NOT NULL,
  `user_article_id` int NOT NULL,
  `categorie_article_id` int NOT NULL,
  `article_title` varchar(250) NOT NULL,
  `article_content` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int NOT NULL,
  `user_categorie_id` int NOT NULL,
  `categorie_name` varchar(250) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_categorie`, `user_categorie_id`, `categorie_name`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 1, 'Algoritmos', '2024-02-28', '2024-02-28', NULL),
(2, 1, 'Arquitectura', '2024-02-28', '2024-02-28', NULL),
(4, 1, 'Estructura de datos', '2024-02-28', '2024-02-28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comment` int NOT NULL,
  `user_comment_id` int NOT NULL,
  `public_comment_id` int NOT NULL,
  `comment_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `comment_image` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_02_27_190638_create_permission_tables', 1),
(2, '2024_02_27_191308_create_roles', 2),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE `publications` (
  `id_publication` int NOT NULL,
  `user_public_id` int NOT NULL,
  `cate_public_id` int NOT NULL,
  `public_title` varchar(250) NOT NULL,
  `public_content` text,
  `public_image` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id_publication`, `user_public_id`, `cate_public_id`, `public_title`, `public_content`, `public_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 5, 1, 'Otro mas', '<div class=\"form-group\">\r\n      <div class=\"custom-control custom-checkbox\">\r\n          <input type=\"checkbox\" name=\"remember\" class=\"custom-control-input\" tabindex=\"3\" id=\"remember-me\">\r\n              <label class=\"custom-control-label\" for=\"remember-me\">Remember Me</label>\r\n</div>\r\n</div>', '[\"1714437774_Captura de pantalla 2023-10-17 152343.png\"]', '2024-04-30 05:42:54', '2024-04-30 05:42:54', NULL),
(32, 7, 1, 'Otro mas', '<div class=\"form-group\">\r\n      <div class=\"custom-control custom-checkbox\">\r\n          <input type=\"checkbox\" name=\"remember\" class=\"custom-control-input\" tabindex=\"3\" id=\"remember-me\">\r\n    <label class=\"custom-control-label\" for=\"remember-me\">Remember Me</label>\r\n</div>\r\n</div>', '[\"1714437858_Captura de pantalla 2023-11-01 190634.png\"]', '2024-04-30 05:44:18', '2024-04-30 05:44:18', NULL),
(33, 7, 2, 'Otro mas', '<div class=\"form-group\">\r\n      <div class=\"custom-control custom-checkbox\">\r\n          <input type=\"checkbox\" name=\"remember\" class=\"custom-control-input\" tabindex=\"3\" id=\"remember-me\">\r\n              <label class=\"custom-control-label\" for=\"remember-me\">Remember Me</label>\r\n</div>\r\n</div>', '[\"1714437961_Captura de pantalla 2023-10-17 152132.png\"]', '2024-04-30 05:46:01', '2024-04-30 05:46:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id_resources` int NOT NULL,
  `user_resource_id` int NOT NULL,
  `cate_resource_id` int NOT NULL,
  `resource_title` varchar(250) NOT NULL,
  `resource_author` varchar(250) NOT NULL,
  `resource_edition` date DEFAULT NULL,
  `resource_image` varchar(250) DEFAULT NULL,
  `resource_file` varchar(250) NOT NULL,
  `resource_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` date DEFAULT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-02-28 00:19:50', '2024-02-28 00:19:50'),
(2, 'userClient', 'web', '2024-02-28 00:19:50', '2024-02-28 00:19:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `user_name` varchar(125) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nick_name` varchar(125) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(125) NOT NULL,
  `user_image` varchar(250) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `last_name`, `nick_name`, `email`, `password`, `user_image`, `updated_at`, `created_at`, `deleted_at`, `remember_token`) VALUES
(1, 'Stev', 'Alarcon', '@Administrador', 'Alarcon@admin.com', '$2y$12$lJV2ntYnRJaBhk5Du4IIweRFgAsn9QANLQ9SxvWKo5Grt7BP5ki2G', '1709337568_pokemon.jpg', '2024-04-23', '2024-02-27', NULL, 'h2HFHh14tPsU3vFkUsD6chk8BYWPairdWjw6syQpPaJfRW0wuDpnECcWJyK6'),
(5, 'Camila', 'Cabello', '@Cabellito', 'Cabello@Cabello.com', '$2y$12$GILi09f6I023FdhaButmVu4eP8mPSdjHWrKqF8/xyg2bhifCFHgDS', '1709866182_images_4.jpg', '2024-05-03', '2024-03-06', NULL, '5SJgYWsQQOFMcfXqg5TYEAOeFomACsdkFQTh54pqGzW0764JOEFpPD08XxNs'),
(7, 'Carlos', 'Perez', '@Carlotes', 'Perez@Perez.com', '$2y$12$2CdSfFtpX/MFTP/vmQq7Wur/Iid0kMqwNQ/qzURcseeEcs4vsgMSO', '1714437064_xmen_4.jpg', '2024-04-30', '2024-04-30', NULL, '3KwVcOZBwd5s9dVCiiNF2UFLUmyGLfzqfJDEE8PORPk14pCeZUwAfwKTteOH');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD KEY `fk_user_id_article` (`user_article_id`),
  ADD KEY `fk_category_id_article` (`categorie_article_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `fk_categorie_user_id` (`user_categorie_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_user_comment_id` (`user_comment_id`),
  ADD KEY `fk_public_comment_id` (`public_comment_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `fk_user_public_id` (`user_public_id`),
  ADD KEY `fk_cate_public_id` (`cate_public_id`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id_resources`),
  ADD UNIQUE KEY `uq_resource_file` (`resource_file`),
  ADD KEY `fk_user_resource_id` (`user_resource_id`),
  ADD KEY `fk_cate_resource_id` (`cate_resource_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nick_name` (`nick_name`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publications`
--
ALTER TABLE `publications`
  MODIFY `id_publication` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id_resources` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_category_id_article` FOREIGN KEY (`categorie_article_id`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `fk_user_id_article` FOREIGN KEY (`user_article_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categorie_user_id` FOREIGN KEY (`user_categorie_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_public_comment_id` FOREIGN KEY (`public_comment_id`) REFERENCES `publications` (`id_publication`),
  ADD CONSTRAINT `fk_user_comment_id` FOREIGN KEY (`user_comment_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `fk_cate_public_id` FOREIGN KEY (`cate_public_id`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `fk_user_public_id` FOREIGN KEY (`user_public_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_cate_resource_id` FOREIGN KEY (`cate_resource_id`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `fk_user_resource_id` FOREIGN KEY (`user_resource_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
