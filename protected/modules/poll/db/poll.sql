-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.37-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица toshnur.Poll
CREATE TABLE IF NOT EXISTS `Poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы toshnur.Poll: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `Poll` DISABLE KEYS */;
INSERT INTO `Poll` (`id`, `name`, `description`, `status`) VALUES
	(1, 'test uz', 'asdasd', 1),
	(2, 'ikki', 'vxcvzxcv', 0);
/*!40000 ALTER TABLE `Poll` ENABLE KEYS */;


-- Дамп структуры для таблица toshnur.PollChoice
CREATE TABLE IF NOT EXISTS `PollChoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `sort` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`),
  CONSTRAINT `pollchoice_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `Poll` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы toshnur.PollChoice: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `PollChoice` DISABLE KEYS */;
INSERT INTO `PollChoice` (`id`, `poll_id`, `votes`, `sort`) VALUES
	(1, 1, 21, 0),
	(6, 1, 19, 1),
	(13, 1, 9, 2),
	(14, 1, 14, 3);
/*!40000 ALTER TABLE `PollChoice` ENABLE KEYS */;


-- Дамп структуры для таблица toshnur.PollChoiceTranslate
CREATE TABLE IF NOT EXISTS `PollChoiceTranslate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  CONSTRAINT `pollchoicetranslate_ibfk_1` FOREIGN KEY (`object_id`) REFERENCES `PollChoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы toshnur.PollChoiceTranslate: ~12 rows (приблизительно)
/*!40000 ALTER TABLE `PollChoiceTranslate` DISABLE KEYS */;
INSERT INTO `PollChoiceTranslate` (`id`, `object_id`, `language_id`, `name`) VALUES
	(1, 1, 1, 'choice1 ru '),
	(2, 1, 9, 'choice1  en'),
	(3, 1, 11, 'choice1  uz'),
	(16, 6, 1, 'choice2 ru '),
	(17, 6, 9, 'choice 2 en'),
	(18, 6, 11, 'choice2 uz'),
	(37, 13, 1, 'choice3 ru '),
	(38, 13, 9, 'choice3 en '),
	(39, 13, 11, 'choice3 uz '),
	(40, 14, 1, 'choice4 ru '),
	(41, 14, 9, 'choice4 en '),
	(42, 14, 11, 'choice4 uz ');
/*!40000 ALTER TABLE `PollChoiceTranslate` ENABLE KEYS */;


-- Дамп структуры для таблица toshnur.PollTranslate
CREATE TABLE IF NOT EXISTS `PollTranslate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы toshnur.PollTranslate: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `PollTranslate` DISABLE KEYS */;
INSERT INTO `PollTranslate` (`id`, `object_id`, `language_id`, `name`) VALUES
	(1, 1, 1, 'test ru'),
	(2, 1, 9, 'test en'),
	(3, 1, 11, 'test uz'),
	(4, 2, 1, 'Два'),
	(5, 2, 9, 'second'),
	(6, 2, 11, 'ikki');
/*!40000 ALTER TABLE `PollTranslate` ENABLE KEYS */;


-- Дамп структуры для таблица toshnur.PollVote
CREATE TABLE IF NOT EXISTS `PollVote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы toshnur.PollVote: ~15 rows (приблизительно)
/*!40000 ALTER TABLE `PollVote` DISABLE KEYS */;
INSERT INTO `PollVote` (`id`, `poll_id`, `choice_id`, `user_id`, `ip_address`, `time`) VALUES
	(1, 1, 14, 2, '127.0.0.12', '2015-04-21'),
	(2, 1, 14, 7, '127.0.0.13', '2015-04-21'),
	(3, 1, 13, 3, '127.0.0.13', '2015-04-21'),
	(4, 1, 6, 4, '127.0.0.14', '2015-04-21'),
	(5, 1, 6, 5, '127.0.0.15', '2015-04-21'),
	(6, 1, 6, 6, '127.0.0.16', '2015-04-21'),
	(73, 1, 14, 34, '127.0.0.212', '2015-04-23'),
	(74, 1, 13, 0, '127.0.0.111', '2015-04-23'),
	(75, 1, 13, 0, '127.0.0.124', '2015-04-23'),
	(76, 1, 13, 0, '127.0.0.144', '2015-04-23'),
	(77, 1, 13, 0, '127.0.0.114', '2015-04-23'),
	(78, 1, 14, 0, '127.0.0.222', '2015-04-23'),
	(79, 1, 14, 0, '127.0.0.132', '2015-04-23'),
	(80, 1, 14, 0, '127.0.0.1', '2015-04-23'),
	(81, 1, 14, 1, '127.0.0.1', '2015-04-23');
/*!40000 ALTER TABLE `PollVote` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
