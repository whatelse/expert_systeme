-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Juin 2014 à 23:08
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
(8, 'Je souhaite developper avec un langage de l''univers Microsoft'),
(9, 'Je souhaite developper avec un langage de l''univers MAC'),
(10, 'Je souhaite developper avec un langage opensource'),
(11, 'Je souhaite developper avec un langage propriétaire'),
(12, 'Je souhaite developper avec un langage serveur'),
(13, 'Je souhaite developper avec un langage client'),
(40, 'Je souhaite un langage avec un typage fort'),
(41, 'Je souhaite un langage avec un typage faible'),
(59, 'Je souhaite un langage compile au vol'),
(62, 'Une application mobile'),
(63, 'Une application web'),
(64, 'Une application station de travail'),
(71, 'Je suis expert'),
(72, 'Je suis debutant'),
(73, 'J''utilise une plateforme windows de developpement'),
(74, 'J''utilise une plateforme linux de developpement'),
(106, 'Je suis a l''aise avec la programmation fonctionnelle'),
(107, 'Je ne suis pas a l''aise avec la programmation fonctionnelle'),
(108, 'Je souhaite un langage cree recemment'),
(109, 'Je ne souhaite un vieux langage'),
(110, 'Je souhaite un langage objet'),
(111, 'Je ne souhaite pas un langage objet'),
(112, 'Je veux utiliser un langage de haut niveau'),
(113, 'Je veux utiliser un langage bas niveau'),
(114, 'Je souhaite utiliser le framework .NET'),
(115, 'Je ne souhaite pas utiliser le framework .NET'),
(116, 'Je veux faire du web'),
(117, 'Je veux faire du systeme'),
(118, 'Je souhaite developper avec un langage client'),
(119, 'Je souhaite developper avec un langage serveur.');

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
(56, 'Dans quel univers souhaitez-vous developper ?', '7,71', '8,9,10,11'),
(57, 'Souhaitez-vous utiliser le framework .NET ?', '8,7,71', '114,115'),
(60, 'Langage objet ?', '10,7,71', '110,111'),
(61, 'Quel type d''application souhaitez-vous realiser ?', '11,7,71', '62,63,64'),
(64, 'Voulez-vous que votre code soit executer cote client ou serveur ?', '4,71', '12,13'),
(65, 'Sur quel environnement developpez-vous ?', '12,4,71', '73,74'),
(66, 'Quelle utilisation ?', '59,71', '116,117'),
(67, 'Souhaitez-vous un langage fortement type ?', '3,71', '40,41'),
(68, 'Souaitez-vous un langage cree recemment ?', '41,3,71', '108,109'),
(69, 'Vous preferez un langage de haut ou bas niveau ?', '110,10,7,71', '112,113'),
(70, 'Etes-vous a l''aise avec la programmation fonctionnelle ?', '40,3,71', '106,107'),
(75, 'Powershell', '73,12,4,71', ''),
(76, 'Bash', '74,12,4,71', ''),
(89, 'Swift', '9,7,71', ''),
(90, 'Javascript', '13,4,71', ''),
(91, 'Perl', '117,59,71', ''),
(92, 'PHP', '116,59,71', ''),
(95, 'C++', '118,113,110,10,7,71', ''),
(96, 'Go', '119,113,110,10,7,71', ''),
(98, 'C', '111,10,7,71', ''),
(99, 'WinDev Mobile', '62,11,7,71', ''),
(100, 'WebDev', '63,11,7,71', ''),
(101, 'WinDev', '64,11,7,71', ''),
(102, 'Common Lisp', '108,41,3,71', ''),
(103, 'Lisp', '109,41,3,71', ''),
(104, 'Clojure', '106,40,3,71', ''),
(105, 'Scala', '107,40,3,71', ''),
(120, 'VB', '114,8,7,71', ''),
(121, 'VBA', '115,8,7,71', ''),
(122, 'Java', '112,110,10,7,71', ''),
(123, 'Vous souhaitez coder une application de type client ? serveur ?', '113,110,10,7,71', '118,119');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
