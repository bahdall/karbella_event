<?php

class EventsModule extends BaseModule
{
	public $moduleName = 'events';

	public function init()
	{
		$this->setImport(array(
			'application.modules.events.models.*'
		));
	}


	public function afterInstall()
	{

		$eventTableSql = "CREATE TABLE IF NOT EXISTS `Event` (
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
							) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
						";

		$eventImageTableSql = "CREATE TABLE IF NOT EXISTS `EventImage` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `event_id` int(11) NOT NULL,
								  `image` varchar(100) NOT NULL,
								  PRIMARY KEY (`id`),
								  KEY `event_id` (`event_id`)
								) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
								";

		$eventVideoTableSql = "CREATE TABLE IF NOT EXISTS `EventVideo` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `event_id` int(11) NOT NULL DEFAULT '0',
								  `video` text NOT NULL,
								  `image` varchar(50) NOT NULL,
								  PRIMARY KEY (`id`)
								) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
								";

		$connection=Yii::app()->db;
		$transaction=$connection->beginTransaction();
		try
		{
			$connection->createCommand($eventTableSql)->execute();
			$connection->createCommand($eventImageTableSql)->execute();
			$connection->createCommand($eventVideoTableSql)->execute();
			//… прочие SQL-запросы
			$transaction->commit();
		}
		catch(Exception $e) // в случае возникновения ошибки при выполнении одного из запросов выбрасывается исключение
		{
			$transaction->rollback();
		}

	}
}