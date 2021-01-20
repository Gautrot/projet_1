-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 jan. 2021 à 16:02
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `user_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `ex3`
--

DROP TABLE IF EXISTS `ex3`;
CREATE TABLE IF NOT EXISTS `ex3` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(40) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ex3`
--

INSERT INTO `ex3` (`id`, `login`, `password`, `email`) VALUES
(1, 'A', 'a', 'a@gmail.com'),
(2, 'B', 'b', 'b@gmail.com'),
(3, 'C', 'c', 'c@gmail.com'),
(4, 'D', 'd', 'd@gmail.com'),
(5, 'E', 'e', 'e@gmail.com'),
(6, 'F', 'f', 'f@gmail.fr'),
(7, 'G', 'g', 'g@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
