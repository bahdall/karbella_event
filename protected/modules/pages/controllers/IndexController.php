<?php


class IndexController extends Controller
{


	public function actionIndex()
	{
		$this->render('index');
	}
    
     	public function actionSiteMap()
	{
		$this->layout = "//layouts/toshnur_inner";
        
		$view = $this->setDesign($model, 'sitemap');

		$this->render($view);
	}
}
