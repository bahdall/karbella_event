<?php


return array(
	'id'=>'pageUpdateForm',
	'showErrorSummary'=>true,
	'enctype'=>'multipart/form-data',
	'elements'=>array(
		'content'=>array(
			'type'=>'form',
			'title'=>Yii::t('PlayerModule.core', 'Содержимое'),
			'elements'=>array(
				'name'=>array(
					'type'=>'text',
				),
				'description'=>array(
					'type'=>'textarea',
				),
				'image'=>array(
					'type'=>'ext.elFinder.ServerFileInput',
					'connectorRoute' => 'filemanager/elfinderconnector',
				),
			),
		),
	),
);

