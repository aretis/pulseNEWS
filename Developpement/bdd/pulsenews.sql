-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 13 Mai 2012 à 22:21
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pulsenews`
--

-- --------------------------------------------------------

--
-- Structure de la table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `areas`
--

INSERT INTO `areas` (`id_area`, `area_name`) VALUES
(1, 'Alsace'),
(2, 'Aquitaine'),
(3, 'Auvergne'),
(4, 'Bourgogne'),
(5, 'Bretagne'),
(6, 'Centre'),
(7, 'Champagne-Ardenne'),
(8, 'Corse'),
(9, 'Franche-Comté'),
(10, 'Guadeloupe'),
(11, 'Guyane'),
(12, 'Île-de-France'),
(13, 'Languedoc-Roussillon'),
(14, 'Limousin'),
(15, 'Lorraine'),
(16, 'Martinique'),
(17, 'Mayotte'),
(18, 'Midi-Pyrénées'),
(19, 'Nord-Pas-de-Calais'),
(20, 'Basse-Normandie'),
(21, 'Haute-Normandie'),
(22, 'Pays de la Loire'),
(23, 'Picardie'),
(24, 'Poitou-Charentes'),
(25, 'Provence-Alpes-Côte d''Azur'),
(26, 'La Réunion'),
(27, 'Rhône-Alpes');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `join_comment` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_post`, `join_comment`, `content`, `post_date`) VALUES
(1, 1, 1, 0, 'OUAIIIII TROP LOL QUOI', '2012-05-13 14:57:59');

-- --------------------------------------------------------

--
-- Structure de la table `debates`
--

CREATE TABLE IF NOT EXISTS `debates` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `news_layout` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id_news`, `news_layout`, `link`, `id_user`, `cat`, `rate`) VALUES
(51, 'Présidentielle. François Hollande en Bretagne ce lundi - Ouest-France', 'http://news.google.com/news/url?sa=t&fd=R&usg=AFQjCNF2541rnuFUrFEqbQGgAvXBSzN96Q&url=http://www.ouest-france.fr/ofdernmin_-Presidentielle.-Francois-Hollande-en-Bretagne-ce-lundi_6346-2069502-fils-tous_filDMA.Htm', 1, 'écologie', -1);

-- --------------------------------------------------------

--
-- Structure de la table `news_cat`
--

CREATE TABLE IF NOT EXISTS `news_cat` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `news_cat`
--

INSERT INTO `news_cat` (`id_cat`, `cat_name`) VALUES
(1, 'Politique'),
(2, 'Economie'),
(3, 'Ecologie'),
(4, 'Fait divers'),
(5, 'Sport'),
(6, 'Culture');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_posts` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `cat` int(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `area` int(11) NOT NULL,
  PRIMARY KEY (`id_posts`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id_posts`, `user`, `title`, `description`, `content`, `cat`, `rate`, `post_date`, `area`) VALUES
(1, 1, 'Intégrer un lecteur Spotify sur une page web', 'Que des news moisies aujourd''hui et vl''a ti pas que Spotify annonce un truc, qui je trouve est très chouette : La possibilité d''ajouter à nos pages web, des players avec les chansons de notre choix. Jusqu''à présent, pour mettre de la musique sur nos ', 'Que des news moisies aujourd''hui et vl''a ti pas que Spotify annonce un truc, qui je trouve est très chouette : La possibilité d''ajouter à nos pages web, des players avec les chansons de notre choix. Jusqu''à présent, pour mettre de la musique sur nos sites, il y avait 2 méthodes (enfin, les plus connues). La première, c''est l''embed 100% illégal avec écrit en dessous "Fuck la SACEM". Et la seconde, c''est YouTube... Mais les clips, c''est pas toujours génial et l''audio derrière est souvent pourri.\r\n\r\nBref, autant dire que le player Spotifou arrive à point nommé, surtout que Spotify assure que les artistes seront payés pour chaque lecture. Top quoi...\r\n\r\n\r\n\r\nBon, par contre, il faudra que vous ayez Spotify sur votre ordinateur pour pouvoir écouter les morceaux. Ce n''est pas encore un vrai lecteur externe malheureusement même si il permet de voir les secondes écoulées et de faire lecture/pause, ce qui a pour effet d''agir sur Spotify directement. L''export HTML n''est pas encore possible directement depuis le player (ou alors j''ai pas trouvé). Il faut copier l''URI Spotify d''un album ou d''une chanson et la copier sur cette page afin de récupérer le code HTML qui va bien. Sympa pour partager vos découvertes musicales avec vos amis ou lecteurs, sur votre site, votre Tumblr ou que sais-je encore.\r\n\r\nMéfiez vous par contre, si vous intégrer des albums complets car votre pseudo Spotify se retrouvera dans le code de l''URI : spotify:user:MONUSER:playlist:5PrRs3ZdmsWmIKzZTq9XAb.\r\n\r\n\r\n\r\nLe lancement de Spotify fonctionne aussi sous Linux apparemment et j''espère juste qu''ils feront un petit effort en nous proposant un vrai player externe dans quelques temps.', 1, 3, '2012-05-12 21:34:42', 1),
(2, 1, 'titre', 'description description', 'contenu\r\ncontenu contenu\r\ncontenu', 2, 0, '2012-05-13 12:36:32', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(25) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `about` varchar(500) CHARACTER SET utf8 NOT NULL,
  `area_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`, `password`, `surname`, `firstname`, `mail`, `about`, `area_name`) VALUES
(1, 'michmich', 'mich', 'Gille', 'Michel', 'gille@intechinfo.fr', 'Je m''appelle Michel GILLE, je suis actuellement étudiant en informatique. Je suis actuellement passionné par les réseaux sociaux.', 'Ile-de-France'),
(2, 'test', 'test', 'test', 'test', 'test@test.com', 'testtest', 'test'),
(3, 'SolidSnake', 'admin', 'Alamdar', 'Salman', 'salman.alamdar@gmail.com', '', 'Île-de-France');

-- --------------------------------------------------------

--
-- Structure de la table `user_ratings`
--

CREATE TABLE IF NOT EXISTS `user_ratings` (
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user_ratings`
--

INSERT INTO `user_ratings` (`id_user`, `id_post`) VALUES
(1, 1),
(1, 2),
(1, 50),
(1, 51);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
