<?php

Yii::import('application.modules.player.PlayerModule');

/**
 * Module info
 */ 
return array(
	'name'=>Yii::t('PlayerModule.core', 'mp3 player'),
	'author'=>'tsharipov777@gmail.com',
	'version'=>'1',
	'description'=>Yii::t('PlayerModule.core', 'mp3 player'),
	'config_url'  => Yii::app()->createUrl('/player/admin/default/index'),
	'url'=>'', # Url to module home page.
);