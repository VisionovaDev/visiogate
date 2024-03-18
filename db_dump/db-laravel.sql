/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `laravel`;

DROP TABLE IF EXISTS `aziende`;
CREATE TABLE IF NOT EXISTS `aziende` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `cap` varchar(255) DEFAULT NULL,
  `provincia` varchar(2) DEFAULT NULL,
  `nazione` varchar(255) DEFAULT NULL,
  `sito` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `privacy_it` varchar(255) DEFAULT NULL,
  `privacy_en` varchar(255) DEFAULT NULL,
  `privacy_de` varchar(255) DEFAULT NULL,
  `privacy_fr` varchar(255) DEFAULT NULL,
  `privacy_es` varchar(255) DEFAULT NULL,
  `logo_file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `aziende`;
/*!40000 ALTER TABLE `aziende` DISABLE KEYS */;
INSERT INTO `aziende` (`id`, `nome`, `indirizzo`, `citta`, `cap`, `provincia`, `nazione`, `sito`, `email`, `telefono`, `privacy_it`, `privacy_en`, `privacy_de`, `privacy_fr`, `privacy_es`, `logo_file_path`, `created_at`, `updated_at`) VALUES
	(1, 'Ragione sociale', 'via ....', 'Brescia', '25125', 'BS', 'Italia', 'https://www.nomedelsito.it', 'email@emaildaimpostare.ko', '0000000', NULL, NULL, NULL, NULL, NULL, '/storage/images/logo.png', '2024-03-18 16:17:45', '2024-03-18 16:17:45');
/*!40000 ALTER TABLE `aziende` ENABLE KEYS */;

DROP TABLE IF EXISTS `badges`;
CREATE TABLE IF NOT EXISTS `badges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prefisso` varchar(1) NOT NULL,
  `numero` int(11) NOT NULL,
  `sede_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `badges_sede_id_foreign` (`sede_id`),
  CONSTRAINT `badges_sede_id_foreign` FOREIGN KEY (`sede_id`) REFERENCES `sedi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `badges`;
/*!40000 ALTER TABLE `badges` DISABLE KEYS */;
INSERT INTO `badges` (`id`, `prefisso`, `numero`, `sede_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', 1, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(2, 'A', 2, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(3, 'A', 3, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(4, 'A', 4, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(5, 'A', 5, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(6, 'A', 6, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(7, 'A', 7, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(8, 'A', 8, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(9, 'A', 9, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(10, 'A', 10, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(11, 'A', 11, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(12, 'A', 12, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(13, 'A', 13, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(14, 'A', 14, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(15, 'A', 15, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(16, 'A', 16, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(17, 'A', 17, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(18, 'A', 18, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(19, 'A', 19, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(20, 'A', 20, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL);
/*!40000 ALTER TABLE `badges` ENABLE KEYS */;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `cache`;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `cache_locks`;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `jobs`;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `job_batches`;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(114, '0001_01_01_000000_create_users_table', 1),
	(115, '0001_01_01_000001_create_cache_table', 1),
	(116, '0001_01_01_000002_create_jobs_table', 1),
	(117, '2024_03_15_101731_create_permission_tables', 1),
	(118, '2024_03_15_103639_add_deleted_at_to_users_table', 1),
	(119, '2024_03_15_134105_create_aziende_table', 1),
	(120, '2024_03_15_144412_create_sedi_table', 1),
	(121, '2024_03_15_150913_create_varchi_table', 1),
	(122, '2024_03_18_131610_add_timezone_to_users_table', 1),
	(123, '2024_03_18_133035_create_badges_table', 1),
	(124, '2024_03_18_141252_add_unique_index_to_badges_table', 1),
	(125, '2024_03_18_150125_create_reparti_table', 1),
	(126, '2024_03_18_155803_create_persone_table', 1),
	(130, '2024_03_18_163920_create_modelli_registrazione_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

DROP TABLE IF EXISTS `modelli_registrazione`;
CREATE TABLE IF NOT EXISTS `modelli_registrazione` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `modelli_registrazione`;
/*!40000 ALTER TABLE `modelli_registrazione` DISABLE KEYS */;
INSERT INTO `modelli_registrazione` (`id`, `nome`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'default', '2024-03-18 16:53:29', '2024-03-18 16:53:29', NULL);
/*!40000 ALTER TABLE `modelli_registrazione` ENABLE KEYS */;

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `model_has_permissions`;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `model_has_roles`;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `password_reset_tokens`;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

DROP TABLE IF EXISTS `persone`;
CREATE TABLE IF NOT EXISTS `persone` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reparto_id` bigint(20) unsigned NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `interno` tinyint(1) NOT NULL DEFAULT 0,
  `telefono` varchar(255) DEFAULT NULL,
  `accetta_visite` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persone_reparto_id_foreign` (`reparto_id`),
  CONSTRAINT `persone_reparto_id_foreign` FOREIGN KEY (`reparto_id`) REFERENCES `reparti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `persone`;
/*!40000 ALTER TABLE `persone` DISABLE KEYS */;
/*!40000 ALTER TABLE `persone` ENABLE KEYS */;

DROP TABLE IF EXISTS `reparti`;
CREATE TABLE IF NOT EXISTS `reparti` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sedi_id` bigint(20) unsigned NOT NULL,
  `nome_it` varchar(255) NOT NULL,
  `nome_en` varchar(255) NOT NULL,
  `nome_de` varchar(255) NOT NULL,
  `nome_fr` varchar(255) NOT NULL,
  `nome_es` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reparti_sedi_id_foreign` (`sedi_id`),
  CONSTRAINT `reparti_sedi_id_foreign` FOREIGN KEY (`sedi_id`) REFERENCES `sedi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `reparti`;
/*!40000 ALTER TABLE `reparti` DISABLE KEYS */;
INSERT INTO `reparti` (`id`, `sedi_id`, `nome_it`, `nome_en`, `nome_de`, `nome_fr`, `nome_es`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Direzione', 'Management', 'Geschäftsleitung', 'Direction', 'Dirección', '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(2, 1, 'Ufficio commerciale', 'Commercial office', 'Handelsbüro', 'Bureau commercial', 'Oficina comercial', '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(3, 1, 'Produzione', 'Production', 'Produktion', 'Production', 'Producción', '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(4, 1, 'Ufficio tecnico', 'Technical Office', 'Technisches Büro', 'Bureau technique', 'Oficina técnica', '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL),
	(5, 1, 'Amministrazione', 'Administration', 'Verwaltung', 'Administration', 'Administración', '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL);
/*!40000 ALTER TABLE `reparti` ENABLE KEYS */;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `role_has_permissions`;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

DROP TABLE IF EXISTS `sedi`;
CREATE TABLE IF NOT EXISTS `sedi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `cap` varchar(255) DEFAULT NULL,
  `provincia` varchar(2) DEFAULT NULL,
  `nazione` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `msg_email_entrata_it` varchar(255) DEFAULT NULL,
  `msg_email_entrata_en` varchar(255) DEFAULT NULL,
  `msg_email_entrata_de` varchar(255) DEFAULT NULL,
  `msg_email_entrata_fr` varchar(255) DEFAULT NULL,
  `msg_email_entrata_es` varchar(255) DEFAULT NULL,
  `msg_email_uscita_it` varchar(255) DEFAULT NULL,
  `msg_email_uscita_en` varchar(255) DEFAULT NULL,
  `msg_email_uscita_de` varchar(255) DEFAULT NULL,
  `msg_email_uscita_fr` varchar(255) DEFAULT NULL,
  `msg_email_uscita_es` varchar(255) DEFAULT NULL,
  `regolamento_it` varchar(255) DEFAULT NULL,
  `regolamento_en` varchar(255) DEFAULT NULL,
  `regolamento_de` varchar(255) DEFAULT NULL,
  `regolamento_fr` varchar(255) DEFAULT NULL,
  `regolamento_es` varchar(255) DEFAULT NULL,
  `is_email_entrata_abilitata` tinyint(1) NOT NULL DEFAULT 0,
  `is_email_entrata_uscita` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `sedi`;
/*!40000 ALTER TABLE `sedi` DISABLE KEYS */;
INSERT INTO `sedi` (`id`, `nome`, `indirizzo`, `citta`, `cap`, `provincia`, `nazione`, `telefono`, `msg_email_entrata_it`, `msg_email_entrata_en`, `msg_email_entrata_de`, `msg_email_entrata_fr`, `msg_email_entrata_es`, `msg_email_uscita_it`, `msg_email_uscita_en`, `msg_email_uscita_de`, `msg_email_uscita_fr`, `msg_email_uscita_es`, `regolamento_it`, `regolamento_en`, `regolamento_de`, `regolamento_fr`, `regolamento_es`, `is_email_entrata_abilitata`, `is_email_entrata_uscita`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sede unica', 'via ....', 'Brescia', '25125', 'BS', 'Italia', '0000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL);
/*!40000 ALTER TABLE `sedi` ENABLE KEYS */;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `sessions`;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT 'Europe/Rome',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `timezone`) VALUES
	(1, 'Admin', 'webmaster@visionova.it', NULL, '$2y$12$RNugtz8yfXv3LiMEy.rV4u1AccqnyOVlCFg7H2W2V74NyxzKDYyRa', NULL, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL, 'Europe/Rome');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

DROP TABLE IF EXISTS `varchi`;
CREATE TABLE IF NOT EXISTS `varchi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sedi_id` bigint(20) unsigned NOT NULL,
  `nome` varchar(255) NOT NULL,
  `is_ingresso` tinyint(1) NOT NULL DEFAULT 1,
  `is_uscita` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `varchi_sedi_id_foreign` (`sedi_id`),
  CONSTRAINT `varchi_sedi_id_foreign` FOREIGN KEY (`sedi_id`) REFERENCES `sedi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `varchi`;
/*!40000 ALTER TABLE `varchi` DISABLE KEYS */;
INSERT INTO `varchi` (`id`, `sedi_id`, `nome`, `is_ingresso`, `is_uscita`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'Ingresso principale', 1, 1, '2024-03-18 16:17:45', '2024-03-18 16:17:45', NULL);
/*!40000 ALTER TABLE `varchi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
