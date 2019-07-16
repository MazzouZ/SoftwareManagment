-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 16 juil. 2019 à 12:46
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
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `justification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `nbr_jour` decimal(10,0) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conges_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `user_id`, `date_debut`, `date_fin`, `etat`, `justification`, `created_at`, `nbr_jour`, `updated_at`) VALUES
(20, 2, '2019-08-01', '2019-08-02', 'Refusé', 'justifications/Yc9RPxgwfNB0ISsPzzQBAJirOGKxB05C7adP99zH.png', '2019-07-13 18:21:00', '1', '2019-07-13 18:21:05'),
(19, 5, '2019-07-25', '2019-07-26', 'Congé accepter', 'justifications/E0O4ZtVC1inwlaY2ojIZGPM7mhaTiwcphQTA4hDc.png', '2019-07-13 17:07:16', '1', '2019-07-16 10:42:03'),
(18, 2, '2019-07-18', '2019-07-25', 'Congé accepter', 'justifications/m6ASqEk3MUEqFeRSyQUdcBfrAEmwh5aD9zqGrbKR.png', '2019-07-13 16:54:48', '7', '2019-07-13 18:16:42'),
(21, 2, '2019-07-22', '2019-07-24', 'En cours de Vérification', 'justifications/4vVoMMEGJzHzraTUfcl5JkQE0aTFLsneCJ8e68Rt.png', '2019-07-15 11:07:07', '2', '2019-07-15 11:07:07');

-- --------------------------------------------------------

--
-- Structure de la table `docs_administratifs`
--

DROP TABLE IF EXISTS `docs_administratifs`;
CREATE TABLE IF NOT EXISTS `docs_administratifs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_recue` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fichier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docs_administratifs_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `docs_administratifs`
--

INSERT INTO `docs_administratifs` (`id`, `titre`, `etat`, `date_recue`, `user_id`, `fichier`, `created_at`, `updated_at`) VALUES
(2, 'Resultat', 'Document n\'existe pas', '2019-07-15', 2, 'docs_administratifs/sbHNgfBFx1niUhiR0ckp2tZRGL6y5lvimn1tJU7d.png', '2019-07-15 08:10:10', '2019-07-15 10:34:52'),
(3, 'TEST', 'Document reçue', '2019-07-15', 5, 'docs_administratifs/1L8rY2ABcpCkYOTbdaX3tdjpoRbEipLGo6Ie5818.png', '2019-07-15 09:14:14', '2019-07-15 09:29:58'),
(4, 'test', 'En attente', NULL, 2, NULL, '2019-07-15 10:35:11', '2019-07-15 10:35:11');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `logo`, `raison_sociale`, `tel`, `email`, `created_at`, `updated_at`) VALUES
(1, 'entreprise_logo/aVo5kFG2XYxYTdgxCydrjofwgmuyCgON2f4yNNYI.png', 'SOFTWARE', '05XXXXXX', 'email@gmail.com', NULL, '2019-07-16 10:36:28');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `free_days`
--

INSERT INTO `free_days` (`id`, `day`, `description`, `created_at`, `updated_at`) VALUES
(1, '2019-01-01', 'Le 1er janvier est le premier jour de l\'année du calendrier grégorien.  ras al-am (راس العام)', '2019-07-16 09:24:38', '2019-07-16 09:29:39'),
(3, '2019-01-11', 'Le Manifeste du 11 janvier 1944 ou Manifeste de l\'Indépendance du Maroc est un acte grandement symbolique au Maroc.', '2019-07-16 09:32:45', '2019-07-16 09:32:45');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, '2019_07_16_105117_create_entreprises', 8);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Directeur', 'admin@admin.com', NULL, NULL, '$2y$10$kXh4ju2MITlTnH/BgvKIpecAJc3eTEeADR.OKeUwfCyvzQ1WpfGWC', NULL, '2019-07-10 21:49:22', '2019-07-11 11:15:50'),
(6, 'guest', 'employe2@employe.com', 'uploads/UZLgU3RmVllC2Iroe0hYRaMgD8MpdjN2BtqANRjU.png', NULL, '$2y$10$pWFgJSKGHG5bDn.uCOzt3uHqDzST.qht4wp0T4atpL8cNK6Y5T3vq', NULL, '2019-07-11 11:18:03', '2019-07-13 18:32:45'),
(5, 'Mohamed', 'employe@employe.com', NULL, NULL, '$2y$10$v6RmcoVPZ7qHyoUWnaFQKOmh291FBmdjRPVo6Z0XW9X4W2ytn1kOy', NULL, '2019-07-11 11:16:12', '2019-07-15 10:30:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
