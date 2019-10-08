-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Octobre 2019 à 08:46
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `akasiabe`
--

-- --------------------------------------------------------

--
-- Structure de la table `abe`
--

CREATE TABLE `abe` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `activity_area_id` tinyint(3) UNSIGNED NOT NULL,
  `sub_activity_area` varchar(35) NOT NULL,
  `signature_date` date NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `total_amount` bigint(20) UNSIGNED NOT NULL,
  `amount_received` bigint(20) UNSIGNED NOT NULL,
  `internal_file_number` varchar(25) NOT NULL,
  `project_execution_start_date` date DEFAULT NULL,
  `project_execution_end_date` date DEFAULT NULL,
  `country` varchar(4) NOT NULL,
  `city` varchar(35) NOT NULL,
  `funding_source` varchar(35) NOT NULL,
  `affiliate_company_id` tinyint(3) UNSIGNED NOT NULL,
  `project_awarded_date` date NOT NULL,
  `akasi_share` tinyint(3) UNSIGNED NOT NULL,
  `project_partner` varchar(35) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  `updated_ at` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `abe_meta`
--

CREATE TABLE `abe_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `abe_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `activity_area`
--

CREATE TABLE `activity_area` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `activity_area`
--

INSERT INTO `activity_area` (`id`, `name`, `description`, `image`) VALUES
(1, 'BTP', 'Batiment Travaux Public', NULL),
(2, 'Numérique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `affiliate_companies`
--

CREATE TABLE `affiliate_companies` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `adress` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affiliate_companies`
--

INSERT INTO `affiliate_companies` (`id`, `name`, `adress`) VALUES
(1, 'AKASI Togo', NULL),
(2, 'AKASI Bénin', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrateur'),
(2, 'members', 'Modérateur');

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `key`, `value`) VALUES
(1, 'siteName', 'Akasi ABE'),
(2, 'siteFooterDescription', '<span>&copy; 2019 AKASI ABE | </span>\r\n        <span>Propulsé par <a target="_blank" href="http://akasigroup.com/">AKASI Group</a></span>'),
(3, 'googleRecaptchaPublicKey', '6Lc6F7sUAAAAAN6_3HU4Fz8SWPNaQ0QtBRU01-zE'),
(4, 'googleRecaptchaSecretKey', '6Lc6F7sUAAAAAJsg5R8L5cs8k1BlF4u1Fg7-ywA1'),
(5, 'siteDescription', 'Plateforme propulsée par AKASI Group pour la Gestion de ses Attestations de Bonne Fin d\'Exécution'),
(6, 'notificationEmails', 'phoudagba@akasigroup.com,akasi-admin@akasigroup.com'),
(7, 'siteFavicon', 'ec28843842a1211f0fc91eef0a60014d.png'),
(8, 'siteDefaultAvatar', '5e14291bc0a98a7143bdade351a306dc.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$XU.b7o6fOb7VXft0pBxESO7vi0wXJCBn8.ccTKBrprh79nI/DiO12', '', 'admin@admin.com', '', NULL, NULL, '4oHv.FfojMyRDXvSjab30O', 1268889823, 1570522635, 1, 'Michael', 'ANIMASHAUN', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Structure de la table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(35) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `key`, `value`) VALUES
(1, 1, 'user_photo', '1532207fc1fbadd8eb77044c4ed8872b.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abe`
--
ALTER TABLE `abe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_area_id` (`activity_area_id`),
  ADD KEY `affiliate_company_id` (`affiliate_company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `abe_meta`
--
ALTER TABLE `abe_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abe_id` (`abe_id`);

--
-- Index pour la table `activity_area`
--
ALTER TABLE `activity_area`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affiliate_companies`
--
ALTER TABLE `affiliate_companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Index pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abe`
--
ALTER TABLE `abe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `abe_meta`
--
ALTER TABLE `abe_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `activity_area`
--
ALTER TABLE `activity_area`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `affiliate_companies`
--
ALTER TABLE `affiliate_companies`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abe_meta`
--
ALTER TABLE `abe_meta`
  ADD CONSTRAINT `abe_meta_ibfk_1` FOREIGN KEY (`abe_id`) REFERENCES `abe` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `user_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
