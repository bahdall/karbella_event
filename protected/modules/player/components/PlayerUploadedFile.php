<?php

Yii::import('application.modules.player.components.PlayerFilesConfig');

/**
 * Validate uploaded product image.
 * Create unique image name.
 */
class PlayerUploadedFile
{

	/**
	 * @param CUploadedFile $file
	 * @return bool
	 */
	public static function isAllowedSize(CUploadedFile $file)
	{
		return ($file->getSize() <= PlayerFilesConfig::get('maxFileSize'));
	}

	/**
	 * @param CUploadedFile $file
	 * @return bool
	 */
	public static function isAllowedExt(CUploadedFile $file)
	{
		return in_array(strtolower($file->getExtensionName()),  PlayerFilesConfig::get('extensions'));
	}

	/**
	 * @param CUploadedFile $file
	 * @return bool
	 */
	public static function isAllowedType(CUploadedFile $file)
	{
		$type = CFileHelper::getMimeType($file->getTempName());
		if(!$type)
			$type = CFileHelper::getMimeTypeByExtension($file->getName());
		return in_array($type,  PlayerFilesConfig::get('types'));
	}

	/**
	 * @param CUploadedFile $file
	 * @return bool
	 */
	public static function hasErrors(CUploadedFile $file)
	{
		return !(!$file->getError() && self::isAllowedExt($file) === true && self::isAllowedSize($file) === true && self::isAllowedType($file) === true);
	}

	/**
	 * @return string Path to save product image
	 */
	public static function getSavePath()
	{
		return Yii::getPathOfAlias(PlayerFilesConfig::get('path'));
	}

	/**
	 * @param PlayerPlaylist $model
	 * @param CUploadedFile $file
	 * @return string
	 */
	public static function createName(PlayerPlaylistFiles $model, CUploadedFile $file)
	{
		$path = self::getSavePath();
		$name = self::generateRandomName($model, $file);

		if (!file_exists($path.'/'.$name))
			return $name;
		else
			self::createName($model, $file);
	}

	/**
	 * Generates random name bases on product and image models
	 *
	 * @param PlayerPlaylist $model
	 * @param CUploadedFile $file
	 * @return string
	 */
	public static function generateRandomName(PlayerPlaylistFiles $model, CUploadedFile $file)
	{
		return strtolower($model->id.'_'.crc32(microtime()).'.'.$file->getExtensionName());
	}

}