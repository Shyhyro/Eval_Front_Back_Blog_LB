-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 29 avr. 2021 à 08:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eval_blog_simple`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Autres'),
(2, 'Animaux'),
(3, 'Astuces');

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fk` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `post_fk` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_idx` (`user_fk`),
  KEY `post_fk_idx` (`post_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `user_fk`, `content`, `post_fk`) VALUES
(2, 1, 'Un chat pas cha', 4);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tittle` varchar(120) NOT NULL,
  `category_fk` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resume` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_fk_idx` (`category_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `tittle`, `category_fk`, `date`, `resume`, `content`, `img`) VALUES
(3, 'Idée reçue n°1', 2, '2021-04-27 14:35:13', 'Un chat adore le poisson?', 'Ce fait n’est absolument pas une généralité, pourtant il est ancré dans nos têtes. Les chats sont comme nous sur ce point ; certains aiment le poisson et d’autres non. Le chat se base avant tout sur l’odeur pour apprécier son alimentation ; un poisson à l’odeur forte a donc peu de chance de lui faire envie. De plus, une alimentation trop riche en poisson engendre des carences, notamment en vitamine B1, et n’est donc pas à recommander.', 'http://www.chat-mignon.com/photos/chat-poisson-rouge.jpg'),
(4, 'Idée reçue n°2', 2, '2021-04-27 14:35:13', 'Un chat retombe toujours sur ses pattes?', 'Malheureusement, cette idée n’est pas systématiquement vraie. Tout du moins, si un chat retombe sur ses pattes, rien ne garantit qu’il pourra survivre à sa chute ou qu’il ne se blessera pas grièvement au passage. Pour preuve, les chutes de balcons sont la première cause de mortalité chez nos précieux félins.\r\n\r\nEn revanche, il est vrai que le chat utilise ses yeux et son oreille interne pour se diriger et se repositionner en cas de chute ; son squelette particulièrement léger l’y aide également. C’est ce que l’on nomme le réflexe de redressement. Une chute d’un ou deux étages peut ne pas blesser votre animal, mais le risque s’élève avec la hauteur ainsi que le sol de réception. Forcément, un sol en béton sera plus dangereux qu’un sol végétal ou meuble. Toutefois, il est à noter qu’un chat qui fait une chute peu élevée, autrement dit inférieure à 1,50 mètre, risque de se blesser gravement, car il n’aura alors pas le temps de se retourner.', 'http://pototrippante.p.o.pic.centerblog.net/052ad3a4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Guest');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_fk` int(10) UNSIGNED NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `role_fk_idx` (`role_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role_fk`, `registration_date`) VALUES
(1, 'Laurie', 'laurie@email.com', '$2y$10$O8iPj9VtGXTHvA6.ISSqtuSArIk14xAdO6tZlgJHmRDoGM1Vp/Plu', 1, '2021-04-27 10:25:07');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `post_fk` FOREIGN KEY (`post_fk`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_fk`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_fk`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`role_fk`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
