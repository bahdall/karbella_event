<?php

class DefaultController extends SAdminController {

	/**
	 * Display pages list.
	 */
	public function actionIndex()
	{
		$model = new Page('search');

		if (!empty($_GET['Page']))
			$model->attributes = $_GET['Page'];

		$dataProvider = $model->search();
		$dataProvider->pagination->pageSize = Yii::app()->settings->get('core', 'productsPerPageAdmin');

		$this->render('index', array(
			'model'=>$model,
			'dataProvider'=>$dataProvider
		));
	}

	public function actionCreate()
	{
		$this->actionUpdate(true);
	}

	/**
	 * Create or update new page
	 * @param boolean $new
	 */
	public function actionUpdate($new = false)
	{
		if ($new === true)
		{
			$model = new Page;
			$model->publish_date = date('Y-m-d H:i:s');
		}
		else
		{
			$model = Page::model()
				->language($_GET)
				->findByPk($_GET['id']);
		}

		if (!$model)
			throw new CHttpException(404, Yii::t('PagesModule.core', 'Страница не найдена.'));

		$form = new STabbedForm('application.modules.pages.views.admin.default.pageForm', $model);
         // Set additional tabs
		$form->additionalTabs = array(
    			Yii::t('PagesModule.admin','Изображения')    => $this->renderPartial('_images', array('model'=>$model), true),
    		);
		if (Yii::app()->request->isPostRequest)
		{
		    $model->attributes = $_POST['Page'];

			if ($model->isNewRecord)
				$model->created = date('Y-m-d H:i:s');
			$model->updated = date('Y-m-d H:i:s');

			if ($model->validate())
			{
			    $model->save();
             
                // Handle images
				$this->handleUploadedImages($model);

				// Set main image
				$this->updateMainImage($model);

				// Update image titles
				$this->updateImageTitles();
                
                $model->save();

				$this->setFlashMessage(Yii::t('PagesModule.core', 'Изменения успешно сохранены'));

				if (isset($_POST['REDIRECT']))
					$this->smartRedirect($model);
				else
					$this->redirect(array('index'));
			}
		}
       
		$this->render('update', array(
			'model'=>$model,
			'form'=>$form,
		));
	}

	/**
	 * Delete page by Pk
	 */
	public function actionDelete()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$model = Page::model()->findAllByPk($_REQUEST['id']);

			if (!empty($model))
			{
				foreach($model as $page)
					$page->delete();
			}

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect('index');
		}
	}
    
    
	/**
	 * @param $id PageImage id
	 */
	public function actionDeleteImage($id)
	{
		if (Yii::app()->request->getIsPostRequest())
		{
			$model = PageImage::model()->findByPk($id);
			if ($model)
				$model->delete();
		}
	}
    
    /**
     * Updates image titles
     */
	public function updateImageTitles()
	{
		if(sizeof(Yii::app()->request->getPost('image_titles', array())))
		{
			foreach(Yii::app()->request->getPost('image_titles', array()) as $id=>$title)
			{
				PageImage::model()->updateByPk($id, array(
					'title'=>$title
				));
			}
		}
	}
    
    /**
	 * @param Page $model
	 */
	public function updateMainImage(Page $model)
	{
		if(Yii::app()->request->getPost('mainImageId'))
		{
			// Clear current main image
			PageImage::model()->updateAll(array('is_main'=>0), 'page_id=:pid', array(':pid'=>$model->id));
			// Set new main image
			PageImage::model()->updateByPk(Yii::app()->request->getPost('mainImageId'),array('is_main'=>1));
		}
	}
    
   /**
	 * @param StoreRestoran $model
	 */
	public function handleUploadedImages(Page $model)
	{
		$images = CUploadedFile::getInstancesByName('PageImages');
       
 		if($images && sizeof($images) > 0)
		{
			/** var $image CUploadedFile */
			foreach($images as $image)
			{
				if(!PageUploadedImage::hasErrors($image))
					$model->addImage($image);
				else
					$this->setFlashMessage(Yii::t('PagesModule.admin', 'Ошибка загрузки изображения {name}', array('{name}'=>$image->getName())));
			}
		}
	}
    
    
    
    
}