-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 nov. 2020 à 21:07
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maintenance`
--

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Date_intervention` date NOT NULL,
  `Type_intervention` text NOT NULL,
  `Etage_intervention` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`id`, `Date_intervention`, `Type_intervention`, `Etage_intervention`) VALUES
(2, '2020-08-12', 'Une ampoule de changer.', 2),
(3, '2020-11-13', 'rgjlwhikhdv', 5),
(4, '2020-11-13', 'rgjlwhikhdv', 5),
(5, '2020-11-13', 'rgjlwhikhdv', 5),
(6, '2020-11-13', 'rgjlwhikhdv', 5),
(7, '2020-11-13', 'rgjlwhikhdv', 5),
(8, '2020-11-13', 'rgjlwhikhdv', 5),
(9, '2020-11-13', 'rgjlwhikhdv', 5),
(10, '2020-11-13', 'rgjlwhikhdv', 5),
(11, '2020-11-13', 'rgjlwhikhdv', 5),
(12, '2020-11-13', 'rgjlwhikhdv', 5),
(13, '2020-11-19', 'OOOOOOOOOOOOOO', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
