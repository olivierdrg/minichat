-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 10 Juin 2016 à 11:26
-- Version du serveur: 5.6.28-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `minichat`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_author` int(11) unsigned NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(1023) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `id_author`, `pseudo`, `date`, `content`) VALUES
(1, 1, 'Bleu', '2016-06-10 09:26:17', 'IL fait beau aujourd''hui !'),
(2, 2, 'Rouge', '2016-06-10 09:26:17', 'C''est génial le chat :)'),
(3, 1, 'Bleu', '2016-06-10 09:26:17', 'Tu fais quoi ce weekend ?'),
(4, 2, 'Rouge', '2016-06-10 09:26:17', 'Ben euh j''sais pas...'),
(5, 1, 'Bleu', '2016-06-10 09:26:17', 'Moi non plus :))');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
