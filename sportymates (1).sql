-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juin 2016 à 09:28
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

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
-- Structure de la table `forum_categorie`
--

CREATE TABLE `forum_categorie` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `cat_ordre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forum_categorie`
--

INSERT INTO `forum_categorie` (`cat_id`, `cat_nom`, `cat_ordre`) VALUES
(3, 'Groupe', 40),
(2, 'Sport', 20),
(1, 'Général', 10),
(4, 'Club', 50),
(5, 'Evénement', 60),
(6, 'Aide', 70);

-- --------------------------------------------------------

--
-- Structure de la table `forum_config`
--

CREATE TABLE `forum_config` (
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

CREATE TABLE `forum_forum` (
  `forum_id` int(11) NOT NULL,
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
  `auth_modo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Contenu de la table `forum_forum`
--

INSERT INTO `forum_forum` (`forum_id`, `forum_cat_id`, `forum_name`, `forum_desc`, `forum_ordre`, `forum_last_post_id`, `forum_topic`, `forum_post`, `auth_view`, `auth_post`, `auth_topic`, `auth_annonce`, `auth_modo`) VALUES
(3, 1, 'Discussions générales', 'Ici on peut parler de tout sur tous les sujets', 40, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'Les News', 'Les news du site sont ici', 50, 25, 1, 2, 0, 0, 0, 0, 0),
(1, 1, 'Présentation', 'Nouveau sur le forum? Venez vous présenter ici !', 60, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 'Club', 'Parlez ici de vos clubs', 60, 19, 1, 1, 0, 0, 0, 0, 0),
(5, 1, 'Autres discussions', 'Parler d\'autre chose que le sport', 50, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 5, 'Vos événements', 'Parler ici de vos événements', 10, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 6, 'Des questions ?', 'Poster les ici.', 10, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 2, 'Vos sports', 'Parler ici de vos sports', 10, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum_membres`
--

CREATE TABLE `forum_membres` (
  `membre_id` int(11) NOT NULL,
  `membre_pseudo` varchar(30) COLLATE utf8_bin NOT NULL,
  `membre_mdp` text COLLATE utf8_bin NOT NULL,
  `membre_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `membre_siteweb` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `membre_avatar` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `membre_signature` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `membre_localisation` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `membre_inscrit` int(11) DEFAULT NULL,
  `membre_derniere_visite` int(11) DEFAULT NULL,
  `membre_rang` tinyint(4) DEFAULT '2',
  `membre_post` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `forum_membres`
--

INSERT INTO `forum_membres` (`membre_id`, `membre_pseudo`, `membre_mdp`, `membre_email`, `membre_siteweb`, `membre_avatar`, `membre_signature`, `membre_localisation`, `membre_inscrit`, `membre_derniere_visite`, `membre_rang`, `membre_post`) VALUES
(1, 'Dakimo', 'o8d5xc9a8', 'baptiste.sagazan@orange.fr', '', '', '', '', 1, 1, 1, 18),
(2, 'admin', 'admin', 'admin@orange.fr', '', '', '', '', 1, 1, 3, 3),
(23, 'amrita', 'e0c9035898dd52fc65c41454cec9c4d2', 'amrit.para@gmail.com', '', NULL, '', 'France', 0, 0, 1, 0),
(24, 'rere', 'e0c9035898dd52fc65c41454cec9c4d2', 'muriel.parassou@gmail.com', '', NULL, '', 'France', 0, 0, 1, 0),
(25, 'sportymates', 'b652b3edac7f2739928a88e91bdbdf61', 'sportymates.isep@gmail.com', '', NULL, '', 'France', 0, 0, 4, 0),
(26, 'rita', 'e0c9035898dd52fc65c41454cec9c4d2', 'sasa.pa@gmail.com', '', NULL, '', 'France', 0, 0, 1, 0),
(41, 'amrita', 'e0c9035898dd52fc65c41454cec9c4d2', 'amrit.para@gmail.com', NULL, NULL, NULL, 'France', 0, 0, 1, 0),
(49, 'rere', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'tretrdfvrg@gmail.com', NULL, NULL, NULL, 'France', NULL, NULL, 2, NULL),
(51, 'tesst', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'test21@gmail.com', NULL, NULL, NULL, 'France', NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `forum_mp`
--

CREATE TABLE `forum_mp` (
  `mp_id` int(11) NOT NULL,
  `mp_expediteur` int(11) NOT NULL,
  `mp_receveur` int(11) NOT NULL,
  `mp_titre` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_time` int(11) NOT NULL,
  `mp_lu` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `forum_post`
--

CREATE TABLE `forum_post` (
  `post_id` int(11) NOT NULL,
  `post_createur` int(11) DEFAULT NULL,
  `post_texte` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `post_time` int(11) DEFAULT NULL,
  `topic_id` int(11) NOT NULL,
  `post_forum_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `forum_topic` (
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `topic_titre` char(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_createur` int(11) DEFAULT NULL,
  `topic_vu` mediumint(8) DEFAULT NULL,
  `topic_time` int(11) DEFAULT NULL,
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `topic_last_post` int(11) DEFAULT NULL,
  `topic_first_post` int(11) DEFAULT NULL,
  `topic_post` mediumint(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_id`, `forum_id`, `topic_titre`, `topic_createur`, `topic_vu`, `topic_time`, `topic_genre`, `topic_last_post`, `topic_first_post`, `topic_post`) VALUES
(6, 2, 'Test', 12, 7, 1464470259, 'Message', 25, 24, 1),
(7, 7, 'hey', 20, 4, 1464630764, 'Message', 26, 26, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `forum_categorie`
--
ALTER TABLE `forum_categorie`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_ordre` (`cat_ordre`);

--
-- Index pour la table `forum_forum`
--
ALTER TABLE `forum_forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Index pour la table `forum_membres`
--
ALTER TABLE `forum_membres`
  ADD PRIMARY KEY (`membre_id`);

--
-- Index pour la table `forum_mp`
--
ALTER TABLE `forum_mp`
  ADD PRIMARY KEY (`mp_id`);

--
-- Index pour la table `forum_post`
--
ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD UNIQUE KEY `topic_last_post` (`topic_last_post`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `forum_categorie`
--
ALTER TABLE `forum_categorie`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `forum_forum`
--
ALTER TABLE `forum_forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `forum_membres`
--
ALTER TABLE `forum_membres`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pour la table `forum_mp`
--
ALTER TABLE `forum_mp`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
