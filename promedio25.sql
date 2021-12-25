-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-12-2021 a las 04:35:15
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `promedio25`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2021_12_24_165034_nota', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcial1` double(8,2) NOT NULL DEFAULT '0.00',
  `parcial2` double(8,2) NOT NULL DEFAULT '0.00',
  `parcial3` double(8,2) NOT NULL DEFAULT '0.00',
  `final` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `nombre`, `parcial1`, `parcial2`, `parcial3`, `final`, `created_at`, `updated_at`) VALUES
(1, 'Miguel', 4.00, 4.00, 4.00, 4.00, '2021-12-25 00:33:07', '2021-12-25 09:22:43'),
(6, 'Pedro', 3.00, 4.00, 5.00, 4.00, '2021-12-25 09:08:53', '2021-12-25 09:08:53'),
(7, 'Maria', 5.00, 5.00, 5.00, 5.00, '2021-12-25 09:09:57', '2021-12-25 09:31:01'),
(8, 'rene', 3.00, 4.00, 5.00, 4.00, '2021-12-25 09:13:02', '2021-12-25 09:13:02'),
(9, 'Juan', 4.00, 4.00, 4.00, 4.00, '2021-12-25 09:14:00', '2021-12-25 09:14:00'),
(10, 'Chicho', 2.00, 3.00, 4.00, 3.00, '2021-12-25 09:14:54', '2021-12-25 09:26:21'),
(14, 'Jose', 3.00, 3.00, 3.00, 3.00, '2021-12-25 09:26:38', '2021-12-25 09:26:38'),
(12, 'Alberto', 4.00, 4.00, 4.00, 4.00, '2021-12-25 09:17:47', '2021-12-25 09:17:47'),
(13, 'Marti', 3.00, 3.00, 3.00, 3.00, '2021-12-25 09:19:56', '2021-12-25 09:19:56'),
(15, 'Jose', 3.00, 3.00, 3.00, 3.00, '2021-12-25 09:26:38', '2021-12-25 09:26:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
