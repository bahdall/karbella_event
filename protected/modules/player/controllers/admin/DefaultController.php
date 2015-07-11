<?php

Yii::import('application.modules.player.components.PlayerUploadedFile');

class DefaultController extends SAdminController {

	/**
	 * Display pages list.
	 */
	public function actionIndex()
	{
	   
		$model = new PlayerPlaylist('search');

		if (!empty($_GET['PlayerPlaylist']))
			$model->attributes = $_GET['PlayerPlaylist'];

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
			$model = new PlayerPlaylist;
		}
		else
		{
			$model = PlayerPlaylist::model()
                ->language($_GET)
				->findByPk($_GET['id']);
		}

		if (!$model)
			throw new CHttpException(404, Yii::t('PlayerModule.core', 'Опросы не найдена.'));

		$form = new STabbedForm('application.modules.player.views.admin.default.playerForm', $model);
   	
    	$form->additionalTabs = array(
			Yii::t('PlayerModule.core','Файлы') => $this->renderPartial('_files', array(
				'model' => $model,
			), true),
		);
    
		if (Yii::app()->request->isPostRequest)
		{
			$model->attributes = $_POST['PlayerPlaylist'];

			if ($model->validate())
			{
				$model->save();
				$this->saveFiles($model);
				$this->setFlashMessage(Yii::t('PlayerModule.core', 'Изменения успешно сохранены'));

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
			$model = PlayerPlaylist::model()->findAllByPk($_REQUEST['id']);

			if (!empty($model))
			{
				foreach($model as $page)
					$page->delete();
			}

			if (!Yii::app()->request->isAjaxRequest)
				$this->redirect('index');
		}
	}




	protected function saveFiles($model)
	{
		$dontDelete = array();
		if(!empty($_POST['files']))
		{
			$sort = 0;
			foreach($_POST['files'] as $key=>$val)
			{

				if( empty($val) || !isset($val['name'][0]) || empty($val['name'][0]) )continue;

				$index = 0;

				$file = PlayerPlaylistFiles::model()
					->findByAttributes(array(
						'id'=>$key,
					));

				if(!$file)
				{
					$file = new PlayerPlaylistFiles;
					$file->playlist_id = $model->id;
				}

				$file->sort = $sort;
				$file->save(false);


				$uploadedFile = CUploadedFile::getInstanceByName('file_'.$key);


				if( ! $file->file || $uploadedFile )
				{
					if(!PlayerUploadedFile::hasErrors($uploadedFile))
					{
						$file->addFile($uploadedFile);
					}
					else
						$this->setFlashMessage(Yii::t('PlayerModule.admin', 'Ошибка загрузки изображения {name}', array('{name}'=>$uploadedFile->getName())));
				}

				foreach(Yii::app()->languageManager->languages as $lang)
				{
					$playlistFile = PlayerPlaylistFiles::model()
						->language($lang->id)
						->findByAttributes(array(
							'id'=>$file->id
						));
					$playlistFile->name = $val['name'][$index];
					$playlistFile->save(false);

					++$index;
				}

				array_push($dontDelete, $file->id);

				$sort++;

			}

		}




		if( $dontDelete )
		{
			$cr = new CDbCriteria;
			$cr->addNotInCondition('t.id', $dontDelete);
			$filesToDelete = PlayerPlaylistFiles::model()->findAllByAttributes(array(
				'playlist_id'=>$model->id
			), $cr);
		}
		else
		{
			// Clear all attribute file
			$filesToDelete = PlayerPlaylistFiles::model()->findAllByAttributes(array(
				'playlist_id'=>$model->id
			));
		}



		if(!empty($filesToDelete))
		{
			foreach($filesToDelete as $f)
				$f->delete();
		}
	}
    

    
    
}