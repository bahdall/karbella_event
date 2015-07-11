<?php

Yii::import('ext.phpthumb.PhpThumbFactory');
Yii::import('application.modules.pages.components.PageImagesConfig');
Yii::import('application.modules.pages.components.PageUploadedImage');

/**
 * Class PageImageSaver
 *
 * Save/handle uploaded page images
 */
class PageImageSaver
{
	/**
	 * @param Page $page
	 * @param CUploadedFile $image
	 */
	public function __construct(Page $page, CUploadedFile $image)
	{
		$name     = PageUploadedImage::createName($page, $image);
		$fullPath = PageUploadedImage::getSavePath().'/../page/'.$name;
		$image->saveAs($fullPath);
		@chmod($fullPath, 0666);

		// Check if page has main image
		$is_main = (int) PageImage::model()->countByAttributes(array(
			'page_id' => $page->id,
			'is_main'    => 1
		));

		$imageModel = new PageImage;
		$imageModel->page_id    = $page->id;
		$imageModel->name          = $name;
		$imageModel->is_main       = ($is_main == 0) ? true : false;
		$imageModel->uploaded_by   = Yii::app()->user->getId();
		$imageModel->date_uploaded = date('Y-m-d H:i:s');
		$imageModel->save();

		$this->resize($fullPath);
		$this->watermark($fullPath);
	}

	/**
	 * Resize uploaded image if sizes bigger defined in settings table
	 *
	 * @param $fullPath string
	 */
	public function resize($fullPath)
	{
		$thumb  = PhpThumbFactory::create($fullPath);
		$sizes  = PageImagesConfig::get('maximum_image_size');
		$method = PageImagesConfig::get('resizeMethod');
		$thumb->$method($sizes[0], $sizes[0])->save($fullPath);
	}

	/**
	 * Draws watermark on image.
	 *
	 * @param $fullPath string to image
	 */
	public function watermark($fullPath)
	{
		// Add watermark;
		if(PageImagesConfig::get('watermark_active'))
		{
			$pic = PhpThumbFactory::create($fullPath);
			$pos = PageImagesConfig::get('watermark_position_vertical').PageImagesConfig::get('watermark_position_horizontal');

			try {
				$watermark = PhpThumbFactory::create(Yii::getPathOfAlias('webroot.uploads') . '/watermark.png');

				$pic->addWatermark(
					$watermark,
					$pos,
					PageImagesConfig::get('watermark_opacity'),
					0,
					0
				);
				$pic->save($fullPath);
			} catch(Exception $e) {
				// pass
			}
		}
	}
}