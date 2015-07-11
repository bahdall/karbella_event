<?php

/**
 * Attribute choice tab.
 */

Yii::app()->getClientScript()
	->registerScriptFile($this->module->assetsUrl.'/admin/player.files.js', CClientScript::POS_END);
?>

<style type="text/css">
	table.choiceEditTable td {
		padding: 3px;
	}
	table.choiceEditTable textarea {
		width: 85%;
	}
	table.choiceEditTable tr.copyMe {
		display: none;
	}
	table.choiceEditTable {
		cursor: pointer;
	}
</style>

<table class="choiceEditTable">
	<thead>
		<tr>
			<td></td>
			<?php foreach(Yii::app()->languageManager->languages as $l): ?>
			<td>
				<?php echo CHtml::encode($l->name) ?>
			</td>
			<?php endforeach; ?>
			<td>
				Файл
			</td>
			<td>
				<a href="#" class="plusOne"><?php echo Yii::t('PlayerModule.core', 'Добавить') ?></a>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr class="copyMe">
			<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td>
			<?php foreach(Yii::app()->languageManager->languages as $l): ?>
			<td>
				<input name="sample" class="value">
			</td>
			<?php endforeach; ?>
			<td>
				<?php echo CHtml::fileField('file_'.$file->id ,'' , array('class' => 'j-value-file')) ?>
			</td>
			<td>
				<a href="#" class="deleteRow"><?php echo Yii::t('PlayerModule.core', 'Удалить') ?></a>
			</td>
		</tr>
		<?php 
			if($model->files)
			{
				foreach($model->files as $file)
				{
					?>
						<tr>
							<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td>
							<?php
								foreach(Yii::app()->languageManager->languages as $l):
								$file->file_translate = PlayerPlaylistFilesTranslate::model()->findByAttributes(array(
									'object_id'=>$file->id,
									'language_id'=>$l->id
								));
							?>
							<td>
							
							     <input name="files[<?php echo $file->id ?>][name][]" value="<?php echo $file->file_translate->name ?>" class="value">
                            </td>
							<?php endforeach; ?>

							<td>
								<?php echo CHtml::fileField('file_'.$file->id ,$file->file) ?>
							</td>

							<td>
								<a href="#" class="deleteRow"><?php echo Yii::t('PlayerModule.core', 'Удалить') ?></a>
							</td>
						</tr>
					<?php
				}
			}else{
		?>
			<tr>
				<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td>
				<?php
				$rnd=rand(1,9999);
				foreach(Yii::app()->languageManager->languages as $l):
				?>
				<td>
					<input name="files[<?php echo $rnd ?>][name][]" >
				</td>
				<?php endforeach; ?>

				<td>
					<?php echo CHtml::fileField('file_'.$rnd,'') ?>
				</td>

				<td>
					<a href="#" class="deleteRow"><?php echo Yii::t('PlayerModule.core', 'Удалить') ?></a>
				</td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>