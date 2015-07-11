<?php
	// Page create/edit view

	$this->topButtons = $this->widget('application.modules.admin.widgets.SAdminTopButtons', array(
		'form'=>$form,
		'langSwitcher'=>!$model->isNewRecord,
		'deleteAction'=>$this->createUrl('/player/admin/default/delete', array('id'=>$model->id))
	));

	$title = ($model->isNewRecord) ? Yii::t('PlayerModule.core', 'Создание Плейлиста') :
		Yii::t('PlayerModule.core', 'Редактирование страницы');

	$this->breadcrumbs = array(
		'Home'=>$this->createUrl('/admin'),
		Yii::t('PlayerModule.core', 'Плейлист')=>$this->createUrl('index'),
		($model->isNewRecord) ? Yii::t('PlayerModule.core', 'Создание Плейлиста') : CHtml::encode($model->name),
	);



	$this->pageHeader = $title;
?>

<!-- Use padding-all class with SidebarAdminTabs -->
<div class="form wide padding-all">
	<?php echo $form->asTabs(); ?>
</div>

