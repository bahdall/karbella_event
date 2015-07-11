<?php

Yii::import('application.modules.player.components.PlayerFilesConfig');
Yii::import('application.modules.player.components.PlayerUploadedFile');

/**
 * Class EventImageSaver
 *
 * Save/handle uploaded event images
 */
class PlayerFileSaver
{
	/**
	 * @param PlayerPlaylistFiles $model
	 * @param CUploadedFile $file
	 */
	public function __construct(PlayerPlaylistFiles $model, CUploadedFile $file)
	{
		$name     = PlayerUploadedFile::createName($model, $file);
		$fullPath = PlayerUploadedFile::getSavePath().'/'.$name;


		$file->saveAs($fullPath);
		@chmod($fullPath, 0666);

		$model->file = $name;

		$model->save();
	}
}