<?php

Yii::import('application.modules.poll.PollModule');

/**
 * Admin menu items for pages module
 */
return array(
	'cms'=>array(
		'position'=>5,
		'items'=>array(
			array(
				'label'=>Yii::t('PollModule.core', 'Опросы'),
				'url'=>array('/admin/poll'),
				'position'=>3
			),
		),
	),
);