-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 avr. 2019 à 08:41
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercicert`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `author` varchar(250) CHARACTER SET latin1 NOT NULL,
  `visible` enum('0','1') NOT NULL DEFAULT '1',
  `signals` enum('0','1') NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_article`, `content`, `author`, `visible`, `signals`, `date`) VALUES
(12, 6, 'Cool !', 'Maxime', '1', '0', '2019-04-16 11:37:43'),
(21, 5, 'Super !', 'Maxime', '1', '1', '2019-04-19 15:17:06'),
(22, 4, 'Cool !', 'Maxime', '1', '0', '2019-04-19 15:39:21'),
(23, 5, 'TEST', 'Maxime', '1', '1', '2019-04-23 16:33:59'),
(26, 6, 'TEST', 'Maxime', '1', '0', '2019-04-25 11:09:03'),
(27, 6, 'TEST #2', 'Maxime ', '1', '0', '2019-04-25 11:09:13');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Jean FORTEROCHE',
  `visible` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `author`, `visible`) VALUES
(4, 'Mon quatrième article', 'Une fois les objets définis, vous allez démarrer Wamp et aller sur PHPMyAdmin.\r\n\r\nNb: WAMP est une suite d\'outils packagé offrant sous Windows un environnement de développement à base de PHP, MySQL et serveur Apache, ainsi que des outils comme PhpMyAdmin. Il existe des équivalents Mac comme MAMP, et Linux comme LAMP.\r\n\r\nUne fois dedans, cliquez sur \"Créer la base de données\", et nommez-la (ici elle aura pour nom \"my_lazy_blog\"). Choisissez ensuite utf8_unicode_ci pour l\'interclassement.', '2019-04-04 10:01:59', 'Maxime MORA', '1'),
(5, 'Mon cinquième article', 'Une fois les objets définis, vous allez démarrer Wamp et aller sur PHPMyAdmin.\r\n\r\nNb: WAMP est une suite d\'outils packagé offrant sous Windows un environnement de développement à base de PHP, MySQL et serveur Apache, ainsi que des outils comme PhpMyAdmin. Il existe des équivalents Mac comme MAMP, et Linux comme LAMP.\r\n\r\nUne fois dedans, cliquez sur \"Créer la base de données\", et nommez-la (ici elle aura pour nom \"my_lazy_blog\"). Choisissez ensuite utf8_unicode_ci pour l\'interclassement.', '2019-04-04 10:02:19', 'Maxime MORA', '1'),
(6, 'Mon sixième article', '<p>Plusieurs variables pr&eacute;d&eacute;finies en PHP sont \"superglobales\", ce qui signifie qu\'elles sont disponibles quel que soit le contexte du script. Il est inutile de faire global $variable; avant d\'y acc&eacute;der dans les fonctions ou les m&eacute;thodes. Les variables superglobales sont :-</p>\r\n<p>Plusieurs variables pr&eacute;d&eacute;finies en PHP sont \"superglobales\", ce qui signifie qu\'elles sont disponibles quel que soit le contexte du script. Il est inutile de faire global $variable; avant d\'y acc&eacute;der dans les fonctions ou les m&eacute;thodes. Les variables superglobales sont :-</p>', '2019-04-09 11:28:03', 'Maxime MORA', '1');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `date`) VALUES
(1, 'pro@maximemora.com', '701b290b78989cb679097eb5e1409ab702641dfe', '2019-04-17 14:42:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
