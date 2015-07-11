<?php

Yii::import('application.modules.player.PlayerModule');

/**
 * Admin menu items for pages module
 */
return array(
	'cms'=>array(
		'position'=>5,
		'items'=>array(
			array(
				'label'=>Yii::t('PlayerModule.core', 'MP3 Player'),
				'url'=>array('/admin/player'),
				'position'=>3
			),
		),
	),
);