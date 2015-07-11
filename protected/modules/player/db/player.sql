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

-- Дамп структуры для таблица karbella_event.PlayerPlaylist
CREATE TABLE IF NOT EXISTS `PlayerPlaylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы karbella_event.PlayerPlaylist: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `PlayerPlaylist` DISABLE KEYS */;
/*!40000 ALTER TABLE `PlayerPlaylist` ENABLE KEYS */;


-- Дамп структуры для таблица karbella_event.PlayerPlaylistFiles
CREATE TABLE IF NOT EXISTS `PlayerPlaylistFiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы karbella_event.PlayerPlaylistFiles: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `PlayerPlaylistFiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `PlayerPlaylistFiles` ENABLE KEYS */;


-- Дамп структуры для таблица karbella_event.PlayerPlaylistFilesTranslate
CREATE TABLE IF NOT EXISTS `PlayerPlaylistFilesTranslate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы karbella_event.PlayerPlaylistFilesTranslate: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `PlayerPlaylistFilesTranslate` DISABLE KEYS */;
/*!40000 ALTER TABLE `PlayerPlaylistFilesTranslate` ENABLE KEYS */;


-- Дамп структуры для таблица karbella_event.PlayerPlaylistTranslate
CREATE TABLE IF NOT EXISTS `PlayerPlaylistTranslate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы karbella_event.PlayerPlaylistTranslate: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `PlayerPlaylistTranslate` DISABLE KEYS */;
/*!40000 ALTER TABLE `PlayerPlaylistTranslate` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
