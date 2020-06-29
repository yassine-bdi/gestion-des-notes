-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 mai 2019 à 22:43
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionnotes`
--

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `infographie_ecrit` float NOT NULL,
  `infographie_orale` float NOT NULL,
  `english_ecrit` float NOT NULL,
  `english_orale` float NOT NULL,
  `sys_reseau_ecrit` float NOT NULL,
  `sys_reseau_orale` float NOT NULL,
  `C_html_ecrit` float NOT NULL,
  `C_html_orale` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137451024 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `nom`, `infographie_ecrit`, `infographie_orale`, `english_ecrit`, `english_orale`, `sys_reseau_ecrit`, `sys_reseau_orale`, `C_html_ecrit`, `C_html_orale`) VALUES
(137451017, 'yassine bouabadi', 13, 15, 13, 13, 15, 14, 16.2, 12.5),
(2, 'said ait ahmad', 14, 12, 13, 13, 13, 16, 17, 13),
(4, 'imad kayron', 14, 13.5, 12.5, 14, 14, 16.5, 13.25, 15.5),
(5, 'amine el amine', 14.5, 15, 13, 16, 17, 17, 13, 14),
(137451018, 'karim el yahyaoui', 14.25, 16, 13, 17, 15, 15, 16.75, 12.5),
(137451019, 'sasas', 14, 13, 12.5, 12.5, 16.2, 13.5, 14.5, 13.5),
(137451020, 'hamid acharqui', 14, 13, 14.2, 15, 17, 15, 12, 13),
(137451021, 'fatima elhaouz', 14.5, 13, 14.2, 15, 17, 15, 12, 13),
(137451022, 'alouani fatima zahrae', 14.5, 17, 13, 18, 12, 13, 17, 13.5),
(137451023, 'anass hawl', 15, 13, 12, 12.5, 18.5, 13.5, 12.5, 15.6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
