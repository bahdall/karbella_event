<?php
Yii::import('application.modules.player.models.components.PlayerFileSaver');
Yii::import('application.modules.player.components.PlayerFilesConfig');

/**
 * Store options for dropdown and multiple select
 * This is the model class for table "PlayerPlaylistFiles".
 *
 * The followings are the available columns in table 'PollChoices':
 * @property integer $poll_id
 * @property string $name
 * @property integer $sort
 */
class PlayerPlaylistFiles extends BaseModel
{

	public $translateModelName = 'PlayerPlaylistFilesTranslate';

	/**
	 * @var string multilingual attr
	 */
	public $name;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PlayerPlaylistFiles';
	}

   /**
    * @return array validation rules for model attributes.
    */
	public function rules()
	{
		return array(
			array('sort, file','safe'),
       );
	}

	public function relations()
	{
		return array(
			'file_translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
		);
	}

	/**
	 * @return array
	 */
	public function behaviors()
	{
		return array(
			'STranslateBehavior'=>array(
				'class'=>'ext.behaviors.STranslateBehavior',
				'relationName'=>'file_translate',
				'translateAttributes'=>array(
					'name',
				),
			)
		);
	}


	public function defaultScope()
	{
		return array('order' => 'sort ASC');
	}



	public function getUrl()
	{
		// Path to source file
		$fullPath  = PlayerFilesConfig::get('url').'/'.$this->file;
		return $fullPath;
	}



	public function addFile(CUploadedFile $file)
	{
		new PlayerFileSaver($this, $file);
	}


	/**
	 * Delete file, etc...
	 */
	public function afterDelete()
	{
		// Delete file
		if (file_exists($this->filePath))
			unlink($this->filePath);

		return parent::afterDelete();
	}


	/**
	 * @return string
	 *
	 */
	public function getFilePath()
	{
		return Yii::getPathOfAlias(PlayerFilesConfig::get('path')).'/'.$this->file;
	}


}