-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 25 Mars 2016 à 10:55
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sportymates`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `idClub` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(200) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `heureOuverture` time NOT NULL,
  `heureFermeture` time NOT NULL,
  `jourOuverture` varchar(10) NOT NULL,
  `jourFermeture` varchar(10) NOT NULL,
  PRIMARY KEY (`idClub`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(1000) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `nomGroupe` varchar(100) NOT NULL,
  `idClub` int(11) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  PRIMARY KEY (`idCommentaire`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `lieu` varchar(100) NOT NULL,
  PRIMARY KEY (`idEvenement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faitpartide`
--

DROP TABLE IF EXISTS `faitpartide`;
CREATE TABLE IF NOT EXISTS `faitpartide` (
  `nomGroupe` varchar(100) NOT NULL,
  `nomUtilisateur` varchar(30) NOT NULL,
  PRIMARY KEY (`nomGroupe`,`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `nomGroupe` varchar(100) NOT NULL,
  `leader` varchar(30) NOT NULL,
  `nomSport` varchar(30) NOT NULL,
  `idClub` int(11) NOT NULL,
  `creation` datetime NOT NULL,
  PRIMARY KEY (`nomGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nomGroupe`, `leader`, `nomSport`, `idClub`, `creation`) VALUES
('groupetest', 'Amrita', 'APP', 312, '2016-03-22 10:11:00'),
('alpha', 'Amrita', 'APP', 312, '2016-03-22 10:11:00');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `nomUtilisateur` varchar(30) NOT NULL,
  `civilite` enum('M','Mme') DEFAULT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `pays` varchar(30) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `motDePasse` varchar(20) NOT NULL,
  `adresseMail` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `noterclub`
--

DROP TABLE IF EXISTS `noterclub`;
CREATE TABLE IF NOT EXISTS `noterclub` (
  `idClub` int(11) NOT NULL,
  `nomUtilisateur` varchar(30) NOT NULL,
  `note` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`idClub`,`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notergroupe`
--

DROP TABLE IF EXISTS `notergroupe`;
CREATE TABLE IF NOT EXISTS `notergroupe` (
  `nomGroupe` varchar(100) NOT NULL,
  `nomUtilisateur` varchar(30) NOT NULL,
  `note` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`nomGroupe`,`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

DROP TABLE IF EXISTS `participe`;
CREATE TABLE IF NOT EXISTS `participe` (
  `nomUtilisateur` varchar(30) NOT NULL,
  `idEvenement` int(11) NOT NULL,
  PRIMARY KEY (`idEvenement`,`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE IF NOT EXISTS `rubrique` (
  `idRubrique` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`idRubrique`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `nomSport` varchar(30) NOT NULL,
  `type` enum('Collectif','Individuel') NOT NULL,
  PRIMARY KEY (`nomSport`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
