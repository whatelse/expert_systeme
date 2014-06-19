-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Juin 2014 à 21:01
-- Version du serveur :  5.5.37-0ubuntu0.12.04.1
-- Version de PHP :  5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `expert`
--

-- --------------------------------------------------------

--
-- Structure de la table `fait`
--

CREATE TABLE IF NOT EXISTS `fait` (
  `id` int(11) NOT NULL,
  `fait` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fait`
--

INSERT INTO `fait` (`id`, `fait`) VALUES
(3, 'Je veux un langage fonctionnel'),
(4, 'Je veux un langage interprete'),
(7, 'Je souhaite realiser un site web dynamique'),
(12, 'Je souhaite developper avec un langage serveur'),
(13, 'Je souhaite developper avec un langage client'),
(59, 'Je souhaite un langage compile au vol'),
(71, 'Je suis expert'),
(72, 'Je suis debutant'),
(73, 'J''utilise une plateforme windows de developpement'),
(74, 'J''utilise une plateforme linux de developpement');

-- --------------------------------------------------------

--
-- Structure de la table `regle`
--

CREATE TABLE IF NOT EXISTS `regle` (
  `id` int(11) NOT NULL,
  `but` varchar(255) NOT NULL,
  `faits_precedents` varchar(255) NOT NULL DEFAULT '',
  `faits_suivants` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `regle`
--

INSERT INTO `regle` (`id`, `but`, `faits_precedents`, `faits_suivants`) VALUES
(54, 'Etes vous developpeur debutant ou expert ?', '', '71,72'),
(55, 'Parmis ceux-ci, quel type de langage souhaites-tu ?', '71', '3,4,7,59'),
(64, 'Voulez-vous que votre code soit executer côté client ou serveur ?', '4,71', '12,13'),
(65, 'Sur quel environnement développez-vous ?', '12,4,71', '73,74'),
(75, 'Powershell', '73,12,4,71', ''),
(76, 'Bash', '74,12,4,71', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
