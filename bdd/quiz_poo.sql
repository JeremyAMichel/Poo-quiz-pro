-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 28 juil. 2023 à 12:00
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
-- Base de données : `quiz_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id_answer` int NOT NULL AUTO_INCREMENT,
  `answer` varchar(50) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL,
  `id_question` int NOT NULL,
  PRIMARY KEY (`id_answer`),
  KEY `id_question` (`id_question`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id_answer`, `answer`, `isCorrect`, `id_question`) VALUES
(1, 'un patissier', 0, 1),
(2, 'bassiste de MJ', 0, 1),
(3, 'un mecanicien', 0, 1),
(4, 'Auteur/compositeur', 1, 1),
(5, 'mars', 0, 2),
(6, 'terre', 1, 2),
(7, 'venus', 0, 2),
(8, 'jupiter', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `qcms`
--

DROP TABLE IF EXISTS `qcms`;
CREATE TABLE IF NOT EXISTS `qcms` (
  `id_qcm` int NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_qcm`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qcms`
--

INSERT INTO `qcms` (`id_qcm`, `theme`) VALUES
(1, 'classique');

-- --------------------------------------------------------

--
-- Structure de la table `qcms_questions`
--

DROP TABLE IF EXISTS `qcms_questions`;
CREATE TABLE IF NOT EXISTS `qcms_questions` (
  `id_qcm` int NOT NULL,
  `id_question` int NOT NULL,
  PRIMARY KEY (`id_qcm`,`id_question`),
  KEY `id_question` (`id_question`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `qcms_questions`
--

INSERT INTO `qcms_questions` (`id_qcm`, `id_question`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int NOT NULL AUTO_INCREMENT,
  `intitulé` varchar(50) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `intitulé`) VALUES
(1, 'qui était mozart ?'),
(2, 'quel est la 3eme planete du systeme solaire ?');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
