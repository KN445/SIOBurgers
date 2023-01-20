-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 jan. 2023 à 09:06
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `burger`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `date_ajout` date NOT NULL,
  `dispo` tinyint(1) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `date_ajout`, `dispo`, `image`) VALUES
(1, 'Master', 'Steak haché, lard, double cheddar fondu, salade, sauce tartare', 6.5, '2023-01-06', 1, 'master.png'),
(2, 'Big Mac', 'Boeuf', 7, '2023-01-06', 0, 'big-mac.jpg'),
(3, 'Stacker', '4 steaks, bacons, onion rings', 4.5, '2023-01-06', 1, 'stacker.jpg'),
(4, 'KING', 'desc', 9.7, '2023-01-17', 1, 'b5.jpg'),
(5, 'VEGGIE', 'desc', 8.9, '2023-01-17', 0, 'b2.jpg'),
(6, 'CROUSTY', 'desc', 8.5, '2023-01-17', 1, 'b7.jpg'),
(7, 'CHICKEN', 'desc', 9, '2023-01-17', 1, 'b.jpg'),
(8, 'FISH', 'desc', 7.8, '2023-01-17', 1, 'b.jpg'),
(9, 'CHEESE', 'desc', 8.5, '2023-01-17', 1, 'b9.jpg'),
(10, 'CLASSIC', 'desc', 8.2, '2023-01-17', 0, 'b10.jpg'),
(11, 'BIG', 'desc', 9.2, '2023-01-17', 0, 'b.jpg'),
(12, 'DOUBLE', 'desc', 8.6, '2023-01-17', 1, 'b.jpg'),
(13, 'BUFFALO', 'desc', 8.7, '2023-01-17', 1, 'b.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
