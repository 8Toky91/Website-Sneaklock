-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 avr. 2023 à 07:48
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sneaklock`
--

-- --------------------------------------------------------

--
-- Structure de la table `chaussure`
--

DROP TABLE IF EXISTS `chaussure`;
CREATE TABLE IF NOT EXISTS `chaussure` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) NOT NULL,
  `pointure` int NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `style` enum('montante','sneakers') NOT NULL,
  `modele` varchar(50) NOT NULL,
  `statut` enum('en stock','hors stock') NOT NULL DEFAULT 'en stock',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `chaussure` (`id`, `marque`, `pointure`, `couleur`, `style`, `modele`, `statut`) VALUES
(1, 'Nike', 38, 'Blanche', 'sneakers', 'Air Max 90', 'en stock'),
(2, 'Nike', 40, 'Noire', 'sneakers', 'Air Max 90', 'en stock'),
(3, 'Nike', 42, 'Blanche', 'sneakers', 'Air Force 1', 'en stock'),
(4, 'Nike', 44, 'Rouge', 'sneakers', 'Cortez', 'en stock'),
(5, 'Adidas', 38, 'Blanche', 'sneakers', 'Stan Smith', 'en stock'),
(6, 'Adidas', 40, 'Noire', 'sneakers', 'Superstar', 'en stock'),
(7, 'Adidas', 42, 'Verte', 'sneakers', 'Gazelle', 'en stock'),
(8, 'Puma', 44, 'Rouge', 'sneakers', 'Suede Classic', 'en stock'),
(9, 'Puma', 38, 'Blanche', 'sneakers', 'Basket Classic', 'en stock'),
(10, 'Jordan', 40, 'Noire', 'montante', 'Air Jordan 1', 'en stock'),
(11, 'Jordan', 42, 'Blanche', 'montante', 'Air Jordan 4', 'en stock'),
(12, 'Jordan', 44, 'Rouge', 'montante', 'Air Jordan 11', 'en stock'),
(13, 'Jordan', 46, 'Noire', 'montante', 'Air Jordan 13', 'en stock'),
(14, 'Reebok', 38, 'Blanche', 'sneakers', 'Club C 85', 'en stock'),
(15, 'Reebok', 40, 'Noire', 'sneakers', 'Classic Leather', 'en stock'),
(16, 'Reebok', 42, 'Bleue', 'sneakers', 'Workout Plus', 'en stock'),
(17, 'Nike', 44, 'Noire', 'montante', 'Air Jordan 1', 'en stock'),
(18, 'Nike', 46, 'Blanche', 'montante', 'Air Force 1', 'en stock'),
(19, 'Adidas', 38, 'Noire', 'sneakers', 'Yeezy Boost 350', 'en stock'),
(20, 'Adidas', 40, 'Blanche', 'sneakers', 'NMD R1', 'en stock'),
(21, 'Adidas', 42, 'Noire', 'sneakers', 'Ultra Boost', 'en stock'),
(22, 'Jordan', 44, 'Rouge', 'montante', 'Air Jordan 6', 'en stock'),
(29, 'Adidas', 36, 'Noir', 'sneakers', 'Stan Smith', 'en stock'),
(28, 'Jordan', 31, 'Blanche', 'montante', 'Oreo', 'en stock');

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int NOT NULL AUTO_INCREMENT,
  `modele` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `pointure` int NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `style` enum('montante','sneakers') NOT NULL,
  `quantite` int NOT NULL,
  `statut` enum('en stock','hors stock') NOT NULL DEFAULT 'en stock',
  `id_vendeur` int DEFAULT NULL,
  `jour_de_vente` date DEFAULT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `id_vendeur` (`id_vendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `stock` (`id_stock`, `modele`, `marque`, `pointure`, `couleur`, `style`, `quantite`, `statut`, `id_vendeur`, `jour_de_vente`) VALUES
(1, 'Air Max 90', 'Nike', 45, 'Blanche', 'sneakers', 0, '', NULL, '2022-01-08'),
(2, 'Air Max 90', 'Nike', 42, 'Noire', 'sneakers', 4, 'en stock', 9, '2022-04-16'),
(3, 'Air Force 1', 'Nike', 39, 'Blanche', 'sneakers', 0, '', NULL, '2022-02-11'),
(4, 'Cortez', 'Nike', 41, 'Rouge', 'sneakers', 10, 'en stock', 10, '2022-12-19'),
(5, 'Stan Smith', 'Adidas', 45, 'Blanche', 'sneakers', 8, 'en stock', 3, '2022-09-15'),
(6, 'Superstar', 'Adidas', 43, 'Noire', 'sneakers', 5, 'en stock', 4, '2022-08-18'),
(7, 'Gazelle', 'Adidas', 40, 'Verte', 'sneakers', 0, '', NULL, '2023-01-10'),
(8, 'Suede Classic', 'Puma', 44, 'Rouge', 'sneakers', 6, 'en stock', 9, '2022-09-22'),
(9, 'Basket Classic', 'Puma', 44, 'Blanche', 'sneakers', 4, 'en stock', 5, '2022-07-19'),
(10, 'Air Jordan 1', 'Jordan', 39, 'Noire', 'montante', 0, '', NULL, '2022-07-25'),
(11, 'Air Jordan 4', 'Jordan', 41, 'Blanche', 'montante', 0, '', NULL, '2023-03-05'),
(12, 'Air Jordan 11', 'Jordan', 46, 'Rouge', 'montante', 0, '', NULL, '2022-05-27'),
(13, 'Air Jordan 13', 'Jordan', 44, 'Noire', 'montante', 5, 'en stock', 7, '2023-01-02'),
(14, 'Club C 85', 'Reebok', 45, 'Blanche', 'sneakers', 7, 'en stock', 4, '2022-01-13'),
(15, 'Classic Leather', 'Reebok', 41, 'Noire', 'sneakers', 0, '', NULL, '2022-12-08'),
(16, 'Workout Plus', 'Reebok', 46, 'Bleue', 'sneakers', 0, '', NULL, '2022-10-19'),
(17, 'Air Jordan 1', 'Nike', 45, 'Noire', 'montante', 0, '', NULL, '2023-03-11'),
(18, 'Air Force 1', 'Nike', 46, 'Blanche', 'montante', 0, '', NULL, '2023-01-13'),
(19, 'Yeezy Boost 350', 'Adidas', 40, 'Noire', 'sneakers', 8, 'en stock', 8, '2022-05-03'),
(20, 'NMD R1', 'Adidas', 39, 'Blanche', 'sneakers', 5, 'en stock', 7, '2023-02-04'),
(21, 'Ultra Boost', 'Adidas', 43, 'Noire', 'sneakers', 0, '', NULL, '2022-09-08'),
(22, 'Air Jordan 6', 'Jordan', 44, 'Rouge', 'montante', 8, 'en stock', 2, '2022-02-25'),
(23, 'Air Max 90', 'Nike', 40, 'Blanche', 'sneakers', 0, 'en stock', NULL, '2023-03-20'),
(24, 'Air Max 90', 'Nike', 40, 'Noire', 'sneakers', 4, 'hors stock', 7, '2022-07-30'),
(25, 'Air Force 1', 'Nike', 39, 'Blanche', 'sneakers', 0, 'hors stock', NULL, '2022-07-01'),
(26, 'Cortez', 'Nike', 46, 'Rouge', 'sneakers', 6, 'hors stock', 7, '2022-10-03'),
(27, 'Stan Smith', 'Adidas', 41, 'Blanche', 'sneakers', 0, 'en stock', NULL, '2023-01-08'),
(28, 'Superstar', 'Adidas', 39, 'Noire', 'sneakers', 0, 'en stock', NULL, '2022-04-29'),
(29, 'Gazelle', 'Adidas', 43, 'Verte', 'sneakers', 0, 'en stock', NULL, '2023-01-28'),
(30, 'Suede Classic', 'Puma', 40, 'Rouge', 'sneakers', 0, 'hors stock', NULL, '2022-08-15'),
(31, 'Basket Classic', 'Puma', 39, 'Blanche', 'sneakers', 0, 'hors stock', NULL, '2023-02-20'),
(32, 'Air Jordan 1', 'Jordan', 41, 'Noire', 'montante', 0, 'hors stock', NULL, '2022-01-19'),
(33, 'Air Jordan 4', 'Jordan', 44, 'Blanche', 'montante', 3, 'hors stock', 6, '2022-08-14'),
(34, 'Air Jordan 11', 'Jordan', 40, 'Rouge', 'montante', 0, 'hors stock', NULL, '2022-06-02'),
(35, 'Air Jordan 13', 'Jordan', 39, 'Noire', 'montante', 0, 'en stock', NULL, '2022-03-29'),
(36, 'Club C 85', 'Reebok', 39, 'Blanche', 'sneakers', 10, 'hors stock', 4, '2023-03-17'),
(37, 'Classic Leather', 'Reebok', 45, 'Noire', 'sneakers', 0, 'hors stock', NULL, '2022-04-11'),
(38, 'Workout Plus', 'Reebok', 43, 'Bleue', 'sneakers', 0, 'hors stock', NULL, '2022-04-09'),
(39, 'Air Jordan 1', 'Nike', 40, 'Noire', 'montante', 0, 'en stock', NULL, '2022-07-10'),
(40, 'Air Force 1', 'Nike', 39, 'Blanche', 'montante', 4, 'hors stock', 3, '2022-07-19'),
(41, 'Yeezy Boost 350', 'Adidas', 45, 'Noire', 'sneakers', 0, 'en stock', NULL, '2023-03-02'),
(42, 'NMD R1', 'Adidas', 41, 'Blanche', 'sneakers', 0, 'hors stock', NULL, '2022-05-28'),
(43, 'Ultra Boost', 'Adidas', 42, 'Noire', 'sneakers', 9, 'hors stock', 8, '2023-01-17'),
(44, 'Air Jordan 6', 'Jordan', 39, 'Rouge', 'montante', 9, 'hors stock', 6, '2022-03-26'),
(45, '6 Cactus Jack', 'Jordan', 31, 'vert', 'montante', 0, 'en stock', NULL, NULL);

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(6, 'ALLA', 'Assel', 'asselalla93@gmail.com', 'asselallA91'),
(4, 'Patole', 'Thibaut', 'thibpatole@gmail.com', 'Bobo'),
(7, 'administrateur', 'None', 'None', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id_vendeur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `num_vendeur` int NOT NULL,
  PRIMARY KEY (`id_vendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id_vendeur`, `nom`, `prenom`, `num_vendeur`) VALUES
(1, 'Martin', 'Emma', 243),
(2, 'Durand', 'Liam', 286),
(3, 'Lefebvre', 'Noah', 203),
(4, 'Dubois', 'Ava', 258),
(5, 'Moreau', 'Oliver', 177),
(6, 'Fournier', 'Ethan', 214),
(7, 'Girard', 'Sophia', 239),
(8, 'Caron', 'Mia', 252),
(9, 'Roux', 'Jackson', 243),
(10, 'Lemoine', 'Amelia', 160),
(12, 'Patrick', 'Theophile', 268);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
