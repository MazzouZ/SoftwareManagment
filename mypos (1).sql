-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 31 juil. 2019 à 10:11
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mypos`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cause` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_Admin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `justification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `nbr_jour` decimal(10,0) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conges_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `user_id`, `cause`, `date_debut`, `date_fin`, `etat`, `etat_Admin`, `justification`, `created_at`, `nbr_jour`, `updated_at`) VALUES
(40, 2, 'Travel', '2019-07-20', '2019-07-31', 'Refusé par système', 'Accepter', NULL, '2019-07-19 11:36:00', '7', '2019-07-23 09:56:22'),
(37, 5, 'Travel', '2019-07-31', '2019-08-01', 'Congé accepter par système', 'Accepter', NULL, '2019-07-19 09:39:31', '1', '2019-07-19 10:24:00'),
(34, 2, 'Travel', '2019-08-13', '2019-08-18', 'Congé accepter par système', 'Accepter', NULL, '2019-07-19 08:43:33', '3', '2019-07-19 08:48:29'),
(36, 2, 'Maladie', '2019-07-31', '2019-08-03', 'Congé accepter par système', 'Accepter', 'justifications/zf3cr9GXLc6AByfotRowkwxXb3PLvexQhm2BLQ0V.png', '2019-07-19 08:56:33', '3', '2019-07-19 08:56:46');

-- --------------------------------------------------------

--
-- Structure de la table `docs_administratifs`
--

DROP TABLE IF EXISTS `docs_administratifs`;
CREATE TABLE IF NOT EXISTS `docs_administratifs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recue` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fichier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docs_administratifs_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `docs_administratifs`
--

INSERT INTO `docs_administratifs` (`id`, `titre`, `etat`, `date_recue`, `user_id`, `fichier`, `created_at`, `updated_at`) VALUES
(9, 'attestation de stage,attestation de salaire', 'Document reçue', '2019-07-25', 5, NULL, '2019-07-25 09:25:16', '2019-07-25 09:25:42'),
(6, 'attestation de travail,attestation de stage', 'Document reçue', '2019-07-25', 2, NULL, '2019-07-22 08:49:37', '2019-07-25 11:36:31'),
(8, 'attestation de travail,attestation de stage,attestation de pôle d\'emploi,attestation de salaire,accusé de réception de lettre de démission', 'Document reçue', '2019-07-25', 2, NULL, '2019-07-25 09:18:07', '2019-07-25 11:37:01'),
(7, 'attestation de travail,attestation de pôle d\'emploi', 'Document reçue', '2019-07-25', 2, NULL, '2019-07-22 11:27:26', '2019-07-25 09:23:13'),
(10, 'attestation de pôle d\'emploi', 'En attente', NULL, 10, NULL, '2019-07-25 09:27:09', '2019-07-25 09:27:09');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raison_sociale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idfisc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `logo`, `raison_sociale`, `tel`, `email`, `created_at`, `updated_at`, `adresse`, `zip_code`, `rc`, `patente`, `idfisc`) VALUES
(1, 'entreprise_logo/rhu7pSCASFo21BK3lM3wByZ6F2tFpouh0WvkkZm9.png', 'SOFTWARE', '+212 5 24 4 93 52', 'email@gmail.com', '2019-07-15 09:00:00', '2019-07-24 18:49:15', 'App 6 2eme étage M\'HITA espace AL moustapha Semlalia', '40000', '58467', '92110189', '0652837');

-- --------------------------------------------------------

--
-- Structure de la table `free_days`
--

DROP TABLE IF EXISTS `free_days`;
CREATE TABLE IF NOT EXISTS `free_days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` date DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `free_days`
--

INSERT INTO `free_days` (`id`, `day`, `description`, `created_at`, `updated_at`) VALUES
(1, '2019-01-01', 'Le 1er janvier est le premier jour de l\'année du calendrier grégorien.  ras al-am (راس العام)', '2019-07-16 09:24:38', '2019-07-16 09:29:39'),
(3, '2019-01-11', 'Le Manifeste du 11 janvier 1944 ou Manifeste de l\'Indépendance du Maroc est un acte grandement symbolique au Maroc.', '2019-07-16 09:32:45', '2019-07-16 09:32:45'),
(4, '2019-08-15', 'AID', '2019-07-19 08:42:34', '2019-07-19 08:42:34');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_09_122423_create_conge_table', 1),
(4, '2019_07_10_212732_add_column_photo_users', 1),
(5, '2019_07_11_085840_create_permission_tables', 2),
(6, '2019_07_12_103639_conge_nbr_j_collumn', 3),
(8, '2019_07_13_172921_add_column_conge_user_id', 4),
(9, '2019_07_14_123546_docs_administratif', 5),
(11, '2019_07_15_085303_docs_adminstratif_add_collumns_commentaire', 6),
(13, '2019_07_16_093134_create_table_free_days', 7),
(14, '2019_07_16_105117_create_entreprises', 8),
(16, '2019_07_17_110408_add_column_nbr_jour_rester', 9),
(17, '2019_07_18_103243_add_column_users', 10),
(18, '2019_07_18_115320_add_collumns_conges', 11),
(19, '2019_07_24_190710_add_collumns', 12),
(20, '2019_07_25_084332_add_collumns', 13),
(21, '2019_07_29_093453_create_table_pointage', 14);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(2, 'App\\User', 5),
(2, 'App\\User', 10),
(3, 'App\\User', 6);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'access_conge', 'web', '2019-07-11 09:27:22', '2019-07-11 09:27:22'),
(2, 'Demander_conge', 'web', '2019-07-11 09:27:22', '2019-07-11 09:27:22'),
(3, 'Modifier_conge', 'web', '2019-07-11 09:27:22', '2019-07-11 09:27:22'),
(4, 'Supprimer_conge', 'web', '2019-07-11 09:27:22', '2019-07-11 09:27:22'),
(5, 'access_user_mangement', 'web', '2019-07-11 09:47:43', '2019-07-11 09:47:43'),
(6, 'access_docs_administratifs', 'web', '2019-07-14 12:24:12', '2019-07-14 12:24:12'),
(7, 'Demander_docs_administratif', 'web', '2019-07-14 12:24:13', '2019-07-14 12:24:13'),
(8, 'Modifier_free_day', 'web', '2019-07-16 09:17:28', '2019-07-16 09:17:28'),
(9, 'Supprimer_free_day', 'web', '2019-07-16 09:17:28', '2019-07-16 09:17:28'),
(10, 'Ajouter_free_day', 'web', '2019-07-16 09:17:28', '2019-07-16 09:17:28');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-07-11 09:16:29', '2019-07-11 09:16:29'),
(2, 'Employee', 'web', '2019-07-11 09:16:29', '2019-07-11 09:16:29'),
(3, 'Guest', 'web', '2019-07-11 09:16:29', '2019-07-11 09:16:29');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `table_free_days`
--

DROP TABLE IF EXISTS `table_free_days`;
CREATE TABLE IF NOT EXISTS `table_free_days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `table_pointage`
--

DROP TABLE IF EXISTS `table_pointage`;
CREATE TABLE IF NOT EXISTS `table_pointage` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jour` date NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `total` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `table_pointage`
--

INSERT INTO `table_pointage` (`id`, `user_id`, `jour`, `time_in`, `time_out`, `total`, `created_at`, `updated_at`) VALUES
(142, 2, '2019-07-29', '17:03:15', '20:56:55', '03:53:40', '2019-07-30 14:50:06', '2019-07-30 14:50:06'),
(143, 2, '2019-07-29', '21:44:58', '00:55:41', '-20:49:17', '2019-07-30 14:50:06', '2019-07-30 14:50:06'),
(144, 2, '2019-07-30', '09:20:13', '12:51:17', '03:31:04', '2019-07-30 14:50:06', '2019-07-30 14:50:06'),
(145, 2, '2019-07-30', '12:55:39', NULL, NULL, '2019-07-30 14:50:06', '2019-07-30 14:50:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `nbr_jour_rester` int(11) NOT NULL DEFAULT '18',
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnss` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `hiring_date` date DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `professions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_salary` double(8,2) DEFAULT NULL,
  `gross_salary` double(8,2) DEFAULT NULL,
  `family_situation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbr_children` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `nbr_jour_rester`, `tel`, `updated_at`, `cin`, `cnss`, `polite`, `adress`, `exit_date`, `hiring_date`, `birth_date`, `order_number`, `professions`, `net_salary`, `gross_salary`, `family_situation`, `nbr_children`) VALUES
(2, 'Directeur', 'admin@admin.com', 'uploads/rmlmRKGIAKvGDIbDFWWeWwW9ww8uFsDny8tIDi4W.png', NULL, '$2y$10$ECjHDGvxOPFloo2GnVpWuO3V9/zpGZmjsbITVvM.9MZhDog2OXN1m', NULL, '2019-07-10 21:49:22', 5, '0623369724', '2019-07-25 11:35:55', 'P245848', '2000', 'M', 'new york city 2001', NULL, '2015-05-05', '1986-08-27', 309, 'Ingénieur d\'étude et de développement', 20000.00, 22000.00, 'cilibataire', 0),
(6, 'guest', 'employe2@employe.com', 'uploads/UZLgU3RmVllC2Iroe0hYRaMgD8MpdjN2BtqANRjU.png', NULL, '$2y$10$unKkshtp34XOikg.rr5AU..WnBFEXyC/vQi2KgobiT0u8irVzYkN6', NULL, '2019-07-11 11:18:03', 18, '0623369724', '2019-07-18 09:54:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Mohamed', 'employe@employe.com', 'uploads/qB1OEzSIlNCT825dYW56c7yVd37sybSwxxUvbN3E.png', NULL, '$2y$10$how1oUvk3YMcTx9qmucxU.aMQ/oTEPfXcvaetqVCYQ94upNoapYRu', NULL, '2019-07-11 11:16:12', 17, '0623369724', '2019-07-19 10:24:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Kabaj', 'employe3@employe.com', 'uploads/dvswzKCbcib7WVI8qXTFforiieyY5EacwC0EWGA9.jpeg', NULL, '$2y$10$bQ31VPM0i2orNfHIqxCDJeZ8zvXfH/ET2rXLbelBvPbPeunwkUd4e', NULL, '2019-07-18 09:50:07', 18, '623369724', '2019-07-18 09:54:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
