-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Février 2017 à 20:33
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dingofbdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `cgu` text,
  `mentions_legales` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`cgu`, `mentions_legales`) VALUES
('\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ornare, elit vel elementum elementum, lorem arcu condimentum odio, a ornare diam mauris vitae erat. Suspendisse fringilla condimentum eleifend. Suspendisse potenti. Etiam euismod, magna quis dictum bibendum, odio libero varius ex, eget vestibulum leo lectus ut nisl. In hac habitasse platea dictumst. Proin vitae nibh scelerisque, fermentum neque at, vulputate eros. Pellentesque interdum, purus at scelerisque ultrices, ex magna dignissim metus, vehicula ullamcorper neque tortor quis dui. Curabitur sed lectus elementum, rhoncus massa id, semper massa.\r\n\r\nAliquam justo risus, sodales id tempor eu, vestibulum at neque. Suspendisse consequat blandit sagittis. Vestibulum convallis est id lorem luctus vehicula. Vestibulum sapien orci, gravida sed maximus vel, rutrum eu tellus. In lacus nisi, gravida a massa sed, suscipit finibus augue. In ut gravida mi. Curabitur maximus fermentum massa ut cursus. Morbi risus elit, porta at luctus eget, vestibulum vitae neque. Donec volutpat ut eros sed hendrerit. Suspendisse porttitor pulvinar ante, sagittis blandit urna elementum et. Phasellus quis feugiat justo. Vivamus ac convallis ligula. Morbi bibendum metus at arcu volutpat interdum.\r\n\r\nDonec vulputate, magna euismod imperdiet ultricies, lectus turpis vestibulum tortor, sit amet varius libero diam nec lorem. Maecenas porttitor volutpat libero, et imperdiet ipsum venenatis vitae. Maecenas id risus vel turpis ullamcorper viverra. Morbi interdum vitae nibh nec dictum. Nam dignissim ligula metus, ac luctus libero fringilla in. Maecenas at mollis sem. Aliquam maximus nec purus sit amet fermentum. Fusce auctor facilisis tristique. Phasellus scelerisque erat egestas felis pellentesque, vel sollicitudin eros pellentesque. Integer pharetra non justo a porttitor. Praesent congue varius tortor. Nam id sollicitudin mi, eget ornare orci. Cras vel diam nec arcu pretium interdum.\r\n\r\nCurabitur semper at turpis quis rutrum. Morbi a risus dui. Nunc auctor, tortor a convallis lobortis, sem ante sagittis erat, aliquet dictum ligula dui sed urna. In hac habitasse platea dictumst. Duis hendrerit nisi vitae finibus facilisis. Integer at leo elementum, iaculis quam ac, rutrum erat. Curabitur porta dolor tellus, sed efficitur sem tincidunt non. Vivamus interdum ultricies urna.\r\n\r\nSuspendisse potenti. Morbi mollis porta lectus tincidunt auctor. Mauris nisl erat, feugiat in nulla et, auctor rutrum dolor. Praesent tincidunt lorem venenatis mauris lacinia, a viverra tortor facilisis. Pellentesque venenatis vestibulum massa, vel egestas turpis sodales eget. Suspendisse fringilla tellus convallis magna tincidunt maximus. Quisque ut pulvinar eros. Donec placerat felis accumsan mi dictum, et tincidunt ligula pellentesque. Sed vulputate est sit amet nisl consequat tristique. Phasellus hendrerit turpis ante, vehicula efficitur mi porttitor at. Ut at lacus tortor.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae magna in lacus consequat eleifend. Aliquam placerat ex vitae purus tincidunt imperdiet. Vestibulum odio ante, iaculis sed varius id, euismod at felis. Sed sed dictum massa, at mattis nunc. Duis sed maximus ante, consequat ornare augue. Mauris posuere turpis quis sem feugiat dignissim id et tellus. Cras mollis, ante id mollis facilisis, enim est sagittis sem, a sagittis nunc lacus eget mauris. Curabitur gravida leo a ultrices sodales. Nulla suscipit sed risus id feugiat. Vestibulum hendrerit elit at mattis pretium.\r\n\r\nIn condimentum mi quam, a euismod augue pulvinar sit amet. Morbi lacinia sapien nec rhoncus venenatis. Praesent sit amet velit ac velit feugiat feugiat. Nullam auctor rutrum lacus ut fringilla. Phasellus porta purus est, id mollis ante convallis ut. Sed mi lectus, eleifend eget libero vel, iaculis imperdiet nunc. Donec ultrices nec arcu in tempus. Suspendisse ut massa nibh. Vestibulum eu egestas lacus, vel eleifend felis. Fusce rutrum suscipit molestie. In diam magna, suscipit tempus velit faucibus, viverra scelerisque erat. Cras et metus nisi. Duis consequat orci in pellentesque pharetra. Pellentesque sit amet consequat nunc, a aliquet metus.\r\n\r\nSuspendisse potenti. Vestibulum nisi dolor, pharetra sed convallis non, interdum at dui. Nullam pulvinar ipsum ante. Proin placerat orci in nulla euismod, eu fermentum ex luctus. Proin mattis, arcu sed rutrum efficitur, quam nisl iaculis dui, sit amet convallis massa erat mollis elit. Fusce ac lectus ac sapien finibus maximus et sed urna. Praesent ac orci molestie, dignissim nulla vitae, molestie enim. Praesent et eros sed urna vestibulum vehicula a vel libero. Mauris porta arcu faucibus felis vulputate, id porta elit malesuada. Maecenas sed elit non magna commodo eleifend. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Pellentesque ac nisl fringilla, luctus ante sit amet, sagittis ex. In ex enim, consequat volutpat dignissim ut, ornare ut orci. Aliquam pretium placerat odio, vel tempus urna fermentum vel. Proin sollicitudin pulvinar eros.\r\n\r\nMorbi finibus blandit nunc nec convallis. Fusce mattis arcu non sapien convallis venenatis. Duis dignissim sit amet eros ac dapibus. Etiam dictum tempus tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla turpis justo, egestas a tincidunt a, faucibus non urna. Vestibulum vel sapien vitae nunc mattis aliquet. Curabitur consectetur venenatis enim, quis ullamcorper leo vulputate nec. Donec ultricies, eros convallis dictum dapibus, lorem massa malesuada ante, id euismod sapien risus a massa. Morbi nec gravida massa, vitae molestie nunc.\r\n\r\nNunc at ornare metus, non congue urna. Donec gravida tristique viverra. Sed interdum massa id magna dapibus porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce euismod tincidunt lacinia. Fusce tempus velit id enim posuere, vitae ultricies nibh euismod. Donec quis dignissim quam, ut elementum ante. Vestibulum sit amet enim ac mauris lobortis feugiat. Duis et tortor nibh. Vestibulum faucibus lacinia augue, eu ornare odio volutpat vitae. Praesent sit amet purus eu dui vulputate eleifend non sed ante. Nunc quam magna, blandit nec sodales ut, fringilla sit amet leo.');

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `accueil` text,
  `reglement` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concours`
--

INSERT INTO `concours` (`id`, `nom`, `date_debut`, `heure_debut`, `date_fin`, `heure_fin`, `accueil`, `reglement`) VALUES
(1, 'Devio', '2016-02-18', '10:00:00', '2016-02-28', '23:59:59', '<p>Lorem ipsum</p>', '<p>Lorem ipsum</p>'),
(2, 'Atiko', '2016-07-20', '10:00:00', '2016-07-31', '23:59:59', '<p>Lorem ipsum</p>', '<p>Lorem ipsum</p>'),
(4, 'Kiosa', '2017-01-17', '10:00:00', '2017-02-26', '23:59:59', '<p>Lorem ipsum</p>', '<p>Lorem ipsum</p>');

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `concours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lots`
--

INSERT INTO `lots` (`id`, `nom`, `url`, `description`, `concours_id`) VALUES
(1, 'tatoo epaule', 'C:/My Program Files/Wamp/www/Fbdev/uploads/img_concours/img_concours_.jpg', '<p>Lorem ipsum</p>', 1),
(2, 'tatoo cheville', 'C:/My Program Files/Wamp/www/Fbdev/uploads/img_concours/img_concours_1.jpg', '<p>Lorem ipsum</p>', 2),
(4, 'tatoo dos', 'C:/My Program Files/Wamp/www/Fbdev/uploads/img_concours/img_concours_3.jpg', '<p>Lorem ipsum</p>', 4);

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id` int(11) NOT NULL,
  `source_photo` varchar(255) DEFAULT NULL,
  `concours_id` int(11) NOT NULL,
  `users_id_fb` varchar(255) NOT NULL,
  `signalement` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participation`
--

INSERT INTO `participation` (`id`, `source_photo`, `concours_id`, `users_id_fb`, `signalement`) VALUES
(1, 'http://static.boredpanda.com/blog/wp-content/uploads/2016/05/black-white-snake-tattoos-mirko-sata-fb.png', 1, 156446, 0),
(2, 'http://oldserbtattooclub.com/wp-content/uploads/2015/03/ostc_tattoo_100.jpg', 1, 391254, 1),
(4, 'https://s-media-cache-ak0.pinimg.com/736x/c9/c5/71/c9c5719601cf029513c76d11c2072350.jpg', 1, 428013, 0),
(5, 'https://s-media-cache-ak0.pinimg.com/736x/20/f5/37/20f537bd1c921b36520f241afb5d7a21.jpg', 4, 156446, 1),
(6, 'http://tattoo-journal.com/wp-content/uploads/2015/08/viking-tattoo-41-650x650.jpg', 4, 165640, 0),
(7, 'http://bleunoirtattoo.com/wp-content/uploads/2017/01/Bleu-Noir-Paris-abbesses-tattoo-art-shop-Gael-07.jpg', 4, 362452, 0),
(8, 'http://www.cuded.com/wp-content/uploads/2013/10/37-Small-dog-tattoo.jpg', 4, 238102, 0);

-- --------------------------------------------------------

--
-- Structure de la table `styles`
--

CREATE TABLE `styles` (
  `id` int(11) NOT NULL,
  `theme` varchar(45) DEFAULT NULL,
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
  `id_fb` varchar(255) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `banni` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_fb`, `nom`, `prenom`, `mail`, `token`, `banni`) VALUES
(156446, 'richard', 'romain', 'romain@orange.com', 'fe&47f', 0),
(165640, 'atacan', 'jacques', 'jacques@orange.com', 'jt465f', 1),
(238102, 'corti', 'alexia', 'alexia@orange.com', 'sk681g', 1),
(362452, 'bornstein', 'alexandre', 'alexandre@orange.com', 'ge152s', 0),
(391254, 'ataco', 'murielle', 'murielle@orange.com', 'jd651h', 0),
(428013, 'corti', 'romano', 'romano@orange.com', 'cb624r', 0),
(625103, 'bornster', 'lucille', 'lucille@orange.com', 'oi462d', 0),
(652785, 'richo', 'kévin', 'kévin@orange.com', 'jb235j', 1),
(846001, 'durand', 'jacquo', 'jacquo@orange.com', 'tr032h', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `id_voteur` varchar(255) DEFAULT NULL,
  `participation_idparticipation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`id`, `id_voteur`, `participation_idparticipation`) VALUES
(1, 265846, 1),
(2, 643856, 1),
(3, 138524, 1),
(9, 658965, 5),
(10, 634521, 5),
(11, 893244, 5),
(12, 965235, 5),
(13, 139853, 5),
(14, 653655, 7),
(15, 658222, 7),
(16, 658214, 7),
(17, 658532, 7),
(18, 634512, 7);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lots_concours1_idx` (`concours_id`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_participation_concours1_idx` (`concours_id`),
  ADD KEY `fk_participation_users1_idx` (`users_id_fb`);

--
-- Index pour la table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_fb`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vote_participation1_idx` (`participation_idparticipation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `lots`
--
ALTER TABLE `lots`
  ADD CONSTRAINT `fk_lots_concours1` FOREIGN KEY (`concours_id`) REFERENCES `concours` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_participation_concours1` FOREIGN KEY (`concours_id`) REFERENCES `concours` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participation_users1` FOREIGN KEY (`users_id_fb`) REFERENCES `users` (`id_fb`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `fk_vote_participation1` FOREIGN KEY (`participation_idparticipation`) REFERENCES `participation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
