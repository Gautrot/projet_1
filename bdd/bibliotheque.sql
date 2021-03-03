-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 mars 2021 à 14:46
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
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `cd`
--

DROP TABLE IF EXISTS `cd`;
CREATE TABLE IF NOT EXISTS `cd` (
  `refcd` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cdnom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cdaut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cdth` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`refcd`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cd`
--

INSERT INTO `cd` (`refcd`, `cdnom`, `cdaut`, `cdth`) VALUES
(1, 'te', 'te', 'te');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `reffilm` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `filmnom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `filmaut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `filmth` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`reffilm`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`reffilm`, `filmnom`, `filmaut`, `filmth`) VALUES
(1, 'az', 'az', 'az');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `refliv` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `livnom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `livaut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `livth` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`refliv`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`refliv`, `livnom`, `livaut`, `livth`) VALUES
(1, 'az', 'az', 'az'),
(2, 'cv', 'cv', 'cv');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mdp` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `datenaissance` char(10) COLLATE utf8_bin DEFAULT NULL,
  `rang` char(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `nom`, `prenom`, `datenaissance`, `rang`) VALUES
(1, 'a@gmail.com', 'a', 'A', 'A', '01-01-2000', 'ADM'),
(2, 'b@gmail.com', 'b', 'B', 'B', NULL, 'USR'),
(3, 'c@gmail.com', 'c', 'C', 'C', NULL, 'USR'),
(4, 'az@az.fr', 'az', 'az', 'az', NULL, 'ADM'),
(5, 'xc@xc.fr', NULL, 'xc', 'xc', NULL, 'USR'),
(6, 'test@test.fr', 'test', 'test', 'test', '01-01-2020', 'USR');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
