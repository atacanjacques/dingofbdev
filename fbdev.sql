-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Janvier 2017 à 21:36
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fbdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `cgu` text,
  `reglement` text,
  `lots_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concours`
--

INSERT INTO `concours` (`id`, `nom`, `date_debut`, `date_fin`, `cgu`, `reglement`, `lots_id`) VALUES
(1, 'Concours Tatoo', '2017-01-01', '2017-01-04', NULL, '<p>Reglement...</p>', NULL),
(2, 'Concours 2', '2017-01-05', '2017-01-07', NULL, '<p>reglement</p>', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `idparticipation` int(11) NOT NULL,
  `id_photo` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `concours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `bg_home` varchar(45) DEFAULT NULL,
  `bg_default` varchar(45) DEFAULT NULL,
  `color_button` varchar(45) DEFAULT NULL,
  `font_color` varchar(45) DEFAULT NULL,
  `font_family` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `id_fb` int(11) DEFAULT NULL,
  `nb_like` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `participation_id` int(11) NOT NULL,
  `participation_idparticipation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_concours_lots_idx` (`lots_id`);

--
-- Index pour la table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`idparticipation`),
  ADD KEY `fk_participation_users1_idx` (`users_id`),
  ADD KEY `fk_participation_concours1_idx` (`concours_id`);

--
-- Index pour la table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_voteur_participation1_idx` (`participation_id`),
  ADD KEY `fk_voteur_participation2_idx` (`participation_idparticipation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concours`
--
ALTER TABLE `concours`
  ADD CONSTRAINT `fk_concours_lots` FOREIGN KEY (`lots_id`) REFERENCES `lots` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_participation_concours1` FOREIGN KEY (`concours_id`) REFERENCES `concours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participation_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `fk_voteur_participation1` FOREIGN KEY (`participation_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voteur_participation2` FOREIGN KEY (`participation_idparticipation`) REFERENCES `participation` (`idparticipation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
