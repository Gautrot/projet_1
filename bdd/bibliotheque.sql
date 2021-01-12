-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 jan. 2021 à 07:48
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
  `mail` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
