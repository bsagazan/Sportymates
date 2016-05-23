-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Mai 2016 à 08:21
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
  `nomGroupe` varchar(100) DEFAULT NULL,
  `idClub` int(11) DEFAULT NULL,
  `auteur` varchar(30) NOT NULL,
  PRIMARY KEY (`idCommentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `contenu`, `dateHeure`, `nomGroupe`, `idClub`, `auteur`) VALUES
(1, 'Ce groupe est presque aussi stylé que Vincent en personne.', '2016-05-24 08:24:10', 'Running-fever', 1, 'Amrita&Nathalie&LiangYi'),
(2, 'Ce groupe est top ! Le principal défi est de courir plus vite que Vincent ! Cependant il est difficile a rattraper vu qu''il est dans le turfu ...', '2016-05-19 19:44:52', 'Running-fever', 1, 'Emilie&Baptiste');

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
  `idClub` int(11) DEFAULT NULL,
  `creation` datetime NOT NULL,
  `description` text NOT NULL,
  `nbinscritmax` int(11) NOT NULL,
  `niveau` enum('débutant','intermédiaire','experimenté') NOT NULL,
  PRIMARY KEY (`nomGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nomGroupe`, `leader`, `nomSport`, `idClub`, `creation`, `description`, `nbinscritmax`, `niveau`) VALUES
('Running-fever', 'Amrita', 'Course à pied', NULL, '2016-05-17 12:00:00', 'Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.', 20, 'débutant');

-- --------------------------------------------------------

--
-- Structure de la table `groupeinscrit`
--

DROP TABLE IF EXISTS `groupeinscrit`;
CREATE TABLE IF NOT EXISTS `groupeinscrit` (
  `nomUtilisateur` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nomGroupe` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupeinscrit`
--

INSERT INTO `groupeinscrit` (`nomUtilisateur`, `nomGroupe`) VALUES
('user', 'Running-fever'),
('user', 'Running-fever'),
('user', 'Running-fever'),
('user', 'Running-fever');

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
  `categorie` varchar(15) NOT NULL,
  PRIMARY KEY (`idRubrique`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rubrique`
--

INSERT INTO `rubrique` (`idRubrique`, `reponse`, `question`, `categorie`) VALUES
(1, 'Pour modifier votre mot de passe vous devez vous connecter, puis accéder à votre profil. Ensuite vous pouvez accéder à la fonctionnalité permettant cette possibilité.', 'Comment modifier mon mot de passe ?', 'Compte'),
(2, 'Pour récupérer votre mot de passe, cliquez sur "connexion" puis sur "mot de passe oublié". Vous devrez ensuite saisir l''adresse mail liée à votre compte, à laquelle sera envoyé un mail permettant d''établir un nouveau mot de passe.', 'Comment récupérer mon mot de passe ?', 'Compte'),
(3, 'En cas de piratage, contactez au plus vite un administrateur en utilisant la page "nous contacter".', 'Mon compte a été piraté, que faire ?', 'Compte'),
(4, 'Connectez vous sur le site, puis accédez à votre profil et cliquez sur "modifier mon profil" pour mettre à jour vos données.', 'Comment modifier les informations de mon profil ?', 'Compte'),
(5, 'Pour vous déconnecter il suffit de cliquez sur "se déconnecter" en haut à droite de chaque page.', 'Comment puis-je me déconnecter ?', 'Compte'),
(6, 'Pour rejoindre un groupe il faut cliquer sur le groupe, puis cliquer sur le bouton "rejoindre le groupe".', 'Comment puis-je rejoindre un groupe ?', 'groupe'),
(7, 'Pour devenir leader d''un groupe il faut soit l''avoir créer, soit demander au leader actuel qu''il vous désigne comme nouveau leader. Attention il ne peut y avoir qu''un leader par groupe.', 'Comment puis-je devenir leader d''un groupe ?', 'groupe'),
(8, 'Pour créer un groupe il faut vous rendre sur la page de navigation des groupes, puis cliquer sur le bouton "créer un groupe".', 'Comment puis-je créer un groupe ?', 'groupe'),
(9, 'Pour pouvoir modifier les données relatives à un groupe il faut être leader de ce dernier. Si c''est le cas alors il faut accéder à la page de groupe et cliquer sur "modifier les informations".', 'Comment modifier les informations d''un groupe ?', 'groupe'),
(10, 'Pour quitter un groupe il vous suffit de vous rendre sur la page du groupe, puis de cliquez sur le bouton "quitter le groupe".', 'Comment faire pour quitter un groupe ?', 'groupe'),
(11, 'Pour participer à un évènement il suffit de se rendre sur la page de l''évènement puis de cliquer sur "je participe".', 'Comment participer à un évènement ?', 'evenement'),
(12, 'Pour organiser un évènement il vous suffit de vous rendre sur la page de navigation des évènements puis de cliquer sur "Créer un évènement".', 'Comment organiser un évènement ?', 'evenement'),
(13, 'Pour modifier les informations d''un évènement vous devez en être l''organisateur. Rendez-vous sur la page de votre évènement puis cliquer sur "modifier les informations".', 'Comment modifier les informations d''un évènement ?', 'evenement'),
(14, '', '', 'evenement'),
(15, 'Pour créer un sujet sur le forum vous devez être connecté, puis une fois sur la page du forum, cliquer sur nouveau sujet.', 'Comment créer un sujet sur le forum ?', 'forum'),
(16, 'Certains commentaires peuvent être supprimés par un modérateur si leur contenu est jugé inapproprié.', 'Pourquoi certains de mes commentaires disparaissent ?', 'forum'),
(17, 'Pour pratiquer un sport, il vous suffit de rejoindre un groupe qui pratique ce sport, pour être tenu au courant des entrainements que le groupe organise.', 'Comment pratiquer un sport présent sur le site ?', 'sport'),
(18, 'Si vous voulez proposer un nouveau sport aux utilisateurs du site il faut contacter un administrateur du site. Il vous sera demandé le club dans lequel vous comptez organiser les entraînements. Une fois qu''un administrateur du site aura valider la disponibilité de ce sport, vous pourrez créer un groupe et commencer la pratique de ce sport.', 'Comment ajouter un sport non présent sur le site ?', 'sport'),
(19, 'Il se peut qu''un sport ne puisse plus être proposé aux utilisateurs si plus aucun groupe n''est capable d''assurer une séance.', 'Pourquoi un sport a disparu de la liste des sports proposés par le site ?', 'sport'),
(20, 'Pour obtenir des informations sur un club partenaires il suffit de se rendre sur sa page.', 'Comment obtenir les informations d''un club ?', 'club'),
(21, 'Pour mettre les informations ''un club à jour, il faut transmettre les nouvelles informations à un administrateur du site, qui après les avoir validées, les mettra à jour.', 'Comment mettre à jour les informations lié à un club ?', 'club'),
(22, 'Si vous parvenez à convaincre un club de faire un partenariat avec notre site, il vous suffit de nous contacter pour que nous puissions prendre contact avec le club. Si le partenariat se fait, une nouvelle page sera dédiée à ce club.', 'Comment ajouter un club partenaire ?', 'club');

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
