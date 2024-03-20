-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para scada2
DROP DATABASE IF EXISTS `scada2`;
CREATE DATABASE IF NOT EXISTS `scada2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `scada2`;

-- Volcando estructura para tabla scada2.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla scada2.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.migrations: ~12 rows (aproximadamente)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2013_01_01_000001_create_localidad_table', 1),
	(2, '2013_01_01_000002_create_municipio_table', 1),
	(3, '2013_01_01_000003_create_marca_placa_table', 1),
	(4, '2013_01_01_000003_create_tipo_placa_table', 1),
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(7, '2014_10_12_100000_create_password_resets_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2023_11_10_120809_create_permission_tables', 1),
	(11, '2023_12_10_122956_create_estacion_table', 1),
	(12, '2023_12_12_122956_create_placa_table', 1);

-- Volcando estructura para tabla scada2.model_has_permissions
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla scada2.model_has_roles
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.model_has_roles: ~2 rows (aproximadamente)
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2);

-- Volcando estructura para tabla scada2.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla scada2.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla scada2.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.permissions: ~100 rows (aproximadamente)
REPLACE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Ing. Josefina Benavídez', 'web', '2024-01-02 11:02:33', '2024-01-02 11:02:33'),
	(2, 'Gabriela Benavídez', 'web', '2024-01-02 11:02:33', '2024-01-02 11:02:33'),
	(3, 'Lucía Casas', 'web', '2024-01-02 11:02:33', '2024-01-02 11:02:33'),
	(4, 'Vicente Ruelas', 'web', '2024-01-02 11:02:33', '2024-01-02 11:02:33'),
	(5, 'Kevin Gaytán Tercero', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(6, 'Nadia Navarro', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(7, 'Adriana Enríquez', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(8, 'Valery Atencio Segundo', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(9, 'Violeta Guerrero', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(10, 'Ana Paula Granado Segundo', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(11, 'Luna Olivo', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(12, 'Sara Sofía Rascón', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(13, 'Victoria Márquez', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(14, 'Dr. Gabriel Henríquez Hijo', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(15, 'Emilio Vásquez', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(16, 'Alex Mena', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(17, 'Ana Sofía Rosales', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(18, 'Jacobo Mascareñas', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(19, 'Franco Sanabria', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(20, 'Ignacio Zamora', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(21, 'Lic. Juan Sebastián Leiva', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(22, 'Emiliano Aguirre', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(23, 'Sr. José Jasso Tercero', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(24, 'Dr. Rafaela Arredondo Hijo', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(25, 'Luna Arroyo', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(26, 'Daniela Ybarra', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(27, 'Sra. Fabiana Reynoso Tercero', 'web', '2024-01-02 11:02:34', '2024-01-02 11:02:34'),
	(28, 'Andrés Flores', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(29, 'Josefa Rivero Tercero', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(30, 'Emilia Haro', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(31, 'Elizabeth Villalobos Hijo', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(32, 'Jazmín Quiñones', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(33, 'Amanda Leiva', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(34, 'Malena Nevárez', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(35, 'Natalia Posada', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(36, 'Manuel Sanches', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(37, 'Santino Flores', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(38, 'Camilo Rojas', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(39, 'Ignacio Mesa', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(40, 'Josefa Godoy', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(41, 'Dn. Manuel Benavídez', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(42, 'Ing. Isabel Olmos Segundo', 'web', '2024-01-02 11:02:35', '2024-01-02 11:02:35'),
	(43, 'Nadia Valadez', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(44, 'Dr. Cristóbal Tejeda', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(45, 'Martina Molina Tercero', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(46, 'Francisco Rojo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(47, 'Dr. Elías Mercado Hijo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(48, 'Sr. Javier Sánchez', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(49, 'Lic. Emiliano Lugo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(50, 'Dn. Eduardo Rivas', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(51, 'Ornela Uribe Segundo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(52, 'Alexander Lomeli Hijo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(53, 'José Leiva', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(54, 'Javier Gallegos', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(55, 'Juan José Sarabia Hijo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(56, 'Sebastián Véliz', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(57, 'Pedro Garay', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(58, 'Dr. Gael Gracia Segundo', 'web', '2024-01-02 11:02:36', '2024-01-02 11:02:36'),
	(59, 'Lic. Luna Rodrígez Segundo', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(60, 'Sra. Nadia Manzanares Tercero', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(61, 'Dante Saldaña Hijo', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(62, 'Ivanna Salazar', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(63, 'Sr. Thiago Yáñez Hijo', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(64, 'Luciano Morales', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(65, 'Lucas Fierro', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(66, 'Abril Carrera', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(67, 'Ing. Diego Leiva', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(68, 'Luna Salas', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(69, 'Olivia Vélez', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(70, 'Ing. Abril Lerma', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(71, 'Carlos Corral', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(72, 'Bianca Ocampo', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(73, 'Srita. Valery Rocha', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(74, 'Gael Camarillo', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(75, 'Sra. Lola Pacheco', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(76, 'Felipe Venegas', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(77, 'Aitana Zamudio', 'web', '2024-01-02 11:02:37', '2024-01-02 11:02:37'),
	(78, 'Simón Solorzano', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(79, 'Alonso Pizarro', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(80, 'Lic. Julián Quintanilla Hijo', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(81, 'Dn. Mateo Bustamante', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(82, 'Juan Sebastián Palomino', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(83, 'Agustina Zambrano', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(84, 'Alan Hernádez', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(85, 'Juliana Vallejo', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(86, 'Javier Valdivia Hijo', 'web', '2024-01-02 11:02:38', '2024-01-02 11:02:38'),
	(87, 'Francisco Carmona', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(88, 'Ing. Fernando Puga Hijo', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(89, 'Dr. María José Cordero Segundo', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(90, 'Ing. Lola Henríquez', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(91, 'Isabella Echevarría', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(92, 'Josefina Almonte', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(93, 'Srita. Alexa García', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(94, 'Srita. Emma Cotto Segundo', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(95, 'Dr. Sebastián Nevárez Segundo', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(96, 'Tomas Serrano', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(97, 'Ana Badillo', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(98, 'Matthew Maestas', 'web', '2024-01-02 11:02:39', '2024-01-02 11:02:39'),
	(99, 'Leonardo Nieto', 'web', '2024-01-02 11:02:40', '2024-01-02 11:02:40'),
	(100, 'Franco Gutiérrez', 'web', '2024-01-02 11:02:40', '2024-01-02 11:02:40');

-- Volcando estructura para tabla scada2.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla scada2.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.roles: ~3 rows (aproximadamente)
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'web', '2024-01-02 11:02:30', '2024-01-02 11:02:30'),
	(2, 'Ejecutor', 'web', '2024-01-02 11:02:30', '2024-01-02 11:02:30'),
	(3, 'Monitorista', 'web', '2024-01-02 11:02:30', '2024-01-02 11:02:30');

-- Volcando estructura para tabla scada2.role_has_permissions
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.role_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla scada2.tbl_analogicos
DROP TABLE IF EXISTS `tbl_analogicos`;
CREATE TABLE IF NOT EXISTS `tbl_analogicos` (
  `f_idanalogico` int NOT NULL AUTO_INCREMENT,
  `f_idplaca` int DEFAULT NULL,
  `f_var` char(3) NOT NULL,
  `f_factor` decimal(8,2) DEFAULT NULL,
  `f_rango_inferior` int DEFAULT NULL,
  `f_rango_superior` int DEFAULT NULL,
  `f_habilitado` bit(1) DEFAULT b'1',
  `f_fecha_ultima_calibracion` date DEFAULT NULL,
  PRIMARY KEY (`f_idanalogico`),
  KEY `FK1_f_idplaca` (`f_idplaca`),
  CONSTRAINT `FK1_f_idplaca` FOREIGN KEY (`f_idplaca`) REFERENCES `tbl_placas` (`f_idplaca`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla scada2.tbl_analogicos: ~52 rows (aproximadamente)
REPLACE INTO `tbl_analogicos` (`f_idanalogico`, `f_idplaca`, `f_var`, `f_factor`, `f_rango_inferior`, `f_rango_superior`, `f_habilitado`, `f_fecha_ultima_calibracion`) VALUES
	(1, 1, 'EA1', 30.00, NULL, NULL, b'1', NULL),
	(2, 1, 'EA2', 30.00, NULL, NULL, b'1', NULL),
	(3, 1, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(4, 2, 'EA1', 10.00, NULL, NULL, b'1', NULL),
	(5, 2, 'EA2', 10.00, NULL, NULL, b'1', NULL),
	(6, 2, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(7, 3, 'EA1', 10.00, NULL, NULL, b'1', NULL),
	(8, 3, 'EA2', 10.00, NULL, NULL, b'1', NULL),
	(9, 3, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(10, 4, 'EA1', 19.00, NULL, NULL, b'1', NULL),
	(11, 4, 'EA2', 19.00, NULL, NULL, b'1', NULL),
	(12, 4, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(13, 5, 'EA1', 29.00, NULL, NULL, b'1', '2019-05-30'),
	(14, 5, 'EA2', 29.00, NULL, NULL, b'1', '2019-05-30'),
	(15, 5, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(16, 6, 'EA1', 10.00, NULL, NULL, b'1', NULL),
	(17, 6, 'EA2', 10.00, NULL, NULL, b'1', NULL),
	(18, 6, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(19, 7, 'EA1', 200.00, NULL, NULL, b'1', NULL),
	(20, 7, 'EA2', 200.00, NULL, NULL, b'1', NULL),
	(21, 7, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(22, 8, 'EA1', 100.00, NULL, NULL, b'1', NULL),
	(23, 8, 'EA2', 100.00, NULL, NULL, b'1', NULL),
	(24, 8, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(25, 9, 'EA1', 100.00, NULL, NULL, b'1', NULL),
	(26, 9, 'EA2', 100.00, NULL, NULL, b'1', NULL),
	(27, 9, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(28, 10, 'EA1', 29.00, NULL, NULL, b'1', '2019-05-30'),
	(29, 10, 'EA2', 29.00, NULL, NULL, b'1', '2019-05-30'),
	(30, 10, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(31, 11, 'EA1', 10.00, NULL, NULL, b'1', NULL),
	(32, 11, 'EA2', 10.00, NULL, NULL, b'1', NULL),
	(33, 11, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(34, 12, 'EA1', 200.00, NULL, NULL, b'1', NULL),
	(35, 12, 'EA2', 200.00, NULL, NULL, b'1', NULL),
	(36, 12, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(37, 13, 'EA1', 200.00, NULL, NULL, b'1', NULL),
	(38, 13, 'EA2', 200.00, NULL, NULL, b'1', NULL),
	(39, 13, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(40, 14, 'EA1', 30.00, NULL, NULL, b'1', NULL),
	(41, 14, 'EA2', NULL, NULL, NULL, b'0', NULL),
	(42, 14, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(43, 15, 'EA1', 30.00, NULL, NULL, b'1', NULL),
	(44, 15, 'EA2', 30.00, NULL, NULL, b'1', NULL),
	(45, 15, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(46, 16, 'EA1', 30.00, NULL, NULL, b'1', NULL),
	(47, 16, 'EA2', 30.00, NULL, NULL, b'1', NULL),
	(48, 16, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(49, 17, 'EA1', 30.00, NULL, NULL, b'0', NULL),
	(50, 17, 'EA2', 30.00, NULL, NULL, b'0', NULL),
	(51, 17, 'EA3', 0.33, NULL, NULL, b'1', NULL),
	(52, 18, 'EA1', 30.00, NULL, NULL, b'0', NULL);

-- Volcando estructura para tabla scada2.tbl_datalogger_electrotas
DROP TABLE IF EXISTS `tbl_datalogger_electrotas`;
CREATE TABLE IF NOT EXISTS `tbl_datalogger_electrotas` (
  `f_idregistro` int unsigned NOT NULL AUTO_INCREMENT,
  `f_idplaca` int NOT NULL DEFAULT (0),
  `f_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `f_ED1` bit(1) DEFAULT NULL,
  `f_ED2` bit(1) DEFAULT NULL,
  `f_ED3` bit(1) DEFAULT NULL,
  `f_ED4` bit(1) DEFAULT NULL,
  `f_ED5` bit(1) DEFAULT NULL,
  `f_ED6` bit(1) DEFAULT NULL,
  `f_ED7` bit(1) DEFAULT NULL,
  `f_ED8` bit(1) DEFAULT NULL,
  `f_EA1` smallint unsigned DEFAULT NULL,
  `f_EA2` smallint unsigned DEFAULT NULL,
  `f_EA3` smallint unsigned DEFAULT NULL,
  `f_SR1` bit(1) DEFAULT NULL,
  `f_SR2` bit(1) DEFAULT NULL,
  `f_SR3` bit(1) DEFAULT NULL,
  `f_SR4` bit(1) DEFAULT NULL,
  `f_SR5` bit(1) DEFAULT NULL,
  `f_SR6` bit(1) DEFAULT NULL,
  `f_SR7` bit(1) DEFAULT NULL,
  `f_SR8` bit(1) DEFAULT NULL,
  PRIMARY KEY (`f_idregistro`) USING BTREE,
  KEY `FK1_idplaca` (`f_idplaca`),
  CONSTRAINT `FK1_idplaca` FOREIGN KEY (`f_idplaca`) REFERENCES `tbl_placas` (`f_idplaca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla scada2.tbl_datalogger_electrotas: ~18 rows (aproximadamente)
REPLACE INTO `tbl_datalogger_electrotas` (`f_idregistro`, `f_idplaca`, `f_fecha`, `f_ED1`, `f_ED2`, `f_ED3`, `f_ED4`, `f_ED5`, `f_ED6`, `f_ED7`, `f_ED8`, `f_EA1`, `f_EA2`, `f_EA3`, `f_SR1`, `f_SR2`, `f_SR3`, `f_SR4`, `f_SR5`, `f_SR6`, `f_SR7`, `f_SR8`) VALUES
	(2, 8, '2024-03-15 15:49:25', b'1', b'1', b'1', b'0', b'1', b'1', b'0', b'0', 0, 197, 97, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(3, 10, '2024-03-15 15:49:25', b'1', b'1', b'1', b'1', b'1', b'0', b'0', b'0', 963, 747, 111, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1'),
	(4, 17, '2024-03-15 15:49:27', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 94, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(5, 7, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 1, 107, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(6, 6, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 104, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(7, 16, '2024-03-15 15:49:20', b'1', b'1', b'1', b'1', b'1', b'0', b'0', b'0', 110, 104, 97, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(8, 14, '2024-03-15 15:49:25', b'1', b'1', b'0', b'0', b'0', b'0', b'0', b'1', 0, 525, 100, b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(9, 11, '2024-03-15 15:49:25', b'1', b'1', b'0', b'1', b'0', b'0', b'0', b'0', 343, 0, 106, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(10, 13, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 96, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(11, 12, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 120, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(12, 4, '2024-03-15 15:49:25', b'1', b'0', b'0', b'1', b'1', b'0', b'0', b'0', 193, 171, 100, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(13, 3, '2024-03-15 15:49:25', b'1', b'1', b'1', b'1', b'1', b'0', b'0', b'0', 282, 326, 90, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(14, 15, '2024-03-15 15:49:12', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 1, 1, 96, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(15, 18, '2024-03-15 15:49:25', b'0', b'0', b'0', b'1', b'0', b'0', b'0', b'0', 0, 0, 0, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(16, 2, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 87, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(17, 1, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 85, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(18, 5, '2024-03-15 15:49:25', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 97, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
	(19, 9, '2024-03-15 15:29:14', b'1', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 92, b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'1');

-- Volcando estructura para tabla scada2.tbl_estaciones
DROP TABLE IF EXISTS `tbl_estaciones`;
CREATE TABLE IF NOT EXISTS `tbl_estaciones` (
  `f_idestacion` int NOT NULL AUTO_INCREMENT,
  `f_codestacion` char(15) NOT NULL,
  `f_nombre` varchar(255) DEFAULT NULL,
  `f_direccion` varchar(200) DEFAULT NULL,
  `f_situacion` tinytext,
  `f_lat` decimal(8,6) DEFAULT NULL,
  `f_lng` decimal(8,6) DEFAULT NULL,
  `f_foto` varchar(255) DEFAULT NULL,
  `f_es_bombeo` bit(1) DEFAULT NULL,
  `f_es_cloacal` bit(1) DEFAULT NULL,
  `f_es_defensa` bit(1) DEFAULT NULL,
  `f_habilitada` bit(1) DEFAULT NULL,
  `f_idmunicipio` int unsigned DEFAULT NULL,
  PRIMARY KEY (`f_idestacion`) USING BTREE,
  KEY `FK1_Munipio` (`f_idmunicipio`) USING BTREE,
  CONSTRAINT `FK1_Munipio` FOREIGN KEY (`f_idmunicipio`) REFERENCES `tbl_municipios` (`f_idmunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla scada2.tbl_estaciones: ~18 rows (aproximadamente)
REPLACE INTO `tbl_estaciones` (`f_idestacion`, `f_codestacion`, `f_nombre`, `f_direccion`, `f_situacion`, `f_lat`, `f_lng`, `f_foto`, `f_es_bombeo`, `f_es_cloacal`, `f_es_defensa`, `f_habilitada`, `f_idmunicipio`) VALUES
	(1, 'EST188VIVIENDA', '188 Viviendas', 'Gustavo Cerati por Crisólogo Larralde', '', -31.779019, -60.515713, '418713001709586516.jpg', b'1', b'0', b'0', b'1', 1),
	(2, 'EST300VIVIENDAS', '300 Viviendas', 'Don Bosco y Gdor Maya', '', -31.744826, -60.455839, NULL, NULL, NULL, NULL, b'1', 1),
	(3, 'EST33ORIENTALES', '33 Orientales', 'Montevideo y Diamante', 'Fuera de servicio por reparaciones en impulsión.', -31.734028, -60.540420, NULL, NULL, NULL, NULL, b'1', 1),
	(4, 'ESTAMBROSETTI', 'Ambrosetti', 'Ambrosetti y 3 de Febrero', 'Corregir ciclos de marchas de bombas (reemplazar válvula de retención).', -31.721349, -60.508544, NULL, NULL, NULL, NULL, b'1', 1),
	(5, 'ESTANACLETOMEDI', 'Anacleto Medina', 'Costanera Oeste y San Antonio María Gianelli', '', -31.742595, -60.557639, NULL, NULL, NULL, NULL, b'1', 1),
	(6, 'ESTASSVER', 'A.S.S.V.E.R.', 'Av. Jorge Newbery por zona Arroyo Antoñico', '', -31.773495, -60.511377, NULL, NULL, NULL, NULL, b'1', 1),
	(7, 'ESTBAJADAGRANDE', 'Bajada Grande', 'Av. Larramendi y Av. José Manuel Estrada', 'Sin telemetría de niveles cuando se corta suministro energético.', -31.709156, -60.571805, NULL, NULL, NULL, NULL, b'1', 1),
	(8, 'ESTBELGRANO', 'Belgrano', 'Zona Pronunciamiento / Gral. Espejo', '', -31.749022, -60.530324, NULL, NULL, NULL, NULL, b'1', 1),
	(9, 'ESTBRAVARD', 'Thompson Bravard', 'Por calle Bravard frente al Camping Thompson', '', -31.716750, -60.506361, NULL, NULL, NULL, NULL, b'1', 1),
	(10, 'ESTCIRCUNVALACI', 'Circunvalación', 'Colectora de Circunvalación por zona Almafuerte', '', -31.756550, -60.479408, NULL, NULL, NULL, NULL, b'1', 1),
	(11, 'ESTCOLECTORSURE', 'Colector Sureste', 'Pedro Martinez entre Tibiletti y Miguel David', NULL, -31.772384, -60.471371, NULL, NULL, NULL, NULL, b'1', 1),
	(12, 'ESTELBRETE', 'El Brete', 'Ayacucho y Esteban Echeverría', '', -31.715000, -60.499888, NULL, NULL, NULL, NULL, b'1', 1),
	(13, 'ESTGOLF', 'Golf', 'Av. Rondeau entre Darwin y Echeverría', '', -31.718776, -60.495093, NULL, NULL, NULL, NULL, b'1', 1),
	(14, 'ESTLIBERTAD', 'Libertad', 'Los Arrayanes y Los Hornos', '', -31.736993, -60.539782, NULL, NULL, NULL, NULL, b'1', 1),
	(15, 'ESTPARADORES', 'Thompson Paradores', 'Camping Thompson zona de parrillas', '', -31.716251, -60.507248, NULL, NULL, NULL, NULL, b'1', 1),
	(16, 'ESTPUERTOVIEJO', 'Puerto Viejo', 'Av. José Manuel Estrada y Anacleto Medina', 'Sin marcha simultánea de bombas x limitación energética.', -31.715809, -60.540739, NULL, NULL, NULL, NULL, b'1', 1),
	(17, 'ESTTOMANUEVA', 'Toma Nueva', 'Zona calle Rondeau y La Raya', 'Sin marcha simultánea de bombas x limitación energética.', -31.706993, -60.493182, NULL, NULL, NULL, NULL, b'1', 1),
	(24, 'CODESTTESTING', 'Testing', 'Calle 1853 Nro 3981', 'Situacion de diez', NULL, NULL, NULL, b'0', b'0', b'0', b'1', 1);

-- Volcando estructura para tabla scada2.tbl_municipios
DROP TABLE IF EXISTS `tbl_municipios`;
CREATE TABLE IF NOT EXISTS `tbl_municipios` (
  `f_idmunicipio` int unsigned NOT NULL AUTO_INCREMENT,
  `f_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_contacto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`f_idmunicipio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.tbl_municipios: ~3 rows (aproximadamente)
REPLACE INTO `tbl_municipios` (`f_idmunicipio`, `f_nombre`, `f_contacto`) VALUES
	(1, 'PARANA', 'Juan Carlos Garcia'),
	(2, 'LA PAZ', 'Mariana Lopez'),
	(5, 'VICTORIA', NULL);

-- Volcando estructura para tabla scada2.tbl_placas
DROP TABLE IF EXISTS `tbl_placas`;
CREATE TABLE IF NOT EXISTS `tbl_placas` (
  `f_idplaca` int NOT NULL AUTO_INCREMENT,
  `f_nombre` varchar(100) NOT NULL,
  `f_detalle` tinytext,
  `f_ip` varchar(100) NOT NULL,
  `f_orden` int DEFAULT NULL,
  `f_idtipoplaca` int unsigned DEFAULT NULL,
  `f_fecha_montaje` date DEFAULT NULL,
  `f_fecha_baja` date DEFAULT NULL,
  `f_habilitada` bit(1) DEFAULT NULL,
  `f_idestacion` int DEFAULT NULL,
  PRIMARY KEY (`f_idplaca`) USING BTREE,
  KEY `FK2_TipoPlaca` (`f_idtipoplaca`) USING BTREE,
  KEY `FK1_CodEstacion` (`f_idestacion`) USING BTREE,
  CONSTRAINT `FK2_EstacionId` FOREIGN KEY (`f_idestacion`) REFERENCES `tbl_estaciones` (`f_idestacion`),
  CONSTRAINT `FK2_TipoPlaca` FOREIGN KEY (`f_idtipoplaca`) REFERENCES `tbl_tipo_placa` (`f_idtipoplaca`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla scada2.tbl_placas: ~18 rows (aproximadamente)
REPLACE INTO `tbl_placas` (`f_idplaca`, `f_nombre`, `f_detalle`, `f_ip`, `f_orden`, `f_idtipoplaca`, `f_fecha_montaje`, `f_fecha_baja`, `f_habilitada`, `f_idestacion`) VALUES
	(1, 'Thompson Bravard', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.4', 1, 1, NULL, NULL, b'1', 9),
	(2, 'Thompson Paradores', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.9', 1, 1, NULL, NULL, b'1', 15),
	(3, 'Ambrosetti', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.69', 1, 1, NULL, NULL, b'1', 4),
	(4, '188 Viviendas', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.166', 1, 1, NULL, NULL, b'1', 1),
	(5, 'El Brete', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.22.70', 1, 1, NULL, NULL, b'1', 12),
	(6, 'A.S.S.V.E.R.', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.228', 1, 1, NULL, NULL, b'1', 6),
	(7, 'Puerto Viejo', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.212', 1, 1, NULL, NULL, b'1', 16),
	(8, 'Bajada Grande', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.251', 1, 1, NULL, NULL, b'1', 7),
	(9, 'Circunvalación', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.24.67', 1, 1, NULL, NULL, b'1', 10),
	(10, 'Golf', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.24.135', 1, 1, NULL, NULL, b'1', 13),
	(11, 'Libertad', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.22.189', 1, 1, NULL, NULL, b'1', 14),
	(12, 'Anacleto Medina', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.25.12', 1, 1, NULL, NULL, b'1', 5),
	(13, 'Toma Nueva', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.23.202', 1, 1, NULL, NULL, b'1', 17),
	(14, '33 Orientales', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.22.206', 1, 1, NULL, NULL, b'1', 3),
	(15, 'Belgrano', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.24.24', 1, 1, NULL, NULL, b'1', 8),
	(16, '300 Viviendas', 'ED1: Nivel 1 / ED2: Nivel 2 / ED3: Nivel 3 / ED4: Marcha bomba 1 / ED5: Marcha bomba 2 / ED6: Falla bomba 1 / ED7: Falla bomba 2 / ED8: Falla tablero / EA1: Corriente bomba 1 / EA2: Corriente bomba 2 / EA3: Temperatura tablero / SR1: Corte general tablero', '10.11.27.2', 1, 1, NULL, NULL, b'1', 2),
	(17, 'Colector Sureste', NULL, '10.11.25.29', 1, 1, NULL, NULL, b'1', 11),
	(18, 'Colector Sureste', NULL, '10.11.25.30', 2, 1, NULL, NULL, b'1', 11);

-- Volcando estructura para tabla scada2.tbl_setting
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `f_idsetting` int NOT NULL AUTO_INCREMENT,
  `f_detenerlecturas` bit(1) DEFAULT NULL,
  `f_placasaleer` int DEFAULT NULL,
  `f_reintentos` int DEFAULT NULL,
  `f_iteracciones` int DEFAULT NULL,
  PRIMARY KEY (`f_idsetting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla scada2.tbl_setting: ~0 rows (aproximadamente)
REPLACE INTO `tbl_setting` (`f_idsetting`, `f_detenerlecturas`, `f_placasaleer`, `f_reintentos`, `f_iteracciones`) VALUES
	(1, b'1', 0, 5, 0);

-- Volcando estructura para tabla scada2.tbl_tipo_placa
DROP TABLE IF EXISTS `tbl_tipo_placa`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_placa` (
  `f_idtipoplaca` int unsigned NOT NULL AUTO_INCREMENT,
  `f_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_modelo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`f_idtipoplaca`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.tbl_tipo_placa: ~2 rows (aproximadamente)
REPLACE INTO `tbl_tipo_placa` (`f_idtipoplaca`, `f_nombre`, `f_modelo`) VALUES
	(1, 'ELECTROTAS', 'ETHER 8R8I3A'),
	(2, 'PLC', 'PLC TESTING');

-- Volcando estructura para tabla scada2.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio_id` int unsigned DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK1_Municipio` (`municipio_id`),
  CONSTRAINT `FK1_Municipio` FOREIGN KEY (`municipio_id`) REFERENCES `tbl_municipios` (`f_idmunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla scada2.users: ~2 rows (aproximadamente)
REPLACE INTO `users` (`id`, `username`, `nombre`, `apellido`, `email`, `email_verified_at`, `password`, `municipio_id`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'Sr', 'administrador', 'administrador@gmail.com', NULL, '$2y$12$YhnKj2i5bC0UM1sCFY1cb.1teC7lnUF9/OXtiWVKQwdi0cMr2ZmdW', NULL, '2024-03-15 08:15:38', NULL, '2024-01-02 11:02:29', '2024-03-15 11:15:38'),
	(2, 'Ejecutor', 'Sr', 'ejecutor', 'ejecutor@gmail.com', NULL, '$2y$12$agYv9lF4ybeXXkI2iYz6MupbDCIZWORn10rRYmdhCydt0tmm2q2Cq', 1, '2024-03-06 17:31:55', NULL, '2024-01-02 11:02:31', '2024-01-02 11:02:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
