-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-12-2018 a las 09:00:23
-- Versión del servidor: 5.6.39-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jessica7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colony` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_number` int(11) DEFAULT NULL,
  `house_number_int` int(11) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `colony`, `state`, `city`, `house_number`, `house_number_int`, `CP`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:25:16', '2018-12-04 19:25:16'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:26:04', '2018-12-04 19:26:04'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:32:27', '2018-12-04 19:32:27'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:33:14', '2018-12-04 19:33:14'),
(5, '4 NORTE PONIENTE #5832', 'Teran', 'CHIAPAS', 'TUXTLA GUTIERREZ', 593, 2, 29050, '2018-12-04 19:33:41', '2018-12-05 03:12:53'),
(6, '4 NORTE PONIENTE #583', 'ASD', 'CHIAPAS', 'TUXTLA GUTIERREZ', 555, 55, 29050, '2018-12-05 05:08:45', '2018-12-05 23:32:18'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:39:24', '2018-12-05 12:39:24'),
(8, '1º de Junio', 'San Pablo Sur', 'Oaxaca', 'Salina Cruz', 7, 0, 70690, '2018-12-05 12:43:18', '2018-12-07 23:14:55'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:46:44', '2018-12-05 12:46:44'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 13:23:44', '2018-12-05 13:23:44'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 14:01:42', '2018-12-05 14:01:42'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-06 00:31:33', '2018-12-06 00:31:33'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 08:29:49', '2018-12-07 08:29:49'),
(14, 'Río de la plata', 'Infonavit Las Vegas', 'Chiapas', 'Tapachula', 5, 0, 30789, '2018-12-07 19:57:41', '2018-12-07 20:21:42'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 22:10:26', '2018-12-07 22:10:26'),
(16, 'Josefa Ortíz de Domínguez', 'San Pablo Sur', 'Oaxaca', 'Salina Cruz', 0, 0, 70690, '2018-12-07 22:39:15', '2018-12-07 22:50:36'),
(17, 'Av. 31 Poniente', 'Chulavista', 'Puebla', 'Puebla', 129, 2, 72000, '2018-12-07 22:55:00', '2018-12-07 23:17:49'),
(18, '9 y 10 canales', 'Mainero', 'Tamaulipas', 'Victoria', 229, 0, 87100, '2018-12-07 23:54:20', '2018-12-08 00:04:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `allergies`
--

CREATE TABLE `allergies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `allergies`
--

INSERT INTO `allergies` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 7, 'Penicilina', 'Náuseas, vómito, erupción cutánea, hemorragia.', '2018-12-05 12:49:35', '2018-12-05 12:49:35'),
(4, 7, 'Epinefrina', 'Sudoraci{on, piel pálida, enrojecimiento en la piel.', '2018-12-05 12:51:03', '2018-12-05 12:51:03'),
(5, 12, 'Anafilaxia', 'Diarrea, vómito', '2018-12-07 20:24:22', '2018-12-07 20:24:22'),
(6, 12, 'Penicilina', 'Fiebre e hinchazón', '2018-12-07 20:24:59', '2018-12-07 20:24:59'),
(7, 12, 'Anestesia local', 'Uricataria', '2018-12-07 20:25:44', '2018-12-07 20:25:44'),
(8, 12, 'Epinefrina', 'Apnea', '2018-12-07 20:27:25', '2018-12-07 20:27:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `born_expedients`
--

CREATE TABLE `born_expedients` (
  `id` int(10) UNSIGNED NOT NULL,
  `edad_madre` int(11) DEFAULT NULL,
  `tipo_nacimiento` int(11) NOT NULL DEFAULT '1',
  `llanto_inmediato` int(11) NOT NULL DEFAULT '1',
  `APGAR` int(11) DEFAULT NULL,
  `malformaciones` text COLLATE utf8mb4_unicode_ci,
  `sangre_criogena_cordon` tinyint(1) NOT NULL DEFAULT '0',
  `peso` double DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `complicaciones_embarazo` text COLLATE utf8mb4_unicode_ci,
  `no_embarazo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `born_expedients`
--

INSERT INTO `born_expedients` (`id`, `edad_madre`, `tipo_nacimiento`, `llanto_inmediato`, `APGAR`, `malformaciones`, `sangre_criogena_cordon`, `peso`, `talla`, `complicaciones_embarazo`, `no_embarazo`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-04 19:32:27', '2018-12-04 19:32:27'),
(2, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-04 19:33:14', '2018-12-04 19:33:14'),
(3, 25, 2, 2, 10, 'sad', 1, 3, 35, 'sadfas', 1, '2018-12-04 19:33:41', '2018-12-05 04:10:52'),
(4, 25, 2, 1, 564, '645', 1, 56, 65, '56', 1, '2018-12-05 05:08:45', '2018-12-05 23:33:02'),
(5, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-05 12:39:24', '2018-12-05 12:39:24'),
(6, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-05 12:43:18', '2018-12-05 12:43:18'),
(7, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-05 12:46:44', '2018-12-05 12:46:44'),
(8, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-05 13:23:44', '2018-12-05 13:23:44'),
(9, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-05 14:01:42', '2018-12-05 14:01:42'),
(10, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-06 00:31:33', '2018-12-06 00:31:33'),
(11, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-07 08:29:49', '2018-12-07 08:29:49'),
(12, 29, 2, 1, 5, 'Ninguna', 0, 3, 45, 'La salud del bebé estaba en peligro, se enredó con el cordón umbilical.', 3, '2018-12-07 19:57:41', '2018-12-07 23:32:10'),
(13, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-07 22:10:26', '2018-12-07 22:10:26'),
(14, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-07 22:39:15', '2018-12-07 22:39:15'),
(15, NULL, 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, '2018-12-07 22:55:00', '2018-12-07 22:55:00'),
(16, 57, 2, 1, 10, 'Ninguna', 0, 4, 50, 'Ninguna', 1, '2018-12-07 23:54:20', '2018-12-08 00:24:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dates`
--

CREATE TABLE `dates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `medic_id` int(11) DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dates`
--

INSERT INTO `dates` (`id`, `user_id`, `medic_id`, `subject`, `date`, `hour`, `room`, `created_at`, `updated_at`) VALUES
(3, 4, 2, 'MIS TOBILLOS ME TRUENAN', '2018-12-23', '00:00', 'Unidad radiológica', '2018-12-05 06:50:18', '2018-12-07 20:41:29'),
(5, 7, 6, 'Pruebas de laboratorio', '2018-12-05', '15:00', 'C2', '2018-12-05 13:02:07', '2018-12-05 13:02:07'),
(6, 8, 6, 'Resultado Rayos X', '2018-12-10', '09:30', 'C2', '2018-12-05 13:38:31', '2018-12-05 13:38:31'),
(7, 10, 6, 'chequeo rutinario', '2018-12-07', '12:59', 'C2', '2018-12-06 00:32:35', '2018-12-07 20:40:42'),
(8, 7, NULL, 'Limpieza bucal', '2018-12-06', '21:01', NULL, '2018-12-06 09:18:15', '2018-12-06 09:18:15'),
(9, 8, 6, 'Tomografía', '2018-12-07', '18:50', 'Unidad radiológica', '2018-12-07 19:50:58', '2018-12-07 19:54:45'),
(10, 10, 6, 'qwryoir', '2019-01-04', '01:00', '76', '2018-12-07 20:02:09', '2018-12-07 20:02:57'),
(11, 12, 6, 'Me duele mi pie', '2018-12-17', '11:00', 'C2', '2018-12-07 20:11:47', '2018-12-07 20:13:13'),
(12, 16, 6, 'Revisión general', '2019-01-15', '08:00', 'C2', '2018-12-08 00:19:27', '2018-12-08 00:46:31'),
(13, 16, 6, 'Consulta general', '2018-12-07', '17:50', 'Consultorio general', '2018-12-08 00:45:22', '2018-12-08 00:46:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedients`
--

CREATE TABLE `expedients` (
  `id` int(10) UNSIGNED NOT NULL,
  `medic_id` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `blood_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `antecedentes_heredo_familiares` text COLLATE utf8mb4_unicode_ci,
  `antecedentes_personales_patologicos` text COLLATE utf8mb4_unicode_ci,
  `antecedentes_personales_no_patologicos` text COLLATE utf8mb4_unicode_ci,
  `padecimientos_actuales` text COLLATE utf8mb4_unicode_ci,
  `complicaciones_embarazo` text COLLATE utf8mb4_unicode_ci,
  `no_embarazo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `expedients`
--

INSERT INTO `expedients` (`id`, `medic_id`, `weight`, `height`, `blood_type`, `antecedentes_heredo_familiares`, `antecedentes_personales_patologicos`, `antecedentes_personales_no_patologicos`, `padecimientos_actuales`, `complicaciones_embarazo`, `no_embarazo`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:33:14', '2018-12-04 19:33:14'),
(2, NULL, 50, 170, 'O+', 's', 's', 's', 's                            actuales', NULL, NULL, '2018-12-04 19:33:41', '2018-12-05 04:07:42'),
(3, NULL, 45, 35, 'O+', 'ASD', 'ASD', 'ASD', 'ASD', NULL, NULL, '2018-12-05 05:08:45', '2018-12-05 23:32:47'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:39:24', '2018-12-05 12:39:24'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:43:18', '2018-12-05 12:43:18'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:46:44', '2018-12-05 12:46:44'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 13:23:44', '2018-12-05 13:23:44'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 14:01:42', '2018-12-05 14:01:42'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-06 00:31:33', '2018-12-06 00:31:33'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 08:29:49', '2018-12-07 08:29:49'),
(11, NULL, 3, 50, 'O+', 'Tuberculosis,  hepatitis', 'Amibiasis, escarlatina, sarampión, VIH', 'Alocoholismo, tabaquismo, toxicomanías, zoonosis', 'Diabetes mellitus', NULL, NULL, '2018-12-07 19:57:41', '2018-12-07 23:27:02'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 22:10:26', '2018-12-07 22:10:26'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 22:39:15', '2018-12-07 22:39:15'),
(14, NULL, 64, 160, 'O+', 'Ninguno', 'Ninguno', 'Ninguno', 'Ninguno', NULL, NULL, '2018-12-07 22:55:00', '2018-12-07 23:20:07'),
(15, NULL, 70, 175, 'O+', 'Diabetes, hipertensión, enfermedades del sistema endocrino-metabólico', 'ninguna', 'Vivienda: \r\nUrbana con todos los servicios.\r\n\r\nHigiene:\r\nBaño diario\r\nCepillado 3 veces al día\r\nCambio de ropa diario.\r\n\r\nDieta:\r\nLavado de manos diario antes y después de comer y después de ir al baño. \r\n3 comidas al día, muchos carbohidratos y poca fibra. \r\n\r\nZoonosis: \r\n2 caninos. \r\n\r\nAlcoholismo, tabaquismo u otras toxicomanía: \r\nAlcohol 2 a 3 veces por mes\r\nMarihuana 1 vez', 'ninguna', NULL, NULL, '2018-12-07 23:54:20', '2018-12-08 00:21:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medical_datas`
--

CREATE TABLE `medical_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `speciality` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_speciality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medical_datas`
--

INSERT INTO `medical_datas` (`id`, `speciality`, `sub_speciality`, `cedula`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '2018-12-04 19:33:14', '2018-12-04 19:33:14'),
(2, NULL, NULL, NULL, '2018-12-04 19:33:41', '2018-12-04 19:33:41'),
(3, NULL, NULL, NULL, '2018-12-05 05:08:45', '2018-12-05 05:08:45'),
(4, NULL, NULL, NULL, '2018-12-05 12:39:24', '2018-12-05 12:39:24'),
(5, NULL, 'Traumatismos craneoencefálicos', '1530812911', '2018-12-05 12:43:18', '2018-12-05 12:43:18'),
(6, NULL, NULL, NULL, '2018-12-05 12:46:44', '2018-12-05 12:46:44'),
(7, NULL, NULL, NULL, '2018-12-05 13:23:44', '2018-12-05 13:23:44'),
(8, NULL, NULL, NULL, '2018-12-05 14:01:42', '2018-12-05 14:01:42'),
(9, NULL, NULL, NULL, '2018-12-06 00:31:33', '2018-12-06 00:31:33'),
(10, NULL, 'Pediatria', '12536123878913', '2018-12-07 08:29:49', '2018-12-07 08:29:49'),
(11, NULL, NULL, NULL, '2018-12-07 19:57:41', '2018-12-07 19:57:41'),
(12, NULL, NULL, NULL, '2018-12-07 22:10:26', '2018-12-07 22:10:26'),
(13, NULL, NULL, NULL, '2018-12-07 22:39:15', '2018-12-07 22:39:15'),
(14, NULL, NULL, NULL, '2018-12-07 22:55:00', '2018-12-07 22:55:00'),
(15, NULL, NULL, NULL, '2018-12-07 23:54:20', '2018-12-07 23:54:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_25_221134_create_addresses_table', 1),
(4, '2018_07_25_221156_create_personal_datas_table', 1),
(5, '2018_07_25_221235_create_especialities_table', 1),
(6, '2018_07_25_221254_create_medical_datas_table', 1),
(7, '2018_07_25_221320_create_recipes_table', 1),
(8, '2018_07_25_221344_create_recipe_descriptions_table', 1),
(9, '2018_07_25_221354_create_dates_table', 1),
(10, '2018_07_25_221420_create_weights_table', 1),
(11, '2018_07_25_221440_create_allergies_table', 1),
(12, '2018_11_28_202126_create_expedients_table', 1),
(13, '2018_11_28_202233_create_born_expedients_table', 1),
(14, '2018_11_28_204912_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `user_type`, `title`, `description`, `type`, `url`, `read`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/show/3', 1, '2018-12-05 06:50:18', '2018-12-08 00:46:47'),
(2, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/show/7', 1, '2018-12-06 00:32:35', '2018-12-08 00:46:11'),
(3, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/show/8', 1, '2018-12-06 09:18:15', '2018-12-08 00:46:11'),
(4, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/edit/9', 1, '2018-12-07 19:50:58', '2018-12-08 00:46:11'),
(5, 8, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 0, '2018-12-07 19:54:45', '2018-12-07 19:54:45'),
(6, 6, NULL, 'Tienes una Cita asignada', 'Programada para el día 2018-12-07 hora 18:50', 1, 'app/citas/show/9', 1, '2018-12-07 19:54:45', '2018-12-08 00:46:47'),
(7, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/edit/10', 1, '2018-12-07 20:02:09', '2018-12-08 00:46:11'),
(8, 10, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 1, '2018-12-07 20:02:57', '2018-12-07 20:05:41'),
(9, 6, NULL, 'Tienes una Cita asignada', 'Programada para el día 2019-01-04 hora 01:00', 1, 'app/citas/show/10', 1, '2018-12-07 20:02:57', '2018-12-08 00:46:47'),
(10, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/edit/11', 1, '2018-12-07 20:11:47', '2018-12-08 00:46:11'),
(11, 12, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 0, '2018-12-07 20:13:13', '2018-12-07 20:13:13'),
(12, 6, NULL, 'Tienes una Cita asignada', 'Programada para el día 2018-12-17 hora 11:00', 1, 'app/citas/show/11', 1, '2018-12-07 20:13:13', '2018-12-08 00:46:47'),
(13, 10, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 0, '2018-12-07 20:40:42', '2018-12-07 20:40:42'),
(14, 6, NULL, 'Tienes una Cita asignada', 'Programada para el día 2018-12-07 hora 12:59', 1, 'app/citas/show/7', 1, '2018-12-07 20:40:42', '2018-12-08 00:46:47'),
(15, 4, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 0, '2018-12-07 20:41:29', '2018-12-07 20:41:29'),
(16, 2, NULL, 'Tienes una Cita asignada', 'Programada para el día 2018-12-23 hora 00:00', 1, 'app/citas/show/3', 0, '2018-12-07 20:41:29', '2018-12-07 20:41:29'),
(17, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/edit/12', 1, '2018-12-08 00:19:27', '2018-12-08 00:46:11'),
(18, 16, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 1, '2018-12-08 00:22:56', '2018-12-08 00:41:36'),
(19, 6, NULL, 'Tienes una Cita asignada', 'Programada para el día 2019-01-15 hora 08:00', 1, 'app/citas/show/12', 1, '2018-12-08 00:22:56', '2018-12-08 00:46:47'),
(20, NULL, 4, 'Nueva Cita', 'Esta cita aun no tiene un medico asignado', 1, 'app/citas/edit/13', 1, '2018-12-08 00:45:22', '2018-12-08 00:46:11'),
(21, 16, NULL, 'Medico Establecido en tu cita', 'Ya solo falta que asistas el dia indicado a tu cita', 1, 'app/misCitas', 0, '2018-12-08 00:46:24', '2018-12-08 00:46:24'),
(22, 6, NULL, 'Tienes una Cita asignada', 'Programada para el día 2018-12-07 hora 17:50', 1, 'app/citas/show/13', 1, '2018-12-08 00:46:24', '2018-12-08 00:46:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(191) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `token`, `created_at`) VALUES
(2, 1, 'c7e12f14e7b42239c717b74b2a986360b376b2fb737773a1', '2018-09-13 21:07:02'),
(3, 1, 'bfcd365df74426073dd951352534922d6b2d894f54b6118b', '2018-12-05 04:52:48'),
(4, 1, '8d58f63579acac39cfd3abe591268f302cd041d317f0a078', '2018-12-05 12:00:34'),
(5, 1, '0e06277155dfa6a1eb1344b019e2f011e38522bfb3cc7ff3', '2018-12-05 12:04:46'),
(6, 1, 'eaf5c7416f17909d8cf532b44c458f7215026bd5931bd5aa', '2018-12-05 12:05:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_datas`
--

CREATE TABLE `personal_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `CURP` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `economic_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_datas`
--

INSERT INTO `personal_datas` (`id`, `phone`, `phone2`, `nacionality`, `birthday`, `CURP`, `civil_status`, `religion`, `occupation`, `economic_level`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:25:16', '2018-12-04 19:25:16'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:26:04', '2018-12-04 19:26:04'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:32:27', '2018-12-04 19:32:27'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 19:33:14', '2018-12-04 19:33:14'),
(5, '9611221222', '94556', 'México', '2018-01-01', 'sdfsdfsdf', 'CHIAPAS', 'CRISTIANA', 'DESARROLLADOR', 'MEDIA', '2018-12-04 19:33:41', '2018-12-05 04:09:06'),
(6, '55546', '55665564456456', 'México', '2018-01-01', 'ASDASDASD645', 'CHIAPAS', '654', 'ASDASD', 'BAJA', '2018-12-05 05:08:45', '2018-12-05 23:32:35'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:39:24', '2018-12-05 12:39:24'),
(8, '9612282281', NULL, 'Mexicana', '1997-11-29', 'GUSTA971129MOCTNZ07', 'Soltera', 'Ninguno', 'Médico', 'MEDIA', '2018-12-05 12:43:18', '2018-12-07 23:16:14'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 12:46:44', '2018-12-05 12:46:44'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 13:23:44', '2018-12-05 13:23:44'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-05 14:01:42', '2018-12-05 14:01:42'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-06 00:31:33', '2018-12-06 00:31:33'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 08:29:49', '2018-12-07 08:29:49'),
(14, '962 2429933', NULL, 'República de Turkmenistán.', '1990-09-07', 'CAREAGA0708', 'Viudo', 'Hindú', 'Jefe de ingeniería', 'ALTA', '2018-12-07 19:57:41', '2018-12-07 20:20:10'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-07 22:10:26', '2018-12-07 22:10:26'),
(16, NULL, NULL, 'Mexicana', '1998-03-16', 'JRM980316HOC1980', 'Soltero', 'Ninguno', 'Médico', 'MEDIA', '2018-12-07 22:39:15', '2018-12-07 22:52:56'),
(17, '97111706475', NULL, 'Mexicana', '1997-02-25', 'RALM970225MOCRS03', 'Soltera', 'Cristiana', 'Estudiante', 'MEDIA', '2018-12-07 22:55:00', '2018-12-07 23:19:16'),
(18, '8343087729', '4446767676', 'Mexicana', '1996-11-06', 'HDSRXZ9611FFFFF', 'Soltero', 'Católico', 'Estudiante', 'MEDIA', '2018-12-07 23:54:20', '2018-12-08 00:06:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `medic_id` int(11) NOT NULL,
  `observation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `medic_id`, `observation`, `created_at`, `updated_at`) VALUES
(2, 7, 6, 'Me da estreñimientp', '2018-12-05 12:55:04', '2018-12-06 09:19:12'),
(4, 16, 6, NULL, '2018-12-08 00:26:53', '2018-12-08 00:26:53'),
(5, 16, 6, NULL, '2018-12-08 00:47:42', '2018-12-08 00:47:42'),
(6, 12, 6, NULL, '2018-12-08 01:30:44', '2018-12-08 01:30:44'),
(7, 10, 6, NULL, '2018-12-11 20:35:26', '2018-12-11 20:35:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipe_descriptions`
--

CREATE TABLE `recipe_descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `medicine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraindications` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recipe_descriptions`
--

INSERT INTO `recipe_descriptions` (`id`, `recipe_id`, `medicine`, `frequency`, `contraindications`, `created_at`, `updated_at`) VALUES
(4, 2, 'Vedolizumab (Entyvio)', '300 mg c/8hrs', 'Hipersensibilidad a vedolizumab; infecciones graves activas, como tuberculosis, sepsis, citomegalovirus y listeriosis.', '2018-12-05 12:59:25', '2018-12-05 12:59:25'),
(5, 2, 'loperamida (Imodium)', '20 ml c/6 hrs', 'disentería aguda, caracterizada por la presencia de sangre en heces y fiebre elevada (>38 ºC); colitis ulcerosa aguda', '2018-12-05 13:07:56', '2018-12-05 13:07:56'),
(6, 2, 'Pregabalina', '50 a 300 mg día', 'Viusi{on borrosa, inflamación de los ojos, la cara, la garganta, la boca, los labios, las encías, la lengua, la cabeza o el cuello', '2018-12-05 13:13:41', '2018-12-05 13:13:41'),
(8, 4, 'Hidróxido de aluminio (suspensión)', 'Una cucharada (10 a 20 ml) de suspensión por vía oral, una hora después de cada alimento y al acostarse.', 'Hipersensibilidad a algunos de los componentes de la fórmula. Insuficiencia renal.', '2018-12-08 00:40:24', '2018-12-08 00:40:24'),
(9, 5, 'AMOXICILINA ARDINE Polvo para susp. oral 125 mg/5 ml', '20 ml c/8 hrs', 'Hipersensibilidad a ß-lactámicos; antecedentes de una reacción de hipersensibilidad inmediata grave', '2018-12-08 00:50:21', '2018-12-08 00:50:21'),
(10, 5, 'DIMEGAN: cápsulas 10 mg', '1 cápsula c/12 hrs', 'Hipersensibilidad. vómitos.', '2018-12-08 00:52:13', '2018-12-08 00:52:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `personal_data_id` int(11) NOT NULL,
  `medical_data_id` int(11) DEFAULT NULL,
  `expedient_id` int(11) DEFAULT NULL,
  `born_expedient_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `patern`, `matern`, `gender`, `speciality_id`, `user_type`, `address_id`, `personal_data_id`, `medical_data_id`, `expedient_id`, `born_expedient_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JESUS FCO', 'jfcr@live.com', '$2y$10$VvRnvrHdRISQtMaqm4skX.0AkD/YiVHBOcZyRY2nhmpLbhAfF6/I6', 'RODRIGUEZ', ' ', 1, NULL, 4, 1, 1, NULL, NULL, NULL, 'qOLtqsmrw3PBzrLeLle0wMUzYR5t4GIv9dsxXBwWkGcVpUsPZUEAtii8C8GS', NULL, '2018-12-05 12:16:16'),
(2, 'SERGIO', 'SERGIO@GMAIL.COM', '$2y$10$FUNAiEROhVqaT8R7GIPLke14gs2wR2786f7cVpOQ1QAjEsmehs1k.', 'RUIZ', 'SANCHEZ', 1, NULL, 3, 4, 4, 1, 1, 2, NULL, '2018-12-04 19:33:14', '2018-12-04 19:33:14'),
(3, 'Jessica 2', 'je2ssica@gmail.com', '$2y$10$2fCcQDF.aypaYes9ZlC0jerSLwyIAU9juxR4/Oh.pnwW3WXtLp3xu', 'Nardez', 'Sanchez', 1, NULL, 2, 5, 5, 2, 2, 3, NULL, '2018-12-04 19:33:41', '2018-12-05 04:14:51'),
(4, 'Alicia', 'alicia@gmail.com', '$2y$10$H5nyJmwE/3tBANQ8XZMqOeEBB1xHidy3fdXsffK1F2SmFzreXUnpS', 'Perez', 'Antonio', 2, NULL, 1, 6, 6, 3, 3, 4, 'J6SKRHbsyDGdudi1LZ26mf2IK1Ojh1KOgqPshB3CuieSEpqZsmNhHTipj3Lt', '2018-12-05 05:08:45', '2018-12-05 05:08:45'),
(5, 'Jessica', 'jgumeta143163@gmail.com', '$2y$10$oTyQeMA6kKzFtQ0S6A5SZOpmXgzgcfcW46MCVOUTmD/HOgbnv0idC', 'Gumeta', 'Hernandez', 2, NULL, 4, 7, 7, 4, 4, 5, '6LEVYzUTQLd1nHbovgNfEymr4Z3ecK3lvkkRAht0ZmLH9KDSbeF05rHI6Ksj', '2018-12-05 12:39:24', '2018-12-05 12:39:24'),
(6, 'Seyin', 'tgutierre153@gmail.com', '$2y$10$trEowuQMZDmF1VBxyUOJQe92p8gjlr820DvFZJmsliNg2QeN.AzJu', 'Gutiérrez', 'Sánchez', 2, NULL, 3, 8, 8, 5, 5, 6, 'NNqe0vTPN5tGwJUto7Adh25t2q78uDOVUFUneHx6fIuNnIqQBdkSJB2kh7rQ', '2018-12-05 12:43:18', '2018-12-07 23:14:15'),
(7, 'Ángel', 'otero153@gmail.com', '$2y$10$VEMztB48II9FpqgeQJ8xGuufwcIXlbzNReGx1ZjJcZfeIO3tt0Wcq', 'Vásquez', 'Otero', 1, NULL, 1, 9, 9, 6, 6, 7, '66UO2nvMtUzgseTCpnGSpNOH9zHK1m1LLopkroDEtPC11zkKLK70RghVpYeh', '2018-12-05 12:46:44', '2018-12-05 12:46:44'),
(8, 'Luis Felipe', 'trujillo0301@gmail.com', '$2y$10$xQyRjq7n7/coM3dWs4Rrce/2VNom.m.0gYbjfjJKOLYkVyanCz0xa', 'Ríos', 'Trujillo', 1, NULL, 3, 10, 10, 7, 7, 8, 'qMgmXSPUNq49wn8gjtfEVdxvgDXsJnwmk4paflSkVV9tBavZh2AfEjp7GNK9', '2018-12-05 13:23:44', '2018-12-07 22:44:19'),
(9, 'Samuel', 'sam153@gmail.com', '$2y$10$LaaoaFz5rBdPq6lAG1U5wuxiXPSb5zlAClF4.9y80hDL7xGUIMCAq', 'Guzmán', 'García', 1, NULL, 2, 11, 11, 8, 8, 9, 'PlsiJEIf8dq91hG99XkRzJGR6sszPwoajDjUgX2RUFrBlVhV2Ovj0TF7a29T', '2018-12-05 14:01:42', '2018-12-11 22:02:04'),
(10, 'Angel', 'angel@live.com', '$2y$10$FE8/YCZricI7N48XGBBMduhoT.wEUSxXmEoL3wLeWDUjnY8M7TCiW', 'Gumeta', 'Hernandez', 1, NULL, 1, 12, 12, 9, 9, 10, 'ELWIxsymuU7g9EG0lkPFIlgXNrI1X58icthAft25OAqC7rKvEZXZf4OscRkw', '2018-12-06 00:31:33', '2018-12-06 00:31:33'),
(11, 'Jessica', 'jessica@live.com', '$2y$10$D0IFyM.MaYv0ZrwYTjFMPe9UHyv4nFXpeFemrZwzUPEb6Pd2QcdIW', 'Gumeta', 'Hernandez', 2, NULL, 3, 13, 13, 10, 10, 11, 'mx5eZRzoCxeX1sBygQ0iBxUzLwbRu5fPsloVWRFhLgaZfO0nLRcMyp0m0Ec2', '2018-12-07 08:29:49', '2018-12-07 08:29:49'),
(12, 'Adrián', 'angelaguil16@gmail.com', '$2y$10$ZfiIwU2075hjCL/MwVQnnene91lzC7AQwjRzIk0rkekhlp1T/5m5S', 'Aguila', 'Serrano', 1, NULL, 1, 14, 14, 11, 11, 12, 'zIZx0ufFZAq9yzSRSkBTFSZkqPtoYc6hrUyhglpqZShR7jse6MpLnbjFGjWD', '2018-12-07 19:57:41', '2018-12-07 20:06:56'),
(13, 'Samuel', 'spartan72709@hotmail.com', '$2y$10$gyPRlffsQi3tZ7hjPwnKgeNTA.zV7yaierC4/fbgVk.znv4VCDxyG', 'Guzmán', 'García', 1, NULL, 1, 15, 15, 12, 12, 13, 'yAV4LgKwR38oknTb0YOev7ngIWgBvYf7cvm460OOZSaVwWtWwOin6ZCmSDgF', '2018-12-07 22:10:26', '2018-12-07 22:10:26'),
(14, 'Jesús Daniel', 'jdrm199855@gmail.com', '$2y$10$A3CGJWLQ4KpAyOZtGKm.te22TKVQHVPxIp/rzTa3P3aBZgQilGZNy', 'Rivera', 'Martínez', 1, NULL, 3, 16, 16, 13, 13, 14, 'B27YrFNSX3F9wZcATpbHWyLx7pif4D3yQ3t8ErWPi0ZM58oVgWsGgsRdzqKN', '2018-12-07 22:39:15', '2018-12-07 22:41:53'),
(15, 'Merari', 'mera97_02_25@hotmail.com', '$2y$10$fX.3ZugIvjdsHk8E.iQxFeWDKry7ERxG2cuZtKaFowizBTr7M4Usy', 'Ramírez', 'Luis', 2, NULL, 1, 17, 17, 14, 14, 15, NULL, '2018-12-07 22:55:00', '2018-12-07 22:55:00'),
(16, 'Jose María', 'jose_zc1415@hotmail.com', '$2y$10$xaX4sGTAXTBgJWsU1X4TUOPswSzWii1DhlmplP.50gT4F2SkWvUDe', 'Zárate', 'Zúñiga', 1, NULL, 1, 18, 18, 15, 15, 16, 'OJyXgo56V36nPZE8zoiXQT3Ia3avaiKVfWihA3OXdIFsH0vG4GircdkSSA1m', '2018-12-07 23:54:20', '2018-12-07 23:54:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `weights`
--

CREATE TABLE `weights` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `weights`
--

INSERT INTO `weights` (`id`, `user_id`, `weight`, `created_at`, `updated_at`) VALUES
(1, 3, 50, '2018-12-05 04:03:46', '2018-12-05 04:03:46'),
(2, 4, 45, '2018-12-05 23:32:47', '2018-12-05 23:32:47'),
(3, 12, 3, '2018-12-07 21:49:16', '2018-12-07 21:49:16'),
(4, 15, 64, '2018-12-07 23:20:07', '2018-12-07 23:20:07'),
(5, 16, 70, '2018-12-08 00:11:43', '2018-12-08 00:11:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `born_expedients`
--
ALTER TABLE `born_expedients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expedients`
--
ALTER TABLE `expedients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medical_datas`
--
ALTER TABLE `medical_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`user_id`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `personal_datas`
--
ALTER TABLE `personal_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recipe_descriptions`
--
ALTER TABLE `recipe_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `allergies`
--
ALTER TABLE `allergies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `born_expedients`
--
ALTER TABLE `born_expedients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `dates`
--
ALTER TABLE `dates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `expedients`
--
ALTER TABLE `expedients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `medical_datas`
--
ALTER TABLE `medical_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_datas`
--
ALTER TABLE `personal_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recipe_descriptions`
--
ALTER TABLE `recipe_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
