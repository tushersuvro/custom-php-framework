-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.36 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for custom-php-framework
DROP DATABASE IF EXISTS `custom-php-framework`;
CREATE DATABASE IF NOT EXISTS `custom-php-framework` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `custom-php-framework`;

-- Dumping structure for table custom-php-framework.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table custom-php-framework.users: 4 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created`) VALUES
	(1, 'rahman', 'rahman@rh.com', '$2y$10$MTyFADC42jpRzvaaqcjIbeqTRN0L4SfmVk5dskHITHih8rWHVSh/y', '2024-01-15 18:51:53'),
	(2, 'lakshay', 'lakshay@gmail.com', '$2y$10$nALMDXZDucEb.rokP2tkp.Nj8.A64klEw1rNf1g3uOKP0rkDGAeJS', '2024-01-15 19:21:02'),
	(4, 'acquaman', 'acquaman@ac.com', '$2y$10$WCdMrZyY18Lges3aTidupe//IdFXE9erpOQex0o8n.anmXpbWIERe', '2024-01-18 01:57:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table custom-php-framework.videos
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `embed` longtext NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table custom-php-framework.videos: 9 rows
DELETE FROM `videos`;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`id`, `user_id`, `title`, `description`, `embed`, `created`) VALUES
	(1, 1, 'Own your problems', 'We have to take 100% responsibility of all the good and not so good things in our lives. Taking ownership of our life  we can begin the process of making positive change.', '<iframe width="560" height="315" src="https://www.youtube.com/embed/SUupV_UctmU?si=7wXpfMcFY2KvmHPy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-07 23:45:36'),
	(2, 1, 'How to Know Yourself', 'The greatest gift we can give ourselves this coming year is to get to know ourselves. For this we need to learn to focus so we can stay in a state of self reflection long enough to begin to learn about myself. Then we need to commit to a morning time of self reflection. ', '<iframe width="560" height="315" src="https://www.youtube.com/embed/mmr9K5TFK2s?si=6ccUQAcADl9DQfz5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-07 23:49:20'),
	(3, 1, 'How to manifest', 'a few of the key things that are needed as part of working on Manifesting what it is you want in life. ', '<iframe width="560" height="315" src="https://www.youtube.com/embed/du8tmVpcyog?si=gL05HOuLSFiX5q8F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-12 19:29:10'),
	(4, 1, ' Getting to Know You ', 'Most people don\'t know what they want in life because they don\'t know who they are. ', '<iframe width="560" height="315" src="https://www.youtube.com/embed/LGGpKYdixR8?si=GxfBk5W507GclMTk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-12 19:30:15'),
	(5, 1, 'How to Identify Unresolved Issues in the Subconscious', 'Except from a talk I gave in Munich, Germany, where I address the question if we should seek out negative people in life to show ourselves what we are reacting to in life. ', '<iframe width="560" height="315" src="https://www.youtube.com/embed/osBaRDPAER4?si=2sUDs6zaC1Ayk2Wb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-12 19:47:47'),
	(9, 1, 'Why I work so hard (despite having a ‘good’ job)', 'Why I work so hard (despite having a ‘good’ job)Why I work so hard (despite having a ‘good’ job)Why I work so hard (despite having a ‘good’ job)', '<iframe width="560" height="315" src="https://www.youtube.com/embed/XPYT8BaTqoA?si=rS5RIYXjTF79lFaY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-16 00:21:01'),
	(10, 1, 'Sleep Will Not Fix Your Fatigue. Here\'s Why', 'Sleep Will Not Fix Your Fatigue. Here\'s Why. | Vantage with Palki Sharma\r\n\r\nHow often do you feel tired? Many try to fix their fatigue by getting more sleep. But despite the shut eye our bodies seem to have shut down. Research says sleep and rest are not the same thing. There are five different types of fatigue, including physical, mental, emotional, social, and sensory.  We live in a culture of immediate responsiveness so we are chronically tired. Rest is vital for physical and mental health. So what can we do to achieve it? Palki Sharma tells you.', '<iframe width="560" height="315" src="https://www.youtube.com/embed/Ast-229boF8?si=jM4qH285CjScXRrD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-16 02:37:13'),
	(11, 1, 'Knowledge vs Wisdom', 'Knowledge vs WisdomKnowledge vs WisdomKnowledge vs WisdomKnowledge vs WisdomKnowledge vs WisdomKnowledge vs Wisdom', '<iframe width="560" height="315" src="https://www.youtube.com/embed/2ZQAQbJE2cE?si=rY7wa0C_AGF_yiU6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-18 01:43:42'),
	(12, 1, 'Simplify your life! Manage your Energy!', 'Simplify your life! Manage your Energy!Simplify your life! Manage your Energy!Simplify your life! Manage your Energy!Simplify your life! Manage your Energy!Simplify your life! Manage your Energy!', '<iframe width="560" height="315" src="https://www.youtube.com/embed/ntdGOPWzij0?si=QikiUODhDo-iF70z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', '2024-01-18 01:46:01');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
