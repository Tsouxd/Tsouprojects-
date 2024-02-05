-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 nov. 2023 à 07:40
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fichedepresence`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `motif`, `date`) VALUES
(4, '<div>zrregzge</div>', '2023-11-22');

-- --------------------------------------------------------

--
-- Structure de la table `absence_employe`
--

CREATE TABLE `absence_employe` (
  `absence_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `absence_user`
--

CREATE TABLE `absence_user` (
  `absence_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `absence_user`
--

INSERT INTO `absence_user` (`absence_id`, `user_id`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231118122612', '2023-11-18 13:26:25', 2966);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom_employe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_employe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieudenaissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niala`
--

CREATE TABLE `niala` (
  `id` int(11) NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niala`
--

INSERT INTO `niala` (`id`, `motif`, `date`) VALUES
(1, '<div>Kely karama xd</div>', '2023-11-19');

-- --------------------------------------------------------

--
-- Structure de la table `niala_employe`
--

CREATE TABLE `niala_employe` (
  `niala_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niala_user`
--

CREATE TABLE `niala_user` (
  `niala_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niala_user`
--

INSERT INTO `niala_user` (`niala_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id` int(11) NOT NULL,
  `dateentryday` datetime DEFAULT NULL,
  `dateoutday` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`id`, `dateentryday`, `dateoutday`, `created_at`, `updated_at`) VALUES
(2, '2003-12-12 12:12:00', '2003-12-12 16:50:00', '2023-11-21 23:48:09', '2023-11-21 23:48:09'),
(3, NULL, NULL, '2023-11-21 23:50:07', '2023-11-21 23:50:07'),
(4, NULL, NULL, '2023-11-22 07:02:11', '2023-11-22 07:02:11'),
(5, NULL, NULL, '2023-11-22 07:06:58', '2023-11-22 07:06:58');

-- --------------------------------------------------------

--
-- Structure de la table `presence_employe`
--

CREATE TABLE `presence_employe` (
  `presence_id` int(11) NOT NULL,
  `employe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `presence_user`
--

CREATE TABLE `presence_user` (
  `presence_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presence_user`
--

INSERT INTO `presence_user` (`presence_id`, `user_id`) VALUES
(2, 4),
(3, 5),
(4, 6),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datedenaissance` date DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieudenaissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `lastname`, `age`, `sexe`, `immatriculation`, `datedenaissance`, `adresse`, `lieudenaissance`, `photo`, `salaire`) VALUES
(1, 'Tsou', '[]', '$2y$13$GHyuMRVNJx/ibc0fjM6ayu3JEC3FKXPov00vUphDWsB/iZkAip6vC', 'Rakotoson', 21, NULL, '140802', '2002-08-14', 'Lot II U 11 à Ampahibe', 'Ampasanimalo', 'FB_IMG_16440482096916695.png', NULL),
(2, 'Hantah', '[]', '$2y$13$5qL43bneDzzMkZOWoyDOU.IALUlq9b8VXPGRAFsAMtLiUg9HMKVfi', 'Raharimalala', 18, NULL, '051204', '2004-12-05', 'Ankadindramamy', 'Foyer de vie', NULL, NULL),
(3, 'Nekena', '[\"ROLE_USER\"]', '$2y$13$Rqrm8Tt3ByLVBHSkhRRbcuTYbuO7y4QwI/Qn9UxztexQsOsBAOD7e', 'Rakotondrahaja', 20, 'Féminin', '121203', '2003-12-12', 'Analamahintsy', 'Ilafy', NULL, NULL),
(4, 'Ando', '[\"ROLE_USER\"]', '$2y$13$n03zPVMEgJcVrxyefnjiHu.qzilRMexovodOfGgTtP5urEUc7UcWm', 'Randria', 23, 'Masculin', '124587', '1956-12-13', 'Itaosy', 'Itaosy', NULL, NULL),
(5, 'Koto', '[\"ROLE_USER\"]', '$2y$13$wOWuDLzeJN73XkNpu3HD4uEJpYgF38n7GzwDxTW0SD1yv0gB5yLyW', 'Koto', 45, 'Masculin', '214578', '1222-12-19', 'azerty', 'azerty', 'pst.jpg', NULL),
(6, 'Tolotra', '[\"ROLE_USER\"]', '$2y$13$qIXzAtyhJVKJRmCGqsbHF.5lYSoptdVrz8HllQUCs0mIsjAEs7Jka', 'azerty', 20, 'Masculin', '121415', '2002-12-12', 'azerty', 'azerty', 'logo.jpg', NULL),
(7, 'Lavaloha', '[\"ROLE_USER\"]', '$2y$13$i.mTuYpvK8gr1dwTg2VlF.zG85kqDlx7P3rm7PyScpiv5YC48vu06', 'Koto', 56, 'Masculin', '124587', '2003-12-12', 'azerty', 'azerty', 'logo.jpg', 20000),
(8, 'Rotsy', '[\"ROLE_USER\"]', '$2y$13$Bz9txUEIXoX.5Xl6/06WoOiHz.ZvvxQXsLd4lbaKYs/79U3ygwKqO', 'Tolotra', 22, 'Féminin', '124578', '2002-12-12', 'azerty', 'azerty', NULL, 80000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `absence_employe`
--
ALTER TABLE `absence_employe`
  ADD PRIMARY KEY (`absence_id`,`employe_id`),
  ADD KEY `IDX_3182F6312DFF238F` (`absence_id`),
  ADD KEY `IDX_3182F6311B65292` (`employe_id`);

--
-- Index pour la table `absence_user`
--
ALTER TABLE `absence_user`
  ADD PRIMARY KEY (`absence_id`,`user_id`),
  ADD KEY `IDX_FA8218D62DFF238F` (`absence_id`),
  ADD KEY `IDX_FA8218D6A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `niala`
--
ALTER TABLE `niala`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niala_employe`
--
ALTER TABLE `niala_employe`
  ADD PRIMARY KEY (`niala_id`,`employe_id`),
  ADD KEY `IDX_B66D13B93B9DAE21` (`niala_id`),
  ADD KEY `IDX_B66D13B91B65292` (`employe_id`);

--
-- Index pour la table `niala_user`
--
ALTER TABLE `niala_user`
  ADD PRIMARY KEY (`niala_id`,`user_id`),
  ADD KEY `IDX_590F604E3B9DAE21` (`niala_id`),
  ADD KEY `IDX_590F604EA76ED395` (`user_id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presence_employe`
--
ALTER TABLE `presence_employe`
  ADD PRIMARY KEY (`presence_id`,`employe_id`),
  ADD KEY `IDX_E55E526CF328FFC4` (`presence_id`),
  ADD KEY `IDX_E55E526C1B65292` (`employe_id`);

--
-- Index pour la table `presence_user`
--
ALTER TABLE `presence_user`
  ADD PRIMARY KEY (`presence_id`,`user_id`),
  ADD KEY `IDX_666ACE30F328FFC4` (`presence_id`),
  ADD KEY `IDX_666ACE30A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niala`
--
ALTER TABLE `niala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence_employe`
--
ALTER TABLE `absence_employe`
  ADD CONSTRAINT `FK_3182F6311B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3182F6312DFF238F` FOREIGN KEY (`absence_id`) REFERENCES `absence` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `absence_user`
--
ALTER TABLE `absence_user`
  ADD CONSTRAINT `FK_FA8218D62DFF238F` FOREIGN KEY (`absence_id`) REFERENCES `absence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FA8218D6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `niala_employe`
--
ALTER TABLE `niala_employe`
  ADD CONSTRAINT `FK_B66D13B91B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B66D13B93B9DAE21` FOREIGN KEY (`niala_id`) REFERENCES `niala` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `niala_user`
--
ALTER TABLE `niala_user`
  ADD CONSTRAINT `FK_590F604E3B9DAE21` FOREIGN KEY (`niala_id`) REFERENCES `niala` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_590F604EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `presence_employe`
--
ALTER TABLE `presence_employe`
  ADD CONSTRAINT `FK_E55E526C1B65292` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E55E526CF328FFC4` FOREIGN KEY (`presence_id`) REFERENCES `presence` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `presence_user`
--
ALTER TABLE `presence_user`
  ADD CONSTRAINT `FK_666ACE30A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_666ACE30F328FFC4` FOREIGN KEY (`presence_id`) REFERENCES `presence` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
