<?php

class PlayerModule extends BaseModule
{
	public $moduleName = 'player';

	public function init()
	{
		$this->setImport(array(
			'application.modules.player.models.*',
			'application.modules.core.models.*',
			'application.modules.core.CoreModule',
		));
	}


	public function afterInstall()
	{

		$table1 = "CREATE TABLE IF NOT EXISTS `PlayerPlaylist` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `image` varchar(100) DEFAULT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;
						";

		$table2 = "CREATE TABLE IF NOT EXISTS `PlayerPlaylistFiles` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `playlist_id` int(11) NOT NULL DEFAULT '0',
								  `file` varchar(100) NOT NULL DEFAULT '0',
								  PRIMARY KEY (`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;
								";

		$table3 = "CREATE TABLE IF NOT EXISTS `PlayerPlaylistFilesTranslate` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `object_id` int(11) NOT NULL,
								  `language_id` int(11) NOT NULL,
								  `name` varchar(50) NOT NULL,
								  PRIMARY KEY (`id`),
								  KEY `object_id` (`object_id`),
								  KEY `language_id` (`language_id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;
								";

		$table4 = "CREATE TABLE IF NOT EXISTS `PlayerPlaylistTranslate` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `object_id` int(11) NOT NULL,
								  `language_id` int(11) NOT NULL,
								  `name` varchar(50) NOT NULL,
								  `description` text NOT NULL,
								  PRIMARY KEY (`id`),
								  KEY `object_id` (`object_id`),
								  KEY `language_id` (`language_id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8;
								";

		$connection=Yii::app()->db;
		$transaction=$connection->beginTransaction();
		try
		{
			$connection->createCommand($table1)->execute();
			$connection->createCommand($table2)->execute();
			$connection->createCommand($table3)->execute();
			$connection->createCommand($table4)->execute();
			//… прочие SQL-запросы
			$transaction->commit();
		}
		catch(Exception $e) // в случае возникновения ошибки при выполнении одного из запросов выбрасывается исключение
		{
			$transaction->rollback();
		}

	}
}