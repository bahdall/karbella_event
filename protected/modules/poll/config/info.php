<?php

Yii::import('application.modules.poll.PollModule');

/**
 * Module info
 */ 
return array(
	'name'=>Yii::t('PollModule.core', 'Опросы'),
	'author'=>'jam-90-87@mailo.ru',
	'version'=>'1',
	'description'=>Yii::t('PollModule.core', 'Опросы'),
	'config_url'  => Yii::app()->createUrl('/poll/admin/default/index'),
	'url'=>'', # Url to module home page.
	'widgets' => array(
		'PollWidget' => array(
			'name' => 'Опросы',
			'description' => 'poll',
			'class' => 'application.modules.poll.widgets.PollWidget',
		),
	),
);