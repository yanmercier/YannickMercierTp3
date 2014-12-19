-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Lun 03 Novembre 2014 à 03:03
-- Version du serveur :  5.5.39
-- Version de PHP :  5.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tp2golf`
--

-- --------------------------------------------------------

--
-- Structure de la table `golfclubs`
--

CREATE TABLE `golfclubs` (
`id` int(11) NOT NULL,
  `golfname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `golfadress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `golfemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `golfclubs`
--

INSERT INTO `golfclubs` (`id`, `golfname`, `golfadress`, `golfemail`) VALUES
(1, 'Golf Larrivière', '128 rue Dagenais', 'golfl@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
`id` int(11) NOT NULL,
  `playerPlace` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `playerScore` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `participants`
--

INSERT INTO `participants` (`id`, `playerPlace`, `playerScore`, `player_id`) VALUES
(1, '2', '13', 1),
(3, '1', '10', 2);

-- --------------------------------------------------------

--
-- Structure de la table `participants_tournaments`
--

CREATE TABLE `participants_tournaments` (
`id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `participants_tournaments`
--

INSERT INTO `participants_tournaments` (`id`, `participant_id`, `tournament_id`) VALUES
(1, 1, 3),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
`id` int(11) NOT NULL,
  `playerName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `playerAddress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `playerEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `players`
--

INSERT INTO `players` (`id`, `playerName`, `playerAddress`, `playerEmail`) VALUES
(1, 'Phil', '475 rue Poirrier', 'phil@hotmail.com'),
(2, 'Yan', '475 rue ovide', 'yan@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tournaments`
--

CREATE TABLE `tournaments` (
`id` int(11) NOT NULL,
  `tournamentsName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sponsor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `golfclub_id` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tournamentsName`, `sponsor`, `email`, `created`, `modified`, `user_id`, `participant_id`, `golfclub_id`) VALUES
(1, 'Golf UFO', 'Nike Will', 'golfufo@hotmail.com', '2014-09-15 08:30:32', '2014-09-18 19:44:15', 14, 0, 0),
(2, 'Golf Le Cardinal', 'Pepsi', 'golfcardinal@hotmail.com', '2014-09-15 08:30:32', '0000-00-00 00:00:00', 15, 0, 0),
(3, 'Golf Phil', 'PhilUser', 'phil@hotmail.com', '2014-10-23 23:05:42', '2014-10-24 16:20:59', 14, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(14, 'phil', '$2a$10$IpFiuK/PTYQqs866kjsQKOOePOmj7LO3lIKXn40WbQ0Q5N4oj9RFS', 'superuser', '2014-10-23 22:04:28', '2014-10-23 22:04:28'),
(13, 'yan', '$2a$10$QKPtuLoveFY56WXsVY2/FOYm1cmrGgv/quWWJaUUA8ZimKK4S0eUm', 'admin', '2014-10-23 22:04:15', '2014-10-23 22:04:15'),
(15, 'fred', '$2a$10$W10Sv.P6ulFn1oa/UfJI8ObNCwf3sLm4qoGW/vrmLq.xEBJ1eI2B6', 'superuser', '2014-10-23 22:04:43', '2014-10-23 22:04:43'),
(16, 'olivier', '$2a$10$0zV9AOooYuDJKQ5ftjWYoeoLwurB1AhFZlzLfbis86SywnflYMj4q', 'superuser', '2014-10-23 23:59:22', '2014-10-23 23:59:22');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `golfclubs`
--
ALTER TABLE `golfclubs`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participants_tournaments`
--
ALTER TABLE `participants_tournaments`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tournaments`
--
ALTER TABLE `tournaments`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `golfclubs`
--
ALTER TABLE `golfclubs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `participants_tournaments`
--
ALTER TABLE `participants_tournaments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tournaments`
--
ALTER TABLE `tournaments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
