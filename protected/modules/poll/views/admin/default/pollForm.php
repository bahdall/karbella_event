<?php


return array(
	'id'=>'pageUpdateForm',
	'showErrorSummary'=>true,
	'elements'=>array(
		'content'=>array(
			'type'=>'form',
			'title'=>Yii::t('Poll.core', 'Содержимое'),
			'elements'=>array(
				'name'=>array(
					'type'=>'textarea',
				),
                'description'=>array(
					'type'=>'textarea',
				),
				'status'=>array(
					'type'=>'dropdownlist',
					'items'=>Poll::statuses()
				),
			),
		),
	),
);

