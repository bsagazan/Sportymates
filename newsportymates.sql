-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 01 Juin 2016 à 17:11
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
  `description` text NOT NULL,
  `nomClub` varchar(50) NOT NULL,
  `imgClub` varchar(255) NOT NULL,
  PRIMARY KEY (`idClub`)
) ENGINE=MyISAM AUTO_INCREMENT=304 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`idClub`, `adresse`, `telephone`, `heureOuverture`, `heureFermeture`, `jourOuverture`, `jourFermeture`, `description`, `nomClub`, `imgClub`) VALUES
(299, 'Issy les moulineaux', '', '00:00:00', '00:00:00', '', '', '', 'forest', ''),
(300, '', '', '00:00:00', '00:00:00', '', '', '', 'rentrer', ''),
(302, 'quelques part dans paris', '0215487878', '12:00:00', '20:00:00', 'mercredi', 'vendredi', 'Ajouter une description du groupe', 'test', 'test.jpg'),
(303, 'issy les moulineaux', '0295874622', '14:00:00', '22:00:00', 'lundi', 'dimanche', 'Ajouter une description du groupe', 'foresthill', 'foresthill.jpg');

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
  `nomClub` varchar(100) NOT NULL,
  PRIMARY KEY (`idCommentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `contenu`, `dateHeure`, `nomGroupe`, `idClub`, `auteur`, `nomClub`) VALUES
(1, 'Ce groupe est presque aussi stylé que Vincent en personne.', '2016-05-24 08:24:10', 'Running-fever', 1, 'Amrita&Nathalie&LiangYi', ''),
(2, 'Ce groupe est top ! Le principal défi est de courir plus vite que Vincent ! Cependant il est difficile a rattraper vu qu''il est dans le turfu ...', '2016-05-19 19:44:52', 'Running-fever', 1, 'Emilie&Baptiste', ''),
(5, 'Ceci est un test!', '2016-05-29 19:45:48', 'Basket team', 0, 'amrita', '');

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
  `imgEvenement` varchar(255) NOT NULL,
  `creation` datetime NOT NULL,
  `sports` varchar(255) NOT NULL,
  PRIMARY KEY (`idEvenement`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nom`, `heureDebut`, `heureFin`, `dateDebut`, `dateFin`, `lieu`, `imgEvenement`, `creation`, `sports`) VALUES
(1, 'Mon test d''évènement', '00:00:00', '00:00:00', '2016-01-21', '0000-00-00', '', 'event1.jpg', '0000-00-00 00:00:00', 'Waterpolo'),
(2, 'Mon second Evenement', '00:00:00', '00:00:00', '2016-01-24', '0000-00-00', '', 'event2.png', '0000-00-00 00:00:00', 'Waterpolo'),
(3, 'Mon troisième évènement', '00:00:00', '00:00:00', '2016-01-21', '0000-00-00', '', 'event2.png', '0000-00-00 00:00:00', 'Natation'),
(5, 'pastaparty', '00:00:00', '00:00:00', '2016-05-28', '2016-05-29', '', 'event3.png\r\n', '0000-00-00 00:00:00', 'Waterpolo');

-- --------------------------------------------------------

--
-- Structure de la table `forum_categorie`
--

DROP TABLE IF EXISTS `forum_categorie`;
CREATE TABLE IF NOT EXISTS `forum_categorie` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `cat_ordre` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_ordre` (`cat_ordre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forum_categorie`
--

INSERT INTO `forum_categorie` (`cat_id`, `cat_nom`, `cat_ordre`) VALUES
(3, 'Groupe', 10),
(2, 'Sport', 20),
(1, 'Général', 30);

-- --------------------------------------------------------

--
-- Structure de la table `forum_config`
--

DROP TABLE IF EXISTS `forum_config`;
CREATE TABLE IF NOT EXISTS `forum_config` (
  `config_nom` varchar(200) COLLATE utf8_bin NOT NULL,
  `config_valeur` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forum_config`
--

INSERT INTO `forum_config` (`config_nom`, `config_valeur`) VALUES
('avatar_maxsize', '10 00'),
('avatar_maxh', '100 '),
('avatar_maxl', '100 '),
('sign_maxl', '200'),
('auth_bbcode_sign', 'oui'),
('pseudo_maxsize', '15'),
('pseudo_minsize', '3'),
('topic_par_page', '20'),
('post_par_page', '15');

-- --------------------------------------------------------

--
-- Structure de la table `forum_forum`
--

DROP TABLE IF EXISTS `forum_forum`;
CREATE TABLE IF NOT EXISTS `forum_forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_cat_id` mediumint(8) NOT NULL,
  `forum_name` varchar(60) COLLATE utf8_general_mysql500_ci NOT NULL,
  `forum_desc` mediumtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL,
  `forum_last_post_id` int(11) NOT NULL,
  `forum_topic` mediumint(8) NOT NULL,
  `forum_post` mediumint(8) NOT NULL,
  `auth_view` tinyint(4) NOT NULL,
  `auth_post` tinyint(4) NOT NULL,
  `auth_topic` tinyint(4) NOT NULL,
  `auth_annonce` tinyint(4) NOT NULL,
  `auth_modo` tinyint(4) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `forum_forum`
--

INSERT INTO `forum_forum` (`forum_id`, `forum_cat_id`, `forum_name`, `forum_desc`, `forum_ordre`, `forum_last_post_id`, `forum_topic`, `forum_post`, `auth_view`, `auth_post`, `auth_topic`, `auth_annonce`, `auth_modo`) VALUES
(3, 1, 'Discussions générales', 'Ici on peut parler de tout sur tous les sujets', 40, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'Les News', 'Les news du site sont ici', 50, 25, 1, 2, 0, 0, 0, 0, 0),
(1, 1, 'Présentation', 'Nouveau sur le forum? Venez vous présenter ici !', 60, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2, 'Club', 'Parlez ici de vos clubs', 60, 19, 1, 1, 0, 0, 0, 0, 0),
(5, 2, 'Autres discussions', 'Parler d''autre chose que le sport', 50, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 3, 'Loisir', 'Vos loisirs', 60, 16, 1, 1, 0, 0, 0, 0, 0),
(7, 3, 'Délires', 'Décrivez ici tous vos délires les plus fous', 50, 26, 2, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum_membres`
--

DROP TABLE IF EXISTS `forum_membres`;
CREATE TABLE IF NOT EXISTS `forum_membres` (
  `membre_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_pseudo` varchar(30) COLLATE utf8_bin NOT NULL,
  `membre_mdp` varchar(32) COLLATE utf8_bin NOT NULL,
  `membre_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `membre_siteweb` varchar(100) COLLATE utf8_bin NOT NULL,
  `membre_avatar` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `membre_signature` varchar(200) COLLATE utf8_bin NOT NULL,
  `membre_localisation` varchar(100) COLLATE utf8_bin NOT NULL,
  `membre_inscrit` int(11) NOT NULL,
  `membre_derniere_visite` int(11) NOT NULL,
  `membre_rang` tinyint(4) DEFAULT '2',
  `membre_post` int(11) NOT NULL,
  PRIMARY KEY (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forum_membres`
--

INSERT INTO `forum_membres` (`membre_id`, `membre_pseudo`, `membre_mdp`, `membre_email`, `membre_siteweb`, `membre_avatar`, `membre_signature`, `membre_localisation`, `membre_inscrit`, `membre_derniere_visite`, `membre_rang`, `membre_post`) VALUES
(1, 'Dakimo', 'o8d5xc9a8', 'baptiste.sagazan@orange.fr', '', '', '', '', 1, 1, 2, 18),
(2, 'admin', 'admin', 'admin@orange.fr', '', '', '', '', 1, 1, 4, 3),
(23, 'amrita', 'e0c9035898dd52fc65c41454cec9c4d2', 'amrit.para@gmail.com', '', NULL, '', 'France', 0, 0, 2, 0),
(24, 'rere', 'e0c9035898dd52fc65c41454cec9c4d2', 'muriel.parassou@gmail.com', '', NULL, '', 'France', 0, 0, 2, 0),
(25, 'sportymates', 'b652b3edac7f2739928a88e91bdbdf61', 'sportymates.isep@gmail.com', '', NULL, '', 'France', 0, 0, 4, 0),
(26, 'rita', 'e0c9035898dd52fc65c41454cec9c4d2', 'sasa.pa@gmail.com', '', NULL, '', 'France', 0, 0, 2, 0),
(27, 'amrita', 'e0c9035898dd52fc65c41454cec9c4d2', 'amrit.para@gmail.com', '', NULL, '', 'France', 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum_mp`
--

DROP TABLE IF EXISTS `forum_mp`;
CREATE TABLE IF NOT EXISTS `forum_mp` (
  `mp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mp_expediteur` int(11) NOT NULL,
  `mp_receveur` int(11) NOT NULL,
  `mp_titre` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_time` int(11) NOT NULL,
  `mp_lu` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `forum_post`
--

DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE IF NOT EXISTS `forum_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_createur` int(11) NOT NULL,
  `post_texte` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `post_time` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_forum_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_post`
--

INSERT INTO `forum_post` (`post_id`, `post_createur`, `post_texte`, `post_time`, `topic_id`, `post_forum_id`) VALUES
(19, 1, 'ergqdfbq', 1464428707, 0, 4),
(18, 1, 'blabla', 1464428535, 0, 7),
(25, 12, 'Bienvenue !!', 1464470409, 6, 2),
(26, 20, 'hello guys', 1464630764, 7, 7),
(24, 12, 'Bienvenue à tous!', 1464470259, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

DROP TABLE IF EXISTS `forum_topic`;
CREATE TABLE IF NOT EXISTS `forum_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `topic_titre` char(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_createur` int(11) NOT NULL,
  `topic_vu` mediumint(8) NOT NULL,
  `topic_time` int(11) NOT NULL,
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_last_post` int(11) NOT NULL,
  `topic_first_post` int(11) NOT NULL,
  `topic_post` mediumint(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_last_post` (`topic_last_post`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_id`, `forum_id`, `topic_titre`, `topic_createur`, `topic_vu`, `topic_time`, `topic_genre`, `topic_last_post`, `topic_first_post`, `topic_post`) VALUES
(6, 2, 'Test', 12, 7, 1464470259, 'Message', 25, 24, 1),
(7, 7, 'hey', 20, 3, 1464630764, 'Message', 26, 26, 0);

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
  `ville` varchar(50) NOT NULL,
  `niveau` set('debutant','intermediaire','experimente') NOT NULL,
  `nbreMax` int(50) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `imgGroupe` varchar(255) NOT NULL,
  PRIMARY KEY (`nomGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nomGroupe`, `leader`, `nomSport`, `idClub`, `creation`, `ville`, `niveau`, `nbreMax`, `description`, `imgGroupe`) VALUES
('running fever', 'Amrita', 'Course', 302, '2016-05-07 12:03:00', '', '', 20, '', 'test.jpg'),
('Basket team', 'Nathalie', 'Basket', 300, '2016-05-07 12:05:00', '', '', 5, '', 'test.jpg'),
('dancing group', 'Amrita', 'Danse', 302, '2016-05-30 07:29:41', 'Toulouse', 'intermediaire', 11, '', 'danse.jpg'),
('aa', 'aaz', 'Athletisme', 299, '2016-05-31 16:03:50', 'paris', 'debutant', 24, 'Ajouter une description du groupe', 'aa.jpg'),
('test2', 'Muriel PARASSOURAMANAÏCK', 'Course', 299, '2016-05-31 17:41:14', 'paris', 'debutant', 24, 'Test', 'test2.jpg'),
('watoo', 'amrita', 'Waterpolo', 299, '2016-06-01 08:24:21', 'londres', 'debutant', 24, 'Ajouter une description du groupe', 'watoo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `groupeinscrit`
--

DROP TABLE IF EXISTS `groupeinscrit`;
CREATE TABLE IF NOT EXISTS `groupeinscrit` (
  `pseudo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nomGroupe` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupeinscrit`
--

INSERT INTO `groupeinscrit` (`pseudo`, `nomGroupe`) VALUES
('amrita', 'Basket team'),
('amrita', 'dancing group'),
('amrita', 'test2'),
('sportymates', 'aa');

-- --------------------------------------------------------

--
-- Structure de la table `listeattente`
--

DROP TABLE IF EXISTS `listeattente`;
CREATE TABLE IF NOT EXISTS `listeattente` (
  `idPosition` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `nomGroupe` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  PRIMARY KEY (`idPosition`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `listeattente`
--

INSERT INTO `listeattente` (`idPosition`, `pseudo`, `nomGroupe`, `dateHeure`) VALUES
(1, '0', 0, '2016-05-30 19:02:47');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `photodeprofil` varchar(255) NOT NULL,
  `Sexe` enum('Homme','Femme') DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `numtel` int(11) DEFAULT NULL,
  `level` enum('2','3','4') NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL,
  `blackList` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `nom`, `prenom`, `pays`, `codepostal`, `photodeprofil`, `Sexe`, `datenaissance`, `numtel`, `level`, `confirmkey`, `confirme`, `blackList`) VALUES
(4, 'Amrita', 'aa.kvo@gmail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'ahh', 'ana', '', 0, '4.png', '', NULL, NULL, '2', '', 0, 0),
(25, 'sportymates', 'sportymates.isep@gmail.com', 'b652b3edac7f2739928a88e91bdbdf6132bdedc0', 'SPORTYMATES', 'SPORTY', 'France', 75006, '', 'Femme', NULL, NULL, '4', '99886017708915', 1, 0),
(27, 'amrita', 'amrit.para@gmail.com', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'PARASSOURAMANAÏCK', 'Muriel', 'France', 75013, '27.jpg', 'Femme', NULL, NULL, '2', '84301770640884', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `noterclub`
--

DROP TABLE IF EXISTS `noterclub`;
CREATE TABLE IF NOT EXISTS `noterclub` (
  `idClub` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `note` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`idClub`,`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `notergroupe`
--

DROP TABLE IF EXISTS `notergroupe`;
CREATE TABLE IF NOT EXISTS `notergroupe` (
  `nomGroupe` varchar(100) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `note` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`nomGroupe`,`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `notergroupe`
--

INSERT INTO `notergroupe` (`nomGroupe`, `pseudo`, `note`) VALUES
('running fever', 'amrita', ''),
('Basket team', 'amrita', '1'),
('dancing group', 'amrita', '2'),
('test2', 'amrita', '3'),
('aa', 'amrita', '3');

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
-- Structure de la table `recuperation`
--

DROP TABLE IF EXISTS `recuperation`;
CREATE TABLE IF NOT EXISTS `recuperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

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
(22, 'Si vous parvenez à convaincre un club de faire un partenariat avec notre site, il vous suffit de nous contacter pour que nous puissions prendre contact avec le club. Si le partenariat se fait, une nouvelle page sera dédiée à ce club.', 'Comment ajouter un club partenaire ?', 'club'),
(23, 'test', 'test', 'forum'),
(27, 'test2', 'test1', 'groupe');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `nomSport` varchar(30) NOT NULL,
  `type` enum('Collectif','Individuel') NOT NULL,
  `descriptionSport` varchar(255) NOT NULL,
  `imgSports` varchar(255) NOT NULL,
  PRIMARY KEY (`nomSport`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sport`
--

INSERT INTO `sport` (`nomSport`, `type`, `descriptionSport`, `imgSports`) VALUES
('Football', '', 'Sport dans lequel 22 joueurs divisés en deux camps s''efforcent d''envoyer un ballon dans le but du camp adverse, sans l''intervention des mains. Le football est un sport collectif mettant aux prises deux équipes de onze joueurs autour d''un ballon rond. C''es', 'Football.jpg'),
('Natation', '', 'La natation est la méthode qui permet à l''Homme de se mouvoir dans l''eau sans autre force propulsive que sa propre énergie. Elle regroupe des activités diverses, comme le déplacement à la surface de l''eau et sous l''eau (plongée), le plongeon, ou les jeux ', 'Natation.jpg'),
('Volley', '', 'Le volley-ball est un sport collectif, dans lequel 2 équipes de 6 joueurs, séparées par un filet, s''affrontent avec un ballon sur un terrain rectangulaire. Une équipe de volley-ball se compose de 6 joueurs sur le terrain, 3 devant la ligne d''attaque et 3 ', 'Volley.jpg'),
('Danse', '', 'Danses sacrées de L''Inde, colportées par les roumains à travers le Moyen-Orient et le Maghreb, où elles se sont mélangées aux danses autochtones. La danse orientale est une danse solo féminin qui nous vient de l''antiquité. Intimement lié à la musique, ell', 'danse.jpg'),
('Basket', '', 'Le basket-ball est un sport, un jeu de ballon qui se joue à la main. Le but est d’envoyer une balle dans un panier (basket). Chaque équipe est composée de cinq joueurs sur le terrain, et de 5 (Europe) à 7 (NBA) remplaçants. Les cinq joueurs qui débutent l', 'basketball.jpg'),
('Badminton', '', 'Jeu de volant et raquette pratiqué sur un court, apparenté au tennis. Un match se joue en 2 sets gagnant de 21 points, et ce quelle que soit la catégorie. A 20 égalité, il faut 2 points d''écart pour remporter le set avec un maximum de 30 (si les 2 joueurs', 'badminton.jpg'),
('Tennis', '', 'Le tennis est un sport qui consiste, pour 2 ou 4 joueurs munis de raquettes, à envoyer une balle par-dessus un filet dans les limites du terrain appelé “court”.\r\n', 'tennis.jpg'),
('Handball', '', 'Le handball est un sport collectif où deux équipes de 7 joueurs s''affrontent avec un ballon sur un terrain rectangulaire (dimensions : 20 mètres par 40 mètres) séparé en deux camps. Le nom vient de l''allemand : die Hand (la main) et der Ball (la balle, mo', 'handball.jpeg'),
('Golf', '', ' Les origines de ce jeu écossais remontent au moins au XVe siècle. Sport consistant à envoyer, en un minimum de coups, une balle, à l’aide de clubs, dans les 18 trous successifs d’un terrain coupé d’obstacles. ', 'golf.jpg'),
('Rugby', '', 'Sport qui se joue à la main et au pied avec un ballon ovale. Le jeu consiste à déposer le ballon derrière le but adverse ou le faire passer, par un coup de pied, au-dessus de la barre transversale entre les poteaux.', 'rugby.jpg'),
('Escrime', '', 'L''escrime est un système d''attaques et de défenses à l''épée, sabre ou fleuret. C''est une discipline sportive présente aux jeux olympiques. C’est l’un des très rares sports où l’usage du français est obligatoire. C''est aussi un sport loisir faisant travail', 'escrime.jpg'),
('Athletisme', '', 'Ses origines remontent à la Grèce antique, où il constituait un certain nombre d''épreuves des jeux Olympiques. L''athlétisme c''est courir (vitesse, haies, fond, demi-fond), marcher, sauter (hauteur, longueur, triple et perche), lancer (javelot, poids, disq', 'athletisme.jpg'),
('Baseball', '', 'Le baseball est un sport d’équipe qui se joue avec des battes pour frapper une balle lancée et des gants pour rattraper la balle. C''est le sport national aux Etats-Unis, dérivé du cricket. Une rencontre de baseball se joue avec deux équipes de neuf joueur', 'baseball.jpg'),
('Waterpolo', '', 'Le water polo est un sport collectif aquatique relativement peu médiatisé. Il a été inventé en Grande-Bretagne au milieu du XIXe siècle en tant que version aquatique du polo. Une équipe se compose de 13 joueurs dont 6 remplaçants. Ceux-ci peuvent entrer e', 'Waterpolo.jpg'),
('Musculation', '', 'Le culturisme, aussi appelé bodybuilding, est un sport qui consiste à développer sa masse musculaire au moyen d''une combinaison de lever de poids, d''une augmentation de l''apport en calories et de repos.', 'musculation.jpg'),
('Course', '', 'La distance du marathon faisait environ 40 km aux premiers jeux Olympiques modernes. C''est en 1908 lors des jeux Olympiques de Londres que la distance fut définitivement fixée, la famille royale désirant alors que la course démarrât du château de Windsor ', 'Running.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
