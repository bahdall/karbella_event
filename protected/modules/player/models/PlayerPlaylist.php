<?php

Yii::import('application.modules.player.models.PlayerPlaylistTranslate');
Yii::import('application.modules.player.components.PlayerFilesConfig');



class PlayerPlaylist extends BaseModel
{
    
    public $name;
    public $description;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Banner the static model class
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
		return 'PlayerPlaylist';
	}
    
    /**
	 * Name of the translations model.
	 */
	public $translateModelName = 'PlayerPlaylistTranslate';


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('description , image','safe'),
            array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			array('id, name, description , image', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		    'translate'=>array(self::HAS_ONE, $this->translateModelName, 'object_id'),
            'files'=> array(self::HAS_MANY, 'PlayerPlaylistFiles', 'playlist_id'),
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
				'translateAttributes'=>array(
					'name',
					'description',
				),
			),
		);
	}

	public function scopes()
	{
		return array();
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('PlayerModule.core', 'Название'),
			'description' => Yii::t('PlayerModule.core', 'Описание'),
			'image' => Yii::t('PlayerModule.core', 'Изображение'),
		);
	}



	/**
	 * Retrieves a list of models based on the current search/filter conditions. Used in admin search.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
        
  	    $criteria->with = array('translate');
		
        $criteria->compare('t.id',$this->id);

        $criteria->compare('translate.name',$this->name,true);
        $criteria->compare('translate.description',$this->name,true);

	
        // Create sorting by translation title
		$sort=new CSort;
		$sort->attributes=array(
			'*',
			'name' => array(
				'asc'   => 'translate.name',
				'desc'  => 'translate.name DESC',
			)
		);
        

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination'=>array(
				'pageSize'=>20,
			)
		));
	}

	/**
	 * @return bool
	 */
	public function beforeSave()
	{

		return parent::beforeSave();
	}



	public function getFilesList()
	{
		if( !$this->files )return false;

		foreach($this->files as $file)
		{
			echo $file->name.'<br>';
		}
	}



	public function getImageUrl($size = false, $resizeMethod = false, $random = false)
	{
		if($size !== false)
		{

			$thumbPath = Yii::getPathOfAlias(PlayerFilesConfig::get('thumbPath')).'/'.$size;
			if(!file_exists($thumbPath))
				mkdir($thumbPath, 0777, true);

			// Path to source image
			$fullPath  = Yii::getPathOfAlias('webroot').$this->image;
			$imageName = explode('/',$this->image);
			$imageName = array_pop($imageName);
			// Path to thumb
			$thumbPath = $thumbPath.'/'.$imageName;


			if(!file_exists($thumbPath))
			{
				// Resize if needed
				Yii::import('ext.phpthumb.PhpThumbFactory');
				$sizes  = explode('x', $size);
				$thumb  = PhpThumbFactory::create($fullPath);

				if($resizeMethod === false)
					$resizeMethod = PlayerFilesConfig::get('resizeThumbMethod');
				$thumb->$resizeMethod($sizes[0],$sizes[1])->save($thumbPath);
			}

			return PlayerFilesConfig::get('thumbUrl').$size.'/'.$imageName;
		}

		if ($random === true)
			return PlayerFilesConfig::get('url').$this->image.'?'.rand(1, 10000);
		return PlayerFilesConfig::get('url').$this->image;
	}




}
