<?php

/**
 * Attribute choice tab.
 */

Yii::app()->getClientScript()
	->registerScriptFile($this->module->assetsUrl.'/admin/poll.choice.js', CClientScript::POS_END);
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
				<a href="#" class="plusOne"><?php echo Yii::t('PollModule.admin', 'Добавить') ?></a>
			</td>
		</tr>
	</thead>
	<tbody>
		<tr class="copyMe">
			<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td>
			<?php foreach(Yii::app()->languageManager->languages as $l): ?>
			<td>
				<textarea name="sample" class="value"></textarea>
			</td>
			<?php endforeach; ?>
			<td>
				<a href="#" class="deleteRow"><?php echo Yii::t('PollModule.admin', 'Удалить') ?></a>
			</td>
		</tr>
		<?php 
			if($model->choice)
			{
				foreach($model->choice as $o)
				{
					?>
						<tr>
							<td><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td>
							<?php
								foreach(Yii::app()->languageManager->languages as $l):
								$o->choice_translate =PollChoiceTranslate::model()->findByAttributes(array(
									'object_id'=>$o->id,
									'language_id'=>$l->id
								));
							?>
							<td>
							
							     <textarea cols="50" name="choice[<?php echo $o->id ?>][]" class="value"><?php echo CHtml::encode($o->choice_translate->name) ?></textarea>
                            </td>
							<?php endforeach; ?>
							<td>
								<a href="#" class="deleteRow"><?php echo Yii::t('PollModule.admin', 'Удалить') ?></a>
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
					<textarea name="choice[<?php echo $rnd ?>][]" cols="50"></textarea>
				</td>
				<?php endforeach; ?>
				<td>
					<a href="#" class="deleteRow"><?php echo Yii::t('PollModule.admin', 'Удалить') ?></a>
				</td>
			</tr>
		<?php
			}
		?>
	</tbody>
</table>