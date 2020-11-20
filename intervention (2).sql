-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 nov. 2020 à 09:05
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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`id`, `Date_intervention`, `Type_intervention`, `Etage_intervention`) VALUES
(39, '2020-11-12', 'remplacement ampoule couloir ', 1),
(38, '2020-11-09', 'changement de la prise chambre 7', 3),
(33, '2020-11-17', 'changer le pied de chaise de la chambre 6', 2),
(32, '2020-11-02', 'Changer le pied de lit chambre 4', 3),
(31, '2020-11-02', 'remplacement de la vitre de la chambre 2', 1),
(37, '2020-11-12', 'remplacement ampoule couloir ', 1),
(35, '2020-11-05', 'FenÃªtre du couloir principal deblquer', 2),
(36, '2020-11-09', 'changement de la prise chambre 7', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
