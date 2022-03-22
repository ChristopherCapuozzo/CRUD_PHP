-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 mars 2022 à 08:25
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_admin`
--

DROP TABLE IF EXISTS `utilisateurs_admin`;
CREATE TABLE IF NOT EXISTS `utilisateurs_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs_admin`
--

INSERT INTO `utilisateurs_admin` (`id_admin`, `email`, `pass`) VALUES
(1, 'christopher@admin.etu', '96789678');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_etudiant`
--

DROP TABLE IF EXISTS `utilisateurs_etudiant`;
CREATE TABLE IF NOT EXISTS `utilisateurs_etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs_etudiant`
--

INSERT INTO `utilisateurs_etudiant` (`id_etudiant`, `email`, `pass`) VALUES
(1, 'christopher@etudiant.etu', '96789678');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_formateur`
--

DROP TABLE IF EXISTS `utilisateurs_formateur`;
CREATE TABLE IF NOT EXISTS `utilisateurs_formateur` (
  `id_formateur` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id_formateur`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs_formateur`
--

INSERT INTO `utilisateurs_formateur` (`id_formateur`, `email`, `pass`) VALUES
(1, 'christopher@formateur.etu', '96789678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
