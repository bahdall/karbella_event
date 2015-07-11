<?php

class PlayerFilesConfig
{
	public static $initialized  = false;
	public static $settings_key = 'player';
	public static $db_settings  = null;

	/**
	 * @var array.
	 */
	public static $defaults = array(
			// Overrided from db
			'path'               => 'webroot.uploads.player',
			'thumbPath'          => 'webroot.assets.playerThumbs',
			'url'                => '/uploads/player/', // With ending slash
			'thumbUrl'           => '/assets/playerThumbs/', // With ending slash
			'maxFileSize'        => 10485760, //10*1024*1024,
			// Not overrided
			'extensions'         => array('mp3'),
			'types'              => array('audio/mp3', 'audio/mpeg'),
			'resizeMethod'       =>'resize', // resize/adaptiveResize
			'resizeThumbMethod'  =>'resize', // resize/adaptiveResize
			'watermark_active'   => 0,
			'watermark_opacity'  => 1,
		);

	/**
	 * Initialize component
	 */
	public static function initialize()
	{
		self::$initialized = true;

		if(isset(Yii::app()->settings) && Yii::app()->settings instanceof SSystemSettings)
			self::$db_settings = Yii::app()->settings->get(self::$settings_key);
		else
			self::$db_settings = self::$defaults;
	}

	/**
	 * Get config value by key
	 *
	 * @param $key
	 * @return mixed
	 * @throws CException
	 */
	public static function get($key)
	{
		if(!self::$initialized)
			self::initialize();

		if(array_key_exists($key, self::$db_settings))
		{
			return self::$db_settings[$key];
		}
		elseif(array_key_exists($key, self::$defaults))
		{
			return self::$defaults[$key];
		}
		else
			throw new CException('Unsupported key '.$key, 503);
	}

}