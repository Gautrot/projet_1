-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 mars 2021 à 07:52
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
  `RefCd` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CdNom` varchar(50) COLLATE utf8_bin NOT NULL,
  `CdAut` varchar(50) COLLATE utf8_bin NOT NULL,
  `CdTh` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`RefCd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `RefFilm` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FilmNom` varchar(50) COLLATE utf8_bin NOT NULL,
  `FilmAut` varchar(50) COLLATE utf8_bin NOT NULL,
  `FilmTh` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`RefFilm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `RefLiv` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `LivNom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `LivAut` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `LivTh` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`RefLiv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `dateNaissance` char(10) COLLATE utf8_bin DEFAULT NULL,
  `rang` char(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `nom`, `prenom`, `dateNaissance`, `rang`) VALUES
(1, 'a@gmail.com', 'a', 'A', 'A', '01-01-2000', 'ADM'),
(2, 'b@gmail.com', 'b', 'B', 'B', NULL, 'USR'),
(3, 'c@gmail.com', 'c', 'C', 'C', NULL, 'USR');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
