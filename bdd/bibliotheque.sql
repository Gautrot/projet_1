-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2021 at 11:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `cd`
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
-- Table structure for table `film`
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
-- Table structure for table `livre`
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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `mdp` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dateNaissance` char(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `nom`, `prenom`, `dateNaissance`) VALUES
(1, 'a@gmail.com', 'a', 'A', 'A', '01-01-2000'),
(2, 'b@gmail.com', 'b', 'B', 'B', NULL),
(3, 'c@gmail.com', 'c', 'C', 'C', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
