
-- Base de données de pulseNEWS


CREATE TABLE IF NOT EXISTS `areas` (
  `area_name` varchar(100) NOT NULL
)

CREATE TABLE IF NOT EXISTS `comments` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `join_comment` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`key`)
) 

CREATE TABLE IF NOT EXISTS `debates` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`key`)
)

CREATE TABLE IF NOT EXISTS `posts` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `cat` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `area_name` varchar(100) NOT NULL,
  PRIMARY KEY (`key`)
)

CREATE TABLE IF NOT EXISTS `users` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `about` varchar(250) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  PRIMARY KEY (`key`)
)
