-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 23 mai 2025 à 14:22
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompagnants`
--

CREATE TABLE `accompagnants` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_accompagnant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accompagnants`
--

INSERT INTO `accompagnants` (`id`, `nom_accompagnant`, `created_at`, `updated_at`) VALUES
(1, 'ABDEL', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `achat_parts`
--

CREATE TABLE `achat_parts` (
  `id` bigint UNSIGNED NOT NULL,
  `Entrepreneur_id` bigint UNSIGNED NOT NULL,
  `nbr_parts` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE `activites` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_activite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien_boutique_en_ligne` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_activite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rcpro_activite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `marge_salaire_activite` decimal(8,2) NOT NULL,
  `salaire_activite` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom_commercial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mot_cle_activite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `necessite_stock` tinyint(1) DEFAULT NULL,
  `date_dernier_etat_stock` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activites`
--

INSERT INTO `activites` (`id`, `nom_activite`, `lien_boutique_en_ligne`, `description_activite`, `rcpro_activite`, `marge_salaire_activite`, `salaire_activite`, `created_at`, `updated_at`, `nom_commercial`, `mot_cle_activite`, `necessite_stock`, `date_dernier_etat_stock`) VALUES
(5, 'INFOm', 'https://www.flyingblue.com/fr/home', 'Dev', 'axa', 3254.99, 3254.99, '2024-08-29 15:24:27', '2025-05-23 12:16:38', 'OULKINFO', 'conseil', 0, NULL),
(6, 'Hébergement info', 'https://moulkhorf.adkynet.eu/', 'Hébergement sur cloud', 'Axa', 255554.25, 154326.55, '2025-01-15 12:26:23', '2025-01-17 11:03:19', 'Anirinfo', 'Cloud', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `boitier_sum_ups`
--

CREATE TABLE `boitier_sum_ups` (
  `id` bigint UNSIGNED NOT NULL,
  `num_sum_up` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `boitier_sum_ups`
--

INSERT INTO `boitier_sum_ups` (`id`, `num_sum_up`, `created_at`, `updated_at`) VALUES
(2, 'SDFDRSTG565', '2024-08-29 15:24:27', '2024-08-29 15:24:27'),
(3, 'FR544534454', '2025-01-15 12:26:23', '2025-01-15 12:26:23');

-- --------------------------------------------------------

--
-- Structure de la table `cadeaus`
--

CREATE TABLE `cadeaus` (
  `id` bigint UNSIGNED NOT NULL,
  `donneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle_cadeau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_cadeau` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cadeaus`
--

INSERT INTO `cadeaus` (`id`, `donneur`, `libelle_cadeau`, `stock_cadeau`, `created_at`, `updated_at`) VALUES
(1, 'abdel', 'Carnet', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cheque_creas`
--

CREATE TABLE `cheque_creas` (
  `id` bigint UNSIGNED NOT NULL,
  `Contrat_id` bigint UNSIGNED NOT NULL,
  `est_obtenu` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cheque_creas`
--

INSERT INTO `cheque_creas` (`id`, `Contrat_id`, `est_obtenu`, `created_at`, `updated_at`) VALUES
(2, 8, 1, '2024-08-29 15:24:27', '2024-08-29 15:24:27'),
(3, 9, 1, '2025-01-15 12:26:23', '2025-01-15 12:26:23');

-- --------------------------------------------------------

--
-- Structure de la table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_college` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `colleges`
--

INSERT INTO `colleges` (`id`, `nom_college`, `created_at`, `updated_at`) VALUES
(1, 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` bigint UNSIGNED NOT NULL,
  `type_Contrat_id` bigint UNSIGNED NOT NULL,
  `date_signature_contrat` date NOT NULL,
  `date_fin_contrat` date DEFAULT NULL,
  `poste_contrat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrats`
--

INSERT INTO `contrats` (`id`, `type_Contrat_id`, `date_signature_contrat`, `date_fin_contrat`, `poste_contrat`, `created_at`, `updated_at`) VALUES
(8, 1, '2024-01-15', '2025-01-15', 'Non spécifié', '2024-08-29 15:24:27', '2025-05-23 12:16:23'),
(9, 1, '2025-01-01', '2025-01-31', 'Non spécifié', '2025-01-15 12:26:23', '2025-01-17 11:18:31');

-- --------------------------------------------------------

--
-- Structure de la table `domicile_entrepreneurs`
--

CREATE TABLE `domicile_entrepreneurs` (
  `id` bigint UNSIGNED NOT NULL,
  `Entrepreneur_id` bigint UNSIGNED NOT NULL,
  `rue_domicile_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_rue_domicile_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_domicile_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_domicile_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpt_id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domicile_entrepreneurs`
--

INSERT INTO `domicile_entrepreneurs` (`id`, `Entrepreneur_id`, `rue_domicile_entrepreneur`, `num_rue_domicile_entrepreneur`, `ville_domicile_entrepreneur`, `cp_domicile_entrepreneur`, `dpt_id`, `region_id`, `created_at`, `updated_at`) VALUES
(8, 8, 'DFGBDFGBDFG', '12', 'DRAA', '34450', 1, 1, '2024-08-29 15:24:27', '2024-08-29 15:24:27'),
(9, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-15 12:26:23', '2025-01-15 12:26:23'),
(11, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 10:30:28', '2025-01-17 10:30:28'),
(12, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 10:31:05', '2025-01-17 10:31:05'),
(13, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 11:02:18', '2025-01-17 11:02:18'),
(14, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 11:03:19', '2025-01-17 11:03:19'),
(15, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 11:14:05', '2025-01-17 11:14:05'),
(16, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 11:18:31', '2025-01-17 11:18:31'),
(17, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 13:29:49', '2025-01-17 13:29:49'),
(18, 9, 'victor hugo', '5', 'Bar-le-Duc', '55000', 1, 1, '2025-01-17 13:31:20', '2025-01-17 13:31:20'),
(19, 8, 'DFGBDFGBDFG', '12', 'DRAA', '34450', 1, 1, '2025-02-03 13:44:21', '2025-02-03 13:44:21'),
(20, 8, 'DFGBDFGBDFG', '12', 'DRAA', '34450', 1, 1, '2025-02-03 13:44:36', '2025-02-03 13:44:36'),
(21, 8, 'DFGBDFGBDFG', '12', 'DRAA', '34450', 1, 1, '2025-02-03 13:45:51', '2025-02-03 13:45:51');

-- --------------------------------------------------------

--
-- Structure de la table `dpts`
--

CREATE TABLE `dpts` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_dpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dpts`
--

INSERT INTO `dpts` (`id`, `nom_dpt`, `created_at`, `updated_at`) VALUES
(1, 'Meuse', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entites`
--

CREATE TABLE `entites` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_entite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entites`
--

INSERT INTO `entites` (`id`, `nom_entite`, `created_at`, `updated_at`) VALUES
(1, 'Synercoop', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entrepreneurs`
--

CREATE TABLE `entrepreneurs` (
  `id` bigint UNSIGNED NOT NULL,
  `matricule_silae` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_analytique_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance_entrepreneur` date NOT NULL,
  `lieu_naissance_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_ss_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone1_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone2_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_entrepreneur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Accompagnant_id` bigint UNSIGNED DEFAULT NULL,
  `date_fin_accompagnement` date DEFAULT NULL,
  `demandeur_emploi` tinyint(1) NOT NULL,
  `entrepreneur_actif` tinyint(1) DEFAULT NULL,
  `cadeau_id` bigint UNSIGNED DEFAULT NULL,
  `dpt_entree_id` bigint UNSIGNED DEFAULT NULL,
  `dpt_actuel_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entrepreneurs`
--

INSERT INTO `entrepreneurs` (`id`, `matricule_silae`, `code_analytique_entrepreneur`, `nom_entrepreneur`, `prenom_entrepreneur`, `sexe_entrepreneur`, `date_naissance_entrepreneur`, `lieu_naissance_entrepreneur`, `nationalite_entrepreneur`, `numero_ss_entrepreneur`, `telephone1_entrepreneur`, `telephone2_entrepreneur`, `mail_entrepreneur`, `Accompagnant_id`, `date_fin_accompagnement`, `demandeur_emploi`, `entrepreneur_actif`, `cadeau_id`, `dpt_entree_id`, `dpt_actuel_id`, `deleted_at`, `created_at`, `updated_at`, `date_sortie`) VALUES
(8, 'SGDFUZ68', 'OULKMO', 'OULK', 'mo', 'Mr', '2004-02-29', 'Ajmou', 'tamlalt', '32453553345345', '0556454456', '0936839303', 'kyujyjt@gmail.com', 1, '2024-08-14', 1, NULL, NULL, 1, 1, NULL, '2024-08-29 15:24:27', '2025-05-23 12:16:03', NULL),
(9, 'IYUGDQSYU', 'SQFDS232025', 'Ihlan', 'Anir', 'Mr', '2025-01-02', 'Zagora', 'MA', '199456453453', '0625359864', ' ', 'anir.ihlan@gmail.com', 1, '2022-05-10', 1, NULL, NULL, 1, 1, NULL, '2025-01-15 12:26:23', '2025-01-17 11:14:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2024_06_18_080604_create_cadeaus_table', 2),
(7, '2024_06_18_083208_create_entrepreneurs_table', 2),
(8, '2024_06_18_091216_create_utilisateurs_table', 2),
(9, '2024_06_18_093351_create_groupe_ads_table', 2),
(10, '2024_06_18_094547_create_ous_table', 2),
(11, '2024_06_18_095509_create_ajouter_groupe_ous_table', 2),
(12, '2024_06_18_100612_create_ajouter_user_groupes_table', 2),
(13, '2024_06_18_102246_create_visite_medicales_table', 2),
(14, '2024_06_18_111119_create_dpts_table', 2),
(15, '2024_06_18_111549_create_regions_table', 2),
(16, '2024_06_18_112038_create_domicile_entrepreneurs_table', 2),
(17, '2024_06_18_120403_create_entites_table', 2),
(18, '2024_06_18_120828_create_authentifications_table', 2),
(19, '2024_06_18_125707_create_connexions_table', 2),
(20, '2024_06_18_132104_create_colleges_table', 2),
(21, '2024_06_18_133519_create_activites_table', 2),
(22, '2024_06_18_135023_create_boitier_sum_ups_table', 2),
(23, '2024_06_18_135529_create_utilisation_sum_ups_table', 2),
(24, '2024_06_22_134114_create_type_contrats_table', 2),
(25, '2024_06_22_134529_create_contrats_table', 2),
(26, '2024_06_22_135612_create_travaillers_table', 2),
(27, '2024_06_22_140223_create_cheque_creas_table', 2),
(28, '2024_06_23_165658_add_date_fin_contrat_to_contracts_table', 2),
(29, '2024_06_23_170216_add_college_id_to_travaillers_table', 2),
(30, '2024_07_04_210814_create_accompagnants_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom_region`, `created_at`, `updated_at`) VALUES
(1, 'EST', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `travaillers`
--

CREATE TABLE `travaillers` (
  `id` bigint UNSIGNED NOT NULL,
  `College_id` bigint UNSIGNED DEFAULT NULL,
  `Entrepreneur_id` bigint UNSIGNED NOT NULL,
  `Entite_id` bigint UNSIGNED NOT NULL,
  `Contrat_id` bigint UNSIGNED NOT NULL,
  `Activite_id` bigint UNSIGNED NOT NULL,
  `visite_medicale_id` bigint UNSIGNED NOT NULL,
  `dpt_id` bigint UNSIGNED NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `date_access_societariat` date DEFAULT NULL,
  `adhesion_en_cours` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fiche_site` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `travaillers`
--

INSERT INTO `travaillers` (`id`, `College_id`, `Entrepreneur_id`, `Entite_id`, `Contrat_id`, `Activite_id`, `visite_medicale_id`, `dpt_id`, `region_id`, `date_access_societariat`, `adhesion_en_cours`, `created_at`, `updated_at`, `fiche_site`) VALUES
(2, NULL, 8, 1, 8, 5, 19, 1, 1, NULL, 0, '2024-08-29 15:24:27', '2025-05-23 12:16:23', 0),
(3, NULL, 9, 1, 9, 6, 6, 1, 1, NULL, 0, '2025-01-15 12:26:23', '2025-01-17 10:30:28', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_contrats`
--

CREATE TABLE `type_contrats` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_contrat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_contrats`
--

INSERT INTO `type_contrats` (`id`, `nom_contrat`, `created_at`, `updated_at`) VALUES
(1, 'CESA', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `mot_de_passe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `login`, `mot_de_passe`) VALUES
(1, 'admin', '$2y$10$4Srb7x2J7kXTrAhQuKFpmemx6qLDjkQMCLA16O6dHPot8hi0L9lJ2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisation_sum_ups`
--

CREATE TABLE `utilisation_sum_ups` (
  `id` bigint UNSIGNED NOT NULL,
  `Entrepreneur_id` bigint UNSIGNED NOT NULL,
  `Activite_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `boitier_sum_up_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisation_sum_ups`
--

INSERT INTO `utilisation_sum_ups` (`id`, `Entrepreneur_id`, `Activite_id`, `created_at`, `updated_at`, `boitier_sum_up_id`) VALUES
(1, 8, 5, '2024-08-29 15:24:27', '2024-08-29 15:24:27', 2),
(2, 9, 6, '2025-01-15 12:26:23', '2025-01-15 12:26:23', 3);

-- --------------------------------------------------------

--
-- Structure de la table `visite_medicales`
--

CREATE TABLE `visite_medicales` (
  `id` bigint UNSIGNED NOT NULL,
  `Entrepreneur_id` bigint UNSIGNED NOT NULL,
  `date_visite` date NOT NULL,
  `resultat_visite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_prochaine_visite` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visite_medicales`
--

INSERT INTO `visite_medicales` (`id`, `Entrepreneur_id`, `date_visite`, `resultat_visite`, `date_prochaine_visite`, `created_at`, `updated_at`) VALUES
(5, 8, '2024-02-14', 'ok', '2026-02-11', '2024-08-29 15:24:27', '2024-08-29 15:24:27'),
(6, 9, '2024-06-10', 'Bon', '2025-06-09', '2025-01-15 12:26:23', '2025-01-15 12:26:23'),
(8, 9, '2025-01-02', 'ok', '2025-01-28', '2025-01-17 10:30:28', '2025-01-17 10:30:28'),
(9, 9, '2025-01-01', 'ok', '2025-01-31', '2025-01-17 10:31:05', '2025-01-17 10:31:05'),
(10, 9, '2025-01-02', 'Non spécifiée', '2025-01-28', '2025-01-17 11:02:18', '2025-01-17 11:02:18'),
(11, 9, '2025-01-02', 'Non spécifiée', '2025-01-30', '2025-01-17 11:03:19', '2025-01-17 11:03:19'),
(13, 9, '2025-01-02', 'Non spécifiée', '2025-01-28', '2025-01-17 11:18:31', '2025-01-17 11:18:31'),
(14, 9, '2024-06-10', 'Non spécifiée', '2025-06-09', '2025-01-17 13:29:49', '2025-01-17 13:29:49'),
(15, 9, '2024-06-10', 'Non spécifiée', '2025-06-09', '2025-01-17 13:31:20', '2025-01-17 13:31:20'),
(16, 8, '2024-02-14', 'Non spécifiée', '2026-02-11', '2025-02-03 13:44:21', '2025-02-03 13:44:21'),
(17, 8, '2024-02-14', 'Non spécifiée', '2026-02-11', '2025-02-03 13:44:36', '2025-02-03 13:44:36'),
(18, 8, '2024-02-14', 'Non spécifiée', '2026-02-11', '2025-02-03 13:45:52', '2025-02-03 13:45:52'),
(19, 8, '2024-02-14', 'Non spécifiée', '2026-02-11', '2025-05-23 12:16:23', '2025-05-23 12:16:23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accompagnants`
--
ALTER TABLE `accompagnants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `achat_parts`
--
ALTER TABLE `achat_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Entrepreneur_id` (`Entrepreneur_id`);

--
-- Index pour la table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `boitier_sum_ups`
--
ALTER TABLE `boitier_sum_ups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cadeaus`
--
ALTER TABLE `cadeaus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cheque_creas`
--
ALTER TABLE `cheque_creas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheque_creas_contrat_id_foreign` (`Contrat_id`);

--
-- Index pour la table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrats_type_contrat_id_foreign` (`type_Contrat_id`);

--
-- Index pour la table `domicile_entrepreneurs`
--
ALTER TABLE `domicile_entrepreneurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domicile_entrepreneurs_entrepreneur_id_foreign` (`Entrepreneur_id`),
  ADD KEY `domicile_entrepreneurs_dpt_id_foreign` (`dpt_id`),
  ADD KEY `domicile_entrepreneurs_region_id_foreign` (`region_id`);

--
-- Index pour la table `dpts`
--
ALTER TABLE `dpts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entites`
--
ALTER TABLE `entites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrepreneurs_cadeau_id_foreign` (`cadeau_id`),
  ADD KEY `entrepreneurs_dpt_entree_id_foreign` (`dpt_entree_id`),
  ADD KEY `entrepreneurs_dpt_actuel_id_foreign` (`dpt_actuel_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `travaillers`
--
ALTER TABLE `travaillers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travaillers_entrepreneur_id_foreign` (`Entrepreneur_id`),
  ADD KEY `travaillers_entite_id_foreign` (`Entite_id`),
  ADD KEY `travaillers_contrat_id_foreign` (`Contrat_id`),
  ADD KEY `travaillers_activite_id_foreign` (`Activite_id`),
  ADD KEY `travaillers_visite_medicale_id_foreign` (`visite_medicale_id`),
  ADD KEY `travaillers_dpt_id_foreign` (`dpt_id`),
  ADD KEY `travaillers_region_id_foreign` (`region_id`),
  ADD KEY `travaillers_college_id_foreign` (`College_id`);

--
-- Index pour la table `type_contrats`
--
ALTER TABLE `type_contrats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `utilisation_sum_ups`
--
ALTER TABLE `utilisation_sum_ups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisation_sum_ups_entrepreneur_id_foreign` (`Entrepreneur_id`),
  ADD KEY `utilisation_sum_ups_activite_id_foreign` (`Activite_id`),
  ADD KEY `fk_boitier_sum_up_id` (`boitier_sum_up_id`);

--
-- Index pour la table `visite_medicales`
--
ALTER TABLE `visite_medicales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visite_medicales_entrepreneur_id_foreign` (`Entrepreneur_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accompagnants`
--
ALTER TABLE `accompagnants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `achat_parts`
--
ALTER TABLE `achat_parts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `boitier_sum_ups`
--
ALTER TABLE `boitier_sum_ups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cadeaus`
--
ALTER TABLE `cadeaus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cheque_creas`
--
ALTER TABLE `cheque_creas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `domicile_entrepreneurs`
--
ALTER TABLE `domicile_entrepreneurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `dpts`
--
ALTER TABLE `dpts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entites`
--
ALTER TABLE `entites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `travaillers`
--
ALTER TABLE `travaillers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_contrats`
--
ALTER TABLE `type_contrats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisation_sum_ups`
--
ALTER TABLE `utilisation_sum_ups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `visite_medicales`
--
ALTER TABLE `visite_medicales`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat_parts`
--
ALTER TABLE `achat_parts`
  ADD CONSTRAINT `achat_parts_ibfk_1` FOREIGN KEY (`Entrepreneur_id`) REFERENCES `entrepreneurs` (`id`);

--
-- Contraintes pour la table `cheque_creas`
--
ALTER TABLE `cheque_creas`
  ADD CONSTRAINT `cheque_creas_contrat_id_foreign` FOREIGN KEY (`Contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `contrats_type_contrat_id_foreign` FOREIGN KEY (`type_Contrat_id`) REFERENCES `type_contrats` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `domicile_entrepreneurs`
--
ALTER TABLE `domicile_entrepreneurs`
  ADD CONSTRAINT `domicile_entrepreneurs_dpt_id_foreign` FOREIGN KEY (`dpt_id`) REFERENCES `dpts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `domicile_entrepreneurs_entrepreneur_id_foreign` FOREIGN KEY (`Entrepreneur_id`) REFERENCES `entrepreneurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `domicile_entrepreneurs_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `entrepreneurs`
--
ALTER TABLE `entrepreneurs`
  ADD CONSTRAINT `entrepreneurs_cadeau_id_foreign` FOREIGN KEY (`cadeau_id`) REFERENCES `cadeaus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entrepreneurs_dpt_actuel_id_foreign` FOREIGN KEY (`dpt_actuel_id`) REFERENCES `dpts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `entrepreneurs_dpt_entree_id_foreign` FOREIGN KEY (`dpt_entree_id`) REFERENCES `dpts` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `travaillers`
--
ALTER TABLE `travaillers`
  ADD CONSTRAINT `travaillers_activite_id_foreign` FOREIGN KEY (`Activite_id`) REFERENCES `activites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travaillers_college_id_foreign` FOREIGN KEY (`College_id`) REFERENCES `colleges` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `travaillers_contrat_id_foreign` FOREIGN KEY (`Contrat_id`) REFERENCES `contrats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travaillers_dpt_id_foreign` FOREIGN KEY (`dpt_id`) REFERENCES `dpts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travaillers_entite_id_foreign` FOREIGN KEY (`Entite_id`) REFERENCES `entites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travaillers_entrepreneur_id_foreign` FOREIGN KEY (`Entrepreneur_id`) REFERENCES `entrepreneurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travaillers_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `travaillers_visite_medicale_id_foreign` FOREIGN KEY (`visite_medicale_id`) REFERENCES `visite_medicales` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisation_sum_ups`
--
ALTER TABLE `utilisation_sum_ups`
  ADD CONSTRAINT `fk_boitier_sum_up_id` FOREIGN KEY (`boitier_sum_up_id`) REFERENCES `boitier_sum_ups` (`id`),
  ADD CONSTRAINT `utilisation_sum_ups_activite_id_foreign` FOREIGN KEY (`Activite_id`) REFERENCES `activites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `utilisation_sum_ups_entrepreneur_id_foreign` FOREIGN KEY (`Entrepreneur_id`) REFERENCES `entrepreneurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `visite_medicales`
--
ALTER TABLE `visite_medicales`
  ADD CONSTRAINT `visite_medicales_entrepreneur_id_foreign` FOREIGN KEY (`Entrepreneur_id`) REFERENCES `entrepreneurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
