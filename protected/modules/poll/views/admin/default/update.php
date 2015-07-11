<?php
	// Page create/edit view

	$this->topButtons = $this->widget('application.modules.admin.widgets.SAdminTopButtons', array(
		'form'=>$form,
		'langSwitcher'=>!$model->isNewRecord,
		'deleteAction'=>$this->createUrl('/poll/admin/default/delete', array('id'=>$model->id))
	));

	$title = ($model->isNewRecord) ? Yii::t('Poll.admin', 'Создание Опросы') :
		Yii::t('Poll.admin', 'Редактирование страницы');

	$this->breadcrumbs = array(
		'Home'=>$this->createUrl('/admin'),
		Yii::t('PollModule.admin', 'Опросы')=>$this->createUrl('index'),
		($model->isNewRecord) ? Yii::t('Poll.admin', 'Создание Опросы') : CHtml::encode($model->name),
	);



	$this->pageHeader = $title;
?>

<!-- Use padding-all class with SidebarAdminTabs -->
<div class="form wide padding-all">
	<?php echo $form->asTabs(); ?>
</div>

