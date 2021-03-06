<?php

	/** Display pages list **/
	$this->pageHeader = Yii::t('PlayerModule.core', 'Плейлист');

	$this->breadcrumbs = array(
		'Home'=>$this->createUrl('/admin'),
		Yii::t('PlayerModule.core', 'Плейлист'),
	);

	$this->topButtons = $this->widget('application.modules.admin.widgets.SAdminTopButtons', array(
		'template'=>array('create'),
		'elements'=>array(
			'create'=>array(
				'link'=>$this->createUrl('create'),
				'title'=>Yii::t('PlayerModule.core', 'Создать Плейлист'),
				'options'=>array(
					'icons'=>array('primary'=>'ui-icon-plus')
				)
			),
		),
	));

	$this->widget('ext.sgridview.SGridView', array(
		'dataProvider'=>$dataProvider,
		'id'=>'pagesListGrid',
		'filter'=>$model,
		'columns'=>array(
			array(
				'class'=>'CCheckBoxColumn',
			),
			array(
				'class'=>'SGridIdColumn',
				'name'=>'id',
			),
			array(
				'name'=>'name',
				'type'=>'raw',
				'value'=>'CHtml::link(CHtml::encode($data->name), array("update", "id"=>$data->id))',
			),
			array(
				'header' => 'Треки',
				'type'=>'raw',
				'value'=>'$data->getFilesList()',
			),
			// Buttons
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}{delete}',
			),
		),
	));
