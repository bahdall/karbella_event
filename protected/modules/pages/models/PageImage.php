<?php

Yii::import('application.modules.pages.components.PageImagesConfig');

/**
 * This is the model class for table "PageImage".
 *
 * The followings are the available columns in table 'PageImage':
 * @property integer $id
 * @property integer $page_id
 * @property string $name
 * @property integer $is_main
 * @property integer $uploaded_by
 * @property string $date_uploaded
 * @property string $title
 */
class PageImage extends BaseModel
{
    
	/**
	 * Returns the static model of the specified AR class.
	 * @return PageImage the static model class
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
		return 'PageImage';
	}

	/**
	 * @return array
	 */
	public function relations()
	{
		return array(
			'author'=>array(self::BELONGS_TO, 'User', 'uploaded_by'),
		);
	}

	/**
	 * @return array
	 */
	public function defaultScope()
	{
		return array(
			'order'=>'date_uploaded DESC',
		);
	}

	/**
	 * Get url to page image. Enter $size to resize image.
	 * @param mixed $size New size of the image. e.g. '150x150'
	 * @param mixed $resizeMethod Resize method name to override config. resize/adaptiveResize
	 * @param mixed $random Add random number to the end of the string
	 * @return string
	 */
	public function getUrl($size = false, $resizeMethod = false, $random = false)
	{
		if($size !== false)
		{
			$thumbPath = Yii::getPathOfAlias(PageImagesConfig::get('thumbPath')).'/../pageThumbs/'.$size."/";
			if(!file_exists($thumbPath))
				mkdir($thumbPath, 0777, true);

			// Path to source image
			$fullPath  = Yii::getPathOfAlias(PageImagesConfig::get('path')).'/../page/'.$this->name;
			// Path to thumb
			$thumbPath = $thumbPath.'/'.$this->name;

			if(!file_exists($thumbPath))
			{
				// Resize if needed
				Yii::import('ext.phpthumb.PhpThumbFactory');
				$sizes  = explode('x', $size);
				$thumb  = PhpThumbFactory::create($fullPath);

				if($resizeMethod === false)
					$resizeMethod = PageImagesConfig::get('resizeThumbMethod');
				$thumb->$resizeMethod($sizes[0],$sizes[1])->save($thumbPath);
			}

			return PageImagesConfig::get('thumbUrl').'../pageThumbs/'.$size."/".$this->name;
		}

		if ($random === true)
			return PageImagesConfig::get('url')."../page/".$this->name.'?'.rand(1, 10000);
		    return PageImagesConfig::get('url')."../page/".$this->name;
	}

	public function attributeLabels()
	{
		return array(
			'page_id'       => Yii::t('PagesModule.admin', 'Page'),
			'name'          => Yii::t('PagesModule.admin', 'Имя файла'),
			'is_main'       => Yii::t('PagesModule.admin', 'Главное'),
			'author'        => Yii::t('PagesModule.admin', 'Автор'),
			'uploaded_by'   => Yii::t('PagesModule.admin', 'Автор'),
			'date_uploaded' => Yii::t('PagesModule.admin', 'Дата загрузки'),
			'title'         => Yii::t('PagesModule.admin', 'Название'),
		);
	}

	/**
	 * Delete file, etc...
	 */
	public function afterDelete()
	{
		// Delete file
		if (file_exists($this->filePath))
			unlink($this->filePath);

		// If main image was deleted
		if ($this->is_main)
		{
			// Get first image and set it as main
			$model = PageImage::model()->find();
			if ($model)
			{
				$model->is_main = 1;
				$model->save(false);
			}
		}

		return parent::afterDelete();
	}

	/**
	 * @return string
	 *
	 */
	public function getFilePath()
	{
		return Yii::getPathOfAlias(PageImagesConfig::get('path')).'../page/'.$this->name;
	}

}