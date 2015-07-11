<?php

/**
 * Pages controller
 * @package modules.pages
 */
class PagesController extends Controller
{

	/**
	 * Filter pages by category
	 */
	public function actionList()
	{
        // Remove "pages/" from beginning
		
        (trim(Yii::app()->languageManager->getUrlPrefix()) == "")?$str_length = 6:$str_length = (strlen(Yii::app()->languageManager->getUrlPrefix())+1)+6;
        
        $url = substr(Yii::app()->request->getPathInfo(),$str_length);

		$model = PageCategory::model()
			->withFullUrl($url)
			->find();

		if (!$model) throw new CHttpException(404, Yii::t('PagesModule.core', 'Категория не найдена.'));

		$criteria = Page::model()
			->published()
			->filterByCategory($model)
			->getDbCriteria();

		$count = Page::model()->count($criteria);

		$pagination = new CPagination($count);
		$pagination->pageSize = ($model->page_size > 0) ? $model->page_size: $model->defaultPageSize;
		$pagination->applyLimit($criteria);

		$pages = Page::model()->findAll($criteria);

		$view = $this->setDesign($model, 'list');

		$this->render($view, array(
			'model'=>$model,
			'pages'=>$pages,
			'pagination'=>$pagination
		));
	}
    
 	/**
	 * Display page by url.
	 * Example url: /page/some-page-url
	 * @param string $url page url
	 */
	public function actionView($url)
	{
		$this->layout = "//layouts/toshnur_inner";
        
        $model = Page::model()
			->published()
			->withUrl($url)
			->find(array(
				'limit'=>1
			));

		if (!$model) throw new CHttpException(404, Yii::t('PagesModule.core', 'Страница не найдена.'));

		$view = $this->setDesign($model, 'view');

		$this->render($view, array(
			'model'=>$model,
		));
	}
    
	public function actionDetalView($url)
	{
		$this->layout = "//layouts/toshnur_inner";
        
        $model = Page::model()
			->published()
			->withUrl($url)
			->find(array(
				'limit'=>1
			));

		if (!$model) throw new CHttpException(404, Yii::t('PagesModule.core', 'Страница не найдена.'));

		$view = $this->setDesign($model, 'detalview');

		$this->render($view, array(
			'model'=>$model,
		));
	}
    
  	public function actionSearch()
	{
    		$this->layout = "//layouts/toshnur_inner";
         
            if(isset($_GET['q']) && trim($_GET['q']) !="")
            {  
               $q = trim($_GET['q']);
            
            
    		$criteria = new CDbCriteria;
            $criteria->select = "t.*";
            $criteria->join =" LEFT JOIN PageTranslate pt on(pt.object_id = t.id)";
            $criteria->condition = "pt.title LIKE('%".$q."%')";
            
            
    
    		$count = Page::model()->count($criteria);
    
    		$pagination = new CPagination($count);
    		$pagination->pageSize = 22 ;
    		$pagination->applyLimit($criteria);
            
            $pages = Page::model()->findAll($criteria);
      
           
        	$this->render("search", array(
    			'pages'=>$pages,
    			'pagination'=>$pagination
    		));
            }else{
               	$this->render("search");}    
            
    }
    

}