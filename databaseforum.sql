-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forumgeorges
CREATE DATABASE IF NOT EXISTS `forumgeorges` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `forumgeorges`;

-- Listage de la structure de la table forumgeorges. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forumgeorges.category : ~2 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id_category`, `categoryName`) VALUES
	(1, 'science'),
	(2, 'informatique');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage de la structure de la table forumgeorges. poste
CREATE TABLE IF NOT EXISTS `poste` (
  `id_poste` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(50) COLLATE utf8_bin NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `topic_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_poste`),
  KEY `FK_poste_user` (`user_id`),
  KEY `FK_poste_topic` (`topic_id`),
  CONSTRAINT `FK_poste_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK_poste_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forumgeorges.poste : ~0 rows (environ)
/*!40000 ALTER TABLE `poste` DISABLE KEYS */;
/*!40000 ALTER TABLE `poste` ENABLE KEYS */;

-- Listage de la structure de la table forumgeorges. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `category_id` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint(4) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `sujet` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `FK_topic_user` (`user_id`),
  KEY `FK_topic_category` (`category_id`),
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forumgeorges.topic : ~0 rows (environ)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `title`, `category_id`, `dateCreation`, `locked`, `user_id`, `sujet`) VALUES
	(2, 'topic 1 science', 1, '2023-03-14 16:00:12', 0, 1, 'sujet long text lorem');
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Listage de la structure de la table forumgeorges. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `role` varchar(10) COLLATE utf8_bin NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forumgeorges.user : ~1 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `pseudonyme`, `email`, `password`, `role`, `dateInscription`) VALUES
	(1, 'azerty', 'aer@aer.fr', 'azerty', 'user', '2023-03-14 15:38:52');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
