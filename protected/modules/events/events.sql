-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.17-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.0.0.4464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица events.loc.Event
CREATE TABLE IF NOT EXISTS `Event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `url` varchar(50) NOT NULL,
  `short_description` text,
  `full_description` text,
  `event_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы events.loc.Event: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `Event` DISABLE KEYS */;
INSERT INTO `Event` (`id`, `title`, `meta_title`, `meta_keywords`, `meta_description`, `url`, `short_description`, `full_description`, `event_date`) VALUES
	(2, 'Main event from 1 January', '', '', '', 'main-event-from-1-january', 'fasdfdsafdasfda', '<p>Quickly scale quality results and top-line e-commerce. Efficiently maintain an expanded array of supply chains without plug-and-play web services. Assertively reconceptualize backward-compatible outsourcing rather than excellent content. Holisticly cultivate resource maximizing scenarios before long-term high-impact processes. Dramatically pursue cutting-edge ideas through plug-and-play leadership skills.</p><p>Interactively fabricate frictionless infrastructures for just in time information. Assertively productize equity invested architectures through competitive benefits. Appropriately disseminate multidisciplinary "outside the box" thinking before team building deliverables. Quickly leverage existing future-proof strategic theme areas for empowered customer service. Collaboratively formulate collaborative experiences through tactical experiences.</p><p>Interactively fabricate frictionless infrastructures for just in time information. Assertively productize equity invested architectures through competitive benefits. Appropriately disseminate multidisciplinary "outside the box" thinking before team building deliverables. Quickly leverage existing future-proof strategic theme areas for empowered customer service. Collaboratively formulate collaborative experiences through tactical experiences.</p><p>Interactively fabricate frictionless infrastructures for just in time information. Assertively productize equity invested architectures through competitive benefits. Appropriately disseminate multidisciplinary "outside the box" thinking before team building deliverables. Quickly leverage existing future-proof strategic theme areas for empowered customer service. Collaboratively formulate collaborative experiences through tactical experiences.</p>', '2015-04-02 14:30:29'),
	(3, 'Main event from 8 March', '', '', '', 'main-event-from-8-march', 'fdsafadsf', '<p>Quickly scale quality results and top-line e-commerce. Efficiently maintain an expanded array of supply chains without plug-and-play web services. Assertively reconceptualize backward-compatible outsourcing rather than excellent content. Holisticly cultivate resource maximizing scenarios before long-term high-impact processes. Dramatically pursue cutting-edge ideas through plug-and-play leadership skills.</p><p>Interactively fabricate frictionless infrastructures for just in time information. Assertively productize equity invested architectures through competitive benefits. Appropriately disseminate multidisciplinary "outside the box" thinking before team building deliverables. Quickly leverage existing future-proof strategic theme areas for empowered customer service. Collaboratively formulate collaborative experiences through tactical experiences.</p><p>Interactively fabricate frictionless infrastructures for just in time information. Assertively productize equity invested architectures through competitive benefits. Appropriately disseminate multidisciplinary "outside the box" thinking before team building deliverables. Quickly leverage existing future-proof strategic theme areas for empowered customer service. Collaboratively formulate collaborative experiences through tactical experiences.</p><p>Interactively fabricate frictionless infrastructures for just in time information. Assertively productize equity invested architectures through competitive benefits. Appropriately disseminate multidisciplinary "outside the box" thinking before team building deliverables. Quickly leverage existing future-proof strategic theme areas for empowered customer service. Collaboratively formulate collaborative experiences through tactical experiences.</p>', '2015-03-08 15:21:42');
/*!40000 ALTER TABLE `Event` ENABLE KEYS */;


-- Дамп структуры для таблица events.loc.EventImage
CREATE TABLE IF NOT EXISTS `EventImage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы events.loc.EventImage: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `EventImage` DISABLE KEYS */;
INSERT INTO `EventImage` (`id`, `event_id`, `image`) VALUES
	(13, 2, '2_-1652637947.jpg'),
	(14, 2, '2_568704039.jpg'),
	(15, 2, '2_-77775219.jpg'),
	(16, 2, '2_1037309744.jpg'),
	(17, 2, '2_-336586490.jpg'),
	(18, 2, '2_1782059669.jpg'),
	(19, 3, '3_1699771593.jpg'),
	(20, 3, '3_-1776666396.jpg'),
	(21, 3, '3_817144913.jpg'),
	(22, 3, '3_1232171069.jpg'),
	(23, 3, '3_266763925.jpg'),
	(24, 3, '3_455725273.jpg'),
	(25, 3, '3_-1074380711.jpg');
/*!40000 ALTER TABLE `EventImage` ENABLE KEYS */;


-- Дамп структуры для таблица events.loc.EventVideo
CREATE TABLE IF NOT EXISTS `EventVideo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL DEFAULT '0',
  `video` text NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы events.loc.EventVideo: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `EventVideo` DISABLE KEYS */;
INSERT INTO `EventVideo` (`id`, `event_id`, `video`, `image`) VALUES
	(4, 3, 'https://www.youtube.com/embed/kXYiU_JCYtU', '148142831332612.jpg'),
	(5, 3, 'http://mover.uz/video/embed/gcZVF0fj/', '541142831332658.jpg'),
	(11, 3, 'http://mytube.uz/136143.embed', '999142831332649.jpg');
/*!40000 ALTER TABLE `EventVideo` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
